<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Rollen en permissies') }}
            </h2>
        </div>
    </x-slot>


    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-white bg-zinc-700 border-zinc-800 dark:text-white dark:bg-gray-800">
                Rollen
                @can('create', Spatie\Permission\Models\Role::class)
                    <a href="{{ route('roles.create') }}"
                        class="float-right font-medium text-[#EDB12C] dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        aantal permissies
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="bg-zinc-700 border-zinc-800 border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $role->name }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $role->permissions_count }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-[#EDB12C] whitespace-nowrap dark:text-white">
                            @can('update', $role)
                            @if($role->name !== 'Admin')
                                <a href="{{ route('roles.edit', $role->id) }}">Edit</a>
                            @endif
                            
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
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-white bg-zinc-700 border-zinc-800 dark:text-white dark:bg-gray-800">
                Permissies
                @can('create', Spatie\Permission\Models\Permission::class)
                    <a href="{{ route('velden.create') }}"
                        class="float-right font-medium text-blue-600 dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs text-[#EDB12C] uppercase bg-zinc-800 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr class="bg-zinc-700 border-zinc-800 border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $permission->name }}
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>

</x-app-layout>
