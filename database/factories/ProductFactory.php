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
            'title' => fake()->word(),
            'description' => fake()->realText(50),
            'color' => fake()->colorName(),
            'stock' => fake()->numberBetween(1, 10000),
            'price' => fake()->numberBetween(100000, 9999999)
        ];
    }
}
