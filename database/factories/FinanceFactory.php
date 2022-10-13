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

        return [
            'description' => fake()->sentence(4),
            'date' => fake()->date(),
            'amount' => rand(1, 999),
            'finance_type' => $rand
        ];
    }
}
