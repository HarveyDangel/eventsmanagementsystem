<div id="home"></div>
<section class="section p-[24px] h-full lg:max-h-screen">
    <div class="lg:grid lg:grid-cols-2 gap-8">
        <div class="mb-12 items-center">
            <h2 class="section-title text-[32px] lg:text-[48px] font-bold text-gray-800 mb-4 flex flex-wrap uppercase">Effortless event planning for every school occassion</h2>
            <span class="text-gray-900 text-[16px]">Whether it's a pep rally or a parent-teacher conference, plan, manage, and execute events in minutes — all in one place!</span>
            <br>
            <div class="flex flex-row mt-4 gap-4">
                <x-primary-button>
                    <a href="{{ route('register') }}">Get Started</a>
                </x-primary-button>

                <x-outlined-primary-button>
                    <a href="{{ route('login') }}">Sign in</a>
                </x-outlined-primary-button>
            </div>
        </div>
        <div class="justify-center items-center flex flex-col">
            <img src="{{ url('images/homePic.png') }}" class="h-full lg:max-h-90 animate-shake" alt="">
        </div>
    </div>
</section>
