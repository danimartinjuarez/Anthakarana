@extends('layouts.app')
@section('carousel')
<div class="container text-center my-3">
    <h2 class="font-weight-light">EVENTOS DESTACADOS</h2>
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($events as $event)
                <div class="carousel-item active">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="{{ $event->image }}" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">{{$event -> title}}</div>
                        </div>
                    </div>
                </div>
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
    <h5 class="mt-2 fw-light">advances one slide at a time</h5>
</div>
@endsection('carousel')
@section('content')
<div>
    <div class="col-md-3 m-5">
        <a class=" d-inline-flex justify-content-center gap-2 link-unstyled" href="{{route ('createEvent')}}">
            <p>New Event</p>
            <img class="erase-img" src=" {{url('/img/AddEventButton.png')}}">
        </a>

    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 gap-4 justify-content-center">
        @foreach ($events as $event)
        <div class="card bg-dark text-white">
            <img class="card-img img-fluid  d-flex" src="{{ $event -> image }}" alt="Card image">
            <div class="card-img-overlay overlay d-flex">
                </img>
                <div class="w-75 h-10 d-flex flex-column align-self-end">
                    <h5 class="card-title">{{$event -> title}}</h5>
                    <p class="card-text">{{$event -> date}}</p>
                </div>

                <div class="w-25 h-15 d-flex flex-column align-self-end align-items-end">
                    <div class="">
                        <label class="form-check-label" for="flexCheckDefault">Carrusel</label>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                    <button type="button" class="btn btn-primary" id="asist-button">Asistir</button>
                    <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                        @method('delete')
                        @csrf
                        <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center" onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                            <img class="erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                        </button>
                        <a href="{{ route('editEvent', ['id'=>$event->id]) }}">Editar</a>
                        
                        <a href="{{ route('showEvent', $event->id) }}">👀</a>
                </form>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection