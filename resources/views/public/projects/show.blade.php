@extends('public.layouts.main')
@section('title', $project->title)

@section('content')
    <div class="relative py-20 overflow-hidden min-h-screen flex items-center justify-center
                 bg-black bg-opacity-70 transition-colors-theme"> {{-- Base background: black with 70% opacity --}}
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full"> {{-- Slightly narrower max-width for focused content --}}
            {{-- Main project detail container --}}
            <div class="rounded-2xl shadow-2xl overflow-hidden p-8 md:p-12 border transition-all duration-500 ease-in-out hover:shadow-purple-500/30
                         bg-black bg-opacity-50 border-gray-800"> {{-- Main container background: black with 50% opacity, rounded-2xl, subtle purple glow on hover --}}
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-center mb-6 leading-tight text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-600 transition-colors-theme">
                    {{ $project->title }}
                </h1>
                <p class="text-lg lg:text-xl text-center mb-12 font-light
                           text-gray-300 transition-colors-theme">{{ $project->short_description }}</p>

                @if($project->image)
                    <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" {{-- Using Storage::url() --}}
                         class="w-full h-auto rounded-lg mb-12 max-h-[550px] object-cover object-center mx-auto
                                 shadow-lg border border-gray-700 transition-colors-theme"> {{-- Taller image, smoother rounded, shadow, border, centered, larger bottom margin --}}
                @else
                    <div class="w-full h-96 flex items-center justify-center rounded-lg mb-12 text-xl
                                 shadow-lg border
                                 bg-black bg-opacity-60 text-gray-500 border-gray-700 transition-colors-theme">No Image Available</div> {{-- Consistent styling --}}
                @endif

                <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-16"> {{-- New grid layout, larger spacing --}}
                    <div class="md:col-span-2"> {{-- Long description takes 2 columns --}}
                        <h2 class="text-3xl lg:text-4xl font-bold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600 transition-colors-theme">Detail Proyek</h2> {{-- Title gradient --}}
                        <div class="prose prose-lg max-w-none leading-relaxed
                                    prose-invert text-gray-300 transition-colors-theme"> {{-- text-lg and leading-relaxed for comfortable reading, prose-lg for larger default size --}}
                            {!! $project->long_description ? Str::markdown($project->long_description) : '<p>Tidak ada deskripsi detail untuk proyek ini.</p>' !!} {{-- Use Str::markdown if $project->long_description contains markdown --}}
                        </div>
                    </div>
                    <div> {{-- Side column --}}
                        <h2 class="text-3xl lg:text-4xl font-bold mb-8 text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-500 transition-colors-theme">Teknologi Digunakan</h2> {{-- Title gradient --}}
                        @if(is_array($project->technologies)) {{-- Ensuring technologies is an array --}}
                            <div class="flex flex-wrap gap-3 mb-10"> {{-- Larger spacing between tags --}}
                                @foreach($project->technologies as $tech)
                                    <span class="text-sm font-medium px-4 py-1.5 rounded-lg border
                                                 bg-black bg-opacity-60 text-gray-300 border-gray-700 transition-colors-theme"> {{-- Tag background: black with 60% opacity --}}
                                        {{ $tech }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <p class="text-base
                                       text-gray-400 transition-colors-theme">Tidak ada teknologi yang dicantumkan.</p>
                        @endif

                        <h2 class="text-3xl lg:text-4xl font-bold mb-8 mt-10 text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-pink-600 transition-colors-theme">Aksi</h2> {{-- Title for buttons --}}
                        <div class="space-y-6"> {{-- Larger vertical spacing between buttons --}}
                            @if($project->demo_url)
                                <a href="{{ $project->demo_url }}" target="_blank"
                                   class="inline-flex items-center justify-center w-full rounded-full px-8 py-4 border border-transparent text-lg font-semibold shadow-lg text-white transform hover:-translate-y-1 transition-transform duration-300 ease-in-out
                                           bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800
                                           focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ring-offset-black"> {{-- Gradient button with rounded corners, elevated shadow, consistent focus ring --}}
                                    <i class="fas fa-external-link-alt mr-3 text-xl"></i> Lihat Demo Proyek
                                </a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" target="_blank"
                                   class="inline-flex items-center justify-center w-full px-8 py-4 rounded-full shadow-lg text-lg font-semibold transform hover:-translate-y-1 transition-transform duration-300 ease-in-out
                                           bg-black bg-opacity-60 border border-gray-700 text-gray-200 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ring-offset-black"> {{-- Github button background: black with 60% opacity, rounded corners, consistent focus ring --}}
                                    <i class="fab fa-github mr-3 text-xl"></i> Kunjungi Repositori GitHub
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                ---

                {{-- Back Button --}}
                <div class="mt-16 text-center border-t pt-10
                             border-gray-800 transition-colors-theme"> {{-- Top border and padding, larger top margin --}}
                    <a href="{{ route('projects.index') }}"
                       class="inline-flex items-center text-lg lg:text-xl transition-colors duration-200
                                text-gray-400 hover:text-white">
                        <i class="fas fa-arrow-left mr-4"></i> Kembali ke Daftar Proyek
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection