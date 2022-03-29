<?php

namespace Database\Factories;

use App\Models\Main_category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sub_category>
 */
class Sub_categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->word(),
            'main_category_id' => Main_category::factory()
        ];
    }
}
