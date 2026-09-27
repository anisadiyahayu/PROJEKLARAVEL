<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
// ===============
// CODINGAN MATERI
// ===============
/**
 * @extends Factory<Product>
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
            'category_id' => \App\Models\Category::inRandomOrder()->value('id'),
            'code' => fake()->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'name' => fake()->words(3, true),
            'unit' => fake()->randomElement(['pcs', 'kg', 'liter']),
            'price' => fake()->numberBetween(5000, 100000),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
