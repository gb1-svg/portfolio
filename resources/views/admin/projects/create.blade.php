<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Proyek Baru') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Kontainer Form dengan gaya Web3 - Background transparan hitam --}}
            <div class="bg-black bg-opacity-70 overflow-hidden shadow-xl sm:rounded-lg p-6 border-2 border-purple-700 transition-colors duration-500"> {{-- Border lebih menonjol, transisi --}}
                <h3 class="text-2xl font-bold text-white mb-6 text-center text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-500">
                    {{ __('Formulir Proyek Baru') }}
                </h3>

                <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="space-y-6"> {{-- Tambahkan spasi vertikal antar field --}}
                        <div>
                            <x-input-label for="title" :value="__('Judul Proyek')" class="text-purple-300" />
                            <x-text-input id="title" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="text" name="title" :value="old('title')" required autofocus placeholder="Masukkan judul proyek Anda" /> {{-- Tambah bg-opacity, placeholder color, transition --}}
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="short_description" :value="__('Deskripsi Singkat')" class="text-purple-300" />
                            <textarea id="short_description" name="short_description" rows="3" class="block mt-1 w-full border-gray-700 bg-black bg-opacity-80 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" required placeholder="Jelaskan proyek Anda secara singkat (maks. 255 karakter)">{{ old('short_description') }}</textarea> {{-- Tambah bg-opacity, placeholder color, transition --}}
                            <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="long_description" :value="__('Deskripsi Lengkap')" class="text-purple-300" />
                            <textarea id="long_description" name="long_description" rows="8" class="block mt-1 w-full border-gray-700 bg-black bg-opacity-80 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" placeholder="Berikan deskripsi detail tentang proyek Anda, teknologi yang digunakan, tantangan, dll. (mendukung Markdown)">{{ old('long_description') }}</textarea> {{-- Tambah bg-opacity, placeholder color, transition --}}
                            <x-input-error :messages="$errors->get('long_description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Gambar Proyek')" class="text-purple-300" />
                            <input type="file" id="image" name="image" class="block mt-1 w-full text-sm text-gray-300
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gradient-to-r file:from-blue-600 file:to-indigo-700 file:text-white file:hover:from-blue-700 file:hover:to-indigo-800 file:cursor-pointer
                                border border-gray-700 rounded-md p-2 hover:border-blue-500 transition-colors duration-200 file:transition-all file:duration-300 file:ease-in-out"/> {{-- Gaya input file dengan gradien --}}
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            <p class="text-sm text-gray-400 mt-1">Format: JPG, PNG, GIF. Maks. 2MB.</p>
                        </div>

                        <div>
                            <x-input-label for="demo_url" :value="__('URL Demo (Opsional)')" class="text-purple-300" />
                            <x-text-input id="demo_url" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="url" name="demo_url" :value="old('demo_url')" placeholder="https://demo.proyekanda.com" /> {{-- Tambah bg-opacity, placeholder color, transition --}}
                            <x-input-error :messages="$errors->get('demo_url')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="github_url" :value="__('URL GitHub (Opsional)')" class="text-purple-300" />
                            <x-text-input id="github_url" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="url" name="github_url" :value="old('github_url')" placeholder="https://github.com/akun/repo" /> {{-- Tambah bg-opacity, placeholder color, transition --}}
                            <x-input-error :messages="$errors->get('github_url')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="technologies" :value="__('Teknologi (pisahkan dengan koma)')" class="text-purple-300" />
                            <x-text-input
                                id="technologies"
                                class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" {{-- Tambah bg-opacity, placeholder color, transition --}}
                                type="text"
                                name="technologies"
                                :value="is_array(old('technologies')) ? implode(', ', old('technologies')) : old('technologies')"
                                placeholder="Contoh: Laravel, Vue.js, Tailwind CSS"
                            />
                            <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
                            <p class="text-sm text-gray-400 mt-1">Pisahkan setiap teknologi dengan koma (contoh: PHP, Laravel, MySQL)</p>
                        </div>

                        <div class="flex items-center">
                            <input id="is_published" name="is_published" type="checkbox" class="rounded dark:bg-black border-gray-700 text-purple-600 shadow-sm focus:ring-purple-500 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-900 transition-colors duration-200" value="1" {{ old('is_published') ? 'checked' : '' }}> {{-- Tambah transition --}}
                            <x-input-label for="is_published" class="ml-2 text-gray-300" :value="__('Terbitkan Proyek')" />
                            <x-input-error :messages="$errors->get('is_published')" class="mt-2" />
                        </div>
                    </div> {{-- End space-y-6 --}}

                    <div class="flex items-center justify-end mt-8">
                        <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-900 transition ease-in-out duration-150 mr-4 shadow-md">
                            {{ __('Batal') }}
                        </a>
                        <x-primary-button class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 px-6 py-3 rounded-md shadow-lg transition ease-in-out duration-300 transform hover:-translate-y-0.5"> {{-- Tambah efek hover untuk tombol --}}
                            {{ __('Simpan Proyek') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>