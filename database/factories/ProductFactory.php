<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            'name' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1),
            'category_id' => Category::find(rand(1, 2)),
            'price' => $this->faker->randomFloat(2, 1, 1500),
            'status' => $this->faker->randomElement(['on_sale', 'standard']),
            'visibility' => $this->faker->randomElement(['publish', 'unpublished']),
            'reference' => $this->faker->regexify('[a-zA-Z0-9]{16}')
        ];
    }
}
