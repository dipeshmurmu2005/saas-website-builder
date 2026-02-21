<?php

namespace App\Livewire\Business\Tours;

use App\Models\Business\Tours\Page;
use App\Services\ThemeResolver;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $phone;
    public $message;
    public $page;

    public function mount()
    {
        $this->page = Page::where('page', 'contact')->first();
    }

    protected $rules = [
        'name' => 'required',
        'phone' => 'required|max:10',
    ];

    public function submit()
    {
        $key = 'contact-form-' . request()->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            $this->addError('rate_limit', "You are submitting too quickly. Please wait {$seconds} seconds.");
            return;
        }

        RateLimiter::hit($key, 60);

        $this->validate();

        Contact::create([
            'name' => $this->name,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        $this->reset();

        session()->flash('success', 'Your contact information has been submitted successfully!');
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('contact');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
