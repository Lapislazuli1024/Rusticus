<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sessioncart;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Session_has_product>
 */
class Session_has_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1, 100),
            'fk_sessioncart_id' => Sessioncart::factory(),
            'fk_product_id' => Product::factory(),
        ];
    }
}
