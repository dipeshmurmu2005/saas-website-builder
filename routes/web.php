<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Onboarding;
use App\Livewire\ProductViewWire;

Route::livewire('/', Home::class)->name('platform.home');
Route::livewire('/product/{slug}', ProductViewWire::class)->name('platform.product');
Route::get('/onboarding', Onboarding::class)->name('platform.onboarding')->fallback(fn() => redirect()->route('platform.home'));
