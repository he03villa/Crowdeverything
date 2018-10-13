<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => '' 
        ]);

        Role::create([
            'name' => 'Innovador',
            'slug' => 'innova',
            'description' => '' 
        ]);

        Role::create([
            'name' => 'Patrocinador',
            'slug' => 'patroci',
            'description' => '' 
        ]);

        Role::create([
            'name' => 'Evaluador',
            'slug' => 'evalu',
            'description' => '' 
        ]);
    }
}
