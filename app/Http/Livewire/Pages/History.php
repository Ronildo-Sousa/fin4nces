<?php

namespace App\Http\Livewire\Pages;

use App\Actions\FinanceAmount;
use App\Models\Finance;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

class History extends Component
{
    protected $listeners = ['refreshFinances' => '$refresh'];

    private LengthAwarePaginator $finances;
    private string $monthExpenses = '';
    private string $monthIncomings = '';
    private string $monthTotal = '';

    public int $currentMonth;
    public int $currentYear;

    public function mount()
    {
        $Finance = new FinanceAmount;

        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;

        $this->finances = $Finance->GetFinances(
            $this->currentMonth,
            $this->currentYear
        );
        
        $this->monthExpenses = $Finance->GetAmount(
            $this->currentMonth,
            $this->currentYear,
            'Expense'
        );

        $this->monthIncomings = $Finance->GetAmount(
            $this->currentMonth,
            $this->currentYear,
            'Incoming'
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);
    }

    public function render()
    {
        return view('livewire.pages.history', [
            'finances' => $this->finances,
            'monthExpenses' => number_format(floatval($this->monthExpenses), 2, ','),
            'monthIncomings' => number_format(floatval($this->monthIncomings), 2, ','),
            'monthTotal' => number_format(floatval($this->monthTotal), 2, ','),
        ]);
    }

    public function search()
    {
        $Finance = new FinanceAmount;

        $this->finances = $Finance->GetFinances(
            $this->currentMonth,
            $this->currentYear
        );
        
        $this->monthExpenses = $Finance->GetAmount(
            $this->currentMonth,
            $this->currentYear,
            'Expense'
        );

        $this->monthIncomings = $Finance->GetAmount(
            $this->currentMonth,
            $this->currentYear,
            'Incoming'
        );

        $this->monthTotal = ($this->monthIncomings - $this->monthExpenses);

        // $this->emit('refreshFinances');
    }
}
