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
            'name' =>$this->faker->randomElement([
                "TV",
                "Phone",
                "Speaker",
                "Computer",
                "AirPots"
            ]),
            'description' =>$this->faker->paragraph,
            'price' => $this->faker->randomFloat(1, 20),
            'category_id' => rand(1, 5),
            'stock'=> $this->faker->randomFloat(1, 20, 200)
        ];
    }
}
