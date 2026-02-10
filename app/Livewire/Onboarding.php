<?php

namespace App\Livewire;

use App\Models\BusinessType;
use Illuminate\Http\Request;
use Livewire\Component;

class Onboarding extends Component
{
    public $business_types;

    public $business_type;

    public $plan;

    public function mount(Request $request)
    {
        $this->plan = $request->get('plan');
        $this->business_type = $request->get('business_type');
        $this->business_types = BusinessType::latest()->pluck('name', 'id');
    }
    public function render()
    {
        return view('livewire.onboarding');
    }
}
