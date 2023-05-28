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
    <video autoplay muted loop id="hero-video" playsinline>
        <source src="/videos/onsteambackground.mp4" type="video/mp4">
    </video>

    <x-infoNavbar class="my-custom-class" />

    <div id="hero-landing">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">ontmoet het team</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">ontmoet het team</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">ontmoet het team</h1>
        </div>
    </div>
    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
            @foreach ($staffMembers as $staffMember)
                <a href="{{ route('staff.show', $staffMember->id) }}">
                    <li class="card">
                        <div class="img"><img src="/{{ $staffMember->image }}" alt="img" draggable="false">
                        </div>
                        <h2>{{ $staffMember->name }}</h2>
                    </li>
                </a>
            @endforeach
            {{-- <li class="card">
                <div class="img"><img src="/images/denzel.png" alt="img" draggable="false"></div>
                <h2>Denzel Vaneer</h2>

            </li>
            <li class="card">
                <div class="img"><img src="/images/jorg.png" alt="img" draggable="false"></div>
                <h2>Jorg Janssens</h2>

            </li>
            <li class="card">
                <div class="img"><img src="/images/mats.png" alt="img" draggable="false"></div>
                <h2>Mats swiers</h2>

            </li>
            <li class="card">
                <div class="img"><img src="/images/dave.png" alt="img" draggable="false"></div>
                <h2>Dave laterveer</h2>
            </li> --}}
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>
    <!-- <div class="cards flex  items-center flex-row absolute bottom-[7vh]">

        <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
            <polyline points="15 18 9 12 15 6"></polyline>
        </svg>
        <div class="card w-[18vw] mx-[2vw] justify-center flex items-center bg-[#EDB12C] rounded-lg">
            <img src="/images/denzel.png" class="w-[12vw]" alt="denzel">
            <h1 class="name text-white absolute font-semibold uppercase">Denzel Vaneer</h1>
        </div>
        <div class="card w-[18vw] mx-[2vw] justify-center flex items-center bg-[#EDB12C] rounded-lg">
            <img src="/images/jorg.png" class="w-[12vw]" alt="denzel">
            <h1 class="name text-white absolute font-semibold uppercase">Jorg Janssens</h1>
        </div>
        <div class="card w-[18vw] mx-[2vw] justify-center flex items-center bg-[#EDB12C] rounded-lg">
            <img src="/images/mats.png" class="w-[12vw]" alt="denzel">
            <h1 class="name text-white absolute font-semibold uppercase">TWAN</h1>
        </div>
        <div class="card w-[18vw] mx-[2vw] justify-center flex items-center bg-[#EDB12C] rounded-lg">
            <img src="/images/dave.png" class="w-[12vw]" alt="denzel">
            <h1 class="name text-white absolute font-semibold uppercase">Dave laterveer</h1>
        </div>
        <button onclick="console.log('test')">
            <svg xmlns="http://www.w3.org/2000/svg" width="10vh" height="10vh" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right pointer-events-auto">
                <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
        </button>
    </div> -->

</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');

    html {
        scroll-behavior: smooth;
        margin: none;
    }

    svg {
        cursor: pointer;
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
        font-size: 2vw;
        letter-spacing: 1.5vh;
        position: relative;
        margin-bottom: 0vh;
    }

    #basketball {
        font-size: 9vw;
        letter-spacing: 1.5vh;
        line-height: 9vw;
        left: 0;
        z-index: 10;
        position: relative;
    }

    .name {
        letter-spacing: 1vh;
        bottom: 6vh
    }

    #basketball-stroke {
        font-size: 9vw;
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
        font-size: 9vw;
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
        font-size: 9vw;
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
        top: 50%;
        left: 50%;
        width: 60vw;
        transform: translate(-65%, -110%);
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



    .wrapper {
        max-width: 80vw;
        top: 45vh;
        width: 100%;
        position: relative;
    }

    .wrapper i {
        top: 50%;
        height: 50px;
        width: 50px;
        cursor: pointer;
        font-size: 1.25rem;
        position: absolute;
        text-align: center;
        line-height: 50px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.23);
        transform: translateY(-50%);
        transition: transform 0.1s linear;
    }

    .wrapper i:active {
        transform: translateY(-50%) scale(0.85);
    }

    .wrapper i:first-child {
        left: -22px;
    }

    .wrapper i:last-child {
        right: -22px;
    }

    .wrapper .carousel {

        display: grid;
        grid-auto-flow: column;
        grid-auto-columns: calc((100% / 4) - 1vh);
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 12vh;
        border-radius: 8px;
        scroll-behavior: smooth;
        scrollbar-width: none;
        overflow-y: hidden;
    }

    .carousel::-webkit-scrollbar {
        display: none;
    }

    .carousel.no-transition {
        scroll-behavior: auto;
    }

    .carousel.dragging {
        scroll-snap-type: none;
        scroll-behavior: auto;
    }

    .carousel.dragging .card {
        cursor: grab;
        user-select: none;
    }

    .carousel :where(.card, .img) {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel .card {
        scroll-snap-align: start;
        height: auto;
        list-style: none;
        background: #EDB12C;
        cursor: pointer;
        padding-bottom: 15px;
        height: 32vh;
        flex-direction: column;
        border-radius: 8px;
    }

    .carousel .card .img {}

    .card .img img {

        height: 30vh;
        position: relative;
        bottom: -12vh
    }

    .carousel .card h2 {
        font-weight: 500;
        font-size: 2vh;
        z-index: 1;

        text-transform: uppercase;
        color: #fff;
        letter-spacing: 1.5vh;
        align-self: center;
        margin-bottom: 15vh;
        /* margin: auto; */
        width: 100%;
        text-align: center;
        /* margin: 30px 0 5px; */
    }

    .carousel .card span {
        color: #6A6D78;
        font-size: 1.31rem;
    }

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
            width: 100vw;
            left: 50%;
            transform: translate(-40%, -180%);
        }

        .wrapper {
            top: 35vh;
        }

        body {
            overflow-x: hidden;
        }
    }
</style>
<script>
    const wrapper = document.querySelector(".wrapper");
    const carousel = document.querySelector(".carousel");
    const firstCardWidth = carousel.querySelector(".card").offsetWidth;
    const arrowBtns = document.querySelectorAll(".wrapper i");
    const carouselChildrens = [...carousel.children];
    let isDragging = false,
        isAutoPlay = true,
        startX, startScrollLeft, timeoutId;
    // Get the number of cards that can fit in the carousel at once
    let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
    // Insert copies of the last few cards to beginning of carousel for infinite scrolling
    carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
        carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
    });
    // Insert copies of the first few cards to end of carousel for infinite scrolling
    carouselChildrens.slice(0, cardPerView).forEach(card => {
        carousel.insertAdjacentHTML("beforeend", card.outerHTML);
    });
    // Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
    carousel.classList.add("no-transition");
    carousel.scrollLeft = carousel.offsetWidth;
    carousel.classList.remove("no-transition");
    // Add event listeners for the arrow buttons to scroll the carousel left and right
    arrowBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
        });
    });
    const dragStart = (e) => {
        isDragging = true;
        carousel.classList.add("dragging");
        // Records the initial cursor and scroll position of the carousel
        startX = e.pageX;
        startScrollLeft = carousel.scrollLeft;
    }
    const dragging = (e) => {
        if (!isDragging) return; // if isDragging is false return from here
        // Updates the scroll position of the carousel based on the cursor movement
        carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
    }
    const dragStop = () => {
        isDragging = false;
        carousel.classList.remove("dragging");
    }
    const infiniteScroll = () => {
        // If the carousel is at the beginning, scroll to the end
        if (carousel.scrollLeft === 0) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
            carousel.classList.remove("no-transition");
        }
        // If the carousel is at the end, scroll to the beginning
        else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
            carousel.classList.add("no-transition");
            carousel.scrollLeft = carousel.offsetWidth;
            carousel.classList.remove("no-transition");
        }
        // Clear existing timeout & start autoplay if mouse is not hovering over carousel
        clearTimeout(timeoutId);
        if (!wrapper.matches(":hover")) autoPlay();
    }
    const autoPlay = () => {
        if (window.innerWidth < 800 || !isAutoPlay)
            return; // Return if window is smaller than 800 or isAutoPlay is false
        // Autoplay the carousel after every 2500 ms
        timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
    }
    autoPlay();
    carousel.addEventListener("mousedown", dragStart);
    carousel.addEventListener("mousemove", dragging);
    document.addEventListener("mouseup", dragStop);
    carousel.addEventListener("scroll", infiniteScroll);
    wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
    wrapper.addEventListener("mouseleave", autoPlay);
</script>

</html>
