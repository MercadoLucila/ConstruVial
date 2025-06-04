<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert([
            ['name' => 'Buenos Aires','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Catamarca','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Chaco','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Chubut','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Córdoba','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Corrientes','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Entre Ríos','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Formosa','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Jujuy','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'La Pampa','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'La Rioja','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Mendoza','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Neuquén','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Río Negro','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Misiones','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Salta','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'San Juan','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'San Luis','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Santa Cruz','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Santa Fe','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Santiago del Estero','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Tierra del Fuego','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Tucumán','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Ciudad Autónoma de Buenos Aires','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}