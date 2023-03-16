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
                {{-- <caption class="p-5 text-lg font-semibold text-left text-white bg-white dark:text-white dark:bg-gray-800">
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
                        @if ($eventT->veld)
                            <th scope="col" class="py-3 px-6">
                                Locatie
                            </th>
                            <th id="veld_header" scope="col" class="py-3 px-6">
                                veld
                            </th>
                        @else
                            <th scope="col" class="py-3 px-6">
                                Locatie
                            </th>
                        @endif

                        <th scope="col" class="py-3 px-6">
                            verantwoordelijke
                        </th>
                        <th scope="col" class="py-3 w-[12vw] px-6">
                            Datum
                        </th>


                        <th scope="col" class="py-3 px-6">
                            duratie
                        </th>

                        <th scope="col" class="py-3 px-6">
                            type event
                        </th>


                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-zinc-700 border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $eventT->naam }}
                        </th>
                        @if ($eventT->veld)
                            <th scope="row"
                                class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                                {{ $eventT->veld->adres }}
                            </th>
                        @endif
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            @if ($eventT->veld)
                                <a class="text-[#EDB12C]"
                                    href="{{ route('velden.edit', $eventT->veld->id) }}">{{ $eventT->veld->naam }}</a>
                            @else
                                <a class="text-[#EDB12C]"
                                    href="{{ route('locaties.show', $eventT->locatie->id) }}">{{ $eventT->locatie->naam }}</a>
                            @endif

                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $eventT->verantwoordelijke->name }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $eventT->datumTijd }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $eventT->duratie / 60 }} Minuten
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            @if ($eventT->veld)
                                Basketball
                            @else
                                Non Basketball
                            @endif
                        </th>
                    </tr>
                    <tr class="bg-zinc-700 border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700">

                        <th colspan="7" scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            <div class="imgdiv">
                                <div class="beschrijvingDiv">
                                    <h1 class="text-xl ">Beschrijving:</h1>
                                    <p>{{ $eventT->beschrijving }}</p>
                                   
                                </div>
                                <img src="../{{ $eventT->img_url }}" class="img_preview" id="img_preview"
                                    alt="asdasd">
                            </div>
                        </th>

                    </tr>
                    <tr class="bg-zinc-800 border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700">

                        <th colspan="7" scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            @can('update', $eventT)
                            <a href="{{ route('events.edit', $eventT->id) }}"
                              class="text-white bg-[#EDB12C] hover:bg-[#DCA01B] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Edit event</a>
                        @endcan
                        </th>
                    </tr>
                    {{-- <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th colspan="7" scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            <textarea type="text" name="beschrijving" id="beschrijving" required placeholder="Beschrijving"
                                class="block w-full p-2 text-white border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </th>

                    </tr> --}}

                </tbody>
            </table>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6 ">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            {{-- <caption class="p-5 text-lg font-semibold text-left text-white bg-white dark:text-white dark:bg-gray-800">
                        Posts
                        @can('create', App\Models\Post::class)
                        <a href="{{ route('posts.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                        @endcan
                        <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
                    </caption> --}}
            <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th id="longitude_header" scope="col" class="hidden py-3 px-6">
                        Longitude
                    </th>
                    <th id="latitude_header" scope="col" class="hidden py-3 px-6">
                        Latitude
                    </th>

                    <th id="postcode_header" scope="col" class="hidden py-3 px-6">
                        Postcode
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Capaciteit
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Public Evenement
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Prijs
                </tr>
            </thead>
            <tbody>

                <tr class="bg-zinc-700  border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700">
                    <th id="longitude_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                        <input type="text" name="longitude" id="longitude" required
                            class=" block w-full p-2 text-white border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th id="latitude_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">

                        <input type="text" name="latitude" id="latitude" required
                            class=" block w-full p-2 text-white border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>

                    <th id="postcode_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">

                        <input type="text" name="postcode" id="postcode" required
                            class=" block w-full p-2 text-white border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <input type="text" name="plaats" id="plaats" class="hidden">

                    </th>

                    <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                        {{ $eventT->capaciteit }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                        {{ $eventT->is_open ? 'Ja' : 'Nee' }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                        {{ $eventT->prijs ? "{$eventT->prijs}€" : 'Gratis' }}
                    </th>
                </tr>
            </tbody>
        </table>


        <table class="text-sm text-left w-full text-gray-500 dark:text-gray-400 ">
            <tbody>

                <tr class="bg-white test border-b dark:bg-gray-800 dark:border-gray-700">
                    <div id="map"></div>
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

        .beschrijvingDiv {
            display: flex;
            flex-direction: column;


            width: 100%;
        }

        .img_preview {
            flex: 1;
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
            height: 40vh;
        }
    </style>
    <script>
        // example longitude
        const baseUrl = 'https://nominatim.openstreetmap.org/search?q=';
        const format = '&format=jsonv2';
        const addressDetails = '&addressdetails=1';
        const limit = '&limit=1';

        const query = 'basketbal veld';
        // const url = `${baseUrl}${query}${format}${addressDetails}${limit}`;

        let mapOptions = {
            center: ["{{ $eventT->latitude }}", "{{ $eventT->longitude }}"],
            zoom: 25
        }
        const map = new L.map('map', mapOptions);

        //text on marker
        L.marker(["{{ $eventT->latitude }}", "{{ $eventT->longitude }}"]).bindPopup("<b>{{ $eventT->naam }}</b>")
            .openPopup().addTo(map);
        let layer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
        map.addLayer(layer);
        let [lat, long] = [document.getElementById('latitude').value, document.getElementById('longitude')
            .value
        ];

        map.on('click', function(e) {
            // let marker = L.marker(e.latlng).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
            lat = e.latlng.lat;
            lon = e.latlng.lng;
        });
    </script>
    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>
    {{-- <iframe src="https://maps.google.com/maps?q=52.3976433,5.27128817&z=15&output=embed"> --}}
    {{-- <iframe src="https://maps.google.com/maps?q=5.2712881,52.3976433&hl=es;&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

</x-app-layout>
