<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('roles')->insert([
            ['name' => 'Administrator','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Machine_Operator','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Construction_Foreman','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name' => 'Visitor','created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);

    }
}
