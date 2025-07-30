<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto">
            <!-- Cards Section -->
            <div class="w-100 flex flex-col md:flex-row md:justify-between gap-4">
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
                                <h1 class="font-bold text-[24px]">{{ $events->where('status', 'approved')->count()}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-gray-900 bg-white shadow-md rounded-2xl grow">
                    <div class="flex items-center gap-3">
                        {{-- ICON --}}
                        <div>

                            <x-heroicon-o-calendar-days class="size-[44px] text-amber-500 " />
                        </div>

                        <div>
                            {{-- title --}}
                            <div>
                                <h1 class="text-[20px]">Pending</h1>
                            </div>
                            {{-- value --}}
                            <div>
                                <h1 class="font-bold text-[24px]">{{ $events->where('status', 'pending')->count()}}</h1>
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
                                <h1 class="font-bold text-[24px]">{{ $events->where('status', 'declined')->count()}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mt-4 bg-gray-100 flex justify-center">
                <div class="bg-white shadow-lg rounded-lg p-6 w-full overflow-x-auto">
                    <!-- Table Section -->
                    <h1 class="text-2xl font-semibold mb-4">Events</h1>

                    <nav class="text-sm mb-5">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Events</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Lists</li>
                        </ol>
                    </nav>

                    <div class="w-full overflow-x-auto">
                        <table class="w-full min-w-[600px] border-collapse border border-gray-300 shadow-md">
                            <thead>
                                <tr class="bg-indigo-500 text-white">
                                    <th class="border border-gray-300 p-3 text-left">ID</th>
                                    <th class="border border-gray-300 p-3 text-left">Event Name</th>
                                    <th class="border border-gray-300 p-3 text-left">Description</th>
                                    <th class="border border-gray-300 p-3 text-left">Category</th>
                                    <th class="border border-gray-300 p-3 text-left">Venue</th>
                                    <th class="border border-gray-300 p-3 text-left">Date</th>
                                    <th class="border border-gray-300 p-3 text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="text-center">
                                        <td class="border border-gray-300 p-3 text-left">{{ $event->id }}</td>
                                        <td class="border border-gray-300 p-3 text-left">{{ $event->name }}</td>
                                        <td class="border border-gray-300 p-3 text-left">
                                            {{ Str::limit($event->description, 50) }}
                                        </td>
                                        <td class="border border-gray-300 p-3 text-left">{{ $event->category }}</td>
                                        <td class="border border-gray-300 p-3 text-left">{{ $event->venue }}</td>
                                        <td class="border border-gray-300 p-3 text-left">
                                            {{ \Carbon\Carbon::parse($event->date)->format('m/d/Y') }}
                                        </td>
                                        <td class="border border-gray-300 p-3 text-left">
                                            @if ($event->status == 'pending')
                                                <span class="text-yellow-400">Pending</span>
                                            @elseif ($event->status == 'approved')
                                                <span class="text-green-500">Accepted</span>
                                            @elseif ($event->status == 'declined')
                                                <span class="text-red-500">Declined</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($events->isEmpty())
                                    <tr>
                                        <td colspan="7" class="text-center text-gray-500 py-4">No events found</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>