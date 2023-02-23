<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Veld Edit') }}
            </h2>
        </div>
    </x-slot>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto mt-6 ">

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            {{-- <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Posts
                @can('create', App\Models\Post::class)
                    <a href="{{ route('posts.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption> --}}
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Adres
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Plaats
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Competitie
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tijden
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Veld leider
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aantal bezoekers
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Conditie
                    </th>

                </tr>
            </thead>
            <tbody>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $veld->naam }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $veld->adres }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        {{ $veld->plaats }}

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input {{ $veld->competitie ? 'checked' : '' }} id="checked-checkbox" type="checkbox"
                            value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        {{ $veld->openingstijden }} {{ $veld->sluitingstijden }}

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        {{ $veld->veld_leider }}

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        {{ $veld->aantal_bezoekers }}

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        {{ $veld->conditie }}

                    </th>



                    {{-- <td class="py-4 px-6 text-right">
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="mx-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            @endcan

                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="mx-1 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            @endcan
                        </td> --}}
                </tr>

            </tbody>
        </table>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6 ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            {{-- <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Posts
                @can('create', App\Models\Post::class)
                    <a href="{{ route('posts.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption> --}}
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Longitude
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Latitude
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Postcode
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Capaciteit
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Aantal baskets
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Verlichting
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input type="text" name="longitude" id="longitude" value="{{ $veld->longitude }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="latitude" id="latitude" value="{{ $veld->latitude }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>

                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="postcode" id="postcode" value="{{ $veld->postcode }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>

                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="capaciteit" id="capaciteit" value="{{ $veld->capaciteit }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="aantal_baskets" id="aantal_baskets"
                            value="{{ $veld->aantal_baskets }}"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input {{ $veld->verlichting ? 'checked' : '' }} id="checked-checkbox" type="checkbox"
                            value=""
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </th>



                    {{-- <td class="py-4 px-6 text-right">
                            @can('update', $post)
                                <a href="{{ route('posts.edit', $post->id) }}"
                                    class="mx-1 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            @endcan

                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="mx-1 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                                </form>
                            @endcan
                        </td> --}}
                </tr>
                <table class="text-sm text-left w-full text-gray-500 dark:text-gray-400 ">
                    {{-- <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                        Posts
                        @can('create', App\Models\Post::class)
                            <a href="{{ route('posts.create') }}"
                                class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                        @endcan
                        <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
                    </caption> --}}

                    <tbody>
                        <tr class="bg-white test border-b dark:bg-gray-800 dark:border-gray-700">
                            <iframe class="map"
                            src="https://maps.google.com/maps?q={{ $veld->longitude }},{{ $veld->latitude }}&z=15&output=embed"
                            width="20%"  style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </tr>
                        <tr class="bg-white test border-b dark:bg-gray-800 dark:border-gray-700">

                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap  dark:text-white">
                                <button id="submit" type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Default</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

    </div>
    <style>
        body {
            overflow-x: hidden;
        }

        #submit {
            background-color: #4CAF50;
            padding: 2vh 15vh 2vh 15vh;
            align-self: center;
            justify-self: center;
            margin: auto;

        }

        .test {
            align-content: center;
            justify-content: center;
            align-items: center;
            margin: auto;
            display: flex;
            width: 100%;
        }

        .map {
            width: 100%;
            margin: 0;
            height: 15vh;
        }
    </style>
    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>
    {{-- <iframe src="https://maps.google.com/maps?q=52.3976433,5.27128817&z=15&output=embed"> --}}
    {{-- <iframe src="https://maps.google.com/maps?q=5.2712881,52.3976433&hl=es;&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

</x-app-layout>
