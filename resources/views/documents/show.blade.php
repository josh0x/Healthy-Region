<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$document->title}}
        </h2>
    </x-slot>

    <div style="margin-top: 0.5cm" class="text-center align-middle mx-auto">
        <h1 class="mx-auto font-semibold text-xl text-gray-800 leading-tight">
            Title is:  {{$document->title}}
        </h1>
    </div>


    <div style="margin-top: 0.5cm" class=" text-center align-middle mx-auto">
        <h1 class="mx-auto text-black font-semibold text-xl leading-tight">
            {{$document->excerpt}}
        </h1>
    </div>


    <div style="margin-top: 0.5cm" class=" text-center align-middle mx-auto">
        <h1 class="mx-auto font-semibold text-xl uppercase text-blue-400 leading-tight">
            {{$document->type}}
        </h1>
    </div>

    <div>
        <a href="{{ route('files.download', $document->file) }}" ><button class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Download</button></a>
    </div>




</x-app-layout>
