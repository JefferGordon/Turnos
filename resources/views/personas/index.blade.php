@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Usuarios</i></li>
          <li class="breadcrumb-item"><a href="#">Principal</a></li>
      </ul>
</div>

<div class="row">
        <div class="col-md-12">
          <div class="tile">
          @if ($message = Session::get('success'))
      <div class="col-lg-6">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button><strong>Mensaje del sistema</strong>  {{ $message }}.
              </div>
            </div>
          </div>
  
        
    @endif
    @if ($message = Session::get('error'))
      <div class="col-lg-6">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <button class="close" type="button" data-dismiss="alert">×</button><strong>Mensaje del sistema</strong>  {{ $message }}.
              </div>
            </div>
          </div>
  
        
    @endif

@if ($errors->any())
<div class="col-lg-6">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-info">
                <button class="close" type="button" data-dismiss="alert">×</button> <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
              </div>
            </div>
          </div>
    
@endif
              <h2>Lista Usuarios </h2>
          
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar
</button>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-ticket" aria-hidden="true"></i>Agregar Servicios
</button>
<button type="button" class="btn btn-default" >
<a href="{{ route('personaInac.inactivo') }}"><i class="fa fa-recycle" aria-hidden="true" title="Inactivos"></i></a>
</button>

          <br> <br>

            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NOMBRE</th>
                      <th>IDENTIFICACIÓN</th>
                      <th>GÉNERO</th>
                      <th>EMAIL</th>
                      <th>USUARIO</th>
                      <th>ROL</th>
                      
                   
                      <th></th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($persona as $per)
                    <tr>
                      <td>{{$per->PER_ID}}</td>
                      <td>{{$per->PER_NOMBRES}} {{$per->PER_APELLIDOS}}</td>
                      <td>{{$per->PER_CEDULA}}</td>
                      <td>{{$per->GEN_ID}}</td>
                      <td>{{$per->PER_EMAIL}}</td>
                      <td>{{$per->PER_USUARIO}} <span class="badge badge-success">Activo</span></td>
                      <td>{{$per->PER_ROL}}</td>
                      <td>
                      <a class="" href="{{ route('persona.edit',$per->PER_ID) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      <a class="" data-target="#modalAlumno" data-toggle="modal" data-id="{{$per->PER_ID}}" > <i class="fa fa-ticket" aria-hidden="true"></i></a>
                     
                      
                      </td>
                     
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
                {{$persona->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
      </div>


  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action="{{route('persona.store')}}" method="post">
    
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">NOMBRE</label>
    <input class="form-control" type="text" placeholder="Ingrese nombre" name="nombre"  value="{{old('nombre')}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">APELLIDOS</label>
    <input class="form-control" type="text" placeholder="Ingrese apellidos" name="apellidos" value="{{old('apellidos')}}" >
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">IDENTIFICACIÓN</label>
    <input class="form-control" type="text" placeholder="Ingrese identificación" name="cedula"  value="{{old('cedula')}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">EMAIL</label>
    <input class="form-control" type="mail" placeholder="Ingrese correo" name="correo" value="{{old('correo')}}" >
      </div>
</div>
<div class="form-row">
      <div class="form-group col-md-12">
      <label class="control-label">GÉNERO </label>
    
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="genero" value="MASCULINO"><span class="label-text">Masculino</span>
                
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" value="FEMENINO"><span class="label-text">Femenino</span>
                
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="genero" value="OTRO"><span class="label-text">Otros</span>
                
              </label>
      </div>

      </div>
     
</div>
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">USUARIO</label>
    <input class="form-control" type="text" placeholder="Ingrese identificación" name="usuario"  value="{{old('usuario')}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">CLAVE</label>
    <input class="form-control" type="password" placeholder="Ingrese correo" name="clave" value="{{old('clave')}}" >
      </div>
</div>

<div class="form-row">
      <div class="form-group col-md-12">
      <label class="control-label">ROL </label>
    
      <div class="animated-radio-button">
              <label>
                <input type="radio" name="rol" value="ADMINISTRADOR"><span class="label-text">ADMINISTRADOR</span>
                
              </label>
      </div>
      <div class="animated-radio-button">
              <label>
              <input type="radio" name="rol" value="CAJERO"><span class="label-text">CAJERO</span>
                
              </label>
      </div>
     

      </div>
     
</div>
<input class="form-control" type="text"  name="empresa" value="<?=session()->get('empresa');?>" hidden >
<div class="form-row">
      <div class="form-group col-md-10">
      <label class="control-label">MÓDULO</label>
      <select class="form-control" id="demoSelect" name="modulo" >
      <option value="0">Sin Asignar</option>
               @foreach($modulo as $mod)
                  <option value="{{$mod->MOD_ID}}">{{$mod->MOD_DESCRIPCION}} {{$mod->MOD_NUMERO}}</option>
              @endforeach
              </select>
      </div>
      
</div>       

<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i>Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
      </div>
</form>

      </div>
     
    </div>
  </div>
</div>



<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalAlumno" tabindex="-1" role="dialog" aria-labelledby="service" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Asigar Servicios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

   <form action="" method="post">

<input type="text" name="idpersona" id="idpersona"  value="" hidden >

   <div class="card" style="width: 18rem;">
  <ul class="list-group list-group-flush">
    <form action="" method="post">
    <div id="respuesta">

</div>

    </form>
   
   
  
  </ul>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
   </form>




   </div>
      
    </div>
  </div>
</div>
<script>
	$(document).ready(function (e) {
  $('#modalAlumno').on('show.bs.modal', function(e) {    
     let id = $(e.relatedTarget).data().id;
      $(e.currentTarget).find('#idpersona').val(id);


  });
  var datos= $.ajax({
            
            url: "{{route('servicio.create')}}",
            dataType: "text",
            async:false
          
        }).responseText;

        var contenido=document.getElementById('respuesta');
        contenido.innerHTML=datos;


});


</script>
@endsection
