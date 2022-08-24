@extends('layouts.app')

@section('content')

<div class="row row-cols-1 row-cols-md-3 g-4 ">
@foreach ($events as $event)
<div class="card bg-dark text-white">
  <img class="card-img" src= "{{ $event -> image }}" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">{{$event -> title}}</h5>
    <p class="card-text">{{$event -> date}}</p>
    <div class="card-footer" style="background-color: transparent; border-top: 50%">
      <div style="margin-top:30%;">
          <label class="form-check-label" for="flexCheckDefault">
          carrusel
          </label>
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"/>
      </div>
      <button type="button" class="btn btn-primary" style="background-color: #607BF3; margin-left: 70%; margin-top: -30%;">Asistir</button>
    </div>
  </div>
</div>

@endforeach
</div>
@endsection
