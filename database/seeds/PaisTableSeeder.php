<?php

use Illuminate\Database\Seeder;
use App\Pais;

class PaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pais::create([
            'nombre' => 'Colombia',
            'iso_2' => 'CO',
            'iso_3' => 'COL',
        ]);

        Pais::create([
            'nombre' => 'Argentina',
            'iso_2' => 'AR',
            'iso_3' => 'ARG',
        ]);
    }
}
