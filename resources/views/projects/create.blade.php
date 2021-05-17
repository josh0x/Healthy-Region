<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-10 flex justify-center">
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


            <div class="mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 text-black">
                <span class="mt-2 flex justify-center text-lg font-bold text-gray-600">Creating Project</span>
                    <label class="mt-6 block" for="name">
                        <span class="text-gray-700">Project Name</span>
                    </label>
                        <input class=" form-input px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="name" rows="2" cols="60" id="name"> {{old('name')}}

                            @if($errors->has('name'))
                                <p class=" is-danger">{{$errors->first('name')}}</p>
                            @endif

            <div class="mt-10 bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 text-black">
                <label class="mt-6 block" for="overview">
                    <span class="mt-2 flex justify-center text-lg font-bold text-gray-600">Overview</span>
                </label>
                <textarea class=" px-2 py-2 border-2 rounded-md border-gray-200 focus:outline-none focus:ring-1 focus:ring-blue-300 focus:border-transparent" name="overview" rows="5" cols="60" id="overview"> {{old('overview')}} </textarea>
                    @if($errors->has('overview'))
                        <p class=" is-danger">{{$errors->first('overview')}}</p>
                    @endif
            </div>

            <div class="mt-6 flex items-center justify-center">
                <button type="submit" name="submit" class="py-1.5 px-3.5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Upload</button>
            </div>
            </div>
            </div>

        </form>
    </div>

</x-app-layout>
