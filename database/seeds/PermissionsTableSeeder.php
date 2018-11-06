<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario
        Permission::create([
            'name' => 'Pefil de usuario',
            'slug' => 'user.perfil',
            'description' => 'Esta accion le permite a un usuario poder modificar sus datos'
        ]);

        Permission::create([
            'name' => 'Editar',
            'slug' => 'user.edit',
            'description' => 'Esta accion le permite a un usuario poder modificar sus datos'
        ]);

        Permission::create([
            'name' => 'Modificar usuario',
            'slug' => 'user.update',
            'description' => 'Esta accion le permite a un usuario poder modificar sus datos'
        ]);
        
        //Innovador
        Permission::create([
            'name' => 'Lista proyecto',
            'slug' => 'inno.index',
            'description' => 'Esta accion le permite al innovador ver los proyecto que el mismo aya creado'
        ]);

        Permission::create([
            'name' => 'Detalle del proyecto',
            'slug' => 'inno.show',
            'description' => 'Esta accion le permite al innovador ver los detalles proyecto que el mismo aya creado'
        ]);
        
        Permission::create([
            'name' => 'Editar proyecto',
            'slug' => 'inno.edit',
            'description' => 'Esta accion le permite al innovador poder editar datos del proyecto que el mismo aya creado'
        ]);

        Permission::create([
            'name' => 'Modificar proyecto',
            'slug' => 'inno.update',
            'description' => 'Esta accion le permite al innovador poder modificar datos del proyecto que el mismo aya creado'
        ]);

        Permission::create([
            'name' => 'Eliminar proyecto',
            'slug' => 'inno.logico',
            'description' => 'Esta accion le permite al innovador poder modificar el estado del proyecto del proyecto que el mismo aya creado'
        ]);

        Permission::create([
            'name' => 'Registrar proyecto',
            'slug' => 'inno.create',
            'description' => 'Esta accion le permite al innovador registrar un proyecto'
        ]);
        
        Permission::create([
            'name' => 'Crear proyecto',
            'slug' => 'inno.store',
            'description' => 'Esta accion le permite al innovador registrar un proyecto'
        ]);

        Permission::create([
            'name' => 'Crear recurso',
            'slug' => 'recur.store',
            'description' => 'Esta accion le permite al innovador registrar un nuevo recurso'
        ]);

        //Patrocinador
        Permission::create([
            'name' => 'Donar',
            'slug' => 'pat.store',
            'description' => 'Esta accion le permite al patrocinador registrar la donacion de un proyecto'
        ]);

        //Evaluador
        Permission::create([
            'name' => 'Lista de proyecto',
            'slug' => 'eva.index',
            'description' => 'Esta accion le permite al evadulador ver todos los proyecto que estan registrados con la condicion que el proyecto no este publicado'
        ]);

        Permission::create([
            'name' => 'Detalle del proyecto',
            'slug' => 'eva.show',
            'description' => 'Esta accion le permite al evaluador ver los detalles proyecto'
        ]);

        Permission::create([
            'name' => 'Publicar',
            'slug' => 'eva.update',
            'description' => 'Esta accion le permite al evaluador cambiar el estado de del proyecto'
        ]);
        
        //Administrador
        Permission::create([
            'name' => 'Lista de evaluador',
            'slug' => 'admin.index',
            'description' => 'Esta accion le permite al administrador visualizar a los usuarios evaluadores'
        ]);
        
        Permission::create([
            'name' => 'Crear de evaluador',
            'slug' => 'admin.create',
            'description' => 'Esta accion le permite al administrador visualizar el formulario usuarios evaluadores'
        ]);

        Permission::create([
            'name' => 'Registrar evaluador',
            'slug' => 'admin.store',
            'description' => 'Esta accion le permite al administrador crear al los usuarios evaluadores'
        ]);

        Permission::create([
            'name' => 'Estado del evaluador',
            'slug' => 'admin.update',
            'description' => 'Esta accion le permite al administrador cambiar el estado del evaluador'
        ]);
    }
}
