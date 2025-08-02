<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark transition-colors duration-500">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            // This script enforces the dark theme on load, aligning with the Web3 aesthetic.
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark'); // Ensure localStorage reflects dark mode
        </script>
    </head>
    <body class="font-inter antialiased bg-cover bg-fixed bg-center" style="background-image: url('{{ asset('storage/images/6397022.jpg') }}');">
        <div class="min-h-screen flex flex-col bg-black bg-opacity-70 transition-colors duration-500">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-black bg-opacity-80 shadow-lg transition-colors duration-500 border-b border-gray-700">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-white">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-grow">
                <div class="py-12">
                    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
                        {{-- No direct container here, content comes from child views --}}
                        <div class="p-6 text-gray-200">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>


            {{-- Footer Section --}}
            <footer class="bg-black bg-opacity-80 text-gray-400 py-6 border-t border-gray-700 transition-colors duration-500">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm">
                    &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
                </div>
            </footer>
        </div>
    </body>
</html>