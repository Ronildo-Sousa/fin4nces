<?php

namespace App\Http\Livewire\Finances;

use App\Models\Finance;
use Livewire\Component;

class Destroy extends Component
{
    public Finance $finance;

    public function destroy()
    {
        $this->finance->delete();
        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.finances.destroy');
    }
}
