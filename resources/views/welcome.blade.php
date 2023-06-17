<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>248Basketball</title>
    <link rel="stylesheet" type="text/css" href="/styles/welcome.css">
</head>

<body class="bg-black flex flex-col h-full w-full">
    <x-infoNavbar class="my-custom-class" />
    <div class="flex flex-col relative h-[1000vh]">
        <div id="gradient-overlay"></div>
        <video autoplay muted loop id="hero-video" playsinline>
            <source src="/videos/onsteambackground.mp4" type="video/mp4">
        </video>
        <div id="hero-landing">
            <div id="herotext">
                <h1 id="welcome" class="text-white font-semibold uppercase">Welcome To</h1>
                <h1 id="basketball" class="text-white font-semibold uppercase">24/8 Basketball</h1>
                <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">24/8 Basketball</h1>
                <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">24/8 Basketball</h1>
                <a href="" id="button" class="bg-white hover:bg-blue-700 font-bold py-2 px-4 rounded-full">Zie
                    meer ↓
                </a>
            </div>
            <div id="statDiv" style="opacity: 0; transition: 2s; animation-delay: 2s;"
                class="statsDiv  flex h-[20vh] justify-around items-end flex-row">
                <div class="stat">
                    <h2 class="text-white text-lg ">Clinics gegeven</h2>
                    <h1 id="stat1" class="text-white text-center numberStat text-lg">66</h1>
                </div>
                <div class="stat">
                    <h2 class="text-white text-lg ">Clinics gegeven</h2>
                    <h1 id="stat2" class="text-white text-center numberStat text-lg">45</h1>
                </div>
                <div class="stat">
                    <h2 class="text-white text-lg ">Clinics gegeven</h2>
                    <h1 id="stat3" class="text-white text-center numberStat text-lg">45</h1>
                </div>
            </div>
            <div id="programmeDiv">
                <div id="programme-overlay"></div>
                <div id="programme-overlay-bottom"></div>
                <div class="programme-content">
                    <h1 id="joindeprogramma" class="text-[#EDB12C]"><span>JOIN THE</span><span>PROGRAMME</span></h1>
                    <p id="subtext" class="text-white ">Verbeter je skills in the programme</p>
                    <a href="{{ route('programme.join') }}" id="button2" class="text-[#EDB12C]">WORDT LID</a>
                </div>
            </div>
            <div id="watDoetDiv">
                <div id="watDoetDiv-overlay"></div>
                <div id="watDoetDiv-overlay-bottom"></div>
                <div class="watDoetDiv-content">
                    <h1 id="watDoet" class="text-[#EDB12C]"><span>Wat Doet</span><span>24/8?</span></h1>
                    <div class="textYtDiv flex justify-around flex-row w-[100vw]">
                        <p id="watDoetSub" class="text-white ">24/8 zet zich in voor zowel de breedtesport als topsport
                            binnen Almere. We organiseren trainingen, clinics, toernooien en pickups voor verschillende
                            niveaus. We zijn er voor de beginnend basketballer die kennis wil maken met de sport, tot
                            aan de
                            ervaren topsporter die zijn skills scherp wil houden.
                            Wil je te weten komen wat we voor jouw kunnen betekenen? Neem contact met ons op. </p>
                        <iframe width="40%" src="https://www.youtube.com/embed/lTxQk9a3qEo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    </div>


                </div>
            </div>
            @if ($event)
                <div id="events"
                    style="background: #EDB12C; background-image: url('{{ $event->img_url }}'); background-size: cover; backdrop-filter: blur(60px);"
                    class="flex flex-row  items-center justify-center">
                @else
                    <div id="events"
                        style="background: #EDB12C;  background-size: cover; backdrop-filter: blur(60px);"
                        class="flex flex-row  items-center justify-center">
            @endif

            <div class="flex flex-col ">


                @if ($event)
                    <h1 id="eventTitel" class="text-[4vh] text-white self-center z-20 font-black">Volgende Evenement
                    </h1>
                    <div class="flex flex-row text-white justify-around w-[80vw] h-[40vh]">
                        <img id="eventImg" class="w-[40vw] relative" src="/{{ $event->img_url }}" />
                        <div class="flex flex-col z-20">
                            <h1 class="text-[3vh] font-black">{{ $event->naam }} -
                                {{ date('d-m-Y H:i', strtotime($event->datumTijd)) }}
                            </h1>
                            <p class="max-w-[30vw] h-[30vh] w-[30vw]">
                                {{ Str::limit($event->beschrijving, 450) }}
                            </p>
                            <a href="" id="button"
                                class="bg-white hover:bg-blue-700 relative top-[-15vh] font-bold py-2 px-4 rounded-full">Zie
                                meer ↓
                            </a>
                        </div>
                    </div>
                @else
                    <div class="flex flex-col text-white justify-center w-[80vw] h-[40vh]">
                        <h1 id="eventTitel" class="text-[4vh] text-white self-center z-20 font-black">Volgende Evenement
                        </h1>

                        <div class="flex flex-col align-center items-center z-20">


                            <h1 class="text-white text-[3vh] font-black">Er staan geen evenementen geplanned</h1>
                        </div>
                    </div>
                @endif


            </div>
        </div>

    </div>
    </div>



    <script src="/js/welcome.js"></script>


</body>



</html>
