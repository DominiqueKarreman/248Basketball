<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Evenementen') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Evenementen
                @can('create', App\Models\Event::class)
                    <a href="{{ route('events.create') }}"
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
                        Locatie
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
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
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
                            {{ $event->locatie }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $event->datumTijd }}
                        </th>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                            {{ $event->verantwoordelijke }}

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
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            @can('update', $event)
                                <a class="text-indigo-500" href="{{ route('events.edit', $event->id) }}">Edit</a>
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

    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>

</x-app-layout>