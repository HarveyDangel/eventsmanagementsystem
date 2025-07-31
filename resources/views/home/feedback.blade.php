<div id="feedback"></div>

<section class="section py-10 h-full lg:max-h-screen mt-10">
    
    <div class="container mx-auto grid md:grid-cols-2 gap-2 ">
        <div class="justify-center items-center flex flex-col">
            <div class="text-center">
                <h2 class="section-title text-[24px] lg:text-[40px] font-semibold text-gray-800 text-center mb-10 px-[12px]">Trusted by Schools and Organizations Across Biliran</h2>
            </div>
            <img src="{{ url('images/star.png') }}" class="h-full lg:max-h-90 animate-shake -mt-5" alt="">
        </div>
        <div class="section-header mb-12 items-center">
            <div class="p-[12px] gap-[12px] grid">
                @foreach ($feedbacks as $feedback)
                    @if($feedback->status !== 'deleted') {{-- Hide deleted feedbacks --}}
                        <div class="text-left capitalize" id="feedback-{{ $feedback->id }}">
                            <div class="bg-white text-gray-800 px-5 py-2 rounded-md shadow-md">
                                <h2
                                    class="section-title text-[18px] font-bold text-gray-800 mb-[24px] flex flex-wrap">
                                    {{ $feedback->user->name ?? 'Guest' }}
                                </h2>
                                <span class="text-gray-900 text-[14px] italic">"{{ $feedback->feedback }}"</span>
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