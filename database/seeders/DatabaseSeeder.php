<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ProvinceSeeder::class,
            StatusSeeder::class,
            TypeSeeder::class,
            KmSeeder::class,
            MaintenanceSeeder::class,
            WorkSiteSeeder::class,
            MachineSeeder::class,
            UserSeeder::class,
            AssignmentSeeder::class,
            ServiceSeeder::class, 
        ]);
    }
}
