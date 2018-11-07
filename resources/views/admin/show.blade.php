@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-ms-4 col-xl-4">
                @if($user->foto != null)
                    <img src="{{ Storage::url(Auth::user()->foto) }}" id="perfil" title="perfil" class="perfil-1">
                @else
                    {{ Html::image('img/perfil.jpg','Imagen no encontrada', array('id' => 'perfil', 'title' => 'perfil', 'class' => 'perfil-1')) }}
                @endif
            </div>
            <div class="col-ms-4 col-xl-3">
                <label for="">Nombre: </label> <label for="">{{ $user->nombre }}</label><br>
                <label for="">Apellido: </label> <label for="">{{ $user->apellido }}</label><br>
                <label for="">Correo: </label> <label for="">{{ $user->email }}</label><br>
                <label for="">Nombre usuario: </label> <label for="">{{ $user->nombre_usuario }}</label><br>
                <label for="">Dirección: </label> <label for="">{{ $user->direccion }}</label><br>
                <label for="">Ciudad: : </label> <label for="">{{ $user->Ciudad->nombre }}</label><br>
            </div>
            <div class="col-ms-4 col-xl-2">
                <label for="">Telefono: </label> <label for="">{{ $user->telefono }}</label><br>
                @if($user->estado == 1)
                    <label for="">Estado: Activo</label><br>
                @else
                    <label for="">Estado: Desactivo</label><br>
                @endif
            </div>
        </div>
    </div>
@endsection