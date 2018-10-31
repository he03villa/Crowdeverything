<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nombre' => 'Hemer',
            'apellido' => 'Villa',
            'email' => 'he03villa@gmail.com',
            'telefono' => '4003007465',
            'identificacion' => '108260312',
            'direccion' => 'calle 5 # 13-52',
            'nombre_usuario' => 'he03villa',
            'password' => Hash::make('ivored'),
            'estado' => 1,
            'ciudad_id' => 1,
            'tipo_documento_id' => 1
        ]);
    }
}
