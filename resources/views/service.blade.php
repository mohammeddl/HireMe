@extends('layouts.app')
@section('title') posts @endsection

@section('content')

<div class="flex justify-center w-[100%] py-6">
    <a href="{{route('create')}}" class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-900 rounded-lg hover:bg-gray-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
    Create
</a>
</div>

<section class="bg-white dark:bg-gray-900">
    <div class="container px-14 pb-6 mx-auto">
        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">From the services</h1>

        <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">
            @foreach ($service as $post)


            <div class="lg:flex">
                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ asset('images/' . $post->img) }}" alt="">

                <div class="flex flex-col justify-between pb-6 lg:mx-6">
                    <a href="{{route('service.show', [$post->id])}}" class="text-xl font-semibold text-gray-800 hover:underline dark:text-white ">
                        {{$post->title}}
                    </a>
                    <div>
                        <p class=" text-gray-800  dark:text-white">
                            {{$post->description}}
                        </p>
                    </div>
            <div class="flex justify-between  ">
                <div class="flex py-1 gap-2">
                <form action="{{route('service.destroy',[$post->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button> <svg xmlns="http://www.w3.org/2000/svg" height="25" width="13.5" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
                    </button>
                </form>

                <a href="{{route('service.update',[$post->id])}}"><svg class="m-1" xmlns="http://www.w3.org/2000/svg" height="17" width="15" viewBox="0 0 512 512"><path fill="#111318" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                </a>
            </div>
                <div class="text-sm px-4 text-gray-500 dark:text-gray-300">{{$post->date}}</div>
            </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div x-data="{ isOpen: true }" class="relative flex justify-center">
    <button @click="isOpen = true" class="px-6 py-2 mx-auto tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
        Open Modal
    </button>

    <div x-show="isOpen"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
        x-transition:leave="transition duration-150 ease-in"
        x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
        x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
        class="fixed inset-0 z-10 overflow-y-auto"
        aria-labelledby="modal-title" role="dialog" aria-modal="true"
    >
        <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="relative inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl rtl:text-right dark:bg-gray-900 sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                <div>
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-700 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>

                    <div class="mt-2 text-center">
                        <h3 class="text-lg font-medium leading-6 text-gray-800 capitalize dark:text-white" id="modal-title">delete Project</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Lorem, ipsum dolor sit amet consectetur
                            adipisicing elit. Aspernatur dolorum aliquam ea, ratione deleniti porro officia? Explicabo
                            maiores suscipit.
                        </p>
                    </div>
                </div>

                <div class="mt-5 sm:flex sm:items-center sm:justify-center">

                    <div class="sm:flex sm:items-center ">
                        <button @click="isOpen = false" class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-gray-700 capitalize transition-colors duration-300 transform border border-gray-200 rounded-md sm:mt-0 sm:w-auto sm:mx-2 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800 hover:bg-gray-100 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-40">
                            Cancel
                        </button>

                        <button class="w-full px-4 py-2 mt-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-900 rounded-md sm:w-auto sm:mt-0 hover:bg-gray-400 focus:outline-none focus:ring  focus:ring-opacity-40">
                            delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
