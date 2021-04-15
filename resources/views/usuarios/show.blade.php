@extends('menu/index')
@section('content')

<div class="card">
  <div class="card-header">
    Detalle usuario
  </div>
  <div class="card-body">
    <h5 class="card-title"></h5>
    @foreach($usuario as $user)
    <p class="card-text">
   <label for="">Código:</label>  {{$user->USU_ID}}<br>
   <label for="">Usuario: </label> {{$user->USU_LOGIN}}<br>
   <label for="">Clave: </label> {{$user->USU_PASSWORD}}<br>
    <label for="">Nombres: </label> {{$user->PER_NOMBRES}}<br>
    <label for="">Apellidos: </label> {{$user->PER_APELLIDOS}}<br>
    <label for="">Rol: </label> {{$user->USU_ROL}}<br>
    <label for="">Cédula: </label> {{$user->PER_CEDULA}}<br>
    <label for="">Género:</label>  {{$user->GEN_DESCRIPCION}}<br>
    <label for="">Estado:</label>  {{$user->USU_ESTADO}}<br>
    </p>
    @endforeach


    </p>
   
  </div>
</div>

@endsection