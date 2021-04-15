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
    <h3 class="box-title">FORMULARIO MODIFICAR PERÍODOS</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  
  <div class="card">
 
  <div class="card-body">
    
  <form action="{{ route('matricula.update',$matricula->MAT_ID) }}" method="POST">

  {{method_field('PUT')}}
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                
            <div class="form-group">
                    <input type="text" name="txtid" hidden="" value="{{$matricula->MAT_ID}}" class="form-control">
                </div>
                
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <input type="text" name="txtdes" value="{{$matricula->MAT_DESCRIPCION}}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Prefijo:</strong>
                    <input type="text" name="txtletra" value="{{$matricula->MAT_LETRA}}" class="form-control">
                </div>

                <div class="form-group">
                <strong>Estado:</strong>
              
    <select name="cbxestado" id="">
    <option value="A">Activo</option>
    <option value="I"> Inactivo</option>
    
    </select>
                </div>
            
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <input type="submit" class="btn btn-primary" value="Guardar">
            </div>
        </div>
        </div>
    </form>    


  </div>

  </div>
  <!-- /.box-body -->
  
  <!-- /.box-footer-->
</div>
</section>
    <!-- Main content -->
    



@endsection
