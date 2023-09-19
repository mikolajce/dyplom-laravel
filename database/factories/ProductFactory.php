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
            'name' => ucfirst($this->faker->word),
            'manufacturer' => $this->faker->company,
            'price' => $this->faker->randomNumber(4, false) .'.99',
            'stock' => $this->faker->randomDigit()
        ];
    }
}
