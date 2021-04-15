@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    
    <section class="container-fluid">
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
    <h3 class="box-title">FORMULARIO REGISTRO MATRÍCULAS</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  


  <div class="card">
 
  <div class="card-body">
    
    <form action="{{ route('matricula.store') }}" method="post">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Descripción</label>
    <input type="text" class="form-control" name="txtdes"id="exampleInputPassword1" placeholder="Ingrese descripción" value="{{old('txtdes')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prefijo</label>
    <input type="text" class="form-control" name="txtpref"id="exampleInputPassword1" placeholder="Ingrese prefijo" value="{{old('txtpref')}}">
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
