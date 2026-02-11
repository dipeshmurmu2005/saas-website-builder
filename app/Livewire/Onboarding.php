<?php

namespace App\Livewire;

use App\Models\Business;
use Illuminate\Http\Request;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Onboarding extends Component
{
    public $businesses;

    public $business;

    public $plan;

    #[Locked]
    public $activeStep = 1;

    // firststep
    public $business_name;

    public $location;

    public $phone;

    public $email;


    protected $firstStepRules = [
        'business_name' => 'required|string',
        'business' => 'required|string|exists:businesses,slug',
        'location' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
    ];

    public function mount(Request $request)
    {
        $validated = $request->validate([
            'business' => 'required|string',
            'plan' => 'required|string',
        ]);
        $business = Business::where('slug', $validated['business'])->first();
        $this->business = $validated['business'];
        $this->businesses = Business::latest()->pluck('name', 'slug');
        $this->plan = $request->get('plan');
        if (!($business && $this->plan)) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.onboarding');
    }

    public function switchToTheme()
    {
        $this->validate($this->firstStepRules);
        $this->activeStep = 2;
    }

    public function onboard()
    {
        dd('hello');
    }
}
