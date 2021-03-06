<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Webpage>
 */
class WebpageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => '/pictures/webpages/user.png',
            'title' => $this->faker->title(),
            'webpage_url' => 'www.startpage.com',
            'description' => $this->faker->text(),
        ];
    }
}
