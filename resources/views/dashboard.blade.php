<x-app-layout>
    <div class="flex flex-col items-center mt-4 px-4">
        <!-- Cards Section -->
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-10">
            <div class="bg-purple-400 text-white py-5 px-8 rounded-lg shadow-md text-center">
                <span class="text-lg font-bold">2</span>
                <span>Completed Events</span>
            </div>
            <div class="bg-purple-400 text-white py-5 px-8 rounded-lg shadow-md text-center">
                <span class="text-lg font-bold">1</span>
                <span>Pending Events</span>
            </div>
            <div class="bg-purple-400 text-white py-5 px-8 rounded-lg shadow-md text-center">
                <span class="text-lg font-bold">3</span>
                <span>Declined Events</span>
            </div>
        </div>

        <!-- Table Section -->
        <div class="mt-6 w-full px-4 overflow-x-auto">
            <table class="w-full min-w-[600px] border-collapse border border-gray-300 shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Image</th>
                        <th class="border border-gray-300 px-4 py-2">Event Name</th>
                        <th class="border border-gray-300 px-4 py-2">Description</th>
                        <th class="border border-gray-300 px-4 py-2">Category</th>
                        <th class="border border-gray-300 px-4 py-2">Venue</th>
                        <th class="border border-gray-300 px-4 py-2">Date</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">1234-567</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 16l5-5 4 4 6-6 3 3"/>
                            </svg>
                        </td>

                        <td class="border border-gray-300 px-4 py-2">Symposium</td>
                        <td class="border border-gray-300 px-4 py-2">Lorem ipsum</td>
                        <td class="border border-gray-300 px-4 py-2">Seminars</td>
                        <td class="border border-gray-300 px-4 py-2">BIPSU Gym</td>
                        <td class="border border-gray-300 px-4 py-2">02/20/25</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class=" text-yellow-400 px-2 py-1 rounded-md">Pending</span>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">1234-567</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 16l5-5 4 4 6-6 3 3"/>
                            </svg>
                        </td>

                        <td class="border border-gray-300 px-4 py-2">Symposium</td>
                        <td class="border border-gray-300 px-4 py-2">Lorem ipsum</td>
                        <td class="border border-gray-300 px-4 py-2">Seminars</td>
                        <td class="border border-gray-300 px-4 py-2">BIPSU Gym</td>
                        <td class="border border-gray-300 px-4 py-2">02/20/25</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class=" text-green-500 px-2 py-1 rounded-md">Accepted</span>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">1234-567</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-auto text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v16a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 16l5-5 4 4 6-6 3 3"/>
                            </svg>
                        </td>

                        <td class="border border-gray-300 px-4 py-2">Symposium</td>
                        <td class="border border-gray-300 px-4 py-2">Lorem ipsum</td>
                        <td class="border border-gray-300 px-4 py-2">Seminars</td>
                        <td class="border border-gray-300 px-4 py-2">BIPSU Gym</td>
                        <td class="border border-gray-300 px-4 py-2">02/20/25</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class=" text-red-500 px-2 py-1 rounded-md">Declined</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
