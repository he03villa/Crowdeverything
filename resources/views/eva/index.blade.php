@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Proyecto
                    </div>
                    <div class="card-body">
                        <table id="table" class="table table-hover">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Proyecto</td>
                                    <td>Creador</td>
                                    <td>Fecha de creacion</td>
                                    <td>opción</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=1;
                                @endphp
                                @foreach($proyectos as $proyecto)
                                    @if($proyecto->publicacion == 1)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $proyecto->nombre_proyecto }}</td>
                                            <td>{{ $proyecto->User->nombre }}</td>
                                            <td>{{ $proyecto->created_at }}</td>
                                            <td>
                                                <a href="{{ route('eva.show',$proyecto->id) }}" class="btn"><i class="fas fa-info"></i></a>
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