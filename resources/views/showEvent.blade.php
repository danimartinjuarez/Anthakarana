@extends('layouts.app')
@if (Auth::check() && Auth::user()->isAdmin)
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

        <div class="d-flex gap-3">
            <img src="{{ URL('/img/Turnouticon.png')}}">
            <p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
        </div>

        <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center" onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                        <img class="erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                    </button>
                    <a href="{{ route('editEvent', ['id'=>$event->id]) }}">Editar</a>

                    @if(($event -> sub_people)>=($event -> total_people))
                    <button type="button" class="btn btn-primary" onclick="return confirm('Evento completo')" id="asist-button">Asistir</button>
                    @endif
                    @if(($event -> sub_people)<($event -> total_people))

                        <a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}"><button type="button" class="btn btn-primary buttonAsist text-white" onclick="('Evento completo')" id="asist-button">Asistir</button></a>

                        @endif
                </form>



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

        <div class="d-flex gap-3">
            <img src="{{ URL('/img/Turnouticon.png')}}">
            <p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
        </div>





        <button type="button" class="btn btn-secondary"><a
                href="{{ route('unscribeEvent', $event->id) }}" onclick="return confirm('¿Estás seguro de querer desapuntarse de este evento? {{$event->name}} -ID {{ $event -> id }}')">Desinscribirse</a></button>


    </div>

</div>
@endsection
@break
@endif
@endforeach
@endif

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

        <div class="d-flex gap-3">
            <img src="{{ URL('/img/Turnouticon.png')}}">
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

@endsection
