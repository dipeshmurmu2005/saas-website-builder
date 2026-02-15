<?php

use Livewire\Component;
use App\Models\Country;
new class extends Component {
    public $countries;

    public function mount()
    {
        $this->countries = Country::latest()->where('status', true)->get();
    }
};
?>

<div>
    @if ($this->countries->count() > 0)
        <div class="px-5 lg:px-24 2xl:px-32 md:pt-20 pt-10">
            <div class="flex justify-center text-center">
                <h2
                    class="text-2xl lg:text-3xl 2xl:text-4xl md:w-[40%] leading-snug font-light bg-linear-to-r from-primary to-black bg-clip-text">
                    <span class="font-black text-transparent">Travel
                        Experiences </span> Loved by
                    <span class="font-black text-transparent">Travelers</span>
                </h2>
            </div>
            <div class="pt-20 gap-5" x-data="{
                init() {
                    countriesSwiper = new Swiper('.countriesswiper', {
                        slidesPerView: 1.2,
                        centeredSlides: {{ $this->countries->count() == 5 ? 'false' : 'true' }},
                        spaceBetween: 20,
                        breakpoints: {
                            '1024': {
                                slidesPerView: 5,
                            }
                        }
                    })
                }
            }">
                <div class="swiper countriesswiper">
                    <div class="swiper-wrapper">
                        @foreach ($this->countries as $country)
                            <div class="swiper-slide">
                                <a href="{{ route('country.view', ['slug' => $country->slug]) }}">
                                    <div
                                        class="rounded-full overflow-hidden h-100 xs:h-200 lg:h-120 relative w-full group">
                                        <img src="{{ Storage::url($country->cover_image) }}" alt=""
                                            class="h-full w-full object-cover group-hover:scale-125 duration-300 group-hover:rotate-6">
                                        <div
                                            class="absolute left-0 top-0 bg-linear-to-tr from-black/80 to-transparent h-full w-full">

                                        </div>
                                    </div>
                                    <div class="text-center mt-5 font-semibold">{{ $country->name }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        <div></div>
    @endif
</div>
