<?php

use Livewire\Component;
use App\Models\Package;
use App\Enums\PackageStatusEnum;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

new class extends Component {
    public $packages_categories;

    public function mount()
    {
        $this->package_categories = Package::where('status', PackageStatusEnum::ACTIVE)->where('is_offer', true)->distinct()->pluck('type');
    }

    #[Computed]
    public function packages()
    {
        $packages = Package::where('status', PackageStatusEnum::ACTIVE)->where('is_offer', true)->get()->shuffle();
        return $packages;
    }
};
?>
<div>
    @if ($this->packages->count() > 0)
        <div class="lg:px-24 2xl:px-32 pt-32">
            <div class="px-5 md:px-0 flex justify-center text-center">
                <h2
                    class="text-2xl lg:text-3xl 2xl:text-4xl md:w-[40%] leading-snug font-light bg-linear-to-r from-primary to-black bg-clip-text">
                    <span class="font-black text-transparent">Special Offers / Limited Deals </span> For
                    <span class="font-black text-transparent">Travelers</span>
                </h2>
            </div>
            <div class="flex justify-center items-center pt-5 gap-2 flex-wrap">
                @foreach ($this->package_categories as $category)
                    <button
                        class="btn btn-outline rounded-full border-black/10 text-black/70 font-medium">{{ $category->getLabel() }}</button>
                @endforeach
            </div>
            <div class="grid-cols-4 pt-10 gap-5 space-y-10 hidden md:grid">
                @foreach ($this->packages as $package)
                    <x-package :package="$package" />
                @endforeach
            </div>
            <div class="pt-10 md:hidden" x-data="{
                init() {
                    dealsSwiper = new Swiper('.dealsswiper', {
                        slidesPerView: 1.2,
                        spaceBetween: 20,
                    })
                }
            }">
                <div class="swiper dealsswiper">
                    <div class="swiper-wrapper">
                        @foreach ($this->packages as $package)
                            <div class="swiper-slide">
                                <x-package :package="$package" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
