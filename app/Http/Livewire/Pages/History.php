<?php

namespace App\Http\Livewire\Pages;

use App\Actions\FinanceAmount;
use App\Models\Finance;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class History extends Component
{
    private string $monthExpenses = '';
    private string $monthIncomings = '';
    private string $monthTotal = '';

    public int $currentMonth;
    public int $currentYear;

    public function mount()
    {
        $this->currentMonth = now()->month - 1;
        $this->currentYear = now()->year;

        $this->monthExpenses = (new FinanceAmount)->run(
            $this->currentMonth,
            $this->currentYear,
            'Expense'
        );

        $this->monthIncomings = (new FinanceAmount)->run(
            $this->currentMonth,
            $this->currentYear,
            'Incoming'
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);
    }

    public function render()
    {
        return view('livewire.pages.history', [
            'finances' => Finance::query()->whereMonth('date', $this->currentMonth)->paginate(2),
            'monthExpenses' => number_format(floatval($this->monthExpenses), 2, ','),
            'monthIncomings' => number_format(floatval($this->monthIncomings), 2, ','),
            'monthTotal' => number_format(floatval($this->monthTotal), 2, ','),
        ]);
    }

    public function search()
    {
        $this->monthExpenses = (new FinanceAmount)->run(
            $this->currentMonth,
            $this->currentYear,
            'Expense'
        );

        $this->monthIncomings = (new FinanceAmount)->run(
            $this->currentMonth,
            $this->currentYear,
            'Incoming'
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);
    }
}
