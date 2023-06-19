<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>24/8 Basketball - Skills trainingen</title>
    <link rel="stylesheet" type="text/css" href="/styles/programme.css">
</head>

<body class="bg-black ">
    <x-infoNavbar class="my-custom-class" />

    <div id="wieDiv">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">Wie zijn wij?</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">Wie zijn wij?</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">Wie zijn wij?</h1>
        </div>
    </div>
    <div id="titleDiv">
        <h1 class="text-white text-[5vh] uppercase ml-[10vw] font-black"
            style="background: linear-gradient(to bottom, white 0%, rgba(0, 0, 0, 0.07) 95%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Wie zijn wij</h1>
        <div class="flex flex-col justify-between md:flex-row">
            <p class="text-white ml-[10vw] w-[80vw] md:w-[40vw]">24/8 Basketball is een basketbal academie die zich
                inzet voor het vergroten van basketbal, zowel op recreatief als op topsport gebied. Onze missie is dan
                om basketbal in Nederland bekend te maken. 24/8 basketball is opgericht voor diegene die meer van onze
                prachtige sport wil genieten. Dit kan zowel door deel te nemen aan “the programme” of mee te doen met de
                diverse trainingen en evenementen die wij organiseren. Wij nemen niet deel aan een competitie en zijn
                niet gebonden aan verenigingen. Hierdoor kan iedereen zich aanmelden bij ons of je nou wel of niet voor
                een club of vereniging speelt. Uiteraard verzorgen wij ook van advies als het gaat om het kiezen van de
                club die bij jou past.
            </p>
            <iframe class="z-10 my-[10vh] md:my-0 m-auto aspect-video w-[80%] md:w-[30%] relative  md:top-[0]"
                src="https://www.youtube.com/embed/lTxQk9a3qEo" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
    <div id="titleDiv">
        <h1 class="text-white text-[5vh] uppercase ml-[10vw] font-black"
            style="background: linear-gradient(to bottom, white 0%, rgba(0, 0, 0, 0.07) 95%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Recreatief</h1>
        <div class="flex flex-col justify-between md:flex-row">
            <p class="text-white ml-[10vw] w-[80vw] md:w-[40vw]">Op recreatief gebied, bieden wij van alles aan voor
                degene die net als ons van de sport houden. Begin je net met basketbal? Of speel je al jaren, maar door
                drukte kan je niet elke dag trainen. Dan sluiten onze skillstraingen perfect bij jou aan. Hier ga je met
                een groep aan de slag om te werken aan je basketbal vaardigheden. Daarnaast organiseren wij diverse
                toernooien waarin je jou skills kan laten zien en verbeteren. Ook als je niet traint kan je aan deze
                evenementen meedoen. Deze zijn voor een ieder die wilt basketballen. Het kan zijn van lokaal partijtje
                in de Binnenkruier(Elke vrijdag m.u.v. vakanties). Of een keer midden in de stad, waarin je de strijd
                gaat tegen alle andere basketballers van omstreken. Wij bieden het allemaal aan, wil je organisatie of
                als bedrijf dit ook met ons organiseren neem gerust contact met ons op!
            </p>
            <img class="h-[35vh] object-cover w-[80vw]  md:w-[30vw] my-[10vh] md:my-0 mx-auto"
                src="/images/DSC00929.jpg" alt="">
        </div>
    </div>
    <div id="titleDiv">
        <h1 class="text-white text-[5vh] uppercase ml-[10vw] font-black"
            style="background: linear-gradient(to bottom, white 0%, rgba(0, 0, 0, 0.07) 95%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Topsport</h1>
        <div class="flex flex-col justify-between md:flex-row">
            <p class="text-white ml-[10vw] w-[80vw] md:w-[40vw]">Op topsport gebied houdt dat in dat wij in “The
                programme” jonge gedreven basketballers helpen zich voor te bereiden op een professionele carrière. Dit
                willen wij doen door individuele aandacht te geven, waarbij we echt naar die persoon kijken waar voor
                hem of haar verbeterpunten zouden liggen. Elk persoon is anders en heeft andere kwaliteiten. Daarom
                bieden wij groepstrainingen aan om in kleine groepen samen te kunnen trainen. Op deze manier kunnen zij
                onderling met elkaar de competitie aangaan om elkaar naar een hoger niveau te brengen. Binnen onze
                trainingen kijken wij naar het totaal plaatje waaraan een basketballer moet voldoen om een ‘volledige’
                basketballer te worden. Dit gaat natuurlijk om bepaalde skills waarover je moet beschikken zowel
                aanvallend als verdedigend, maar we kijken ook naar het stukje basketbal IQ. Je zult binnen het spel
                bepaalde situaties moeten kunnen herkennen en hierop op de juiste manier reageren. Dit leer je deels
                door het te bekijken van filmmateriaal, maar je leert het voornamelijk door zelf in die situatie te
                worden gezet. Dit gedeelte van basketbal moet ook zowel aanvallend als verdedigend worden geleerd.
                Kortom gaat er veel werk in zitten om een zo compleet mogelijke basketballer te worden. “It is more than
                a mindset it is a lifestyle.”
            </p>
            <img class="h-[45vh] object-cover w-[80vw] my-[10vh] md:my-0 md:w-[30vw] mx-auto" src="/images/DSC09967.jpg"
                alt="">
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <x-footer class="my-custom-class" />
</body>

</html>
