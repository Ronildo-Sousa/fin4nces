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

        $this->monthExpenses = (new FinanceAmount)->run(
            now()->month,
            now()->year,
            'Expense'
        );

        $this->monthIncomings = (new FinanceAmount)->run(
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
            'monthExpenses' => $this->formatMoney($this->monthExpenses),
            'monthIncomings' => $this->formatMoney($this->monthIncomings),
            'monthTotal' => $this->formatMoney($this->monthTotal),
        ]);
    }

    private function formatMoney(float $number): string
    {
        return number_format($number, 2, ',');
    }
}
