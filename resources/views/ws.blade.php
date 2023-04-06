<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/js/app.js')
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <form id="form" method="POST">
        @csrf
        <input type="text" name="message" id="message">
        <button type="submit" form="form">Send</button>
        <div id="chat">
            <ul id="list">
                @foreach ($messages as $message)
                    <li>{{ $message->message }}</li>
                @endforeach


            </ul>
        </div>

</head>

<body class="antialiased">

</body>


<script>
    function userParams(from, to) {
        if (from < to) {
            return `${from}_${to}`;
        } else {
            return `${to}_${from}`;
        }
    }
    let AuthIdentifier = `{{ base64_encode(Auth::user()->geboorte_datum) }}`;
    let AuthKey = `{{ Auth::user()->id }}`;
    // AuthIdentifier = new Buffer(AuthIdentifier).toString("base64");
    // AuthKey = new Buffer(AuthKey).toString("base64");
    const userparams = userParams(`{{ Auth::user()->id }}`, 1);
    let link =
        `ws://116.203.134.102:6001/chat/private/${userparams}?appKey=248basketball_key&AuthIdentifier=${AuthIdentifier}&AuthKey=${AuthKey}`;
    const ws = new WebSocket(link);

    ws.onopen = () => {
        console.log("connected", link);

    };
    ws.onclose = () => {
        console.log("disconnected");
    };
    ws.onerror = (err) => {
        console.log("error", err);
    };
    ws.onmessage = (e) => {
        console.log(JSON.parse(e.data).message);
        let li = document.createElement("li");
        li.innerHTML = JSON.parse(e.data).message;
        document.getElementById("list").appendChild(li);

    };

    let message = document.getElementById("message")

    document.getElementById("form").addEventListener("submit", function(e) {
        e.preventDefault();

        const data = {
            message: message.value,
            from: "{{ Auth::user()->id }}",
            to: 1,
        };
        ws.send(JSON.stringify(data));
        message.value = "";
    });
</script>

</html>
