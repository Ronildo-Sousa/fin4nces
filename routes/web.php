<?php

use App\Actions\Auth\AuthSocial;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Pages\Dashboard;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::get('/auth/{provider}', function (string $provider) {
    return Socialite::driver($provider)->redirect();
})->name('SocialRedirect');

Route::get('/{provider}/callback', function (string $provider) {
    if((new AuthSocial)->run($provider)){
        return redirect()->route('dashboard');
    }
    session()->flash('error', 'Could not authenticate this user');
    return redirect()->route('login');
})->name('Authsocial');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});
