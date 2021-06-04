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

                    <div style="margin-top: 0.5cm" class="text-center align-middle mx-auto">
                        <h1 class="mx-auto font-semibold text-xl text-gray-800 leading-tight">
                            Title:  {{$document->title}}
                        </h1>
                    </div>

                    <div style="margin-top: 0.5cm" class=" text-center align-middle mx-auto">
                        <h1 class="mx-auto text-black font-semibold text-xl leading-tight">
                            Description: {{$document->excerpt}}
                        </h1>
                    </div>

                    <div style="margin-top: 0.5cm" class=" text-center align-middle mx-auto">
                        <h1 class="mx-auto font-semibold text-xl uppercase text-blue-400 leading-tight">
                            Type: {{$document->type}}
                        </h1>
                    </div>
                </div>

                    <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="{{ route('files.download', $document->file) }}"><button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Download</button></a>
                    </div>

            </div>
        </div>
    </div>

</x-app-layout>
