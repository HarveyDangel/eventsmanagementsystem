<section id="feedback" class="section py-10 h-full lg:max-h-screen pt-10 scroll-mt-16 bg-gradient-to-b from-indigo-300 to-gray-50">
    <div class="container mx-auto grid md:grid-cols-2 gap-2 ">
        <div class="justify-center items-center flex flex-col">
            <div class="text-center">
                <h2 class="section-title text-[24px] lg:text-[40px] font-semibold text-gray-800 text-center mb-10 px-[12px]">Trusted by Schools and Organizations Across Biliran</h2>
            </div>
            <img src="{{ url('images/star.png') }}" class=" lg:max-h-90 animate-shake" alt="Star Rating">
        </div>
        <div class="section-header mb-12 items-center">
            <div class="p-5 gap-5 grid">
                @foreach ($feedbacks as $feedback)
                    @if($feedback->status !== 'deleted') {{-- Hide deleted feedbacks --}}
                        <div class="text-left capitalize" id="feedback-{{ $feedback->id }}">
                            <div class="bg-white text-gray-800 p-5 rounded-2xl shadow-md border border-gray-200">
                                <h2
                                    class="section-title text-[18px] font-bold text-gray-800 mb-4 flex flex-wrap">
                                    {{ $feedback->user->name ?? 'Guest' }}
                                </h2>
                                <span class="text-gray-900 text-sm leading-relaxed italic">"{{ $feedback->feedback }}"</span>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>