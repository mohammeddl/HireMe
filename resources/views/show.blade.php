@extends('layouts.app')
@section('title') service @endsection
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="container px-16 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Services</h1>

        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="{{ asset('images/' . $post->img) }}"alt="">

            <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                <div class="h-[30vh] ">
                <p class="text-1xl font-black text-gray-700 border-0 border-gray-200 sm:text-2xl">{{$post->categorie->categoryName}}</p>

                <p href="#" class="block mt-4 text-2xl font-semibold text-gray-800  dark:text-white">
                    {{$post->title}}
                </p>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                    {{$post->description}}
                </p>

                <div class="flex items-center justify-between mt-4">
                    <div>
                        <a href="#" class="text-lg font-medium text-gray-700 dark:text-gray-300 hover:underline hover:text-gray-500">
                            {{$post->user->name}}
                        </a>

                        <p class="text-sm text-gray-500 dark:text-gray-400">{{$post->date}}</p>
                    </div>
                    <div class="flex px-3 py-2 ml-8  text-xs font-medium tracking-wide uppercase bg-gray-800 rounded-full text-green-50">
                        <svg class="w-4 h-4 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#f5efef" d="M0 80V229.5c0 17 6.7 33.3 18.7 45.3l176 176c25 25 65.5 25 90.5 0L418.7 317.3c25-25 25-65.5 0-90.5l-176-176c-12-12-28.3-18.7-45.3-18.7H48C21.5 32 0 53.5 0 80zm112 32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>{{$post->price}}DH
                    </div>
                </div>
            </div>
            <div class=" my-12  center text-xs font-medium tracking-wide  bg-gray-800 rounded-full text-green-50">
                <p class="text-lg text-center font-medium text-white dark:text-gray-300  hover:text-gray-500">
                    Email: {{$post->user->email}}
                </p>
                <p class="text-sm text-center text-white dark:text-gray-400">Phone: {{$post->user->phone}}</p>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
