<?php

namespace App\Livewire\Business\Tours;

use App\Models\Business\Tours\Banner;
use App\Models\Business\Tours\Page;
use App\Services\ThemeResolver;
use Livewire\Component;

class Home extends Component
{

    public $banners;
    public $page;
    public function mount()
    {
        $this->page = Page::where('page', 'home')->first();
        $this->banners = Banner::latest()->where('status', true)->get();
    }

    public function render()
    {
        $themeResolver = ThemeResolver::page('home');
        return view($themeResolver)
            ->layout(ThemeResolver::layout('app'));
    }
}
