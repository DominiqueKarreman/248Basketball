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
                    <div class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-1 overflow-hidden"><h1 class="z-10 absolute  centereddd text-white">Evenementen</h1></div>
                    <div class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-2 overflow-hidden"><h1 class="z-10 absolute  centereddd text-white">Velden</h1></div>
                    <div class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-3 overflow-hidden"><h1 class="z-10 absolute  centereddd text-white">Pick-ups</h1></div>
                    <div class="h-[20vh] w-[55vh] bg-white rounded-2xl flex align-center justify-center grid place-content-center background-4 overflow-hidden"><h1 class="z-10 absolute  centereddd text-white">Users</h1></div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .centereddd {
            position: inherit;
            top: 50%;
            left: 50%;
            /* transform: translate(-50%, -50%); */
            z-index: 22;
            
        }
        .background-1 {
            background-image: url('/images/DSC02303-min.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;}
        .background-2 {
            background-image: url('/images/DSC02326-min.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;}
        .background-3 {
            background-image: url('/images/DSC00929-min.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;}
        .background-4 {
            background-image: url('/images/DSC01039-min.jpg');
            background-size: cover;
            background-position: 20% 20%;
            background-repeat: no-repeat;}
    </style>
</x-app-layout>
