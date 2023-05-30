<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Create News Article') }}
            </h2>
        </div>
    </x-slot>

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg w-full sm:w-3/4 mx-auto mt-6">
        <form action="{{ route('newsarticles.store') }}" method="POST">
            @csrf

            <div class="p-6">
                <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                    Title
                </label>
                <input type="text" name="title" id="title" required
                    class="block w-full p-2 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400">
            </div>

            <div class="p-6">
                <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                    Short description
                </label>
                <input type="text" name="short_description" id="short_description" required
                    class="block w-full p-2 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400">
            </div>

            <div class="p-6">
                <label for="content" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                    Content
                </label>
                <textarea name="content" id="content" rows="8" required
                    class="block w-full p-2 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400"></textarea>
            </div>

            <div class="p-6">
                <label for="image" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                    Image
                </label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="block w-full p-2 text-gray-800 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-400 dark:focus:border-blue-400">
            </div>

            <div class="p-6">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:bg-blue-700">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
