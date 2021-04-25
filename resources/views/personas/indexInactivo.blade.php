@extends('menu/index')
@section('content')

<div class="app-title">
    <div>
      <h1><i class="fa fa-building-o"></i> <?= session()->get('comercial');?></h1>
      <p>sistema de Turnos Versión 2.0</p>
    </div>
      <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg">Lista Usuarios Inactivos</i></li>
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
              <h2>Lista Usuarios Inactivos </h2>
          
              <button type="button" class="btn btn-outline-info" >
<a href="{{url('/persona/')}}"><i class="fa fa-check-square-o" aria-hidden="true"></i> Lista</a>
</button>
<button type="button" class="btn btn-default" >
<a href=""><i class="fa fa-recycle" aria-hidden="true" title="Inactivos"></i></a>
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
                      <td>{{$per->PER_USUARIO}} <span class="badge badge-danger">Inactivo</span></td>
                      <td>{{$per->PER_ROL}}</td>
                      <td>
                      <a class="" href="{{ route('persona.edit',$per->PER_ID) }}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

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

@endsection
