@extends('layouts.app')
@section('carousel')
<div class="backgroundCarrusel"></div>
<div class="container text-center my-3 carrusel">
    <h2 class="text-white">EVENTOS DESTACADOS</h2>
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($caroousel as $caroousels)
                @if($caroousels->id == 1)
                <div class="carousel-item active h-75">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-img h-100">
                                <img src="{{ $caroousels->image }}" class="img-fluid h-100 d-inline-flex">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($caroousels->id != 1)
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-img h-100">
                                <img src="{{ $caroousels->image }}" class="img-fluid h-100 d-inline-flex">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>
@endsection('carousel')
@section('content')
<div class="container">
    <div class="row-cols-1 row-cols-md-3">
        @if (Auth::check() && Auth::user()->isAdmin)
        <a class=" d-inline-flex justify-content-center gap-2 link-unstyled" href="{{route ('createEvent')}}">
            <p>New Event</p>
            <img class="erase-img" src=" {{url('/img/AddEventButton.png')}}">
        </a>
        @endif
    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 gap-4 justify-content-center mx-5">
        @foreach ($events as $event)
        @if ($event->date < (now()) ) <div class="card bg-dark text-white">
            <img class="card-img img-fluid h-100 d-flex" src="{{ $event -> image }}" alt="Card image">
            <div class="card-img-overlay overlay d-flex bg-dark bg-opacity-75">
                </img>
                <h3 class="text-white">EVENTO PASADO</h3>
                <div class="w-75 h-10 d-flex flex-column align-self-end text-white">
                    <h5 class="card-title">{{$event -> title}}</h5>
                    <p class="card-text">{{$event -> date}}</p>
                </div>
                <div class="w-25 h-15 d-flex flex-column align-self-end align-items-end">
                    <a href="{{ route('showEvent', $event->id) }}" class="text-white">Ver</a>
                </div>
            </div>
    </div>
    @endif
    @if ($event->date > (now()))
    <div class="card bg-dark text-white">
        <img class="card-img img-fluid h-100 d-flex" src="{{ $event -> image }}" alt="Card image">
        <div class="card-img-overlay overlay d-flex">
            </img>
            <div class="w-75 h-10 d-flex flex-column align-self-end">

                <h5 class="card-title text-white">{{$event -> title}}</h5>
                <p class="card-text text-white">{{$event -> date}}</p>
            </div>

            <div class="w-25 h-15 d-flex flex-column align-self-end align-items-end">
                <a href="{{ route('showEvent', $event->id) }}" class="text-white">Ver</a>
                <a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}"><button type="button" class="btn btn-primary text-white buttonAsist">Asistir</button></a>

                @if (Auth::check() && Auth::user()->isAdmin)

                <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center" onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                        <img class="erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                    </button>
                    <a href="{{ route('editEvent', ['id'=>$event->id]) }}">Editar</a>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endif
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $events->links() !!}
    </div>
</div>
</div>
@endsection