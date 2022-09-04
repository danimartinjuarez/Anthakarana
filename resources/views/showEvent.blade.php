@extends('layouts.app')
@if (Auth::check() && Auth::user()->isAdmin)
@section('content')
<div class="container col-4 my-4">
	<div class="card">
		<div class=" p-3 mb-2 bg-warning text-dark d-flex justify-content-start align-items-center gap-2">
			<img class="erase-img  h-75" src=" {{url('/img/InfoIconModal.png')}}">
			<span class="fs-4 fw-bold">Información del Evento</span>
		</div>
		<div class="info d-flex flex-column justify-content-evenly mx-4">
			<h5 class="card-title">Evento:</h5>
			<p class="card-title">{{$event -> title}}</p>
			<h5 class="card-title">Descripción:</h5>
			<p class="card-text">{{ $event -> description }}</p>
		</div>
		<div class="date d-flex gap-5 mx-4 my-2">
			<div class="d-flex flex-column">
				<h5 class="card-title">Fecha Inicio:</h5>
				<p class="card-text">{{ $event -> date }}</p>
			</div>
			<div class="d-flex  flex-column">
				<h5 class="card-title">Hora:</h5>
				<p class="card-text">{{ $event -> start_hour }}</p>
			</div>
		</div>
		<div class="buttons d-flex flex-wrap justify-content-around align-items-center my-2">
			<div class="d-flex gap-3 align-items-center">
				<img class="h-50" src="{{ URL('/img/Turnouticon.png')}}">
				<p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
			</div>
			<div class="link-unstyled d-flex">
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
					Eliminar
				</button>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header d-flex align-items-center justify-content-center w-100">
							<img class=" align-item-center" src="{{url('/img/Logo.png')}}" alt="Logo">
						</div>
						<div class="modal-body">
							<form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
								@method('delete')
								@csrf
								<h5 class="text-center my-2">¿Esta seguro que quiere borrar el evento <em>{{ $event->title }}</em> ?</h5>
								<div class="d-flex gap-3 bd-highlight justify-content-center gap-5 m-3">
									<button type="submit" class="btn btn-danger">SI</button>
									<button type="button" class="close btn btn-primary" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">NO</span>
									</button>
								</div>
							</form>
						</div>

					</div>
				</div>
			</div>
			@if(($event -> sub_people)>=($event -> total_people))
			<button type="button" class="btn btn-primary" onclick="return confirm('Evento completo')" id="asist-button">Asistir</button>
			@endif
			@if(($event -> sub_people)<($event -> total_people))
				<a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}"><button type="button" class="btn btn-primary buttonAsist text-white" onclick="('Evento completo')" id="asist-button">Asistir</button></a>
				@endif
				</form>

				<!-- Button trigger modal -->
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Editar</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="modal-header bg-warning text-dark d-flex align-items-center">
								<h5 class="modal-title" id="exampleModalLabel"><img class="erase-img me-3" src="/img/EditButonIcon.png" alt="Boton de editar">Editar evento</h5>
								<button type="button" class="close bg-transparent border-0" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form class="d-flex flex-column justify-content-center m-2" action="{{ route('eventupdate', ['id'=>$event->id]) }}" method="post">
									@method('PATCH')
									@csrf
									<div class="form-group d-flex flex-column m-2 ">
										<label for="exampleFormControlInput1">Nombre</label>
										<input type="text" name="title" class="form-contro" id="exampleFormControlInput1" value="{{ $event -> title }}">
									</div>
									<div class="form-group d-flex flex-column m-2">
										<label for="exampleFormControlInput1">Descripcion</label>
										<input type="text" name="description" class="form-contro" id="exampleFormControlInput1" value="{{ $event -> description }}">
									</div>
									<div class="form-group d-flex flex-column m-2">
										<label for="exampleFormControlInput1">nº Plazas</label>
										<input type="number" name="total_people" class="form-contro" id="exampleFormControlInput1" value="{{ $event -> total_people }}">
									</div>
									<div class="form-group d-flex flex-column m-2">
										<label for="exampleFormControlInput1">URL Imagen</label>
										<input type="text" name="image" class="form-contro" id="exampleFormControlInput1" value="{{ $event -> image }}">
									</div>
									<div class="form-group d-flex flex-column m-2">
										<label for="exampleFormControlInput1">Fecha del evento</label>
										<input type="date" name="date" class="form-contro" id="exampleFormControlInput1" value="{{ $event -> date }}">
									</div>
									<div class="form-group d-flex flex-column m-2">
										<label for="exampleFormControlInput1">Hora del evento</label>
										<input type="time" name="start_hour" class="form-contro" id="exampleFormControlInput1" value="{{ $event -> start_hour }}">
									</div>
									<div class="d-flex gap-3 bd-highlight justify-content-evenly m-3">
										<button type="submit" class="btn btn-primary" value="Create" onclick="return confirm('¿Estás seguro de querer modificar este evento? {{$event->name}}')">Aceptar</button>
										<a class="btn btn-danger" href="{{ route('showEvent', $event -> id) }}">Cancelar</a>
									</div>
							</div>
						</div>
						</form>
					</div>
				</div>
		</div>

	</div>

</div>
@endsection
@endif

@if (Auth::check())
@foreach ($eventsuscribe as $eventsubcribed )
@if ($event->id == $eventsubcribed->pivot->event_id)
@section('content')
<div class="card">

	<div class="card-img-overlay">
		<h5 class="card-title">Evento:</h5>
		<p class="card-title">{{$event -> title}}</p>
		<h5 class="card-title">Descripción:</h5>
		<p class="card-text">{{ $event -> description }}</p>
		<h5 class="card-title">Comienzo:</h5>
		<div class="d-flex gap-5">
			<h5 class="card-title">Fecha Inicio:</h5>
			<h5 class="card-title">Hora:</h5>
		</div>
		<div class="d-flex gap-5">
			<p class="card-text">{{ $event -> date }}</p>
			<p class="card-text">{{ $event -> start_hour }}</p>
		</div>
		<div class="buttons d-flex flex-wrap justify-content-around align-items-center my-2">
			<img src="{{ URL('/img/Turnouticon.png')}}">
			<p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
		</div>
		<button type="button" class="btn btn-secondary"><a href="{{ route('unscribeEvent', $event->id) }}" onclick="return confirm('¿Estás seguro de querer desapuntarse de este evento? {{$event->name}} -ID {{ $event -> id }}')">Desinscribirse</a></button>
	</div>
</div>
@endsection
@break
@endif
@endforeach
@endif

@section('content')
<div class="container col-3 my-4">
	<div class="card">
		<div class=" p-3 mb-2 bg-warning text-dark d-flex justify-content-start align-items-center gap-2">
			<img class="erase-img  h-75" src=" {{url('/img/InfoIconModal.png')}}">
			<span class="fs-4 fw-bold">Información del Evento</span>
		</div>
		<div class="info d-flex flex-column justify-content-evenly mx-4">
			<h5 class="card-title">Evento:</h5>
			<p class="card-title">{{$event -> title}}</p>
			<h5 class="card-title">Descripción:</h5>
			<p class="card-text">{{ $event -> description }}</p>
		</div>
		<div class="date d-flex flex-wrap gap-5 mx-4 my-2">
			<div class="d-flex flex-column">
				<h5 class="card-title">Fecha Inicio:</h5>
				<p class="card-text">{{ $event -> date }}</p>
			</div>
			<div class="d-flex flex-column">
				<h5 class="card-title">Hora:</h5>
				<p class="card-text">{{ $event -> start_hour }}</p>
			</div>
		</div>
		<div class="buttons d-flex flex-wrap justify-content-around align-items-center my-2">
			<div class="d-flex gap-2 align-items-center">
				<img class="h-50" src="{{ URL('/img/Turnouticon.png')}}">
				<p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
			</div>
			@if(($event -> sub_people)>=($event -> total_people))
			<button type="button" class="btn btn-primary" onclick="return confirm('Evento completo')" id="asist-button">Asistir</button>
			@endif
			@if(($event -> sub_people)<($event -> total_people))
				<a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}"><button type="button" class="btn btn-primary buttonAsist text-white" onclick="('Evento completo')" id="asist-button">Asistir</button></a>
				@endif
		</div>
	</div>
</div>
@endsection