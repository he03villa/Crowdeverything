<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Recurso;
use App\Donacion;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::get();
        return view('welcome',compact('proyectos'));
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
        if ($request->ajax()) {

            if ($request->get('id_tipo') == NULL || $request->get('id_tipo') == 'Seleccione la donación') {
                return response(1);
            } else {
                if($request->get('id_tipo') == 1 || $request->get('id_tipo') == 2 || $request->get('id_tipo') == 3 || $request->get('id_tipo') == 4 || $request->get('id_tipo') == 5 || $request->get('id_tipo') == 6 || $request->get('id_tipo') == 7 || $request->get('id_tipo') == 8 || $request->get('id_tipo') == 9){
                    $recur = Recurso::where('tipo_recurso_id',$request->get('id_tipo'))
                                    ->Where('proyecto_id',$request->get('id_proyecto'))
                                    ->get();
                } else {
                    $recur = Recurso::where('nombre_recurso',$request->get('id_tipo'))
                                    ->Where('proyecto_id',$request->get('id_proyecto'))
                                    ->get();
                }
                if ($request->get('remember')) {
                    $anonimo = 1;
                } else {
                    $anonimo = 0;
                }

                if ($request->get('costo') == NULL) {
                    return response(2);
                } else {
                    if ($request->get('costo') > $recur->get(0)->costo) {
                        return response(3);
                    } else {
                        $donacion = new Donacion();
                        $donacion->proyecto_id = $request->get('id_proyecto');
                        $donacion->recurso_id = $recur->get(0)->id;
                        $donacion->usuario_id = $request->get('id_user');
                        $donacion->costo = $request->get('costo');
                        $donacion->anonimo = $anonimo;
                        $donacion->save();
                        return response(4);
                    }
                }
                
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        $recurso = $proyecto->Recurso;
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
        return view('proyec.show',compact('proyecto','financi','matera','talen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
