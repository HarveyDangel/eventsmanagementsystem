<header class=" bg-white text-gray-900 w-full max-w-screen sticky top-0 z-50 shadow-sm">
    <div class="grid grid-cols-2 gap-3 w-full py-5 px-10 justify-between items-center">
        <div class="flex justify-left">
            <a href="#home" class="ps-3 text-lg">Event Management System</a>
        </div>
        <div class="-mx-3 flex flex-1 justify-end me-0">
            <a href="#events" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-indigo-700 focus:outline-none focus-visible:ring-indigo-700">Event</a>
            <a href="#feedback" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-indigo-700 focus:outline-none focus-visible:ring-indigo-700">Feedback</a>
            <a href="#about" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-indigo-700 focus:outline-none focus-visible:ring-indigo-700">About</a>
            @if(Route::has('login'))
                @auth
                    <a href="{{url('/dashboard')}}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-indigo-700 focus:outline-none focus-visible:ring-indigo-700">Dashboard</a>
                @endauth

            @endif
        </div>
    </div>
   {{-- @if (Route::has('login'))
       <nav class="-mx-3 flex flex-1 justify-end">
           @auth
               <a
                   href="{{ url('/dashboard') }}"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
               >
                   Dashboard
               </a>
           @else
               <a
                   href="{{ route('login') }}"
                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] "
               >
                   Log in
               </a>

               @if (Route::has('register'))
                   <a
                       href="{{ route('register') }}"
                       class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                   >
                       Register
                   </a>
               @endif
           @endauth
       </nav>
   @endif --}}
</header>