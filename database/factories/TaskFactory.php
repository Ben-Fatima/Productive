<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->word(),
            "status" => $this->faker->randomElement(['doing','done'])
        ];
    }
}
