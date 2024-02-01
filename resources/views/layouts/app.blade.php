<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="box-border relative block w-full py-6 leading-10 text-center text-indigo-900 bg-black border-b border-gray-200 md:py-8">
        <div class="w-full px-6 mx-auto leading-10 text-center md:px-8 max-w-7xl">
            <div class="box-border flex flex-wrap items-center justify-between -mx-4 text-indigo-900">
                <div class="relative flex items-center w-auto px-4 leading-10 lg:flex-grow-0 lg:flex-shrink-0 lg:text-left">
                    <a href="#_" class="box-border inline-block font-sans text-2xl font-bold text-left text-white no-underline bg-transparent cursor-pointer focus:no-underline">
                        HireMe.
                    </a>
                </div>
                <div class="left-0 z-0 flex justify-start w-full px-4 mt-2 font-medium leading-10 md:mt-0 md:justify-center md:absolute md:flex-grow-0 md:text-left lg:text-center">
                    <a href="{{route('home')}}" class="box-border inline-block mr-4 text-center text-gray-300 no-underline bg-transparent cursor-pointer hover:text-gray-200 focus:no-underline">
                        Home
                    </a>
                    @guest
                    <a href="#_" class="box-border inline-block mr-4 text-center text-gray-300 no-underline bg-transparent cursor-pointer hover:text-gray-200 focus:no-underline">
                        About
                    </a>
                    @else
                    <a href="{{route('service.index')}}" class="box-border inline-block mr-4 text-center text-gray-300 no-underline bg-transparent cursor-pointer hover:text-gray-200 focus:no-underline">
                        Dashboard
                    </a>
                    @endguest
                </div>
                <div class="relative flex items-center px-4 mt-2 font-medium leading-10 md:flex-grow-0 md:flex-shrink-0 md:mt-0 md:text-right lg:flex-grow-0 lg:flex-shrink-0">
                    @guest
                    <a href="{{route('login.create')}}" class="box-border inline-block h-10 px-4 mr-3 text-right text-gray-200 no-underline bg-gray-800 rounded-lg cursor-pointer md:mr-0 md:bg-transparent hover:text-white focus:no-underline">
                        Login
                    </a>
                    <a href="{{route('register.create')}}" class="box-border inline-flex items-center h-10 px-4 text-base text-center text-gray-100 no-underline align-middle bg-gray-800 rounded-lg cursor-pointer select-none hover:bg-gray-50 hover:text-gray-900 focus:shadow-xs focus:no-underline">
                        Sign Up
                    </a>
                    @else
                    <a href="{{route('logout')}}" class="box-border inline-block h-10 px-4 mr-3 text-right text-gray-200 no-underline bg-gray-800 rounded-lg cursor-pointer md:mr-0 md:bg-transparent hover:text-white focus:no-underline">
                        Logout
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </section>

@if(session()->has('success'))
<div class="flex w-full max-w-sm overflow-hidden m-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-center w-12 bg-emerald-500">
        <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z" />
        </svg>
    </div>

    <div class="px-4 py-2 -mx-3">
        <div class="mx-3">
            <span class="font-semibold text-emerald-500 dark:text-emerald-400">Success</span>
            <p class="text-sm text-gray-600 dark:text-gray-200">{{session('success')}}</p>
        </div>
    </div>
</div>

@endif

@yield('content')
<section class="py-10 bg-black">
    <div class="px-10 mx-auto max-w-7xl">
        <div class="flex flex-col items-center md:flex-row md:justify-between">
            <a href="#_" class="box-border inline-block font-sans text-2xl font-bold text-left text-white no-underline bg-transparent cursor-pointer focus:no-underline">
                HireMe.
            </a>
            </a>

            <div class="flex flex-row justify-center mb-4 -ml-4 -mr-4"> <a href="#" class="p-4 text-gray-700 hover:text-gray-400"> <svg class="fill-current" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.023 16L6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023z"></path>
                    </svg> </a> <a href="#" class="p-4 text-gray-700 hover:text-gray-400"> <svg class="fill-current" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z"></path>
                    </svg> </a> <a href="#" class="p-4 text-gray-700 hover:text-gray-400"> <svg class="fill-current" width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <circle cx="12.145" cy="3.892" r="1"></circle>
                            <path d="M8 12c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4zm0-6c-1.103 0-2 .897-2 2s.897 2 2 2 2-.897 2-2-.897-2-2-2z"></path>
                            <path d="M12 16H4c-2.056 0-4-1.944-4-4V4c0-2.056 1.944-4 4-4h8c2.056 0 4 1.944 4 4v8c0 2.056-1.944 4-4 4zM4 2c-.935 0-2 1.065-2 2v8c0 .953 1.047 2 2 2h8c.935 0 2-1.065 2-2V4c0-.935-1.065-2-2-2H4z"></path>
                        </g>
                    </svg> </a> </div>
        </div>
        <div class="flex flex-col justify-between text-center md:flex-row">
            <p class="order-last text-sm leading-tight text-gray-500 md:order-first"> Crafted with <a href="https://devdojo.com/tails" class="text-white">HireMe</a>. Built with ❤️ by Daali. </p>
            <ul class="flex flex-row justify-center pb-3 -ml-4 -mr-4 text-sm">
                <li> <a href="#_" class="px-4 text-gray-500 hover:text-white">Contact</a> </li>
                <li> <a href="#_" class="px-4 text-gray-500 hover:text-white">About US</a> </li>
                <li> <a href="#_" class="px-4 text-gray-500 hover:text-white">FAQ's</a> </li>
                <li> <a href="#_" class="px-4 text-gray-500 hover:text-white">Terms</a></li>
            </ul>
        </div>
    </div>
</section>
</body>
</html>
