<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\NavigationItem;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Kevin Dev',
            'email' => 'developer@gmail.com',
        ]);

        NavigationItem::factory()->create([
            'label' => 'Hola',
            'link' => '#hello'
        ]);

        NavigationItem::factory()->create([
            'label' => 'Proyectos',
            'link' => '#projects'
        ]);

        NavigationItem::factory()->create([
            'label' => 'Contacto',
            'link' => '#contact'
        ]);

    }
}
