<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-sky-400 to-indigo-400">
        <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-center mb-6">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="w-24 h-24 rounded-full shadow-lg">
            </div>
            
            <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Welcome Back</h2>

            <x-jet-validation-errors class="mb-4 rounded-lg bg-red-50 p-3 text-sm text-red-600" />

            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label for="email" value="{{ __('Email') }}" class="text-gray-700 font-medium" />
                    <x-jet-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" class="text-gray-700 font-medium" />
                    <div class="relative">
                        <x-jet-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                    </div>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-jet-checkbox id="remember_me" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="mt-6">
                    <x-jet-button class="w-full justify-center py-3 bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 text-white font-bold rounded-lg">
                        {{ __('Log in') }}
                    </x-jet-button>
                    <button type="reset" class="w-full justify-center mt-3 sm:mt-0 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg">
        {{ __('Reset') }}
    </button>
                </div>
                
                <div class="flex items-center justify-between mt-6 text-sm">
                    <a href="/" class="flex items-center text-gray-600 hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        {{ __('Back to home') }}
                    </a>
                    
                    @if (Route::has('password.request'))
                    <a class="text-blue-600 hover:text-blue-800 hover:underline" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                    @endif
                </div>
            </form>
            
            
        </div>
    </div>
</x-guest-layout>