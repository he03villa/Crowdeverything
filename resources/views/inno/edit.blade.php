@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                {!! Form::model($proyecto,['route' => ['inno.update',$proyecto->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row">
                        <div class="col-ms-6 col-xl-6">
                            <img src="{{ Storage::url($proyecto->foto) }}" alt="" id="imagePreview" title="perfil" class="perfil-1">
                            <input type="file" name="ImageUpload" accept="imagen/jpeg, imagen/png" onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" />
                        </div>
                        <div class="col-ms-6 col-xl-4">
                            <div class="form-group">
                                <label for="nombre_proyecto">Titulo del proyecto</label>
                                <input type="text" class="form-control" name="nombre_proyecto" id="nombre_proyecto" placeholder="Ingrese el titulo del proyecto" value="{{ $proyecto->nombre_proyecto }}">
                            </div>
                            <div class="form-group">
                                <label for="total">Costo total del proyecto</label>
                                <input type="number" class="form-control" name="total" id="total" placeholder="Total" value="{{ $proyecto->total }}">
                            </div>
                            <div class="form-group ">
                                <label for="tipo_proyecto">Tipo del proyecto</label>
                                <select name="tipo_proyecto" id="tipo_proyecto" class="form-control" value="">
                                    <option>{{ $proyecto->Tipo_proyecto->nombre }}</option>
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
                                <label for="descripcion">Descripcion</label>
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="260" rows="10" placeholder="Descripcion">{{$proyecto->descripcion}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-ms-4 col-xl-4">
                            <label for="res-recurso">Recurso</label>
                            @foreach($proyecto->Recurso as $recurso)
                                <div class="form-group">
                                    <label for='re'>Recurso </label>
                                    <input type='text' class='form-control' name='nombre[]' id='re' placeholder='Nombre' value="{{ $recurso->nombre_recurso }}">
                                    <input type='number' class='form-control' name='recurso[]' id='re' placeholder='Recurso' value="{{ $recurso->costo }}">
                                    <select class='form-control' name='tipo[]'>
                                        <option>{{ $recurso->Tipo_recurso->nombre }}</option>
                                        <option>Seleccione el tipo de recurso</option>
                                        @foreach($tipo_recursos as $tipo_recurso)
                                            <option>{{ $tipo_recurso->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endforeach
                            <div id="res-recurso"></div>
                            <button id="recurso" type="button" class="btn btn-secondary" onclick="recursos({{ $tipo_recursos }})">Agregar recurso</button>
                        </div>
                        <div class="col-ms-4 col-xl-4">
                            <div class="col-ms-6" id="">
                                <label for="res-foto">Fotos</label>
                                @foreach($proyecto->Foto as $foto)
                                    <div class='form-group'>
                                        <label for='im'>Imagen</label>
                                        <input type='file' class='form-control' id='im' name='foto[]' value="{{ $foto->nombre }}">
                                    </div>
                                @endforeach
                                <div id="res-foto"></div>
                                <button id="foto" type="button" class="btn btn-secondary" onclick="fotos()">Agregar foto</button>
                            </div>
                        </div>
                        <div class="col-ms-4 col-xl-4">
                            <label for="res-redes">Redes sociales</label>
                                @foreach($proyecto->Redes as $redes1)
                                    <div class='form-group'>
                                        <label for='re'>Redes social </label>
                                        <input type='text' class='form-control' id='re' name='url[]' placeholder='Url' value="{{ $redes1->url }}">
                                        <select class='form-control' name='redes[]'>
                                            @if($redes1->redes_socials_id == 1)
                                                <option>Facebook</option>
                                            @else
                                                @if($redes1->redes_socials_id == 2)
                                                    <option>Instragran</option>
                                                @else
                                                    @if($redes1->redes_socials_id == 3)
                                                        <option>Twitter</option>
                                                    @endif
                                                @endif
                                            @endif                                            
                                            <option>Seleccione la red social</option>
                                            @foreach($redes as $rede)
                                                <option>{{ $rede->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            <div id="res-redes"></div>
                            <button id="redes" type="button" class="btn btn-secondary" onclick="rede({{ json_encode($redes) }})">Agregar redes</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection