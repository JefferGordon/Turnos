@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Servicios</i></li>
          <li class="breadcrumb-item"><a href="">Principal</a></li>
      </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Detalle Servicios</div>
            <div class="body">

            @if ($message = Session::get('success'))
        <div class="alert alert-primary" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
@if ($message = Session::get('delete'))
        <div class="alert alert-danger" role="alert">
            <p>{{ $message }}</p>
        </div>
    @endif
@if ($errors->any())
    <div class="alert alert-danger">
      
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="card">
  <div class="card-header">
  <form action="{{ route('servicio.destroy',$servicio->SER_ID) }}" method="POST">
    <button id="habilitar" onClick="editar();" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></button>
   
    {{method_field('DELETE')}}
    <button id="eliminar" type="submit" class="btn btn-danger">   <i class="fa fa-trash" aria-hidden="true"></i></button>
   
    <button id="cancelar" onClick="cancel();" disabled class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i></button>
    </form>
  </div>
  <div class="card-body">
    
    <form action="{{route('servicio.update',$servicio->SER_ID)}}" method="post">

    {{method_field('PUT')}}
    <div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">Descripción </label>
    <input class="form-control" type="text"  disabled name="servicio" id="servicio" value="{{$servicio->SER_DESCRIPCION}}" >
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">Identificador</label>
    <input class="form-control" type="text" disabled name="identificador" id="identificador" value="{{$servicio->SER_IDENTIFICADOR}}"  >
      </div>
</div>

<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">Hora Inicia </label>
    <input class="form-control" type="time"  name="horainicia" disabled id="horainicia" value="{{$servicio->SER_HORAA}}" >
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">Hora Finaliza</label>
    <input class="form-control" type="time" value="{{$servicio->SER_HORAF}}" disabled id="horafin" name="horafin">
      </div>
</div>
<div class="form-row">
<div class="col-md-12">
                <p>Estado: 
                 <strong>
                   @if(($servicio->SER_ESTADO)=== 'A')
                    Activo
                    @else
                    Inactivo
                    @endif
                 </strong>
                 </p>
                <div class="toggle-flip">
                  <label>
                    <input type="checkbox" name="estado" id="estado" disabled value="A" checked ><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                  </label>
                </div>
</div>
<input class="form-control" type="text"  name="idempresa" value="<?=session()->get('empresa');?>" hidden >
<input type="text" name="id" id="" value="{{$servicio->SER_ID}}" hidden>

<button type="submit" class="btn btn-primary" id="guardar" disabled><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar</button>
    </form>

  </div>
</div>


            </div>
          </div>
        </div>
      </div>


<script>
function editar(){
  document.getElementById("guardar").disabled = false;
  document.getElementById("habilitar").disabled = true;
  document.getElementById("cancelar").disabled = false;
  document.getElementById("eliminar").disabled = true;
  document.getElementById("identificador").disabled = false;
  document.getElementById("servicio").disabled = false;
  document.getElementById("horainicia").disabled = false;
  document.getElementById("horafin").disabled = false;
  document.getElementById("estado").disabled = false;
}
function cancel(){
  document.getElementById("guardar").disabled = true;
  document.getElementById("habilitar").disabled = false;
  document.getElementById("cancelar").disabled = true;
  document.getElementById("eliminar").disabled = false;
  document.getElementById("identificador").disabled = true;
  document.getElementById("servicio").disabled = true;
  document.getElementById("horainicia").disabled = true;
  document.getElementById("horafin").disabled = true;
  document.getElementById("estado").disabled = true;
}

</script>

@endsection