<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
    <div class="p-6 bg-gray-100 flex justify-center">
       <div class="bg-white shadow-lg rounded-lg p-6 max-w-6xl w-full">
          <h1 class="text-2xl font-semibold mb-4">Feedbacks</h1>
 
          <nav class="text-sm mb-5">
             <ol class="flex space-x-2 text-gray-600">
                <li>Feedbacks</li>
                <li>/</li>
                <li class="text-gray-800 font-semibold">List</li>
             </ol>
          </nav>
 
          <div class=" mb-5">
 
             @include('sweetalert::alert')
 
             <table class="w-full min-w-[600px] border-collapse table-auto">
                <thead class="border-b-2 border-gray-800">
                   <tr>
                      <th class="px-4 py-2 text-left">ID</th>
                      <th class="px-4 py-2 text-left">Feedback</th>
                      <th class="px-4 py-2 text-left">Category</th>
                      <th class="px-4 py-2 text-left">Venue</th>
                      <th class="px-4 py-2 text-left">Date</th>
                      <th class="px-4 py-2 text-left">Status</th>
                      <th class="px-4 py-2 text-left">Action</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach ($feedbacks as $feedback)
                   <tr class="text-left capitalize">
                      <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->id}}</td>
                      <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->name }}</td>
                      <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->category}}</td>
                      <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->venue}}</td>
                      <td class="border-b border-gray-600 px-4 py-2">{{ \Carbon\Carbon::parse($feedback->start_date)->format('F j, Y, g:i a') }}</td>
                      <td class="border-b border-gray-600 px-4 py-2 status">{{ $feedback->status}}</td>
 
                      {{-- ! NEED SUBMiT LOGIC --}}
                      <td class="border-b border-gray-600 px-4 py-2">
                         <form action="{{route('feedbacks.update', $feedback)}}">
                            @csrf
                            @method('PATCH')
                            <div class="flex gap-3">
                               <x-heroicon-o-check-circle class="size-8 text-green-700"/>
                               <x-heroicon-o-x-circle class="size-8 text-red-700"/>
                               <x-heroicon-o-chat-bubble-bottom-center-text class="size-8 text-indigo-700"/>
                            </div>
                         </form>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
             </table>
 
             {{ $feedbacks->links() }}
 
             <!-- feedback Cards -->
             {{-- 
             <div class="relative bg-white shadow-md rounded-lg flex flex-col h-full hover:shadow-lg hover:scale-105 transition-all duration-300">
 
                <!-- Clickable Area for Navigation -->
                <a href="{{ route('feedbacks.show', $feedback->id) }}" class="flex flex-col flex-grow">
                   <!-- Image Section -->
                   <div
                      class="bg-gray-300 h-40 sm:h-48 flex items-center justify-center relative rounded-t-lg overflow-hidden">
                      @if ($feedback->image)
                      <img src="{{ asset('storage/' . $feedback->image) }}" alt="{{ $feedback->title }}"
                         class="w-full h-full object-cover rounded-t-lg">
                      @else
                      <span class="text-lg md:text-xl font-bold text-gray-500">No Image</span>
                      @endif
                   </div>
 
                   <!-- feedback Details -->
                   <div class="p-4 flex-grow">
                      <p class="font-bold text-xs md:text-sm break-words whitespace-normal">
                         Title:
                      </p>
                      <p class="text-xs text-gray-500">Venue: {{ $feedback->venue }}</p>
                      <p class="text-xs text-gray-500">Start at:
                         {{ \Carbon\Carbon::parse($feedback->start_date)->format('F j, Y, g:i a') }}
                      </p>
                   </div>
                </a>
 
                <!-- Three Dots Button -->
                <button id="button-{{ $feedback->id }}" onclick="toggleDropdown(feedback, {{ $feedback->id }})"
                   class="absolute top-2 right-2 px-2 py-0 text-white text-2xl border border-gray-400 rounded-md bg-gray-800 hover:bg-gray-700 focus:outline-none">
                   &#x22EF;
                </button>
 
                <!-- Dropdown Menu (Inside Card) -->
                <div id="dropdown-{{ $feedback->id }}"
                   class="dropdown-menu hidden absolute top-12 right-2 bg-white shadow-md rounded-lg w-32 sm:w-36 z-50 py-2 border border-gray-200">
 
                   <!-- Edit Button -->
                   <a href="{{ route('feedbacks.edit', $feedback->id) }}"
                      class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100">
                      <x-heroicon-o-pencil-square class="w-5 h-5 text-blue-500" />
                      <span>Edit</span>
                   </a>
 
                   <!-- Delete Button -->
                   <form id="delete-form-{{ $feedback->id }}" action="{{ route('feedbacks.destroy', $feedback->id) }}"
                      method="POST" class="flex items-center gap-2 px-4 py-2 text-sm hover:bg-gray-100 text-red-500">
                      @csrf
                      @method('DELETE')
                      <x-heroicon-o-trash class="w-5 h-5" />
                      <button type="button" class="text-red-500"
                         onclick="confirmDelete({{ $feedback->id }})">Delete</button>
                   </form>
                </div>
             </div>
             --}}
          </div>
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
       function toggleDropdown(feedback, id) {
          feedback.stopPropagation(); // Prfeedbacks navigation
          let dropdown = document.getElementById('dropdown-' + id);
          let button = document.getElementById('button-' + id);
 
          // Close other open dropdowns
          document.querySelectorAll('.dropdown-menu').forEach(el => {
             if (el !== dropdown) el.classList.add('hidden');
          });
 
          dropdown.classList.toggle('hidden');
 
          // Add feedback listeners for closing when cursor leaves
          button.addfeedbackListener("mouseleave", function () {
             setTimeout(() => {
                if (!dropdown.matches(':hover')) dropdown.classList.add('hidden');
             }, 200);
          });
 
          dropdown.addfeedbackListener("mouseleave", function () {
             setTimeout(() => {
                if (!button.matches(':hover')) dropdown.classList.add('hidden');
             }, 200);
          });
       }
 
       // Close dropdown when clicking anywhere outside
       document.addfeedbackListener("click", function () {
          document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
       });
    </script>
 
 </x-app-layout>