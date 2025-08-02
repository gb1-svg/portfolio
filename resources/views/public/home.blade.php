@extends('public.layouts.main')

@section('title', 'Home')

@section('content')
    {{-- Main container with transparent black background --}}
    <div class="relative py-20 min-h-screen flex items-center justify-center transition-colors-theme bg-black bg-opacity-70"> {{-- Main page background: transparent black (70% opacity) --}}
        <div class="max-w-8xl mx-auto px-6 lg:px-8 w-full">

            {{-- Hero Section --}}
            <div class="text-center p-12 lg:p-16 rounded-2xl shadow-2xl transition-all duration-300 ease-in-out
                        bg-black bg-opacity-50 border border-gray-700 hover:border-blue-500 hover:shadow-blue-500/30"> {{-- Transparent black card, vibrant hover border and shadow glow --}}
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-extrabold tracking-tight mb-6 leading-tight
                           text-white transition-colors-theme"> {{-- White text for hero --}}
                    Halo, Saya <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600 transition-colors-theme">Amin Masum</span> {{-- Vibrant blue/cyan gradient for name --}}
                </h1>
                <p class="mt-4 text-xl lg:text-2xl max-w-3xl mx-auto font-light
                           text-gray-300 transition-colors-theme"> {{-- Lighter gray for description --}}
                    Seorang Developer Web Fullstack yang membangun solusi inovatif dan pengalaman pengguna yang imersif.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center px-8 py-3 border text-lg font-medium rounded-full shadow-lg text-white transform hover:-translate-y-1 transition-all duration-300 ease-in-out
                                            bg-gradient-to-r from-purple-600 to-indigo-700 hover:from-purple-700 hover:to-indigo-800
                                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-black"> {{-- Gradient button with rounded corners, elevated shadow --}}
                        <i class="fas fa-rocket mr-3 text-xl"></i> Lihat Proyek Saya
                    </a>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 border text-lg font-medium rounded-full shadow-lg text-white transform hover:-translate-y-1 transition-all duration-300 ease-in-out
                                            bg-gradient-to-r from-blue-600 to-cyan-700 hover:from-blue-700 hover:to-cyan-800
                                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ring-offset-black"> {{-- Different gradient for contact button --}}
                        <i class="fas fa-paper-plane mr-3 text-xl"></i> Hubungi Saya
                    </a>
                </div>
            </div>

            {{-- Tab Navigation for Skills and Projects --}}
            <div class="mt-28 text-center pb-20">
                <div class="flex justify-center space-x-6 mb-12"> {{-- More space between tabs --}}
                    <button id="show-skills"
                            class="tab-button inline-flex items-center px-10 py-4 border text-xl font-semibold rounded-full transition-all duration-300 ease-in-out
                                   text-gray-400 border-gray-600 hover:text-white hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ring-offset-black"> {{-- Larger button, rounded, focus ring offset --}}
                        Keahlian Utama
                    </button>
                    <button id="show-projects"
                            class="tab-button inline-flex items-center px-10 py-4 border text-xl font-semibold rounded-full transition-all duration-300 ease-in-out
                                   text-gray-400 border-gray-600 hover:text-white hover:border-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ring-offset-black"> {{-- Larger button, rounded, focus ring offset --}}
                        Proyek Terbaru
                    </button>
                </div>

                {{-- Keahlian Utama Section (Content) --}}
                <div id="skills-section" class="tab-content">
                    <h2 class="sr-only">Keahlian Utama</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-8 px-4 sm:px-6 lg:px-8"> {{-- Larger gap --}}
                        @foreach(config('portfolio.skills') as $skill)
                            <div class="p-8 rounded-2xl shadow-xl border flex flex-col items-center justify-center transition-transform duration-200 ease-in-out hover:scale-105 hover:shadow-blue-500/30
                                        bg-black bg-opacity-40 border-gray-800 hover:border-blue-500"> {{-- Transparent black card, glowing shadow on hover --}}
                                <i class="{{ $skill['icon'] }} text-6xl mb-4 text-{{ $skill['color'] }}-400"></i> {{-- Larger icon size, removed dark class for consistent bright icon --}}
                                <h3 class="text-xl lg:text-2xl font-semibold text-gray-100 transition-colors-theme">{{ $skill['name'] }}</h3> {{-- Slightly brighter text --}}
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Proyek Terbaru Section (Content) --}}
                @if(isset($projects) && $projects->count() > 0)
                    <div id="projects-section" class="tab-content hidden">
                        <h2 class="sr-only">Proyek Terbaru</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> {{-- Larger gap --}}
                            @foreach($projects as $project)
                                <a href="{{ route('projects.show', $project->slug) }}" class="block rounded-2xl shadow-xl overflow-hidden border transition-all duration-200 ease-in-out hover:shadow-purple-500/30 hover:border-purple-500 hover:-translate-y-1
                                        bg-black bg-opacity-40 border-gray-800"> {{-- Transparent black card, purple glow on hover --}}
                                    @if($project->image)
                                        <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="w-full h-56 object-cover object-center transition-transform duration-200 ease-in-out hover:scale-103">
                                    @else
                                        <div class="w-full h-56 flex items-center justify-center text-lg rounded-t-2xl
                                                    bg-black bg-opacity-60 text-gray-500">No Image Available</div> {{-- Transparent black placeholder --}}
                                    @endif
                                    <div class="p-6"> {{-- Increased padding --}}
                                        <h3 class="text-2xl font-semibold mb-2 text-gray-100 transition-colors-theme">{{ $project->title }}</h3> {{-- Brighter title --}}
                                        <p class="text-base mb-3 font-light text-gray-400 transition-colors-theme">{{ Str::limit($project->short_description, 100) }}</p> {{-- Consistent text color --}}
                                        @if(is_array($project->technologies))
                                            <div class="flex flex-wrap gap-2 mt-4"> {{-- More space --}}
                                                @foreach($project->technologies as $tech)
                                                    <span class="inline-block text-sm px-3 py-1.5 rounded-full border font-medium
                                                                 bg-black bg-opacity-60 text-blue-300 border-blue-600"> {{-- Blue tech tags --}}
                                                        {{ $tech }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <div class="text-center mt-16">
                            <a href="{{ route('projects.index') }}"class="inline-flex items-center text-xl transition-colors duration-200
                                text-gray-400 hover:text-white hover:underline"> {{-- Larger text, underline on hover --}}
                                <i class="fas fa-arrow-right mr-3"></i> Lihat Semua Proyek
                            </a>
                        </div>
                    </div>
                @else
                    {{-- Message if no projects are available --}}
                    <div id="projects-section" class="tab-content hidden text-center mt-12 p-8 rounded-xl shadow-md border
                                bg-black bg-opacity-40 border-gray-800"> {{-- Transparent black card for message --}}
                        <p class="text-xl font-light text-gray-400 mb-6">Belum ada proyek terbaru yang tersedia saat ini.</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 border text-lg font-medium rounded-full transition-all duration-200 ease-in-out
                                        text-blue-400 border-blue-500 hover:bg-blue-600 hover:text-white hover:border-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ring-offset-black"> {{-- Consistent button style --}}
                            <i class="fas fa-question-circle mr-3"></i> Ingin kolaborasi proyek? Hubungi saya!
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const showSkillsBtn = document.getElementById('show-skills');
            const showProjectsBtn = document.getElementById('show-projects');
            const skillsSection = document.getElementById('skills-section');
            const projectsSection = document.getElementById('projects-section');
            // Select buttons by class for easier iteration
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            // Define classes for active and inactive states (updated for new Web3 look)
            const activeClasses = [
                'bg-blue-600', 'text-white', 'border-blue-600', 'shadow-lg', 'shadow-blue-500/30' // Solid blue background for active
            ];
            const inactiveClasses = [
                'bg-transparent', 'text-gray-400', 'border-gray-600', 'hover:bg-blue-600', 'hover:text-white', 'hover:border-blue-500', 'shadow-none' // Transparent background, blue on hover
            ];

            function setButtonState(button, isActive) {
                if (isActive) {
                    button.classList.remove(...inactiveClasses);
                    button.classList.add(...activeClasses);
                } else {
                    button.classList.remove(...activeClasses);
                    button.classList.add(...inactiveClasses);
                }
            }

            function showTab(tabId) {
                // Hide all tab content
                tabContents.forEach(tab => {
                    tab.classList.add('hidden');
                });

                // Set all buttons to inactive state
                tabButtons.forEach(button => {
                    setButtonState(button, false);
                });

                // Show the selected tab content
                document.getElementById(tabId).classList.remove('hidden');

                // Set the active button to active state
                // This assumes your button ID matches the section ID, e.g., 'show-skills' for 'skills-section'
                const activeButton = document.getElementById(`show-${tabId.split('-')[0]}`);
                if (activeButton) {
                    setButtonState(activeButton, true);
                }
            }

            // Initial state: Show Skills tab and set its button as active
            showTab('skills-section');

            showSkillsBtn.addEventListener('click', function () {
                showTab('skills-section');
            });

            showProjectsBtn.addEventListener('click', function () {
                showTab('projects-section');
            });
        });
    </script>
    @endpush
@endsection