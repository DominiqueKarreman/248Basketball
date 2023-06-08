<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Edit News Article') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto mt-6">
        <form action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data" method="PUT">
            @csrf

            <div class="p-6">
                <label for="title" class="py-4 px-6 font-medium text-[#EDB12C] uppercase whitespace-nowrap dark:text-white">
                    Title
                </label>
                <input type="text" name="title" id="title" value="{{ $newsArticle->title }}" required class="block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-[#EDB12C] focus:border-[#EDB12C] dark:bg-gray-700 dark:border-gray-600 placeholder-[#EDB12C] dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#EDB12C] dark:focustex[#EDB12C]-500">
            </div>

            <div class="p-6">
                <label for="title" class="py-4 px-6 font-medium text-[#EDB12C] uppercase whitespace-nowrap dark:text-white">
                    Short description
                </label>
                <input type="text" name="short_description" id="short_description" value="{{ $newsArticle->short_description }}" required class="block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-[#EDB12C] focus:border-[#EDB12C] dark:bg-gray-700 dark:border-gray-600 placeholder-[#EDB12C] dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#EDB12C] dark:text-[#EDB12C]-500">
            </div>

            <div class="p-6">
                <label for="content" class="py-4 px-6 font-medium text-[#EDB12C] uppercase whitespace-nowrap dark:text-white">
                    Content
                </label>
                <textarea name="content" id="content" rows="8" value="{{ $newsArticle->content }}" required class="block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-[#EDB12C] focus:border-[#EDB12C] dark:bg-gray-700 dark:border-gray-600 placeholder-[#EDB12C] dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#EDB12C] dark:text-[#EDB12C]-500"></textarea>
            </div>

            <div>
                <label for="is_cover" class="py-4 px-6 font-medium text-[#EDB12C] uppercase whitespace-nowrap dark:text-white">
                    Is Cover
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="checkbox" name="is_cover" id="is_cover" value="{{ $newsArticle->is_cover }}" class="text-[#EDB12C] border border-[#EDB12C] rounded-lg bg-zinc-800 sm:text-xs focus:ring-[#EDB12C] focus:border-[#EDB12C] dark:bg-gray-700 dark:border-gray-600 placeholder-[#EDB12C] dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#EDB12C] dark:text-[#EDB12C]-500">
                    <span class="ml-2 text-[#EDB12C] dark:text-white">Yes</span>
                </label>
            </div>

            <div class="p-6">
                <label for="image" class="py-4 px-6 font-medium text-[#EDB12C] uppercase whitespace-nowrap dark:text-white">
                    Image
                </label>
                <input type="file" name="image" id="image" accept="image/*" class="block w-full p-2 text-[#EDB12C] border border-black rounded-lg bg-zinc-800 sm:text-xs focus:ring-[#EDB12C] focus:border-[#EDB12C] dark:bg-gray-700 dark:border-gray-600 placeholder-[#EDB12C] dark:placeholder-gray-400 dark:text-white dark:focus:ring-[#EDB12C] dark:text-[#EDB12C]-500">
            </div>

            <div class="p-6">
                <button type="submit" class="text-white bg-[#EDB12C] hover:bg-[#DCA01B] focus:ring-4 focus:ring-[#DCA01B]-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-[#DCA01B]-600 dark:hover:bg-[#DCA01B]-200 focus:outline-none dark:focus:ring-blue-800">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-app-layout>