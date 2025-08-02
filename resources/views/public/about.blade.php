@extends('public.layouts.main')

@section('title', 'Tentang Saya')

@section('content')
    <div class="relative py-20 overflow-hidden min-h-screen flex items-center justify-center
                 bg-black bg-opacity-70 transition-colors-theme"> {{-- Base background: black with 70% opacity --}}
        <div class="max-w-8xl mx-auto px-6 lg:px-8 w-full"> {{-- Consistent horizontal padding --}}
            {{-- Main container with modern styling --}}
            <div class="rounded-lg shadow-2xl p-8 md:p-12 border transition-all duration-500 ease-in-out hover:shadow-indigo-500/30"> {{-- Transparent black card, stronger hover shadow glow --}}
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-600 transition-colors-theme">Tentang Saya</h1> {{-- Consistent vibrant gradient for heading --}}

                <div class="md:flex md:items-center md:space-x-16 lg:space-x-20"> {{-- More space between elements --}}
                    <div class="md:w-1/3 flex justify-center mb-10 md:mb-0"> {{-- Larger bottom margin for mobile --}}
                        {{-- Replace with your profile image path --}}
                        {{-- Using Storage::url() for images from storage --}}
                        <img src="{{ Storage::url('profile-placeholder.jpg') }}" alt="Foto Profil" class="rounded-lg w-64 h-64 object-cover shadow-xl transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-cyan-500/30
                                             border-4 border-gray-700 transition-colors-theme"> {{-- Soft border, standard shadow, hover scale with glow --}}
                    </div>
                    <div class="md:w-2/3 text-lg lg:text-xl leading-relaxed space-y-6 font-light
                                 text-gray-300 transition-colors-theme"> {{-- Larger text size, comfortable line height, space-y for paragraphs, lighter font --}}
                        <p>
                            Halo! Nama saya <span class="font-semibold text-indigo-400 transition-colors-theme">[Nama Anda]</span>. Saya adalah seorang Developer Web Fullstack dengan semangat besar dalam membangun aplikasi web yang efisien, skalabel, dan user-friendly. Saya memiliki pengalaman dalam mengembangkan solusi end-to-end, mulai dari arsitektur database yang solid hingga implementasi antarmuka pengguna yang intuitif dan responsif.
                        </p>
                        <p>
                            Saya sangat fokus pada penggunaan teknologi modern seperti <span class="font-semibold text-red-500 transition-colors-theme">Laravel</span> untuk backend yang kuat dan terstruktur, serta <span class="font-semibold text-cyan-400 transition-colors-theme">Tailwind CSS</span> dan <span class="font-semibold text-green-400 transition-colors-theme">Vue.js/Livewire</span> untuk membangun frontend yang dinamis dan modern. Saya berkomitmen pada praktik coding yang bersih, terdokumentasi dengan baik, dan mudah dipelihara, serta selalu mencari inovasi terbaru untuk diintegrasikan dalam setiap proyek.
                        </p>
                        <p>
                            Di luar dunia coding, saya memiliki ketertarikan pada <span class="font-semibold text-purple-400 transition-colors-theme">[Hobi Anda, misal: eksplorasi teknologi blockchain, membaca buku fiksi ilmiah, bermain game strategi, hiking]</span>. Saya terus mencari peluang baru untuk belajar dan berkembang dalam ekosistem pengembangan web yang selalu berubah ini, terutama di area-area terdepan seperti Web3 dan teknologi desentralisasi.
                        </p>
                    </div>
                </div>

                ---

                {{-- Keahlian & Teknologi Section --}}
                <div class="mt-20"> {{-- Larger top margin --}}
                    <h2 class="text-3xl lg:text-4xl font-bold text-center mb-10 text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-teal-500 transition-colors-theme">Keahlian & Teknologi</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-center">
                        {{-- Skill Cards --}}
                        <div class="p-8 rounded-2xl shadow-lg border hover:border-blue-600 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-blue-500/30
                                    bg-black bg-opacity-60 border-gray-700"> {{-- Transparent black card, blue glow on hover --}}
                            <h3 class="text-2xl lg:text-3xl font-bold mb-6
                                        text-white transition-colors-theme">Backend</h3>
                            <ul class="list-none space-y-4
                                        text-gray-300 transition-colors-theme">
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-code w-6 text-blue-400"></i><span>PHP</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fab fa-laravel w-6 text-red-500"></i><span>Laravel</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-network-wired w-6 text-purple-400"></i><span>RESTful APIs</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-database w-6 text-yellow-500"></i><span>MySQL, PostgreSQL</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-circle-nodes w-6 text-green-400"></i><span>Eloquent ORM</span></li>
                            </ul>
                        </div>
                        <div class="p-8 rounded-2xl shadow-lg border hover:border-purple-600 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-purple-500/30
                                    bg-black bg-opacity-60 border-gray-700"> {{-- Transparent black card, purple glow on hover --}}
                            <h3 class="text-2xl lg:text-3xl font-bold mb-6
                                        text-white transition-colors-theme">Frontend</h3>
                            <ul class="list-none space-y-4
                                        text-gray-300 transition-colors-theme">
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fab fa-html5 w-6 text-orange-500"></i><span>HTML5, CSS3, JavaScript</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fab fa-tailwind-css w-6 text-cyan-400"></i><span>Tailwind CSS</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fab fa-vuejs w-6 text-green-500"></i><span>Vue.js / Alpine.js</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-bolt w-6 text-yellow-400"></i><span>Livewire</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-mobile-alt w-6 text-teal-400"></i><span>Responsive Design</span></li>
                            </ul>
                        </div>
                        <div class="p-8 rounded-2xl shadow-lg border hover:border-green-600 transition-all duration-300 ease-in-out hover:-translate-y-2 hover:shadow-green-500/30
                                    bg-black bg-opacity-60 border-gray-700"> {{-- Transparent black card, green glow on hover --}}
                            <h3 class="text-2xl lg:text-3xl font-bold mb-6
                                        text-white transition-colors-theme">Tools & Lainnya</h3>
                            <ul class="list-none space-y-4
                                        text-gray-300 transition-colors-theme">
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fab fa-git-alt w-6 text-orange-600"></i><span>Git, GitHub</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-box-open w-6 text-gray-400"></i><span>Composer, NPM</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fab fa-docker w-6 text-blue-500"></i><span>Docker (Basic)</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-bug w-6 text-red-400"></i><span>Debugging & Testing</span></li>
                                <li class="flex items-center justify-center space-x-3 text-lg"><i class="fas fa-lightbulb w-6 text-yellow-300"></i><span>Problem Solving</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                ---

                {{-- Download Resume/CV Section --}}
                <div class="mt-20 text-center"> {{-- Larger top margin --}}
                    <h2 class="text-3xl lg:text-4xl font-bold text-center mb-10 text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-yellow-500 transition-colors-theme">Tertarik? Unduh CV Saya!</h2>
                    <a href="{{ asset('storage/your-cv.pdf') }}" download="your-cv.pdf" class="inline-flex items-center px-10 py-4 border border-transparent text-lg font-semibold rounded-full shadow-lg text-white transform hover:-translate-y-1 transition-all duration-300 ease-in-out
                                            bg-gradient-to-r from-teal-500 to-green-600 hover:from-teal-600 hover:to-green-700
                                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 ring-offset-black"> {{-- Gradient button with rounded corners, elevated shadow, ring offset --}}
                        <i class="fas fa-download mr-3 text-xl"></i> Unduh Resume/CV
                    </a>
                    {{-- Make sure to replace 'storage/your-cv.pdf' with the actual path to your CV file --}}
                </div>
            </div>
        </div>
    </div>
@endsection