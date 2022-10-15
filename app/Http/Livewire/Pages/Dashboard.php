<?php

namespace App\Http\Livewire\Pages;

use App\Actions\FinanceAmount;
use App\Models\Finance;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    private LengthAwarePaginator $finances;
    private string $monthExpenses = '';
    private string $monthIncomings = '';
    private string $monthTotal = '';

    protected $listeners = ['refreshFinances' => '$refresh'];

    public function mount()
    {
        $Finance = new FinanceAmount;

        $this->finances = $Finance->GetFinances(
            now()->month,
            now()->year
        );

        $this->monthExpenses = $Finance->GetAmount(
            now()->month,
            now()->year,
            'Expense'
        );

        $this->monthIncomings = $Finance->GetAmount(
            now()->month,
            now()->year,
            'Incoming'
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);
    }
    public function render()
    {
        return view('livewire.pages.dashboard', [
            'finances' => $this->finances,
            'monthExpenses' => number_format($this->monthExpenses, 2, ','),
            'monthIncomings' => number_format($this->monthIncomings, 2, ','),
            'monthTotal' => number_format($this->monthTotal, 2, ','),
        ]);
    }
}
