<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="reset" class="w-full justify-center mt-3 sm:mt-0 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg">
                    {{ __('Reset') }}
                </button>
                <x-jet-button class="w-full justify-center mt-3 sm:mt-0 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold rounded-lg">
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>

            </div>
        </form>
        <a href="/login" class="flex items-center text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            {{ __('Back to Login') }}
        </a>
    </x-jet-authentication-card>
</x-guest-layout>