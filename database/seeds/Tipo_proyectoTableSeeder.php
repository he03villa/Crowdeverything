<?php

use Illuminate\Database\Seeder;
use App\Tipo_proyecto;

class Tipo_proyectoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_proyecto::create([
            'nombre' => 'Social',
        ]);

        Tipo_proyecto::create([
            'nombre' => 'Educativo',
        ]);

        Tipo_proyecto::create([
            'nombre' => 'Innovacion',
        ]);
    }
}
