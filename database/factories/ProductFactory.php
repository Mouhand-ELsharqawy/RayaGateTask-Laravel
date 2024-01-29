<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Name' => fake()->word(),
            'Price' => fake()->randomDigitNotZero(50,1000),
            'Quantity' => fake()->randomDigitNotZero(50,1000),
            'Description' => fake()->sentence()
        ];
    }
}
