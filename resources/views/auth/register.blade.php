<x-guest-layout>
    <div class="grid grid-cols-2">
        <!-- Left Side (Full Height) -->
        <div class="bg-indigo-800 flex justify-center items-center text-white">
            <h2 class="text-4xl font-bold text-left leading-tight">
                JOIN AND <br> HAVE A <br> SEAMLESS <br> EVENT
            </h2>
        </div>

        <!-- Right Side (Registration Form) -->
        <div class="flex justify-center items-center">
            <form method="POST" action="{{ route('register') }}"
                class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg">
                @csrf
                <div class="text-center">
                    <h1 class="text-xl">Welcome!</h1>
                    <p class="text-sm mb-2">Register your account.</p>
                </div>
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Full Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                        autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Register Button -->
                <div class="block mt-4">
                    <x-primary-button class="w-full h-12 text-center">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

                <!-- Sign-in Link -->
                <div class="mt-3 text-left">
                    <span class="text-sm text-gray-600">Already have an account?</span>
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 font-bold"
                        href="{{ route('login') }}">
                        {{ __('Sign in') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
