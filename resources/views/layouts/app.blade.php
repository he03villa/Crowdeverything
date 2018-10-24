<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="http://127.0.0.1:8000/js/sweetalert2.min.js"></script>
    {{ Html::script('js/scrip.js') }}
    {{ Html::script('js/jquery.easypiechart.js') }}
    {{ Html::script('js/chart.js') }}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/sweetalert2.min.css') }}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg narvar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="#nav" aria-expanded="false" aria-label="navegador" style="color: black">
                <span class="navbar-toggler-icon"><i class="fas fa-align-justify"></i></span>
            </button>
            <a class="navbar brand" href="{{ url('/') }}">
                {{ Html::image('img/descarga.png','Imagen no encontrada', array('id' => 'logo', 'title' => 'Logo', 'class' => '')) }}
            </a>
            <div class="collapse navbar-collapse" id="nav">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-user"></i></a>
                        </li>
                    @else
                        <li class="nav-item">
                            <div class="dropdown show">
                                <a href="#" class="btn dropdown-toggle" role="button" id="dropwdownmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(Auth::user()->foto)
                                        <img src="{{ Storage::url(Auth::user()->foto) }}" id="perfil" title="perfil" class="perfil">
                                    @else
                                        {{ Html::image('img/perfil.jpg','Imagen no encontrada', array('id' => 'perfil', 'title' => 'perfil', 'class' => 'perfil')) }}
                                    @endif
                                    {{ Auth::user()->nombre_usuario }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropwdownmenu">
                                    @can('user.perfil')
                                        <a class="dropdown-item" href="{{ route('user.perfil',Auth::user()) }}">Perfil</a>
                                    @endcan
                                    @can('eva.index')
                                        <a class="dropdown-item" href="{{ route('eva.index') }}">Evaluador</a>
                                    @endcan
                                    @can('admin.index')
                                        <a class="dropdown-item" href="{{ route('admin.index') }}">Administrador</a>
                                    @endcan
                                    <a href="{{ route('logout') }}" class="dropdown-item"
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                        Cerrar sesion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endguest
                </ul>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="blockquote-footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xl-4">
                        <label>Redes Sociales</label>
                        <div class="social">
                            <a href="#" class="fondo-blue"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="fondo_lightblue"><i class="fab fa-twitter-square"></i></a>
                            <a href="#" class="fondo_lightpink"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xl-4">
                        <label>Contactanos</label><br>
                        <label class="no-social">Correo</label><br>
                        <label class="no-social">Telefono</label><br>
                    </div>
                    <div class="col-sm-4 col-xl-4"></div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
