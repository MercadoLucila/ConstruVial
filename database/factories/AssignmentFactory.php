<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WorkSite;
use App\Models\Machine;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-6 months', 'now');
        $endDate = $this->faker->optional()->dateTimeBetween($startDate, 'now');
        $endMotives = [
                'Trabajo completado',
                'Falla técnica',
                'Mantenimiento preventivo',
        ];

        return [
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate ? $endDate->format('Y-m-d') : null,
            'end_motive' => $this->faker->randomElement($endMotives),
            'kms' => $this->faker->numberBetween(50, 1000),
            'arrive_time' => $this->faker->optional()->time('H:i'),
            'worksite_id' => Worksite::factory(),
            'machine_id' => Machine::factory(),
        ];
    }
}
