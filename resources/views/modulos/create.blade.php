@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="container-fluid">

<!-- Default box -->
<div class="">
      <div class="">
      @if ($message = Session::get('success'))
        <div class="alert alert-danger" >
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Advertencia!</strong> Corrija los siguientes errores:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">FORMULARIO REGISTRO MÓDULOS</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  
  <div class="card">
 
  <div class="card-body">
    
    <form action="{{ route('modulo.store') }}" method="post">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Número de módulo</label>
    <input type="text" class="form-control" name="txtnum"id="exampleInputPassword1" placeholder="Ingrese número de módulo" value="{{old('txtnum')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Descripción</label>
    <input type="text" class="form-control" name="txtdesc"id="exampleInputPassword1" placeholder="Ingrese descripción" value="{{old('txtdesc')}}">
  </div>
  <div class="form-group">
    
    <input type="date" hidden="" name="txtfecha" value="<?php echo date('Y-m-d'); ?>" >
  </div>
  <div class="form-group">
    
    <input type="text" hidden="" name="txtestado" value="A" >
  </div>
  
 
  <input type="submit" class="btn btn-primary" value="Guardar">
</form>


  </div>

  </div>
  <!-- /.box-body -->
  
  <!-- /.box-footer-->
</div>
</section>
    <!-- Main content -->
    



@endsection
