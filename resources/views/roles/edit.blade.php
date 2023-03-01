<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Permissions') }}
            </h2>
        </div>
    </x-slot>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Rol
                @can('create', Spatie\Permission\Models\Permission::class)
                    <a href="{{ route('velden.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        aantal permissies
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">delete</span>
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $role->name }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $role->permissions_count }}
                    </th>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @can('delete', $role)
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="mx-1 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
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
                        </td> --}}
                </tr>
            </tbody>
        </table>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption
                class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Permissies
                @can('create', Spatie\Permission\Models\Permission::class)
                    <a href="{{ route('velden.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('roles.permissions.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($array as $permission)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $permission['name'] }}
                            </th>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input {{ $permission['checked'] }} value="true" name="{{ $permission['name']}}" id="checkbox-all-search" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                        </tr>
                    @endforeach

                    <td class="bg-white p-5 justify-center" colspan="2">
                        <div class="w-full flex items-center justify-center">

                            <button type="submit"
                            class="text-white bg-indigo-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-200 focus:outline-none dark:focus:ring-blue-800">Update</button>
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
