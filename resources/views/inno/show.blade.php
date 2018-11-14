@extends('layouts.app')

@section('content')
    @php
        $valor = $datos[0]['valor']
    @endphp
    @php
        $total = $datos[0]['total']
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row" style="background-color: white">
                    <div class="col-ms-6 col-xl-4">
                        <img src="{{ Storage::url($proyecto->foto) }}" id="perfil" title="perfil" class="img-ms" style="margin-top:10px">
                        <h1>{{ $proyecto->nombre_proyecto }}</h1>
                    </div>
                    <div class="col-ms-6 col-xl-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="" style="margin-bottom: 33px">Financiero</label>
                                    @if($valor == 'null')
                                        <div class="chart" data-percent="0">0%</div>
                                    @else
                                        @if($total[0]['fin'] == 0)
                                            <div class="chart" data-percent="0">0%</div>
                                        @else
                                            <div class="chart" data-percent="{{ round(($valor[0]['fin']*100)/$total[0]['fin'],2) }}">{{ round(($valor[0]['fin']*100)/$total[0]['fin'],2) }}%</div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="">Materia Prima</label>
                                    @if($valor == 'null')
                                        <div class="chart" data-percent="0">0%</div>
                                    @else
                                        @if($total[0]['mate'] == 0)
                                            <div class="chart" data-percent="0">0%</div>
                                        @else
                                            <div class="chart" data-percent="{{ round(($valor[0]['mate']*100)/$total[0]['mate'],2) }}">{{ round(($valor[0]['mate']*100)/$total[0]['mate'],2) }}%</div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="">Talento Humano</label>
                                    @if($valor == 'null')
                                        <div class="chart" data-percent="0">0%</div>
                                    @else
                                        @if($total[0]['recur'] == 0)
                                            <div class="chart" data-percent="0">0%</div>
                                        @else
                                        <div class="chart" data-percent="{{ round(($valor[0]['recur']*100)/$total[0]['recur'],2) }}">{{ round(($valor[0]['recur']*100)/$total[0]['recur'],2) }}%</div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="background-color: white">
                    <div class="col-ms-12">
                        <p class="text-justify" style="margin: 10px">
                            {{ $proyecto->descripcion }}
                        </p>
                    </div>
                </div>
                <div class="row" style="margin-top: 10px">
                    <div class="col-ms-12">
                        @if(count($proyecto->Foto) > 0)
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        @php
                                            $fo = $proyecto->Foto
                                        @endphp
                                        <img src="{{ Storage::url($fo[0]->nombre) }}" class="img-xj">
                                    </div>
                                    @for($i = 1; $i< count($fo); $i++)
                                        <div class="carousel-item">
                                            <img src="{{ Storage::url($fo[$i]->nombre) }}" class="img-xj">
                                        </div>
                                    @endfor
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        @else
                            <h1>No hay fotos en este proyecto</h1>
                        @endif
                    </div>
                </div>
                <div class="row" style="background-color: white;margin-top: 10px">
                    <div class="col-sm-12" style="margin-left: 60px">
                        @if($proyecto->publicacion == 0)
                            <h1 style="color:red">No se ha publicado su proyecto</h1>
                        @else
                            @if($proyecto->publicacion == 1)
                                <h1 style="color:green">EL proyecto se publico</h1>
                            @endif
                        @endif
                    </div>                    
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row" style="background-color: white; margin-left: 5px">
                    <div class="col-sm-12">
                        <label for="" class="h2">Creador</label>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                    @php
                        $user = $proyecto->User
                    @endphp
                    <div class="col-sm-6">
                        @if($user->foto)
                            <img src="{{ Storage::url($user->foto) }}" class="img-lg" alt="imagen de perfil" style="margin-left: 20px">
                        @else
                            {{ Html::image('img/perfil.jpg','Imagen no encontrada', array('id' => 'perfil', 'title' => 'perfil', 'class' => 'img-lg')) }}
                        @endif
                    </div>
                    <div class="col-sm-6">
                        <label for="">{{ $user->nombre." ".$user->apellido }}</label>
                        <label for="">Numero de integrantes</label>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                    <div class="col-sm-12">
                        <p class="text-justify" style="margin: 10px">{{ $user->descripcion }}</p>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px; margin-top: 20px">
                    <div class="col-ms-12">
                        <label for="" class="h2">Recursos</label>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                    <div class="col-ms-12" style="margin-left: 20px">
                        @if(count($proyecto->Recurso) > 0)
                            @php
                                $recursos = $proyecto->Recurso
                            @endphp
                            <label><i class="fas fa-piggy-bank"></i> Financiero</label><br>
                            @for($x=0; $x<count($financi); $x++)
                                <label for="" style="margin-left:10px"><i class="fas fa-piggy-bank"></i> {{ $financi[$x]['costo']}}</label><br>
                            @endfor
                            <label><i class="fas fa-cogs"></i> Materia prima</label><br>
                            @for($x=0; $x<count($matera); $x++)
                                <label for="" style="margin-left:10px"><i class="fas fa-cogs"></i> {{ $matera[$x]['nombre']." ".$matera[$x]['costo'] }}</label><br>
                            @endfor
                            <label><i class="fas fa-users"></i> Talento humano</label><br>
                            @for($x=0; $x<count($talen); $x++)
                                <label for="" style="margin-left:10px"><i class="fas fa-users"></i> {{ $talen[$x]['nombre']." ".$talen[$x]['costo'] }}</label><br>
                            @endfor
                        @else
                            <h1>No hay recurso en este proyecto</h1>
                        @endif
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                    <div class="recuro_mas">
                        @can('recur.store')
                            <a href="#rec" data-toggle="modal">Agregar recurso</a>
                        @endcan
                    </div>
                </div>
              <div class="row" style="background-color: white; margin-left: 5px; margin-top: 20px">
                    <div class="col-ms-12">
                        <label for="" class="h2">Donadores</label>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                @if($use[0]['user'] != 'null' || $use[0]['anonimo'] != 'null')
                        @for($i = 0; $i < count($usuario); $i++)
                            <div class="col-ms-4">
                                @if($usuario[$i]['anonimo'] == 0)
                                    {{ Html::image('img/perfil.jpg','Imagen no encontrada', array('id' => 'perfil', 'title' => 'perfil', 'class' => 'img-lg-1')) }}<br>
                                    <label for="" class="h6" style="margin-left: 10px">Anonimo</label>
                                @else
                                    @if($usuario[$i]['foto'])
                                        <img src="{{ Storage::url($usuario[$i]['foto']) }}" class="img-lg-1" alt="imagen de perfil"><br>
                                    @else
                                    {{ Html::image('img/perfil.jpg','Imagen no encontrada', array('id' => 'perfil', 'title' => 'perfil', 'class' => 'img-lg-1')) }}<br>
                                    @endif
                                    <label for="" class="h6" style="margin-left: 10px">{{ $usuario[$i]['nombre'] }}</label><br>
                                    <label for="" class="h6" style="margin-left: 10px">Contribución</label>
                                @endif
                            </div>
                        @endfor
                    @else
                        <h1>Este proyecto no tiene donaciones</h1>
                    @endif
                </div>
                <div class="row" style="background-color: white; margin-left: 5px; margin-top: 20px">
                    <div class="col-ms-12">
                        <label for="" class="h2">Redes sociales</label>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                    <div class="col-ms-12">
                        <div class="social">
                            @if(count($proyecto->Redes) > 0)
                                @php
                                    $redes = $proyecto->Redes
                                @endphp
                                @for($i = 0; $i < count($redes); $i++)
                                    @if($redes[$i]->redes_socials_id == 1)
                                        <a href="https://{{ $redes[$i]->url }}" class="fondo-blue"><i class="fab fa-facebook"></i></a>
                                    @else
                                        @if($redes[$i]->redes_socials_id == 2)
                                            <a href="https://{{ $redes[$i]->url }}" class="fondo_lightpink"><i class="fab fa-instagram"></i></a>        
                                        @else
                                            @if($redes[$i]->redes_socials_id == 3)
                                                <a href="https://{{ $redes[$i]->url }}" class="fondo_lightblue"><i class="fab fa-twitter-square"></i></a>
                                            @endif
                                        @endif
                                    @endif
                                @endfor
                            @else
                                <h1>No hay redes sociales en este proyecto</h1>
                            @endif
                        </div>
                    </div>
              </div>
            </div>        
        </div>        
    </div>
    <div class="modal fade" id="rec" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Donación financiero</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {!! Form::open(['route' => 'recur.store', 'id' => 'recur']) !!}
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="res-recurso">Recurso</label>
                            <input type="hidden" name="id_proyecto" value="{{ $proyecto->id }}">
                            <select class='form-control' name='tipo' id='opcion' onchange="cambioOpcion()">
                                <option>Seleccione el tipo de recurso</option>
                                @for($i=0; $i<count($tipo_recursos); $i++)
                                    <option>{{$tipo_recursos[$i]["nombre"]}}</option>
                                @endfor
                            </select>
                            <div id="op"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Agregar" id="aceptar_recur">
                        <a href="" data-dismiss="modal" id="cerrar">Cerrar</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    {{ Html::script('js/ajax.js') }}
@endsection