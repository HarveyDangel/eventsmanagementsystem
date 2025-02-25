<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Feedback Table</h3>
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">User</th>
                                <th class="border px-4 py-2">Feedback</th>
                                <th class="border px-4 py-2">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedbacks as $feedback)
                                <tr class="border">
                                    <td class="border px-4 py-2">{{ $feedback->id }}</td>
                                    <td class="border px-4 py-2">{{ $feedback->user->name ?? 'Guest' }}</td>
                                    <td class="border px-4 py-2">{{ $feedback->feedback }}</td>
                                    <td class="border px-4 py-2">{{ $feedback->created_at->format('Y-m-d H:i') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $feedbacks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
