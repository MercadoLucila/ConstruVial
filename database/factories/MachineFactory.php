<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Type;
use App\Models\Status;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'model' => $this->faker->unique()->word(),
            'serial_number' => strtoupper($this->faker->bothify('SN-####-??')),
            'actual_km' => $this->faker->numberBetween(0, 100000),
            'type_id' =>  Type::inRandomOrder()->value('id'),
            'status_id' => Status::inRandomOrder()->value('id'),
        ];
    }
}
