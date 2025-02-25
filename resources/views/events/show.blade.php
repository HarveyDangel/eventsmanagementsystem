<x-app-layout>
    <div class="min-h-screen bg-gray-100 flex flex-col">
        <!-- Main Content -->
        <div class="flex justify-center p-6 md:p-10">
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 w-full max-w-screen-xl flex flex-col">

                <!-- Heading aligned to the left -->
                <h1 class="text-2xl font-semibold mb-2 w-full text-left">Events</h1>

                <!-- Breadcrumbs Aligned to Left -->
                <nav class="text-sm mb-4 w-full text-left">
                    <ol class="flex space-x-2 text-gray-600">
                        <li><a href="{{ route('events.index') }}" class="hover:text-gray-800">Events</a></li>
                        <li>/</li>
                        <li class="text-gray-800 font-semibold">View</li>
                    </ol>
                </nav>

                <x-primary-button class="self-start mb-5">
                    <a href="{{ route('events.index') }}" class="flex items-center gap-2 text-white hover:text-white">
                        <x-heroicon-o-arrow-uturn-left class="w-5 h-5 inline" />
                        <span>Back</span>
                    </a>
                </x-primary-button>

                <!-- Responsive Grid Layout -->
                <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 gap-6 w-full">

                    <!-- Image Section (Full width on mobile, half on larger screens) -->
                    <div
                        class="h-80 sm:h-96 md:h-[28rem] bg-purple-300 rounded-lg flex items-center justify-center overflow-hidden">
                        @if ($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}"
                                class="w-full h-full object-cover rounded-lg" alt="Event Image">
                        @else
                            <span class="text-gray-600">No Image Available</span>
                        @endif
                    </div>

                    <!-- Event Details -->
                    <div class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Event Name</label>
                                <div class="p-3 bg-gray-200 rounded-md">{{ $event->name }}</div>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Start Date</label>
                                <div class="p-3 bg-gray-200 rounded-md">
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y g:i A') }}
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Category</label>
                                <div class="p-3 bg-gray-200 rounded-md">{{ $event->category }}</div>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">End Date</label>
                                <div class="p-3 bg-gray-200 rounded-md">
                                    {{ \Carbon\Carbon::parse($event->end_date)->format('F j, Y g:i A') }}
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Venue</label>
                                <div class="p-3 bg-gray-200 rounded-md">{{ $event->venue }}</div>
                            </div>
                            <div>
                                <label class="block text-gray-700 font-medium mb-1">Duration</label>
                                <div class="p-3 bg-gray-200 rounded-md">{{ $event->duration }}</div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="col-span-2">
                            <label class="block text-gray-700 font-medium mb-1">Description</label>
                            <textarea rows="4" class="bg-gray-200 rounded-md w-full resize-none border-none focus:ring-0 p-2 leading-normal"
                                readonly>{{ $event->description }}</textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
