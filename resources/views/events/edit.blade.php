<x-app-layout>
    <div class="container mx-auto mt-6 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-md rounded-lg p-6 mb-4 border-2">
                    <h1 class="text-2xl font-semibold mb-4">Edit Event</h1>

                    <nav class="text-sm mb-4">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Events</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Edit</li>
                        </ol>
                    </nav>

                    <x-primary-button>
                        <a href="{{ route('events.index') }}" class="flex items-center gap-2 text-white hover:text-white">
                            <x-heroicon-o-arrow-uturn-left class="w-5 h-5 inline" />
                            <span>Back</span>
                        </a>
                    </x-primary-button>

                    <form action="{{ route('events.update', $event->id) }}" method="POST" class="mt-6"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" id="venue_hidden" name="venue" value="{{ $event->venue }}">

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <div id="imageUploadContainer"
                                    class="relative flex flex-col items-center justify-center bg-indigo-400 text-white text-center rounded-lg cursor-pointer event-card w-full h-40 mb-4 overflow-hidden"
                                    onclick="document.getElementById('imageUpload').click();">

                                    <input type="file" id="imageUpload" accept="image/*" name="image"
                                        class="hidden" onchange="previewImage(event)">

                                    <!-- Image Preview -->
                                    <img id="imagePreview" src="{{ asset('storage/' . $event->image) }}"
                                        alt="Image Preview"
                                        class="w-full h-full object-cover rounded-lg absolute top-0 left-0 {{ $event->image ? '' : 'hidden' }}">

                                    <!-- Always Visible Upload UI -->
                                    <div id="uploadOverlay"
                                        class="absolute flex flex-col items-center justify-center w-full h-full rounded-lg transition-opacity bg-opacity-50 bg-black text-white z-10">
                                        <span class="text-4xl">+</span>
                                        <span class="text-md">Upload Image</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium mb-1">Event
                                        Name</label>
                                    <input type="text" id="name" name="name" value="{{ $event->name }}"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                        placeholder="e.g. Symposium">
                                </div>

                                <div>
                                    <label for="description"
                                        class="block text-gray-700 font-medium mb-1">Description</label>
                                    <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ $event->description }}</textarea>
                                </div>
                            </div>

                            <div>
                                <div class="mb-4">
                                    <label for="category" class="block text-gray-700 font-medium mb-1">Category</label>
                                    <select id="category" name="category"
                                        class="w-full px-4 py-2 border border-gray-600 bg-white text-gray-800 rounded-lg">
                                        <option value="Cultural" {{ $event->category == 'Cultural' ? 'selected' : '' }}>
                                            Cultural</option>
                                        <option value="Seminar" {{ $event->category == 'Seminar' ? 'selected' : '' }}>
                                            Seminar</option>
                                        <option value="Sports" {{ $event->category == 'Sports' ? 'selected' : '' }}>
                                            Sports</option>
                                        <option value="Others" {{ $event->category == 'Others' ? 'selected' : '' }}>
                                            Others</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="venue" class="block text-gray-700 font-medium mb-1">Venue</label>
                                    <select id="venue"
                                        class="w-full px-4 py-2 border border-gray-600 bg-white text-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option value="" hidden disabled>Select Venue</option>
                                        <option value="Accreditation"
                                            {{ $event->venue == 'Accreditation' ? 'selected' : '' }}>Accreditation
                                        </option>
                                        <option value="Basketball Court"
                                            {{ $event->venue == 'Basketball Court' ? 'selected' : '' }}>Basketball
                                            Court</option>
                                        <option value="Gymnasium" {{ $event->venue == 'Gymnasium' ? 'selected' : '' }}>
                                            Gymnasium</option>
                                        <option value="Hostel" {{ $event->venue == 'Hostel' ? 'selected' : '' }}>Hostel
                                        </option>
                                        <option value="HyFlex" {{ $event->venue == 'HyFlex' ? 'selected' : '' }}>HyFlex
                                        </option>
                                        <option value="Room" {{ $event->venue == 'Room' ? 'selected' : '' }}>Room
                                            (specify)</option>
                                        <option value="Students Center"
                                            {{ $event->venue == 'Students Center' ? 'selected' : '' }}>Students Center
                                        </option>
                                        <option value="Tennis Court"
                                            {{ $event->venue == 'Tennis Court' ? 'selected' : '' }}>Tennis Court
                                        </option>
                                        <option value="Volleyball Court"
                                            {{ $event->venue == 'Volleyball Court' ? 'selected' : '' }}>Volleyball
                                            Court</option>
                                    </select>
                                </div>

                                <!-- Room Number Input (Initially Hidden) -->
                                <div id="roomInputContainer"
                                    class="mb-4 {{ str_starts_with($event->venue, 'Room') ? '' : 'hidden' }}">
                                    <label for="room_number" class="block text-gray-700 font-medium mb-1">Room
                                        Number</label>
                                    <input type="text" id="room_number"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                        placeholder="Enter Room Number">
                                </div>

                                <div>
                                    <div class="mb-4">
                                        <label for="start_date" class="block text-gray-700 font-medium mb-1">Start
                                            Date</label>
                                        <input type="datetime-local" id="start_date" name="start_date"
                                            value="{{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') : '' }}"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                            onchange="calculateDuration()">
                                    </div>

                                    <div class="mb-4">
                                        <label for="end_date" class="block text-gray-700 font-medium mb-1">End
                                            Date</label>
                                        <input type="datetime-local" id="end_date" name="end_date"
                                            value="{{ $event->end_date ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : '' }}"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                            onchange="calculateDuration()">
                                    </div>

                                    <div class="mb-4">
                                        <label for="duration" class="block text-gray-700 font-medium mb-1">Event
                                            Duration</label>
                                        <input type="text" id="duration" name="duration"
                                            value="{{ $event->duration }}"
                                            class="w-full border border-gray-300 rounded-lg px-3 py-2" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button Must be Inside the Form -->
                        <div class="flex justify-end mt-2">
                            <x-primary-button type="submit"
                                class="flex items-center gap-2 text-white hover:text-white">
                                <x-heroicon-o-check class="w-5 h-5 inline" />
                                <span>Update Event</span>
                            </x-primary-button>
                        </div>

                    </form>
                </div>
                {{-- <div class="w-full flex justify-end mt-2">
                    <x-primary-button type="submit" class="flex items-center gap-2 text-white hover:text-white">
                        <x-heroicon-o-check class="w-5 h-5 inline" />
                        <span>Update Event</span>
                    </x-primary-button>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const uploadOverlay = document.getElementById('uploadOverlay');

            // Set the image preview
            imagePreview.src = URL.createObjectURL(event.target.files[0]);
            imagePreview.classList.remove('hidden');

            // Ensure the upload button remains visible
            uploadOverlay.classList.remove('hidden');
        }

        function calculateDuration() {
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const durationField = document.getElementById('duration');

            if (startDate && endDate) {
                const start = new Date(startDate);
                const end = new Date(endDate);
                const diffMs = end - start;
                if (diffMs > 0) {
                    const diffHours = Math.floor(diffMs / (1000 * 60 * 60));
                    const diffMinutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));
                    durationField.value = `${diffHours} hours ${diffMinutes} minutes`;
                } else {
                    durationField.value = 'Invalid Duration';
                }
            } else {
                durationField.value = '';
            }
        }

        function toggleRoomInput() {
            const venueSelect = document.getElementById('venue');
            const roomInputContainer = document.getElementById('roomInputContainer');
            const roomInput = document.getElementById('room_number');
            const hiddenVenue = document.getElementById('venue_hidden');

            const predefinedVenues = [
                "Accreditation", "Basketball Court", "Gymnasium", "Hostel", "HyFlex",
                "Students Center", "Tennis Court", "Volleyball Court"
            ];

            // Check if the stored venue is NOT in predefined venues (i.e., it's a room number)
            if (!predefinedVenues.includes(hiddenVenue.value) && hiddenVenue.value !== "") {
                venueSelect.value = "Room"; // Select "Room" in dropdown
                roomInputContainer.classList.remove('hidden'); // Show room input
                roomInput.value = hiddenVenue.value; // Set room number input value
            } else {
                venueSelect.value = hiddenVenue.value; // Set venue from stored value
            }

            // When user selects venue
            venueSelect.addEventListener('change', function() {
                if (venueSelect.value === "Room") {
                    roomInputContainer.classList.remove('hidden');
                    hiddenVenue.value = roomInput.value; // Store the room number
                } else {
                    roomInputContainer.classList.add('hidden');
                    hiddenVenue.value = venueSelect.value; // Store selected venue
                }
            });

            // Update hidden input when user types room number
            roomInput.addEventListener('input', function() {
                hiddenVenue.value = this.value; // Save room number correctly
            });
        }

        document.addEventListener('DOMContentLoaded', toggleRoomInput);
    </script>
</x-app-layout>
