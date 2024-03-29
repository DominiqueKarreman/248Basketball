<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Rol aanmaken') }}
            </h2>
        </div>
    </x-slot>

    
    
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <form action="{{ route('roles.store') }}" method="POST">
        <table class="w-full text-sm text-left text-[#EDB12C] dark:text-gray-400 ">
            <caption
                class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-zinc-700 border-zinc-800 dark:text-white dark:bg-gray-800">
                <div class="w-full flex justify-between  items-center">
                    <h1 class="w-1/2">Rol naam</h1>
                    <input type="text" id="role_name" name="role_name" class="bg-zinc-800 border-black text-white text-sm rounded-lg focus:ring-[#EDB12C] focus:border-[#EDB12C] block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="bijv. Beheerder" required>
                </div>
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>
            <tbody>
                    @csrf
                    
                    @foreach ($permissions as $permission)
                        <tr class="bg-zinc-700 border-zinc-800 border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                                {{ $permission->name }}
                            </th>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input  value="true" name="{{ $permission['name']}}" id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-[#EDB12C] bg-zinc-800 border-black rounded focus:ring-[#EDB12C] dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                        </tr>
                    @endforeach

                    <td class="bg-zinc-700 border-zinc-800 p-5 justify-center" colspan="2">
                        <div class="w-full flex items-center justify-center">

                            <button type="submit"
                            class="text-white bg-[#EDB12C] hover:bg-[#DCA01B] focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Update</button>
                        </div>
                        </td>


                </form>
            </tbody>
        </table>
    </div>

    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>

</x-app-layout>
