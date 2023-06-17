<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>248Basketball - The programme</title>
    <link rel="stylesheet" type="text/css" href="/styles/programme.css">
</head>

<body class="bg-black pb-[10vh]">
    <x-infoNavbar class="my-custom-class" />

    <div id="heroDiv">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">The programme</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">The programme</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">The programme</h1>
        </div>
    </div>
    <div id="titleDiv">
        <h1 class="text-white text-[5vh] uppercase ml-[10vw] font-black"
            style="background: linear-gradient(to bottom, white 0%, rgba(0, 0, 0, 0.07) 95%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            The programme</h1>
        <div class="flex flex-col justify-between md:flex-row">
            <p class="text-white ml-[10vw] w-[80vw] md:w-[40vw]">Binnen The programme draait het om de ontwikkeling van
                de
                getalenteerde
                basketballers.
                Wij organiseren
                trainingen rondom de trainingen van jouw eigen club waarin jouw ontwikkeling centraal staat. Binnen The
                programme kijken wij hoe wij samen met jou het maximale uit jezelf kunnen halen.
                Om dit te realiseren kijken wij verder dan alleen de skills van basketbal. Zo kijken wij ook naar het
                mentale-, het fysieke aspect en de school van de speler. Om als topsporter te functioneren komt er veel
                meer bij kijken dan alleen goed kunnen spelen. Je moet over de juiste mentaliteit, fysieke eigenschappen
                en planning beschikken, wil je een kans maken om een professionele basketballer te worden. Hier willen
                wij graag bij ondersteunen.
            </p>
            <iframe class="z-10  m-auto aspect-video w-[80%] md:w-[30%] relative top-[10vh] md:top-[0]"
                src="https://www.youtube.com/embed/lTxQk9a3qEo" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

</body>

</html>
