<div class="pt-28 md:pt-40 px-5 md:px-50 2xl:px-60">
    <div class="flex gap-2 text-black/50 text-xs lg:text-xs 2xl:text-sm items-center">
        <a href="{{ route('home') }}">Home</a>
        <x-heroicon-m-chevron-right class="h-5 w-5" />
        <a href="{{ route('explore') }}">Packages</a>
        <x-heroicon-m-chevron-right class="h-5 w-5" />
        <a href="{{ url()->current() }}" class="text-primary">{{ $this->package->title }}</a>
    </div>
    <div class="mt-8 grid grid-cols-4">
        <div class="col-span-3">
            <div class="space-y-2">
                <h2 class="text-3xl font-black">{{ $this->package->title }}</h2>
                <div class="text-base text-black/80"><span class="font-black">{{ $this->package->duration_days }}</span>
                    Days -
                    <span class="font-black">{{ $this->package->duration_days - 1 }}</span>
                    Nights
                </div>
            </div>
        </div>
        <div class="bg-white p-8 shadow-xs rounded-xl space-y-4">
            <div class="text-sm text-black/70">
                <span>From</span> <span class="line-through">Rs. {{ $this->package->original_price }}</span>
            </div>
            <div class="text-3xl font-bold">
                <span>Rs. {{ $this->package->discounted_price }}</span>
            </div>
            <div>

            </div>
        </div>
    </div>
    {{-- <div class="lg:h-120 2xl:h-180 rounded-3xl overflow-hidden mt-10 relative" wire:ignore x-data="{
        init() {
            var swiper = new Swiper('.heroimages', {
                slidesPerview: 2,
                effect: 'fade',
                loop: true,
                autoplay: { delay: 5000 },
            })
        }
    }">
        <div class="swiper heroimages">
            <div class="swiper-wrapper">
                @foreach ($this->package->images as $image)
                    <div class="swiper-slide">
                        <div class="h-90 lg:h-120 2xl:h-180 w-full bg-white">
                            <img src="{{ Storage::url($image) }}" alt="" class="h-full w-full object-cover">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div
            class="absolute left-0 top-0 h-full w-full bg-linear-to-tr from-black to-transparent z-30 grid md:grid-cols-3 p-8 md:p-18">
            <div class="flex items-end md:col-span-2">
                <div class="space-y-2 md:space-y-0">
                    <div
                        class="bg-primary w-fit text-white px-5 py-2 rounded-full font-black text-xs 2xl:text-base lg:text-xs">
                        {{ $this->package->duration_days }} Days</div>
                    <h2 class="text-4xl lg:text-5xl 2xl:text-6xl font-black text-white leading-snug">
                        {{ $this->package->title }}
                    </h2>
                    <p class="text-xl text-white">{{ $this->package->short_description }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col-reverse md:grid md:grid-cols-9 mt-10 md:gap-20">
        <div class="md:col-span-6 space-y-10">
            <div>
                <h2 class="font-semibold lg:text-base 2xl:text-lg">Overview</h2>
                <div class="prose mt-2 capitalize">
                    {!! $this->package->description !!}
                </div>
                <div class="grid grid-cols-2 w-full lg:grid-cols-3 2xl:grid-cols-4 gap-5 mt-10">
                    @foreach ($this->package->services as $service)
                        <div class="bg-white p-5 shadow-xs rounded-2xl space-y-2">
                            <div class="h-10 w-10 rounded-xl bg-primary/10 flex justify-center items-center">
                                <x-icon name="{{ $service['icon'] }}" class="h-5 w-5 text-primary" />
                            </div>
                            <div>
                                <h3 class="font-semibold uppercase text-sm text-black/50">{{ $service['title'] }}</h3>
                                <h4 class="font-bold">{{ $service['value'] }}</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <h2 class="font-semibold lg:text-base 2xl:text-lg">Explore Magic</h2>
                <div class="columns-2 md:columns-3 mt-5 space-y-2 gap-2 md:space-y-5 md:gap-5">
                    @foreach ($this->package->images as $image)
                        <img src="{{ Storage::url($image) }}" alt=""
                            class="h-full w-full object-cover rounded-2xl overflow-hidden">
                    @endforeach
                </div>
            </div>
            @if ($this->package->itineraries->count() > 0)
                <div>
                    <h2 class="font-semibold lg:text-base 2xl:text-lg">Package Itenararies</h2>
                    <div class="mt-5">
                        @foreach ($this->package->itineraries as $key => $itinerary)
                            <div tabindex="0"
                                class="collapse collapse-arrow {{ $key == 0 ? 'collapse-open' : '' }}  border-black/4 border bg-white">
                                <div
                                    class="collapse-title font-semibold after:start-5 after:end-auto pe-4 ps-12 2xl:text-base lg:text-sm">
                                    <span
                                        class="h-6 w-6 text-sm inline-flex 2xl:text-base lg:text-sm justify-center items-center bg-primary rounded-full font-black text-white mr-1">{{ $itinerary->day }}</span>
                                    {{ $itinerary->title }}
                                </div>
                                <div class="collapse-content text-sm text-black/50">
                                    {{ $itinerary->description }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($this->package->posts->count() > 0)
                <div class="md:hidden" x-data="{
                    init() {
                        var swiper = new Swiper('.blogsslider', {
                            slidesPerView: 1.1,
                        })
                    }
                }">
                    <div class="swiper blogsslider">
                        <div class="swiper-wrapper">
                            @foreach ($this->package->posts as $post)
                                <div class="swiper-slide">
                                    <a href="{{ route('post.view', ['slug' => $post->slug]) }}">
                                        <div class="h-60 rounded-2xl overflow-hidden relative">
                                            <img src="{{ Storage::url($post->cover_image) }}" alt=""
                                                class="h-full w-full object-cover">
                                            <div
                                                class="absolute left-0 top-0 h-full w-full flex items-end p-5 bg-linear-to-tr from-black to-black/20">
                                                <div class="space-y-1">
                                                    <div class="text-xs px-3 py-2 bg-white rounded-lg w-fit">
                                                        {{ $post->type->getLabel() }}</div>
                                                    <h2 class="text-lg text-white font-bold">{{ $post->title }}</h2>
                                                    <div class="capitalize text-white">{{ $post->excerpt }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="md:col-span-3 space-y-10">
            <div class="bg-white p-5 lg:p-5 2xl:p-8 rounded-2xl shadow-sm">
                <h3 class="lg:text-lg 2xl:text-xl line-through text-black/50">Rs. {{ $this->package->original_price }}
                </h3>
                <h2 class="text-2xl lg:text-3xl 2xl:text-4xl font-black text-primary">Rs.
                    {{ $this->package->discounted_price }}
                </h2>
                <div class="pt-5 border-t border-black/5 mt-5">
                    <button class="btn h-14 btn-success rounded-xl w-full"><x-fab-whatsapp class="h-5 w-5" /> Chat On
                        Whatsapp</button>
                </div>
            </div>
            @if ($this->package->posts->count() > 0)
                <div class="w-[90%] hidden md:block">
                    <div class="space-y-4">
                        <div class="font-bold">Blogs</div>
                        @foreach ($this->package->posts as $post)
                            <a href="{{ route('post.view', ['slug' => $post->slug]) }}">
                                <div class="h-60 rounded-2xl overflow-hidden relative">
                                    <img src="{{ Storage::url($post->cover_image) }}" alt=""
                                        class="h-full w-full object-cover">
                                    <div
                                        class="absolute left-0 top-0 h-full w-full flex items-end p-5 bg-linear-to-tr from-black to-black/20">
                                        <div class="space-y-1">
                                            <div class="text-xs px-3 py-2 bg-white rounded-lg w-fit">
                                                {{ $post->type->getLabel() }}</div>
                                            <h2 class="text-lg text-white font-bold">{{ $post->title }}</h2>
                                            <div class="capitalize text-white">{{ $post->excerpt }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div> --}}
</div>
