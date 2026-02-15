<?php

use Livewire\Component;
use App\Enums\Business\Tours\SocialLinkEnum;
use App\Enums\Business\Tours\PackageTypeEnum;
use App\Enums\Business\Tours\DestinationTypeEnum;
new class extends Component {
    public $package_types;
    public $trip_types;
    public function mount()
    {
        $this->package_types = PackageTypeEnum::cases();
        $this->trip_types = DestinationTypeEnum::cases();
    }
    public function getSocialLinkEnum($item)
    {
        $enum = SocialLinkEnum::from($item);
        return $enum->getIcon();
    }
};
?>

<div class="bg-linear-to-b from-base-100 to-white mt-32">
    <div class="grid md:grid-cols-8 gap-8 px-5 md:px-32 py-10 2xl:text-base lg:text-sm">
        <div class="md:col-span-4">
            <div class="logo h-10 lg:h-10 2xl:h-18 w-fit">
                {{-- <img src="{{ settings('logo') ? Storage::url(settings('logo')) : null }}" alt=""
                    class="h-full w-full object-contain"> --}}
            </div>
            <div class="mt-8 flex gap-2">
                {{-- @if (settings('social_links'))
                    @foreach (settings('social_links') as $media)
                        <a target="_blank" href="{{ $media['url'] }}">
                            <button class="btn border-black/5 btn-square rounded-lg">
                                <x-icon name="{{ $this->getSocialLinkEnum($media['media']) }}" class="h-5 w-5" />
                            </button>
                        </a>
                    @endforeach
                @endif --}}
            </div>
        </div>
        <div>
            <h3 class="font-semibold">Explore</h3>
            <div class="grid space-y-2 lg:mt-2 2xl:mt-5 text-black/60">
                <a href="#">Destinations</a>
                <a href="#">Countries</a>
                <a href="#">Packages</a>
                <a href="#">Best Package Deals</a>
            </div>
        </div>
        <div>
            <h3 class="font-semibold">Experiences</h3>
            <div class="grid space-y-2 mt-2 lg:mt-2 2xl:mt-5 text-black/60">
                @foreach ($this->package_types as $type)
                    <a href="{{ route('explore', ['type' => $type->value]) }}">{{ $type->getLabel() }}</a>
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="font-semibold">Destinations</h3>
            <div class="grid space-y-2 mt-2 lg:mt-2 2xl:mt-5 text-black/60">
                @foreach ($this->trip_types as $type)
                    <a href="#">{{ $type->getLabel() }}</a>
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="font-semibold">Legal</h3>
            <div class="grid space-y-2 mt-2 lg:mt-2 2xl:mt-5 text-black/60">
                <a href="#">Terms of Service</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Press Kit</a>
            </div>
        </div>
    </div>
    <div
        class="text-xs text-center md:text-left md:px-32 border-t border-gray-100 bg-white px-5 flex flex-col gap-5 md:flex-row md:justify-between py-5 lg:text-xs 2xl:text-sm font-semibold text-black/50">
        <span>&copy; Copyright 2024 Franco Anil . All Rights Reserved</span>
        <span>Made with ❤ By Dipesh Murmu</span>
    </div>
</div>
