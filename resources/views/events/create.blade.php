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
                            Locatie
                        </th>
                        <th id="veld_header" scope="col" class="py-3 px-6">
                            veld
                        </th>
                        <th scope="col" class="py-3 px-6">
                            verantwoordelijke
                        </th>
                        <th scope="col" class="py-3 w-[12vw] px-6">
                            Tijden
                        </th>


                        <th scope="col" class="py-3 px-6">
                            Type Event
                        </th>


                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <input type="text" name="naam" id="naam" required
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <input type="text" name="locatie_naam" id="locatie"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <select name="veld_id" id="veld_select"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Geen
                                </option>
                                @foreach ($velden as $veld)
                                    <option value="{{ $veld->id }}">{{ $veld->naam }}</option>
                                @endforeach
                            </select>
                            <select name="locatie_id" id="locatie_select"
                                class="hidden bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Geen
                                </option>
                                @foreach ($locaties as $locatie)
                                    <option value="{{ $locatie->id }}">{{ $locatie->naam }}</option>
                                @endforeach
                                <option value="new">Nieuwe locatie</option>
                            </select>

                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <select required name="verantwoordelijke" id="verantwoordelijke"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Kies verantwoordelijke
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach

                            </select>

                        </th>
                        <th scope="row"
                            class="py-4 w-full px-6 font-medium text-gray-900 whitespace-nowrap flex dark:text-white">

                            <input type="datetime-local" name="start_tijd" id="startTijd" required
                                class="block  p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <input type="datetime-local" name="eind_tijd" id="eindTijd" required
                                class="block  p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            <select name="type_event" id="type_event"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Basketball">Basketball
                                </option>
                                <option value="Non_basketball">
                                    Non Basketball</option>
                            </select>

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
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <div class="imgdiv">
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div  class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                            800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" name="img_url"  type="file" class="hidden" />
                                </label>
                            </div>
                            <img src="" class="img_preview hidden" id="img_preview" alt="asdasd">
                            </div>
                        </th>

                    </tr>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <textarea type="text" name="beschrijving" id="beschrijving" required placeholder="Beschrijving"
                                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
                        </th>

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

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th id="longitude_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input type="text" name="longitude" id="longitude" required
                            class=" block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                    <th id="latitude_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="latitude" id="latitude" required
                            class=" block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>

                    <th id="postcode_row" scope="row"
                        class="hidden py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="postcode" id="postcode" required
                            class=" block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <input type="text" name="plaats" id="plaats" class="hidden">

                    </th>

                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <input type="text" name="capaciteit" id="capaciteit" required
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input id="checked-checkbox" type="checkbox" value="1" name="is_open"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <input type="text" name="prijs" id="prijs"
                            placeholder="Leeg houden als het gratis is"
                            class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </th>
                </tr>
                <tr id="search_row" class="hidden bg-white w-full border-b dark:bg-gray-800 dark:border-gray-700">

                    <td colspan="6" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap  dark:text-white">

                        <div class="searchbarinput ">

                            <input onkeydown="return event.key != 'Enter';" type="text" name="search"
                                id="search" placeholder="Zoek naar een plek"
                                class="bg-gray-50 border border-gray-300 w-full text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <button type="button" id="searchbutton"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2  dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Search</button>
                        </div>

                    </td>
                </tr>
            </tbody>
        </table>


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
                    {{-- <iframe class="map"
                                src="https://maps.google.com/maps?q=52.37232391185994,5.223880736178714&z=15&output=embed"
                                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                    <div id="map"></div>
                </tr>
                <tr class="bg-white test border-b dark:bg-gray-800 dark:border-gray-700">

                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap  dark:text-white">
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
        .img_preview {
            width: 100%;
            height: 100%;
            max-height: 32vh;
            object-fit: cover;
            object-position: center;
            border-radius: 0.5rem;
        }
        .imgdiv{
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
    <script>
        // example longitude
        const baseUrl = 'https://nominatim.openstreetmap.org/search?q=';
        const format = '&format=jsonv2';
        const addressDetails = '&addressdetails=1';
        const limit = '&limit=1';

        const query = 'basketbal veld';
        // const url = `${baseUrl}${query}${format}${addressDetails}${limit}`;
        let mapOptions = {
            center: [52.37232391185994, 5.223880736178714],
            zoom: 15
        }
        const map = new L.map('map', mapOptions);
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
            if (document.getElementById('type_event').value == 'Non_basketball') {
                getAddress();
            }
        });

        async function getLatLong(query) {
            const response = await fetch(`${baseUrl}${query}${format}${addressDetails}${limit}`);
            const data = await response.json();
            console.log(data);
            const [lat, lon] = [data[0].lat, data[0].lon];
            map.setView([lat, lon], 15);
            let oldName = document.getElementById('naam').value;
            document.getElementById('plaats').value = data[0].address.city || data[0].address.town || data[0].address
                .state || '';
            document.getElementById('naam').value = data[0].address.amenity || data[0].address.shop || data[0].address
                .building || data[0].address.office || data[0].address.leisure || data[0].address.tourism || oldName;
            document.getElementById('postcode').value = data[0].address.postcode || '';
            document.getElementById('adres').value =
                `${data[0].address.road || ''} ${data[0].address.house_number || ''}`;
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            return data;
        }

        async function getAddress() {
            const nominatimUrl = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`;

            fetch(nominatimUrl)
                .then(response => response.json())
                .then((data) => {
                    console.log(data);

                    let oldName = document.getElementById('naam').value
                    document.getElementById('naam').value = data.address.amenity || data.address.shop || data
                        .address.building || data.address.office || data.address.leisure || data.address.tourism ||
                        oldName;
                    document.getElementById('plaats').value = data.address.city || data.address.town || data.address
                        .state || '';
                    document.getElementById('postcode').value = data.address.postcode || '';
                    document.getElementById('locatie').value =
                        `${data.address.road || ''} ${data.address.house_number || ''}`;
                    console.log(data.address.city, "city")
                    return data;
                })
        }

        document.getElementById('searchbutton').addEventListener('click', function() {
            console.log('test')
            getLatLong(document.getElementById('search').value);
        })
        var oldVeld = document.getElementById('veld_select').value;
        document.getElementById('type_event').addEventListener('change', function() {
            document.getElementById('longitude_row').classList.toggle('hidden');
            document.getElementById('latitude_row').classList.toggle('hidden');
            document.getElementById('postcode_row').classList.toggle('hidden');
            document.getElementById('latitude_header').classList.toggle('hidden');
            document.getElementById('longitude_header').classList.toggle('hidden');
            document.getElementById('postcode_header').classList.toggle('hidden');
            document.getElementById('search_row').classList.toggle('hidden');
            document.getElementById('veld_header').innerHTML = "Selecteer locatie";
            document.getElementById('veld_select').classList.toggle('hidden');
            document.getElementById('locatie_select').classList.toggle('hidden');
            document.getElementById('locatie_select').required = !document.getElementById('locatie_select')
                .required;
            if (document.getElementById('type_event') !== "Basketball") {
                oldVeld = document.getElementById('veld_select').value;
                document.getElementById('veld_select').value = null
            } else {
                document.getElementById('veld_select').value = oldVeld
            }
        })
        let file = document.getElementById('dropzone-file')
        file.addEventListener('change', function() {
            console.log(this.files[0])
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                document.getElementById('img_preview').setAttribute("src", this.result);
            })
            document.getElementById('img_preview').classList.remove('hidden');
            reader.readAsDataURL(this.files[0]);
        });
        
        
        document.getElementById('veld_select').addEventListener('change', function() {

            @foreach ($velden as $veld)
                if ({{ $veld->id }} == document.getElementById('veld_select').value) {
                    document.getElementById('naam').value = "{{ $veld->naam }} Evenement";
                    document.getElementById('locatie').value = "{{ $veld->adres }}";
                    document.getElementById('postcode').value = "{{ $veld->postcode }}";
                    document.getElementById('latitude').value = "{{ $veld->latitude }}";
                    document.getElementById('longitude').value = "{{ $veld->longitude }}";
                    map.setView(["{{ $veld->latitude }}", "{{ $veld->longitude }}"], 25);
                    //marker
                    let marker = L.marker(["{{ $veld->latitude }}", "{{ $veld->longitude }}"]).addTo(map);
                    marker.bindPopup("{{ $veld->naam }}").openPopup();

                }
            @endforeach
            // document.getElementById('veldSelect').value

        })
        document.getElementById('locatie_select').addEventListener('change', function() {

            @foreach ($locaties as $locatie)
                if ({{ $locatie->id }} == document.getElementById('locatie_select').value) {
                    document.getElementById('naam').value = "{{ $locatie->naam }} Evenement";
                    document.getElementById('locatie').value = "{{ $locatie->adres }}";
                    document.getElementById('postcode').value = "{{ $locatie->postcode }}";
                    document.getElementById('latitude').value = "{{ $locatie->latitude }}";
                    document.getElementById('longitude').value = "{{ $locatie->longitude }}";
                    map.setView(["{{ $locatie->latitude }}", "{{ $locatie->longitude }}"], 25);
                    //marker
                    let marker = L.marker(["{{ $locatie->latitude }}", "{{ $locatie->longitude }}"]).addTo(map);
                    marker.bindPopup("{{ $locatie->naam }}").openPopup();

                }
            @endforeach
            // document.getElementById('veldSelect').value

        })
    </script>
    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>
    {{-- <iframe src="https://maps.google.com/maps?q=52.3976433,5.27128817&z=15&output=embed"> --}}
    {{-- <iframe src="https://maps.google.com/maps?q=5.2712881,52.3976433&hl=es;&output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

</x-app-layout>
