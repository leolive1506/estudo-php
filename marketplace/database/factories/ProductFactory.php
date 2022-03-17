<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => Store::factory(),
            'name' => $this->faker->name(),
            'descriprion' => $this->faker->sentence(),
            'body' => $this->faker->paragraph(5, true),
            'price' => $this->faker->randomFloat(2, 1, 10),
            'slug' => $this->faker->slug()
        ];
    }
}
