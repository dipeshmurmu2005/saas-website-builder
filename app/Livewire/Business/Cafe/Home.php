<?php

namespace App\Livewire\Business\Cafe;

use App\Services\ThemeResolver;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $themeResolver = ThemeResolver::page('home');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }

    public function callMe()
    {
        dd('d');
    }
}
