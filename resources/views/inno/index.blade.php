@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['route' => 'inno.store', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-ms-6 col-xl-6">
                            {{ Html::image('/img/perfil-proyectos.jpg','Imagen no encontrada', array('id' => 'imagePreview', 'title' => 'perfil', 'class' => 'perfil-1')) }}
                            <div id="estilo-foto">
                                <p> <i class="fas fa-file-image"></i> Agregar foto</p>
                                <input type="file" id="foto" name="ImageUpload" accept="imagen/jpeg, imagen/png" onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" />
                            </div>
                        </div>
                        <div class="col-ms-6 col-lx-4">
                            <div class="form-group">
                                <label for="nombre_proyecto">Titulo del proyecto</label>
                                <input type="text" class="form-control" name="nombre_proyecto" id="nombre_proyecto" placeholder="Ingrese el titulo del proyecto">
                            </div>
                            <div class="form-group">
                                <label for="tipo_proyecto">Tipo del proyecto</label>
                                <select name="tipo_proyecto" id="tipo_proyecto" class="form-control">
                                    <option>Seleciones el tipo del proyecto</option>
                                    @if($tipo_proyectos)
                                        @foreach($tipo_proyectos as $tipo_proyecto)
                                            <option>{{ $tipo_proyecto->nombre }}</option>
                                        @endforeach
                                    @else
                                        <option>No hay tipo documento en la base de datos</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-ms-12 col-xl-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="260" rows="10" placeholder="Ingrese la descripción"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-ms-4 col-xl-4">
                            <label for="res-recurso">Recurso</label>
                            <div id="res-recurso"></div>
                            <button id="recurso" type="button" class="btn btn-secondary" onclick="recursos({{ $tipo_recursos }})">Agregar <i class="fas fa-plus"></i> recurso</button>
                        </div>
                        <div class="col-ms-4 col-xl-4">
                            <div class="col-ms-6" id="">
                                <label for="res-foto">Fotos</label>
                                <div id="res-foto"></div>
                                <button id="foto1" type="button" class="btn btn-secondary" onclick="fotos()">Agregar <i class="fas fa-plus"></i> foto</button>
                            </div>
                        </div>
                        <div class="col-ms-4 col-xl-4">
                            <label for="res-redes">Redes sociales</label>
                            <div id="res-redes"></div>
                            <button id="redes" type="button" class="btn btn-secondary" onclick="rede({{ json_encode($redes) }})">Agregar <i class="fas fa-plus"></i> redes</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-ms-12 col-col-xl-12">
                            <div class="form-group">
                                <label for="" class="center">Acepta los terminos</label><br>
                                <div class="container_radio">
                                    <input type="radio" name="opcion"> Si
                                    <input type="radio" name="opcion"> No
                                </div>
                                <div class="ordenar-2">
                                    <button class="btn btn-secondary" id="aceptar" type="submit">Acepta</button>
                                    <a href="{{ route('user.perfil',Auth::user()) }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection