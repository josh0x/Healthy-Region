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




</x-app-layout>
