<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a new project') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-20 flex justify-center">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="p-4 px-4 py-5 bg-white sm:p-12">

                <form action='/projects' class="x-form" method="POST">
                    @csrf

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @if ($errors->first('name'))
                                    <li class="text-red-500">* Fill in a correct Title (minimum 5 characters)</li>
                                @endif
                                @if ($errors->first('name'))
                                    <li class="text-red-500">* Fill in a complete Description (minimum 5 characters)</li>
                                @endif
                            </ul>
                        </div>
                    @endif

                    <span class="mt-2 flex justify-center text-lg font-bold text-gray-600">Add a new document</span>
                    <label class="mt-6 block" for="name">
                        <span class="text-gray-700">Name </span>
                        <p><a class="text-yellow-300"> Fill a correct Name (minimum 5 characters)</a></p>
                    </label>
                    <input class=" @error('name') border-red-400 @enderror form-input px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="name" rows="2" cols="60" id="name" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <p class=" text-red-400">{{$errors->first('name')}}</p>
                    @endif

                    <div class="mt-6">
                        <label class="block" for="overview">
                            <span class="text-gray-700">Description</span>
                            <p><a class="text-yellow-300"> Fill a complete description (minimum 5 characters)</a></p>
                        </label>
                        <textarea class="@error('overview') border-red-400 @enderror  px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="overview" rows="5" cols="60" id="overview"> {{old('overview')}} </textarea>
                        @if($errors->has('overview'))
                            <p class="text-red-400">{{$errors->first('overview')}}</p>
                        @endif
                    </div>

            </div>
                    <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Upload
                        </button>
                    </div>
                </form>

        </div>
    </div>
</x-app-layout>
