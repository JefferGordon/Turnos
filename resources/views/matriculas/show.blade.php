@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle matricula
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($matricula as $mat)
    <p class="card-text">
   <label for="">codigo:</label>  {{$mat->MAT_ID}}<br>

    <label for="">Descripcion: </label> {{$mat->MAT_DESCRIPCION}}<br>
    <label for="">Prefijo: </label> {{$mat->MAT_LETRA}}<br>
    <label for="">Estado: </label> {{$mat->MAT_ESTADO}}<br>
    <label for="">Actualizacion:</label>  {{$mat->MAT_ADD}}<br>
    
    </p>

    @endforeach


    </p>
   
  </div>
</div>







@endsection