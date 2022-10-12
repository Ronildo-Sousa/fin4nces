<?php

namespace App\Http\Livewire\Finances;

use App\Models\Finance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public string $type = '';
    public string $date;
    public string $description = '';
    public float $amount = 0;

    public function mount()
    {
        $this->date = new Carbon();
    }

    public function render()
    {
        return view('livewire.finances.create');
    }

    public function save()
    {
        /** @var User $user */
        $user = Auth::user();
      
        $user->finances()
            ->create([
                'type' => $this->type,
                'date' => $this->date,
                'description' => $this->description,
                'amount' => $this->amount
            ]);
    }
}
