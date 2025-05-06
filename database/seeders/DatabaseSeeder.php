<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // * Enregistrement de mon RoleSeeder 
        $this->call([
            RoleSeeder::class,
        ]);
        $this->call([
            AdministrateurSeeder::class,
        ]);
    }



}
