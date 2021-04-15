@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="container-fluid">
    <?php 

include 'conexion.php';
$con=conectar();

$info = mysqli_query($con,"SELECT COUNT(PER_ID) as numero FROM tbl_personas WHERE PER_ID NOT IN(SELECT PER_ID FROM tbl_usuarios)"); 

while($row = mysqli_fetch_array($info)) { 

  $num=$row[0];
}
if($num==0){


?> 
  
  <div class="alert alert-danger" role="alert">
  No cuenta con personas registradas en el sistema!
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

<!-- Default box -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">FORMULARIO REGISTRO USUARIO</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  
  <div class="card">
 
  <div class="card-body">
    
    <form action="{{ route('usuario.store') }}" method="post">

  
  <div class="form-group">
    <label for="exampleInputPassword1">USUARIO</label>
    <input type="text" class="form-control" name="txtusuario"id="exampleInputPassword1" placeholder="Ingrese nuevo rol" value="{{old('txtusuario')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">CLAVE</label>
    <input type="text" class="form-control" name="txtclave" id="exampleInputPassword1" placeholder="Ingrese nuevo rol" value="{{old('txtclave')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">ROL</label>
    <select name="cbxrol" id="">
    <option value="{{old('cbxrol')}}" selected > -- Seleccione un Rol-- </option> 
    <option value="Administrador"> Administrador</option>
    <option value="Secretaria"> Secretaria</option>
    
    </select>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Persona</label>
    <select name="cbxpersona" id="">
    <option value="{{old('cbxpersona')}}" selected > -- Seleccione una persona-- </option> 
    <?php 



$result = mysqli_query($con,"select PER_ID, PER_NOMBRES,PER_APELLIDOS FROM tbl_personas WHERE PER_ID NOT IN(SELECT PER_ID FROM tbl_usuarios)"); 

while($row = mysqli_fetch_array($result)) { 
?> 
  <option value="<?php echo $row['PER_ID']; ?>"><?php echo $row['PER_NOMBRES']; ?>  <?php echo $row['PER_APELLIDOS']; ?></option> 
<?php 
} 


?> 

    </select>

  </div>
<input type="submit" value="GUARDAR" class="btn btn-primary">
  
</form>


  </div>

  </div>

</div>
</section>
    <!-- Main content -->
    



@endsection
