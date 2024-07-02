<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => '$50k/yr',
            'employer_id' => Employer::factory(),
        ];
    }

    public function unpaid(): static
    {
        return $this->state(fn (array $attributes) => [
            'salary' => 'Unpaid',
        ]);
    }
}
