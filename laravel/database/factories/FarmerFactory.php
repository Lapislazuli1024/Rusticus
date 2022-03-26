<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Webpage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farmer>
 */
class FarmerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       return [
        'fk_user_id' => User::factory(),
        'fk_webpage_id' => Webpage::factory(),
        ];
    }
}
