@extends('layouts.app')
@section('carousel')
<div class="backgroundCarrusel"></div>
<div class="container text-center my-3 carrusel">
    <h2 class="text-white">EVENTOS DESTACADOS</h2>
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($caroousels as $caroouselevent)
                @if ($caroouselevent->caroousel == true)
                @if($caroouselevent->id == 1)

                <div class="carousel-item active h-75">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-img h-100">
                                <img src="{{ $caroouselevent->image }}" class="img-fluid h-100 d-inline-flex">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if($caroouselevent->id != 1)
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card h-100">
                            <div class="card-img h-100">
                                <img src="{{ $caroouselevent->image }}" class="img-fluid h-100 d-inline-flex">
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
    <div class="container row row-cols-1 row-cols-md-3">
        @if (Auth::check() && Auth::user()->isAdmin)
        <a class=" d-inline-flex justify-content-center gap-2 m-4 link-unstyled" href="{{route ('createEvent')}}">
            <h5>New Event</h5>
            <img class="erase-img" src=" {{url('/img/AddEventButton.png')}}">
        </a>
        @endif
    </div>
    <div class="row row-cols-1 row-cols-md-4 m-4 gap-4 justify-content-center mx-5">
        @foreach ($events as $event)
        @if ($event->date < (now()) ) <div class="card bg-dark text-white">
            <a href="{{ route('showEvent', $event->id) }}" class="h-100 text-white"><img class="card-img img-fluid h-100 d-flex" src="{{ $event -> image }}" alt="Card image">
                <div class="card-img-overlay card-img-overlay overlay d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-75">
                    <h3 class="text-white">EVENTO PASADO</h3>
                    <h5 class="card-title">{{$event -> title}}</h5>
                    <p class="card-text">{{$event -> date}}</p>
                    <x-css-info />
                </div>
            </a>
    </div>
    @endif
    @if ($event->date > (now()))
    <div class="card bg-dark text-white">
        <a href="{{ route('showEvent', $event->id) }}" class="text-white h-100"><img class="card-img img-fluid h-100 d-flex align-items-end" src="{{ $event -> image }}" alt="Card image"></a>
        <div class="card-img-overlay overlay h-25 w-100 d-flex justify-content-between sticky-bottom">

            <div class="align-self-center">
                <h5 class="card-title text-white">{{$event -> title}}</h5>
                <p class="card-text text-white">{{$event -> date}}</p>
            </div>

            <div class=" align-self-center">
                <a href="{{ route('showEvent', $event->id) }}" class="text-white">
                    <x-css-info />
                </a>

                
                @if (Auth::check() && Auth::user()->isAdmin)
                <form method="post" action="{{ route('updateCaroousel', ['id'=>$event->id]) }}">
                    @method('PATCH')
                    @csrf
                    @foreach ( $caroousels as $caroouselevent)
                    @if ($caroouselevent->id == $event->id)
                    @if ($caroouselevent->caroousel == true)
                    <button name="caroousel" type="submit" class="btn btn-info" value="0">no mostrar</button>
                    @endif
                    @if ($caroouselevent->caroousel == false)
                    <button name="caroousel" type="submit" class="btn btn-info" value="1">mostrar</button>
                    @endif
                    @endif
                    @endforeach

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
