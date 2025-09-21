<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
public function run()
{
    $users = User::where('role', 'pyme')->get();
    
    $categories = ['Tecnología', 'Ropa', 'Comida', 'Artesanía', 'Servicios'];
    
    foreach ($users as $user) {
        for ($i = 0; $i < 5; $i++) {
            Product::create([
                'user_id' => $user->id,
                'name' => 'Producto ' . ($i + 1) . ' de ' . $user->name,
                'description' => 'Descripción del producto ' . ($i + 1),
                'price' => rand(1000, 50000),
                'category' => $categories[array_rand($categories)],
                'is_active' => true
            ]);
        }
    }
}
}
