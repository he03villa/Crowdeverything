<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            Tipo_documentoTableSeeder::class,
            PaisTableSeeder::class,
            DepartamentoTableSeeder::class,
            CiudadTableSeeder::class,
            PermissionsHasRolesTableSeeder::Class,
            Redes_socialTableSeeder::Class,
            Tipo_recursoTableSeeder::Class,
            Tipo_proyectoTableSeeder::Class,
        ]);
    }
}
