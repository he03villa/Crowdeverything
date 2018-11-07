@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Evaladores
                        <a href="{{ route('admin.create') }}" class="btn btn-sm btn-primary pull-right">Crear usuario</a>
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Nombre</td>
                                    <td>opcion</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($users as $user)
                                    @if($user->id != Auth::user()->id)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user->nombre }}</td>
                                            <td>
                                                <a href="{{ route('admin.show',$user->id) }}" class="btn"><i class="fas fa-info"></i></a>
                                                <a href="" style="color:green" class="btn"><i class="fas fa-power-off"></i></a>
                                                <a href="" style="color:red" class="btn"><i class="fas fa-power-off"></i></a>
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
@endsection