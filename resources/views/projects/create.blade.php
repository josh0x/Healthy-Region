<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

        {{-- form --}}
        <div class="container mx-auto py-20 flex justify-center text-black">
            <form action='/projects' class="x-form" method="POST" enctype="multipart/form-data">
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
                <div class="p-4 px-4 py-5 bg-white sm:p-8">
                    <span class=" flex justify-center text-lg font-semibold text-xl text-gray-800 leading-tight">Create Project</span>

                    {{-- project name --}}

                        <label class="mt-6 block" for="name">
                            <span class="block font-medium text-md text-gray-700">Name</span>
                        </label>

                        <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="name" rows="1" cols="60" id="name"> {{old('name')}} </textarea>
                            @if($errors->has('name'))
                                <p class="text-sm text-red-600">{{$errors->first('name')}}</p>
                            @endif

                </div>

                <div class="p-4 px-4 py-5 bg-white sm:p-8">
                    {{-- overview --}}

                    <label class="mt-6 block" for="overview">
                        <span class="block font-medium text-md text-gray-700">Overview</span>
                    </label>

                    <textarea class="form-input rounded-md shadow-sm mt-1 block w-full" name="overview" rows="5" cols="60" id="overview"> {{old('overview')}} </textarea>
                        @if($errors->has('overview'))
                            <p class="text-sm text-red-600">{{$errors->first('overview')}}</p>
                        @endif

                </div>

                    {{-- button --}}
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
