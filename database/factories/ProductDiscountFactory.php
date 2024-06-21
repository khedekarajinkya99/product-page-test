<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductDiscount;

class ProductDiscountFactory extends Factory
{
    protected $model = ProductDiscount::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $products = Product::all()->random();

        return [
            'product_id' => $products->id,
            'type' => $this->faker->randomElement(['percent', 'amount']),
            'discount' => $this->faker->randomNumber(2)
        ];
    }
}
