@extends('layouts.app')
@section('content')
{{ $eventsuscribe }}


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

    <div class="d-flex gap-3">
      <img src="{{ URL('/img/Turnouticon.png')}}">
      <p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
    </div>




    <button type="button" class="btn btn-primary"><a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}">Asistir</a></button>

    <button type="button" class="btn btn-secondary"><a href="{{ route('unscribeEvent', ['id'=>$event->id]) }}">Desinscribirse</a></button>


</div>

</div>

@endsection
