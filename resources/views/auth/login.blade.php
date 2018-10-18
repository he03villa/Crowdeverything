@extends('layouts.app')

@section('content')
<div class="loginbox">
    {{ Html::image('img/avatar.jpg','No a encontrado la imagen', array('title' => 'perfil', 'class' => 'avatar')) }}
    <h1 class ="titulo_login">Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <p>Correo</p>
        <input id="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Ingrese el correo">
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <p>Contraseña</p>
        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Ingrese la contraseña">
        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input type="submit" value="Login">
        <div class="form-check">
            <label for="remember" style="color:black">Recordar contraseña <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></label>
        </div>
        <a class="btn btn-link" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a><br>
        <a class="btn btn-link" href="{{ route('user.create') }}">Registrar</a>
    </form>
</div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
