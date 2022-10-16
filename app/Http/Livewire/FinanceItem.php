<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FinanceItem extends Component
{
    public int $financeId;

    public string $description = '';
    public string $financeType = '';
    public string $amount = '';
    public string $date = '';

    public function render()
    {
        return view('livewire.finance-item');
    }
}
