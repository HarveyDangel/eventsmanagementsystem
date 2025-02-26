<x-app-layout>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <div class="p-6 bg-gray-100 flex justify-center">
      <div class="bg-white shadow-lg rounded-lg p-6 max-w-6xl w-full">
         <h1 class="text-2xl font-semibold mb-4">History</h1>

         <nav class="text-sm mb-5">
            <ol class="flex space-x-2 text-gray-600">
               <li>History</li>
               <li>/</li>
               <li class="text-gray-800 font-semibold">List</li>
            </ol>
         </nav>

         <div class="mb-5">
            @include('sweetalert::alert')

            <table class="w-full min-w-[600px] border-collapse table-auto">
               <thead class="border-b-2 border-gray-800">
                  <tr>
                     <th class="px-4 py-2 text-left">ID</th>
                     <th class="px-4 py-2 text-left">Event Name</th>
                     <th class="px-4 py-2 text-left">Category</th>
                     <th class="px-4 py-2 text-left">Venue</th>
                     <th class="px-4 py-2 text-left">Date</th>
                     <th class="px-4 py-2 text-left">Status</th>
                     <th class="px-4 py-2 text-left">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($events as $event)
                 @if($event->status !== 'deleted') {{-- Hide deleted events --}}
                <tr class="text-left capitalize" id="event-{{ $event->id }}">
                  <td class="border-b border-gray-600 px-4 py-2">{{ $event->id }}</td>
                  <td class="border-b border-gray-600 px-4 py-2">{{ $event->name }}</td>
                  <td class="border-b border-gray-600 px-4 py-2">{{ $event->category }}</td>
                  <td class="border-b border-gray-600 px-4 py-2">{{ $event->venue }}</td>
                  <td class="border-b border-gray-600 px-4 py-2">
                   {{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y, g:i a') }}
                  </td>
                  <td class="border-b border-gray-600 px-4 py-2 status font-semibold" id="status-{{ $event->id }}"
                   data-status="{{ $event->status }}">
                   {{ $event->status }}
                  </td>

                  <td class="border-b border-gray-600 px-4 py-2">
                   <div class="flex gap-3">
                     <x-heroicon-o-eye class="size-7 text-gray-800 cursor-pointer"
                       onclick="showEventDetails({{ $event->id }}, '{{ $event->name }}', '{{ $event->category }}', '{{ $event->venue }}', '{{ \Carbon\Carbon::parse($event->start_date)->format('F j, Y, g:i a') }}', '{{ $event->status }}')" />

                     <x-heroicon-o-trash class="size-7 text-red-700 cursor-pointer"
                       onclick="deleteEvent({{ $event->id }})" />
                   </div>
                  </td>
                </tr>
             @endif
              @endforeach
               </tbody>
            </table>

            {{ $events->links() }}
         </div>
      </div>
   </div>

   <!-- MODAL FOR EVENT DETAILS -->
   <div id="event-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-6xl">
         <h2 class="text-xl font-bold mb-4">Event Details</h2>
         <div class="flex gap-3">
            <div
               class="size-60 bg-purple-300 rounded-lg flex items-center justify-center overflow-hidden">
               @if ($event->image)
                  <img src="{{ asset('storage/' . $event->image) }}" class="size-60 object-cover rounded-lg"
                  alt="Event Image">
               @else
                  <span class="text-gray-600">No Image Available</span>
               @endif
            </div>
            <div>
               <p><strong>Name:</strong> <span id="modal-name"></span></p>
               <p><strong>Category:</strong> <span id="modal-category"></span></p>
               <p><strong>Venue:</strong> <span id="modal-venue"></span></p>
               <p><strong>Date:</strong> <span id="modal-date"></span></p>
               <p><strong>Status:</strong> <span id="modal-status"></span></p>
            </div>
         </div>
         <div class="mt-4 flex justify-end">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded">Close</button>
         </div>
      </div>
   </div>

   <script>
      function updateStatusColor(element, status) {
         element.classList.remove("text-yellow-500", "text-green-500", "text-red-500");
         if (status.toLowerCase() === "pending") {
            element.classList.add("text-yellow-500");
         } else if (status.toLowerCase() === "approved") {
            element.classList.add("text-green-500");
         } else if (status.toLowerCase() === "declined") {
            element.classList.add("text-red-500");
         }
      }

      document.addEventListener("DOMContentLoaded", function () {
         document.querySelectorAll(".status").forEach(element => {
            updateStatusColor(element, element.dataset.status);
         });
      });

      // Show Modal with Event Details
      function showEventDetails(id, name, category, venue, date, status) {
         document.getElementById('modal-name').innerText = name;
         document.getElementById('modal-category').innerText = category;
         document.getElementById('modal-venue').innerText = venue;
         document.getElementById('modal-date').innerText = date;
         document.getElementById('modal-status').innerText = status;
         document.getElementById('event-modal').classList.remove('hidden');
      }

      function closeModal() {
         document.getElementById('event-modal').classList.add('hidden');
      }

      // Delete Event (AJAX Request)
      function deleteEvent(eventId) {
         Swal.fire({
            title: "Are you sure?",
            text: "This event will be marked as deleted.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
         }).then((result) => {
            if (result.isConfirmed) {
               fetch(`/events/${eventId}/delete`, {
                  method: "PATCH",
                  headers: {
                     "Content-Type": "application/json",
                     "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                  },
                  body: JSON.stringify({ status: "deleted" })
               })
                  .then(response => response.json())
                  .then(data => {
                     if (data.success) {
                        document.getElementById(`event-${eventId}`).remove(); // Remove event from UI
                        Swal.fire("Deleted!", "The event has been marked as deleted.", "success");
                     } else {
                        Swal.fire("Error!", "Something went wrong.", "error");
                     }
                  });
            }
         });
      }
   </script>
</x-app-layout>