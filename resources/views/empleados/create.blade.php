@extends('layouts.app')

@section('content')
<div class="container">
@if($errors->any())
<div class="alert alert-danger">

<ul>@foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
{{ session('status') }}
</div>
@endif

<form action="{{route('empleados.store')}}" method="POST" enctype="multipart/form-data">
@csrf
@include('empleados.form',['Modo'=>'Registrar'])

</form>
</div>
@endsection
