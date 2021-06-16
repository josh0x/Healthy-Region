@extends('errors.error_layout')
@section('content')
    <div class="max-w-4xl mx-auto py-20 sm:px-6 lg:px-8 text-black">
        <div class="mt-5 md:mt-0 md:col-span-2 mx-auto">
            <div class="mx-auto shadow overflow-hidden sm:rounded-md">
                <div class="p-4 px-4 py-5 bg-white sm:p-12 mx-auto">
                    <h1 class="font-extrabold text-6xl px-4 py-10 flex justify-center text-red-400">401 Unauthorized </h1>
                    <h1 class="font-extrabold text-6xl px-4 py-10 flex justify-center"></h1>
                    <img class="justify-center flex mx-auto" src="/images/hz.png">

                </div>
            </div>
            <h1 class="font-extrabold text-6xl px-4 py-10 flex justify-center">Sorry but your account unauthorized!</h1>
            <div class="flex items-center justify-center px-4 py-3 bg-gray-50 text-right sm:px-6">
                <a href="/dashboards" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" type="button">
                    Back Home
                </a>
            </div>
        </div>
    </div>
@endsection
