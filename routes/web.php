<?php

use App\Actions\Auth\AuthSocial;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Pages\Dashboard;
use App\Http\Livewire\Pages\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Arr;

#region Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    

    Route::get('/auth/{provider}', function (string $provider) {
        $providers = ['github', 'google'];
        if (in_array($provider, $providers)) {
            return Socialite::driver($provider)->redirect();
        }
        return redirect()->back();
    })->name('SocialRedirect');

    Route::get('/{provider}/callback', function (string $provider) {
        if ((new AuthSocial)->run($provider)) {
            return redirect()->route('dashboard');
        }
        session()->flash('error', 'Could not authenticate this user');
        return redirect()->route('login');
    })->name('Authsocial');
});
#endregion


#region Auth routes
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', function(){
        Auth::logout();
        return redirect()->route('login');
    })->name('logout');

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/history', History::class)->name('history');
});
#endregion