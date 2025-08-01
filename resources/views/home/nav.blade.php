<nav x-data="{ open: false }" class="border-b bg-white border-gray-100 sticky top-0 w-full z-50">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center justify-between w-full">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="#home" class="sm:text-2xl md:text-4xl text-[26px] font-semibold">
                        EventMS
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:flex">
                    <a href="#home" class="">Home</a>
                    <a href="#events" class="">Events</a>
                    <a href="#about" class="">About</a>
                    <a href="#feedback" class="">Feedback</a>   
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
        <div class="pt-2 pb-3 space-y-1 flex flex-col items-center justify-center gap-2">
            <a href="{{route('register')}}" class="">Sign Up</a>
            <a href="#home">Home</a>
            <a href="#events" class="">Events</a>
            <a href="#about" class="">About</a>
            <a href="#feedback" class="">Feedback</a>
            <a href=" {{route('login')}}" class="">Login</a>

        </div>
    </div>
</nav>