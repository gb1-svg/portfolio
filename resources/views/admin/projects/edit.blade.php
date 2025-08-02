<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition-colors duration-500">
            {{ __('Edit Proyek: ') . $project->title }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Main content container with transparent black background and purple border --}}
            <div class="bg-black bg-opacity-70 overflow-hidden shadow-xl sm:rounded-lg p-6 border-2 border-purple-700 transition-colors duration-500">

                <h3 class="text-2xl font-bold text-white mb-6 text-center text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-green-500">
                    {{ __('Formulir Edit Proyek') }} {{-- Consistent heading style --}}
                </h3>

                <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Penting untuk metode UPDATE --}}

                    <div class="space-y-6"> {{-- Grouping form fields with spacing --}}
                        <div>
                            <x-input-label for="title" :value="__('Judul Proyek')" class="text-purple-300" /> {{-- Consistent label color --}}
                            {{-- Applied dark mode styles and focus effects to x-text-input --}}
                            <x-text-input id="title" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="text" name="title" :value="old('title', $project->title)" required autofocus placeholder="Masukkan judul proyek Anda" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="short_description" :value="__('Deskripsi Singkat')" class="text-purple-300" /> {{-- Consistent label color --}}
                            {{-- Textarea already has good dark mode styling and focus colors --}}
                            <textarea id="short_description" name="short_description" rows="3" class="block mt-1 w-full border-gray-700 dark:border-gray-700 bg-black bg-opacity-80 text-gray-200 placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" required placeholder="Jelaskan proyek Anda secara singkat (maks. 255 karakter)">{{ old('short_description', $project->short_description) }}</textarea>
                            <x-input-error :messages="$errors->get('short_description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="long_description" :value="__('Deskripsi Lengkap')" class="text-purple-300" /> {{-- Consistent label color --}}
                            {{-- Textarea already has good dark mode styling and focus colors --}}
                            <textarea id="long_description" name="long_description" rows="8" class="block mt-1 w-full border-gray-700 dark:border-gray-700 bg-black bg-opacity-80 text-gray-200 placeholder-gray-500 focus:border-blue-500 dark:focus:border-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" placeholder="Berikan deskripsi detail tentang proyek Anda, teknologi yang digunakan, tantangan, dll. (mendukung Markdown)">{{ old('long_description', $project->long_description) }}</textarea>
                            <x-input-error :messages="$errors->get('long_description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Gambar Proyek (Kosongkan jika tidak ingin mengubah)')" class="text-purple-300" /> {{-- Consistent label color --}}
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="Current Image" class="mt-2 mb-4 w-32 h-32 object-cover rounded-md border border-gray-700 dark:border-gray-600 transition-colors duration-500 shadow-md"> {{-- Adjusted border and added shadow for image --}}
                            @endif
                            <input type="file" id="image" name="image" class="block mt-1 w-full text-sm text-gray-300
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-md file:border-0
                                file:text-sm file:font-semibold
                                file:bg-gradient-to-r file:from-blue-600 file:to-indigo-700 file:text-white file:hover:from-blue-700 file:hover:to-indigo-800 file:cursor-pointer
                                border border-gray-700 rounded-md p-2 hover:border-blue-500 transition-colors duration-200 file:transition-all file:duration-300 file:ease-in-out"/> {{-- Consistent file input gradient style --}}
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            <p class="text-sm text-gray-400 mt-1">Format: JPG, PNG, GIF. Maks. 2MB.</p>
                        </div>

                        <div>
                            <x-input-label for="demo_url" :value="__('URL Demo (Opsional)')" class="text-purple-300" /> {{-- Consistent label color --}}
                            {{-- Applied dark mode styles and focus effects to x-text-input --}}
                            <x-text-input id="demo_url" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="url" name="demo_url" :value="old('demo_url', $project->demo_url)" placeholder="https://demo.proyekanda.com" />
                            <x-input-error :messages="$errors->get('demo_url')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="github_url" :value="__('URL GitHub (Opsional)')" class="text-purple-300" /> {{-- Consistent label color --}}
                            {{-- Applied dark mode styles and focus effects to x-text-input --}}
                            <x-text-input id="github_url" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="url" name="github_url" :value="old('github_url', $project->github_url)" placeholder="https://github.com/akun/repo" />
                            <x-input-error :messages="$errors->get('github_url')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="technologies" :value="__('Teknologi (pisahkan dengan koma)')" class="text-purple-300" /> {{-- Consistent label color --}}
                            {{-- Applied dark mode styles and focus effects to x-text-input --}}
                            <x-text-input id="technologies" class="block mt-1 w-full bg-black bg-opacity-80 border-gray-700 text-gray-200 placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm transition-colors duration-200" type="text" name="technologies" :value="old('technologies', implode(', ', $project->technologies ?? []))" placeholder="Contoh: Laravel, Vue.js, Tailwind CSS" />
                            <x-input-error :messages="$errors->get('technologies')" class="mt-2" />
                            <p class="text-sm text-gray-400 mt-1">Pisahkan setiap teknologi dengan koma (contoh: PHP, Laravel, MySQL)</p>
                        </div>

                        <div class="flex items-center">
                            {{-- Checkbox styles adjusted for dark mode consistency --}}
                            <input id="is_published" name="is_published" type="checkbox" class="rounded dark:bg-black border-gray-700 text-purple-600 shadow-sm focus:ring-purple-500 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-900 transition-colors duration-200" value="1" {{ old('is_published', $project->is_published) ? 'checked' : '' }}>
                            <x-input-label for="is_published" class="ml-2 text-gray-300" :value="__('Terbitkan Proyek')" /> {{-- Consistent label color --}}
                            <x-input-error :messages="$errors->get('is_published')" class="mt-2" />
                        </div>
                    </div> {{-- End space-y-6 --}}

                    <div class="flex items-center justify-end mt-8"> {{-- Increased margin-top for button group --}}
                        {{-- "Batal" Button --}}
                        <a href="{{ route('admin.projects.index') }}" class="inline-flex items-center px-6 py-3 bg-gray-700 border border-gray-600 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-900 transition ease-in-out duration-150 mr-4 shadow-md">
                            {{ __('Batal') }}
                        </a>
                        {{-- "Update Proyek" Button with gradient style and hover effect --}}
                        <button type="submit" class="inline-flex items-center px-6 py-3
                            bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800
                            text-white font-semibold text-xs uppercase tracking-widest rounded-md shadow-lg
                            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-white dark:focus:ring-offset-gray-900
                            transition ease-in-out duration-300 transform hover:-translate-y-0.5"> {{-- Consistent gradient and hover effect --}}
                            {{ __('Update Proyek') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>