@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($users as $user)
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h1>NOMBRE DE USUARIO: {{ $user -> name }}</h1>
                </div>
                <div class="card-body">
                    <h1>EMAIL DE USUARIO: {{ $user -> email }}</h1>
                    <h5>TODOS LOS DATOS {{ $user }}</h5>
                </div>
                @if ($user->isAdmin==false)



                <div class="card-footer">
                    <div class=" d-inline-flex justify-content-center gap-2 m-4 link-unstyled" data-toggle="modal"
                        data-target="#deleteModal {{ $user->id }} ">

                        <img class=" erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal {{ $user->id }} " tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <img src="{{url('/img/Logo.png')}}" alt="Logo">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('deleteUser', ['id' => $user->id]) }}" method="post"
                                        class="erase-button">
                                        @method('delete')
                                        @csrf
                                        <h5>¿QUIERE BORRAR EL USUARIO : {{ $user->name }} </h5>
                                        <button type="submit"
                                            class="bt-adm m-1 d-flex justify-content-center align-items-center">
                                            <img class="erase-img" src=" {{url('/img/DeleteButtonIcon.png')}}">
                                        </button>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">CANCEL</span>
                                        </button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    
                @endforeach
            </div>
        </div>

        @endsection
