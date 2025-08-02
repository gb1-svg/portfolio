<nav x-data="{ open: false }" class="bg-black bg-opacity-80 border-b-2 border-purple-700 shadow-xl transition-all duration-500"> {{-- Stronger border for Web3 feel --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500
                                                     hover:from-blue-300 hover:to-purple-400 transition-colors duration-300"> {{-- Hover effect for logo --}}
                        {{ 'Admin Panel'}}
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                 class="text-gray-300 hover:text-white border-b-2 border-transparent hover:border-blue-500 active:border-blue-600 transition-colors duration-200 font-medium"> {{-- Active and hover styles --}}
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('projects.index')"
                                 class="text-gray-300 hover:text-white border-b-2 border-transparent hover:border-green-400 active:border-green-500 transition-colors duration-200 font-medium"> {{-- Active and hover styles --}}
                        {{ __('Manage Projects') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-purple-700 text-sm leading-4 font-medium rounded-full
                                        text-gray-200 bg-black bg-opacity-70 hover:text-white hover:bg-gray-700 focus:outline-none
                                        focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-black transition ease-in-out duration-150 shadow-md">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-900 rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5 border border-purple-800"> {{-- Darker dropdown background with border --}}
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-300 hover:bg-gray-700 hover:text-white transition-colors duration-200">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();"
                                                 class="text-gray-300 hover:bg-gray-700 hover:text-red-400 transition-colors duration-200">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md
                                                 text-gray-400 hover:text-white hover:bg-gray-700
                                                 focus:outline-none focus:bg-gray-700 focus:text-white
                                                 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Responsive Navigation Menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black bg-opacity-90 border-t border-gray-700 transition-colors duration-500">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                   class="text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200"> {{-- Darker hover for responsive --}}
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('projects.index')"
                                   class="text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200"> {{-- Darker hover for responsive --}}
                {{ __('Manage Projects') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-700 transition-colors duration-500">
            <div class="px-4">
                <div class="font-medium text-base text-gray-200 transition-colors duration-500">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400 transition-colors duration-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')"
                                       class="text-gray-300 hover:bg-gray-800 hover:text-white transition-colors duration-200"> {{-- Darker hover for responsive --}}
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                           onclick="event.preventDefault(); this.closest('form').submit();"
                                           class="text-gray-300 hover:bg-gray-800 hover:text-red-400 transition-colors duration-200"> {{-- Darker hover for responsive --}}
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>