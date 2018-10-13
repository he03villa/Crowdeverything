@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Modificar Usuario</div>
            <div class="card-body">
                {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-xl-4">
                            @if($user->foto != null)
                                <img src="{{ Storage::url($user->foto) }}" alt="" id="imagePreview" title="perfil" class="perfil-1">
                            @else
                                {{ Html::image('/img/perfil.jpg','Imagen no encontrada', array('id' => 'imagePreview', 'title' => 'perfil', 'class' => 'perfil-1')) }}
                            @endif
                            <input type="file" name="ImageUpload" accept="imagen/jpeg, imagen/png" onchange="ShowImagePreview(this, document.getElementById('imagePreview'))" />
                        </div>
                        <div class="col-sm-6 col-xl-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ $user->nombre }}" required autofocus>
                                @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ $user->apellido }}" required autofocus>
                                @if ($errors->has('apellido'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nombre_usuario">Nombre usuario</label>
                                <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control{{ $errors->has('nombre_usuario') ? ' is-invalid' : '' }}" value="{{ $user->nombre_usuario }}" required autofocus>
                                @if ($errors->has('nombre_usuario'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xl-6">
                        <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" id="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{ $user->direccion }}" required autofocus>
                                @if ($errors->has('direccion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-6">
                            <div class="form-group ">
                                <label for="ciudad">Ciudad</label>
                                <select name="ciudad" id="ciudad" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" value="{{ old('ciudad') }}" required autofocus>
                                    <option>{{ $user->Ciudad->nombre }}</option>
                                    <option>Seleccione la ciudad donde vive</option>
                                    @if($ciudades)
                                        @foreach($ciudades as $ciudad)
                                            <option>{{ $ciudad->nombre }}</option>
                                        @endforeach
                                    @else
                                        <option>No hay ciudades en la base de datos</option>
                                    @endif
                                </select>
                                @if ($errors->has('ciudad'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ciudad') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-ms-12 col-xl-12 justify-content-md-center">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection