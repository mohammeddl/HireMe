@extends('layouts.app')
@section('title') service @endsection
@section('content')
<section class="bg-white dark:bg-gray-900">
    <div class="container px-6 py-10 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">Services</h1>

        <div class="mt-8 lg:-mx-6 lg:flex lg:items-center">
            <img class="object-cover w-full lg:mx-6 lg:w-1/2 rounded-xl h-72 lg:h-96" src="{{ asset('images/' . $post->img) }}"alt="">

            <div class="mt-6 lg:w-1/2 lg:mt-0 lg:mx-6 ">
                <p class="text-sm text-blue-500 uppercase">{{$post->categorie->categoryName}}</p>

                <a href="#" class="block mt-4 text-2xl font-semibold text-gray-800 hover:underline dark:text-white">
                    {{$post->title}}
                </a>

                <p class="mt-3 text-sm text-gray-500 dark:text-gray-300 md:text-sm">
                    {{$post->description}}
                </p>

                <div class="flex items-center mt-6">
                    <div class="mx-4">
                        <h1 class="text-sm text-gray-700 dark:text-gray-200">{{$post->created_at}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
