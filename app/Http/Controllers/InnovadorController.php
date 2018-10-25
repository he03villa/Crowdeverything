<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_recurso;
use App\Tipo_proyecto;
use App\Redes_social;
use App\Proyecto;
use App\Recurso;
use App\Foto;
use App\Proyecto_redes_social;

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
        $recurso = $proyecto->Recurso;
        $tipo_recursos = Tipo_recurso::get();
        $financi = array();
        $matera = array();
        $talen = array();
        for ($i=0; $i < count($recurso); $i++) { 
            if ($recurso[$i]->tipo_recurso_id == 1) {
                $financi[] = [
                    'costo' => $recurso[$i]->costo
                ];
            } else {
                if ($recurso[$i]->tipo_recurso_id == 3) {
                    $talen[] = [
                        'nombre' => $recurso[$i]->nombre_recurso,
                        'costo' => $recurso[$i]->costo
                    ];
                } else {
                    if ($recurso[$i]->tipo_recurso_id == 2) {
                        $matera[] = [
                            'nombre' => $recurso[$i]->nombre_recurso,
                            'costo' => $recurso[$i]->costo
                        ];
                    }
                }
                
            }
            
        }
        return view('inno.show',compact('proyecto','financi','matera','talen','tipo_recursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        $redes = Redes_social::get();
        $tipo_recursos = Tipo_recurso::get();
        $tipo_proyectos = Tipo_proyecto::get();
        return view('inno.edit',compact('proyecto','redes','tipo_recursos','tipo_proyectos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Proyecto $proyecto)
    {
        $tipo_proyecto = Tipo_proyecto::where('nombre',$request->get('tipo_proyecto'))->get();
        if($request->file('ImageUpload') != NULL) $proyecto->foto = $request->file('ImageUpload')->store('public');
        $proyecto->nombre_proyecto = $request->get('nombre_proyecto');
        $proyecto->descripcion = $request->get('descripcion');
        $proyecto->publicacion = 0;
        $proyecto->user_id = $request->get('user_id');
        $proyecto->tipo_proyecto_id = $tipo_proyecto->get(0)->id;
        $proyecto->save();

        $recurso_id = $request->get('id');
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
                'id' => $recurso_id[$i],
                'nombre_recurso' => $recuso_nombre[$i],
                'costo' => $recuso_re[$i],
                'tipo_recurso_id' => $tipo[$i]
            ];
        }

        $fotos = $request->file('foto');
        $foto_id = $request->get('foto_id');
        $proyecto_foto = array();
        for ($i=0; $i < count($foto_id); $i++) { 
            if($fotos[$i] == NULL){
                $proyecto_foto[] = 'null';
            }
            else{
                $proyecto_foto[] = $fotos[$i]->store('public');
            }
        }
        
        $foto = array();
        for ($i=1; $i <= count($foto_id); $i++) {
            $foto[] = [
                'id' => $foto_id[$i-1],
                'nombre' => $proyecto_foto[$i-1]
            ];   
        }

        $redes_url = $request->get('url');
        $redes_tipo = $request->get('redes');
        $redes_id = $request->get('redes1');
        $tipo_redes = array();
        foreach($redes_tipo as $re){
            $tipo_re = Redes_social::where('nombre',$re)->get();
            $tipo_redes[] = $tipo_re->get(0)->id;
        }

        $redes = array();
        for ($i=0; $i < count($redes_id); $i++) { 
            $redes[] = [
                'id' => $redes_id[$i],
                'url' => $redes_url[$i],
                'redes_socials_id' => $tipo_redes[$i]
            ];
        }

        for ($i=0; $i <count($recursos) ; $i++) { 
            if($recursos[$i]['id'] == 0) {
                $proyecto->Recurso()->create($recursos[$i]);
            } else {
                $recus = Recurso::where('id',$recursos[$i]['id'])->get();
                $recus->get(0)->nombre_recurso = $recursos[$i]['nombre_recurso'];
                $recus->get(0)->costo = $recursos[$i]['costo'];
                $recus->get(0)->tipo_recurso_id = $recursos[$i]['tipo_recurso_id'];
                $proyecto->Recurso()->saveMany($recus);
            } 
        }
        
        for ($i=0; $i < count($foto); $i++) { 
            if($foto[$i]['id']==0){
                $proyecto->Foto()->create($foto[$i]);
            }
            else {
                if($foto[$i]['nombre'] != 'null'){
                    $fo = Foto::where('id',$foto[$i]['id'])->get();
                    $fo->get(0)->nombre = $foto[$i]['nombre'];
                    $proyecto->Foto()->saveMany($fo);
                }
            }
        }

        for ($i=0; $i < count($redes); $i++) { 
            if ($redes[$i]['id'] == 0) {
                $proyecto->Redes()->create($redes[$i]);
            } else {
                $red = Proyecto_redes_social::where('id',$redes[$i]['id'])->get();
                $red->get(0)->url = $redes[$i]['url'];
                $red->get(0)->redes_socials_id = $redes[$i]['redes_socials_id'];
                $proyecto->Redes()->saveMany($red);
            }
        }
        
        return redirect()->route('user.perfil', $request->get('user_id'))->with('info', 'Proyecto se actuaalizo con exito');
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
