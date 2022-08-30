@extends('layouts.app')
@section('content')

<div class="card text-bg-dark">
  <img src="{{ $event->image }}" class="card-img" alt="...">
  <div class="card-img-overlay">
    <h5 class="card-title">"{{$event -> title}}"</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text">Last updated 3 mins ago</p>
  </div>
</div>


@endsection
