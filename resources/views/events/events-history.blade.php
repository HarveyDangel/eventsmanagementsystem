<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('History') }}
       </h2>
   </x-slot>

   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="font-semibold text-lg mb-4">Events History</h2>
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="p-3 text-left">ID number</th>
                            <th class="p-3 text-left">Date</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left">Private Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t">
                            <td class="p-3">12345-678</td>
                            <td class="p-3">02/20/25 12:59pm</td>
                            <td class="p-3 text-red-500 font-semibold">Decline</td>
                            <td class="p-3">Already occupied mam sir hehe</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
       </div>
   </div>
</x-app-layout>
