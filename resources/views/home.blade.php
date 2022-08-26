@extends('layouts.app')

@section('content')
<div>
    <div>
        <a href="{{route ('createEvent')}}">
            <p>New Event</p>
        </a>
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 gap-4 justify-content-center">
        @foreach ($events as $event)
        <div class="card bg-dark text-white">
            <img class="card-img" src="{{ $event -> image }}" alt="Card image">
            <div class="card-img-overlay h-100 d-flex justify-content-end flex-column" id="card-image">
                <div class="w-50">
                    <h5 class="card-title">{{$event -> title}}</h5>
                    <p class="card-text">{{$event -> date}}</p>
                </div>
                <div class="w-50">
                    <div class="row-cols-md-3 g-4" id="card-footer">
                        <div class="card-title " id="carrousel-button">
                            <label class="form-check-label" for="flexCheckDefault">Carrusel</label>
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                        <button type="button" class="btn btn-primary" id="asist-button">Asistir</button>
                        <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                            @method('delete')
                            @csrf
                            <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center" onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                                <img class="erase-img" src=" {{url('/img/Vector.svg')}}">
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @endforeach
    </div>
    @endsection
</div>