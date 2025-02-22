<x-app-layout>
    <div class="container mx-auto mt-6 px-4">
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <div class="bg-white shadow-md rounded-lg p-6 mb-4 border-2">
                    <h1 class="text-2xl font-semibold mb-4">Events</h1>

                    <nav class="text-sm mb-4">
                        <ol class="flex space-x-2 text-gray-600">
                            <li>Events</li>
                            <li>/</li>
                            <li class="text-gray-800 font-semibold">Add</li>
                        </ol>
                    </nav>

                    <x-primary-button>
                        <a href="{{ route('events.index') }}" class="flex items-center gap-2 text-white hover:text-white">
                            <x-heroicon-o-arrow-uturn-left class="w-5 h-5 inline" />
                            <span>Back</span>
                        </a>
                    </x-primary-button>

                    <form action="{{ route('events.store') }}" method="POST" class="mt-6"
                        enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" id="venue_hidden" name="venue"> <!-- Hidden input for venue -->

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <!-- Left Column -->
                            <div>
                                {{-- <!-- Image Upload -->
                                <div id="imageUploadContainer"
                                    class="relative flex flex-col items-center justify-center bg-indigo-400 text-white text-center rounded-lg cursor-pointer event-card w-full h-40 mb-4 overflow-hidden"
                                    onclick="document.getElementById('imageUpload').click();">
                                    <input type="file" id="imageUpload" name="image" accept="image/*"
                                        class="hidden">
                                    <img id="imagePreview" src="" alt="Image Preview"
                                        class="hidden w-full h-full object-cover rounded-lg absolute top-0 left-0">

                                    <div id="uploadOverlay"
                                        class="absolute flex flex-col items-center justify-center w-full h-full">
                                        <span class="text-4xl">+</span>
                                        <span class="text-md">Upload Image</span>
                                    </div>
                                </div> --}}

                                <!-- Image Upload -->
                                <div id="imageUploadContainer"
                                    class="relative flex flex-col items-center justify-center bg-purple-300 text-white text-center rounded-lg cursor-pointer event-card w-full h-40 mb-4 overflow-hidden"
                                    onclick="document.getElementById('imageUpload').click();">
                                    <input type="file" id="imageUpload" accept="image/*" name="image"
                                        class="hidden">
                                    <img id="imagePreview" src="" alt="Image Preview"
                                        class="hidden w-full h-full object-cover rounded-lg absolute top-0 left-0">

                                    <!-- Always Visible Upload UI -->
                                    <div id="uploadOverlay"
                                        class="absolute flex flex-col items-center justify-center w-full h-full bg-indigo-400 rounded-lg transition-opacity">
                                        <span class="text-4xl">+</span>
                                        <span class="text-md">Upload Image</span>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 font-medium mb-1">
                                        Event Name
                                    </label>
                                    <input type="text" id="name" name="name"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        placeholder="e.g. Symposium">
                                    @error('name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="description" class="block text-gray-700 font-medium mb-1">
                                        Description
                                    </label>
                                    <textarea id="description" name="description" rows="4"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        placeholder="e.g. Explore innovations shaping our future through keynotes, panels, and networking. Connect, learn, and innovate!"></textarea>
                                    @error('description')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div>
                                <div class="mb-4">
                                    <label for="category" class="block text-gray-700 font-medium mb-1">
                                        Category
                                    </label>
                                    <select id="category" name="category"
                                        class="w-full px-4 py-2 border border-gray-600 bg-white text-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option value="" hidden disabled selected>Select Category</option>
                                        <option value="Cultural">Cultural</option>
                                        <option value="Seminar">Seminar</option>
                                        <option value="Sports">Sports</option>
                                        <option value="Others">Others</option>
                                    </select>
                                    @error('category')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="venue" class="block text-gray-700 font-medium mb-1">Venue</label>
                                    <select id="venue" name="venue_select"
                                        class="w-full px-4 py-2 border border-gray-600 bg-white text-gray-800 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                        <option value="" hidden selected disabled>Select Venue</option>
                                        <option value="Accreditation">Accreditation</option>
                                        <option value="Basketball Court">Basketball Court</option>
                                        <option value="Gymnasium">Gymnasium</option>
                                        <option value="Hostel">Hostel</option>
                                        <option value="HyFlex">HyFlex</option>
                                        <option value="Room">Room (specify)</option>
                                        <option value="Students Center">Students Center</option>
                                        <option value="Tennis Court">Tennis Court</option>
                                        <option value="Volleyball Court">Volleyball Court</option>
                                    </select>
                                    @error('venue')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div id="roomNumberContainer" class="mb-4 hidden">
                                    <label for="room_number" class="block text-gray-700 font-medium mb-1">Room</label>
                                    <input type="text" id="room_number" name="room_number"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        placeholder="e.g. Tech 201">
                                    @error('room_number')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="start_date" class="block text-gray-700 font-medium mb-1">
                                        Start Date
                                    </label>
                                    <input type="datetime-local" id="start_date" name="start_date"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    @error('start_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="end_date" class="block text-gray-700 font-medium mb-1">
                                        End Date
                                    </label>
                                    <input type="datetime-local" id="end_date" name="end_date"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                    @error('end_date')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="duration" class="block text-gray-700 font-medium mb-1">
                                        Duration
                                    </label>
                                    <input type="text" id="duration" name="duration" readonly
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        placeholder="Auto generated">
                                    @error('duration')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <x-primary-button type="submit"
                                class="flex items-center gap-2 text-white hover:text-white">
                                <x-heroicon-o-plus class="w-5 h-5 inline" />
                                <span>Add event</span>
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const startDateInput = document.getElementById("start_date");
            const endDateInput = document.getElementById("end_date");
            const durationInput = document.getElementById("duration");

            function calculateDuration() {
                const startDate = new Date(startDateInput.value);
                const endDate = new Date(endDateInput.value);

                if (isNaN(startDate) || isNaN(endDate) || endDate < startDate) {
                    durationInput.value = "";
                    return;
                }

                const diffMs = endDate - startDate;
                const diffMinutes = Math.floor(diffMs / (1000 * 60));
                const diffHours = Math.floor(diffMinutes / 60);
                const diffDays = Math.floor(diffHours / 24);
                const remainingHours = diffHours % 24;
                const remainingMinutes = diffMinutes % 60;

                let durationText = [];
                if (diffDays > 0) {
                    durationText.push(`${diffDays} day${diffDays > 1 ? "s" : ""}`);
                }
                if (remainingHours > 0) {
                    durationText.push(`${remainingHours} hour${remainingHours > 1 ? "s" : ""}`);
                }
                if (remainingMinutes > 0) {
                    durationText.push(`${remainingMinutes} minute${remainingMinutes > 1 ? "s" : ""}`);
                }

                durationInput.value = durationText.join(" ");
            }

            startDateInput.addEventListener("change", calculateDuration);
            endDateInput.addEventListener("change", calculateDuration);

            // Image Upload Preview
            const imageUpload = document.getElementById("imageUpload");
            const imagePreview = document.getElementById("imagePreview");
            const uploadOverlay = document.getElementById("uploadOverlay");

            imageUpload.addEventListener("change", function(event) {
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove("hidden");
                        uploadOverlay.classList.remove("bg-opacity-50");
                        uploadOverlay.classList.add("bg-opacity-50");
                    };

                    reader.readAsDataURL(file);
                }
            });


            // Venue selection logic
            const venueSelect = document.getElementById("venue");
            const roomNumberContainer = document.getElementById("roomNumberContainer");
            const roomNumberInput = document.getElementById("room_number");
            const venueHiddenInput = document.getElementById("venue_hidden");
            const form = document.querySelector("form");

            function updateVenueValue() {
                if (venueSelect.value === "Room") {
                    if (roomNumberInput.value.trim() !== "") {
                        venueHiddenInput.value = roomNumberInput.value;
                    } else {
                        venueHiddenInput.value = "";
                    }
                } else {
                    venueHiddenInput.value = venueSelect.value;
                }
            }

            venueSelect.addEventListener("change", function() {
                if (venueSelect.value === "Room") {
                    roomNumberContainer.classList.remove("hidden");
                    roomNumberInput.setAttribute("required", "required");
                    venueHiddenInput.value = ""; // Ensure it's empty initially
                } else {
                    roomNumberContainer.classList.add("hidden");
                    roomNumberInput.removeAttribute("required");
                    roomNumberInput.value = ""; // Reset input
                    updateVenueValue();
                }
            });

            roomNumberInput.addEventListener("input", updateVenueValue);

            form.addEventListener("submit", function(event) {
                updateVenueValue(); // Ensure the correct venue value is set before submitting
                if (!venueHiddenInput.value) {
                    alert("Please specify a valid venue.");
                    event.preventDefault(); // Stop form submission
                }
            });
        });
    </script>


</x-app-layout>
