<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Personal Documents') }}
        </h2>
    </x-slot>
    @if (session()->has('success'))
        <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
            <strong>{{ session()->get('success')}}</strong>
        </div>
    @endif
    <div class="container mx-auto px-4 py-20 flex justify-center">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="p-4 px-4 py-5 bg-white sm:p-12">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Download</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    {{-- body of table --}}
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
                                                @can('user_access')
                                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href="/documents/{{$doc->id}}/edit" class="text-blue-600 hover:text-blue-900">Edit</a>
                                                </td>
                                                @endcan

                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <a href='{{$doc->path()}}' class="text-blue-600 hover:text-blue-900">Show</a>
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

    {{--Upload--}}
    <div class="container mx-auto px-4 py-10 flex justify-center">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="block content-center">
                @can('user_access')
                    <a href="/documents/create"
                    class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75"
                    type="button">
                        Upload
                    </a>
                @endcan
            </div>
        </div>
    </div></div>
    </div>

</x-app-layout>
