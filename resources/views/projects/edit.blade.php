<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Project ') }}  {{$project->name}}
        </h2>
    </x-slot>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @if ($errors->first('name'))
                    <li class="text-red-500">* Fill in a correct Title (minimum 5 characters)</li>
                @endif
                @if ($errors->first('overview'))
                    <li class="text-red-500">* Fill in a complete Description (minimum 5 characters)</li>
                @endif
            </ul>
        </div>
    @endif





    <div class="container mx-auto px-4 py-10 flex justify-center text-black rounded">

        <div class= "mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 text-black">
            <form action='/projects/{{$project->id}}' class="x-form" method="POST">
                @csrf
                @method('PUT')
                <label class="mt-6 block" for="name">
                    <span class="text-gray-700">Name</span>
                </label>
                <textarea class="@error('name') border-red-400 @enderror  px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="name" rows="2" cols="60" id="name">{{$project->name}}</textarea>

                @if($errors->has('name'))
                    <p class="text-red-500">Fill in a correct name (minimum 5 characters)</p>
                @endif

                <label class="mt-6 block" for="overview">
                    <span class="text-gray-700">Description</span>
                </label>

                <textarea class="@error('overview') border-red-400 @enderror  px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="overview" rows="4" cols="60" id="overview">{{$project->overview}}</textarea>

                @if($errors->has('overview'))
                    <p class="text-red-500">Fill in a correct description (minimum 5 characters)</p>
                @endif

                <div class="mt-6 flex items-center justify-center">
                    <button type="submit" name="submit" class="py-1.5 px-3.5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Upload</button>
                </div>

<<<<<<< Updated upstream
                </form>

                <div class="container mx-auto px-4  flex justify-center text-black">
                    <form class="mt-1 flex items-center justify-center" method="POST" action="/projects/{{$project->id}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="submit" class="py-1.5 px-3.5 bg-red-500 text-white font-semibold  rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Delete</button>
                    </form>
                </div>
=======
            </form>

            <div class="container mx-auto px-4  flex justify-center text-black">
                <form class="mt-1 flex items-center justify-center" method="POST" action="/projects/{{$project->id}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" name="submit" class="py-1.5 px-3.5 bg-red-500 text-white font-semibold  rounded-lg shadow-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75">Delete</button>
                </form>
            </div>
>>>>>>> Stashed changes
        </div>
    </div>

</x-app-layout>
