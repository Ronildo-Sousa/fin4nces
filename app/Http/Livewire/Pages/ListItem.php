<?php

namespace App\Http\Livewire\Pages;

use App\Models\Finance;
use Livewire\Component;

class ListItem extends Component
{
    public Finance $finance;

    protected $listeners = ['refreshFinances' => '$refresh'];
    
    public function render()
    {
        return view('livewire.pages.list-item');
    }
}
