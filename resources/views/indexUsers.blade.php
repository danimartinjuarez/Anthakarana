@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row container row row-cols-1 row-cols-md-3">
        @foreach ($users as $user)
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-center w-100">

                <img class=" align-item-center" src="{{url('/img/Logo.png')}}" alt="Logo">


            </div>


            <div class="card-body">
                <h5>USUARIO: {{ $user -> name }}</h5>
                <h5>EMAIL: {{ $user -> email }}</h5>
                <h5>Verificado: {{ $user -> email_verified_at }}</h5>
                <h5>id: {{ $user -> id }}</h5>

                <h5>Creada: {{ $user -> created_at }}</h5>
                <h5>Privilegios:
                @if ($user ->isAdmin)
                   <div class="bg-danger"> SI<div></h5>
                @endif
                @if ($user ->isAdmin == false)
                <div class="bg-info"> NO<div></h5>
                @endif

                <h5>Última vez actualizado: {{ $user -> updated_at }}</h5>

            </div>
            @if ($user->isAdmin==false)



            <div class="card-footer d-flex justify-content-center">
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
        @endforeach

    </div>
</div>

@endsection
