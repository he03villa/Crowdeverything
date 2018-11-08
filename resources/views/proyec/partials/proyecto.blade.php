<div class="container">
    @if(count($proyectos) > 0)
        @for($i = 0; $i < count($proyectos); $i++)
            @php
                $valor = $datos[$i]['valor']
            @endphp
            @php
                $total = $datos[$i]['total']
            @endphp
            <div class="row">
                <div class="col-sm-12">
                    <div class="row" style="background-color: white">
                        <div class="col-ms-6 col-xl-4">
                            <img src="{{ Storage::url($proyectos[$i]->foto) }}" id="perfil" title="perfil" class="img-ms" style="margin-top:10px">
                            <h1>{{ $proyectos[$i]->nombre_proyecto }}</h1>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-justify" style="margin: 10px">
                                        {{ str_limit($proyectos[$i]->descripcion,190) }}<br>
                                        <div class="leer"><a href="{{ route('proyec.show',$proyectos[$i]->id) }}">Leer +</a></div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        @endfor
    @else
        <h1>No hay proyecto registrado</h1>
    @endif
</div>