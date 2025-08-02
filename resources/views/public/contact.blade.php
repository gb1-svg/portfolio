@extends('public.layouts.main')
@section('title', 'Kontak')

@section('content')
    <div class="relative py-20 overflow-hidden min-h-screen flex items-center justify-center
                 bg-black bg-opacity-70 transition-colors-theme"> {{-- Base background: black with 70% opacity --}}
        <div class="max-w-4xl mx-auto px-6 lg:px-8 w-full"> {{-- Constrain form width for better focus on content --}}
            {{-- Main form container with modern styling --}}
            <div class="rounded-2xl shadow-2xl p-8 md:p-12 border transition-all duration-500 ease-in-out hover:shadow-cyan-500/30
                         bg-black bg-opacity-50 border-gray-800"> {{-- Main container background: black with 50% opacity, rounded-2xl for consistency --}}
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-center mb-12 text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-600 transition-colors-theme">Hubungi Saya</h1> {{-- Vibrant gradient for heading --}}

                <p class="text-center mb-10 text-lg lg:text-xl font-light
                           text-gray-300 transition-colors-theme">
                    Punya proyek baru, pertanyaan, atau ingin berkolaborasi? Jangan ragu untuk menghubungi saya melalui formulir di bawah ini!
                </p>

                <form method="POST" action="{{ route('contact.submit') }}" class="space-y-8"> {{-- More space between form fields --}}
                    @csrf

                    <div>
                        <label for="name" class="block text-base font-semibold mb-2
                                                 text-gray-200 transition-colors-theme">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            class="mt-1 block w-full rounded-lg shadow-inner transition-colors duration-200 p-4
                                   bg-black bg-opacity-40 border border-gray-700 text-white placeholder-gray-500
                                   focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-gray-950" {{-- Input background: black with 40% opacity, blue focus glow --}}
                            placeholder="Masukkan nama lengkap Anda"
                            required value="{{ old('name') }}">
                        @error('name')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-base font-semibold mb-2
                                                 text-gray-200 transition-colors-theme">Email Anda</label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full rounded-lg shadow-inner transition-colors duration-200 p-4
                                   bg-black bg-opacity-40 border border-gray-700 text-white placeholder-gray-500
                                   focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-gray-950" {{-- Input background: black with 40% opacity, blue focus glow --}}
                            placeholder="Masukkan alamat email Anda"
                            required value="{{ old('email') }}">
                        @error('email')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="subject" class="block text-base font-semibold mb-2
                                                 text-gray-200 transition-colors-theme">Subjek</label>
                        <input type="text" id="subject" name="subject"
                            class="mt-1 block w-full rounded-lg shadow-inner transition-colors duration-200 p-4
                                   bg-black bg-opacity-40 border border-gray-700 text-white placeholder-gray-500
                                   focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-gray-950" {{-- Input background: black with 40% opacity, blue focus glow --}}
                            placeholder="Tulis subjek pesan Anda"
                            required value="{{ old('subject') }}">
                        @error('subject')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block text-base font-semibold mb-2
                                                 text-gray-200 transition-colors-theme">Pesan Anda</label>
                        <textarea id="message" name="message" rows="7" {{-- More rows for better input area --}}
                                 class="mt-1 block w-full rounded-lg shadow-inner transition-colors duration-200 p-4
                                        bg-black bg-opacity-40 border border-gray-700 text-white placeholder-gray-500
                                        focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-gray-950" {{-- Textarea background: black with 40% opacity, blue focus glow --}}
                                 placeholder="Tulis pesan Anda di sini..."
                                 required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="text-center pt-6"> {{-- Larger top padding for button --}}
                        <button type="submit"
                                class="inline-flex items-center px-10 py-4 border border-transparent text-lg font-semibold rounded-full shadow-lg text-white transition-all duration-300 ease-in-out transform hover:-translate-y-1
                                       bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800
                                       focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ring-offset-black"> {{-- Gradient button with rounded corners, elevated shadow, consistent focus ring --}}
                            <i class="fas fa-paper-plane mr-3 text-xl"></i> Kirim Pesan
                        </button>
                    </div>
                </form>

                ---

                {{-- Direct Contact Section --}}
                <div class="mt-20 text-center border-t pt-10
                             text-gray-400 border-gray-800 transition-colors-theme"> {{-- Border and text color for dark mode --}}
                    <p class="mb-6 text-xl font-light">Atau Anda bisa langsung menghubungi saya melalui:</p>
                    <p class="text-2xl font-bold mb-8 transition-colors-theme
                               text-blue-400"><i class="fas fa-envelope mr-4"></i> your.email@example.com</p> {{-- Email text with vibrant blue color --}}
                    <div class="flex justify-center space-x-10"> {{-- Larger spacing between social icons --}}
                        <a href="https://linkedin.com/in/yourprofile" target="_blank"
                           class="text-5xl transform hover:scale-110 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-black
                                   text-blue-500 hover:text-blue-400 focus:ring-blue-500" {{-- LinkedIn icon colors for dark mode, ring offset --}}
                           aria-label="LinkedIn Profile">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="https://github.com/yourusername" target="_blank"
                           class="text-5xl transform hover:scale-110 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-black
                                   text-gray-400 hover:text-white focus:ring-gray-500" {{-- GitHub icon colors for dark mode, ring offset --}}
                           aria-label="GitHub Profile">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://twitter.com/yourusername" target="_blank"
                           class="text-5xl transform hover:scale-110 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ring-offset-black
                                   text-blue-400 hover:text-blue-300 focus:ring-blue-400" {{-- Twitter icon colors for dark mode, ring offset --}}
                           aria-label="Twitter Profile">
                            <i class="fab fa-twitter"></i>
                        </a>
                        {{-- Add other social media icons if needed, e.g.: --}}
                        {{-- <a href="https://t.me/yourusername" target="_blank"
                           class="text-blue-400 hover:text-blue-300 text-5xl transform hover:scale-110 transition-transform duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 ring-offset-black"
                           aria-label="Telegram Profile">
                           <i class="fab fa-telegram"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection