@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Evaladores
                        <a href="{{ route('admin.create') }}" class="btn btn-sm btn-primary pull-right">Crear Evaluador</a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Nombre</td>
                                    <td colspan="3">opción</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($users as $user)
                                    @if($user->id != Auth::user()->id)
                                        <tr>
                                            <td style="width:40px">{{ $i++ }}</td>
                                            <td style="width:50px">{{ $user->nombre }}</td>
                                            <td style="width:55px">
                                                <a href="{{ route('admin.show',$user->id) }}" class="btn"><i class="fas fa-info"></i></a>
                                            </td>
                                            <td style="width:55px">
                                                {!! Form::open(['route' => ['admin.update',$user->id],'id' => 'publi', 'method' => 'PUT']) !!}
                                                    @csrf
                                                    <button type="button" class="btn btn-link" id="activar" style="color:green"><i class="fas fa-power-off"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                            <td style="width:55px">
                                                {!! Form::open(['route' => ['admin.update',$user->id],'id' => 'publi', 'method' => 'PUT']) !!}
                                                    @csrf
                                                    <button type="button" class="btn btn-link" id="desactivar" style="color:red"><i class="fas fa-power-off"></i></button>
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ Html::script('js/ajax1.js') }}
@endsection