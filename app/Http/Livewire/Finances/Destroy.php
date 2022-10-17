<?php

namespace App\Http\Livewire\Finances;

use App\Models\Finance;
use Livewire\Component;

class Destroy extends Component
{
    protected $listeners = ['delete'=>'destroy'];

    public int $financeId;

    public function destroy(int $id)
    {
        Finance::query()->find($id)->delete();

        $this->emit('refreshFinances');
    }

    public function destroyConfirm(int $id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure ?',
            'text' => '',
            'id' => $id
        ]); 
    }
    public function render()
    {
        return view('livewire.finances.destroy');
    }
}
