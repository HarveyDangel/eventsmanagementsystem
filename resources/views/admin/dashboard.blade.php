<x-app-layout>
    <div class="py-12">
        {{-- Counter --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <div class="bg-gray-300 overflow-hidden shadow-md sm:rounded-lg flex items-center py-3 px-5">
                <div class="text-gray-900">
                    <x-heroicon-o-calendar-days class="size-20 text-indigo-600" />
                </div>
                <div class="text-gray-900 items-center">
                    <p class="text-xl">Total Events</p>
                    <h1 class="font-semibold text-3xl">100</h1>
                </div>
            </div>
            <div class="bg-gray-300 overflow-hidden shadow-md sm:rounded-lg flex items-center py-3 px-5">
                <div class="text-gray-900">
                    <x-heroicon-o-calendar-days class="size-20 text-green-600" />
                </div>
                <div class="text-gray-900 items-center">
                    <p class="text-xl">Completed</p>
                    <h1 class="font-semibold text-3xl">100</h1>
                </div>
            </div>
            <div class="bg-gray-300 overflow-hidden shadow-md sm:rounded-lg flex items-center py-3 px-5">
                <div class="text-gray-900">
                    <x-heroicon-o-calendar-days class="size-20 text-yellow-600" />
                </div>
                <div class="text-gray-900 items-center">
                    <p class="text-xl">In Progress</p>
                    <h1 class="font-semibold text-3xl">100</h1>
                </div>
            </div>
            <div class="bg-gray-300 overflow-hidden shadow-md sm:rounded-lg flex items-center py-3 px-5">
                <div class="text-gray-900">
                    <x-heroicon-o-calendar-days class="size-20 text-red-600" />
                </div>
                <div class="text-gray-900 items-center">
                    <p class="text-xl">Cancelled</p>
                    <h1 class="font-semibold text-3xl">100</h1>
                </div>
            </div>
        </div>
        {{-- Upcomming Events --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <div class="bg-indigo-300 overflow-hidden shadow-md sm:rounded-lg flex items-center p-3 justify-between">
                <div class="text-white">
                    <h1 class="font-semibold">Upcomming Events</h1>
                </div>
                <div class="bg-white rounded-md px-2">
                    <h1>Today</h1>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            @include ('events.cards')
        </div>
    </div>
    
</x-app-layout>