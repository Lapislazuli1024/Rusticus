<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Käse Schaf',
            'stock_quantity' => 12.4,
            'description' => 'Schafskäse aus eigener produktion',
            'product_hint' => 'vegetarian',
            'image' => '/bilder/kaese.png',
            'price' => 2.50,
            'fk_user_id' => 1,
            'fk_sub_category_id' => 1,
            'fk_unit_of_measure_id' => 1
        ]);
    }
}
