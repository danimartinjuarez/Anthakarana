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
                    <button type="button" class="btn btn-primary" id="asist-button">Asistir</button>

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
                    <a href="{{ route('showEvent', $event->id) }}">👀</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection