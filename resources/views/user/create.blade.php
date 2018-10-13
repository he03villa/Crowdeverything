@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="width:725px;margin-left:190px">
        <div class="card-header">
            {{ __('Register') }}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-ms-6">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{ old('nombre') }}" required autofocus>
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
                            <input type="text" name="apellido" id="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" value="{{ old('apellido') }}" required autofocus>
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
                            <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>
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
                            <input type="text" name="telefono" id="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" value="{{ old('telefono') }}" required autofocus>
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
                            <label for="identificacion">Identificacion</label>
                            <input type="text" name="identificacion" id="identificacion" class="form-control{{ $errors->has('identificacion') ? ' is-invalid' : '' }}" value="{{ old('identificacion') }}" required autofocus>
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
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{ old('direccion') }}" required autofocus>
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
                            <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control{{ $errors->has('nombre_usuario') ? ' is-invalid' : '' }}" value="{{ old('nombre_usuario') }}" required autofocus>
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
                            <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required autofocus>
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
    <!--<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
    </div>-->
</div>
@endsection
