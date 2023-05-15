<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Pickups') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <caption
                class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-zinc-700 dark:text-white dark:bg-gray-800">
                Pickups
                @can('create', App\Models\Pickup::class)
                    <a href="{{ route('pickups.create') }}"
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
                        Veld
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Spelers
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Tijden
                    </th>

                    <th scope="col" class="py-3 px-6">
                        Groep
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Eigenaar
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pickups as $pickup)
                    <tr class="bg-zinc-700 border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $pickup->name }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            <a href="{{ route('velden.show', $pickup->veld_id) }}">{{ $pickup->veld }}</a>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $pickup->aanmeldingen }} / {{ $pickup->max_players }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">

                            {{ substr($pickup->start_time, 0, 5) }} tot {{ substr($pickup->end_time, 0, 5) }}

                        </th>

                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">

                            {{ $pickup->group }}

                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">

                            {{ $pickup->creator }}

                        </th>

                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            @can('update', $pickup)
                                <a class="text-[#EDB12C]" href="{{ route('pickups.edit', $pickup->id) }}">Edit</a>
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

    <div class="overflow-x-auto relative w-full sm:w-3/4 mx-auto my-6">
        {{-- {{ $posts->links() }} --}}
    </div>

</x-app-layout>
