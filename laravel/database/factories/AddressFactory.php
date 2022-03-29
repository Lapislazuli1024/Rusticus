<?php

namespace Database\Factories;

use App\Models\Farmer;
use App\Models\Town;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'street' => $this->faker->streetName(),
            'house_number' => $this->faker->buildingNumber(),
            'farmer_id' => Farmer::factory(),
            'town_id' => Town::factory(),
        ];
    }
}
