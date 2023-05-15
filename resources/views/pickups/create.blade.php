<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Evenement aanmaken') }}
            </h2>
        </div>
    </x-slot>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto mt-6 ">
        <form action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                {{-- <caption class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-white dark:text-white dark:bg-gray-800">
                    Posts
                    @can('create', App\Models\Post::class)
                    <a href="{{ route('posts.create') }}"
                    class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                    @endcan
                    <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
                </caption> --}}
                <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                    <tr>

                        <th scope="col" class="py-3 px-6">
                            Naam
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Max spelers
                        </th>
                        <th id="veld_header" scope="col" class="py-3 px-[5vw]">
                            veld
                        </th>

                        <th scope="col" colspan="2" class="py-3 w-[12vw] px-6">
                            Tijden
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Prive
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-zinc-700 border-b border-t border-zinc-900 dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="naam" id="naam" required
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="number" min="6" max="40" name="max_players" id="max_players"
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">

                            <select name="veld_id" id="veld_select"
                                class="bg-zinc-800 border border-black text-[#EDB12C] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Geen
                                </option>
                                @foreach ($velden as $veld)
                                    <option value="{{ $veld->id }}">{{ $veld->naam }}</option>
                                @endforeach
                            </select>
                            <select name="locatie_id" id="locatie_select"
                                class="hidden bg-zinc-800 border border-black text-[#EDB12C] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Geen
                                </option>
                                @foreach ($locaties as $locatie)
                                    <option value="{{ $locatie->id }}">{{ $locatie->naam }}</option>
                                @endforeach
                                <option value="new">Nieuwe locatie</option>
                            </select>

                        </th>

                        <th scope="row"
                            class="py-4 w-full px-6 font-medium text-[#EDB12C] whitespace-nowrap flex flex-col dark:text-white">

                            <input type="datetime-local" name="start_tijd" id="startTijd" required
                                class="block  p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">



                            <script>
                                document.getElementById('startTijd').addEventListener('change', function() {
                                    document.getElementById('eindTijd').min = this.value;
                                    document.getElementById('eindTijd').max = this.value.replace(/T.*/, 'T23:59');
                                });
                            </script>

                        </th>

                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="datetime-local" name="eind_tijd" id="eindTijd" required
                                class="block  p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                min="" max="" step="60">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input id="checked-checkbox" type="checkbox" value="1" checked name="prive"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </th>
                    </tr>

                    <tr class="bg-zinc-700 dark:bg-gray-800 dark:border-gray-700">

                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium bg-zinc-700 text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <textarea type="text" name="beschrijving" id="beschrijving" required placeholder="Beschrijving"
                                class="block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 placeholder-[#EDB12C] sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </th>

                    </tr>

                </tbody>
            </table>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6 ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            {{-- <caption class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-white dark:text-white dark:bg-gray-800">
                        Posts
                        @can('create', App\Models\Post::class)
                        <a href="{{ route('posts.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                        @endcan
                        <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
                    </caption> --}}
            <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="py-3 px-6">
                        Groep naam
                    </th>



            </thead>
            <tbody>

                <tr class="bg-zinc-700  dark:bg-gray-800 dark:border-gray-700">
                    <th id="longitude_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                        <input type="text" name="longitude" id="longitude" required
                            class=" block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>


                    <th scope="row" class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                        <input type="text" name="capaciteit" id="capaciteit" required
                            class="block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>


                </tr>
                <tr class="bg-zinc-700  dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" colspan="3"
                        class="py-4 flex flex-row flex-wrap w-full px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                        @foreach ($users as $user)
                        <div class="flex flex-col p-5 items-center">
                            @if (!$user->profile_photo_path)
                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                    class="h-8 w-8 rounded-full object-cover">
                            @else
                                <img class="h-8 w-8 rounded-full object-cover"
                                    src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}" />
                            @endif
                            <div class="text-xs text-gray-500">{{ explode(' ', $user->name)[0] }}. {{ substr(explode(' ', $user->name)[count(explode(' ', $user->name))-1], 0, 1) }}</div>
                        </div>
                        @endforeach
                    </th>
                </tr>

            </tbody>
        </table>


        <table class="text-sm text-left w-full text-gray-500 dark:text-gray-400 ">
            {{-- <caption class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-white dark:text-white dark:bg-gray-800">
                                    Posts
                                    @can('create', App\Models\Post::class)
                                    <a href="{{ route('posts.create') }}"
                                    class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                                    @endcan
                                    <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
                                </caption> --}}

            <tbody>


                <tr class="bg-zinc-800 test  dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap  dark:text-white">
                        <button id="submit" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Maak
                            Evenement aan</button>
                    </td>
                </tr>
            </tbody>
        </table>
        </form>

    </div>
    <style>
        body {
            overflow-x: hidden;
        }

        #submit {
            background-color: #EDB12C;
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

        .img_preview {
            width: 100%;
            height: 100%;
            max-height: 32vh;
            object-fit: cover;
            object-position: center;
            border-radius: 0.5rem;
        }

        .imgdiv {
            display: flex;
        }


        .searchbarinput {

            justify-content: space-between;
            align-items: center;
            /* margin: auto; */
            display: flex;
            width: 100%;
            gap: 3vh;
        }

        #map {
            width: 100%;
            margin: 0;
            height: 30vh;
        }
    </style>
    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>
    {{-- <iframe src="https://maps.google.com/maps?q=52.3976433,5.27128817&z=15&output=embed"> --}}
    {{-- <iframe src="https://maps.google.com/maps?q=5.2712881,52.3976433&hl=es;&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

</x-app-layout>
