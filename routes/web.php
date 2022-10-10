<?php


use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Register::class);
Route::get('/{provider}/callback', Dashboard::class);
