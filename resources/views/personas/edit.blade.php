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
    <h3 class="box-title">FORMULARIO MODIFICAR PERSONAS</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  
  <div class="card">
 
  <div class="card-body">
    
<?php
include 'conexion.php';
$con=conectar();

$gen=$persona->GEN_ID;
$mod=$persona->MOD_ID;
$id=$persona->PER_ID;
$query="SELECT g.GEN_ID,g.GEN_DESCRIPCION,m.MOD_ID,m.MOD_DESCRIPCION from tbl_personas p inner JOIN tbl_generos g on p.GEN_ID=g.GEN_ID inner JOIN tbl_modulos m on p.MOD_ID=m.MOD_ID where p.PER_ID=$id";

$sql = mysqli_query($con,$query); 

while($row = mysqli_fetch_array($sql)) { 

  $idgen=$row[0];
  $gendesc=$row[1];
  $idmod=$row[2];
  $moddesc=$row[3];
}

?>

  <form action="{{ route('persona.update',$persona->PER_ID) }}" method="POST">

  {{method_field('PUT')}}
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                
            <div class="form-group">
                    
                    <input type="text" name="txtid" hidden="" value="{{$persona->PER_ID}}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Nombres:</strong>
                    <input type="text" name="txtnom" value="{{$persona->PER_NOMBRES}}" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Apellidos:</strong>
                    <input type="text" name="txtape" value="{{$persona->PER_APELLIDOS}}" class="form-control">
                </div>
                <div class="form-group">
                    <strong>Cédula:</strong>
                    <input type="text" name="txtced" id="txtcedula" value="{{$persona->PER_CEDULA}}" onblur="validar();" class="form-control">
                </div>

                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="email" name="txtmail" value="{{$persona->PER_EMAIL}}" class="form-control">
                </div>
                <div class="form-group">
                <strong>Estado:</strong>
              
    <select name="cbxestado" id="">
    <option value="A">Activo</option>
    <option value="I"> Inactivo</option>
    
    </select>


                </div>

                <div class="form-group">
                <strong>Género:</strong>
                <select name="cbxgenero" > 
                <option value="<?php echo $idgen ?>" ><?php echo $gendesc ?> </option> 
                <?php 

$result = mysqli_query($con,"SELECT GEN_ID, GEN_DESCRIPCION FROM tbl_generos "); 

while($row = mysqli_fetch_array($result)) { 
?> 
  <option value="<?php echo $row['GEN_ID']; ?>"><?php echo $row['GEN_DESCRIPCION']; ?></option> 
<?php 
} 

?> 
                </select>

      </div>
      <div class="form-group">
                <strong>Módulo:</strong>
    <select name="cbxmodulo" > 
                <option value="<?php echo $idmod ?>"  > <?php echo $moddesc ?> </option> 
                <?php 
$resul = mysqli_query($con,"SELECT MOD_ID, MOD_DESCRIPCION FROM tbl_modulos WHERE MOD_ID NOT IN(SELECT MOD_ID FROM tbl_personas) "); 

while($rows = mysqli_fetch_array($resul)) { 
?> 
  <option value="<?php echo $rows['MOD_ID']; ?>"><?php echo $rows['MOD_DESCRIPCION']; ?></option> 
<?php 
} 


?> 
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
