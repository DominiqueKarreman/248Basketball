<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-700 dark:text-gray-700 leading-tight">
                {{ __('Gebruikers') }}
            </h2>
        </div>
    </x-slot>
    @php
        $search = '';
    @endphp

    <div class="overflow-x-auto relative  sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <div class="flex items-center justify-between   dark:bg-gray-900">
            <div>
                <a href="{{ route('staff.create') }}" id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-300 bg-zinc-700 border boborder-zinc-800 rder-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    <span class="sr-only">Action button</span>
                    Maak aan
                    <svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </a>
                <!-- Dropdown menu -->
                <div id="dropdownAction"
                    class="z-10 hidden bg-zinc-700 divide-y border-zinc-800 divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reward</a>
                        </li>
                        <li>        
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Promote</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Activate
                                account</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                            User</a>
                    </div>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-300 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search-users" value="{{ $search }}"
                    class="block p-2 pl-10 text-sm text-[#EDB12C] border border-black rounded-lg w-80 bg-zinc-800 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Zoek naar gebruikers">
            </div>
        </div>
    </div>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-300 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Naam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actie
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if (strpos(strtolower($user->name), strtolower('')) !== false ||
                                strpos(strtolower($user->email), strtolower('')) !== false)
                            <tr
                                class="bg-zinc-700 border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700 hover:bg-zinc-800 dark:hover:bg-gray-600">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-black rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-[#EDB12C] whitespace-nowrap dark:text-white">
                                    @if (!$user->profile_photo_path)
                                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
                                            class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <img class="w-10 h-10 rounded-full object-cover"
                                            src="/storage/{{ $user->profile_photo_path }}" alt="{{ $user->name }}" />
                                    @endif
                                    <div class="pl-3">
                                        <div class="text-base font-semibold">{{ $user->name }}</div>
                                        <div class="font-normal text-gray-300">{{ $user->email }}</div>
                                    </div>
                                </th>

                                <td class="px-6 py-4">

                                    @if (Auth::user()->hasPermissionTo('assign roles'))
                                        <form method="POST" action="{{ route('users.changeRoles', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <select onchange="this.form.submit()" name="user_role" id="countries"
                                                class="bg-zinc-800 border border-black text-[#EDB12C] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                @foreach ($roles as $role)
                                                    <option
                                                        {{ $user->roles->first()->name == $role->name ? 'selected' : '' }}
                                                        value="{{ $role->name }}">{{ $role->name }}</option>
                                                @endforeach
                                                {{-- <option selected>  {{ $user->roles->first()->name }}</option> --}}
                                            </select>
                                        </form>
                                    @else
                                        {{ $user->roles->first()->name }}
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if ($user->email_verified_at)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Geverifieerd
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"></div> Niet
                                            geverifieerd
                                        @endif
                                    </div>

                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="font-medium
                                    text-[#EDB12C] dark:text-blue-500 hover:underline">Edit
                                        user</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    @push('scripts')
                        <script>
                            const searchInput = document.getElementById('search');
                            let search = '';

                            searchInput.addEventListener('input', (event) => {
                                search = event.target.value;
                            });
                        </script>
                    @endpush
                </tbody>

            </table>

        </div>
        <style>
            .pagination {
                display: flex;
                justify-content: center;
                margin-top: 1rem;
            }

            .pagination>li {
                margin: 0 0.25rem;
            }

            .pagination>li>a,
            .pagination>li>span {
                display: inline-block;
                padding: 0.5rem 1rem;
                border-radius: 0.25rem;
                background-color: #02264b;
                color: #4a5568;
                font-weight: 500;
                text-decoration: none;
                transition: background-color 0.2s ease-in-out;
            }

            .pagination>li>a:hover,
            .pagination>li>span:hover {
                background-color: #145caa;
            }

            .pagination>.active>a,
            .pagination>.active>span {
                background-color: #4a5568;
                color: #edf2f7;
            }
        </style>
    </div>

    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>

</x-app-layout>
