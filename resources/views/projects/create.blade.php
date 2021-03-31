<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-10 flex justify-center">
        <form action='/documents' class="x-form" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif

          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif


            <div class="mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
                <span class="mt-2 flex justify-center text-lg font-bold text-gray-600">Add document</span>
                    <label class="mt-6 block">
                        <span class="text-gray-700">Title</span>
                    </label>
                        <input class=" form-input px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="title" rows="2" cols="60" id="title"> {{old('title')}}

                            @if($errors->has('title'))
                                <p class=" is-danger">{{$errors->first('title')}}</p>
                            @endif

            <div class="mt-6">
                <label class="block">
                    <span class="text-gray-700">Excerpt</span>
                </label>
                <textarea class="px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="excerpt" rows="5" cols="60" id="excerpt"> {{old('excerpt')}} </textarea>
                    @if($errors->has('excerpt'))
                        <p class=" is-danger">{{$errors->first('excerpt')}}</p>
                    @endif
            </div>

            <div class="mt-6">
                <label class="text-gray-700" >Choose the type:</label>
                        <div class="select">
                            <select class="form-select px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="type" id="type">
                                <option value="questionnaire">Questionnaire</option>
                                <option value="survey">Survey</option>
                                <option value="research protocol">Research Protocol</option>
                            </select>
                        </div>
            </div>

            <div class="mt-10 flex items-center justify-center bg-grey-lighter">
                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-black">
                        <svg class="w-8 h-8" fill="blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input type="file" name="file" id="chooseFile" class="hidden"/>
                    </label>
            </div>

            <div class="mt-6 flex items-center justify-center">
                <button type="submit" name="submit" class="py-1.5 px-3.5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Upload</button>
            </div>
            </div>
            </div>

        </form>
    </div>

</x-app-layout>
