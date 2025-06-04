<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'Disponible','description' => 'La maquinaria está libre y lista para ser asignada.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'En uso','description' => 'La maquinaria actualmente está asignada a una obra.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'En mantenimiento','description' => 'La maquinaria está siendo revisada o reparada.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Deshabilitada','description' => 'La maquinaria está fuera de servicio y no se puede utilizar.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'En camino','description' => 'La maquinaria está en traslado hacia una obra.','created_at' => Carbon::now(),'updated_at' => Carbon::now()],

        ]);
    }
}


