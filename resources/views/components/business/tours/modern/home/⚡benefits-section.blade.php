<?php

use Livewire\Component;
use App\Models\Benefit;
new class extends Component {
    public $benefits;

    public function mount()
    {
        $this->benefits = Benefit::latest()->get();
    }
};
?>

<div>
    @if ($this->benefits->count() > 0)
        <div>
            <div class="px-5 pt-20 lg:px-24 md:pt-32 2xl:px-32">
                <h2
                    class="text-2xl lg:text-3xl 2xl:text-4xl md:w-[40%] leading-snug font-light bg-linear-to-r from-primary to-black bg-clip-text">
                    <span class="font-black text-transparent">Explore</span> our
                    <span class="font-black text-transparent">Benefits</span>
                </h2>
            </div>
            <div class="mt-8 lg:mt-10 2xl:mt-10">
                <div x-data="{
                    init() {
                        benefitsSwiper = new Swiper('.benefitsswiper', {
                            slidesPerView: 1.2,
                            centeredSlides: false,
                            breakpoints: {
                                '1024': {
                                    slidesPerView: 4.5,
                                    centeredSlides: true,
                                }
                            }
                        })
                    }
                }">
                    <div class="swiper benefitsswiper bor">
                        <div class="swiper-wrapper py-5">
                            @foreach ($this->benefits as $benefit)
                                <div class="swiper-slide">
                                    <div class="bg-white p-8 rounded-3xl shadow-sm">
                                        <div
                                            class="bg-primary/10 rounded-lg mb-5 lg:mb-4 h-10 w-10 2xl:h-18 lg:h-14 2xl:w-18 lg:w-14 lg:rounded-2xl 2xl:rounded-3xl flex justify-center items-center">
                                            <x-icon name="{{ $benefit->icon }}"
                                                class="2xl:h-8 lg:h-6 2xl:w-8 lg:w-6 text-primary" />
                                        </div>
                                        <h2 class="font-black 2xl:text-xl">{{ $benefit->title }}</h2>
                                        <p class="lg:text-sm 2xl:text-base mt-1">{{ $benefit->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endif
</div>
