@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width:725px;margin-left:190px">
        <div class="card-header">
            {{ __('Register') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-ms-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}" required autofocus placeholder="Ingrese el nombre">
                            @if ($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-ms-6">
                        <div class="form-group ">
                            <label for="apellido">Apellido</label>
                            <input type="text" name="apellido" id="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ old('apellido') }}" required autofocus placeholder="Ingrese el apellido">
                            @if ($errors->has('apellido'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-ms-6">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus placeholder="Ingrese un correo electrónico">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-ms-6">
                        <div class="form-group ">
                            <label for="telefono">Telefono</label>
                            <input type="text" name="telefono" id="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') }}" required autofocus placeholder="Ingrese un telefono">
                            @if ($errors->has('telefono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('telefono') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-ms-6">
                        <div class="form-group">
                            <label for="identificacion">Identificación</label>
                            <input type="text" name="identificacion" id="identificacion" class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}" value="{{ old('identificacion') }}" required autofocus placeholder="Ingrese una identificación">
                            @if ($errors->has('identificacion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identificacion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-ms-6">
                        <div class="form-group ">
                            <label for="tipo_documento">Tipo de documento</label>
                            <select name="tipo_documento" id="tipo_documento" class="form-control{{ $errors->has('tipo_documento') ? ' is-invalid' : '' }}" value="{{ old('tipo_documento') }}" required autofocus>
                                <option>Seleciones el tipo de documento</option>
                                @if($tipo_documentos)
                                    @foreach($tipo_documentos as $tipo_documento)
                                        <option>{{ $tipo_documento->nombre }}</option>
                                    @endforeach
                                @else
                                    <option>No hay tipo documento en la base de datos</option>
                                @endif
                            </select>
                            @if ($errors->has('tipo_documento'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo_documento') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-ms-6">
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input type="text" name="direccion" id="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{ old('direccion') }}" required autofocus placeholder="Ingrese una dirección">
                            @if ($errors->has('direccion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('direccion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-ms-6">
                        <div class="form-group ">
                            <label for="ciudad">Ciudad</label>
                            <select name="ciudad" id="ciudad" class="form-control{{ $errors->has('ciudad') ? ' is-invalid' : '' }}" value="{{ old('ciudad') }}" required autofocus>
                                <option>Seleciones la ciudad de residencia</option>
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
                <div class="row justify-content-center">
                    <div class="col-ms-12">
                        <div class="form-group">
                            <label for="nombre_usuario">Nombre de usuario</label>
                            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control{{ $errors->has('nombre_usuario') ? ' is-invalid' : '' }}" value="{{ old('nombre_usuario') }}" required autofocus placeholder="Ingrese una contraseña">
                            @if ($errors->has('nombre_usuario'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('nombre_usuario') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-ms-6">
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required autofocus placeholder="Confirme contraseña">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-ms-6">
                        <div class="form-group ">
                            <label for="password-confirm">Confirmar contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-ms-12 col-xl-12">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" cols="260" rows="10" placeholder="Ingrese una descripción"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
