<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\ProductViewWire;

Route::livewire('/', Home::class)->name('platform.home');
Route::livewire('/product', ProductViewWire::class);
