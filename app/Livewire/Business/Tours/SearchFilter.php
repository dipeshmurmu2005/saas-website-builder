<?php

namespace App\Livewire\Business\Tours;

use App\Enums\Business\Tours\PackageStatusEnum;
use App\Enums\Business\Tours\PackageTypeEnum;
use App\Models\Business\Tours\Destination;
use App\Models\Business\Tours\Package;
use Livewire\Attributes\Url;
use Livewire\Component;

class SearchFilter extends Component
{
    public $durations;

    public $destinations;

    public $package_types;

    #[Url()]
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

    public function render()
    {
        return view('livewire.business.tours.search-filter');
    }
}
