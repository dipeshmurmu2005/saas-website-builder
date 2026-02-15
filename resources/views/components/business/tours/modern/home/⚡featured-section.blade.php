<?php

use Livewire\Component;
use App\Models\Business\Tours\Destination;
new class extends Component {
    public $featured_categories;

    public $featured_destinations;

    public function mount()
    {
        $this->featured_categories = Destination::where('status', true)->limit(8)->where('is_featured', true)->distinct()->pluck('type');
        $this->featured_destinations = Destination::where('status', true)->where('is_featured', true)->get();
    }
};
?>

<div>
    @if ($this->featured_destinations->count() > 0)
        <div class="pt-80 lg:px-24 2xl:px-32 md:pt-32">
            <div class="flex justify-center text-center">
                <h2
                    class="text-2xl lg:text-3xl 2xl:text-4xl md:w-[40%] leading-snug font-light bg-linear-to-r from-primary to-black bg-clip-text">
                    <span class="font-black text-transparent">Travel
                        Experiences </span> Loved by
                    <span class="font-black text-transparent">Travelers</span>
                </h2>
            </div>
            <div class="flex justify-center items-center pt-5 gap-2 flex-wrap">
                @foreach ($this->featured_categories as $category)
                    <button
                        class="btn btn-outline rounded-full border-black/10 text-black/70 font-medium">{{ $category->getLabel() }}</button>
                @endforeach
            </div>
            <div class="grid-cols-4 pt-10 gap-5 hidden md:grid">
                @foreach ($this->featured_destinations as $destination)
                    <x-business.tours.modern.destination :destination="$destination" />
                @endforeach
            </div>
            <div class="mt-10 md:hidden" x-data="{
                init() {
                    featuredDestinationSwiper = new Swiper('.featureddestinations', {
                        slidesPerView: 1.2,
                        spaceBetween: 20,
                    })
                }
            }">
                <div class="swiper featureddestinations">
                    <div class="swiper-wrapper">
                        @foreach ($this->featured_destinations as $destination)
                            <div class="swiper-slide">
                                <a href="{{ route('destination.view', ['slug' => $destination->slug]) }}"
                                    class="rounded-3xl overflow-hidden h-90 lg:h-90 2xl:h-110 relative block">
                                    <img src="{{ Storage::url($destination->cover_image) }}" alt=""
                                        class="h-full w-full object-cover">
                                    <div
                                        class="absolute left-0 top-0 h-full w-full bg-linear-to-t from-black/90 to-transparent p-5 lg:p-5 2xl:p-8 flex items-end">
                                        <div class="text-white space-y-2">
                                            <div>
                                                <h2 class="font-black lg:text-lg 2xl:text-xl">{{ $destination->name }}
                                                </h2>
                                                <p class="lg:text-sm 2xl:text-base capitalize">
                                                    {{ $destination->short_description }}
                                                </p>
                                            </div>
                                            <button
                                                class="btn btn-sm rounded-lg h-10 bg-white/30 border-none text-white">View
                                                Packages</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
