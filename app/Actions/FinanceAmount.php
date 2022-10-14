<?php

namespace App\Actions;

use App\Models\Finance;
use App\Models\FinanceType;
use Illuminate\Support\Facades\Auth;

class FinanceAmount
{
    public function run(int $month, int $year, string $type)
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
