<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductImage;

class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;
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
            'path' => $this->faker->randomElement(['image-product-1', 'image-product-2', 'image-product-3', 'image-product-4'])
        ];
    }
}
