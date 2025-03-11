<x-app-layout>

    <div class="p-6 bg-gray-100 flex justify-center">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-6xl w-full">
            <div class="p-6">
                <h1 class="text-2xl font-semibold mb-4">Events</h1>
                <nav class="text-sm mb-5">
                    <ol class="flex space-x-2 text-gray-600">
                        <li>Events</li>
                        <li>/</li>
                        <li class="text-gray-800 font-semibold">List</li>
                    </ol>
                </nav>
                @include ('events.cards')
            </div>
        </div>
    </div>
</x-app-layout>