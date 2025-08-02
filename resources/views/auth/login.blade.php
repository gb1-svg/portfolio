<x-guest-layout>
    {{-- Removed the "Admin Login" div from here --}}

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-gray-200" />
            <x-text-input id="email" class="block mt-1 w-full rounded-lg bg-black bg-opacity-40 border border-gray-700 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-black" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" class="text-gray-200" />
            <x-text-input id="password" class="block mt-1 w-full pr-10 rounded-lg bg-black bg-opacity-40 border border-gray-700 text-white placeholder-gray-500 focus:border-blue-500 focus:ring-blue-500 focus:ring-opacity-50 ring-offset-black"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            {{-- Show/Hide Password Toggle --}}
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pt-8 cursor-pointer text-gray-400 hover:text-white" id="togglePassword">
                <i class="fas fa-eye" id="eyeIcon"></i> {{-- Font Awesome eye icon --}}
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-700 bg-black bg-opacity-40 text-blue-500 shadow-sm focus:ring-blue-500 focus:ring-offset-black" name="remember">
                <span class="ms-2 text-sm text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-400 hover:text-white rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 ring-offset-black" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 px-6 py-3 rounded-full bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white shadow-lg focus:ring-blue-500 focus:ring-offset-black transform hover:-translate-y-1 transition-all duration-200">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    {{-- JavaScript for Show/Hide Password --}}
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const password = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (togglePassword && password && eyeIcon) {
                togglePassword.addEventListener('click', function (e) {
                    // toggle the type attribute
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    // toggle the eye icon
                    eyeIcon.classList.toggle('fa-eye');
                    eyeIcon.classList.toggle('fa-eye-slash');
                });
            }
        });
    </script>
    @endpush

</x-guest-layout>