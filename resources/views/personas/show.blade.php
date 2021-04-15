@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle persona
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($persona as $persona)
    <p class="card-text">
   <label for="">Código:</label>  {{$persona->PER_ID}}<br>
   <label for="">Apellidos:</label>  {{$persona->PER_APELLIDOS}}<br>
   <label for="">Nombres:</label>  {{$persona->PER_NOMBRES}}<br>
   <label for="">Cédula:</label>  {{$persona->PER_CEDULA}}<br>
   <label for="">Género:</label>  {{$persona->GEN_DESCRIPCION}}<br>
   <label for="">Módulo:</label>  {{$persona->MOD_DESCRIPCION}}<br>
   <label for="">Estado:</label>  {{$persona->PER_ESTADO}}<br>



   
    </p>
    @endforeach
    </p>
   
  </div>
</div>

@endsection