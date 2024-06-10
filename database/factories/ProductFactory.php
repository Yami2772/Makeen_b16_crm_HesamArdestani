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
            'ProductsName' => fake()->lexify(),
            'Seller' => fake()->firstName(),
            'Price' => fake()->randomNumber(8, false),
            'Inventory' => fake()->randomNumber(5, true),
            'image_path' => fake()->mimeType(),
        ];
    }
}
