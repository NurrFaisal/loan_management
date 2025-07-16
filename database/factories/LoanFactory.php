<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Loan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => null,
            'somitee_id' => null,
            'loan_amount' => $this->faker->randomFloat(2, 100, 10000),
            'loan_purpose' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'completed']),
            'day_id' => null,
        ];
    }
}