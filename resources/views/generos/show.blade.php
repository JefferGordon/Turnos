@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle Género
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($genero as $genero)
    <p class="card-text">
   <label for="">Código:</label>  {{$genero->GEN_ID}}<br>
   <label for="">Género: </label> {{$genero->GEN_DESCRIPCION}}<br>
    <label for="">Actualización:</label>  {{$genero->GEN_ADD}}<br>
    </p>
    @endforeach


    </p>
   
  </div>
</div>

@endsection