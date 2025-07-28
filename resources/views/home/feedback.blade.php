<div id="feedback">

</div>

<section class="section py-10 h-full max-h-screen mt-10">
    <h2 class="section-title text-4xl font-bold text-gray-800 text-center mb-10">Feedback</h2>
    <div class="container mx-auto grid md:grid-cols-2 gap-2 ">
        <div class="justify-center items-center flex flex-col">
            <div class="text-center text-gray-800 text-2xl">
                <h1>Tell us more about your experiences!</h1>
            </div>
            <img src="{{ url('images/star.png') }}" class="h-full lg:max-h-90 animate-shake -mt-5" alt="">
        </div>
        <div class="section-header mb-12 items-center">
            <div class="bg-indigo-200 rounded-lg p-10 gap-4 grid">
                @foreach ($feedbacks as $feedback)
                    @if($feedback->status !== 'deleted') {{-- Hide deleted feedbacks --}}
                        <div class="text-left capitalize" id="feedback-{{ $feedback->id }}">
                            {{-- <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->id }}</td>
                            <td class="border-b border-gray-600 px-4 py-2">{{ $feedback->user->name ?? 'Guest' }}

                            </td>
                            <td class="border-b border-gray-600 px-4 py-2 text-ellipsis">{{ $feedback->feedback }}</td>
                            <td class="border-b border-gray-600 px-4 py-2">
                                {{ $feedback->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="border-b border-gray-600 px-4 py-2">
                                {{ $feedback->ratings }}
                            </td> --}}
                            <div class="bg-white text-gray-800 px-5 py-2 rounded-md">
                                <h2
                                    class="section-title text-lg font-extrabold text-gray-800 mb-2 flex flex-wrap border-b-2 border-b-gray-500">
                                    {{ $feedback->user->name ?? 'Guest' }}
                                </h2>
                                <span class="text-gray-900">{{ $feedback->feedback }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="row flex flex-wrap -mx-4">

        </div>
    </div>
</section>