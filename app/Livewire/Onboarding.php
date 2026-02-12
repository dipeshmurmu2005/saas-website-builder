<?php

namespace App\Livewire;

use App\Models\Business;
use App\Models\Tenant;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Onboarding extends Component
{
    public $businesses;

    public $selectedBusiness;

    public $business;

    public $themes;

    public $subdomaintaken;

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

    public $fullsubdomain;

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


    public function mount(Request $request)
    {
        if (session('onboarding_data')) {
            $this->setSessionDatas();
            $this->activeStep = 4;
        } else {
            $validated = $request->validate([
                'business' => 'required|string',
                'plan' => 'required|string',
            ]);
            $business = Business::where('slug', $validated['business'])->first();
            if ($business) {
                $this->business = $validated['business'];
                $this->plan = $validated['plan'];
                $this->activeStep = 1;
            } else {
                abort(404);
            }
        }
        $this->businesses = Business::latest()->pluck('name', 'slug');
        // if ($request->get('business') && $request->get('plan')) {
        //     $validated = $request->validate([
        //         'business' => 'required|string',
        //         'plan' => 'required|string',
        //     ]);
        //     if ($validated['business'] && $validated['plan']) {
        //         $business = Business::where('slug', $validated['business'])->first();
        //         $this->business = $validated['business'];
        //         $this->businesses = Business::latest()->pluck('name', 'slug');
        //         $this->plan = $request->get('plan');
        //         if (!($business && $this->plan)) {
        //             abort(404);
        //         }
        //     } else {
        //         abort(404);
        //     }
        // } else {
        //     abort(404);
        // }
        // $this->activeStep = 1;
    }
    public function render()
    {
        return view('livewire.onboarding');
    }

    public function setFirstStepData() {}

    public function switchToTheme()
    {
        $this->validate($this->firstStepRules);
        $this->selectedBusiness = Business::where('slug', $this->business)->first();
        $this->themes = $this->selectedBusiness->themes;
        $this->activeStep = 2;
        session()->put('onboarding_data', [
            'active_step' => 2,
            'selected_business_id' => $this->selectedBusiness->id,
            'step_one' => [
                'business_name' => $this->business_name,
                'business' => $this->business,
                'location' => $this->location,
                'phone' => $this->phone,
                'email' => $this->email,
            ]
        ]);
    }

    public function selectTheme($slug)
    {
        $this->theme = $slug;
    }

    public function switchToWebAddress()
    {
        $this->validate($this->secondStepRules);
        $theme = Theme::where('slug', $this->theme)->where('business_id', $this->selectedBusiness->id)->first();
        if ($theme) {
            $this->activeStep = 3;
            $onboardingData = session('onboarding_data');
            $onboardingData['step_two'] = [
                'theme' => $this->theme
            ];
            $onboardingData['active_step'] = 3;
            session()->put('onboarding_data', $onboardingData);
        }
    }

    public function switchToCheckout()
    {
        $this->validate([
            'fullsubdomain' => 'nullable|required_without:custom_domain|unique:tenants,domain',
            'custom_domain' => 'nullable|required_without:subdomain',
        ]);
        $this->activeStep = 4;
    }

    public function onboard()
    {
        dd('hello');
    }

    public function updatedSubdomain()
    {
        $subdomain = Tenant::where('domain', $this->subdomain . '.tenancy.test')->first();
        $this->fullsubdomain = $this->subdomain . '.tenancy.test';
        if ($subdomain) {
            $this->subdomaintaken = true;
        } else {
            $this->subdomaintaken = false;
        }
    }

    private function setSessionDatas()
    {
        $sessionData = session()->get('onboarding_data');
        if ($sessionData['active_step'] >= 2) {
            $this->business_name = $sessionData['step_one']['business_name'];
            $this->business = $sessionData['step_one']['business'];
            $this->location = $sessionData['step_one']['location'];
            $this->phone = $sessionData['step_one']['phone'];
            $this->email = $sessionData['step_one']['email'];
            $this->selectedBusiness = Business::where('slug', $this->business)->first();
        }
        if ($sessionData['active_step'] >= 3) {
            $this->theme = $sessionData['step_two']['theme'];
        }
        if ($sessionData['active_step'] == 2) {
            $this->activeStep = 2;
            $this->switchToTheme();
        } else if ($sessionData['active_step'] == 3) {
            $this->activeStep = 3;
            $this->switchToWebAddress();
        }
    }
}
