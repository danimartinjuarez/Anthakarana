@section('content')
<div>
    <div class="row-cols-1 row-cols-md-3">
        <a class=" d-inline-flex justify-content-center gap-2 link-unstyled" href="{{route ('createEvent')}}">
            <p>New Event</p>
            <img class="erase-img" src=" {{url('/img/AddEventButton.png')}}">
        </a>

    </div>
    <div class="row row-cols-1 row-cols-md-4 g-4 gap-4 justify-content-center mx-5">
        @foreach ($events as $event)
        <div class="card bg-dark text-white">
            <img class="card-img img-fluid h-75 d-flex" src="{{ $event -> image }}" alt="Card image">
            <div class="card-img-overlay overlay d-flex">
                </img>
                <div class="w-75 h-10 d-flex flex-column align-self-end">
                    <h5 class="card-title">{{$event -> title}}</h5>
                    <p class="card-text">{{$event -> date}}</p>
                </div>

                <div class="w-25 h-15 d-flex flex-column align-self-end align-items-end">
                    <!-- <div class=""> -->
                    <!-- <label class="form-check-label" for="flexCheckDefault">Carrusel</label>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div> -->

                    @if (Auth::check() && Auth::user()->isAdmin)
                    @if ($event->pivot->event_id == $event->id)
                    <button type="button" class="btn btn-secondary"><a
                            href="{{ route('unscribeEvent', ['id'=>$event->id]) }}">Desinscribirse</a></button>

                    @endif
                    @if ($event->pivot->event_id != $event->id)

                    <button type="button" class="btn btn-primary"><a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}">Asistir</a></button>
                    @endif

                    <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                        @method('delete')
                        @csrf
                        <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center"
                            onclick="return confirm('¿Estás seguro de querer eliminar este evento? {{$event->name}} -ID {{ $event -> id }}')">
                            <img class="erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                        </button>
                        <a href="{{ route('editEvent', ['id'=>$event->id]) }}">Editar</a>
                    </form>
                    @endif
                    <a href="{{ route('showEvent', $event->id) }}">👀</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
