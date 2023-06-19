<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Contact') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md bg-zinc-800 sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm bg-zinc-700 text-left text-gray-500 dark:text-gray-400 ">
            <caption
                class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-zinc-700 dark:text-white dark:bg-gray-800">
                Evenementen
                @can('create', App\Models\ContactMessage::class)
                    <a href="{{ route('contacts.create') }}"
                        class="float-right font-medium text-[#EDB12C] dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs bg-zinc-800 text-[#EDB12C] uppercase   dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Naam
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Bericht
                    </th>
                    <th scope="col" class="py-3 px-6" />
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr class="bg-zinc-700 border-b border-zinc-800 dark:bg-gray-800 dark:border-gray-700">

                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $contact->name }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ $contact->email }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium text-white whitespace-nowrap dark:text-white">
                            {{ Str::limit($contact->message, 100) }}
                        </th>
                        <th scope="row">
                            <button
                                class="bg-[#EDB12C] -700 hover:bg-zinc-600 text-white font-bold py-2 px-4 rounded-full">
                                <a href="{{ route('contact.show', $contact->id) }}">Bekijk</a>
                            </button>
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
