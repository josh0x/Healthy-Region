<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Project: "{{$project->name}}"
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-10 flex justify-center">
        <div class="shadow overflow-hidden sm:rounded-md">
        <div class="p-4 px-4 py-5 bg-white sm:p-12">

        <div class="text-center align-middle mx-auto py-4">
            <h1 class="mx-auto font-semibold text-xl text-gray-800 leading-tight">
                {{$project->overview}}
            </h1>
        </div>


        {{-- table --}}
        <div class="flex flex-col text-black">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        {{-- column headers --}}
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                File name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            </th>
                        </tr>
                        </thead>
                        {{-- body --}}
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($project->documents as $file)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$file->title}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$file->user->name}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$file->created_at}}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href='{{$file->path()}}' class="text-blue-600 hover:text-blue-900">Show</a>
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
        </div>
    </div>

</x-app-layout>
