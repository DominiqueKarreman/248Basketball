<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
               Locatie: {{$locatie->naam}}
            </h2>
        </div>
    </x-slot>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto mt-6 ">
        <form action="{{ route('events.store') }}" enctype="multipart/form-data" method="POST">
            @csrf

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
                            adres
                        </th>
                        <th id="veld_header" scope="col" class="py-3 px-6">
                            postcode
                        </th>

                        <th scope="col" class="py-3 px-6">
                            plaats
                        </th>
                        @if($locatie->veld_id)
                        <th scope="col" class="py-3 px-6">
                            veld
                        </th>
                        @endif


                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $locatie->naam }}
                        </th>

                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $locatie->adres }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $locatie->postcode }}
                        </th>
                        
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $locatie->plaats}} 
                        </th>
                        @if($locatie->veld_id)
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-indigo-500"
                            href="{{ route('velden.edit', $locatie->veld->id) }}">{{ $locatie->veld->naam }}</a>
                        </th>
                        @endif
                        
                        
                    </tr>
                    
                    
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th colspan="6" scope="row"
                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div id="map"></div>
                        </th>
                    </tr>
                   

                </tbody>
            </table>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Evenementen
           
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        aanmeldingen
                    </th>
                    <th scope="col" class="py-3 px-6">
                        datum
                    </th>
                    <th scope="col" class="py-3 px-6">
                        verantwoordelijke
                    </th>
            
                    <th scope="col" class="py-3 px-6">
                        Type event
                    </th>
                    <th scope="col" class="py-3 px-6">
                        actief
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">View</span>
                    </th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $event->naam }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $event->aantal_aanmeldingen }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $event->datumTijd }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            {{ $event->name }}

                        </th>
               
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            {{ $event->is_open ? 'Open' : 'Gesloten' }}

                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            {{ $event->is_active ? 'Actief' : 'Non actief' }}

                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @can('viewAny', $event)
                                <a class="text-indigo-500" href="{{ route('events.show', $event->id) }}">View</a>
                            @endcan

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
                        </td> 
                       --}}
                    </tr>
                @endforeach
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
            center: ["{{ $locatie->latitude }}", "{{ $locatie->longitude }}"],
            zoom: 25
        }
        const map = new L.map('map', mapOptions);

        //text on marker
        L.marker(["{{ $locatie->latitude }}", "{{ $locatie->longitude }}"]).bindPopup("<b>{{ $locatie->naam }}</b>")
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
