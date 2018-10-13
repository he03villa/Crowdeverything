<?php

use Illuminate\Database\Seeder;
use App\Tipo_documento;

class Tipo_documentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tipo_documento::create([
            'nombre' => 'Cedula',
        ]);

        Tipo_documento::create([
            'nombre' => 'Tarjeta de identidan',
        ]);
    }
}
