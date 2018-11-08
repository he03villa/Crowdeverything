<?php

namespace App\Http\Controllers;

use App\Proyecto;
use App\Recurso;
use App\Donacion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = getdate();
        $fecha = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];
        $proyectos = DB::select('call db_proyectos(?)', array($fecha));
        $datos = array();
        for ($i=0; $i < count($proyectos); $i++) { 
            $dato1 = DB::select('call db_porcentaje(?)', array($proyectos[$i]->id));
            $dato2 = DB::select('call db_cantida(?)', array($proyectos[$i]->id));
            if (count($dato1) <= 0) {
                $datos[] = [
                    'valor' => 'null',
                    'total' => 'null'
                ];
            } else {
                $vec = array();
                if (count($dato1) == 1) {
                    if ($dato1[0]->tipo == 1) {
                        $vec[] = [
                            'fin' => $dato1[0]->total,
                            'mate' => '0',
                            'recur' => '0'
                        ];
                    } else {
                        if ($dato1[0]->tipo == 2) {
                            $vec[] = [
                                'fin' => '0',
                                'mate' => $dato1[0]->total,
                                'recur' => '0'
                            ];
                        } else {
                            if ($dato1[0]->tipo == 3) {
                                $vec[] = [
                                    'fin' => '0',
                                    'mate' => '0',
                                    'recur' => $dato1[0]->total
                                ];
                            } 
                        }
                        
                    }
                    
                } else {
                    if (count($dato1) == 2) {
                        if ($dato1[0]->tipo == 1 && $dato1[1]->tipo == 2) {
                            $vec[] = [
                                'fin' => $dato1[0]->total,
                                'mate' => $dato1[1]->total,
                                'recur' => '0'
                            ];
                        } else {
                            if ($dato1[0]->tipo == 2 && $dato1[1]->tipo == 3) {
                                $vec[] = [
                                    'fin' => '0',
                                    'mate' => $dato1[0]->total,
                                    'recur' => $dato1[1]->total
                                ];
                            } else {
                                if ($dato1[0]->tipo == 1 && $dato1[1]->tipo == 3) {
                                    $vec[] = [
                                        'fin' => $dato1[0]->total,
                                        'mate' => '0',
                                        'recur' => $dato1[1]->total
                                    ];
                                }
                            }
                        }
                    } else {
                        if (count($dato1) == 3) {
                            $vec[] = [
                                'fin' => $dato1[0]->total,
                                'mate' => $dato1[1]->total,
                                'recur' => $dato1[2]->total
                            ];
                        }
                    }
                }

                $vect = array();
                if (count($dato2) == 1) {
                    if ($dato2[0]->tipo == 1) {
                        $vect[] = [
                            'fin' => $dato2[0]->costo,
                            'mate' => '0',
                            'recur' => '0'
                        ];
                    } else {
                        if ($dato2[0]->tipo == 2) {
                            $vect[] = [
                                'fin' => '0',
                                'mate' => $dato2[0]->costo,
                                'recur' => '0'
                            ];
                        } else {
                            if ($dato2[0]->tipo == 3) {
                                $vect[] = [
                                    'fin' => '0',
                                    'mate' => '0',
                                    'recur' => $dato2[0]->costo
                                ];
                            }
                        }
                    }
                } else {
                    if (count($dato2) == 2) {
                        if ($dato2[0]->tipo == 1 && $dato2[1]->tipo == 2) {
                            $vect[] = [
                                'fin' => $dato2[0]->costo,
                                'mate' => $dato2[1]->costo,
                                'recur' => '0'
                            ];
                        } else {
                            if ($dato2[0]->tipo == 2 && $dato2[1]->tipo == 3) {
                                $vect[] = [
                                    'fin' => '0',
                                    'mate' => $dato2[0]->costo,
                                    'recur' => $dato2[1]->costo
                                ];
                            } else {
                                if ($dato2[0]->tipo == 1 && $dato2[1]->tipo == 3) {
                                    $vect[] = [
                                        'fin' => $dato2[0]->costo,
                                        'mate' => '0',
                                        'recur' => $dato2[1]->costo
                                    ];
                                }
                            }
                        }
                    } else {
                        if (count($dato2) == 3) {
                            $vect[] = [
                                'fin' => $dato2[0]->costo,
                                'mate' => $dato2[1]->costo,
                                'recur' => $dato2[2]->costo
                            ];
                        }
                    }
                    
                }
                $datos[] = [
                    'valor' => $vec,
                    'total' => $vect
                ];
            }
        }
        //return dd($datos);
        return view('welcome',compact('proyectos', 'datos'));
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
        $donacion = $proyecto->Donacion;
        $use = array();
        if (count($donacion) != 0) {
            $use[] = [
                'user' => $donacion[0]->usuario_id,
                'anonimo' => $donacion[0]->anonimo
            ];
            $x=0;
            for ($i=1; $i < count($donacion); $i++) {
                if ($use[$x]['user'] != $donacion[$i]->usuario_id) {
                    $use[] = [
                        'user' => $donacion[$i]->usuario_id,
                        'anonimo' => $donacion[$i]->anonimo
                    ];
                    $x++;
                }              
            }
        } else {
            $use[] = [
                'user' => 'null',
                'anonimo' => 'null'
            ];
        }
        $usuario = array();
        if ($use[0]['user'] == 'null' || $use[0]['anonimo']) {
            $usuario[] = [
                'foto' => 'null',
                'nombre' => 'null',
                'anonimo' => 'null'
            ];
        } else {
            for ($i=0; $i < count($use); $i++) { 
                $us = User::where('id',$use[$i]['user'])->get();
                $usuario[] = [
                    'foto' => $us->get(0)->foto,
                    'nombre' => $us->get(0)->nombre,
                    'anonimo' => $use[$i]['anonimo']
                ];
            }
        }
        //dd($use);
        $dato1 = DB::select('call db_porcentaje(?)', array($proyecto->id));
        $dato2 = DB::select('call db_cantida(?)', array($proyecto->id));
        $datos = array();
        if (count($dato1) <= 0) {
            $datos[] = [
                'valor' => 'null',
                'total' => 'null'
            ];
        } else {
            $vec = array();
            if (count($dato1) == 1) {
                if ($dato1[0]->tipo == 1) {
                    $vec[] = [
                        'fin' => $dato1[0]->total,
                        'mate' => '0',
                        'recur' => '0'
                    ];
                } else {
                    if ($dato1[0]->tipo == 2) {
                        $vec[] = [
                            'fin' => '0',
                            'mate' => $dato1[0]->total,
                            'recur' => '0'
                        ];
                    } else {
                        if ($dato1[0]->tipo == 3) {
                            $vec[] = [
                                'fin' => '0',
                                'mate' => '0',
                                'recur' => $dato1[0]->total
                            ];
                        } 
                    }
                    
                }
                
            } else {
                if (count($dato1) == 2) {
                    if ($dato1[0]->tipo == 1 && $dato1[1]->tipo == 2) {
                        $vec[] = [
                            'fin' => $dato1[0]->total,
                            'mate' => $dato1[1]->total,
                            'recur' => '0'
                        ];
                    } else {
                        if ($dato1[0]->tipo == 2 && $dato1[1]->tipo == 3) {
                            $vec[] = [
                                'fin' => '0',
                                'mate' => $dato1[0]->total,
                                'recur' => $dato1[1]->total
                            ];
                        } else {
                            if ($dato1[0]->tipo == 1 && $dato1[1]->tipo == 3) {
                                $vec[] = [
                                    'fin' => $dato1[0]->total,
                                    'mate' => '0',
                                    'recur' => $dato1[1]->total
                                ];
                            }
                        }
                    }
                } else {
                    if (count($dato1) == 3) {
                        $vec[] = [
                            'fin' => $dato1[0]->total,
                            'mate' => $dato1[1]->total,
                            'recur' => $dato1[2]->total
                        ];
                    }
                }
            }

            $vect = array();
            if (count($dato2) == 1) {
                if ($dato2[0]->tipo == 1) {
                    $vect[] = [
                        'fin' => $dato2[0]->costo,
                        'mate' => '0',
                        'recur' => '0'
                    ];
                } else {
                    if ($dato2[0]->tipo == 2) {
                        $vect[] = [
                            'fin' => '0',
                            'mate' => $dato2[0]->costo,
                            'recur' => '0'
                        ];
                    } else {
                        if ($dato2[0]->tipo == 3) {
                            $vect[] = [
                                'fin' => '0',
                                'mate' => '0',
                                'recur' => $dato2[0]->costo
                            ];
                        }
                    }
                }
            } else {
                if (count($dato2) == 2) {
                    if ($dato2[0]->tipo == 1 && $dato2[1]->tipo == 2) {
                        $vect[] = [
                            'fin' => $dato2[0]->costo,
                            'mate' => $dato2[1]->costo,
                            'recur' => '0'
                        ];
                    } else {
                        if ($dato2[0]->tipo == 2 && $dato2[1]->tipo == 3) {
                            $vect[] = [
                                'fin' => '0',
                                'mate' => $dato2[0]->costo,
                                'recur' => $dato2[1]->costo
                            ];
                        } else {
                            if ($dato2[0]->tipo == 1 && $dato2[1]->tipo == 3) {
                                $vect[] = [
                                    'fin' => $dato2[0]->costo,
                                    'mate' => '0',
                                    'recur' => $dato2[1]->costo
                                ];
                            }
                        }
                    }
                } else {
                    if (count($dato2) == 3) {
                        $vect[] = [
                            'fin' => $dato2[0]->costo,
                            'mate' => $dato2[1]->costo,
                            'recur' => $dato2[2]->costo
                        ];
                    }
                }
                
            }
            
            $datos[] = [
                'valor' => $vec,
                'total' => $vect
            ];
        }
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
        //dd($datos);
        return view('proyec.show',compact('proyecto','financi','matera','talen','datos','usuario','use'));
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
