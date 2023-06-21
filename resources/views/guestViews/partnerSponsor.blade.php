<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>24/8 Basketball - Partners & Sponsors</title>
    <link rel="stylesheet" type="text/css" href="/styles/programme.css">
    <link rel="stylesheet" type="text/css" href="/styles/partners.css">

</head>

<body class="bg-black ">
    <x-infoNavbar class="my-custom-class" />

    <div id="wieDiv">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">Partners & Sponsors</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">Partners & Sponsors</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">Partners & Sponsors</h1>
        </div>
    </div>

    <div id="partnerDiv" class="align-center mb-[10vh] sm:mt-0 flex flex-col items-center justify-center">
        <div id="partnerDiv-overlay"></div>
        <div id="partnerDiv-overlay-bottom"></div>
        {{-- <div class="partnerDiv-content items-center align-center justify-center"> --}}

        <h1 id="partner" class="text-center  w-[80vw] self-center text-[#EDB12C]"><span>Partners &
                Sponsors</span>
        </h1>
        <div class="textYtDiv flex justify-around  my-[5vh] flex-row w-[100vw]">
            <div id="partnerSections" class="flex gap-[3vh] justify-center items-center  w-[80vw] flex-col">
                <div id="pickupSection"
                    class="flex align-center gap-[3vw] items-center  justify-around flex-col sm:flex-row w-[70vw] bg-white h-[30%]">
                    <img src="/images/place2bLogo.jpg" class="z-20 h-[100%]" alt="">
                    <h1 class=" text-white z-20 font-[4vh]">Place 2b</h1>
                    <a href="" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   inline-block md:hidden font-bold  rounded-full">→
                    </a>
                    <a href="" id="buttonLeesMeer"
                        class="bg-white button2 hover:bg-blue-700   hidden md:inline-block font-bold  rounded-full">Lees
                        meer →
                    </a>
                </div>
                <div id="deschoorSection"
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








    <div id="infoDiv"
        class="w-[60%] h-auto md:w-[80%] justify-between  gap-[10vh] md:gap-0 self-center mx-auto flex flex-col my-[20vh] md:my-[10vh] md:flex-row">
        <img src="/images/248-expectations-2.png" class="h-[60vh]" alt="">
        <div id="infoText" class="self-center">
            <h1 class="font-black text-white text-[4vh]">Wat bieden wij:</h1>
            <ul class="list-disc">
                <li class="text-white ">Persoonlijke begeleiding op maat</li>
                <li class="text-white ">Veelzijdige stageplek</li>
                <li class="text-white ">Groot platform om jezelf te ontwikkelen</li>
                <li class="text-white ">Relaxte en vriendelijke werkomgeving</li>
            </ul>
            <h1 class="font-black text-white text-[4vh]">Wat verwachten wij:</h1>
            <ul class="list-disc">

                <li class="text-white ">
                    Dat jij voldoet aan de 248 expectations (zie foto)</li>
            </ul>
        </div>
    </div>
    <div class="p-[5vh] mt-[20vh] hidden md:block" id="spelers" style="position: relative;">
        <div class="grid gap-4">
            <div class="flex flex-row">
                <div class="bg-zinc-800 p-[10vh] relative left-0 w-[60%] h-auto">
                    <h1 class="text-white text-[6vh] uppercase font-black relative  z-20 ">Ayoub
                    </h1>
                    <p class="mt-[5vh] text-white ">Mijn ervaring met de 24/8 programme is fantastisch. Ik heb de kans
                        om elke dag
                        binnen te Basketballen en ik ben omringd met de leukste mensen. De trainingen zijn goed er wordt
                        meer dan voldoende aandacht gegeven aan de groep en individu. ⭐️⭐️⭐️⭐️⭐️</p>

                </div>
                <img class="h-[80vh] max-w-full w-[40%] rounded-lg object-cover" src="/images/DSC09967.jpg"
                    alt="">
            </div>
            <div class="grid grid-cols-5 gap-4">
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Jarno</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09943.jpg"
                        alt="">
                </div>
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Anu</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09928.jpg"
                        alt="">
                </div>
            </div>
            <!-- Add the hover effect here -->
            <style>
                .grid-item:hover {
                    transform: scale(1.2);
                    transition: transform 0.5s ease-in-out;
                }
            </style>
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 20%; background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));">
            </div>
            <!-- End of hover effect -->
        </div>
    </div>

    <div class="p-[5vh] mt-[20vh] block md:hidden" id="spelers" style="position: relative;">
        <div class="grid gap-4">
            <div class="flex flex-row relative">
                <div
                    style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));">
                </div>
                <div class="absolute z-20 p-[5vh]">
                    <h1 class="text-white text-[6vh] uppercase font-black relative  z-20 ">Ayoub
                    </h1>
                    <p class="mt-[5vh] z-20 text-white ">Mijn ervaring met de 24/8 programme is fantastisch. Ik heb de
                        kans
                        om elke dag
                        binnen te Basketballen en ik ben omringd met de leukste mensen. De trainingen zijn goed er wordt
                        meer dan voldoende aandacht gegeven aan de groep en individu. ⭐️⭐️⭐️⭐️⭐️</p>
                </div>
                <img class="h-[80vh]  w-[90vw] rounded-lg object-cover" src="/images/DSC09967.jpg" alt="">
            </div>
            <div class="grid grid-cols-2 gap-4 mt-[5vh]">
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Jarno</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09943.jpg"
                        alt="">
                </div>
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Anu</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09928.jpg"
                        alt="">
                </div>
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Jarno</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09943.jpg"
                        alt="">
                </div>
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Anu</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09928.jpg"
                        alt="">
                </div>
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Jarno</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09943.jpg"
                        alt="">
                </div>
                <div class="grid-item relative">
                    <h1
                        class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        Anu</h1>
                    <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="/images/DSC09928.jpg"
                        alt="">
                </div>
            </div>
            <!-- Add the hover effect here -->
            <style>
                .grid-item:hover {
                    transform: scale(1.2);
                    transition: transform 0.5s ease-in-out;
                }
            </style>
            <div
                style="position: absolute; top: 0; left: 0; width: 100%; height: 20%; background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));">
            </div>
            <!-- End of hover effect -->
        </div>
    </div>

    <script src="/js/partners.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <x-footer class="my-custom-class" />
</body>

</html>
