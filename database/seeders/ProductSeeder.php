<?php

namespace Database\Seeders;

use App\Models\Cycle;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(10)->create()->each(function ($product) {
            Cycle::factory()->create(['product_id' => $product->id]);
        });
    }
}
