<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Ciudad;
use App\Tipo_documento;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'email' => 'required|string|email|max:255|unique:users',
            'telefono' => 'required|string|max:10',
            'identificacion' => 'required|string|max:11',
            'tipo_documento' => 'required|string|max:45',
            'direccion' => 'required|string|max:45',
            'ciudad' => 'required|string|max:45',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User();
        $ciudad = Ciudad::where('nombre',$data['ciudad'])->get();
        $tipo_documento = Tipo_documento::where('nombre',$data['tipo_documento'])->get();
        $user->nombre = $data['nombre'];
        $user->apellido = $data['apellido'];
        $user->email = $data['email'];
        $user->telefono = $data['telefono'];
        $user->identificacion = $data['identificacion'];
        $user->direccion = $data['direccion'];
        $user->nombre_usuario = $data['nombre_usuario'];
        $user->password = Hash::make($data['password']);
        $user->estado = 1;
        $user->ciudad_id = $ciudad->get(0)->id;
        $user->tipo_documento_id = $tipo_documento->get(0)->id;
        $user->descripcion = $data['descripcion'];
        $user->save();
        $user->roles()->sync([2,3]);
        return $user;
    }
}
