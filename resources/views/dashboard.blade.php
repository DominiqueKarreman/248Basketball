<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl ">
                {{-- <x-welcome /> --}}

                <div class="flex bg-black gap-[5vh] ">
                    <div id="evenementen"
                    class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-1 overflow-hidden">
                    <a href="{{route("events.index")}}">
                        <div class="content-div flex row align-center ">
                            
                            <image class="h-[4vh] mr-1" src="images/eventIcon.svg">
                                
                                <h1 class="z-10 absolute self-center centereddd text-white">Evenementen</h1>
                            </div>
                        </a>
                        </div>
                    <div id="velden"
                        class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-2 overflow-hidden">
                        <a href="{{route("velden.index")}}">
                        <div class="content-div flex row align-center ">

                            <image class="h-[4vh] mr-1" src="images/courtIcon.svg">

                                <h1 class="z-10 absolute self-center centereddd text-white">Velden</h1>
                        </div>
                    </a>
                    </div>
                    <div id="pickups"
                        class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center ease-in duration-300 background-3 overflow-hidden">
                        <a href="{{route("pickups.index")}}">
                        <div class="content-div flex row align-center ">

                            <image class="h-[4vh] mr-1" src="images/playerIcon.svg">

                                <h1 class="z-10 absolute self-center centereddd text-white">Pick-ups</h1>
                        </div>
                    </a>
                    </div>
                    <a href="{{route("users.index")}}">
                    <div id="users"
                        class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-4 overflow-hidden">
                        <div class="content-div flex row align-center ">

                            <image class="h-[4vh] mr-1" src="images/usersIcon.svg">
                                <h1 class="z-10 absolute self-center centereddd text-white">Users</h1>

                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let activeWidget = window.location.href
        let fullLink = window.location.origin + window.location.pathname
        activeWidget = activeWidget.replace(`${fullLink}?`, "")
        console.log(activeWidget, "asdasd")
        let evenementen = document.getElementById("evenementen")
        switch(activeWidget){
            case "evenementen":
            evenementen.classList.toggle("background-1-active")
            break
            case "velden":
            let velden = document.getElementById("velden")
            velden.classList.toggle("background-2-active")
            break
            case "pickups": 
            let pickups = document.getElementById("pickups")
            pickups.classList.toggle("background-3-active")
            break
            case "users":
            let users = document.getElementById("users")
            users.classList.toggle("background-4-active") 
            break
            case "http://127.0.0.1:8000/dashboard":
            evenementen.classList.toggle("background-1-active")
            break
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap');
        @import url('https://fonts.cdnfonts.com/css/avenir');

        .centereddd {
            position: inherit;
            top: 50%;
            left: 50%;
            /* transform: translate(-50%, -50%); */
            z-index: 22;
            font-weight: 1000;
            font-size: 3vh;
            font-family: 'Roboto', sans-serif;
            letter-spacing: .08rem;

        }

        .background-1 {
            background-color: black;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.5713935232296043) 42%, rgba(0, 0, 0, 0.558) 100%), url('/images/DSC02303.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: 2s;
        }

        .background-1-active {
            background-color: black;
            filter: brightness(1.4);
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/DSC02303.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: 2s;
        }

        .background-1:hover {
            filter: brightness(1.4);
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/DSC02303.jpg');

        }

        .background-2 {
            background-color: black;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.5713935232296043) 42%, rgba(0, 0, 0, 0.558) 100%), url('/images/press2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: 2s;
        }

        .background-2-active {
            background-color: black;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/press2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: 2s;
        }

        .background-2:hover {

            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/press2.jpg');

        }

        .background-3 {
            background-color: black;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.5713935232296043) 42%, rgba(0, 0, 0, 0.558) 100%), url('/images/DSC00929.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: 2s;
        }

        .background-3-active {
            background-color: black;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/DSC00929.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: 2s;
        }

        .background-3:hover {

            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/DSC00929.jpg');

        }

        .background-4 {
            background-color: black;
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.5713935232296043) 22%, rgba(0, 212, 255, 0) 100%),
                url('/images/DSC01039.jpg');
            background-size: cover;
            background-position: 20% 20%;
            background-repeat: no-repeat;
            transition: 1.5s;
        }

        .background-4-active {
            background-color: black;
            filter: brightness(1.4);
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/DSC01039.jpg');
            background-size: cover;
            background-position: 20% 20%;
            background-repeat: no-repeat;
            transition: 1.5s;
        }

        .background-4:hover {
            filter: brightness(1.4);
            background-image: linear-gradient(to top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0.177) 42%, rgba(0, 0, 0, 0) 100%), url('/images/DSC01039.jpg');

        }
    </style>
</x-app-layout>
