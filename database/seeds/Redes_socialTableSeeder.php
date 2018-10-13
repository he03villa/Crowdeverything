<?php

use Illuminate\Database\Seeder;
use App\Redes_social;

class Redes_socialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Redes_social::create([
            'nombre' => 'Facebook'
        ]);

        Redes_social::create([
            'nombre' => 'Instragran'
        ]);

        Redes_social::create([
            'nombre' => 'Twitter'
        ]);
    }
}
