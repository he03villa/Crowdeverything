<?php

namespace App\Http\Controllers;

use App\Recurso;
use App\Tipo_recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            if ($request->get('tipo') == NULL || $request->get('tipo') == 'Seleccione el tipo de recurso') {
                return response(1);
            } else {
                if ($request->get('tipo') == 'Financiero') {
                    $recur = Recurso::where('tipo_recurso_id',1)
                                    ->Where('proyecto_id',$request->get('id_proyecto'))
                                    ->get();
                    if (count($recur)>0) {
                        if ($request->get('recurso') == NULL) {
                            return response(2);
                        } else {
                            $recurso = new Recurso();
                            $recur->get(0)->costo = $request->get('recurso') + $recur->get(0)->costo;
                            $recurso = $recur->get(0);
                            $recurso->save();
                            return response(6);
                        }
                    } else {
                        Recurso::create([
                            'costo' => $request->get('recurso'),
                            'tipo_recurso_id' => 1,
                            'proyecto_id' => $request->get('id_proyecto'),
                        ]);
                        return response(6);
                    }
                } else {
                    if ($request->get('nombre') == NULL) {
                        return response(3);
                    } else {
                        if ($request->get('recurso') == NULL) {
                            return response(4);
                        } else {
                            $tipo_recurso = Tipo_recurso::where('nombre',$request->get('tipo'))->get();
                            Recurso::create([
                                'nombre_recurso' => $request->get('nombre'),
                                'costo' => $request->get('recurso'),
                                'tipo_recurso_id' => $tipo_recurso->get(0)->id,
                                'proyecto_id' => $request->get('id_proyecto'),
                            ]);
                            return response(5);
                        }   
                    }
                }
                
            }
            
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurso $recurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurso $recurso)
    {
        //
    }
}
