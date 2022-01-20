<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => rand(1,12)." MIPA ".rand(1,4),
            'teacher' => $this->faker->name(),
        ];
    }
}
