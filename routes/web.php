<?php

use App\Http\Controllers\AuthController;
use App\Http\Livewire\Auth\Form;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Form::class);
Route::get('/{provider}/callback', Dashboard::class);
