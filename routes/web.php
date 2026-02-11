<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\LoginWire;
use App\Livewire\Onboarding;
use App\Livewire\ProductViewWire;

Route::livewire('/', Home::class)->name('platform.home');
Route::livewire('/product/{slug}', ProductViewWire::class)->name('platform.product');
Route::get('/onboarding', Onboarding::class)
    ->middleware('platformauth')
    ->name('platform.onboarding')->fallback(fn() => redirect()->route('platform.home'));
Route::livewire('login', LoginWire::class)->name('platform.login');


Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('platform.social.redirect');

Route::get('/auth/google/callback', [AuthController::class, 'callback'])->name('platform.social.callback');
