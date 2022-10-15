<?php

namespace App\Http\Livewire\Pages;

use App\Models\Finance;
use Livewire\Component;

class ListItem extends Component
{
    public Finance $finance;
    public string $description;
    public int $finance_type;
    public string $amount;
    public string $date;

    protected $listeners = ['refreshFinances' => '$refresh'];

    public function mount()
    {
    }
    
    public function render()
    {
        return view('livewire.pages.list-item');
    }
}
