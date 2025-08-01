<nav x-data="{ open: false }" class="bg-indigo-700 border-b border-gray-100 sticky top-0 w-full z-50">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div> --}}

                <!-- Navigation Links -->
                @if (auth()->user()->is_admin == '1')
                        <div class="hidden space-x-8 sm:-my-px sm:flex">
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index') ||
                    request()->routeIs('events.create') ||
                    request()->routeIs('events.show') ||
                    request()->routeIs('events.edit')">
                                {{ __('Events') }}
                            </x-nav-link>
                            <x-nav-link :href="route('events.history')" :active="request()->routeIs('events.history')">
                                {{ __('History') }}
                            </x-nav-link>
                            <x-nav-link :href="route('feedbacks.create')" :active="request()->routeIs('feedbacks.create')">
                                {{ __('Feedback') }}
                            </x-nav-link>
                        </div>
                @else
                    <div class="hidden space-x-8 sm:-my-px sm:flex">
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                        <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                            {{ __('Events') }}
                        </x-nav-link>
                        <x-nav-link :href="route('events.history')" :active="request()->routeIs('events.history')">
                            {{ __('History') }}
                        </x-nav-link>
                        <x-nav-link :href="route('feedbacks.index')" :active="request()->routeIs('feedbacks.index')">
                            {{ __('Feedback') }}
                        </x-nav-link>
                    </div>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <div x-data="{ open: false }" class="relative">

                    <button @click="open = !open"
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                        <div>{{ Auth::user()->name }}</div>
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            {{ __('Profile') }}
                        </a>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if (auth()->user()->is_admin == '1')
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index') ||
                    request()->routeIs('events.create') ||
                    request()->routeIs('events.show') ||
                    request()->routeIs('events.edit')">
                    {{ __('Events') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('events.history')" :active="request()->routeIs('events.history')">
                    {{ __('History') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('feedbacks.create')" :active="request()->routeIs('feedbacks.create')">
                    {{ __('Feedback') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                    {{ __('Events') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('events.history')" :active="request()->routeIs('events.history')">
                    {{ __('History') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('feedbacks.index')" :active="request()->routeIs('feedbacks.index')">
                    {{ __('Feedback') }}
                </x-responsive-nav-link>

            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-400">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>