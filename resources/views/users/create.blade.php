<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create user
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-20 sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="p-4 px-4 py-5 bg-white sm:p-12">
                    <form action="{{ route('users.store') }}" method="post" class="x-form" enctype="multipart/form-data">
                        @csrf

                        <div class="mt-2 flex justify-center text-lg font-bold text-gray-700">
                            <h1>Note: All fields with <a class="text-red-500">*</a> are mandatory to be filled in.</h1>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="roles" class="block font-medium text-sm text-gray-700">Role</label>
                                <select name="roles[]" id="roles" class="form-input rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                    @foreach($roles as $id => $role)
                                        <option class="text-sm text-gray-700" value="{{ $id }}"{{ in_array($id, old('roles', [])) ? ' selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                            </select>
                            @error('roles')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">
                                <span> <a class="text-red-500">*</a>Name</span>
                            </label>
                            <input class="@error('name') border-red-500 @enderror form-input rounded-md shadow-sm mt-1 block w-full" type="text" name="name" rows="2" cols="60" id="title" value="{{old('name')}}">
                                @if($errors->has('name'))
                                    <p class="text-red-500">* Fill in a correct name (minimum 5 characters)</p>
                                @endif
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('email', '') }}" />
                            @error('email')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                            @error('password')
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                </div>

                            <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" type="submit">
                                    Create
                                </button>
                            </div>
                    </form>
            </div>
        </div>
    </div>

</x-app-layout>
