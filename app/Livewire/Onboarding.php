<?php

namespace App\Livewire;

use App\Models\Business;
use Illuminate\Http\Request;
use Livewire\Component;

class Onboarding extends Component
{
    public $businesses;

    public $business;

    public $plan;

    public function mount(Request $request)
    {
        $validated = $request->validate([
            'business' => 'required|string',
            'plan' => 'required|string',
        ]);
        $this->business = Business::where('slug', $validated['business'])->first();
        $this->businesses = Business::latest()->pluck('name', 'slug');
        $this->plan = $request->get('plan');
        if (!($this->business && $this->plan)) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.onboarding');
    }
}
