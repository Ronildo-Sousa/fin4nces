<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    protected $listeners = ['refreshFinances' => '$refresh'];
    public function render()
    {
        return view('livewire.pages.dashboard', [
            'finances' => Auth::user()->finances
        ]);
    }
}
