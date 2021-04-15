@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle peridos
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($periodo as $peri)
    <p class="card-text">
   <label for="">codigo:</label>  {{$peri->PERI_ID}}<br>

    <label for="">Descripcion: </label> {{$peri->PERI_DESCRIPCION}}<br>
    
    <label for="">Estado: </label> {{$peri->PERI_ESTADO}}<br>
    <label for="">Actualizacion:</label>  {{$peri->PERI_ADD}}<br>
    
    </p>

    @endforeach


    </p>
   
  </div>
</div>







@endsection