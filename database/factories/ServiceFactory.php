<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Maintenance;
use App\Models\Machine;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $motives = [
            'Cambio de aceite requerido por kilometraje',
            'Cambio de filtro de aceite por kilometraje',
            'Cambio de filtro de aire por kilometraje',
            'Cambio de bujías por kilometraje',
            'Revisión del sistema de frenos por kilometraje',
            'Revisión del sistema de suspensión por kilometraje',
            'Cambio de correa de distribución por kilometraje',
            'Revisión del sistema de transmisión por kilometraje',
            'Cambio de rueda requerido por kilometraje',
            'Rotación de neumáticos programada',
            'Fallo en el sistema de frenos',
            'Averiada en funcionamiento',
            'Fuga de aceite detectada',
            'Sobrecalentamiento del motor',
            'Ruidos anómalos en el motor',
            'Falla en sistema eléctrico',
            'Batería agotada o defectuosa',
            'Pérdida de potencia del motor',
            'Desgaste irregular de neumáticos',
            'Problemas en la caja de cambios',
            'Vibración excesiva al conducir',
            'Revisión programada',
            'Mantenimiento general preventivo',
            'Inspección post-servicio',
            'Revisión de niveles de fluidos',
            'Ajuste del sistema de dirección',
            'Chequeo de luces y señales',
            'Verificación de alineación y balanceo',
        ];

        return [
            'service_date' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'service_motive' => $this->faker->randomElement($motives),
            'maintenance_id' => Maintenance::inRandomOrder()->first()->id ?? Maintenance::factory(),
            'machine_id' => Machine::inRandomOrder()->first()->id ?? Machine::factory(),
        ];
    }
}
