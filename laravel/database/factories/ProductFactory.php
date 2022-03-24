<?php

namespace Database\Factories;

use App\Models\Sub_category;
use App\Models\Unit_of_measure;
use App\Models\User;
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
            'name' => $this->faker->word(),
            'stock_quantity' => $this->faker->randomFloat(2,0,100),
            'description' => $this->faker->text(),
            'product_hint' => 'vegan',
            'image' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2,1,1000),
            'fk_user_id' => User::factory(),
            'fk_sub_category_id' => Sub_category::factory(),
            'fk_unit_of_measure_id' => Unit_of_measure::factory(),
            ];
    }
}
