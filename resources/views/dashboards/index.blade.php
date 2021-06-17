<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="container mx-auto px-4 py-20 flex justify-center">
        <div class="text-center mt-5 md:mt-0 md:col-span-2">
            <div>
                <h1 class="font-bold text-4xl text-gray-800 leading-tight mt-5 md:mt-0 md:col-span-2 ">
                    Welcome to Healthy Region.
                </h1>
            </div>
            {{-- Search bar --}}
            <div class="w-full py-10 px-3 text-black">
                <form class="py-10" type="get" action="{{ url('/search') }}">
                    <input name="query"  type="search" placeholder="Search documents">
                    <button class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"type="submit">Search</button>
                </form>
            </div>

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Author
                                    </td>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                    </td>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type
                                    </td>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Date
                                    </td>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    
                                    </td>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    
                                    </td>
                                    <td scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    
                                    </td>
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
                                                <div class="text-sm text-gray-500">
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
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @can('user_access')
                                                <a href="/documents/{{$doc->id}}/edit" class="text-blue-600 hover:text-blue-900">Edit</a>
                                            @endcan
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href='{{$doc->path()}}' class="text-blue-600 hover:text-blue-900">Show</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @can('user_access')
                                            <a href="/documents/{{$doc->id}}/download" class="text-blue-600 hover:text-blue-900">Download</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

