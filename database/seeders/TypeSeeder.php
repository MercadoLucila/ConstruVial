<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            ['name' => 'Tractor','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Retroexcavadora','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Cargadora_Frontal','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Motoniveladora','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Rodillo_Aplanadora','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Asfaltadora','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Camion_Cisterna','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Camion_de_volteo','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Pala_y_Retroexcavadora','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Topadora','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
