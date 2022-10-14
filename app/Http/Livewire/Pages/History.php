<?php

namespace App\Http\Livewire\Pages;

use App\Actions\FinanceAmount;
use Livewire\Component;

class History extends Component
{
    private string $monthExpenses = '';
    private string $monthIncomings = '';
    private string $monthTotal = '';

    public int $currentMonth;
    public array $months;

    public function mount()
    {
        $this->currentMonth = now()->month - 1;

        $this->monthExpenses = (new FinanceAmount)->run(
            $this->currentMonth,
            now()->year,
            'Expense'
        );

        $this->monthIncomings = (new FinanceAmount)->run(
            $this->currentMonth,
            now()->year,
            'Incoming'
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);
    }

    public function render()
    {
        return view('livewire.pages.history', [
            'monthExpenses' => number_format($this->monthExpenses, 2, ','),
            'monthIncomings' => number_format($this->monthIncomings, 2, ','),
            'monthTotal' => number_format($this->monthTotal, 2, ','),
        ]);
    }
}
