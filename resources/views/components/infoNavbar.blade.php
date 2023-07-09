@props(['class' => ''])

<nav class=" border-gray-200 z-50 dark:bg-gray-900 {{ $class }}">
    <div class="flex w-100vw bg-transparent flex-wrap items-center justify-between sm:w-[90vw] mx-auto p-4">
        <a href="{{ url('/') }}" class="flex items-center">
            <img src="{{ asset('images/logo.png') }}" id="logo" alt="">
        </a>
        <div class="flex md:order-2">
            <a href="{{ route('login') }}">
                <button type="button"
                    class="text-black bg-[#EDB12C] hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Login') }}
                </button>
            </a>
            <button data-collapse-toggle="navbar-cta" type="button"
                class="inline-flex items-center p-2 text-sm text-gray-100 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </button>

        </div>
        <div class="items-center z-30 justify-between hidden w-full md:flex md:w-auto md:order-1 left-0 top-[8vh] md:top-[0] absolute md:relative "
            id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-zinc-800 md:flex-row md:space-x-8 md:mt-0  md:border-0  md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-2 text-[2vh] pl-3 pr-4 {{ request()->routeIs('home') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#EDB12C] md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('Home') }}</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 {{ request()->routeIs('programme.skills') || request()->routeIs('programme.join') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded  md:hover:bg-transparent md:hover:text-[#EDB12C]  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700  md:dark:hover:bg-transparent">24/8
                        Academy
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="{{ route('programme.join') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">The
                                    Programme</a>
                            </li>
                            <li>
                                <a href="{{ route('programme.skills') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Skills
                                    trainingen</a>
                            </li>

                    </div>
                </li>
                <li>
                    <button id="dropdownNavbarLinkEvent" data-dropdown-toggle="dropdownNavbarEvent"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 {{ request()->routeIs('home') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded  md:hover:bg-transparent md:hover:text-[#EDB12C]  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700  md:dark:hover:bg-transparent">
                        Events & Clinics
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbarEvent"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                            aria-labelledby="dropdownLargeButtonEvent">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Evenementen
                                    & Clinics</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Gallerij</a>
                            </li>

                    </div>
                </li>
                <li>
                    <button id="dropdownNavbarLinkOns" data-dropdown-toggle="dropdownNavbarOns"
                        class="flex items-center justify-between w-full py-2 pl-3 pr-4 {{ request()->routeIs('staff') || request()->routeIs('guestViews.about') || request()->routeIs('guestViews.stage') || request()->routeIs('contact') || request()->routeIs('guestViews.partners') || request()->routeIs('staff.show') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded  md:hover:bg-transparent md:hover:text-[#EDB12C]  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0  md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700  md:dark:hover:bg-transparent">
                        Over ons
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbarOns"
                        class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                            aria-labelledby="dropdownLargeButtonOns">
                            <li>
                                <a href="{{ route('guestViews.about') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">About
                                    us</a>
                            </li>
                            <li>
                                <a href="{{ url('/staff') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ons
                                    team</a>
                            </li>
                            <li>
                                <a href="{{ route('guestViews.partners') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Partners
                                    & Sponsors</a>
                            </li>
                            <li>
                                <a href="{{ route('guestViews.stage') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Stage</a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Contact</a>
                            </li>
                    </div>
                </li>

                <li>
                    <a href="#"
                        class="block py-2 text-[2vh] pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#EDB12C] md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('Nieuws') }}</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

<style>
    nav {
        position: sticky;
        top: 0;
        width: 100vw;
        z-index: 5;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
    }

    html {
        scroll-behavior: smooth;
        overflow-x: hidden;
        margin: none;
    }

    #logo {
        /* position: absolute;
        top: 0;
        left: 0; */
        /* width: 10vh; */
        height: 6vh;
        /* margin-top: 2vh; */
        /* margin-left: 4vh;
        margin-right: -4vh; */

    }
</style>
