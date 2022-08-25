@extends('layouts.app')


@section('content')
<div class="row row-cols-1 row-cols-md-3 g-4 ">
    @foreach ($events as $event)
    <div class="card bg-dark text-white">
        <img class="card-img" src="{{ $event -> image }}" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title">{{$event -> title}}</h5>
            <p class="card-text">{{$event -> date}}</p>
            <div class="card-footer bottom-0">
                <div>
                    <label class="form-check-label" for="flexCheckDefault">
                        carrusel
                    </label>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
                <button type="button" class="btn btn-primary">Asistir</button>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
