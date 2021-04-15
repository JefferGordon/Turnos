@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    
    <section class="container-fluid">
    <?php 

include 'conexion.php';
$con=conectar();

$info = mysqli_query($con,"SELECT COUNT(MOD_ID) FROM tbl_modulos WHERE MOD_ID NOT IN(SELECT MOD_ID FROM tbl_personas)"); 
$geninfo= mysqli_query($con,"SELECT COUNT(GEN_ID) FROM tbl_generos");
while($row = mysqli_fetch_array($info)) { 

  $num=$row[0];
}
while($gen = mysqli_fetch_array($geninfo)) { 

  $numgen=$gen[0];
}

if($num==0){


?> 
  
  <div class="alert alert-danger" role="alert">
  No cuenta con módulos registrados en el sistema!
</div>
<?php
}
if($numgen==0){

?>
<div class="alert alert-danger" role="alert">
  No cuenta con géneros registrados en el sistema!
</div>
<?php
}
else{
}
?>




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
    <h3 class="box-title">FORMULARIO REGISTRO PERSONAS</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  







  <div class="card">
 
  <div class="card-body">
    
    <form action="{{ route('persona.store') }}" method="post">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Nombres</label>
    <input type="text" class="form-control" name="txtnombres"id="exampleInputPassword1"  placeholder="Ingrese nombres" value="{{old('txtnombres')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Apellidos</label>
    <input type="text" class="form-control" name="txtapellidos"id="exampleInputPassword1"  placeholder="Ingrese apellidos" value="{{old('txtapellidos')}}" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Cédula</label>
    <input type="text" class="form-control" name="txtcedula" id="txtcedula"  onblur="validar();"  placeholder="Ingrese cédula" value="{{old('txtcedula')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email</label>
    <input type="email" class="form-control" name="txtcorreo" id="exampleInputPassword1"  value="{{old('txtcorreo')}}" placeholder="Ingrese su email"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Género</label>

    <select name="cbxgenero" > 
                <option value="{{old('cbxgenero')}}" selected > -- Seleccione un género -- </option> 
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
    <label for="exampleInputPassword1">Módulo</label> 

    <select name="cbxmodulo" > 
                <option value="" selected > -- Seleccione un módulo -- </option> 
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
