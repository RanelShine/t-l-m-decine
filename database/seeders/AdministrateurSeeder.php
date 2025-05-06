<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Support\Facades\DB;

class AdministrateurSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Administrateur::factory(50)->create();
    }
}
