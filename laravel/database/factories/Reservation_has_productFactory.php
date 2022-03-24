<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation_has_product>
 */
class Reservation_has_productFactory extends Factory
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
            'pickup_date' => $this->faker->date(),
            'fk_product_id' => Product::factory(),
            'fk_reservation_id' => Reservation::factory(),
        ];
    }
}
