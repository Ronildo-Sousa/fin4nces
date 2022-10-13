<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Finance extends Model
{
    use HasFactory;

    protected function amount(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ($value * 1000),
            get: fn ($value) => number_format(($value / 1000),2,',')
        );
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y')
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function financeType(): BelongsTo
    {
        return $this->belongsTo(FinanceType::class);
    }
}
