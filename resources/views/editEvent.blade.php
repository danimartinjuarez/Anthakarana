@extends ('layouts.app')
@section('content')

<form action="{{ route('updateEvent', $event -> id ) }}">
    @method('PATCH')
    @csrf
    <div class="form-group">
    <input class="form-control" type="text" name="title" class="form-control" value= "{{ $event->name }}">
    </div>
</form>
@endsection