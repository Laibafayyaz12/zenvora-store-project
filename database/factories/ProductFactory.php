<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'price' => fake()->numberBetween(500, 50000),
            'image' => 'default.jpg',
            'description' => fake()->sentence(),
            'category' => fake()->randomElement(['Makeup', 'Electronics', 'Fashion', 'Art', 'Accessories']),
        ];
    }
}