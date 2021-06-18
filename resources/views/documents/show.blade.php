<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           "{{$document->title}}"
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-20 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="p-4 px-4 py-5 bg-white sm:p-12">
                    <div style="margin-top: 0.5cm" class=" text-center align-middle mx-auto">
                        <h1 class="mx-auto font-semibold text-xl uppercase text-blue-400 leading-tight">
                            {{$document->type}}
                        </h1>
                    </div>


                    <div style="margin-top: 0.5cm" class=" text-center align-middle mx-auto">
                        <h1 class="mx-auto text-black font-semibold text-xl leading-tight">
                            Description {{$document->excerpt}}
                        </h1>
                    </div>


    <div class="container mx-auto px-4 py-20 flex justify-center">
        <a href="{{ route('files.download', $document->file) }}"><button class="py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Download</button></a>
    </div>


</x-app-layout>
