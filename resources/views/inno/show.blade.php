@extends('layouts.app')

@section('content')
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
                                    <div class="chart" data-percent="0">0%</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="">Materia Prima</label>
                                    <div class="chart" data-percent="0">0%</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="">Talento Humano</label>
                                    <div class="chart" data-percent="0">0%</div>
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
                            <h1 style="color:red">No se a publicado su proyecto</h1>
                        @else
                            @if($proyecto->publicacion == 1)
                                <h1 style="color:gren">No se a publicado su proyecto</h1>
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
                        <img src="{{ Storage::url($user->foto) }}" class="img-lg" alt="imagen de perfil" style="margin-left: 20px">
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
                                <label for="" style="margin-left:10px"><i class="fas fa-users"></i> {{ $talen[$x]['nombre']}}</label><br>
                            @endfor
                        @else
                            <h1>No hay recurso en este proyecto</h1>
                        @endif
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                    <div class="recuro_mas">
                        <a href="#rec" data-toggle="modal">Agregar recurso</a>
                    </div>
                </div>
              <div class="row" style="background-color: white; margin-left: 5px; margin-top: 20px">
                    <div class="col-ms-12">
                        <label for="" class="h2">Donadores</label>
                    </div>
                </div>
                <div class="row" style="background-color: white; margin-left: 5px">
                      <div class="col-ms-4">
                            <img src="{{ Storage::url($proyecto->foto) }}" class="img-lg-1" alt="imagen de perfil"><br>
                            <label for="" class="h6" style="margin-left: 10px">Nombre</label><br>
                            <label for="" class="h6" style="margin-left: 10px">Contribución</label>
                      </div>
                      <div class="col-ms-4">
                            <img src="{{ Storage::url($proyecto->foto) }}" class="img-lg-1" alt="imagen de perfil"><br>
                            <label for="" class="h6" style="margin-left: 10px">Nombre</label><br>
                            <label for="" class="h6" style="margin-left: 10px">Contribución</label>
                      </div>
                      <div class="col-ms-4">
                            <img src="{{ Storage::url($proyecto->foto) }}" class="img-lg-1" alt="imagen de perfil"><br>
                            <label for="" class="h6" style="margin-left: 10px">Nombre</label><br>
                            <label for="" class="h6" style="margin-left: 10px">Contribución</label>
                      </div>
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
                                <h1>No hay redes social en este proyecto</h1>
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
                {!! Form::open(['id'=>'recur'])!!}
                    @csrf
                    <div class="modal-body">
                        <label for="res-recurso">Recurso</label>
                        <div id="res-recurso"></div>
                        <button id="recurso" type="button" class="btn btn-secondary" onclick="recursos({{ $tipo_recursos }})">Agregar <i class="fas fa-plus"></i> recurso</button>
                    </div>
                    <div class="modal-footer">
                        <input type="button" value="Donar" id="aceptar_fin">
                        <a href="" data-dismiss="modal" id="cerrar">Cerrar</a>
                    </div>
                {!! Form::close()!!}
            </div>
        </div>
    </div>
@endsection