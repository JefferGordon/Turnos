@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle periodo - matricula
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($permat as $permat)
    <p class="card-text">
   <label for="">codigo:</label>  {{$permat->pmar_id}}<br>

   
    <label for="">Fecha inicio : </label> {{$permat->PMAR_FECHAINI}}<br>
    <label for="">Fecha fin:</label>  {{$permat->PMAR_FECHAFIN}}<br>
    <label for="">Estado:</label>  {{$permat->PMAR_ESTADO}}<br>
    <label for="">Matricula:</label>  {{$permat->MAT_DESCRIPCION}}<br>
    <label for="">Periodo:</label>  {{$permat->PERI_DESCRIPCION}}<br>
    
    </p>

    @endforeach


    </p>
   
  </div>
</div>







@endsection