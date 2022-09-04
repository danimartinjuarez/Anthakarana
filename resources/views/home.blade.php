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
    <!-- Button trigger modal -->

    <div class=" d-inline-flex justify-content-center gap-2 m-4 link-unstyled" data-toggle="modal" data-target="#exampleModal"">
            <h5>Añadir Evento</h5>
            <img class=" erase-img" src=" {{url('/img/AddEventButton.png')}}">
    </div>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header p-3 mb-2 bg-warning text-dark">
            <img class=" erase-img" src=" {{url('/img/AddEventButton.png')}}">
            <h5 class="modal-title" id="exampleModalLabel">AÑADIR NUEVO EVENTO</h5>

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="justify-content-center col-md-3 m-5" action="{{ route('storeEvent') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del Evento</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Descripción</label>
                <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Número de Plazas</label>
                <input type="number" name="total_people" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">URL Imagen</label>
                <input type="text" name="image" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Fecha del Evento</label>
                <input type="date" name="date" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Hora del Evento</label>
                <input type="time" name="start_hour" class="form-control" id="exampleFormControlInput1" placeholder="">
              </div>
              <div class="d-flex justify-content-between p-4">
                <!-- <div class="btnCreate"> -->
                <button type="submit" class="btn btn-outline-success" value="Create" onclick="return confirm('¿Estás seguro de querer crear este evento?')">CREAR</button>
                <!-- </div> -->
                <!-- <div class=""> -->
                <a class="btn btn-primary" href="{{ route('home') }}">CANCELAR</a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    @endif
  </div>
  <div class="row row-cols-1 row-cols-md-4 m-4 gap-4 justify-content-center mx-5">
    @foreach ($events as $event)
    @if ($event->date < (now()) ) <div class="card bg-dark text-white">
      <img class="card-img img-fluid h-100 d-flex" src="{{ $event -> image }}" alt="Card image">
      <div class="card-img-overlay card-img-overlay overlay d-flex flex-column justify-content-center align-items-center bg-dark bg-opacity-75">
        <p class="text-white" id="subtitle">EVENTO PASADO</p>
        <p class="card-title" id="info">{{$event -> title}}</p>
        <p class="card-text" id="info">{{$event -> date}}</p>
        <x-css-info />
      </div>
      @endif
      @if ($event->date > (now()))
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

              @if (Auth::check() && Auth::user()->isAdmin)
              <form method="post" action="{{ route('updateCaroousel', ['id'=>$event->id]) }}">
                @method('PATCH')
                @csrf
                @foreach ( $caroousels as $caroouselevent)
                @if ($caroouselevent->id == $event->id)
                @if ($caroouselevent->caroousel == true)
                <button name="caroousel" type="submit" class="btn btn-info" value="0">No destacar</button>
                @endif
                @if ($caroouselevent->caroousel == false)
                <button name="caroousel" type="submit" class="btn btn-info" value="1">Destacar</button>
                @endif
                @endif
                @endforeach

              </form>
              @endif

            </div>
          </div>
        </div>
        @endif
      </div>
      @endforeach
      <div class="d-flex justify-content-center">
        {!! $events->links() !!}
      </div>
  </div>
</div>
@endsection