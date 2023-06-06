<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>248Basketball</title>
</head>

<body class="bg-black flex flex-col place-items-center h-full w-full">

    <x-infoNavbar class="my-custom-class" />

    <div id="hero-landing">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">Contact us</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">Contact us</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">Contact us</h1>
        </div>
    </div>

    <div id="bigContainer">
        <div id=containerLeft>
            <div id="container1">
                <p> 
                    Heb je een vraag, opmerking of tips?

                    Neem dan gerust contact met ons op. Wij 
                    zijn te bereiken via de mail en telefoon.
                </p>
            </div>
            <div id="container2">
                <h1>
                    Bereikbaar op:
                </h1>
                <p>
                    <br />
                    06-30035212 (Denzel Vaneer)
                    <br />
                    <br />
                    Info@248Basketball.nl
                    <br />
                    <br />
                    Koninginneweg 1, 1312 AW Almere
                </p>
            </div>
        </div>
        <div id="containerRight">
            <form name="ContactForm" method="post" action="{{route('contact.store')}}">
                @csrf
                <h1>
                    Naam:
                </h1>
                <input type="text" name="name" id="name" class="mb-[1.5vh] w-full" />
                <h1>
                    Email:
                </h1>
                <input type="text" name="email" id="email" class="mb-[1.5vh] w-full" />
                <h1>
                    Bericht:
                </h1>
                <textarea name="message" id="message" class="w-full min-h-[21vh] max-h-[21vh] mb-[1.5vh]"></textarea>
                <button type="submit" class="bg-[#EDB12C] text-black font-semibold uppercase text-[1.5vh] px-[1.5vw] py-[1vh] float-right">Verstuur</button>
            </form>
        </div>
    </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

    html {
        scroll-behavior: smooth;
        margin: none;
    }

    * {
        font-family: 'Inter', sans-serif;
    }

    p {
        color: white;
        letter-spacing: 3px;
    }

    h1 {
        color: white;
        font-weight: bold;
        letter-spacing: 3px;
    }

    #bigContainer {
        position: absolute;
        display: flex;
        width: 75vw;
        height: 45vh;
        bottom: 8vh;
        flex-direction: row;
    }

    #containerLeft {
        height: 100%;
    }

    #containerRight {
        height: 100%;
        width: 40%;
    }

    #container1 {
        height: 50%;
        width: 50%;
    }
    #container2 {
        height: 50%;
        width: 50%;
    }

    #hero-landing {
        background-position: 0 40%;
        background-repeat: no-repeat;
        position: absolute;
        top: 15vh;
        left: 20vh;
    }

    #welcome {
        font-size: 4vh;
        letter-spacing: 1.5vh;
        position: relative;
        margin-bottom: 0vh;
    }

    #basketball {
        font-size: 12vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        z-index: 10;
        position: relative;
    }

    #basketball-stroke {
        font-size: 12vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        -webkit-text-stroke: 2px #EDB12C;
        text-stroke: 1px #EDB12C;
        position: relative;
        top: -25vh;
        transform: translate(0vh, 17vh);
        color: transparent;
        opacity: 0.6;
    }

    #basketball-stroke-2 {
        font-size: 12vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        -webkit-text-stroke: 2px #EDB12C;
        text-stroke: 1px #EDB12C;
        position: relative;
        top: -26vh;
        transform: translate(0vh, 10vh);
        color: transparent;
        opacity: 0.2;
    }
</style>
 </html>