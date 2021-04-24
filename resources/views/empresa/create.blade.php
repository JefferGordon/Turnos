@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Empresa</i></li>
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
    @if ($errors->any())
    <div class="col-lg-6">
            <div class="bs-component">
              <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">×</button><strong>Mensaje del sistema</strong>  {{ $message }}.
              </div>
            </div>
          </div>
@endif
          <h3 class="tile-title">DATOS EMPRESA</h3>
          <div class="">
      <div class="">
     
            <div class="tile-body">
          <div class="row">
              <div class="col-lg-4">
              <div class="card" style="width: 24rem;">
                <img src="/images/default.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Logo Empresa</h5>
                    <p class="card-text">

                    <form action="" method="post">

                    <div class="form-group">
                        <label for="exampleInputFile">Subir Imagen</label>
                        <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp">
                    </div>
                    <a href="#" class="btn btn-primary"> <i class="fa fa-upload" aria-hidden="true"></i> Cambiar</a>
                    </form>
                    </p>
   
                </div>
                </div>
              </div>
              <div class="col-lg-8">
              @foreach($empresa as $emp)
              <form action="{{ route('empresa.update',$emp->EMP_ID) }}" method="POST">
             {{method_field('PUT')}}
              <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="control-label">Razón Social</label>
                  <input class="form-control" type="text" placeholder="Ingrese razón social" name="rsocial" value="{{$emp->EMP_RAZONSOCIAL}}">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label">Nombre Comercial</label>
                  <input class="form-control" type="text" 
                  placeholder="Ingrese nombre comercial empresa" 
                  name="comercial"
                  value="{{$emp->EMP_COMERCIAL}}" >
                    </div>
             </div>
                
                
                <div class="form-group">
                  <label class="control-label">Dirección</label>
                  <textarea class="form-control" rows="4" placeholder="Ingrese dirección" name="direccion">{{$emp->EMP_DIRECCION}}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label class="control-label">Teléfono 1</label>
                  <input class="form-control" type="text" placeholder="Ingrese teléfono" name="tel1" value="{{$emp->EMP_TELEFONO1}}">
                    </div>
                    <div class="form-group col-md-6">
                    <label class="control-label">Teléfono 2</label>
                  <input class="form-control" type="text" placeholder="Ingrese teléfono" name="tel2" value="{{$emp->EMP_TELEFONO2}}">
                    </div>
                </div>
               
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label class="control-label">RUC</label>
                  <input class="form-control" type="text" placeholder="Ingrese RUC " name="ruc" value="{{$emp->EMP_RUC}}">
                    </div>
                    <div class="form-group col-md-8">
                    <label class="control-label">Correo</label>
                  <input class="form-control" type="email" placeholder="Ingrese correo " name="correo" value="{{$emp->EMP_CORREO}}">
                    </div>
             </div>
                <div class="form-group">
                  <label class="control-label">Representante</label>
                  <input class="form-control" type="text" placeholder="Enter email address" name="representante" value="{{$emp->EMP_REPRESENTANTE}}">
                </div>
                <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
          </div>
              </form>
              @endforeach
              </div>
          </div>
          </div>
          </div>
        </div>
      </div>

@endsection