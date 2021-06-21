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

                <div class="mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 text- ck">
                    <label class="mt-6 block">
                        <div class="mt-2 flex justify-center text-lg font-bold text-gray-700">
                            <h1>Note: All fields with <a class="text-red-500">*</a> are mandatory to be filled in.</h1>
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700">
                                <span> <a class="text-red-500">*</a>Name</span>
                            </label>
                        <input class="@error('title') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="title" rows="2" cols="60" id="title" value="{{$document->title}}">
                            @if($errors->has('title'))
                            <p class="text-red-500">Fill in a correct name (minimum 5 characters)</p>
                            @endif
                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700">
                                <span> <a class="text-red-500">*</a>Description</span>
                            </label>
                            <textarea class="@error('excerpt') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" name="excerpt" rows="5" cols="60" id="excerpt"> {{$document->excerpt}} </textarea>
                                @if($errors->has('excerpt'))
                                    <p class="text-red-500">Fill in a correct description (minimum 5 characters)</p>
                                @endif
                        </div>

                        <div class="mt-6">
                            <label class="block font-medium text-sm text-gray-700"><a class="text-red-500">*</a> Choose the type:</label>
                                <select class="form-input rounded-md shadow-sm mt-1 block w-full" name="type" id="type">
                                    <option value="Questionnaire">Questionnaire</option>
                                    <option value="Survey">Survey</option>
                                    <option value="Research protocol">Research Protocol</option>
                                    <option value="Presentation">Presentation</option>
                                    <option value="Article">Article</option>
                                    <option value="Others">Others</option>
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
                                        <p class="text-red-500">Selecting an author is required</p>
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
                                <p class=" text-red-500">You didn't select a file</p>
                            @endif
                        </div>

        </form>

                <div class="mt-6 flex items-center justify-center">
                    <button type="submit" name="submit" class="py-1.5 px-3.5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Update</button>
    
                    <form method="POST" action="/documents/{{$document->id}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit" name="submit" class="py-1.5 px-3.5 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Delete</button>
                    </form>
                </div>
    
            </div>
        </form>
    </div>

</x-app-layout>
