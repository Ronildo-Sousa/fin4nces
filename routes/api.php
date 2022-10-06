<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/auth/{provider}', [AuthController::class, 'authRedirect'])->name('auth.redirect');
Route::get('/{provider}/callback', [AuthController::class, 'authRgister'])->name('auth.register');
