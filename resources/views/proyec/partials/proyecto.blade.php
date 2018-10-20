<div class="container">
    @if(count($proyectos) > 0)
        @foreach($proyectos as $proyec)
            <div class="row">
                <div class="col-sm-12">
                    <div class="row" style="background-color: white">
                        <div class="col-ms-6 col-xl-4">
                            <img src="{{ Storage::url($proyec->foto) }}" id="perfil" title="perfil" class="img-ms" style="margin-top:10px">
                            <h1>{{ $proyec->nombre_proyecto }}</h1>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-justify" style="margin: 10px">
                                        {{ str_limit($proyec->descripcion,190) }}<br>
                                        <div class="leer"><a href="{{ route('proyec.show',$proyec->id) }}">Leer +</a></div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endforeach
    @else
        <h1>No hay proyecto registrado</h1>
    @endif
</div>