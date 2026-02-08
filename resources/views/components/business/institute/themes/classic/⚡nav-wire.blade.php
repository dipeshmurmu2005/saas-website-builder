<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div>
    <div class="bg-primary p-3 px-32 flex justify-between items-center">
        <div class="text-white flex gap-5 items-center">
            <a href="#"><x-fab-facebook-f class="2xl:h-4 2xl:w-4" /></a>
            <a href="#"><x-fab-instagram class="2xl:h-4 2xl:w-4" /></a>
            <a href="#"><x-fab-twitter class="2xl:h-4 2xl:w-4" /></a>
        </div>
        <div class="flex gap-10 items-center">
            <div class="flex gap-1 items-center text-sm text-white font-semibold">
                <x-heroicon-m-map-pin class="2xl:h-4 2xl:w-4 text-white" />
                <span>Birtamode 1 Jhapa, Nepal</span>
            </div>
            <div class="flex gap-1 items-center text-sm text-white font-semibold">
                <x-heroicon-m-phone class="2xl:h-4 2xl:w-4 text-white" />
                <span>+977-9843824890</span>
            </div>
        </div>
    </div>
    <div class="px-32 py-5 flex justify-between items-center">
        <div class="flex gap-4 items-center">
            <div class="h-12 w-fit">
                <img src="https://paaila.edu.np/logo/PAAILA_LOGO-01.png" alt=""
                    class="h-full w-full object-contain">
            </div>
            {{-- <div>
                <h2 class="font-bold text-lg">Paila Institute & Consultancy</h2>
                <p class="text-sm">Learn with Love, Grow with God</p>
            </div> --}}
        </div>
        <div class="flex gap-20 items-center">
            <div class="flex gap-2 items-center">
                <div
                    class="bg-primary rounded-full rounded-tl-none h-12 w-12 flex justify-center items-center text-white">
                    <x-heroicon-m-envelope class="h-5 w-5" />
                </div>
                <div>
                    <h2 class="font-bold font-jakarta">Connect With Us</h2>
                    <h4 class="text-sm text-black/50">contact@paila.com</h4>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <div
                    class="bg-primary rounded-full rounded-tl-none h-12 w-12 flex justify-center items-center text-white">
                    <x-heroicon-m-phone-arrow-up-right class="h-5 w-5" />
                </div>
                <div>
                    <h2 class="font-bold font-jakarta">Call for Enquiry</h2>
                    <h4 class="text-sm text-black/50">+977-9815937651</h4>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <div
                    class="bg-primary rounded-full rounded-tl-none h-12 w-12 flex justify-center items-center text-white">
                    <x-heroicon-m-clock class="h-5 w-5" />
                </div>
                <div>
                    <h2 class="font-bold font-jakarta">Opening Hours</h2>
                    <h4 class="text-sm text-black/50">Mon - Sun : 09:00 AM - 05:00 PM</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="px-32 p-5 border-y border-black/5 flex justify-between items-center">
        <div class="flex gap-10 items-center text-sm font-medium">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Services</a>
            <a href="#">Classes</a>
        </div>
    </div>
</div>
