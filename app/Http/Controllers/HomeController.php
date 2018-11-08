<?php

namespace App\Http\Controllers;

use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = getdate();
        $fecha = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];
        $proyectos = DB::select('call db_proyectos(?)', array($fecha));
        //dd($proyectos);
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
        return view('home',compact('proyectos','datos'));
    }
}
