<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="p-6 bg-gray-100 flex justify-center">
        <div class="bg-white shadow-lg rounded-lg p-6 max-w-6xl w-full">
            <h1 class="text-2xl font-semibold mb-4">Events</h1>

            <nav class="text-sm mb-5">
                <ol class="flex space-x-2 text-gray-600">
                    <li>Events</li>
                    <li>/</li>
                    <li class="text-gray-800 font-semibold">List</li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-5">
                <!-- Add Event Card -->
                <a href="{{ route('events.create') }}"
                    class="flex flex-col items-center justify-center bg-indigo-400 text-white hover:shadow-lg hover:scale-105 transition-all duration-300 text-center rounded-lg cursor-pointer min-h-40 md:min-h-48 h-full">
                    <span class="text-6xl md:text-6xl">+</span>
                    <h1 class="text-md font-semibold">Create Event</h1>
                </a>

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
                                    {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y, g:i a') }}</p>
                            </div>
                        </a>

                        <!-- Three Dots Button -->
                        <button id="button-{{ $event->id }}" onclick="toggleDropdown(event, {{ $event->id }})"
                            class="absolute top-2 right-2 px-2 py-0 text-white text-2xl border border-gray-400 rounded-md bg-gray-800 hover:bg-gray-700 focus:outline-none">
                            &#x22EF;
                        </button>

                        <!-- Dropdown Menu (Inside Card) -->
                        <div id="dropdown-{{ $event->id }}"
                            class="dropdown-menu hidden absolute top-12 right-2 bg-white shadow-md rounded-lg w-32 sm:w-36 z-50 py-2 border border-gray-200">

                            <!-- Edit Button -->
                            <a href="{{ route('events.edit', $event->id) }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100">
                                <x-heroicon-o-pencil-square class="w-5 h-5 text-blue-500" />
                                <span>Edit</span>
                            </a>

                            <!-- Delete Button -->
                            <form id="delete-form-{{ $event->id }}"
                                action="{{ route('events.destroy', $event->id) }}" method="POST"
                                class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100 text-red-500">
                                @csrf
                                @method('DELETE')
                                <x-heroicon-o-trash class="w-5 h-5" />
                                <button type="button" class="text-red-500"
                                    onclick="confirmDelete({{ $event->id }})">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $events->links() }}
        </div>
    </div>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
    <script>
        function toggleDropdown(event, id) {
            event.stopPropagation(); // Prevents navigation
            let dropdown = document.getElementById('dropdown-' + id);
            let button = document.getElementById('button-' + id);

            // Close other open dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                if (el !== dropdown) el.classList.add('hidden');
            });

            dropdown.classList.toggle('hidden');

            // Add event listeners for closing when cursor leaves
            button.addEventListener("mouseleave", function() {
                setTimeout(() => {
                    if (!dropdown.matches(':hover')) dropdown.classList.add('hidden');
                }, 200);
            });

            dropdown.addEventListener("mouseleave", function() {
                setTimeout(() => {
                    if (!button.matches(':hover')) dropdown.classList.add('hidden');
                }, 200);
            });
        }

        // Close dropdown when clicking anywhere outside
        document.addEventListener("click", function() {
            document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
        });
    </script>

</x-app-layout>
