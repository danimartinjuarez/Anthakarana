<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ANTHAKARANA</title>

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Styles -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/carousel.css') }}">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&family=Karma:wght@300&family=Lato:wght@900&display=swap" rel="stylesheet">

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
			<div class="container">
				<a class="navbar-brand" id="title" href="{{ url('/') }}"><img src="{{url('/img/Logo.png')}}" alt="Logo">ANTHAKARANA</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<!-- Left Side Of Navbar -->
					<ul class="navbar-nav me-auto"></ul>

					<!-- Right Side Of Navbar -->
					<ul class="navbar-nav ms-auto log-out">

						<!-- Authentication Links -->
						@guest
						@if (Route::has('login'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
						@endif

						@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>

						<li class="nav-item dropdown">
							@endif
							@else
							<a href="{{ url('/') }}" id="homelink" class="nav-link m-4 log-out">HOME</a>
							@if (Route::has('register') && Auth::user()->isAdmin === false)
							<a href="{{ route('eventssubscribed') }}" id="misEventosLink" class="nav-link m-4 log-out">MIS EVENTOS</a>
							@endif
						<li class="nav-item dropdown">
							<a id="navbarDropdown" class="nav-link dropdown m-4" alt="Salir de la aplicacion" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
								{{ Auth::user()->name }}
							</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown m-4" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">LOGOUT
							</a>

						</li>
						<li class="nav-item dropdown">
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="m-4">
								@csrf
							</form>
						</li>
						</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>
		<main>
			@yield('carousel')
			@yield('content')
		</main>
		<script src="{{ asset('JavaScript/carousel.js') }}" type="text/javascript"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</div>
</body>
<footer>
	<div class="grid-layout">
		<div class="caja-logo">
			<img class="logo-footer" src="{{url('/img/arinojologo2.png')}}" alt="logo Arinojo" />
		</div>
		<div class="caja-horario">
			<h3 style="color: rgb(250, 48, 48);">HORARIO</h3>
			<div class="horario">
				<ul>
					<li>Lunes a Viernes 9h a 20h</li>
					<li>Sábado y Domingo 13h a 20h</li>
				</ul>
			</div>
		</div>
		<div class="caja-mapa">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.2856026649556!2d-5.689064884167119!3d43.308280382683165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd365fc655555555%3A0x4f84ace831bb12f6!2sCiudad%20Industrial%20Valle%20Del%20Nal%C3%B3n%20Valnalon!5e0!3m2!1ses!2ses!4v1662302774621!5m2!1ses!2ses" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="caja-siguenos">
			<h3 style="color: rgb(250, 48, 48);">SIGUENOS</h3>
			<div class="img-footer" style="padding-left: 5px;">
				<a href="https://www.facebook.com/">
					<img src="https://cdn-icons-png.flaticon.com/128/747/747374.png" alt="icono facebook"></a>
				<a href="https://www.instagram.com/">
					<img src="https://cdn-icons-png.flaticon.com/128/725/725339.png" alt="icono Instagram"></a>
			</div>
		</div>
		<br>
		<div class="caja-copyright">
			<small>© ARI NOJO 2022 - Todos los Derechos Reservados<br>
				C/ Hornos Altos s/n - 33930 Langreo, Asturias
			</small>
		</div>
	</div>
</footer>

</html>