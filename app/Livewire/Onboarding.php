<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\Theme;
use Illuminate\Http\Request;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Onboarding extends Component
{
    public $businesses;

    public $selectedBusiness;

    public $business;

    public $themes;

    #[Locked]
    public $activeStep = null;

    // firststep
    public $business_name;

    public $location;

    public $phone;

    public $email;

    public $theme;

    // third step
    public $subdomain;

    public $custom_domain;

    // fourth step
    public $plan;

    protected $firstStepRules = [
        'business_name' => 'required|string',
        'business' => 'required|string|exists:businesses,slug',
        'location' => 'required|string',
        'phone' => 'required|string',
        'email' => 'required|email',
    ];

    protected $secondStepRules = [
        'theme' => 'required|string|exists:themes,slug'
    ];

    protected $thirdStepRules = [
        'subdomain'     => 'nullable|required_without:custom_domain|unique:tenants,domain',
        'custom_domain' => 'nullable|required_without:subdomain',
    ];

    public function mount(Request $request)
    {
        if ($request->get('business') && $request->get('plan')) {
            $validated = $request->validate([
                'business' => 'required|string',
                'plan' => 'required|string',
            ]);
            if ($validated['business'] && $validated['plan']) {
                $business = Business::where('slug', $validated['business'])->first();
                $this->business = $validated['business'];
                $this->businesses = Business::latest()->pluck('name', 'slug');
                $this->plan = $request->get('plan');
                if (!($business && $this->plan)) {
                    abort(404);
                }
            } else {
                abort(404);
            }
        } else {
            abort(404);
        }
        $this->activeStep = 1;
    }
    public function render()
    {
        return view('livewire.onboarding');
    }

    public function switchToTheme()
    {
        $this->validate($this->firstStepRules);
        $this->selectedBusiness = Business::where('slug', $this->business)->first();
        $this->themes = $this->selectedBusiness->themes;
        $this->activeStep = 2;
    }

    public function selectTheme($slug)
    {
        $this->theme = $slug;
    }

    public function switchToWebAddress()
    {
        $this->validate($this->secondStepRules);
        $theme = Theme::where('slug', $this->theme)->where('business_type_id', $this->selectedBusiness->id)->first();
        if ($theme) {
            $this->activeStep = 3;
        }
    }

    public function switchToCheckout()
    {
        $this->validate($this->thirdStepRules);
        $this->activeStep = 4;
    }

    public function onboard()
    {
        dd('hello');
    }
}
