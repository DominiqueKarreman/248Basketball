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
        <form action="{{ route('staff.store') }}" enctype="multipart/form-data" method="POST">
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
                            Rol
                        </th>
                        <th scope="col" class="py-3 px-6">
                            email
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Gebruiker
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-zinc-700 border-b border-t border-zinc-900 dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="name" id="naam" required
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="role" id="rol" required
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="email" id="email" required
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap  dark:text-white">
                            <select required name="user_id" id="gebruiker" 
                                class="bg-zinc-800 border border-black text-[#EDB12C] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="">Selecteer
                                </option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                                <option value="">Geen</option>
                            </select>

                        </th>


                    </tr>
                    <tr class="bg-zinc-700  dark:bg-gray-800 border-b border-t border-zinc-900 dark:border-gray-700">
                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            foto van Medewerker
                        </th>
                    </tr>
                    <tr class="bg-zinc-700  dark:bg-gray-800 border-b border-t border-zinc-900 dark:border-gray-700">
                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <div class="imgdiv">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-black border-dashed rounded-lg cursor-pointer bg-zinc-800 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-zinc-600 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-zinc-500">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-[#EDB12C]" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-[#EDB12C] dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-[#EDB12C] dark:text-gray-400">SVG, PNG, JPG or GIF
                                                (MAX.
                                                800x400px)</p>
                                        </div>
                                        <input id="dropzone-file" name="img_url" type="file" class="hidden"
                                            required />
                                    </label>
                                </div>
                                <img src="" class="img_preview hidden" id="img_preview" alt="asdasd">
                            </div>
                        </th>

                    </tr>
                    <tr class="bg-zinc-700  dark:bg-gray-800 border-b border-t border-zinc-900 dark:border-gray-700">
                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            Video van Medewerker
                        </th>
                    </tr>
                    <tr class="bg-zinc-700  dark:bg-gray-800 border-b border-t border-zinc-900 dark:border-gray-700">
                        <th colspan="6" scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <div class="imgdiv">
                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file2"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-black border-dashed rounded-lg cursor-pointer bg-zinc-800 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-zinc-600 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-zinc-500">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-[#EDB12C]" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-[#EDB12C] dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-[#EDB12C] dark:text-gray-400">SVG, PNG, JPG or GIF
                                                (MAX.
                                                800x400px)</p>
                                              
                                        </div>
                                        <input id="dropzone-file2" name="video" type="file" class="hidden"
                                            required />
                                    </label>
                                </div>
                                <img src="" class="img_preview2 hidden" id="img_preview2" alt="asdasd">
                            </div>
                        </th>

                    </tr>
                    <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="py-3 px-6">
                                Telefoon nummer
                            </th>
                            <th scope="col" class="py-3 px-6">
                                instagram
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Linked in
                            </th>
                            <th scope="col" class="py-3 px-6">
                                facebook
                            </th>
                        </tr>
                    </thead>
                    <tr class="bg-zinc-700 border-b border-t border-zinc-900 dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="phone" id="number" required
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="instagram" id="instagram" placeholder="https://www.instagram.com/..."
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>

                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="linkedin" id="linkedin"
                            placeholder="https://www.linkedin.com/in..."
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            <input type="text" name="facebook" id="facebook"
                            placeholder="https://www.facebook.com/..."
                                class="block w-full p-3 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

    <div class="overflow-x-auto relative  shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6 ">
        <button id="submit" type="submit"
            class="text-white bg-blue-700 m-auto hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Maak
            Medewerker aan</button>

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
            display: flex;

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
        .img_preview2 {
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
    <script>
        // example longitude

        let file = document.getElementById('dropzone-file')
        file.addEventListener('change', function() {
            console.log(this.files[0], " first thing")
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                document.getElementById('img_preview').setAttribute("src", this.result);
            })
            document.getElementById('img_preview').classList.remove('hidden');
            reader.readAsDataURL(this.files[0]);
        });
        let file2 = document.getElementById('dropzone-file2')
        file2.addEventListener('change', function() {
            console.log(this.files[0], " second thing")
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                document.getElementById('img_preview2').setAttribute("src", this.result);
            })
            document.getElementById('img_preview2').classList.remove('hidden');
            reader.readAsDataURL(this.files[0]);
        });
    </script>
    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>

</x-app-layout>
