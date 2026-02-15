<?php

use Livewire\Component;
use App\Models\{Page, Banner};
new class extends Component {
    public $banners;
    public $page;
    public function mount()
    {
        $this->page = Page::where('page', 'home')->first();
        $this->banners = Banner::latest()->where('status', true)->get();
    }
};
?>

<div>
    @section('seo')
        {{-- <x-seo :seo="$this->page" /> --}}
    @endsection
    <x-business.tours.modern.home.hero />
    <livewire:business.tours.modern.home.featured-section />
    {{-- <livewire:business.tours.modern.home.deals-section />
    <livewire:business.tours.modern.home.testimonial-section />
    <livewire:business.tours.modern.home.benefits-section />
    <livewire:business.tours.modern.home.featured-countries /> --}}
</div>
