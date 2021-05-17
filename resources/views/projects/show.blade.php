<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome in our project called : "{{$project->name}}"
        </h2>
    </x-slot>

    <div style="margin-top: 0.5cm" class="text-center align-middle mx-auto">
        <h1 class="mx-auto font-semibold text-xl text-gray-800 leading-tight">
            {{$project->overview}}
        </h1>
    </div>
    <div>
        <h1 class="mx-auto font-semibold text-xl text-gray-800 leading-tight">
            Files related to this projects are:
        </h1>
    </div>


    <table style="margin-top: 0.5cm" class="text-black min-w-full divide-y divide-gray-200">
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
                See
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($project->documents as $file)
        <tr>
            <td>
                {{$file->title}}
            </td>
            <td>
                {{$file->user->name}}
            </td>
            <td>
                {{$file->created_at}}
            </td>
            <td>
                <a href='{{$file->path()}}' class="text-blue-600 hover:text-blue-900">Show</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>




</x-app-layout>
