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
            'category_id' => Category::factory(),
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, max: 9999),
            'image' => strtolower(str_replace(' ','',$this->faker->name)).'.jpg'
        ];
    }
}
