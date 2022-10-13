<?php

namespace App\Http\Livewire\Finances;

use App\Models\FinanceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Create extends ModalComponent
{
    public ?int $finance_type = 1;
    public string $date = '';
    public string $description = '';
    public ?float $amount = null;

    protected $rules = [
        'finance_type' => ['required', 'exists:finance_types,id'],
        'date' => ['required', 'date'],
        'description' => ['required'],
        'amount' => ['required', 'numeric', 'min:0.1'],
    ];


    public function render()
    {
        return view('livewire.finances.create', [
            'financeTypes' => FinanceType::all()
        ]);
    }

    public function save()
    {
        $this->validate();
     
        /** @var User $user */
        $user = Auth::user();
      
        $user->finances()
            ->create([
                'finance_type' => $this->finance_type,
                'date' => $this->date,
                'description' => $this->description,
                'amount' => $this->amount
            ]);
        $this->closeModal();
        $this->emit('refreshFinances');
        return redirect()->route('dashboard');
    }
}
