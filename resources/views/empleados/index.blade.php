
@extends('layouts.app')

@section('content')

@if(session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="container">
<table class="table table-hover ">
    <thead class="table-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Foto</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      @foreach ( $empleados as $empleado)
        <td>{{ $empleado->id }}</td>
        <td><img src=" {{ asset('storage').'/'.$empleado->foto }}" alt="{{ $empleado->nombre }}" width="100" class="img-thumbail img-fluid"> </td>
        <td>{{ $empleado->nombre }} {{ $empleado->apellidopaterno }} {{ $empleado->apellidomaterno }}</td>

        <td>{{ $empleado->correo }}</td>
        <td>
        <a href="{{route('empleados.edit',$empleado->id) }}" class="btn btn-success">Editar</a>

              <form action="{{route('empleados.destroy',$empleado->id) }}" style="display:inline" method="post">
           @csrf
           @method('DELETE')
           <button type="submit" onclick="return confirm('¿Borrar ?');" class="btn btn-danger">Eliminar</button>
           </form>

        </td>

      </tr>
      @endforeach
    </tbody>
  </table>

  {{$empleados->links()}}
</div>

@endsection
