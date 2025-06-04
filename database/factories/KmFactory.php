<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Machine;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Km>
 */
class KmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'km' => $this->faker->numberBetween(10, 300), 
            'machine_id' => Machine::factory(),
        ];
    }
}
