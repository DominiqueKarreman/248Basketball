<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>24/8 Basketball</title>
    <link rel="stylesheet" type="text/css" href="/styles/welcome.css">
</head>

<body class="bg-black flex flex-col h-full w-full">
    <x-infoNavbar class="my-custom-class" />
    <div class="flex flex-col relative h-auto">
        <div id="gradient-overlay"></div>
        <video autoplay muted loop id="hero-video" playsinline>
            <source src="/videos/onsteambackground.mp4" type="video/mp4">
        </video>
        <div id="hero-landing">

            <div id="herotext">
                <h1 id="welcome" class="text-white font-semibold uppercase">welcome to</h1>
                <h1 id="basketball" class="text-white font-semibold uppercase">24/8 Basketball</h1>
                <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">24/8 Basketball</h1>
                <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">24/8 Basketball</h1>
                <a href="https://youtu.be/lTxQk9a3qEo" id="button"
                    class="bg-white hover:bg-blue-700 hidden sm:inline-block font-bold py-2 px-4 rounded-full">Bekijk
                    hele video

                </a>
                <div class="flex justify-center items-center align-center w-[80vw]">
                    <a href="https://youtu.be/lTxQk9a3qEo" id="button2"
                        class="bg-white hover:bg-blue-700 w-full  font-bold py-2 px-4 rounded-full">Bekijk hele video
                    </a>
                </div>
            </div>


            <div id="statDiv" style="opacity: 0; transition: 2s; animation-delay: 2s;"
                class="statsDiv  flex h-[20vh] justify-around items-end flex-row">
                <div class="stat">
                    <h2 class="text-white text-center text-lg ">Clinics gegeven</h2>
                    <h1 id="stat1" class="text-white text-center numberStat text-[3vh]">66</h1>
                </div>
                <div class="stat">
                    <h2 class="text-white text-center text-lg ">Clinics gegeven</h2>
                    <h1 id="stat2" class="text-white text-center numberStat text-[3vh]">45</h1>
                </div>
                <div class="stat">
                    <h2 class="text-white text-center text-lg ">Clinics gegeven</h2>
                    <h1 id="stat3" class="text-white text-center numberStat text-[1vh]">45</h1>
                </div>
            </div>
            <div id="programmeDiv">
                <div id="programme-overlay"></div>
                <div id="programme-overlay-bottom"></div>
                <div class="programme-content">
                    <h1 id="joindeprogramma" class="text-[#EDB12C]"><span>JOIN THE</span><span>PROGRAMME</span></h1>
                    <p id="subtext" class="text-white ">Binnen The programme draait het om de ontwikkeling van de
                        getalenteerde basketballers. Wij organiseren trainingen rondom de trainingen van jouw eigen club
                        waarin jouw ontwikkeling centraal staat. Binnen </p>
                    <a href="{{ route('programme.join') }}" id="button3" class="text-[#EDB12C]">WORDT LID</a>
                </div>
            </div>
            <div id="watDoetDiv" class="align-center flex flex-col items-center justify-center">
                <div id="watDoetDiv-overlay"></div>
                <div id="watDoetDiv-overlay-bottom"></div>
                {{-- <div class="watDoetDiv-content items-center align-center justify-center"> --}}

                <h1 id="watDoet" class="text-center  w-[80vw] self-center text-[#EDB12C]"><span>Wat
                        Doet</span> <span> 24/8?</span>
                </h1>
                <div class="textYtDiv flex justify-around flex-row my-[5vh] flex-col md:flex-row w-[100vw]">
                    <p id="watDoetSub" class="text-white text-center md:text-left self-center">24/8 zet zich in voor
                        zowel de
                        breedtesport als
                        topsport
                        binnen Almere. We organiseren trainingen, clinics, toernooien en pickups voor verschillende
                        niveaus. We zijn er voor de beginnend basketballer die kennis wil maken met de sport, tot
                        aan de
                        ervaren topsporter die zijn skills scherp wil houden.
                        Wil je te weten komen wat we voor jouw kunnen betekenen? Neem contact met ons op. </p>
                    <iframe class="self-center md:self-auto w-[80vw] aspect-video mt-[10vh] md:mt-0 md:w-[40%]"
                        width="40%" src="https://www.youtube.com/embed/lTxQk9a3qEo" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                </div>


                {{-- </div> --}}
            </div>
            @if ($event)
                <div id="events"
                    style="background: #EDB12C; background-image: url('{{ $event->img_url }}'); background-position: center; background-size: cover; backdrop-filter: blur(60px);"
                    class="flex flex-row  items-center justify-center">
                @else
                    <div id="events"
                        style="background: #EDB12C;  background-position: center; background-size: cover; backdrop-filter: blur(60px);"
                        class="flex flex-row  items-center justify-center">
            @endif

            <div class="flex self-center relative top-[-10vh] jusitfy-center items-center flex-col ">


                @if ($event)
                    <h1 id="eventTitel"
                        class="text-[4vh] max-w-[80vw] text-center text-white self-center z-20 font-black">Volgende
                        Evenement
                    </h1>
                    <div class="flex flex-row text-white justify-around w-[80vw] h-[40vh]">
                        <img id="eventImg" class="w-[40vw] relative" src="/{{ $event->img_url }}" />
                        <div class="flex flex-col z-20">
                            <h1 id="nameDate" class="text-[3vh] font-black">{{ $event->naam }} -
                                {{ date('d-m-Y H:i', strtotime($event->datumTijd)) }}
                            </h1>
                            <p id="eventText" class="max-w-[80vw] max-h-[40vh] h-[30vh] w-[30vw]">
                                {{ Str::limit($event->beschrijving, 450) }}
                            </p>
                            <a href="" id="button"
                                class="bg-white button2 hover:bg-blue-700 relative top-[-15vh] font-bold py-2 px-4 rounded-full">Zie
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
    <div id="weeklyDiv" class="align-center mb-[10vh] sm:mt-0 flex flex-col items-center justify-center">
        <div id="weeklyDiv-overlay"></div>
        <div id="weeklyDiv-overlay-bottom"></div>
        {{-- <div class="weeklyDiv-content items-center align-center justify-center"> --}}

        <h1 id="weekly" class="text-center  w-[80vw] self-center text-[#EDB12C]"><span>Wekelijkse
                evenementen</span>
        </h1>
        <div class="textYtDiv flex justify-around  my-[5vh] flex-row w-[100vw]">
            <div id="weeklySections" class="flex gap-[3vh] justify-center items-center  w-[80vw] flex-col">
                <div id="pickupSection"
                    class="flex align-center gap-[3vw] items-center p-[5vh] justify-around flex-col sm:flex-row w-[70vw] bg-white h-[40%]">
                    <h1 class="font-black text-white z-20 font-[4vh]">Pickup Games</h1>
                    <h1 class=" text-white z-20 font-[4vh]">alle leeftijden, elke dinsdag 17:00-18:30</h1>
                    <a href="" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   inline-block md:hidden font-bold  rounded-full">→
                    </a>
                    <a href="" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   hidden md:inline-block font-bold  rounded-full">Lees
                        meer →
                    </a>
                </div>
                <div id="pickupSection"
                    class="flex align-center gap-[3vw] items-center p-[5vh]  justify-around flex-col sm:flex-row w-[70vw] bg-white h-[40%]">
                    <h1 class="font-black text-white z-20 font-[4vh]">Pickup Games</h1>
                    <h1 class=" text-white z-20 font-[4vh]">alle leeftijden, elke woensdag 16:30-18:00</h1>
                    <a href="" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   inline-block md:hidden font-bold  rounded-full">→
                    </a>
                    <a href="" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   hidden md:inline-block font-bold  rounded-full">Lees
                        meer →
                    </a>
                </div>
                <div id="skillsSection"
                    class="flex align-center gap-[3vw] items-center p-[5vh]  justify-around flex-col sm:flex-row w-[70vw] bg-white h-[40%]">
                    <h1 class="font-black text-white z-20 font-[4vh]">Skills Trainingen</h1>
                    <h1 class=" text-white z-20 font-[4vh]">Verschillende leeftijdscategorieën, elke zondag</h1>
                    <a href="{{ route('programme.skills') }}" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   inline-block md:hidden font-bold  rounded-full">→
                    </a>
                    <a href="{{ route('programme.skills') }}" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   hidden md:inline-block font-bold  rounded-full">Lees
                        meer →
                    </a>
                </div>
            </div>

            {{-- <iframe class="self-center md:self-auto w-[80vw] aspect-video mt-[10vh] md:mt-0 md:w-[40%]" width="40%"
                src="https://www.youtube.com/embed/lTxQk9a3qEo" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe> --}}
        </div>


        {{-- </div> --}}
    </div>
    </div>



    <script src="/js/welcome.js"></script>
    {{-- <script>
        // Get the target element
        const target = document.querySelector('#programmeDiv');

        // Get the current scroll position
        const currentPosition = window.pageYOffset;

        // Calculate the distance to scroll
        const distance = target.getBoundingClientRect().top - currentPosition;

        // Set the duration of the animation (in milliseconds)
        const duration = 1000;

        // Define the easing function
        const easing = t => t * (2 - t);

        // Define the start time of the animation
        let startTime = null;

        // Define the animation function
        const animateScroll = currentTime => {
            if (startTime === null) {
                startTime = currentTime;
            }

            const timeElapsed = currentTime - startTime;
            const scrollPosition = currentPosition + (distance * easing(timeElapsed / duration));

            window.scrollTo(0, scrollPosition);

            if (timeElapsed < duration) {
                requestAnimationFrame(animateScroll);
            }
        };

        // Add an event listener to the link
        document.getElementById('button2').addEventListener('click', event => {
            event.preventDefault();
            requestAnimationFrame(animateScroll);
        });
    </script> --}}
    <x-footer class="my-custom-class" />
</body>



</html>
