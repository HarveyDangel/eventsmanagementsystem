<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto">
            <div class="w-100 flex flex-col md:flex-row md:justify-between gap-4">
                {{-- Counter --}}
                <div class="p-6 text-gray-900 bg-white shadow-md rounded-2xl grow">
                    <div class="flex items-center gap-3">
                        {{-- ICON --}}
                        <div>

                            <x-heroicon-o-calendar-days class="size-[44px] text-blue-500 " />
                        </div>

                        <div>
                            {{-- title --}}
                            <div>
                                <h1 class="text-[20px]">Total Events</h1>
                            </div>
                            {{-- value --}}
                            <div>
                                <h1 class="font-bold text-[24px]">100</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-gray-900 bg-white shadow-md rounded-2xl grow">
                    <div class="flex items-center gap-3">
                        {{-- ICON --}}
                        <div>

                            <x-heroicon-o-calendar-days class="size-[44px] text-green-500 " />
                        </div>

                        <div>
                            {{-- title --}}
                            <div>
                                <h1 class="text-[20px]">Completed</h1>
                            </div>
                            {{-- value --}}
                            <div>
                                <h1 class="font-bold text-[24px]">100</h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-6 text-gray-900 bg-white shadow-md rounded-2xl grow">
                    <div class="flex items-center gap-3">
                        {{-- ICON --}}
                        <div>

                            <x-heroicon-o-calendar-days class="size-[44px] text-yellow-500 " />
                        </div>

                        <div>
                            {{-- title --}}
                            <div>
                                <h1 class="text-[20px]">In Progress</h1>
                            </div>
                            {{-- value --}}
                            <div>
                                <h1 class="font-bold text-[24px]">100</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-gray-900 bg-white shadow-md rounded-2xl grow">
                    <div class="flex items-center gap-3">
                        {{-- ICON --}}
                        <div>

                            <x-heroicon-o-calendar-days class="size-[44px] text-red-500 " />
                        </div>

                        <div>
                            {{-- title --}}
                            <div>
                                <h1 class="text-[20px]">Declined</h1>
                            </div>
                            {{-- value --}}
                            <div>
                                <h1 class="font-bold text-[24px]">100</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         {{-- event cards --}}

         <div class="mt-5 flex justify-center">
            <div class="max-w-6xl w-full">
                {{-- <div class="my-5 bg-indigo-200 flex justify-end rounded-lg p-2">
                    <div class="text-lg text-center bg-white rounded-md text-[12px] px-3 ">Today</div>
                </div> --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-5">
                    @include('sweetalert::alert')

                    <!-- Event Cards -->
                    @foreach ($events as $event)
                        <div
                            class="relative bg-white shadow-md rounded-lg flex flex-col h-full hover:shadow-lg hover:scale-105 transition-all duration-300">

                            <!-- Clickable Area for Navigation -->
                            <a href="{{ route('events.show', $event->id) }}" class="flex flex-col flex-grow">
                                <!-- Image Section -->
                                <div
                                    class="bg-gray-300 h-40 sm:h-48 flex items-center justify-center relative rounded-t-lg overflow-hidden">
                                    @if ($event->image)
                                        <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}"
                                            class="w-full h-full object-cover rounded-t-lg">
                                    @else
                                        <span class="text-lg md:text-xl font-bold text-gray-500">No Image</span>
                                    @endif
                                </div>

                                <!-- Event Details -->
                                <div class="p-4 flex-grow">
                                    <p class="font-bold text-xs md:text-sm break-words whitespace-normal">
                                        Title: {{ $event->name }}
                                    </p>
                                    <p class="text-xs text-gray-500">Venue: {{ $event->venue }}</p>
                                    <p class="text-xs text-gray-500">Start at:
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y, g:i a') }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{ $events->links() }}
            </div>
        </div>
    </div>
</x-app-layout>