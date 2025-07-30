<x-app-layout>
    <div class="md:py-12">
        <div class="max-w-6xl mx-auto">
            <div class="w-full bg-white p-6 rounded-lg shadow-md">
                <h2 class="font-semibold text-lg mb-4">Events History</h2>
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 rounded-lg">
                        <thead>
                            <tr class="bg-indigo-500 border-b text-white">
                                <th class="border border-gray-300 p-3 text-left">ID number</th>
                                <th class="border border-gray-300 p-3 text-left">Date</th>
                                <th class="border border-gray-300 p-3 text-left">Status</th>
                                <th class="border border-gray-300 p-3 text-left">Private Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $events as $event )
                            <tr class="border-t">
                                <td class="border border-gray-300 p-3">{{ $event->id }}</td>
                                <td class="border border-gray-300 p-3">{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y, g:i a') }}</td>
                                <td class="border border-gray-300 p-3">
                                            @if ($event->status == 'pending')
                                                <span class="text-yellow-400 px-2 py-1 rounded-md">Pending</span>
                                            @elseif ($event->status == 'approved')
                                                <span class="text-green-500 px-2 py-1 rounded-md">Accepted</span>
                                            @elseif ($event->status == 'declined')
                                                <span class="text-red-500 px-2 py-1 rounded-md">Declined</span>
                                            @endif
                                        </td>
                                <td class="border border-gray-300 p-3">{{ $event->comments}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                        {{ $events->links() }}
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>