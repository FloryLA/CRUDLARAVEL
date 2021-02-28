@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-body">
    <h1 class="card-title">{{$libro->nombre}}</h1>
    <h5 class="card-title">Autor: {{$libro->autor}}</h5>
    <h5 class="card-title">Genero: {{$libro->genero}}</h5>
    <h5 class="card-title">Editorial: {{$libro->editorial}}</h5>
    <p class="card-text">Descripcion: {{$libro->descripcion}}</p>
  </div>
</div>
</div>

@endsection
