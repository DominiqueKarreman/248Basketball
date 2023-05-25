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
    <video autoplay muted loop id="hero-video" playsinline >
        <source src="/videos/testclip.mp4" type="video/mp4">
    </video>

    <x-infoNavbar class="my-custom-class" />


    <div id="hero-landing">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">Ontmoet het TEAM</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">Ontmoet het TEAM</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">Ontmoet het TEAM</h1>

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

    #hero-landing {
        /* background-image: url('images/DSC00929-min.jpg'); */
        /* background-color: black; */
        /* background-size: cover; */
        background-position: 0 40%;
        background-repeat: no-repeat;

    }

    #welcome {
        font-size: 4vh;
        letter-spacing: 1.5vh;
        position: relative;
        margin-bottom: 0vh;
    }

    #basketball {
        font-size: 15vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        z-index: 10;
        position: relative;
    }

    #basketball-stroke {
        font-size: 15vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        -webkit-text-stroke: 2px #EDB12C;
        ;
        text-stroke: 1px #EDB12C;
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(0vh, 17vh);
        color: transparent;
        opacity: 0.2;
    }

    #basketball-stroke-2 {
        font-size: 15vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        -webkit-text-stroke: 2px #EDB12C;
        text-stroke: 1px #EDB12C;
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(0vh, 10vh);
        opacity: 0.6;
        color: transparent;
    }

    #basketball-stroke-3 {
        font-size: 15vh;
        letter-spacing: 1.5vh;
        line-height: 12vh;
        left: 0;
        -webkit-text-stroke: 1px white;
        text-stroke: 1px white;
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-5px, -5px);
        opacity: 0.6;
        color: transparent;
    }

    #herotext {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-70%, -110%);
    }

    #logo {
        /* position: absolute;
        top: 0;
        left: 0; */
        /* width: 10vh; */
        height: 6vh;
        /* margin-top: 2vh; */
        margin-left: 4vh;
        margin-right: -4vh;

    }



    #hero-video {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }

    @media (max-width: 640px) {
        #welcome {
            font-size: 2vh;
            letter-spacing: 1.5vw;
            position: relative;
            margin-bottom: 0vh;
            /* line-height: 12vw; */
        }

        #basketball {
            font-size: 6vh;
            letter-spacing: 1.5vw;
            line-height: 12vw;
        }

        #basketball-stroke {
            font-size: 6vh;
            letter-spacing: 1.5vw;
            line-height: 12vw;
            transform: translate(0vh, 12);
        }

        #basketball-stroke-2 {
            font-size: 6vh;
            letter-spacing: 1.5vw;
            line-height: 12vw;
            transform: translate(0vh, 9vh);
        }


        #herotext {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -160%);
        }
    }
</style>

</html>