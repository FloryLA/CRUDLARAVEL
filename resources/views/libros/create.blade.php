@extends('layouts.app')

@section('content')
@if($errors->any())
<div class="alert alert-danger">

<ul>@foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
{{ session('status') }}
</div>
@endif
<form action="{{route('libros.store')}}" method="POST">
@csrf
<div class="form-group">
<label for="">Nombre del libro</label>
<input type="text" class="form-control" name="nombre" value="{{old('nombre') }}">
</div>
<div class="form-group">
<label for="">Autor  </label>
<input type="text" class="form-control" name="autor" value="{{old('autor') }}">
</div>
<div class="form-group">
<label for="">Genero </label>
<input type="text" class="form-control" name="genero" value="{{old('genero') }}">
</div>
<div class="form-group">
<label for="">Editorial</label>
<input type="text" class="form-control" name="editorial" value="{{old('editorial') }}">
</div>

<div class="form-group">
<label for="">Descripcion  </label>
<textarea  class="form-control" name="descripcion" >{{old('descripcion') }}</textarea>
</div>
<button class="btn btn-primary">Registrar nuevo libro</button>
</form>
@endsection
