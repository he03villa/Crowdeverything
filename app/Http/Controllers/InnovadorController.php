<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_recurso;
use App\Tipo_proyecto;
use App\Redes_social;
use App\Proyecto;
use App\Recurso;

class InnovadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $redes = Redes_social::get();
        $tipo_recursos = Tipo_recurso::get();
        $tipo_proyectos = Tipo_proyecto::get();
        return view('inno.index', compact('redes','tipo_recursos','tipo_proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyecto = new Proyecto();
        $tipo_proyecto = Tipo_proyecto::where('nombre',$request->get('tipo_proyecto'))->get();
        $proyecto->foto = $request->file('ImageUpload')->store('public');
        $proyecto->nombre_proyecto = $request->get('nombre_proyecto');
        $proyecto->total = $request->get('total');
        $proyecto->descripcion = $request->get('descripcion');
        $proyecto->publicacion = 0;
        $proyecto->user_id = $request->get('user_id');
        $proyecto->tipo_proyecto_id = $tipo_proyecto->get(0)->id;
        $proyecto->save();
        
        $recuso_nombre = $request->get('nombre');
        $recuso_re = $request->get('recurso');
        $recuso_tipo = $request->get('tipo');
        $recursos = array();
        $tipo = array();

        foreach($recuso_tipo as $re){
            $tipo_re = Tipo_recurso::where('nombre',$re)->get();
            $tipo[] = $tipo_re->get(0)->id;
        }

        for ($i=0; $i < count($recuso_nombre); $i++) { 
            $recursos[] = [
                'nombre_recurso' => $recuso_nombre[$i],
                'costo' => $recuso_re[$i],
                'tipo_recurso_id' => $tipo[$i]
            ];
        }

        $fotos = $request->file('foto');
        $proyecto_foto = array();
        foreach($fotos as $fot){
            $proyecto_foto[] = $fot->store('public');
        }
        
        $foto = array();
        for ($i=0; $i < count($proyecto_foto); $i++) { 
            $foto[] = [
                'nombre' => $proyecto_foto[$i]
            ];   
        }

        $redes_url = $request->get('url');
        $redes_tipo = $request->get('redes');
        $tipo_redes = array();
        foreach($redes_tipo as $re){
            $tipo_re = Redes_social::where('nombre',$re)->get();
            $tipo_redes[] = $tipo_re->get(0)->id;
        }

        $redes = array();
        for ($i=0; $i < count($redes_url); $i++) { 
            $redes[] = [
                'url' => $redes_url[$i],
                'redes_socials_id' => $tipo_redes[$i]
            ];
        }

        $proyecto->Recurso()->createMany($recursos);
        $proyecto->Foto()->createMany($foto);
        $proyecto->Redes()->createMany($redes);

        return redirect()->route('user.perfil', $request->get('user_id'))->with('info', 'Proyecto registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        return view('inno.show',compact('proyecto'));
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
    public function update(Request $request, $id)
    {
        //
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