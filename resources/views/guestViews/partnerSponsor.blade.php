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

        {{-- <div class="partnerDiv-content items-center align-center justify-center"> --}}


        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span
                class="text-transparent bg-clip-text bg-gradient-to-r to-[#EDB12C] from-orange-500">Partners &
                Sponsors</span>
        </h1>
        <p class="text-lg font-normal max-w-[60vw] text-white lg:text-xl dark:text-gray-400">Here at Flowbite we focus
            n samenwerking met deze partners zijn wij in staat om steeds meer mensen te laten sporten. Doormiddel van
            het beschikbaar stellen van zalen, materialen of financiële middelen zijn wij in de gelegenheid gesteld om
            diverse basketbal activiteiten in Almere te kunnen organiseren. Dit ging van van lokale basketbal clinic op
            een basischool tot een stadsevenement. Wij staan altijd op voor (lokale) partners of sponsoren die ons
            willen helpen, basketbal in (Nederland) te helpen vergroten.</p>


        <div class="grid grid-cols-2 mb-[20vh] w-[80vw] relative mt-[5vh] md:grid-cols-3 gap-4">
            <div class="align-center items-center flex">
                <img class="h-auto max-w-full rounded-lg" src="/images/schoor.jpg" alt="">
            </div>
            <div class="align-center items-center flex">
                <img class="h-auto max-w-full rounded-lg" src="images/place2bLogo.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="/images/pelikaan.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full bg-white w-full rounded-lg" src="/images/tio.png" alt="">
            </div>
            <div class="align-center items-center flex">
                <img class="h-auto max-w-full rounded-lg" src="/images/media.jpg" alt="">
            </div>
            <div>
                <img class="h-auto max-w-full rounded-lg" src="/images/dk.png" alt="">
            </div>
            <div class="align-center items-center bg-white flex">
                <img class="h-auto max-w-full rounded-lg" src="/images/mirjam.png" alt="">
            </div>

        </div>
    </div>

    <!-- Add the hover effect here -->
    <style>
        .grid img:hover {
            transform: scale(1.1);
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
