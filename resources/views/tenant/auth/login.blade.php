<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <x-logo />
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="sm:mx-auto sm:w-full sm:max-w-md py-6 px-4 sm:px-4">
            <form class="space-y-6" method="POST" action="{{ route('central.tenants.login') }}">
                @csrf
                <div>
                    <x-label for="email" :value="__('Email address')" />
                    <div class="mt-1">
                        <x-input id="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-800 focus:border-gray-800 sm:text-sm" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                </div>

                <div>
                    <x-label for="password" :value="__('Password')" />
                    <div class="mt-1">
                        <x-input id="password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-gray-800 focus:border-gray-800 sm:text-sm"
                                 type="password"
                                 name="password"
                                 required
                                 autocomplete="current-password" />
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="#" class="font-medium text-indigo-600 hover:text-gray-800">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif
                </div>

                <button class="btn btn-block">
                    {{ __('Log in') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
