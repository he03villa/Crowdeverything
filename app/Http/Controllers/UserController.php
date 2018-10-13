<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ciudad;
use App\Tipo_documento;

class UserController extends Controller
{
    public function create(){
        $ciudades = Ciudad::get();
        $tipo_documentos = Tipo_documento::get();
        return view('user.create',compact('ciudades','tipo_documentos'));
    }

    public function perfil(User $user){
        return view('user.perfil',compact('user'));
    }

    public function edit(User $user){
        $ciudades = Ciudad::get();
        return view('user.edit',compact('user','ciudades'));
    }

    public function update(Request $request, User $user){
        $ciudad = Ciudad::where('nombre',$request->get('ciudad'))->get();
        $user->nombre = $request->get('nombre');
        $user->apellido = $request->get('apellido');
        $user->nombre_usuario = $request->get('nombre_usuario');
        $user->direccion = $request->get('direccion');
        $user->ciudad_id = $ciudad->get(0)->id;
        $user->foto = $request->file('ImageUpload')->store('public');
        $user->save();        
        return redirect()->route('user.perfil', $user->id)->with('info', 'Usuario actualizado con exito');
    }
}
