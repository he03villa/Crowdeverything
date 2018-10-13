<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class CiudadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create([
            'nombre' => 'Santa marta',
            'codigo' => '47',
            'departamentos_id' => '1',
        ]);
    }
}
