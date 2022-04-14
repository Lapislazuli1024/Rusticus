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
    public function definition()
    {
        return [
            'name'=>$this->faker->name(),
            'stock_quantity'=>$this->faker->randomDigit(),
            'product_hint'=>'neither',
            'description'=>$this->faker->text(100),
            'price'=>$this->faker->randomFloat(2,0.1,1000),
            'user_id'=>1,
            'sub_category_id'=>1,
            'unit_of_measure_id'=>1,
            'image'=>'/pictures/products/product1.png'
        ];
    }
}
