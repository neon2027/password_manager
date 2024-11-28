<?php

use App\Livewire\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function() {
    Route::view('login', 'pages.auth.login')->name('login');
});
