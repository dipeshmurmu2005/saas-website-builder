<?php

namespace App\Livewire;

use App\Actions\Platform\PaymentAction;
use App\Actions\Platform\OnboardingAction;
use App\Enums\BillingCycleEnum;
use App\Models\Business;
use App\Models\OnboardData;
use App\Models\Tenant;
use App\Models\Theme;
use Illuminate\Http\Request;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Onboarding extends Component
{
    public $businesses;

    #[Locked]
    public $selectedBusiness;

    #[Locked]
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

    public $billingCycle;

    #[Locked]
    public $payment_params;

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
        $this->billingCycle = BillingCycleEnum::Monthly->value;
        if (session('onboarding_data')) {
            $this->setSessionDatas();
        } else {
            $validated = $request->validate([
                'business' => 'required|string',
                'plan' => 'required|string',
            ]);
            $business = Business::where('slug', $validated['business'])->first();
            $this->selectedBusiness = $business;
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
                'plan' => $this->plan,
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
        $onboardDataId = OnboardData::where('user_id', auth()->user()->id)->first();
        if ($onboardDataId) {
            $this->validate([
                'fullsubdomain' => 'nullable|required_without:custom_domain|unique:tenants,domain|unique:onboard_data,domain,' . $onboardDataId->id,
            ]);
        }
        $this->validate([
            'fullsubdomain' => 'nullable|required_without:custom_domain|unique:tenants,domain',
            'custom_domain' => 'nullable|required_without:subdomain',
        ]);

        $this->activeStep = 4;
    }

    public function onboard()
    {
        $this->validate($this->firstStepRules);
        $this->validate($this->secondStepRules);

        $onboardDataId = OnboardData::where('user_id', auth()->user()->id)->first();

        if ($onboardDataId) {
            $this->validate([
                'fullsubdomain' => 'nullable|required_without:custom_domain|unique:tenants,domain|unique:onboard_data,domain,' . $onboardDataId->id,
            ]);
        }

        $this->validate([
            'billingCycle' => 'required|in:monthly,yearly',
            'fullsubdomain' => 'nullable|required_without:custom_domain|unique:tenants,domain',
            'custom_domain' => 'nullable|required_without:subdomain',
        ]);
        $onboardingData = session('onboarding_data');
        $plan = $this->selectedBusiness->plans()->where('slug', $onboardingData['step_one']['plan'])->first();
        $amount = $this->billingCycle == BillingCycleEnum::Monthly ? $plan->price_monthly : $plan->price_monthly;
        $newOnboardData = OnboardData::updateOrCreate([
            'user_id' => auth()->user()->id,
        ], [
            'user_id' => auth()->user()->id,
            'business_name' => $onboardingData['step_one']['business_name'],
            'business_slug' => $onboardingData['step_one']['business'],
            'location' => $onboardingData['step_one']['location'],
            'phone' => $onboardingData['step_one']['phone'],
            'contact_email' => $onboardingData['step_one']['email'],
            'theme_slug' => $onboardingData['step_two']['theme'],
            'plan_slug' => $onboardingData['step_one']['plan'],
            'billing_cycle'  => $this->billingCycle,
            'domain' => $this->fullsubdomain,
            'subtotal' => $amount,
            'total_amount' => $amount,
            'discount' => 0,
        ]);

        return $newOnboardData;
    }

    public function startFreeTrial()
    {
        $newOnboard = $this->onboard();
        $newOnboard->is_trial = true;
        $newOnboard->save();
        $onboardAction = new OnboardingAction();
        $onboardAction->OnboardNewTenant();
        return redirect()->route('platform.home');
    }

    public function checkout()
    {
        $this->onboard();
        $paymentAction = new PaymentAction();
        $this->payment_params = $paymentAction->initiatePayment();
        $this->dispatch('redirect-to-payment');
    }

    public function updatedSubdomain()
    {
        $subdomain = Tenant::where('domain', $this->subdomain . '.gridlayers.test')->first();
        $this->fullsubdomain = $this->subdomain . '.gridlayers.test';
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
