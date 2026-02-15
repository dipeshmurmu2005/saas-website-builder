<?php

use Livewire\Component;
use App\Models\Package;
use App\Models\Destination;
use App\Enums\PackageStatusEnum;
use Livewire\Attributes\Url;
use App\Enums\PackageTypeEnum;
new class extends Component {
    public $durations;

    public $destinations;

    public $package_types;

    #[Url]
    public $destination;

    #[Url]
    public $type;

    #[Url]
    public $duration;

    #[Url]
    public $max_budget;

    #[Url]
    public $query;

    public function mount()
    {
        $maxDuration = Package::where('status', PackageStatusEnum::ACTIVE)->max('duration_days');

        $ranges = [[1, 3], [4, 7], [8, 14], [15, $maxDuration]];

        $this->durations = collect($ranges)
            ->filter(fn($range) => $range[0] <= $maxDuration)
            ->mapWithKeys(function ($range) use ($maxDuration) {
                [$start, $end] = $range;

                if ($end === $maxDuration) {
                    return ["{$start}+" => "{$start}+ Days"];
                }

                return ["{$start}-{$end}" => "{$start}–{$end} Days"];
            })
            ->toArray();

        $this->destinations = Destination::where('status', true)->pluck('name', 'id');
        $this->package_types = PackageTypeEnum::cases();
    }
};
?>

<div
    class="{{ url()->current() == route('explore') ? '' : 'absolute left-0 top-[85%] md:-bottom-10 ' }} w-full gap-5 flex justify-center flex-col items-center h-fit z-20">
    <div class="swiper-pagination-custom w-fit!"></div>
    <div class="bg-white p-8 md:p-5 rounded-3xl shadow-sm w-[90%] md:w-fit">
        <form class="grid gap-5 md:gap-0 md:flex items-center md:divide-x divide-black/15"
            action="{{ route('explore') }}">
            <div class="md:pr-5 h-full hidden md:block">
                <div class="logo lg:h-8 2xl:h-10 w-fit">
                    <img src="{{ settings('logo') ? Storage::url(settings('logo')) : null }}" alt=""
                        class="h-full w-full object-contain">
                </div>
            </div>
            <div class="md:px-5 h-10 flex items-center w-full md:w-auto">
                <select name="type" id=""
                    class="cursor-pointer h-full w-full md:w-auto 2xl:text-base lg:text-sm" wire:model.live="type">
                    <option value="" selected>Travel Type</option>
                    @foreach ($this->package_types as $type)
                        <option value="{{ $type->value }}">{{ $type->getLabel() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="md:px-5 h-10 flex items-center w-full md:w-120">
                <input type="text" class="input rounded-xl w-full h-12" placeholder="Search" name="query"
                    wire:model="query">
            </div>
            <div class="md:pl-5 h-full">
                <button class="btn btn-primary rounded-xl w-full md:w-auto h-12 md:h-10">Search</button>
            </div>
        </form>
    </div>
</div>
