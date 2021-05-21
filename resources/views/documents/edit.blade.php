<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit: ') }} " {{$document->title}} "
        </h2>
    </x-slot>

    <div class="container mx-auto py-20 flex justify-center text-black">
        <form action='/documents/{{$document->id}}' class="x-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

        <div class="shadow overflow-hidden sm:rounded-md">

            {{-- title --}}
            <div class="px-4 py-5 bg-white sm:p-12">
                <label for="title" class="mt-6 block font-medium text-sm text-gray-700">Title</label>
                <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="title" rows="1" cols="60" id="title" name="title" rows="2" cols="60" id="title"> {{$document->title}} </textarea>
                @if($errors->has('title'))
                    <p class="text-red-400">{{$errors->first('title')}}</p>
                @endif
            </div>
            {{-- excerpt --}}
            <div class="px-4 py-5 bg-white sm:p-12">
                <label for="description" class="mt-6 block font-medium text-sm text-gray-700">Excerpt</label>
                <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="title" rows="3" cols="60" id="title" name="excerpt" rows="5" cols="60" id="excerpt"> {{$document->excerpt}} </textarea>
                    @if($errors->has('excerpt'))
                        <p class="text-red-400">{{$errors->first('excerpt')}}</p>
                    @endif
            </div>
            {{-- choose type --}}
            <div class="px-4 py-5 bg-white sm:p-12">
                <label class="block font-medium text-sm text-gray-700">Choose the type:</label>
                <div class="select">
                    <select>
                        <option value="questionnaire">Questionnaire</option>
                        <option value="survey">Survey</option>
                        <option value="research protocol">Research Protocol</option>
                    </select>
                </div>
            </div>
            {{-- select file --}}
            <div class="px-4 py-5 bg-white sm:px-12">
            <div class="mt-6 flex items-center justify-center bg-grey-lighter">
                <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-black">
                    <svg class="w-8 h-8" fill="blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Select a file</span>
                    <input type="file" name="file" id="chooseFile" class="hidden"/>
                    @if($errors->has('file'))
                        <p class=" text-red-400">{{$errors->first('file')}}</p>
                    @endif
                </label>
            </div>
            </div>
                {{-- upload button --}}
                <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Upload</button>
                {{-- delete button --}}
                <form class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6" method="POST" action="/documents/{{$document->id}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Delete</button>
                </form>
                </div>

    </form>
    </div>

</x-app-layout>
