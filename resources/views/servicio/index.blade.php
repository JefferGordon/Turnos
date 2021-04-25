@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Servicios</i></li>
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
              <h2>Lista Servicios </h2>
          
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar
</button>
<button type="button" class="btn btn-default" >
<a href="{{ route('servicioInac.inactivo') }}"><i class="fa fa-recycle" aria-hidden="true" title="Inactivos"></i></a>
</button>

          <br> <br>

            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>DESCRIPCIÓN</th>
                      <th>IDENTIFICADOR SERVICIO</th>
                      <th>HORA INICIO</th>
                      <th>HORA FINALIZA</th>
                   
                      <th></th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($servicio as $serv)
                    <tr>
                      <td>{{$serv->SER_ID}}</td>
                      <td>{{$serv->SER_DESCRIPCION}}  <span class="badge badge-success">Activo</span></td>
                      <td>{{$serv->SER_IDENTIFICADOR}}</td>
                      <td>{{$serv->SER_HORAA}}</td>
                      <td>{{$serv->SER_HORAF}}</td>
                      <td>
                      <a class="" href="{{ route('servicio.edit',$serv) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      </td>
                     
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
                {{$servicio->links('pagination::bootstrap-4')}}
              </div>
            </div>
          </div>
        </div>
      </div>


  

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Agregar Servicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action="{{route('servicio.store')}}" method="post">
    
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">Descripción </label>
    <input class="form-control" type="text" placeholder="Ingrese descripcón Servicio" name="servicio"  value="{{old('servicio')}}">
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">Identificador</label>
    <input class="form-control" type="text" placeholder="Ingrese Identificador Ticket" name="identificador" value="{{old('identificador')}}" >
      </div>
</div>

<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">Hora Inicia </label>
    <input class="form-control" type="time"  name="horainicia" min="08:00" value="{{old('horainicia')}}" >
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">Hora Finaliza</label>
    <input class="form-control" type="time" max="22:00" name="horafin" value="{{old('horafin')}}">
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
@endsection
