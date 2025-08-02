<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition-colors duration-500">
            {{ __('Detail Proyek: ') . $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Main content container with transparent black background and purple border --}}
            <div class="bg-black bg-opacity-70 overflow-hidden shadow-xl sm:rounded-lg p-6 text-gray-900 dark:text-gray-100 border-2 border-purple-700 transition-colors duration-500">

                <div class="mb-6 flex justify-between items-center transition-colors duration-500">
                    <h3 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-500"> {{-- Consistent gradient title --}}
                        {{ $project->title }}
                    </h3>
                    <div class="flex space-x-4"> {{-- Increased space between buttons --}}
                        {{-- Edit Button with consistent gradient style and hover effect --}}
                        <a href="{{ route('admin.projects.edit', $project) }}" class="inline-flex items-center px-6 py-3
                            bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 {{-- Changed to blue/indigo gradient for edit --}}
                            text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-lg
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900
                            transition ease-in-out duration-300 transform hover:-translate-y-0.5">
                            {{ __('Edit') }}
                        </a>
                        {{-- Hapus Button with consistent gradient style and hover effect --}}
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-6 py-3
                                bg-gradient-to-r from-red-600 to-rose-700 hover:from-red-700 hover:to-rose-800
                                text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-lg
                                focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900
                                transition ease-in-out duration-300 transform hover:-translate-y-0.5">
                                {{ __('Hapus') }}
                            </button>
                        </form>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8"> {{-- Increased gap for better spacing --}}
                    <div>
                        @if($project->image)
                            {{-- Adjusted border color for dark mode, added object-cover for better image fitting --}}
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-auto rounded-lg mb-4 max-h-96 object-cover border border-gray-700 dark:border-gray-600 transition-colors duration-500 shadow-xl"> {{-- Increased max-height, added strong shadow --}}
                        @else
                            {{-- No Image Placeholder with consistent dark mode bg and text --}}
                            <div class="w-full h-96 bg-black bg-opacity-80 flex items-center justify-center text-gray-500 rounded-lg mb-4 transition-colors duration-500 border border-gray-700"> {{-- Matched dark input styles for placeholder --}}
                                <span class="text-xl font-semibold">{{ __('No Image Uploaded') }}</span>
                            </div>
                        @endif

                        <p class="text-sm text-gray-400 mt-2 transition-colors duration-500"> {{-- Softer text color for general info --}}
                            <strong>Status:</strong>
                            {{-- Status Badge with dark mode support and clearer text --}}
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project->is_published ? 'bg-green-600 text-green-100 dark:bg-green-700 dark:text-green-100' : 'bg-red-600 text-red-100 dark:bg-red-700 dark:text-red-100' }} transition-colors duration-500"> {{-- Stronger bg colors for badges --}}
                                {{ $project->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </p>

                        <div class="mt-4 space-y-2"> {{-- Added vertical spacing for URLs --}}
                            <p class="text-gray-400 transition-colors duration-500"><strong>URL Demo:</strong>
                                @if($project->demo_url)
                                    <a href="{{ $project->demo_url }}" target="_blank" class="text-blue-400 hover:text-blue-300 hover:underline transition-colors duration-200">{{ $project->demo_url }}</a> {{-- Adjusted link color for dark theme --}}
                                @else
                                    <span class="text-gray-500 transition-colors duration-500">{{ __('N/A') }}</span>
                                @endif
                            </p>
                            <p class="text-gray-400 transition-colors duration-500"><strong>URL GitHub:</strong>
                                @if($project->github_url)
                                    <a href="{{ $project->github_url }}" target="_blank" class="text-blue-400 hover:text-blue-300 hover:underline transition-colors duration-200">{{ $project->github_url }}</a> {{-- Adjusted link color for dark theme --}}
                                @else
                                    <span class="text-gray-500 transition-colors duration-500">{{ __('N/A') }}</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xl font-semibold mb-2 text-teal-400 transition-colors duration-500">Deskripsi Singkat:</h4> {{-- Vibrant heading color --}}
                        <p class="text-gray-300 transition-colors duration-500">{{ $project->short_description }}</p> {{-- Brighter text color for descriptions --}}

                        <h4 class="text-xl font-semibold mt-6 mb-2 text-teal-400 transition-colors duration-500">Deskripsi Lengkap:</h4> {{-- Vibrant heading color, increased margin --}}
                        <p class="text-gray-300 whitespace-pre-wrap transition-colors duration-500">{{ $project->long_description ?? 'Tidak ada deskripsi lengkap.' }}</p> {{-- Brighter text color for descriptions --}}

                        <h4 class="text-xl font-semibold mt-6 mb-2 text-teal-400 transition-colors duration-500">Teknologi:</h4> {{-- Vibrant heading color, increased margin --}}
                        @if($project->technologies)
                            <div class="flex flex-wrap gap-3"> {{-- Increased gap for tags --}}
                                @foreach($project->technologies as $tech)
                                    {{-- Technology Tag with consistent dark mode background and text, more vibrant look --}}
                                    <span class="bg-gray-700 text-gray-200 text-sm px-4 py-1.5 rounded-full font-medium border border-gray-600 shadow-sm transition-colors duration-500 hover:bg-gray-600 cursor-default">{{ $tech }}</span> {{-- Added padding, font-medium, border, shadow, hover effect --}}
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 transition-colors duration-500">{{ __('Tidak ada teknologi yang dicantumkan.') }}</p>
                        @endif
                    </div>
                </div>

                <div class="mt-10 text-center border-t border-gray-700 pt-6 transition-colors duration-500"> {{-- Stronger border and increased margin-top --}}
                    {{-- Back button with consistent styling and hover effect --}}
                    <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-8 py-3
                        bg-gray-700 border border-gray-600 rounded-md
                        font-semibold text-sm text-white uppercase tracking-widest
                        hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-gray-500 dark:focus:ring-offset-gray-900 transition ease-in-out duration-150 shadow-md transform hover:scale-105"> {{-- Increased padding, text size, added hover scale --}}
                        &larr; {{ __('Kembali ke Daftar Proyek') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>