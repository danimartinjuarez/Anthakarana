@extends('layouts.app')
@if (Auth::check() && Auth::user()->isAdmin)
@section('content')
<div class="card">

    <div class="card-img-overlay">
        <h5 class="card-title">Evento:</h5>
        <p class="card-title">{{$event -> title}}</p>
        <h5 class="card-title">Descripción:</h5>
        <p class="card-text">{{ $event -> description }}</p>
        <h5 class="card-title">Comienzo:</h5>

        <div class="d-flex gap-5">
            <h5 class="card-title">Fecha Inicio:</h5>
            <h5 class="card-title">Hora:</h5>
        </div>

        <div class="d-flex gap-5">
            <p class="card-text">{{ $event -> date }}</p>
            <p class="card-text">{{ $event -> start_hour }}</p>
        </div>

        <div class="d-flex gap-3">
            <img src="{{ URL('/img/Turnouticon.png')}}">
            <p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
        </div>

        <div class=" d-inline-flex justify-content-center gap-2 m-4 link-unstyled" data-toggle="modal"
            data-target="#deleteModal"">

            <img class=" erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
        </div>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <img src="{{url('/img/Logo.png')}}" alt="Logo">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('delete', ['id' => $event->id]) }}" method="post" class="erase-button">
                            @method('delete')
                            @csrf
                            <h5>¿QUIERE BORRAR EL EVENTO : {{ $event->title }} </h5>
                            <button type="submit" class="bt-adm m-1 d-flex justify-content-center align-items-center">
                                <img class="erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                            </button>
                            <button class="btn-warning" type="cancel" >CANCEL</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @if(($event -> sub_people)>=($event -> total_people))
        <button type="button" class="btn btn-primary" onclick="return confirm('Evento completo')"
            id="asist-button">Asistir</button>
        @endif
        @if(($event -> sub_people)<($event -> total_people))

            <a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}"><button type="button"
                    class="btn btn-primary buttonAsist text-white" onclick="('Evento completo')"
                    id="asist-button">Asistir</button></a>

            @endif

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>
            <!-- Modal -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="justify-content-center col-md-3 m-5"
                                action="{{ route('eventupdate', ['id'=>$event->id]) }}" method="post">
                                @method('PATCH')
                                @csrf

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Name</label>
                                    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                                        value="{{ $event -> title }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Description</label>
                                    <input type="text" name="description" class="form-control"
                                        id="exampleFormControlInput1" value="{{ $event -> description }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">People</label>
                                    <input type="number" name="total_people" class="form-control"
                                        id="exampleFormControlInput1" value="{{ $event -> total_people }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Image</label>
                                    <input type="text" name="image" class="form-control" id="exampleFormControlInput1"
                                        value="{{ $event -> image }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Date</label>
                                    <input type="date" name="date" class="form-control" id="exampleFormControlInput1"
                                        value="{{ $event -> date }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Start Hour</label>
                                    <input type="time" name="start_hour" class="form-control"
                                        id="exampleFormControlInput1" value="{{ $event -> start_hour }}">
                                </div>

                                <div class="float-right">
                                    <a class="btn btn-primary" href="{{ route('home') }}">Home</a>
                                </div>
                                <div class="btnCreate">
                                    <button type="submit" class="btn btn-outline-success" value="Create"
                                        onclick="return confirm('¿Estás seguro de querer modificar este evento? {{$event->name}} -ID {{ $event -> id }}')">Editar</button>
                                </div>


                            </form>


                        </div>
                    </div>




                </div>

            </div>

            @endsection


            @endif


            @if (Auth::check())


            @foreach ($eventsuscribe as $eventsubcribed )
            @if ($event->id == $eventsubcribed->pivot->event_id)
            @section('content')
            <div class="card">

                <div class="card-img-overlay">
                    <h5 class="card-title">Evento:</h5>
                    <p class="card-title">{{$event -> title}}</p>
                    <h5 class="card-title">Descripción:</h5>
                    <p class="card-text">{{ $event -> description }}</p>
                    <h5 class="card-title">Comienzo:</h5>

                    <div class="d-flex gap-5">
                        <h5 class="card-title">Fecha Inicio:</h5>
                        <h5 class="card-title">Hora:</h5>
                    </div>

                    <div class="d-flex gap-5">
                        <p class="card-text">{{ $event -> date }}</p>
                        <p class="card-text">{{ $event -> start_hour }}</p>
                    </div>

                    <div class="d-flex gap-3">
                        <img src="{{ URL('/img/Turnouticon.png')}}">
                        <p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
                    </div>





                    <button type="button" class="btn btn-secondary"><a href="{{ route('unscribeEvent', $event->id) }}"
                            onclick="return confirm('¿Estás seguro de querer desapuntarse de este evento? {{$event->name}} -ID {{ $event -> id }}')">Desinscribirse</a></button>


                </div>

            </div>
            @endsection
            @break
            @endif
            @endforeach
            @endif

            @section('content')
            <div class="card">

                <div class="card-img-overlay">
                    <h5 class="card-title">Evento:</h5>
                    <p class="card-title">{{$event -> title}}</p>
                    <h5 class="card-title">Descripción:</h5>
                    <p class="card-text">{{ $event -> description }}</p>
                    <h5 class="card-title">Comienzo:</h5>

                    <div class="d-flex gap-5">
                        <h5 class="card-title">Fecha Inicio:</h5>
                        <h5 class="card-title">Hora:</h5>
                    </div>

                    <div class="d-flex gap-5">
                        <p class="card-text">{{ $event -> date }}</p>
                        <p class="card-text">{{ $event -> start_hour }}</p>
                    </div>

                    <div class="d-flex gap-3">
                        <img src="{{ URL('/img/Turnouticon.png')}}">
                        <p class="card-text">{{ $event -> sub_people }}/{{ $event -> total_people }}</p>
                    </div>




                    @if(($event -> sub_people)>=($event -> total_people))
                    <button type="button" class="btn btn-primary" onclick="return confirm('Evento completo')"
                        id="asist-button">Asistir</button>
                    @endif

                    @if(($event -> sub_people)<($event -> total_people))

                        <a href="{{ route('inscribeEvent', ['id'=>$event->id]) }}"><button type="button"
                                class="btn btn-primary buttonAsist text-white" onclick="('Evento completo')"
                                id="asist-button">Asistir</button></a>

                        @endif

                </div>

            </div>

            @endsection
