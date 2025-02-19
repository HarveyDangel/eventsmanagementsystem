<div id="home" >

</div>

<section class="section py-10 h-full max-h-screen">
   <div class="container mx-auto grid md:grid-cols-2 gap-2 ">
      <div class="section-header mb-12 items-center">
         <h2 class="section-title text-6xl font-extrabold text-gray-800 mb-4 mt-10 flex flex-wrap">CREATING EVENTS MADE EASY</h2>
         <span class="text-gray-900">From pep rallies to parent-teacher meetings, this platform
            ensures smooth organization and execution. 
            Create outstanding events with ease and efficiency!</span>
         <br>
         <div class="flex flex-row mt-4 gap-4">
            <x-primary-button>
               <a href="{{route('register')}}">Get Started</a>
            </x-primary-button>
   
            <x-outlined-primary-button>
               <a href="{{route('login')}}">Sign in</a>
            </x-outlined-primary-button>
         </div>
      </div>
      <div>
         <img src="{{url('images/homePic.png')}}" class="h-full lg:max-h-90 animate-shake" alt="">
      </div>
      <div class="row flex flex-wrap -mx-4">
         
      </div>
   </div>
</section>