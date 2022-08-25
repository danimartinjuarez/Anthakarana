@extends('layouts.app')


@section('content')
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
                <form action="{{ route('delete', ['id'=>$event->id]) }}" method="post">
                    @method ('delete')
                    @csrf
                    <button type="submit" name="delete" class="btn btn-primary"
                        onclick="return confirm('Estas seguro que quieres borrar? {{$event->name}}  {{$event->id}}')">
                        <img
                            src="htps://www.ordenencasa.shop/wp-content/uploads/2020/05/papelera-redonda-en-madera-de-bambu.jpg" />
                    </button>
            </div>
        </div>
    </div>

    @endforeach
</div>
@endsection
