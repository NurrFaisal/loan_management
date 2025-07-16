<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Member;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'nid' => $this->faker->unique()->numerify('###########'),
            'phone' => $this->faker->unique()->phoneNumber(),
            'address' => $this->faker->address(),
            'photo' => null,
            'somitee_id' => null,
            'day_id' => null,
        ];
    }
}