<?php

namespace App\Http\Livewire\Pages;

use App\Actions\FinanceAmount;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class History extends Component
{
    protected $listeners = ['refreshFinances' => 'reload'];

    private array $financesArray = [];
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
     
        $this->financesArray = $financeData->toArray();
        
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
            'finances' => $this->financesArray,
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
        $this->financesArray = $financeData->toArray();
      
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

    public function search()
    {
        $this->refreshFinances();
    }
    public function reload()
    {
        return redirect()->route('history');
    }
}
