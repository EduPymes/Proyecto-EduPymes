<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@edupymes.cl',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'phone' => '+56987654321',
            'description' => 'Administrador del sistema EduPymes'
        ]);

        // Usuario Pyme de ejemplo
        User::create([
            'name' => 'Emprendedor Ejemplo',
            'email' => 'pyme@edupymes.cl',
            'password' => Hash::make('password123'),
            'role' => 'pyme',
            'phone' => '+56912345678',
            'description' => 'Emprendedor estudiantil con productos innovadores'
        ]);

        // Usuario normal
        User::create([
            'name' => 'Cliente Ejemplo',
            'email' => 'cliente@edupymes.cl',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'phone' => '+56955555555',
            'description' => 'Cliente interesado en productos estudiantiles'
        ]);
    }
}