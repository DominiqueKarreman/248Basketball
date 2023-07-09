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
            <h1 id="basketball" class="text-white font-semibold uppercase">Stage</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">Stage</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">Stage</h1>
        </div>
    </div>
    <div id="titleDiv">
        <h1 class="text-white text-[5vh] uppercase ml-[10vw] font-black"
            style="background: linear-gradient(to bottom, white 0%, rgba(0, 0, 0, 0.07) 95%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Stage lopen?</h1>
        <div class="flex flex-col justify-between md:flex-row">
            <p class="text-white ml-[10vw] w-[80vw] md:w-[40vw]">Dat kan! Wij zijn een erkend leerbedrijf die vakmensen
                opleidt. Wij kunnen samen met jou kijken naar een geschikte stageopdracht waarin jij jezelf kan
                ontwikkelen. Zo kan je leren toernooien te organiseren, trainingen voorbereiden en begeleiden, sociale
                media runnen, de financiën van een bedrijf bijhouden en nog veel meer.
                Wij bieden een platform waarop jij jezelf kan ontwikkelen waarin jij wilt.
                Interesse? Neem contact met ons op en dan gaan we samen kijken wat wij voor elkaar kunnen betekenen.
            </p>
            <iframe class="z-10 my-[10vh] md:my-0 m-auto aspect-video w-[80%] md:w-[30%] relative  md:top-[0]"
                src="https://www.youtube.com/embed/lTxQk9a3qEo" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
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
                    <h1 id="displayed-player-name" class="text-white text-[6vh] uppercase font-black relative  z-20 ">
                        Ayoub
                    </h1>
                    <p id="displayed-player-description" class="mt-[5vh] text-white ">Mijn ervaring met de 24/8
                        programme is fantastisch. Ik heb de kans
                        om elke dag
                        binnen te Basketballen en ik ben omringd met de leukste mensen. De trainingen zijn goed er wordt
                        meer dan voldoende aandacht gegeven aan de groep en individu. ⭐️⭐️⭐️⭐️⭐️</p>

                </div>
                <img id="displayed-player-img" class="h-[80vh] max-w-full w-[40%] rounded-lg object-cover"
                    src="/images/DSC09967.jpg" alt="">
            </div>
            <div id="stagairs-Div" class="grid grid-cols-5 gap-4">


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
                    <h1 id="displayed-player-name-sm"
                        class="text-white text-[6vh] uppercase font-black relative  z-20 ">Ayoub
                    </h1>
                    <p id="displayed-player-description-sm" class="mt-[5vh] z-20 text-white ">Mijn ervaring met de 24/8
                        programme is fantastisch. Ik heb de
                        kans
                        om elke dag
                        binnen te Basketballen en ik ben omringd met de leukste mensen. De trainingen zijn goed er wordt
                        meer dan voldoende aandacht gegeven aan de groep en individu. ⭐️⭐️⭐️⭐️⭐️</p>
                </div>
                <img id="displayed-player-img-sm" class="h-[80vh]  w-[90vw] rounded-lg object-cover"
                    src="/images/DSC09967.jpg" alt="">
            </div>
            <div id="stagairs-Div-sm" class="grid grid-cols-2 gap-4 mt-[5vh]">

                {{-- @foreach ($spelers as $speler)
                    <div class="grid-item relative">
                        <h1
                            class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                            Romello</h1>
                        <img class="w-full object-cover aspect-square max-w-full rounded-lg"
                            src="/images/DSC09928.jpg" alt="">
                    </div>
                @endforeach --}}

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
    <div id="stagairs" data-stagairs="{{ json_encode($stagairs) }}"></div>

    <script>
        const stagairs = JSON.parse(document.getElementById('stagairs').dataset.stagairs);
        console.log(stagairs);

        const container = document.getElementById('stagairs-Div');
        const containerSm = document.getElementById('stagairs-Div-sm');

        let displayPlayerIndex = 0;
        let displayedPlayerName = document.getElementById('displayed-player-name')
        let displayedPlayerImg = document.getElementById('displayed-player-img')
        let displayedPlayerDescription = document.getElementById('displayed-player-description')
        let displayedPlayerNameSm = document.getElementById('displayed-player-name-sm')
        let displayedPlayerImgSm = document.getElementById('displayed-player-img-sm')
        let displayedPlayerDescriptionSm = document.getElementById('displayed-player-description-sm')

        displayedPlayerName.textContent = stagairs[displayPlayerIndex].name
        displayedPlayerDescription.textContent = stagairs[displayPlayerIndex].description
        displayedPlayerImg.src = stagairs[displayPlayerIndex].image

        displayedPlayerNameSm.textContent = stagairs[displayPlayerIndex].name
        displayedPlayerDescriptionSm.textContent = stagairs[displayPlayerIndex].description
        displayedPlayerImgSm.src = stagairs[displayPlayerIndex].image

        stagairs.forEach((player, index) => {
            //skipp if displayedPlayer
            console.log(player.name, displayedPlayerName.textContent)
            // if (player.name == displayedPlayerName.textContent) return;

            const div = document.createElement('div');
            div.classList.add('grid-item');
            div.innerHTML = `
        <div  data-player-index="${index}" class="relative  smallGridItem">
            <div class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                ${player.name}
            </div>
            <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="${player.image}" alt="">
        </div>
    `;
            const divSm = document.createElement('divSm');
            divSm.classList.add('grid-item');
            divSm.innerHTML = `
        <div  data-player-index="${index}" class="relative  smallGridItem">
            <div class="absolute text-white z-20 font-black tracking-widest uppercase top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                ${player.name}
            </div>
            <img class="w-full object-cover aspect-square max-w-full rounded-lg" src="${player.image}" alt="">
        </div>
    `;
            container.appendChild(div);
            containerSm.appendChild(divSm);
        });

        const gridItems = document.getElementsByClassName('smallGridItem')
        Array.from(gridItems).forEach(gridItem => {
            gridItem.addEventListener('click', () => {
                // Your event listener code here
                displayPlayerIndex = gridItem.dataset.playerIndex;
                console.log(`Grid item clicked! Player index: ${displayPlayerIndex}`);

                displayedPlayerName.textContent = stagairs[displayPlayerIndex].name
                displayedPlayerDescription.textContent = stagairs[displayPlayerIndex].description
                displayedPlayerImg.src = stagairs[displayPlayerIndex].image

                displayedPlayerNameSm.textContent = stagairs[displayPlayerIndex].name
                displayedPlayerDescriptionSm.textContent = stagairs[displayPlayerIndex].description
                displayedPlayerImgSm.src = stagairs[displayPlayerIndex].image
            });
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <x-footer class="my-custom-class" />
</body>

</html>
