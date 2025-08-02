<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full dark"> {{-- Added 'dark' class here --}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @hasSection('title') - @yield('title') @endif</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    {{-- Menggunakan Inter font untuk tampilan modern --}}
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // Script to ensure the dark theme is always applied
        // This prevents "flash of unstyled content" (FOUC)
        document.documentElement.classList.add('dark');
        localStorage.theme = 'dark'; // Explicitly set theme in localStorage to dark
    </script>
    <style>
    .cursor-bubble {
        position: fixed;
        width: 10px; /* Ukuran awal gelembung */
        height: 10px;
        background-color: rgba(255, 255, 255, 0.9); /* Warna putih cerah, hampir transparan */
        border-radius: 50%;
        pointer-events: none; /* Penting: agar tidak mengganggu interaksi mouse dengan elemen lain */
        opacity: 0;
        transform: scale(0);
        animation: bubbleEffect 1.2s forwards ease-out; /* Durasi dan easing yang lebih lambat */
        z-index: 9999; /* Pastikan gelembung di atas semua elemen lain */
        /* Efek glow yang lebih menonjol dan menyebar */
        box-shadow: 0 0 5px rgba(255, 255, 255, 0.7), 
                    0 0 15px rgba(255, 255, 255, 0.5),
                    0 0 30px rgba(128, 203, 196, 0.3); /* Tambahan glow kebiruan/aqua untuk kesan tech */
    }

    @keyframes bubbleEffect {
        0% {
            opacity: 0;
            transform: scale(0);
        }
        20% {
            opacity: 1; /* Cepat muncul */
            transform: scale(1.2); /* Sedikit membesar */
        }
        100% {
            opacity: 0;
            transform: scale(0.7); /* Mengecil sedikit sebelum hilang sepenuhnya */
        }
    }        /* These transitions apply regardless of theme, so they are kept. */
        html.dark, html:not(.dark) {
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        /* Apply transition to specific elements for smoother theme changes */
        .transition-colors-theme {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* --- Perubahan Utama di sini untuk Background Image --- */
        body {
            /* Pastikan path gambar Anda benar di server publik Laravel Anda */
            /* Jika Anda menjalankan `php artisan storage:link`, maka pathnya adalah /storage/images/nama_file.jpg */
            /* Jika gambar langsung di public/img/, maka pathnya /img/nama_file.jpg */
            background-image: url("{{ asset('storage/images/6397022.jpg') }}");
            background-size: cover; /* Menutupi seluruh area elemen */
            background-position: center; /* Posisikan gambar di tengah */
            background-repeat: no-repeat; /* Jangan ulangi gambar */
            background-attachment: fixed; /* Membuat background tetap saat scroll (opsional) */
        }
        
        /* Untuk memastikan teks dan elemen lain tetap terlihat di atas gambar latar, */
        /* Anda mungkin perlu menyesuaikan warna teks atau menambahkan overlay semi-transparan */
        /* ke kontainer utama jika gambar terlalu terang/ramai. */
        .overlay-content {
            min-height: 100vh; /* Sesuaikan agar menutupi seluruh tinggi viewport */
            display: flex; /* Untuk flexbox agar konten di tengah jika perlu */
            flex-direction: column;
        }
    </style>
</head>
<body class="font-inter antialiased h-full"> {{-- Removed bg-gray-900 and dark:bg-gray-100 from body --}}
    <div class="overlay-content">
        {{-- Navbar --}}
        <nav x-data="{ open: false }" class="py-4 shadow-lg transition-colors-theme
                                         bg-black border-b border-gray-800
                                         bg-opacity-80"> {{-- Removed dark:bg-white and dark:border-gray-200, dark:shadow-md, dark:bg-opacity-80 as theme is fixed dark --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <div>
                    {{-- Judul dengan gradien modern --}}
                    <a href="{{ route('home') }}" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 transition-colors-theme"> {{-- Removed dark:from-blue-600 dark:to-purple-700 as theme is fixed dark --}}
                        {{ config('app.name', 'ApexTrack') }}
                    </a>
                </div>

                {{-- Navigasi Desktop --}}
                <div class="hidden sm:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors-theme
                                                         text-gray-300 hover:text-white">Home</a> {{-- Removed dark:text-gray-600 dark:hover:text-gray-900 --}}
                    <a href="{{ route('projects.index') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors-theme
                                                                 text-gray-300 hover:text-white">Projects</a> {{-- Removed dark:text-gray-600 dark:hover:text-gray-900 --}}
                    <a href="{{ route('about') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors-theme
                                                         text-gray-300 hover:text-white">About</a> {{-- Removed dark:text-gray-600 dark:hover:text-gray-900 --}}
                    <a href="{{ route('contact') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors-theme
                                                                 text-gray-300 hover:text-white">Contact</a> {{-- Removed dark:text-gray-600 dark:hover:text-gray-900 --}}
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors-theme
                                                                 text-purple-400 hover:text-purple-300">Dashboard</a> {{-- Removed dark:text-purple-600 dark:hover:text-purple-700 --}}
                    @else
                        <a href="{{ route('login') }}" class="px-3 py-2 rounded-md text-sm font-medium transition-colors-theme
                                                                 text-blue-400 hover:text-blue-300">Login</a> {{-- Removed dark:text-blue-600 dark:hover:text-blue-700 --}}
                    @endauth
                </div>

                {{-- Mobile Menu Toggle --}}
                <div class="-mr-2 flex items-center sm:hidden">
                    {{-- Removed Toggle Mode Button for Mobile as it's no longer needed --}}
                    
                    {{-- Hamburger menu toggle --}}
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md transition-colors-theme
                                                             text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500"> {{-- Removed dark:text-gray-500 dark:hover:text-gray-700 dark:hover:bg-gray-100 dark:focus:ring-blue-500 --}}
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                 class="sm:hidden bg-gray-800 border-t border-gray-700 transition-colors-theme"> {{-- Removed dark:bg-gray-50 dark:border-gray-300 --}}
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors-theme
                                                         text-white bg-gray-900">Home</a> {{-- Removed dark:text-gray-900 dark:bg-gray-200 --}}
                    <a href="{{ route('projects.index') }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors-theme
                                                                 text-gray-300 hover:text-white hover:bg-gray-700">Projects</a> {{-- Removed dark:text-gray-700 dark:hover:text-gray-900 dark:hover:bg-gray-200 --}}
                    <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors-theme
                                                         text-gray-300 hover:text-white hover:bg-gray-700">About</a> {{-- Removed dark:text-gray-700 dark:hover:text-gray-900 dark:hover:bg-gray-200 --}}
                    <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors-theme
                                                                 text-gray-300 hover:text-white hover:bg-gray-700">Contact</a> {{-- Removed dark:text-gray-700 dark:hover:text-gray-900 dark:hover:bg-gray-200 --}}
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors-theme
                                                                 text-purple-400 hover:text-white hover:bg-gray-700">Dashboard</a> {{-- Removed dark:text-purple-600 dark:hover:text-gray-900 dark:hover:bg-gray-200 --}}
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium transition-colors-theme
                                                                 text-blue-400 hover:text-white hover:bg-gray-700">Login</a> {{-- Removed dark:text-blue-600 dark:hover:text-gray-900 dark:hover:bg-gray-200 --}}
                    @endauth
                </div>
            </div>
        </nav>

        {{-- Konten Utama --}}
        <main class="flex-grow">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="py-6 border-t transition-colors-theme
                                         bg-black border-gray-800
                                         bg-opacity-80"> {{-- Removed dark:bg-white dark:border-gray-200 dark:bg-opacity-80 --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-sm transition-colors-theme
                                         text-gray-500"> {{-- Removed dark:text-gray-600 --}}
                &copy; {{ date('Y') }} <span class="text-blue-400 transition-colors-theme"> {{-- Removed dark:text-blue-600 --}}
                    {{ config('app.name', 'ApexTrack') }}
                </span>. All rights reserved.
            </div>
        </footer>
    </div> {{-- Penutup div overlay-content --}}

    {{-- Script untuk theme toggle --}}
    <script>
    document.addEventListener('mousemove', function(e) {
            // Buat elemen gelembung baru
            const bubble = document.createElement('div');
            bubble.className = 'cursor-bubble'; // Ganti dari 'cursor-particle' menjadi 'cursor-bubble'
            document.body.appendChild(bubble);

            // Variasi ukuran gelembung untuk kesan lebih natural
            const size = Math.random() * 8 + 7; // Ukuran random antara 7px dan 15px
            bubble.style.width = size + 'px';
            bubble.style.height = size + 'px';

            // Set posisi gelembung di kursor
            bubble.style.left = (e.clientX - bubble.offsetWidth / 2) + 'px';
            bubble.style.top = (e.clientY - bubble.offsetHeight / 2) + 'px';

            // Hapus gelembung setelah animasinya selesai
            bubble.addEventListener('animationend', () => {
                bubble.remove();
            });

            // Opsi: Batasi jumlah gelembung agar tidak terlalu banyak
            // Misalnya, jika ada lebih dari 70 gelembung, hapus yang tertua
            const bubbles = document.querySelectorAll('.cursor-bubble');
            if (bubbles.length > 70) { // Menambah batas untuk lebih banyak gelembung
                bubbles[0].remove();
            }
        });  // The script block here is intentionally left empty.
    </script>
    {{-- Ini adalah tempat yang benar untuk @stack('scripts') --}}
    {{-- Ini memastikan script dari blade view yang child dimuat setelah semua HTML utama --}}
    @stack('scripts') 

</body>
</html>