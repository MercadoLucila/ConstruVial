<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('users')->insert([
            'name' => 'Lucila mercado ruiz',                     
            'email' => 'mercadoruizlucila@gmail.com',      
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), 
            'role_id' => 1,                        
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
