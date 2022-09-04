@extends('layouts.app')
@section('content')
<div class="row row-cols-1 row-cols-md-4 g-4 gap-4 justify-content-center m-3">
    @foreach ($user->event as $event)
    <div class="card bg-dark text-white">
        <img class="card-img img-fluid h-100 d-flex" src="{{ $event -> image }}" alt="Card image">
        <div class="card-img-overlay overlay d-flex">
            <div class="w-75 h-10 d-flex flex-column align-self-end">
                <h5 class="card-title">{{$event -> title}}</h5>
                <p class="card-text">{{$event -> date}}</p>
            </div>

            <div class="w-25 h-15 d-flex flex-column align-self-end align-items-center gap-1">

                <a href="{{ route('showEvent', $event->id) }}" class="text-white">
                    <x-css-info />
                </a>
                @if (Auth::check())

                @if ($event->pivot->event_id === $event->id)
                <a href="{{ route('unscribeEvent', $event->id) }}" onclick="return confirm('¿Estás seguro de querer desinscibirte de este evento? {{ $event->name }}')"><button type="button" class="btn btn-secondary">Desinscribirse</button></a>

                @endif
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection