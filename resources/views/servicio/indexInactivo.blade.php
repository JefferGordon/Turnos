@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Servicios Inactivos</i></li>
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
              <h2>Lista Servicios Inactivos </h2>
          
         
              <button type="button" class="btn btn-outline-info" >
<a href="{{url('/servicio/')}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Lista</a>
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
                      <td>{{$serv->SER_DESCRIPCION}}</td>
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


  

@endsection
