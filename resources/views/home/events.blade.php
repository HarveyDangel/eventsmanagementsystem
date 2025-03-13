<div id="events" x-data="{
    showModal: false,
    event: {},
    selectedCategory: ''
}">
    <section class="relative overflow-hidden py-10 mt-10">
        @php
            use Carbon\Carbon;
            use Illuminate\Support\Str;

            $defaultImages = collect($events->pluck('image')->filter()->all());
            $half = ceil($events->count() / 2);
            $eventsChunked = $events->count() ? $events->chunk($half) : collect();
        @endphp

        @if ($events->count())
            <h2 class="text-3xl font-bold text-center mb-6">Upcoming Events</h2>

            <!-- Category Filter Buttons -->
            <div class="mb-6 text-center flex justify-center gap-32">
                @foreach (['' => 'All', 'Cultural' => 'Cultural', 'Seminar' => 'Seminar', 'Sports' => 'Sports', 'Others' => 'Others'] as $key => $label)
                    <button @click="selectedCategory = '{{ $key }}'"
                        :class="selectedCategory === '{{ $key }}' ? 'bg-indigo-500 text-white' : 'bg-gray-200'"
                        class="px-4 py-2 rounded-lg font-semibold transition hover:bg-indigo-500">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div class="w-full h-[500px] overflow-hidden relative flex flex-col gap-16 items-center">
                @foreach ($eventsChunked as $index => $chunk)
                    <div
                        class="flex gap-10 absolute w-full whitespace-nowrap {{ $index === 0 ? 'animate-scrollWave1' : 'animate-scrollWave2' }} justify-center">
                        @foreach ($chunk as $event)
                            @php
                                $image = $event->image ?: $defaultImages->random();
                            @endphp
                            <div class="w-80 h-52 bg-white shadow-md p-3 rounded-lg flex flex-col items-center text-center gap-2 overflow-hidden cursor-pointer hover:bg-indigo-100 transition"
                                data-category="{{ $event->category }}"
                                x-show="selectedCategory === '' || selectedCategory === '{{ $event->category }}'"
                                @click="event = { 
                                    name: '{{ $event->name }}', 
                                    venue: '{{ $event->venue }}', 
                                    date: '{{ Carbon::parse($event->start_date)->format('M d, Y') }}', 
                                    description: '{{ $event->description }}', 
                                    image: '{{ asset('storage/' . $image) }}',
                                    category: '{{ $event->category }}' 
                                }; showModal = true;">
                                <div class="w-48 h-36 overflow-hidden rounded-md">
                                    @if ($image)
                                        <img src="{{ asset('storage/' . $image) }}" alt="{{ $event->name }}"
                                            class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="w-full p-2 flex flex-col items-center text-center">
                                    <h3 class="text-lg font-bold truncate w-11/12">{{ $event->name }}</h3>
                                    <p class="text-sm text-gray-600 truncate w-11/12">{{ $event->venue }}</p>
                                    <p class="text-sm text-gray-600 truncate w-11/12">
                                        {{ Carbon::parse($event->start_date)->format('M d, Y') }}</p>
                                    <p class="text-sm text-gray-600 truncate w-11/12">
                                        {{ Str::limit($event->description, 60, '...') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-600">No upcoming events.</p>
        @endif
    </section>

    <!-- Modal -->
    <div x-show="showModal" x-transition @click.away="showModal = false"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-[500px]">
            <!-- Centered Title -->
            <h2 class="text-2xl font-bold text-center mb-4" x-text="event.name"></h2>

            <!-- Image -->
            <img :src="event.image" alt="Event Image" class="w-full h-52 object-cover rounded-lg mb-4">

            <!-- Venue & Date -->
            <p class="text-center text-gray-600 font-semibold">
                <span x-text="event.venue"></span> @ <span x-text="event.date"></span>
            </p>

            <!-- Category -->
            <p class="text-center text-gray-800 font-semibold mt-2 text-lg" x-text="event.category"></p>

            <!-- Description -->
            <p class="mt-4 text-gray-700 text-justify" x-text="event.description"></p>

            <!-- Close Button -->
            <div class="flex justify-center mt-6">
                <button @click="showModal = false" class="bg-indigo-500 text-white px-6 py-2 rounded-lg">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    @keyframes scrollWave1 {
        0% {
            transform: translate(30%, -30%) rotate(8deg);
        }

        100% {
            transform: translate(-30%, -100%) rotate(8deg);
        }
    }

    @keyframes scrollWave2 {
        0% {
            transform: translate(-30%, 30%) rotate(8deg);
        }

        100% {
            transform: translate(30%, 100%) rotate(8deg);
        }
    }

    .animate-scrollWave1 {
        animation: scrollWave1 10s linear infinite;
        top: 35%;
        transform: translateY(-50%);
    }

    .animate-scrollWave2 {
        animation: scrollWave2 10s linear infinite;
        bottom: 25%;
        transform: translateY(50%);
    }
</style>
