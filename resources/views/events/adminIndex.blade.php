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

         <div class="mb-5">
            @include('sweetalert::alert')

            <table class="w-full min-w-[600px] border-collapse table-auto table-responsive">
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
                 <tr class="text-left capitalize">
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
                        <button onclick="updateStatus({{ $event->id }}, 'Approved')">
                          <x-heroicon-o-check-circle class="size-8 text-green-700 cursor-pointer" />
                        </button>
                        <button onclick="updateStatus({{ $event->id }}, 'Declined')">
                          <x-heroicon-o-x-circle class="size-8 text-red-700 cursor-pointer" />
                        </button>
                        <button onclick="openCommentModal({{ $event->id }})">
                          <x-heroicon-o-chat-bubble-bottom-center-text
                            class="size-8 text-indigo-700 cursor-pointer" />
                        </button>
                     </div>
                   </td>
                 </tr>
              @endforeach
               </tbody>
            </table>

            {{ $events->links() }}
         </div>
      </div>
   </div>

   <!-- MODAL FOR COMMENTS -->
   <div id="commentModal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center">
      <div class="bg-white p-6 rounded-lg w-96">
         <h2 class="text-lg font-semibold mb-4">Add Comment</h2>
         <textarea id="commentText" class="w-full border rounded p-2" rows="4"
            placeholder="Write your comment here..."></textarea>
         <div class="flex justify-end mt-4">
            <button class="px-4 py-2 bg-gray-500 text-white rounded mr-2" onclick="closeCommentModal()">Cancel</button>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded" onclick="submitComment()">Submit</button>
         </div>
         <input type="hidden" id="eventId">
      </div>
   </div>

   <script>
      
      // Function to Update Status
      function updateStatus(eventId, newStatus) {
         fetch(`/events/${eventId}/update-status`, {
            method: "PATCH",
            headers: {
               "Content-Type": "application/json",
               "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ status: newStatus })
         })
            .then(response => response.json())
            .then(data => {
               if (data.success) {
                  let statusElement = document.getElementById(`status-${eventId}`);
                  statusElement.innerText = newStatus;
                  updateStatusColor(statusElement, newStatus); // Call function to update color
                  Swal.fire("Updated!", `Event status changed to ${newStatus}.`, "success");
               } else {
                  Swal.fire("Error!", "Something went wrong.", "error");
               }
            })
            .catch(error => console.error("Error:", error));
      }

      // Function to update status text color dynamically
      function updateStatusColor(element, status) {
         element.classList.remove("text-yellow-500", "text-green-500", "text-red-500"); // Remove old classes
         if (status.toLowerCase() === "pending") {
            element.classList.add("text-yellow-500");
         } else if (status.toLowerCase() === "approved") {
            element.classList.add("text-green-500");
         } else if (status.toLowerCase() === "declined") {
            element.classList.add("text-red-500");
         }
      }

      // Apply colors on page load
      document.addEventListener("DOMContentLoaded", function () {
         document.querySelectorAll(".status").forEach(element => {
            updateStatusColor(element, element.dataset.status);
         });
      });

      // Open Comment Modal
      function openCommentModal(eventId) {
         document.getElementById("eventId").value = eventId;
         document.getElementById("commentModal").classList.remove("hidden");
      }

      // Close Comment Modal
      function closeCommentModal() {
         document.getElementById("commentModal").classList.add("hidden");
         document.getElementById("commentText").value = "";
      }

      // Submit Comment
      // Submit Comment
      function submitComment() {
         let eventId = document.getElementById("eventId").value;
         let comment = document.getElementById("commentText").value;

         fetch(`/events/${eventId}/add-comment`, {
            method: "PATCH",  // Use PATCH to update the event
            headers: {
               "Content-Type": "application/json",
               "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ comment: comment })  // Corrected object key
         })
            .then(response => response.json())
            .then(data => {
               if (data.success) {
                  Swal.fire("Success!", "Comment added successfully.", "success");
                  closeCommentModal();
               } else {
                  Swal.fire("Error!", "Could not add comment.", "error");
               }
            })
            .catch(error => console.error("Error:", error));
      }

   </script>

</x-app-layout>