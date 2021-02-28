@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('empleados.update', $empleado->id )}}" method="POST" enctype="multipart/form-data">
@csrf
@method('PATCH')
@include('empleados.form',['Modo'=>'Actualizar'])

</form>
</div>
@endsection
