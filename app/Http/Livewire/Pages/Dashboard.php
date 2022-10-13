<?php

namespace App\Http\Livewire\Pages;

use App\Models\Finance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    protected $listeners = ['refreshFinances' => '$refresh'];
    public function render()
    {
        return view('livewire.pages.dashboard', [
            'finances' => Finance::query()
                                    ->where('user_id', Auth::user()->id)->paginate(2)
        ]);
    }
}
