@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Módulo</i></li>
          <li class="breadcrumb-item"><a href="">Principal</a></li>
      </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Detalle Módulo/Caja</div>
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
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="card">
  <div class="card-header">
  <form action="{{ route('modulo.destroy',$modulo->MOD_ID) }}" method="POST">
    <button id="habilitar" onClick="editar();" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></button>
   
    {{method_field('DELETE')}}
    <button id="eliminar" type="submit" class="btn btn-danger">   <i class="fa fa-trash" aria-hidden="true"></i></button>
   
    <button id="cancelar" onClick="cancel();" disabled class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i></button>
    </form>
  </div>
  <div class="card-body">
    
    <form action="{{route('modulo.update',$modulo->MOD_ID)}}" method="post">

    {{method_field('PUT')}}
    
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">Descripción </label>
    <input class="form-control" type="text" placeholder="Ingrese descripcón módulo" name="descripcion" id="descripcion" disabled value="{{$modulo->MOD_DESCRIPCION}}" >
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">Identificador</label>
    <input class="form-control" type="number" 
    value="{{$modulo->MOD_NUMERO}}"
    name="identificador"
    id="identificador"
    disabled
    min="1" >
      </div>
</div>
<div class="form-row">
<div class="col-md-12">
                <p>Estado: 
                 <strong>
                   @if(($modulo->MOD_ESTADO)=== 'A')
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
<input type="text" name="id" id="" value="{{$modulo->MOD_ID}}" hidden>

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
  document.getElementById("descripcion").disabled = false;
  document.getElementById("estado").disabled = false;
}
function cancel(){
  document.getElementById("guardar").disabled = true;
  document.getElementById("habilitar").disabled = false;
  document.getElementById("cancelar").disabled = true;
  document.getElementById("eliminar").disabled = false;
  document.getElementById("identificador").disabled = true;
  document.getElementById("descripcion").disabled = true;
  document.getElementById("estado").disabled = true;
}

</script>

@endsection