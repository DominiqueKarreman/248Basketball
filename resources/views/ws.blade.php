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
    <form action="{{ route('ws.store') }}" id="form" method="POST">
        @csrf
        <input type="text" name="message" id="message">
        <button type="submit" form="form">Send</button>
        <div id="chat">
            <ul id="list"></ul>
        </div>

</head>

<body class="antialiased">

</body>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
    integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
</script>

<script type="module">
   
    // let chat = document.getElementById('chat');
   

    document.getElementById("message").oninput = (e) => {
    console.log(e)
    if (document.getElementById("message").value.length == 1 ) {
        axios.post("/ws/typing", {
            typing: true,
            username: "{{ Auth()->user()->name }} ",
            message: null
        });
    
    }
};

    
</script>

</html>
