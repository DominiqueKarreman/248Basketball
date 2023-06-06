@props(['class' => ''])

<nav class=" border-gray-200 dark:bg-gray-900 {{ $class }}">
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
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ url('/') }}"
                        class="block py-2 text-[2vh] pl-3 pr-4 {{ request()->routeIs('home') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#EDB12C] md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('Home') }}</a>
                </li>
                <li>
                    <a href="{{ url('/staff') }}"
                        class="block py-2 text-[2vh] pl-3 pr-4 {{ request()->routeIs('staff') || request()->routeIs('staff.show') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#EDB12C] md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('Ons team') }}</a>
                </li>
                <li>
                    <a href="#"
                        class="block py-2 text-[2vh] pl-3 pr-4 text-gray-100 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#EDB12C] md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('Nieuws') }}</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                        class="block py-[0.2vh] text-[2vh]  pl-3 pr-4 {{ request()->routeIs('contact') ? 'text-[#EDB12C]' : 'text-gray-100' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-[#EDB12C] md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{ __('Contact') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    nav {
        width: 100vw;
        z-index: 5;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
    }

    html {
        scroll-behavior: smooth;
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
