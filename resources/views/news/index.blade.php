<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row ">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-800 leading-tight">
                {{ __('Velden') }}
            </h2>
        </div>
    </x-slot>

  
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg" >
        <table class="w-full text-left text-gray-500 dark:text-gray-400">
        
           <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" >
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Photo
                    </th>

                    <th scope="col" class="px-6 py-3">
                        Title
                    </th

                    <th scope="col" class="px-6 py-3" >
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