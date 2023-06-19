@props(['class' => ''])
<footer
    class="h-[100vh] mt-[10vh]  md:h-[45vh]  bg-zinc-900 flex align-center justify-around items-center p-[5vw] flex-col md:flex-row">
    <img src="/images/logo.png" alt="" class="w-[15vw] object-contain ">
    <div id="cols" class="flex flex-col md:flex-row justify-around self-center h-[100%]  md:h-[80%] gap-[5vw]">


        <div id="col1" class="flex flex-col gap-[1vh] align-center justify-start">
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="/">Home</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]"
                href="{{ route('programme.skills') }}">Skills Trainingen</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="{{ route('programme.join') }}">The
                programme</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="">Events & clinics</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="">24/8 Gallery</a>
        </div>
        <div id="col2" class="flex flex-col gap-[1vh] align-center justify-start">
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]"
                href="{{ route('guestViews.about') }}">About us</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]"
                href="{{ route('guestViews.stage') }}">Stage</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="">Partners &
                sponsors</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="{{ route('contact') }}">Contact</a>

        </div>
        <div id="col3" class="flex flex-col gap-[1vh] align-center justify-start">
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="">Algemene
                voorwaarden</a>
            <a class="text-white font-black text-[2vh] hover:text-[#EDB12C]" href="">Privacy</a>

        </div>
        <div id="col4" class="flex flex-col  justify-start">
            <h1 class="text-white font-black text-[4vh] " href="">Contact</h1>
            <p class="text-white text-[1.5vh] w-[10vw]">INFO@248BASKETBALL.NL
                KONINGINNEWEG 1, 1312 AW ALMERE</p>
        </div>


    </div>

</footer>
<style>
    footer {
        background-image: linear-gradient(to bottom, black, #1c1c1c);
    }
</style>
