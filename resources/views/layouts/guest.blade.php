<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-V/r+tXJdM1v7t2LzN7t6N4L8J4V0E0P6Z0Q0P8P0J7Q0F0H5N5N5O5N5N5N5N5N5==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- IMPORTANT: Replace the integrity hash above with the correct one from Font Awesome CDN or your local setup --}}


        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script>
            // Script to ensure the dark theme is always applied
            document.documentElement.classList.add('dark');
            localStorage.theme = 'dark'; // Explicitly set theme in localStorage to dark
        </script>
    </head>
    {{-- Background Image Added to Body --}}
    <body class="font-inter antialiased bg-cover bg-center" style="background-image: url('{{ asset('storage/images/6397022.jpg') }}');">
        {{-- Overlay Div to control image opacity --}}
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-black bg-opacity-70">
            {{-- Moved Admin Login text directly into the layout --}}
            <div class="text-center mb-6">
                <a href="/"> {{-- Link the Admin Login text to the home page if desired --}}
                    <h1 class="text-4xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">
                        Admin Login
                    </h1>
                </a>
            </div>

            {{-- The card containing the actual form --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-black bg-opacity-50 shadow-xl overflow-hidden rounded-lg border border-gray-800">
                 {{-- This is the ONLY slot. The login form content will go here. --}}
                 {{ $slot }}
            </div>
        </div>
        {{-- This is crucial for scripts pushed from child views --}}
        @stack('scripts')
    </body>
</html>