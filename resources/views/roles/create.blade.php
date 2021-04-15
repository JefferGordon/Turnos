@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="container-fluid">

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">FORMUALARIO REGISTRO ROL</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  
  <div class="card">
 
  <div class="card-body">
    
    <form action="{{ route('rol.store') }}" method="post">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Rol</label>
    <input type="text" class="form-control" name="txtrol"id="exampleInputPassword1" placeholder="Ingrese nuevo rol">
  </div>
  
 
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>


  </div>

  </div>
  <!-- /.box-body -->
  
  <!-- /.box-footer-->
</div>
</section>
    <!-- Main content -->
    



@endsection
