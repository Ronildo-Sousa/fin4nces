<?php

namespace App\Http\Livewire\Finances;

use App\Models\Finance;
use Livewire\Component;

class Destroy extends Component
{
    public int $financeId;

    public function destroy()
    {
        Finance::query()->find($this->financeId)->delete();

        $this->emit('refreshFinances');
    }
    public function render()
    {
        return view('livewire.finances.destroy');
    }
}
