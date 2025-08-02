<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-200 leading-tight transition-colors duration-500">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-800 dark:text-gray-100 mb-6 transition-colors duration-500">
                <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-500 mb-1"> {{-- Adjusted gradient for a bit more vibrancy --}}
                    {{ __("Selamat Datang!") }}
                </h3>
            </div>

            {{-- Project Info Boxes --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Total Projects Box --}}
                <div class="bg-black bg-opacity-60 rounded-lg shadow-xl p-6 border-2 border-blue-600 flex flex-col items-center justify-center text-center transition-all duration-300 hover:scale-105 transform"> {{-- Stronger border, shadow, and subtle hover effect --}}
                    <svg class="w-14 h-14 text-blue-400 mb-3 transition-colors duration-500 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-5h2m-2 0h2m-2 0l-3 3m3-3L8 9m4-4h2m-2 0v5h2m-2 0h2m-2 0l3 3m-3-3L16 9"></path></svg>
                    <h4 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-cyan-300 drop-shadow-md">{{ $totalProjects }}</h4> {{-- Larger font, shadow for numbers --}}
                    <p class="text-gray-100 text-lg mt-2 transition-colors duration-500">{{ __('Total Proyek') }}</p>
                </div>

                {{-- Published Projects Box --}}
                <div class="bg-black bg-opacity-60 rounded-lg shadow-xl p-6 border-2 border-green-600 flex flex-col items-center justify-center text-center transition-all duration-300 hover:scale-105 transform"> {{-- Stronger border, shadow, and subtle hover effect --}}
                    <svg class="w-14 h-14 text-green-400 mb-3 transition-colors duration-500 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    <h4 class="text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-300 to-lime-300 drop-shadow-md">{{ $publishedProjects }}</h4> {{-- Larger font, shadow for numbers --}}
                    <p class="text-gray-100 text-lg mt-2 transition-colors duration-500">{{ __('Proyek Diterbitkan') }}</p>
                </div>

                {{-- Quick Action Box (e.g., Add Project) --}}
                <div class="bg-black bg-opacity-60 rounded-lg shadow-xl p-6 border-2 border-purple-600 flex flex-col items-center justify-center text-center transition-all duration-300 hover:scale-105 transform"> {{-- Stronger border, shadow, and subtle hover effect --}}
                    <svg class="w-14 h-14 text-purple-400 mb-3 transition-colors duration-500 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                    <p class="text-gray-100 text-lg mb-3 transition-colors duration-500">{{ __('Aksi Cepat') }}</p>
                    <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-purple-600 to-fuchsia-700 hover:from-purple-700 hover:to-fuchsia-800 text-white font-semibold text-base uppercase tracking-wider rounded-lg shadow-xl transition ease-in-out duration-300 transform hover:-translate-y-1"> {{-- Adjusted padding, font size, gradient, and hover effect for button --}}
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        {{ __('Tambah Proyek') }}
                    </a>
                </div>

            </div>

            {{-- Link to Project Management --}}
            <div class="mt-8 text-center">
                <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-8 py-3 bg-black bg-opacity-70 border border-gray-700 rounded-lg font-semibold text-sm text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 focus:ring-offset-black transition ease-in-out duration-300 shadow-xl transform hover:-translate-y-1"> {{-- Adjusted padding, font size, shadow, and hover effect for button --}}
                    {{ __('Lihat Semua Proyek') }}
                </a>
            </div>
        </div>
    </div>
</x-app-layout>