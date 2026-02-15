<?php

use App\Livewire\Business\Tours\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::livewire('/explore', function () {
    dd('hello');
})->name('explore');
Route::livewire('/packages/{slug}',  function () {
    dd('hello');
})->name('package.view');
Route::livewire('posts/{slug}',  function () {
    dd('hello');
})->name('post.view');
Route::livewire('about-us',  function () {
    dd('hello');
})->name('aboutus');
Route::livewire('destination/{slug}',  function () {
    dd('hello');
})->name('destination.view');
Route::livewire('country/{slug}', function () {
    dd('hello');
})->name('country.view');
Route::livewire('contact-us',  function () {
    dd('hello');
})->name('contact');
