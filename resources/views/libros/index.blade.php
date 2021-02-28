
@extends('layouts.app')

@section('content')

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Autor</th>
      <th scope="col">Genero</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    @foreach ( $libros as $libro)
      <th scope="row">{{ $libro->id }}</th>
      <td>{{ $libro->nombre }}</td>
      <td>{{ $libro->autor }}</td>
      <td>{{ $libro->genero }}</td>
      <td>
        <a href="{{route('libros.show'),$libro->id }}" class="btn btn-primary">Ver</a>
      @if(Auth::check())
         <a href="{{route('libros.edit'),$libro->id }} " class="btn btn-success" >Editar</a>
       <form action="{{route('libros.destroy',$libro->id) }}" method="post">
       @csrf
       @method('DELETE')
       <button class="btn btn-danger">Eliminar</button>
       </form>
       @endif
    </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
