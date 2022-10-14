<?php

namespace App\Http\Livewire\Pages;

use App\Models\Finance;
use App\Models\FinanceType;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    private LengthAwarePaginator $finances;
    private float $monthExpenses = 0.0;
    private float $monthIncomings = 0.0;
    private float $monthTotal = 0.0;

    protected $listeners = ['refreshFinances' => '$refresh'];

    public function mount()
    {
        $this->finances = Finance::query()
            ->where('user_id', Auth::user()->id)
            ->whereMonth('date', now()->month)
            ->orderBy('created_at', 'DESC')
            ->paginate(6);

        $this->monthExpenses = $this->getFinancesAmount(
            now()->month,
            'Expense',
            now()->year
        );

        $this->monthIncomings = $this->getFinancesAmount(
            now()->month,
            'Incoming',
            now()->year
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);
    }
    public function render()
    {
        return view('livewire.pages.dashboard', [
            'finances' => $this->finances,
            'monthExpenses' => $this->formatMoney($this->monthExpenses),
            'monthIncomings' => $this->formatMoney($this->monthIncomings),
            'monthTotal' => $this->formatMoney($this->monthTotal),
        ]);
    }

    private function formatMoney(float $number): string
    {
        return number_format($number, 2, ',');
    }

    private function getFinancesAmount(int $month, string $type, int $year)
    {
        $financeType = FinanceType::query()
            ->where('type', $type)
            ->first();
        
        $amount = Finance::query()
            ->where('user_id', Auth::user()->id)
            ->where('finance_type', $financeType->id)
            ->whereMonth('date', $month)
            ->whereYear('date', $year)
            ->sum('amount');

        return $amount / 1000;
    }
}
