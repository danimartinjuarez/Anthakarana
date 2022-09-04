@extends('layouts.app')
@section('content')
<div class="row row-cols-1 row-cols-md-4 g-4 gap-4 justify-content-center m-3">
    @foreach ($user->event as $event)
    <div class="card bg-dark text-white">
        <img class="card-img img-fluid h-100" src="{{ $event -> image }}" alt="Card image">
        <div class="card-img-overlay overlay h-100 w-100 d-flex justify-content-between ">
            <a href="{{ route('showEvent', $event->id) }}" class="text-white">
                <x-css-info />
            </a>
            <div class="bg-card">
                <div class="align-self-center ms-3 py-2">
                    <p class="card-title text-white" id="info">{{$event -> title}}</p>
                    <p class="card-text text-white" id="info">{{$event -> date}}</p>
                </div>

                <div class="align-self-center d-flex flex-column align-items-center justify-content-center me-3 py-2">

                    @if (Auth::check())

                    @if ($event->pivot->event_id === $event->id)
                    <a href="{{ route('unscribeEvent', $event->id) }}" onclick="return confirm('¿Estás seguro de querer desinscibirte de este evento? {{ $event->name }}')"><button type="button" class="btn btn-secondary">Desinscribirse</button></a>

                    @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection