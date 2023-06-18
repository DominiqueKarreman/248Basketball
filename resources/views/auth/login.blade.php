<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="/styles/auth.css">
    <title>24/8 Basketball - Login</title>
</head>

<body class="bg-black items-center justify-center h-[100vh] flex align-center ">
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif
    <div id="loginBox" class="flex bg-zinc-800 h-[70vh] w-[60vw] flex-row">
        <img src="/images/loginPhoto.png" id="loginFoto" class="w-1/2 drop-shadow-2xl object-cover" alt="">
        <div id="normalLogin" class="w-1/2 justify-center align-center items-center p-[5vh]">
            <img src="/images/logo.png" class="w-[15vh] mx-auto self-center" alt="">
            <h1 class="text-white text-center text-3xl font-black ">Login</h1>
            <hr class="w-[80%] h-1 mx-auto bg-zinc-600 border-0 rounded my-[2vh] dark:bg-gray-700">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-black text-white  dark:text-white">
                        Email</label>
                    <input type="email" name="email" id="email1"
                        class="bg-zinc-800 border border-[#EDB12C] text-[#EDB12C] sm:text-sm rounded-lg focus:ring-[#EDB12C] focus:border-[#EDB12C] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="name@company.com" required="">

                </div>
                <div class="mt-[3vh]">
                    <label for="email" class="block mb-2 text-sm font-black text-white  dark:text-white">
                        Wachtwoord</label>
                    <input type="password" name="password" id="password1"
                        class="bg-zinc-800 border border-[#EDB12C] text-[#EDB12C] sm:text-sm rounded-lg focus:ring-[#EDB12C] focus:border-[#EDB12C] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="••••••••" required="">
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center mt-[2vh] justify-between">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" type="checkbox"
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                        </div>
                        <div class="ml-3 text-sm">
                            <label id="remember" for="remember" class="text-gray-500 dark:text-gray-300">Remember
                                me</label>
                        </div>
                    </div>
                    <a href="#" id="forgotPassword"
                        class="text-[1.5vh] font-medium text-[#EDB12C] hover:underline dark:text-primary-500">Forgot
                        password?</a>
                </div>


                <button type="submit"
                    class="w-full text-white bg-[#EDB12C] my-[3vh] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                    in</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                    Don’t have an account yet? <a href="#"
                        class="font-medium text-[#EDB12C] hover:underline dark:text-primary-500">Sign up!</a>
                </p>
            </form>
        </div>

    </div>
    <div id="gradient-overlay"></div>
    <div id="responsiveDiv" class="w-1/2 justify-center align-center items-center p-[5vh] relative">
        <img src="/images/logo.png" class="w-[15vh] mx-auto self-center z-10" alt="">
        <h1 class="text-white text-center text-3xl font-black z-10">Login</h1>
        <hr class="w-[80%] h-1 mx-auto bg-zinc-600 border-0 rounded my-[2vh] dark:bg-gray-700 z-10">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="email" class="block mb-2 text-sm font-black text-white  dark:text-white">
                    Email</label>
                <input type="email" name="email" id="email2"
                    class="bg-zinc-800 border border-[#EDB12C] text-[#EDB12C] sm:text-sm rounded-lg focus:ring-[#EDB12C] focus:border-[#EDB12C] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@company.com" required="">
            </div>
            <div class="mt-[3vh]">
                <label for="email" class="block mb-2 text-sm font-black text-white  dark:text-white">
                    Email</label>
                <input type="password" name="password" id="password2"
                    class="bg-zinc-800 border border-[#EDB12C] text-[#EDB12C] sm:text-sm rounded-lg focus:ring-[#EDB12C] focus:border-[#EDB12C] block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="name@company.com" required="">
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex items-center mt-[2vh] justify-between">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input id="remember" aria-describedby="remember" type="checkbox"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                    </div>
                    <div class="ml-3 text-sm">
                        <label id="remember" for="remember" class="text-gray-500 dark:text-gray-300">Remember
                            me</label>
                    </div>
                </div>
                <a href="#" id="forgotPassword"
                    class="text-[1.5vh] font-medium text-[#EDB12C] hover:underline dark:text-primary-500">Forgot
                    password?</a>
            </div>


            <button type="submit"
                class="w-full text-white bg-[#EDB12C] my-[3vh] hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign
                in</button>
            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                Don’t have an account yet? <a href="#"
                    class="font-medium text-[#EDB12C] hover:underline dark:text-primary-500">Sign up!</a>
            </p>
        </form>
    </div>
    <script>
        // Get the input element
        const inputElement = document.getElementById('password1');
        const inputElement2 = document.getElementById('password2');
        const inputElement3 = document.getElementById('email1');
        const inputElement4 = document.getElementById('email2');

        @error('email')
            inputElement.classList.add('input-error');
            inputElement2.classList.add('input-error');
            inputElement3.classList.add('input-error');
            inputElement4.classList.add('input-error');
        @enderror
        // Check if the input is valid
    </script>
</body>

</html>
