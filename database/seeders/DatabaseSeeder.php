<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\NavigationItem;
use Illuminate\Database\Seeder;
use App\Models\PersonalInformation;
use App\Models\SocialLink;

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

        PersonalInformation::factory()->create();

        Project::factory(3)->create();

        SocialLink::factory()->create([
            'name' => 'Linkedin',
            'url' => 'https://www.linkedin.com/in/kevincisnero01',
            'icon' => 'fa-brands fa-linkedin'
        ]);

        SocialLink::factory()->create([
            'name' => 'Github',
            'url' => 'https://github.com/kevincisnero01',
            'icon' => 'fa-brands fa-github'
        ]);

    }
}
