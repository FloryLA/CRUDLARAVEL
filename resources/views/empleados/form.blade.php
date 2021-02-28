

   <div class="form-group">
    <label for="">Nombre</label>
    <input type="text" class="form-control {{$errors->has('nombre')?'is-invalid':'' }}"
    name="nombre" value="{{isset($empleado->nombre) ? $empleado->nombre:old('nombre') }}">
    {!! $errors->first('nombre','<div class="invalid-feedback">:message</div>')!!}
    </div>
    <div class="form-group">
    <label for="">Apellido paterno  </label>
    <input type="text" class="form-control  {{$errors->has('apellidopaterno')?'is-invalid':'' }}
    " name="apellidopaterno" value="{{isset($empleado->apellidopaterno) ? $empleado->apellidopaterno:old('apellidopaterno') }}">
    {!! $errors->first('apellidopaterno','<div class="invalid-feedback">:message</div>')!!}
</div>
    <div class="form-group">
    <label for="">Apellido materno </label>
    <input type="text" class="form-control  {{$errors->has('apellidomaterno')?'is-invalid':'' }}"
    name="apellidomaterno" value="{{isset($empleado->apellidomaterno) ? $empleado->apellidomaterno:old('apellidomaterno') }}">
    {!! $errors->first('apellidomaterno','<div class="invalid-feedback">:message</div>')!!}
</div>
    <div class="form-group">
    <label for="">Correo</label>
    <input type="email" class="form-control {{$errors->has('correo')?'is-invalid':'' }} "
    name="correo" value="{{isset($empleado->correo) ? $empleado->correo:old('correo') }}">
   {!! $errors->first('correo','<div class="invalid-feedback">:message</div>')!!}

</div>

    <div class="form-group">
    <label for="">Foto </label>
    <br>
    @if(isset($empleado->foto))
    <img src=" {{ asset('storage').'/'.$empleado->foto }}" alt="{{ $empleado->nombre }}" width="100" class="img-thumbail img-fluid">
    @endif
    <input  class="form-control {{$errors->has('foto')?'is-invalid':'' }}"
    type="file" name="foto" value="">
    {!! $errors->first('foto','<div class="invalid-feedback">:message</div>')!!}
    </div>
    <input type="submit" class="btn btn-primary" value="{{$Modo=='Registrar' ? 'Registrar' : 'Actualizar'}} ">
