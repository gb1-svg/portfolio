@extends('public.layouts.main')
@section('title', 'Proyek')

@section('content')
    <div class="relative py-12 overflow-hidden min-h-screen
                 bg-black bg-opacity-70 transition-colors-theme"> {{-- Base background: black with 70% opacity --}}
        <div class="max-w-8xl mx-auto px-6 lg:px-8"> {{-- Consistent horizontal padding --}}
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-center mb-16 text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-500 transition-colors-theme">Semua Proyek Saya</h1> {{-- Vibrant gradient for heading --}}

            @if($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    @foreach($projects as $project)
                        {{-- Project Card with modern styling --}}
                        <a href="{{ route('projects.show', $project->slug) }}"
                           class="block rounded-2xl shadow-lg overflow-hidden border transition-all duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-xl hover:border-blue-600 hover:shadow-blue-500/30
                                   bg-black bg-opacity-50 border-gray-800"> {{-- Project card background: black with 50% opacity, rounded corners, subtle blue glow on hover --}}
                            @if($project->image)
                                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" {{-- Using Storage::url() --}}
                                     class="w-full h-56 object-cover object-center transform hover:scale-105 transition-transform duration-300"> {{-- Taller image, object-center, hover scale --}}
                            @else
                                <div class="w-full h-56 flex items-center justify-center text-lg rounded-t-2xl
                                            bg-black bg-opacity-60 text-gray-500">No Image Available</div> {{-- Placeholder background: black with 60% opacity --}}
                            @endif
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold mb-2
                                           text-gray-100 transition-colors-theme">{{ $project->title }}</h3>
                                <p class="text-base mb-4 font-light
                                           text-gray-400 transition-colors-theme">{{ Str::limit($project->short_description, 120) }}</p>
                                @if(is_array($project->technologies)) {{-- Ensuring technologies is an array --}}
                                    <div class="flex flex-wrap gap-2 mt-4"> {{-- Larger top margin --}}
                                        @foreach($project->technologies as $tech)
                                            <span class="text-sm px-4 py-1.5 rounded-lg border font-medium
                                                         bg-black bg-opacity-60 text-gray-300 border-gray-700 transition-colors-theme"> {{-- Tag background: black with 60% opacity --}}
                                                {{ $tech }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>

                ---

                {{-- Pagination Links --}}
                <div class="mt-16 flex justify-center pb-20"> {{-- Larger top margin, bottom padding for space --}}
                    {{-- Ensure the Tailwind pagination view is set up for dark mode if there are customizations.
                         Laravel's default pagination for Tailwind is usually good enough. --}}
                    {{ $projects->links('vendor.pagination.tailwind') }}
                </div>
            @else
                <div class="rounded-2xl shadow-lg p-10 text-center border
                            bg-black bg-opacity-50 border-gray-800 transition-colors-theme"> {{-- Empty message card background: black with 50% opacity, rounded corners --}}
                    <p class="text-xl
                               text-gray-400 transition-colors-theme">Belum ada proyek yang diterbitkan saat ini.</p>
                </div>
            @endif
        </div>
    </div>
@endsection