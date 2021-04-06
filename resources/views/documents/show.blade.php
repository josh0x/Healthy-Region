<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$document->title}}
        </h2>
    </x-slot>

    <div class="container mx-auto  py-10 flex justify-center bg-blue-600">
           <h1 class="bg-blue-600">The title of this document is ({{$document->title}})</h1>
    </div>
    <div>
        <h1 class="container mx-auto px-4 py-10 flex justify-center text-black">
            Excerpt: {{$document->excerpt}}
        </h1>
    </div>

    <div>
        <h1 class="container mx-auto px-4 py-10 flex justify-center text-black">
            Type: {{$document->type}}
        </h1>
    </div>


</x-app-layout>
