<?php

use Illuminate\Database\Seeder;
use App\Tipo_recurso;

class Tipo_recursoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_recurso::create([
            'nombre' => 'Financiero'
        ]);

        Tipo_recurso::create([
            'nombre' => 'Materia prima'
        ]);

        Tipo_recurso::create([
            'nombre' => 'Talento humano'
        ]);
    }
}
