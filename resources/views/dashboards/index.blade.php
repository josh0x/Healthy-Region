<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="container mx-auto px-4 py-20 flex justify-center">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div>
                <h2 class="font-bold text-3xl text-gray-800 leading-tight mt-5 md:mt-0 md:col-span-2 ">
                    Welcome to Healthy Region Database.
                </h2>
            </div>

            {{-- Search bar --}}
            <div class="w-full py-10 px-3 text-black">
                @error('title')
                <p class="text-red-500">No search results found</p>
                @enderror
                <form class="block uppercase tracking-wide text-gray-700 text-sm font-bold mb-2" type="get" action="{{ url('/search') }}">
                    @csrf
                    <input name="title"  type="search" placeholder="Search documents" class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('title') 2xl:dark:border-red-500 @enderror border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <button  type="submit" class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Search</button>
                </form>
            </div>

             <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Author
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Type
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Show</span>
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($docs as $doc)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img src="images/hz.png" class="h-10 w-10 rounded-full" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$doc->user->name}}
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$doc->title}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    {{$doc->type}}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{$doc->created_at}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @can('user_access')
                                    <a href="/documents/{{$doc->id}}/edit" class="text-blue-600 hover:text-blue-900">Edit</a>
                                @endcan
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href='{{$doc->path()}}' class="text-blue-600 hover:text-blue-900">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>
