@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Módulo</i></li>
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
              <h2>Lista Módulos /Cajas </h2>
          
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar
</button>
<button type="button" class="btn btn-default" >
<a href="{{ route('moduloInac.inactivo') }}"><i class="fa fa-recycle" aria-hidden="true" title="Inactivos"></i></a>
</button>

          <br> <br>

            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>DESCRIPCIÓN</th>
                      <th>IDENTIFICADOR MÓDULO</th>
                      <th></th>
                     
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($modulo as $mod)
                    <tr>
                      <td>{{$mod->MOD_ID}}</td>
                      <td>{{$mod->MOD_DESCRIPCION}} <span class="badge badge-success">Activo</span>  </td>
                      <td>{{$mod->MOD_NUMERO}}</td>
                      <td>
                      <a class="" href="{{ route('modulo.edit',$mod->MOD_ID) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                      </td>
                     
                    </tr>
                    @endforeach
                   
                  </tbody>
                </table>
                {{$modulo->links('pagination::bootstrap-4')}}
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
        <h5 class="modal-title" id="exampleModalLabel"> Agregar Módulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <form action="{{route('modulo.store')}}" method="post">
    
<div class="form-row">
      <div class="form-group col-md-6">
      <label class="control-label">Descripción </label>
    <input class="form-control" type="text" placeholder="Ingrese descripcón módulo"  name="descripcion" value="{{old('descripcion')}}" >
      </div>
      <div class="form-group col-md-6">
      <label class="control-label">Identificador</label>
    <input class="form-control" type="number" value="1"

    name="identificador"
   min="1"
   value="{{old('identificador')}}" >
      </div>
</div>
<input class="form-control" type="text"  name="idempresa" value="<?=session()->get('empresa');?>" hidden >
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
