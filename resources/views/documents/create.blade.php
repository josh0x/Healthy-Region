<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>

        <div class="container mx-auto py-20 flex justify-center text-black">
            {{-- form --}}
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


                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="p-4 px-4 py-5 bg-white sm:p-12">
                            <span class="mt-2 flex justify-center text-lg font-semibold text-xl text-gray-800 leading-tight">Upload document</span>
                                {{-- title --}}
                                <label for="title" class="mt-6 block font-medium text-sm text-gray-700">Title</label>
                                <input type="text" name="title" id="title" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" name="title" rows="2" cols="60" id="title"> {{old('title')}}
                                @error('title')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-12">
                                {{-- description --}}
                                <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                                <textarea type="text" name="excerpt" id="excerpt" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" name="excerpt" rows="5" cols="60" id="excerpt"> {{old('excerpt')}} </textarea>
                                @error('description')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-12">
                            {{-- choose type --}}
                            <label class="block font-medium text-sm text-gray-700">Choose the type:</label>
                                    <div class="select">
                                        <select name="type" id="type">
                                            <option value="questionnaire">Questionnaire</option>
                                            <option value="survey">Survey</option>
                                            <option value="research protocol">Research Protocol</option>
                                        </select>
                                    </div>
                        </div>
                        {{-- choose author --}}
                        <div class="px-4 py-5 bg-white sm:p-12">
                            <label class="block font-medium text-sm text-gray-700" for="user_id" >Choose the Author:</label>
                            <div class="select">
                                <select  name="user_id" id="user_id">
                                    <option></option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{$user->name}}</option>

                                        @if($errors->has('user_id'))
                                            <p class=" text-red-400">{{$errors->first('user_id')}}</p>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- choose project --}}
                        <div class="px-4 py-5 bg-white sm:p-12">
                            <label class="font-medium text-sm text-gray-700" for="project_id" >Choose the Project:</label>
                            <div class="select">
                                <select name="project_id" id="project_id">
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
                        {{-- select file --}}
                        <div class="px-4 py-6 bg-white sm:px-12">
                        <div class="flex items-center justify-center bg-grey-lighter">
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
                                <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Upload
                                </button>
                            </div>
                    </div>
                    </div>
            </form>
        </div>

</x-app-layout>
