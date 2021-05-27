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

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @if ($errors->first('title'))
                            <li class="text-red-500">* Fill in a correct Title (minimum 5 characters)</li>
                        @endif
                        @if ($errors->first('excerpt'))
                            <li class="text-red-500">* Fill in a complete Description (minimum 5 characters)</li>
                        @endif
                        @if ($errors->first('user_id'))
                            <li class="text-red-500">* Choose an Author</li>
                        @endif
                            @if ($errors->first('file'))
                                <li class="text-red-500">* you didn't choose a file</li>
                            @endif
                    </ul>
                </div>
            @endif


            <div class="mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 text- ck">
                <span class="mt-2 flex justify-center text-lg font-bold text-gray-600">Add a new document</span>
                <label class="mt-6 block">
                    <span class="text-gray-700">Title </span>
                    <p><a class="text-yellow-300"> Fill a correct Title (minimum 5 characters)</a></p>
                </label>
                <input class=" @error('title') border-red-400 @enderror form-input px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="title" rows="2" cols="60" id="title" value="{{$document->title}}">
                @if($errors->has('title'))
                    <p class=" text-red-400">{{$errors->first('title')}}</p>
                @endif


                <div class="mt-6">
                    <label class="block">
                        <span class="text-gray-700">Description</span>
                        <p><a class="text-yellow-300"> Fill a complete description (minimum 5 characters)</a></p>

                    </label>
                    <textarea class="@error('excerpt') border-red-400 @enderror  px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="excerpt" rows="5" cols="60" id="excerpt"> {{$document->excerpt}} </textarea>
                    @if($errors->has('excerpt'))
                        <p class="text-red-400">{{$errors->first('excerpt')}}</p>
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


                <div class="mt-6">
                    <label class="text-gray-700" for="user_id" >Choose an Author:</label>
                    <p><a class="text-yellow-300"> Choose an Author for this document from the list</a></p>

                    <div class="select">
                        <select class=" @error('user_id') border-red-400 @enderror form-select px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="user_id" id="user_id">
                            <option></option>
                            @foreach($users as $user)
                                <option class="" value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('user_id'))
                            <p class=" text-red-400">{{$errors->first('user_id')}}</p>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <label class="text-gray-700" for="project_id" >Choose the Project:</label>
                    <p><a class="text-yellow-300"> If your document related to a project then you can choose from list here</a></p>

                    <div class="select">
                        <select class="form-select px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="project_id" id="project_id">
                            <option value="0"></option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{$project->name}}</option>

                                @if($errors->has('project_id'))
                                    <p class=" text-red-400">{{$errors->first('project_id')}}</p>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mt-10 flex items-center justify-center bg-grey-lighter">
                    <label class="@error('file') border-red-400 @enderror w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-black">
                        <svg class="w-8 h-8" fill="blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                        </svg>
                        <span class="mt-2 text-base leading-normal">Select a file</span>
                        <input value="file" type="file" name="file" id="chooseFile" class="hidden"/>
                    </label>
                    @if($errors->has('file'))
                        <p class=" text-red-400">* {{$errors->first('file')}}</p>
                    @endif
                </div>

                <div class="mt-6 flex items-center justify-center">
                    <button type="submit" name="submit" class="py-1.5 px-3.5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Upload</button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>
