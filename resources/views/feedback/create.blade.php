<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
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
                <div class="flex flex-row justify-around text-amber-200">
                    <x-heroicon-o-star class="size-8 font-semibold"/>
                    <x-heroicon-o-star class="size-8 font-semibold"/>
                    <x-heroicon-o-star class="size-8 font-semibold"/>
                    <x-heroicon-o-star class="size-8 font-semibold"/>
                    <x-heroicon-o-star class="size-8 font-semibold"/>
                </div>
                <div>
                    <form action="">
                        @csrf
                        <div class="px-10 py-5 md:px-3">
                            <textarea name="feedback" class="bg-[#FFFFF0] rounded-lg w-full min-h-48" id=""
                                placeholder="Tell us more about your experience..."></textarea>

                                <x-outlined-primary-button class="flex-1 text-center bg-white">
                                    {{ __('Cancel') }}
                                </x-outlined-primary-button>

                                <x-primary-button class="flex-1">
                                    {{ __('Submit') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
