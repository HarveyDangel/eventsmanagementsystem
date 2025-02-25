<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <div class="bg-indigo-300 rounded-xl shadow-md p-5 w-full my-10">
                <div class="text-white text-center mb-5">
                    <h1 class="font-semibold text-xl">
                        We appreciate your feedback.
                    </h1>
                    <p>
                        We are always looking for ways to improve your experience.
                    </p>
                    <p>
                        Please take a moment to evaluate and tell us what you think.
                    </p>
                </div>

                <!-- Star Ratings -->
                <div class="flex justify-center text-amber-200 gap-x-10 md:gap-x-24">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="size-8 cursor-pointer transition-all duration-300 star"
                            data-value="{{ $i }}" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l2.157 6.674a1 1 0 00.95.69h7.02c.969 0 1.371 1.24.588 1.81l-5.682 4.093a1 1 0 00-.364 1.118l2.157 6.673c.3.922-.755 1.688-1.54 1.118L12 19.347l-5.682 4.093c-.785.57-1.838-.196-1.54-1.118l2.157-6.673a1 1 0 00-.364-1.118L.888 10.1c-.783-.57-.38-1.81.588-1.81h7.02a1 1 0 00.95-.69l2.157-6.673z">
                            </path>
                        </svg>
                    @endfor
                </div>
                @error('rating')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                @include('sweetalert::alert')

                <!-- Feedback Form -->
                <div>
                    <form action="{{ route('feedbacks.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="rating" id="rating" value="{{ old('rating', 1) }}">

                        <div class="px-5 py-5 md:px-3">
                            <textarea name="feedback" class="bg-[#FFFFF0] rounded-lg w-full min-h-48 p-3"
                                placeholder="Tell us more about your experience...">{{ old('feedback') }}</textarea>
                            @error('feedback')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <div class="flex flex-col sm:flex-row justify-center mt-5 gap-3 sm:gap-5">
                                <x-outlined-primary-button class="sm:flex-1 text-center bg-white">
                                    {{ __('Cancel') }}
                                </x-outlined-primary-button>

                                <x-primary-button class="sm:flex-1">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Interactive Rating -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const stars = document.querySelectorAll(".star");
            const ratingInput = document.getElementById("rating");
            let selectedRating = parseInt(ratingInput.value); // Get the old rating

            // Function to update star UI
            function updateStars(rating) {
                stars.forEach((star, index) => {
                    if (index < rating) {
                        star.classList.add("text-amber-200", "fill-amber-200");
                    } else {
                        star.classList.remove("text-amber-200", "fill-amber-200");
                    }
                });
            }

            // Initialize the stars on page load
            updateStars(selectedRating);

            // Add click event listeners to stars
            stars.forEach(star => {
                star.addEventListener("click", function() {
                    selectedRating = parseInt(this.getAttribute("data-value"));
                    ratingInput.value = selectedRating; // Update hidden input
                    updateStars(selectedRating);
                });
            });
        });
    </script>

</x-app-layout>
