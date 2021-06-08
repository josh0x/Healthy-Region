<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create new project') }}
        </h2>
    </x-slot>
    <div class="max-w-4xl mx-auto py-20 sm:px-6 lg:px-8 text-black">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md text-gray-700">
                <div class="p-4 px-4 py-5 bg-white sm:p-12">

                <form action='/projects' class="x-form" method="POST">
                    @csrf

                    <div class="mt-2 flex justify-center text-lg font-bold text-gray-700">
                        <h1>Note: All fields with <a class="text-red-500">*</a> are mandatory to be filled in.</h1>
                    </div>

                    <div class="mt-6">
                        <label for="name" class="block font-medium text-sm text-gray-700">
                            <span> <a class="text-red-500">*</a>Name</span>
                        </label>

                        <textarea class="@error('name') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" name="name" rows="1" cols="60" id="name"> {{old('name')}} </textarea>
                            @if($errors->has('name'))
                                <p class="text-red-500">* Fill in a correct name (minimum 5 characters)</p>
                            @endif
                    </div>

                    <div class="mt-6">
                        <label for="overview" class="block font-medium text-sm text-gray-700">
                            <span> <a class="text-red-500">*</a>Description</span>
                        </label>

                        <textarea class="@error('overview') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" name="overview" rows="5" cols="60" id="overview"> {{old('overview')}} </textarea>
                            @if($errors->has('overview'))
                                <p class="text-red-500">* Fill in a correct description (minimum 5 characters)</p>
                            @endif
                    </div>


                    <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Upload
                        </button>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
