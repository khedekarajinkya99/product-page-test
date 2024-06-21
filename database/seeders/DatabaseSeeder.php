<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(2)->create();
        \App\Models\ProductImage::factory(7)->create();
        \App\Models\ProductDiscount::factory(2)->create();
    }
}
