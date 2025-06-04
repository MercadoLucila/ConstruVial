<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkSite>
 */
class WorkSiteFactory extends Factory
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

         return [
            'name' => $this->faker->company . ' Construction Site',
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate ? $endDate->format('Y-m-d') : null,
            'province_id' => Province::inRandomOrder()->value('id'),
        ];
    }
}
