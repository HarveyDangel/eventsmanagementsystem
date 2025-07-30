<x-guest-layout>

    <div class="lg:grid lg:grid-cols-2">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="flex justify-center items-center">
            <form method="POST" action="{{ route('login') }}" class="w-full max-w-md p-8 bg-white md:bg-none rounded-lg">
                @csrf

                <div class="text-center">
                    <h1 class="text-xl">Welcome!</h1>
                    <p class="text-sm mb-2">Log in to your account.</p>
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email Address')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>


                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Sign in Button -->
                <div class="block mt-4">
                    <x-primary-button class="w-full h-12 text-center">
                        {{ __('Sign in') }}
                    </x-primary-button>
                </div>

                <div class="flex items-center text-left mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <!-- Sign-in Link -->
                <div class="mt-3 text-left">
                    <span class="text-sm text-gray-600">New user?</span>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 font-bold"
                        href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                </div>
            </form>
        </div>

        <div class="lg:bg-indigo-800 lg:flex lg:mx-auto lg:items-center lg:text-white px-8 hidden">
            <h2 class="text-3xl font-bold text-left leading-tight uppercase">
                welcome back, your events are waiting for you! <br><span class="text-5xl">Let's go</span>
            </h2>
        </div>
    </div>



</x-guest-layout>
