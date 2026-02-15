<div>
    <div class="lg:px-24 2xl:px-32 md:pt-5">
        <div class="relative {{ $this->banners->count() > 0 ? 'h-fit' : 'h-200 bg-linear-to-br from-black/30 to-primary/40 md:rounded-3xl' }}"
            x-data="{
                init() {
                    this.swiper = new Swiper('.bannerswiper', {
                        slidesPerView: 1,
                        loop: true,
                        autoplay: { delay: 5000 },
                        pagination: {
                            el: '.swiper-pagination-custom',
                            clickable: true,
                            type: 'custom',
                            renderCustom: function(swiper, current, total) {
                                let customHtml = `<ul class='flex gap-5'>`;
                                for (let i = 1; i <= total; i++) {
                                    if (current === i) {
                                        customHtml += `<li class='custom-bullet btn bg-white border-transparent h-2 active' x-on:click='swiper.slideTo(${i-1})'></li>`;
                                    } else {
                                        customHtml += `<li class='custom-bullet btn bg-white/40 border-transparent h-2' x-on:click='swiper.slideTo(${i-1})'></li>`;
                                    }
                                }
                                customHtml += '</ul>';
                                return customHtml;
                            }
                        }
                    })
                }
            }">
            <div class="swiper bannerswiper md:rounded-4xl">
                <div class="swiper-wrapper">
                    @foreach ($this->banners as $banner)
                        <div class="swiper-slide">
                            <div class="overflow-hidden relative h-100 lg:h-150 2xl:h-180">
                                <img src="{{ Storage::url($banner->cover_image) }}" alt=""
                                    class="h-full w-full object-cover">
                                <div
                                    class="absolute left-0 top-0 h-full w-full px-5 pt-24 md:p-18 md:pt-50 grid md:grid-cols-2 gap-5 md:gap-10 bg-linear-to-b from-black to-black/20">
                                    <div class="space-y-2 md:space-y-5">
                                        <h2
                                            class="text-2xl lg:text-4xl 2xl:text-5xl font-black leading-snug text-white">
                                            {{ $banner->title }}
                                        </h2>
                                        <p class="text-white text-base md:text-xl">{{ $banner->description }}</p>
                                        <a href="{{ $banner->button_link }}"><button
                                                class="btn 2xl:btn-md lg:btn-sm h-10 2xl:h-12 rounded-xl">{{ $banner->button_title }}</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <livewire:business.tours.search-filter />
            </div>
        </div>
    </div>
</div>
