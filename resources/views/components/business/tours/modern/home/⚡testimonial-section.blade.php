<?php

use Livewire\Component;
use App\Models\Testimonial;

new class extends Component {
    public $testimonials;
    public function mount()
    {
        $this->testimonials = Testimonial::latest()->get();
    }
};
?>

<div>
    @if ($this->testimonials->count() > 0)
        <div class="px-5 md:pb-10 pt-16 md:pt-48 md:px-32">
            <div class="flex justify-center text-center flex-col items-center">
                <h2
                    class="text-2xl md:text-4xl md:w-[40%] leading-snug font-light bg-linear-to-r from-primary to-black bg-clip-text">
                    <span class="font-black text-transparent">Testimonial</span> &
                    <span class="font-black text-transparent">Travelers Reviews</span>
                </h2>
                <p class="text-xl text-black/50">Real Experiences. Real Memories.</p>
            </div>
            <div class="mt-20 h-fit overflow-hidden relative">
                <div class="absolute left-0 top-0 h-full bg-linear-to-r from-base-100 to-transparent w-20 z-50">

                </div>
                <div>
                    <div x-data="{
                        init() {
                            var testimonialsSwiper = new Swiper('.testimonials', {
                                slidesPerView: 1.2,
                                spaceBetween: 20,
                                centeredSlides: {{ $this->testimonials->count() >= 4 ? 'false' : 'true' }},
                                loop: true,
                                autoplay: {
                                    delay: 2000,
                                },
                                breakpoints: {
                                    '1024': {
                                        slidesPerView: 4,
                                        spaceBetween: 20,
                                    }
                                }
                            })
                        }
                    }">

                        <div class="swiper testimonials">
                            <div class="swiper-wrapper py-2">
                                @foreach ($this->testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div
                                            class="border p-8 {{ $this->testimonials->count() >= 4 ? '' : 'min-w-80 w-fit' }} border-black/10 rounded-3xl bg-white">
                                            <div class="flex gap-2 items-center">
                                                <div
                                                    class="avatar h-12 w-12 rounded-full overflow-hidden ring-2 ring-offset-2 ring-primary">
                                                    <img src="{{ Storage::url($testimonial->avatar) }}" alt="">
                                                </div>
                                                <div>
                                                    <h2 class="font-semibold">{{ $testimonial->name }}</h2>
                                                    <p class="text-sm">{{ $testimonial->title }}</p>
                                                </div>
                                            </div>
                                            <div class="mt-5 text-black/60">{{ $testimonial->quotes }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute right-0 top-0 h-full bg-linear-to-l from-base-100 to-transparent w-20 z-50">

                </div>
                <style>
                    .testimonials {
                        transition-timing-function: linear;
                    }
                </style>
            </div>
        </div>
    @endif
</div>
