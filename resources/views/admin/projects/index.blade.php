<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight transition-colors duration-500">
            {{ __('Manajemen Proyek') }}
        </h2>
    </x-slot>

    <div class="py-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Main content container - changed to transparent black with prominent border --}}
            <div class="bg-black bg-opacity-70 overflow-hidden shadow-xl sm:rounded-lg border-2 border-purple-700 transition-colors duration-500">
                <div class="p-6 text-gray-100 transition-colors duration-500">
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('admin.projects.create') }}" class="inline-flex items-center px-5 py-2.5
                                bg-gradient-to-r from-purple-700 to-fuchsia-800 hover:from-purple-800 hover:to-fuchsia-900
                                text-white font-semibold text-base uppercase tracking-wider rounded-lg shadow-xl
                                focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-black
                                transition ease-in-out duration-300 transform hover:-translate-y-1">
                             {{ __('Tambah Proyek Baru') }}
                        </a>
                    </div>

                    {{-- Display success/error messages --}}
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="mb-4 font-medium text-sm text-red-400">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Table Container with transparent black background and vibrant border --}}
                    <div class="overflow-x-auto bg-black bg-opacity-60 border-2 border-blue-600 rounded-lg shadow-xl transition-colors duration-500">
                        <table class="min-w-full divide-y divide-gray-700 transition-colors duration-500">
                            <thead class="bg-black bg-opacity-80">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider transition-colors duration-500">
                                        {{ __('Judul') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider transition-colors duration-500">
                                        {{ __('Deskripsi Singkat') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider transition-colors duration-500">
                                        {{ __('Status') }}
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider transition-colors duration-500">
                                        {{ __('Aksi') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @forelse ($projects as $project)
                                    <tr class="hover:bg-black hover:bg-opacity-50 transition-colors duration-200">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-100 transition-colors duration-500">
                                                {{ $project->title }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-300 transition-colors duration-500">
                                                {{ Str::limit($project->short_description, 50) }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $project->is_published ? 'bg-green-600 text-green-100 shadow-md' : 'bg-red-600 text-red-100 shadow-md' }} transition-colors duration-500">
                                                {{ $project->is_published ? 'Published' : 'Draft' }}
                                            </span>
                                        </td>
                                        {{-- AKSI BUTTONS - PERUBAHAN DI SINI --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <x-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    <button class="inline-flex items-center p-2 rounded-full text-gray-400 border border-gray-700 bg-black bg-opacity-40 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-black transition ease-in-out duration-150 shadow-md">
                                                        <i class="fas fa-ellipsis-v"></i> {{-- Three vertical dots icon --}}
                                                    </button>
                                                </x-slot>

                                                <x-slot name="content">
                                                    <div class="bg-black bg-opacity-90 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 border border-purple-800">
                                                        <x-dropdown-link :href="route('admin.projects.show', $project)" class="text-indigo-400 hover:bg-gray-800 hover:text-indigo-200 transition-colors duration-200">
                                                            <i class="fas fa-eye mr-2"></i> {{ __('Lihat') }}
                                                        </x-dropdown-link>

                                                        <x-dropdown-link :href="route('admin.projects.edit', $project)" class="text-yellow-400 hover:bg-gray-800 hover:text-yellow-200 transition-colors duration-200">
                                                            <i class="fas fa-pencil-alt mr-2"></i> {{ __('Edit') }}
                                                        </x-dropdown-link>

                                                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-dropdown-link :href="route('admin.projects.destroy', $project)"
                                                                             onclick="event.preventDefault(); if (confirm('Apakah Anda yakin ingin menghapus proyek ini?')) { this.closest('form').submit(); }"
                                                                             class="text-red-400 hover:bg-gray-800 hover:text-red-200 transition-colors duration-200">
                                                                <i class="fas fa-trash-alt mr-2"></i> {{ __('Hapus') }}
                                                            </x-dropdown-link>
                                                        </form>
                                                    </div>
                                                </x-slot>
                                            </x-dropdown>
                                        </td>
                                        {{-- AKSI BUTTONS - END --}}
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-300 transition-colors duration-500">
                                            {{ __('Tidak ada proyek yang ditemukan.') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{-- Pagination links --}}
                        {{ $projects->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>