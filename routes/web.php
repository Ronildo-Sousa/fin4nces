<?php


use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Register::class);
// Route::get('/{provider}/callback', Dashboard::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
