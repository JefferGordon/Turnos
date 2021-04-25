@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Usuarios</i></li>
          <li class="breadcrumb-item"><a href="">Principal</a></li>
      </ul>
</div>
<div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">Detalle Usuarios</div>
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
  @foreach($persona as $per )
  <form action="{{route('persona.destroy',$per->PER_ID)}}" method="POST">
    <button id="habilitar" onClick="editar();" class="btn btn-info"><i class="fa fa-pencil" aria-hidden="true"></i></button>
   
    {{method_field('DELETE')}}
    <button id="eliminar" type="submit" class="btn btn-danger">   <i class="fa fa-trash" aria-hidden="true"></i></button>
   
    <button id="cancelar" onClick="cancel();" disabled class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i></button>
    </form>
    @endforeach
  </div>
  <div class="card-body">
    @foreach($persona as $personas )
    <form action="{{route('persona.update',$personas->PER_ID)}}" method="post">

    {{method_field('PUT')}}

<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">NOMBRE</label>
    <input class="form-control" type="text"  name="nombre" id="nombre"  disabled value="{{$personas->PER_NOMBRES}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">APELLIDOS</label>
    <input class="form-control" type="text"  name="apellidos" id="apellidos" disabled value="{{$personas->PER_APELLIDOS}}" >
      </div>
</div>

<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">IDENTIFICACIÓN</label>
    <input class="form-control" type="text" name="cedula" id="cedula"  disabled value="{{$personas-> PER_CEDULA}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">EMAIL</label>
    <input class="form-control" type="mail"  name="correo" id="correo" disabled value="{{$personas->PER_EMAIL}}" >
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-12">
      <label class="control-label">GÉNERO </label>

      @if(($personas->GEN_ID)==='MASCULINO')
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="genero" id="masculino"   value="MASCULINO" checked><span class="label-text">Masculino</span>
               </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero"   id="femenino" disabled value="FEMENINO"  ><span class="label-text">Femenino</span>
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" id="otro"  disabled  value="OTRO" ><span class="label-text">Otros</span>
              </label>
      </div>
      @elseif(($personas->GEN_ID)==='FEMENINO')
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="genero" id="masculino" disabled value="MASCULINO" ><span class="label-text">Masculino</span>
               </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" id="femenino"  value="FEMENINO" checked ><span class="label-text">Femenino</span>
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" id="otro" disabled value="OTRO" ><span class="label-text">Otros</span>
              </label>
      </div>
      @else
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="genero" id="masculino" disabled value="MASCULINO" ><span class="label-text">Masculino</span>
               </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" id="femenino" disabled value="FEMENINO"  ><span class="label-text">Femenino</span>
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" id="otro" value="OTRO" checked ><span class="label-text">Otros</span>
              </label>
      </div>
      @endif
    

      </div>
     
</div>
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">USUARIO</label>
    <input class="form-control" type="text"  name="usuario" id="usuario" disabled value="{{$personas->PER_USUARIO}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">CLAVE</label>
    <input class="form-control" type="password"  name="clave" id="clave" disabled value="{{$personas->PER_CLAVE}}" >
      </div>
</div>

<div class="form-row">
      <div class="form-group col-md-12">
      <label class="control-label">ROL </label>
      @if(($personas->PER_ROL)==='ADMINISTRADOR')
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="rol"  value="ADMINISTRADOR" checked><span class="label-text">ADMINISTRADOR</span>
                
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="rol" id="rol" disabled value="CAJERO"><span class="label-text">CAJERO</span>
                
              </label>
      </div>
         
      @else
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="rol" id="rol" disabled value="ADMINISTRADOR" ><span class="label-text">ADMINISTRADOR</span>
                
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="rol"  value="CAJERO" checked ><span class="label-text">CAJERO</span>
                
              </label>
      </div>
      @endif
     
     

      </div>
     
</div>
<div class="form-row">
      <div class="form-group col-md-10">
      <label class="control-label">MÓDULO</label>
      <select class="form-control" name="modulo" id="modulo"  disabled>
     
               @foreach($modulo as $modulos)
                  <option value="{{$modulos->MOD_ID}}">{{$modulos->MOD_DESCRIPCION}} {{$modulos->MOD_NUMERO}}</option>
              @endforeach
              <option value="0">Sin Asignar</option>
              </select>
      </div>
      
</div>   


<div class="form-row">
<div class="col-md-12">
                <p>Estado: 
                 <strong>
                   @if(($personas->PER_ESTADO)=== 'A')
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
</div>

<input class="form-control" type="text"  name="empresa" value="<?=session()->get('empresa');?>" hidden >



<button type="submit" class="btn btn-primary" id="guardar" disabled><i class="fa fa-floppy-o" aria-hidden="true"  ></i> Guardar</button>

    </form>
@endforeach
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
  document.getElementById("nombre").disabled = false;
  document.getElementById("apellidos").disabled = false;
  document.getElementById("cedula").disabled = false;
  document.getElementById("correo").disabled = false;

  document.getElementById("usuario").disabled = false;
  document.getElementById("clave").disabled = false;
 
  document.getElementById("modulo").disabled = false;
  document.getElementById("estado").disabled = false;
  document.getElementById("rol").disabled = false;
  document.getElementById("masculino").disabled = false;
  document.getElementById("femenino").disabled = false;
  document.getElementById("otro").disabled = false;
}
function cancel(){
  document.getElementById("guardar").disabled = true;
  document.getElementById("habilitar").disabled = false;
  document.getElementById("cancelar").disabled = true;
  document.getElementById("eliminar").disabled = false;
  document.getElementById("nombre").disabled = true;
  document.getElementById("apellidos").disabled = true;
  document.getElementById("cedula").disabled = true;
  document.getElementById("correo").disabled = true;

  document.getElementById("usuario").disabled = true;
  document.getElementById("clave").disabled = true;
 
  document.getElementById("modulo").disabled = true;
  document.getElementById("estado").disabled = true;
  document.getElementById("rol").disabled = true;
  document.getElementById("masculino").disabled = true;
  document.getElementById("femenino").disabled = true;
  document.getElementById("otro").disabled = true;
}

</script>

@endsection