<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Tipo_documento;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudad::get();
        $tipo_documentos = Tipo_documento::get();
        return view('admin.create',compact('ciudades','tipo_documentos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::get();
        $user = $this->verificar($request->get('email'));
        if ($user->get(0)) {
            $roles = $user->get(0)->getRoles();
            if ($roles[0] == 'innova' || $roles[0] == 'patroci') {
                $user->get(0)->roles()->sync([2,3,4]);
            }
        } else {
            $user = new User();
            $ciudad = Ciudad::where('nombre',$request->get('ciudad'))->get();
            $tipo_documento = Tipo_documento::where('nombre',$request->get('tipo_documento'))->get();
            $user->nombre = $request->get('nombre');
            $user->apellido = $request->get('apellido');
            $user->email = $request->get('email');
            $user->telefono = $request->get('telefono');
            $user->identificacion = $request->get('identificacion');
            $user->direccion = $request->get('direccion');
            $user->nombre_usuario = $request->get('nombre_usuario');
            $user->password = Hash::make($request->get('password'));
            $user->estado = 1;
            $user->ciudad_id = $ciudad->get(0)->id;
            $user->tipo_documento_id = $tipo_documento->get(0)->id;
            $user->descripcion = $request->get('descripcion');
            $user->save();
            $user->roles()->sync([4]);
        }
        return redirect()->route('admin.index',compact('users'))->with('info', 'El usuario se ingreso con exito');
    }

    public function verificar($email){
        return User::where('email',$email)->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,USer $user)
    {
        if ($user->estado == 1) {
            $user->estado = 0;
        } else {
            if ($user->estado == 0) {
                $user->estado = 1;
            }
        }
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
