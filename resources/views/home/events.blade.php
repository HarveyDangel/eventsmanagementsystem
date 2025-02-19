<section id="events" class="section py-12">
   <div class="container mx-auto">
      <div class="section-header text-center mb-12">
         <h2 class="section-title text-4xl font-bold">Events</h2>
         <span class="text-gray-500">Events</span>
      </div>
      <div class="row flex flex-wrap -mx-4">
         {{-- @foreach($events as $event)
         <div class="col-lg-4 col-md-6 col-xs-12 px-4 mb-8">
            <div class="event bg-white shadow-lg rounded-lg overflow-hidden">
               <div class="event-image">
                  <a href="{{ route('event.show', $event->slug) }}">
                     <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                  </a>
               </div>
               <div class="event-content p-6">
                  <h3 class="text-xl font-semibold mb-2"><a href="{{ route('event.show', $event->slug) }}">{{ $event->title }}</a></h3>
                  <p class="text-gray-700 mb-4">{{ $event->description }}</p>
                  <div class="event-meta text-gray-500 text-sm">
                     <span class="block mb-1"><i class="fa fa-calendar mr-2"></i> {{ $event->date }}</span>
                     <span class="block mb-1"><i class="fa fa-clock-o mr-2"></i> {{ $event->time }}</span>
                     <span class="block"><i class="fa fa-map-marker mr-2"></i> {{ $event->location }}</span>
                  </div>
               </div>
            </div>
         </div>
         @endforeach --}}
      </div>
   </div>
</section>