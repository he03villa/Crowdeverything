@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a href="#no-publicada" class="nav-link active" role="tab" data-toggle="tab">Proyecto no publicados</a>
            </li>
            <li class="nav-item">
                <a href="#si-publicada" class="nav-link" role="tab" data-toggle="tab">Proyecto publicados</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="no-publicada" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Proyecto
                            </div>
                            <div class="card-body">
                                <table id="table-1" class="table table-hover">
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
                                            @if($proyecto->publicacion == 0)
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
            </div>
            <div class="tab-panel fade" id="si-publicada" role="tabpanel">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                Proyecto
                            </div>
                            <div class="card-body">
                                <table id="table-2" class="table table-hover">
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
            </div>
        </div>
    </div>
    {{ Html::script('js/ajax1.js') }}
@endsection