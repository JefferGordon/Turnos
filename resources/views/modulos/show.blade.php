@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle módulo
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($modulo as $modulo)
    <p class="card-text">
   <label for="">Código:</label>  {{$modulo->MOD_ID}}<br>
   <label for="">Número módulo: </label> {{$modulo->MOD_NUMERO}}<br>
   <label for="">Descripción: </label> {{$modulo->MOD_DESCRIPCION}}<br>
   <label for="">Actualización: </label> {{$modulo->MOD_ADD}}<br>
   <label for="">Estado: </label> {{$modulo->MOD_ESTADO}}<br>
    </p>
    @endforeach
    </p>
   
  </div>
</div>

@endsection