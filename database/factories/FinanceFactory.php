<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Finance>
 */
class FinanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand = rand(1,2);
        $randomDate = rand(0,1);
        $dates = ["2022-10-27", "2022-09-27"];
        return [
            'description' => fake()->sentence(4),
            'date' => $dates[$randomDate],
            'amount' => rand(1, 999),
            'finance_type' => $rand
        ];
    }
}
