<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('auth/{provider}', [AuthController::class, 'authRedirect'])->name('auth.redirect');
Route::get('/{provider}/callback', [AuthController::class, 'handleCallback'])->name('auth.callback');

// Route::get('/auth/redirect', function () {
//     return Socialite::driver('github')->redirect();
// });

// Route::get('/github/callback', function () {
//     $user = Socialite::driver('github')->user();
 
//     dd($user);
// });
