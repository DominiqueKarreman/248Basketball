<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('News') }}
            </h2>
        </div>
    </x-slot>





    <div class="overflow-x-auto relative shadow-md bg-zinc-800 sm:rounded-lg w-full sm:w-3/4 mx-auto my-6">
        <table class="w-full text-sm bg-zinc-700 text-left text-gray-500 dark:text-gray-400 ">
            <caption class="p-5 text-lg font-semibold text-left text-[#EDB12C] bg-zinc-700 dark:text-white dark:bg-gray-800">
                News
                @can('create', App\Models\NewsArticle::class)
                <a href="{{ route('news.create') }}" class="float-right font-medium text-[#EDB12C] dark:text-blue-500">+</a>
                @endcan
                <!-- <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of users.</p> -->
            </caption>
            <thead class="text-xs bg-zinc-800 text-[#EDB12C] uppercase   dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Photo
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Title
                    </th scope="col" class="px-6 py-3">

                    <th scope="col" class="px-6 py-3">
                        Short Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        content
                    </th>

                    <th scope="col" class="px-6 py-3">
                        isCover
                    </th>


                </tr>
            </thead>
            <tbody>
                @foreach ($news as $newsArticle)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$newsArticle->image}}
                    </th>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-no">
                        {{$newsArticle->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$newsArticle->short_description}}
                    </td>
                    <td class="px-6 py-4">
                        {{$newsArticle->content}}
                    </td>
                    <td class="px-6 py-4">
                        {{$newsArticle->isCover}}
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>

                </tr>
                @endforeach
            </tbody>



        </table>

    </div>


</x-app-layout>