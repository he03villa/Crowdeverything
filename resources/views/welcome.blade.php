<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        {{ Html::style('css/style.css') }}
        {{ Html::style('css/sweetalert2.min.css.css') }}
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        {{ Html::script('js/jquery.easypiechart.js') }}
        {{ Html::script('js/chart.js') }}
        {{ Html::script('js/sweetalert2.min.js') }}

        <title>Crowdeverything</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
            
    </head>
    <body>
    <nav class="navbar navbar-expand-lg narvar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav" aria-controls="#nav" aria-expanded="false" aria-label="navegador" style="color: black">
            <span class="navbar-toggler-icon"><i class="fas fa-align-justify"></i></span>
        </button>
        <a href="#" class="navbar brand">
            {{ Html::image('img/descarga.png','Imagen no encontrada', array('id' => 'logo', 'title' => 'Logo', 'class' => 'img-coll')) }}
        </a>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                @if(Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i></a>
                        </li>-->
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link"><i class="fas fa-user"></i></a>
                        </li>
                    @endauth
                @endif
            </ul>
            <div class="form-inline my-2 my-lg-0" id="search">
                <div class="input-group mb-3">
                    <input type="text" placeholder="Buscar" class="form-control"/>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
            <div class="social">
                <a href="#" class="fondo-blue"><i class="fab fa-facebook"></i></a>
                <a href="#" class="fondo_lightblue"><i class="fab fa-twitter-square"></i></a>
                <a href="#" class="fondo_lightpink"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </nav>
    <br>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div class="links">
                <a href="https://laravel.com/docs">Documentation</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
    </div>
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
    </body>
</html>
