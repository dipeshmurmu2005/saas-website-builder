<?php

use Livewire\Component;
use App\Models\Business\Tours\Banner;
new class extends Component {
    public $banners_count;

    public function mount()
    {
        $this->banners_count = Banner::latest()->where('status', true)->count();
    }
};
?>

<div class="absolute top-0 md:top-5 left-0 w-full z-50 lg:px-24 2xl:px-32">
    <div class="{{ url()->current() == route('home') ? 'p-8' : 'py-5' }} justify-between items-center hidden md:flex">
        <a href="{{ route('home') }}">
            <div class="logo lg:h-10 2xl:h-12 w-fit {{ url()->current() == route('home') ? 'invert' : '' }}">
                {{-- <img src="{{ settings('logo') ? Storage::url(settings('logo')) : null }}" alt=""
                    class="h-full w-full object-contain"> --}}
            </div>
        </a>
        <div
            class="{{ url()->current() == route('home') ? 'text-white' : 'text-black' }} flex gap-8 lg:text-xs 2xl:text-sm items-center">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('explore') }}">Tours/Packages</a>
            <a href="{{ route('aboutus') }}">About Us</a>
        </div>
        <div>
            <a href="{{ route('contact') }}">
                <button
                    class="btn rounded-full lg:h-8 2xl:h-10 lg:text-[0.6rem] 2xl:text-xs 2xl:btn-md lg:btn-sm  {{ url()->current() == route('home') ? 'border  border-gray-100' : 'btn-primary' }}">Contact
                    Now</button>
            </a>
        </div>
    </div>
    <div class="w-full md:hidden">
        <div class="p-5 flex justify-between items-center md:hidden">
            <a href="{{ route('home') }}">
                <div class="logo h-10 w-fit {{ url()->current() == route('home') ? 'invert' : '' }}">
                    {{-- <img src="{{ settings('logo') ? Storage::url(settings('logo')) : null }}" alt=""
                        class="h-full w-full object-contain"> --}}
                </div>
            </a>
            <button @click="mobile_drawer.checked=true" class="btn btn-square rounded-lg"><x-heroicon-m-bars-3
                    class="h-4 w-4" /></button>
        </div>
        <div class="drawer">
            <input id="mobile_drawer" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content">
                <!-- Page content here -->
            </div>
            <div class="drawer-side">
                <label for="mobile_drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu bg-base-200 min-h-full w-80 p-4">
                    <!-- Sidebar content here -->
                    <li><a>Sidebar Item 1</a></li>
                    <li><a>Sidebar Item 2</a></li>
                </ul>
            </div>
        </div>
    </div>
    @if (request()->routeIs('explore'))
        <div class="justify-center">
            <livewire:search-filter />
        </div>
    @endif
</div>
