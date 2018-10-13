@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="row" style="background-color: white">
                    <div class="col-ms-6  col-xl-4">
                        <img src="{{ Storage::url($proyecto->foto) }}" id="perfil" title="perfil" class="img-ms">
                        <h1>{{ $proyecto->nombre_proyecto }}</h1>
                    </div>
                    <div class="col-ms-6 col-xl-8">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="" style="margin-bottom: 33px">Financiero</label>
                                    <div class="chart" data-percent="90">90%</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="">Materia Prima</label>
                                    <div class="chart" data-percent="90">90%</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="box">
                                    <label for="">Recurso Humano</label>
                                    <div class="chart" data-percent="90">90%</div>
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
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>        
        </div>        
    </div>
@endsection