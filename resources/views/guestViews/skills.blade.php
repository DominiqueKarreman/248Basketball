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

    <div id="skillsDiv">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">Skills trainingen</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">Skills trainingen</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">Skills trainingen</h1>
        </div>
    </div>
    <div id="titleDiv">
        <h1 class="text-white text-[5vh] uppercase ml-[10vw] font-black"
            style="background: linear-gradient(to bottom, white 0%, rgba(0, 0, 0, 0.07) 95%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Skills trainingen</h1>
        <div class="flex flex-col justify-between md:flex-row">
            <p class="text-white ml-[10vw] w-[80vw] md:w-[40vw]">Elke zondag organiseren wij bij ons op het veld, skills
                trainingen. Momenteel van 6 t/m 21 jaar (mocht je ouder of jonger zijn, en je wilt graag meedoen, neem
                even contact op). Tijdens deze trainingen leggen we aandacht op de basisvaardigheden van basketbal:
                Dribbelen, Schieten, Spelinzicht enzovoorts. Een ieder wordt hier uitgedaagd op zijn of haar niveau. Er
                zijn gemiddeld 2 trainers aanwezig die hierdoor jou goed kunnen helpen in deze groep.
                Kosten hiervan zijn €15 per maand. Mocht je incidenteel willen komen, dan is dat ook geen probleem dan
                is het €5 per keer. Betalen kan aan de deur.
                Op de flyer staat alle informatie, mocht je nog vragen hebben neem gerust contact met ons op!
            </p>
            <iframe class="z-10  m-auto aspect-video w-[80%] md:w-[30%] relative top-[10vh] md:top-[0]"
                src="https://www.youtube.com/embed/lTxQk9a3qEo" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
    <div id="infoDiv"
        class="w-[80%]  justify-between  gap-[10vh] md:gap-0 self-center mx-auto flex flex-col my-[20vh] md:my-[10vh] md:flex-row">
        <img src="/images/flyer.jpg" class="h-[60vh]" alt="">
        <div id="infoText">
            <h1 class="font-black text-white text-[5vh]">Skills trainingen</h1>
            <ul class="list-disc">
                <li class="text-white ">Verschillende leeftijdscategorieën</li>
                <li class="text-white ">Max 20 deelnemers</li>
                <li class="text-white ">Veel aandacht op basketball skills</li>
                <li class="text-white ">Leuke trainingsomgeving</li>
                <li class="text-white ">Voor zowel beginners als ervaren spelers</li>

            </ul>
        </div>
    </div>
    <div id="schrijfJeIn" class="mt-[15vh]" style="position: relative; height: 40vh;">
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 50%; background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));">
        </div>
        <div class="flex flex-col"
            style="position: absolute; bottom: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0)); display: flex; justify-content: center; align-items: center;">
            <h1 class="top-[-5vh] relative text-white text-[6vh] font-black">Schrijf je in!</h1>
            <button id="joinButton" class="top-[0vh] relative" onclick="expandDiv()"
                style="padding: 1rem 2rem; background-color: #EDB12C; color: #000; border: none; border-radius: 0.25rem;">Join
                nu!</button>
            <div id="contactForm" class="relative top-[-20vh]" style="display: none; height: 0; overflow: hidden;">
                <form class="relative">
                    <!-- Your contact form code here -->
                    <div id="formContent" class="">
                        <label for="title" class="text-white font-black block mb-2">Naam:</label>
                        <input
                            class="border-white bg-transparent text-white font-black h-[5vh] md:w-[40vw] w-[80vw] mb-4"
                            type="text" name="title" id="title" placeholder="Voornaam & Achternaam">
                        <label for="title" class="text-white font-black block mb-2">Email:</label>
                        <input
                            class="border-white bg-transparent text-white font-black h-[5vh] md:w-[40vw] w-[80vw] mb-4"
                            type="email" name="title" id="title" placeholder="">
                        <label for="title" class="text-white font-black block mb-2">Bericht:</label>
                        <textarea class="border-white bg-transparent text-white font-black h-[20vh] m-h-[20vh] md:w-[40vw] w-[80vw] mb-4"
                            type="text" name="title" id="title" placeholder="Laat een bericht achter..."></textarea>
                    </div>
                    <button class="top-[0vh] relative bg-[#EDB12C] text-black font-black h-[5vh] w-[40vw] mb-4]"
                        type="submit">Verstuur</button>

                </form>
            </div>
        </div>
    </div>

    <script>
        function expandDiv() {
            const div = document.getElementById('schrijfJeIn');
            const form = document.getElementById('contactForm');
            const button = document.getElementById('joinButton');
            const formContent = document.getElementById('contactForm');
            div.style.transition = 'height 1s ease-in-out';
            div.style.height = '90vh';
            form.style.display = 'block';
            form.style.height = '0';
            button.style.display = 'none';
            const title = document.querySelector('.flex-col > h1');
            title.style.transition = 'top 1s ease-in-out';
            form.style.height = 'auto';

            title.style.top = '-5vh';
            formContent.style.transition = 'bottom 1s ease-in-out';
            formContent.style.top = '-5vh';
            form.style.bottom = '-30vh';

        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <x-footer class="my-custom-class" />
</body>

</html>
