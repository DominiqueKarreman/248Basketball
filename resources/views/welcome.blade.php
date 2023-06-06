<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>248Basketball</title>
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
                    <p id="subtext" class="text-white ">What if we would tell you, we can actually make a difference
                        in
                        the
                        world?</p>
                    <a href="{{ route('programme.join') }}" id="button2" class="text-[#EDB12C]">WORDT LID</a>
                </div>
            </div>

        </div>
    </div>



    <script>
        const element = document.querySelector('#programmeDiv');
        const statDiv = document.querySelector('#statDiv');
        const observer = new IntersectionObserver(entries => {
            console.log(entries, "entries")
            if (entries[0].isIntersecting) {
                console.log("test")
                element.classList.add('animate');
            } else {
                // element.classList.remove('animate');
            }
        })
        observer.observe(element)


        const observer2 = new IntersectionObserver(entries => {

            if (entries[0].isIntersecting) {
                let stat1 = document.getElementById("stat1")
                let stat2 = document.getElementById("stat2")
                let stat3 = document.getElementById("stat3")



                animateNumber(stat1, 45)
                animateNumber(stat2, 155)
                animateNumber(stat3, 452)
                observer2.unobserve(statDiv)

                statDiv.style.opacity = 1;
                console.log("statdiv: intersecting: ", entries[0].isIntersecting)
            } else {
                // statDiv.style.opacity = 0;
                console.log("statDiv: intersecting: ", entries[0].isIntersecting)
            }
        }, {
            threshold: 0.9
        });

        observer2.observe(statDiv);

        observer.observe(statDiv);

        function animateNumber(element, finalNumber) {
            let currentNumber = 0;
            const duration = 1750; // 2 seconds
            const step = finalNumber / (duration / 10); // increment by 10ms

            const intervalId = setInterval(() => {
                currentNumber += step;
                if (currentNumber >= finalNumber) {
                    clearInterval(intervalId);
                    currentNumber = finalNumber;
                }
                element.textContent = Math.round(currentNumber);
            }, 10);
        }
    </script>

</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

    /* .stat {
        opacity: 0;
    } */
    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    #statDiv {
        opacity: 0;

    }



    .programme-content {
        position: relative;
        bottom: 5vh;
    }

    @media (prefers-reduced-motion: reduce) {
        #statDiv {
            animation: none;
            opacity: 1;
        }
    }

    a:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease-in-out;
    }

    #statDiv {
        position: relative;
        top: 5vh;
        width: 100vw;
        align-self: center;

    }

    .stat {
        display: flex;
        flex-direction: column;
        gap: 2vh;
        justify-content: space-between;
        align-items: center;
        margin: 0 auto;
        max-width: 800px;
        padding: 2rem;
        max-width: 20vw;

        border-radius: 0.5rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }

    .stat h1 {
        font-size: 3rem;
        font-weight: 900;
        color: #EDB12C;
        margin: 0;
    }

    .stat p {
        font-size: 1.5rem;
        margin: 0;
    }

    #programmeDiv {
        opacity: 0;
        margin-top: 15vh;
        width: 100vw;
        transform: translateX(-100%);
        transition: opacity 1s ease-out, transform 1s ease-out;
    }

    #programmeDiv {
        background-image: url('/images/programmeOverlay2.jpg');
        background-size: cover;
        background-position: center;
        display: flex;
        align-content: center;
        opacity: 0;
        height: 90vh;
        width: 100vw;
        animation: fade-in 1s ease-out forwards;
        animation-delay: 0.7s;
        position: relative;
    }


    #programme-overlay {
        position: absolute;
        top: -9vh;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: linear-gradient(to bottom, black 0%, black 10%, transparent 30%, transparent 100%, black 80%, black 100%);
        z-index: 0;
    }

    #programme-overlay-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100vw;
        height: 20%;
        background: linear-gradient(to top, black 0%, black 10%, transparent 30%, transparent 100%, rgba(0, 0, 0, 0.612) 80%, black 100%);
    }

    @keyframes fade-in {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    #programmeDiv.animate {
        opacity: 1;
        transform: translateX(0);
    }

    #statDiv.animate {
        opacity: 1;
        transform: translateX(0);
    }

    html {
        scroll-behavior: smooth;
        margin: none;
        max-width: 100vw;
    }

    .nameRole {
        font-weight: bold;
        font-size: 21vh;
    }

    svg {
        cursor: pointer;
    }

    * {
        font-family: 'Inter', sans-serif;
        scroll-behavior: smooth;

    }

    #hero-landing {
        /* background-image: url('images/DSC00929-min.jpg'); */
        /* background-color: black; */
        /* background-size: cover; */
        background-position: 0 40%;
        background-repeat: no-repeat;

    }

    #gradient-overlay {
        position: absolute;
        top: -9vh;
        left: 0;
        width: 100%;
        height: 100vh;
        background: linear-gradient(to bottom, transparent 50%, black);
        z-index: 0;
    }

    #welcome {
        font-size: 2vw;
        letter-spacing: 1.5vh;
        position: relative;
        margin-bottom: 0vh;
    }

    #button {
        position: relative;
        margin-top: 20vh;
        background-color: #EDB12C;
        color: black;
        border: none;
        padding: 1vh 2vh;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 2vh;
        border-radius: 2vh;
        font-weight: bold;
        cursor: pointer;
    }

    #button2 {
        position: relative;
        margin-top: 5vh;
        left: 10vw;
        color: #EDB12C;
        border: 0.4vh solid #EDB12C;
        padding: 1vh 2vh;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 4vh;
        cursor: pointer;
        z-index: 11;
    }

    #button2:hover {
        transform: scale(1.5);
        transition: transform 0.2s ease-in-out;
    }


    #basketball {
        font-size: 14vh;
        letter-spacing: 1.5vh;
        line-height: 9vw;
        left: 0;
        z-index: 10;
        position: relative;
    }

    #joindeprogramma {
        font-size: 7vw;
        width: 60vw;
        font-weight: 900;
        letter-spacing: 1.5vh;
        line-height: 6vw;
        margin-top: 25vh;
        left: 10vw;
        z-index: 10;
        position: relative;
        color: #EDB12C;
        animation: slide-in 1s ease-out forwards;
    }

    #joindeprogramma span {
        display: inline-block;
        animation: slide-in 1s ease-out forwards;
    }

    #subtext {
        z-index: 10;
        /* position: relative; */
        font-size: 3vw;
        margin-top: 5vh;
        opacity: 0;
        animation: slide-in 0.8s ease-out forwards;
        animation-delay: 0.7s;
    }

    #button2 {
        font-size: 3vw;
        margin-top: 5vh;
        opacity: 0;
        animation: slide-in 0.8s ease-out forwards;
        animation-delay: 0.7s;
    }

    @keyframes slide-in {
        from {
            opacity: 0;
            transform: translateX(-100%);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    #joindeprogramma span:nth-child(1) {
        animation-delay: 0s;
    }

    #joindeprogramma span:nth-child(2) {
        animation-delay: 0.2s;
    }

    #joindeprogramma span:nth-child(3) {
        animation-delay: 0.4s;
    }

    #joindeprogramma span:nth-child(4) {
        animation-delay: 0.6s;
    }

    #joindeprogramma span:nth-child(5) {
        animation-delay: 0.8s;
    }

    #subtext {
        font-size: 1.5vw;
        letter-spacing: 0.5vh;
        line-height: vw;
        width: 50vw;
        left: 10vw;
        z-index: 10;
        position: relative;
        color: white;
    }

    .name {
        letter-spacing: 1vh;
        bottom: 6vh
    }

    #basketball-stroke {
        font-size: 14vh;
        letter-spacing: 1.5vh;
        line-height: 9vw;
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
        font-size: 14vh;
        letter-spacing: 1.5vh;
        line-height: 9vw;
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
        font-size: 14vh;
        letter-spacing: 1.5vh;
        line-height: 9vw;
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
        top: 5vh;

        left: 50%;
        width: 60vw;
        transform: translate(-65%, -0%);

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

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');



    @media screen and (max-width: 900px) {
        .wrapper .carousel {
            grid-auto-columns: calc((100% / 2) - 9px);
        }
    }

    @media screen and (max-width: 600px) {
        .wrapper .carousel {
            grid-auto-columns: 100%;
        }
    }

    #hero-video {
        position: relative;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        margin-top: -10vh;
        object-fit: cover;
        z-index: -1;


    }

    @media (max-width: 640px) {
        .rol {
            letter-spacing: 1vh;
            /* bottom: -4vh */
            color: #ffffff;
            z-index: 10;
            position: relative;
            font-size: 2vh;

            bottom: -8vh;
        }

        .card .img img {

            height: 30vh;
            position: relative;
            bottom: -5vh
        }

        .carousel .card h2 {
            font-weight: bold;
            font-size: 2vh;
            z-index: 1;

            text-transform: uppercase;
            color: #fff;
            letter-spacing: 1.5vh;
            align-self: center;

            bottom: 5vh;
            position: relative;
            /* margin: auto; */
            width: 100%;
            text-align: center;
            /* margin: 30px 0 5px; */
        }

        .rolnaam {
            font-weight: 500;
            font-size: 2vh;
            z-index: 1;

            text-transform: uppercase;
            color: #fff;
            /* letter-spacing: 1.5vh; */
            bottom: 4vh;
            position: relative;
            align-self: center;
            /* margin-bottom: 10vh; */
            /* margin: auto; */
            width: 100%;
            text-align: center;
        }

        #welcome {
            font-size: 2vh;
            letter-spacing: 1.5vw;
            position: relative;
            margin-bottom: 0vh;
            width: 100%;
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
            transform: translate(0vh, 8vh);
        }

        #basketball-stroke-2 {
            font-size: 6vh;
            letter-spacing: 1.5vw;
            line-height: 12vw;
            transform: translate(0vh, 5vh);
        }


        #herotext {
            position: absolute;
            top: 50%;
            width: 80%;
            left: 50%;
            transform: translate(-50%, -180%);
        }

        .wrapper {
            top: 35vh;
        }

        body {
            overflow-x: hidden;
        }
    }
</style>



</html>
