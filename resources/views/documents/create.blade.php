<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new document') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto py-20 sm:px-6 lg:px-8 text-black">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md text-gray-700">
                <div class="p-4 px-4 py-5 bg-white sm:p-12">
                    <form action='/documents' class="x-form" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-2 flex justify-center text-lg font-bold text-gray-700">
                            <h1>Note: All fields with <a class="text-red-500">*</a> are mandatory to be filled in.</h1>
                        </div>

                        <div class="mt-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">
                                <span> <a class="text-red-500">*</a>Title</span>
                            </label>

                            <input class="@error('title') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="title" rows="2" cols="60" id="title" value="{{old('title')}}" >
                                @if($errors->has('title'))
                                    <p class="text-red-500">Fill in a correct Title (minimum 5 characters)</p>
                                @endif
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700">
                                <span> <a class="text-red-500">*</a>Description</span>
                            </label>

                            <textarea class="@error('excerpt') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" name="excerpt" rows="5" cols="60" id="excerpt"> {{old('excerpt')}} </textarea>
                                @if($errors->has('excerpt'))
                                    <p class="text-red-500">Fill in a correct description (minimum 5 characters)</p>
                                @endif
                        </div>


                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700"><a class="text-red-500">*</a> Choose the type:</label>

                                <select class="form-input rounded-md shadow-sm mt-1 block w-full" name="type" id="type">
                                    <option value="questionnaire">Questionnaire</option>
                                    <option value="survey">Survey</option>
                                    <option value="research protocol">Research Protocol</option>
                                </select>
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700" for="user_id" > <a class="text-red-500">*</a> Choose an Author:</label>

                                <select class=" @error('user_id') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" name="user_id" id="user_id">
                                    <option></option>

                                        @foreach($users as $user)
                                        @if($user->can('user_access'))
                                    <option class="" value="{{ $user->id }}">{{$user->name}}</option>
                                        @endif
                                        @endforeach
                                </select>
                                    @if($errors->has('user_id'))
                                        <p class=" text-red-500">Selecting an author is required</p>
                                    @endif
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700" for="project_id" >Choose the Project:</label>

                                <select class="form-input rounded-md shadow-sm mt-1 block w-full" name="project_id" id="project_id">
                                    <option value="0"></option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}">{{$project->name}}</option>
                                        @endforeach
                                </select>
                        </div>

                        <div class="mt-10 flex items-center justify-center bg-grey-lighter">
                            <label class="@error('file') border-red-400 @enderror w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-black">
                                <svg class="animate-bounce w-8 h-8" fill="blue" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="block font-medium text-sm text-gray-700">Select a file</span>
                                <input value="file" type="file" name="file" id="chooseFile" class="hidden"/>
                            </label>

                            @if($errors->has('file'))
                                <p class=" text-red-500">Choose a file to upload</p>
                            @endif
                        </div>
                </div>
                        <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Upload
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

</x-app-layout>
