@extends('layouts.app')

@section('content')
<div>
  <div>
    <a href="{{route ('createEvent')}}">
      <p>New Event</p>
    </a>
  </div>
    @foreach ($events as $event)
    
    <div class="card bg-dark text-white">
        <img class="card-img" src="{{ $event -> image }}" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title">{{$event -> title}}</h5>
            <p class="card-text">{{$event -> date}}/p>

        </div>
    </div>

    <form action="{{ route('delete', ['id' => $event->id]) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit"
                        class="bt-adm m-1 d-flex justify-content-center align-items-center"
                        onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                            <img class="ico-adm"
                            src="{{ url('https://cdn-icons-png.flaticon.com/128/2371/2371924.png') }}" >
                        </button>
                    </form>


    @endforeach
</div>
@endsection