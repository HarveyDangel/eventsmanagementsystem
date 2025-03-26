<x-app-layout>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="p-6 bg-gray-100 flex justify-center">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-6xl w-full">
            <h1 class="text-2xl font-semibold mb-4">Feedback</h1>

            <nav class="text-sm mb-5">
                <ol class="flex space-x-2 text-gray-600">
                    <li>Feedback</li>
                    <li>/</li>
                    <li class="text-gray-800 font-semibold">List</li>
                </ol>
            </nav>

            <div class="mb-5 overflow-x-auto">
                @include('sweetalert::alert')

                <table class="w-full min-w-[600px] border-collapse table-auto">
                    <thead class="border-b-2 border-gray-800">
                        <tr>
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">User</th>
                            <th class="px-4 py-2 text-left">Feedback</th>
                            <th class="px-4 py-2 text-left">Created at</th>
                            <th class="px-4 py-2 text-left">Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($feedbacks as $feedback)
                            @if($feedback->status !== 'deleted') {{-- Hide deleted feedbacks --}}
                                <tr class="text-left capitalize" id="feedback-{{ $feedback->id }}">
                                    <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->id }}</td>
                                    <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->user->name ?? 'Guest' }}

                                    </td>
                                    <td class="border-b border-gray-600 px-4 py-2 text-ellipsis">{{ $feedback->feedback }}</td>
                                    <td class="border-b border-gray-600 px-4 py-2">
                                        {{ $feedback->created_at->format('Y-m-d H:i') }}
                                    </td>
                                    <td class="border-b border-gray-600 px-4 py-2">
                                        {{ $feedback->ratings }}
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                {{ $feedbacks->links() }}
            </div>
        </div>
    </div> 
</x-app-layout>