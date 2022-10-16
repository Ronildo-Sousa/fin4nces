<?php

namespace App\Http\Livewire\Pages;

use App\Actions\FinanceAmount;
use App\Models\Finance;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class History extends Component
{
    protected $listeners = ['refreshFinances' => 'reload'];

    public array $finances = [];
    private string $monthExpenses = '';
    private string $monthIncomings = '';
    private string $monthTotal = '';

    public int $currentMonth;
    public int $currentYear;

    public function mount()
    {
        $Finance = new FinanceAmount;

        $this->currentMonth = now()->month - 1;
        $this->currentYear = now()->year;

        $financeData = $Finance->GetFinances(
            $this->currentMonth,
            $this->currentYear,
            true
        );
     
        $this->finances = $financeData->toArray();
        
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
            // 'finances' => $this->finances,
            'monthExpenses' => number_format(floatval($this->monthExpenses), 2, ','),
            'monthIncomings' => number_format(floatval($this->monthIncomings), 2, ','),
            'monthTotal' => number_format(floatval($this->monthTotal), 2, ','),
        ]);
    }

    private function refreshFinances()
    {
        $Finance = new FinanceAmount;

        $financeData = $Finance->GetFinances(
            $this->currentMonth,
            $this->currentYear,
            true
        );
        // $this->finances = [];
        $this->finances = $financeData->toArray();
      
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

    public function destroy(int $ItemId)
    {
        Finance::find($ItemId)->delete();
        $this->reload();
    }

    public function search()
    {
        $this->refreshFinances();
    }
    public function reload()
    {
        return redirect()->route('history');
    }
}
