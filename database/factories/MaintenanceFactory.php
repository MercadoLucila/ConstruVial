<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $maintenances = [
            ['name' => 'Cambio de aceite de motor', 'kms_needed' => 10000],
            ['name' => 'Cambio de filtro de aceite', 'kms_needed' => 10000],
            ['name' => 'Cambio de filtro de aire', 'kms_needed' => 15000],
            ['name' => 'Cambio de bujías', 'kms_needed' => 20000],
            ['name' => 'Cambio de correa de distribución', 'kms_needed' => 60000],
            ['name' => 'Revisión de frenos', 'kms_needed' => 10000],
            ['name' => 'Alineación y balanceo', 'kms_needed' => 15000],
            ['name' => 'Cambio de líquido refrigerante', 'kms_needed' => 40000],
            ['name' => 'Cambio de batería', 'kms_needed' => 50000],
            ['name' => 'Revisión general', 'kms_needed' => 5000],
        ];

        $item = $this->faker->unique()->randomElement($maintenances);

        return [
            'name' => $item['name'],
            'kms_needed' => $item['kms_needed']
        ];
    }
}
