<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>248Basketball</title>
</head>


{{-- {{dd($member->image)}} --}}

<body class="bg-black flex flex-col place-items-center h-full w-full">
    <video autoplay muted loop id="hero-video" playsinline>
        <source src="/{{ $member->video }}" type="video/mp4">
    </video>

    <x-infoNavbar class="my-custom-class" />


    <div id="hero-landing">
        <div id="herotext">
            <h1 id="welcome" class="text-white font-semibold uppercase">248Basketball</h1>
            <h1 id="basketball" class="text-white font-semibold uppercase">{{ $member->name }}</h1>
            <h1 id="basketball-stroke" class="text-white font-semibold uppercase stroke">{{ $member->name }}</h1>
            <h1 id="basketball-stroke-2" class="text-white font-semibold uppercase stroke">{{ $member->name }}</h1>
        </div>
    </div>
    <div class="flex flex-col bottom-[10vh] top-[50vh] sm:flex-row relative gap-[-8vh] sm:gap-[18vh]">
        <div
            class="card bottom-[14vh] sm:bottom-[0vh] relative w-[80vw] sm:w-[18vw]  justify-center flex items-center bg-[#EDB12C] rounded-lg">
            <img src="/{{ $member->image }}" class="h-[30vh] " alt="denzel">
            <h1 class="name text-white text-center absolute max-w-fit w-[12vw] font-semibold uppercase">
                {{ $member->name }}</h1>
            <h1 class="rol text-white font-semibold uppercase">{{ $member->rol }}</h1>
        </div>
        <div class="text-white max-w-[80vw] sm:max-w-[35vw]">{{ $member->description }}</div>
        <div class="text-white flex flex-row sm:flex-col mt-[5vh] sm:mt-[0] gap-[3vh] items-center sm:gap-[1vh]">
            <h1>Socials
            </h1>
            @if ($member->instagram)
                <a href="{{ $member->instagram }}">
                    <svg width="8vh" height="8vh" viewBox="0 0 176 176" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_616_333)">
                            <path
                                d="M88 15.8469C111.513 15.8469 114.297 15.95 123.544 16.3625C132.137 16.7406 136.778 18.1844 139.872 19.3875C143.963 20.9688 146.919 22.8938 149.978 25.9531C153.072 29.0469 154.963 31.9688 156.544 36.0594C157.747 39.1531 159.191 43.8281 159.569 52.3875C159.981 61.6688 160.084 64.4531 160.084 87.9313C160.084 111.444 159.981 114.228 159.569 123.475C159.191 132.069 157.747 136.709 156.544 139.803C154.963 143.894 153.037 146.85 149.978 149.909C146.884 153.003 143.963 154.894 139.872 156.475C136.778 157.678 132.103 159.122 123.544 159.5C114.263 159.913 111.478 160.016 88 160.016C64.4875 160.016 61.7031 159.913 52.4563 159.5C43.8625 159.122 39.2219 157.678 36.1281 156.475C32.0375 154.894 29.0812 152.969 26.0219 149.909C22.9281 146.816 21.0375 143.894 19.4562 139.803C18.2531 136.709 16.8094 132.034 16.4312 123.475C16.0188 114.194 15.9156 111.409 15.9156 87.9313C15.9156 64.4188 16.0188 61.6344 16.4312 52.3875C16.8094 43.7937 18.2531 39.1531 19.4562 36.0594C21.0375 31.9688 22.9625 29.0125 26.0219 25.9531C29.1156 22.8594 32.0375 20.9688 36.1281 19.3875C39.2219 18.1844 43.8969 16.7406 52.4563 16.3625C61.7031 15.95 64.4875 15.8469 88 15.8469ZM88 0C64.1094 0 61.1188 0.103125 51.7344 0.515625C42.3844 0.928125 35.9562 2.44062 30.3875 4.60625C24.5781 6.875 19.6625 9.86563 14.7813 14.7812C9.86563 19.6625 6.875 24.5781 4.60625 30.3531C2.44062 35.9563 0.928125 42.35 0.515625 51.7C0.103125 61.1187 0 64.1094 0 88C0 111.891 0.103125 114.881 0.515625 124.266C0.928125 133.616 2.44062 140.044 4.60625 145.613C6.875 151.422 9.86563 156.338 14.7813 161.219C19.6625 166.1 24.5781 169.125 30.3531 171.359C35.9563 173.525 42.35 175.037 51.7 175.45C61.0844 175.863 64.075 175.966 87.9656 175.966C111.856 175.966 114.847 175.863 124.231 175.45C133.581 175.037 140.009 173.525 145.578 171.359C151.353 169.125 156.269 166.1 161.15 161.219C166.031 156.338 169.056 151.422 171.291 145.647C173.456 140.044 174.969 133.65 175.381 124.3C175.794 114.916 175.897 111.925 175.897 88.0344C175.897 64.1438 175.794 61.1531 175.381 51.7688C174.969 42.4188 173.456 35.9906 171.291 30.4219C169.125 24.5781 166.134 19.6625 161.219 14.7812C156.338 9.9 151.422 6.875 145.647 4.64062C140.044 2.475 133.65 0.9625 124.3 0.55C114.881 0.103125 111.891 0 88 0Z"
                                fill="white" />
                            <path
                                d="M88 42.7969C63.0438 42.7969 42.7969 63.0438 42.7969 88C42.7969 112.956 63.0438 133.203 88 133.203C112.956 133.203 133.203 112.956 133.203 88C133.203 63.0438 112.956 42.7969 88 42.7969ZM88 117.322C71.8094 117.322 58.6781 104.191 58.6781 88C58.6781 71.8094 71.8094 58.6781 88 58.6781C104.191 58.6781 117.322 71.8094 117.322 88C117.322 104.191 104.191 117.322 88 117.322Z"
                                fill="white" />
                            <path
                                d="M145.544 41.0092C145.544 46.8529 140.8 51.5623 134.991 51.5623C129.147 51.5623 124.438 46.8186 124.438 41.0092C124.438 35.1654 129.181 30.4561 134.991 30.4561C140.8 30.4561 145.544 35.1998 145.544 41.0092Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_616_333">
                                <rect width="176" height="176" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            @endif
            @if ($member->facebook)
                <a href="{{ $member->facebook }}">
                    <svg width="8vh" height="8vh" viewBox="0 0 175 176" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M175 88C175 39.3989 135.825 0 87.5 0C39.1751 0 0 39.3989 0 88C0 131.923 31.9973 168.329 73.8281 174.931V113.437H51.6113V88H73.8281V68.6125C73.8281 46.5575 86.8916 34.375 106.878 34.375C116.448 34.375 126.465 36.0938 126.465 36.0938V57.75H115.432C104.562 57.75 101.172 64.5339 101.172 71.5V88H125.439L121.56 113.437H101.172V174.931C143.003 168.329 175 131.923 175 88Z"
                            fill="white" />
                    </svg>

                </a>
            @endif
            @if ($member->linkedin)
                <a href="{{ $member->linkedin }}">
                    <svg width="8vh" height="8vh" viewBox="0 0 176 176" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_616_263)">
                            <path
                                d="M162.972 0H12.9937C5.80937 0 0 5.67188 0 12.6844V163.281C0 170.294 5.80937 176 12.9937 176H162.972C170.156 176 176 170.294 176 163.316V12.6844C176 5.67188 170.156 0 162.972 0ZM52.2156 149.978H26.0906V65.9656H52.2156V149.978ZM39.1531 54.5188C30.7656 54.5188 23.9938 47.7469 23.9938 39.3937C23.9938 31.0406 30.7656 24.2687 39.1531 24.2687C47.5063 24.2687 54.2781 31.0406 54.2781 39.3937C54.2781 47.7125 47.5063 54.5188 39.1531 54.5188ZM149.978 149.978H123.887V109.141C123.887 99.4125 123.716 86.8656 110.309 86.8656C96.7312 86.8656 94.6687 97.4875 94.6687 108.453V149.978H68.6125V65.9656H93.6375V77.4469H93.9812C97.4531 70.8469 105.978 63.8688 118.663 63.8688C145.097 63.8688 149.978 81.2625 149.978 103.881V149.978Z"
                                fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_616_263">
                                <rect width="176" height="176" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </a>
            @endif

        </div>
    </div>


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

    .card {
        /* bottom: 8vh;
        left: 27vh;
        position: absolute; */
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
        line-height: 7vw;
        left: 0;
        z-index: 10;
        position: relative;
    }

    .name {
        letter-spacing: 1vh;
        bottom: 6vh;
        display: flex;
        justify-content: center;
        margin: auto;

        align-items: center;
    }

    .rol {
        letter-spacing: 1vh;
        /* bottom: -4vh */
        color: #EDB12C;
        z-index: 10;
        position: absolute;
        font-size: 50vh;
        /* bottom: 7vw */
    }

    #basketball-stroke {
        font-size: 9vw;
        letter-spacing: 1.5vh;
        line-height: 7vw;
        left: 0;
        -webkit-text-stroke: 2px #EDB12C;
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
        line-height: 7vw;
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
        line-height: 7vw;
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
            transform: translate(0vh, 5vh);
        }

        #basketball-stroke-2 {
            font-size: 6vh;
            letter-spacing: 1.5vw;
            line-height: 12vw;
            transform: translate(0vh, 8vh);
        }


        #herotext {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -180%);
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
