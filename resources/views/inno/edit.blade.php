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
                            <img src="{{ Storage::url($proyecto->foto) }}" alt="" id="imagePreview" title="perfil" class="perfil-1"><br>
                            <div id="estilo-foto">
                                <p> <i class="fas fa-file-image"></i> Agregar foto</p>
                                <input type="file" id="foto" name="ImageUpload" accept="imagen/jpeg, imagen/png" onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" />
                            </div>
                        </div>
                        <div class="col-ms-6 col-xl-4">
                            <div class="form-group">
                                <label for="nombre_proyecto">Titulo del proyecto</label>
                                <input type="text" class="form-control" name="nombre_proyecto" id="nombre_proyecto" placeholder="Ingrese el titulo del proyecto" value="{{ $proyecto->nombre_proyecto }}">
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
                                <label for="descripcion">Descripción</label>
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
                                    <select class='form-control' name='tipo[]'>
                                        <option>{{ $recurso->Tipo_recurso->nombre }}</option>
                                        <option>Seleccione el tipo de recurso</option>
                                        @foreach($tipo_recursos as $tipo_recurso)
                                            <option>{{ $tipo_recurso->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @if($recurso->tipo_recurso_id == 1)
                                        <input type="hidden" name="id[]" value="{{ $recurso->id }}">
                                        <input type='number' class='form-control' name='recurso[]' id='re' placeholder='Recurso' value="{{ $recurso->costo }}">
                                    @else
                                        <input type="hidden" name="id[]" value="{{ $recurso->id }}">
                                        <input type='text' class='form-control' name='nombre[]' id='re' placeholder='Nombre' value="{{ $recurso->nombre_recurso }}">
                                        <input type='number' class='form-control' name='recurso[]' id='re' placeholder='Recurso' value="{{ $recurso->costo }}">
                                    @endif
                                </div>
                            @endforeach
                            <div id="res-recurso"></div>
                            <button id="recurso" type="button" class="btn btn-secondary" onclick="recursos({{ $tipo_recursos }})">Agregar recurso</button>
                        </div>
                        <div class="col-ms-8 col-xl-8">
                            <label for="res-foto">Fotos</label>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Foto</td>
                                        <td>opción</td>
                                    </tr>
                                </thead>
                                <tbody id="ima1">
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach($proyecto->Foto as $foto)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <input type="hidden" name="foto_id[]" value="{{ $foto->id }}">
                                            <td><img src="{{ Storage::url($foto->nombre) }}" alt="" id="{{ 'imagePreview'.$i}}" title="perfil" width = "100px" height ="80px"></td>
                                            <td>
                                                <div id="estilo-foto">
                                                    <p> <i class="fas fa-file-image"></i> Agregar foto</p>
                                                    <input type='file' id='foto' name='foto[]' onchange="ShowImagePreview(this, document.getElementById('{{ 'imagePreview'.$i }}'))">
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table><br>
                            <button type="button" class="btn btn-primary" onclick="imagen({{ $i }})">Agregar Foto</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col ms-5 col-xl-5">
                            <label for="res-redes">Redes sociales</label>
                                @foreach($proyecto->Redes as $redes1)
                                    <div class='form-group'>
                                        <label for='re'>Redes social </label>
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
                                        <input type="hidden" name="redes1[]" value="{{ $redes1->id }}">
                                        <input type='text' class='form-control' id='re' name='url[]' placeholder='Url' value="{{ $redes1->url }}">
                                    </div>
                                @endforeach
                            <div id="res-redes"></div>
                            <button id="redes" type="button" class="btn btn-secondary" onclick="rede({{ json_encode($redes) }})">Agregar redes</button>
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