<x-app-layout>
    <div class="flex flex-col justify-center mt-4 px-4 w-full">
        <!-- Cards Section -->
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-40">
            <div class="bg-indigo-600 text-white py-5 px-8 rounded-lg shadow-md text-center">
                <span class="text-lg font-bold">{{ $events->where('status', 'approved')->count() }}</span>
                <span>Completed Events</span>
            </div>
            <div class="bg-indigo-600 text-white py-5 px-8 rounded-lg shadow-md text-center">
                <span class="text-lg font-bold">{{ $events->where('status', 'pending')->count() }}</span>
                <span>Pending Events</span>
            </div>
            <div class="bg-indigo-600 text-white py-5 px-8 rounded-lg shadow-md text-center">
                <span class="text-lg font-bold">{{ $events->where('status', 'declined')->count() }}</span>
                <span>Declined Events</span>
            </div>
        </div>
        <div class="p-6 bg-gray-100 flex justify-center">
            <div class="bg-white shadow-lg rounded-lg p-6 max-w-6xl w-full">
        <!-- Table Section -->
        <div class="mt-6 w-full">
            <table class="w-full min-w-[600px] border-collapse border border-gray-300 shadow-md">
                <h1 class="text-2xl font-semibold mb-4">Events</h1>

            <nav class="text-sm mb-5">
                <ol class="flex space-x-2 text-gray-600">
                    <li>Events</li>
                    <li>/</li>
                    <li class="text-gray-800 font-semibold">Lists</li>
                </ol>
            </nav>
                <thead>
                    <tr class="bg-indigo-500 text-white">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Event Name</th>
                        <th class="border border-gray-300  px-2 py-2 w-6">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Category</th>
                        <th class="border border-gray-300 px-4 py-2">Venue</th>
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-2 py-2">{{ $event->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $event->name }}</td>
                        <td class="border border-gray-300 w-6 text-left px-2 py-2">{{ $event->description }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ $event->category }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ $event->venue }}</td>
                        <td class="border border-gray-300 px-2 py-2">{{ \Carbon\Carbon::parse($event->date)->format('m/d/Y') }}</td>
                        <td class="border border-gray-300 px-2 py-2">
                            @if ($event->status == 'pending')
                                <span class=" text-yellow-400 px-2 py-1 rounded-md">Pending</span>
                            @elseif ($event->status == 'approved')
                                <span class=" text-green-500 px-2 py-1 rounded-md">Accepted</span>
                            @elseif ($event->status == 'declined')
                                <span class=" text-red-500 px-2 py-1 rounded-md">Declined</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    @if ($events->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">No events found</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{$events->Links()}}
        </div>
    </div>
</div>
</div>
</x-app-layout>
