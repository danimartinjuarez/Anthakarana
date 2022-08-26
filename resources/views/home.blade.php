@extends('layouts.app')
@section('carousel')
<div class="container text-center my-3">
    <h2 class="font-weight-light">Bootstrap Multi Slide Carousel</h2>
    <div class="row mx-auto my-auto justify-content-center">
        <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 1</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="//via.placeholder.com/500x400/e66?text=2" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 2</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="//via.placeholder.com/500x400/7d2?text=3" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 3</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="//via.placeholder.com/500x400?text=4" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 4</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="//via.placeholder.com/500x400/aba?text=5" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 5</div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img">
                                <img src="//via.placeholder.com/500x400/fc0?text=6" class="img-fluid">
                            </div>
                            <div class="card-img-overlay">Slide 6</div>
                        </div>
                    </div>
                </div>
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
  <div>
    <a href="{{route ('createEvent')}}">
      <p>New Event</p>
    </a>
  </div>
  <div class="row row-cols-1 row-cols-md-3 g-4 ">
  @foreach ($events as $event)

    <div class="card bg-dark text-white">
        <img class="card-img" src="{{ $event -> image }}" alt="Card image">
        <div class="card-img-overlay" id="card-image">
            <h5 class="card-title">{{$event -> title}}</h5>
            <p class="card-text">{{$event -> date}}</p>
            <div class="row-cols-md-3 g-4" id="card-footer">
                <div class="card-title " id="carrousel-button">
                    <label class="form-check-label" for="flexCheckDefault">
                        carrusel
                    </label>

                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
                <button type="button" class="btn btn-primary" id="asist-button">Asistir</button>
                <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                    @method('delete')
                    @csrf
                    <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center"
                        onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                        <img class="erase-img" src=" {{url('/img/Vector.svg')}}">
                    </button>
                </form>
            </div>
        </div>
    </div>

    @endforeach
</div>


@endsection
