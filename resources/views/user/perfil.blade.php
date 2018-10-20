@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-ms-6 col-xl-4">
            @if($user->foto != null)
                <img src="{{ Storage::url(Auth::user()->foto) }}" id="perfil" title="perfil" class="perfil-1">
            @else
                {{ Html::image('img/perfil.jpg','Imagen no encontrada', array('id' => 'perfil', 'title' => 'perfil', 'class' => 'perfil-1')) }}
            @endif
            </div>
            <div class="col-ms-6 col-xl-6">
                <label for="">Nombre</label> <label for="">{{ $user->nombre }}</label><br>
                <label for="">Apellido</label> <label for="">{{ $user->apellido }}</label><br>
                <label for="">Correo</label> <label for="">{{ $user->email }}</label><br>
                <label for="">Nombre usuario</label> <label for="">{{ $user->nombre_usuario }}</label><br>
                <label for="">Dirección</label> <label for="">{{ $user->direccion }}</label><br>
                @can('user.edit')
                    <a href="{{ route('user.edit',$user) }}" class="btn btn-secondary">Modificar</a>
                @endcan                
            </div>
        </div>
        <div class="row">
            <div class="col-ms-6 col-xl-6">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opcion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @if(count($user->Proyecto) != 0)
                            @foreach($user->Proyecto as $proyecto)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $proyecto->nombre_proyecto }}</td>
                                    <td>
                                        <a href="{{ route('inno.show',$proyecto) }}" class="btn"><i class="fas fa-info"></i></a>
                                        <a href="{{ route('inno.edit',$proyecto) }}" class="btn"><i class="fas fa-pencil-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3">Este usuario no ha creado ningún proyecto</td>
                            </tr> 
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-ms-6 col-xl-6">
                <p>Esta opción es para guardar los proyectos en la aplicación web</p>
                <a href="{{ route('inno.index') }}" class="btn">Agregar proyecto <i class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>
@endsection