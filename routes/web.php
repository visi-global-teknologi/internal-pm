<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes(['register' => false]);
Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('profile/{uuid}', [App\Http\Controllers\HomeController::class, 'profileEdit'])->name('profile.edit');
