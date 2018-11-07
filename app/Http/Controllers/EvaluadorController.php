<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Tipo_recurso;

class EvaluadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyectos = Proyecto::paginate();
        return view('eva.index', compact('proyectos'));
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
        //
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
        return view('eva.show', compact('proyecto','financi','matera','talen'));
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
    public function update(Request $request,Proyecto $proyecto)
    {
        if ($request->ajax()) {
            if (!$request->get('fecha_inical') || !$request->get('fecha_final')) {
                return response(1);
            } else {
                $fecha_inicio = date('Y-m-d',strtotime($request->get('fecha_inical')));
                $fecha_final = date('Y-m-d',strtotime($request->get('fecha_final')));
                if ($fecha_final > $fecha_inicio) {
                    $proyecto->fecha_inicio = $fecha_inicio;
                    $proyecto->fecha_final = $fecha_final;
                    $proyecto->publicacion = 1;
                    $proyecto->save();
                    return response(3);
                } else {
                    return response(2);
                }
            }
            
        }
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
