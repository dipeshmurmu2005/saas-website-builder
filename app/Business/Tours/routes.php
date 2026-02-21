<?php

use App\Livewire\Business\Tours\About;
use App\Livewire\Business\Tours\Contact;
use App\Livewire\Business\Tours\CountryView;
use App\Livewire\Business\Tours\DestinationView;
use App\Livewire\Business\Tours\Explore;
use App\Livewire\Business\Tours\Home;
use App\Livewire\Business\Tours\PackageView;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::livewire('/explore', Explore::class)->name('explore');

Route::get('/packages/{slug}', PackageView::class)->name('package.view');

Route::livewire('posts/{slug}',  function () {
    dd('hello');
})->name('post.view');
Route::livewire('about-us',  About::class)->name('aboutus');
Route::livewire('destination/{slug}', DestinationView::class)->name('destination.view');
Route::livewire('country/{slug}', CountryView::class)->name('country.view');
Route::livewire('contact-us', Contact::class)->name('contact');
