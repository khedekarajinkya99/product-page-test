<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(7, true),
            'description' => $this->faker->sentence(45),
            'slug' => $this->faker->unique()->words(5, true),
            'price' => $this->faker->randomNumber(4, true),
            'active' => $this->faker->boolean()
        ];
    }
}
