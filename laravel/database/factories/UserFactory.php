<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'surname'=>$this->faker->lastName(),
            'name'=>$this->faker->firstName(),
            'email'=>$this->faker->email(),
            'password'=>$this->faker->password(),
            'remember_token'=>$this->faker->text(5)
        ];
    }
}
