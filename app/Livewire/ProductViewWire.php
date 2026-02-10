<?php

namespace App\Livewire;

use App\Models\BusinessType;
use Livewire\Attributes\Url;
use Livewire\Component;

class ProductViewWire extends Component
{
    #[Url()]
    public $slug;

    public $business;

    public function mount()
    {
        $this->business = BusinessType::where('slug', $this->slug)->first();
    }

    public function render()
    {
        return view('livewire.product-view-wire');
    }
}
