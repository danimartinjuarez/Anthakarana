@extends('layouts.app')

@section('content')
<h1>holaaaaa</h1>
<div>
@foreach ($events as $event)
<div class="card bg-dark text-white">
  <img class="card-img" src= "{{ $event -> image }}" alt="Card image">
  <div class="card-img-overlay">
    <h5 class="card-title">{{$event -> title}}</h5>
    <p class="card-text">{{$event -> date}}/p>
    
  </div>
</div>

@endforeach
</div>
@endsection
