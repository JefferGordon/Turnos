@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    
    <section class="container-fluid">
    <?php 

include 'conexion.php';
$con=conectar();

$mat = mysqli_query($con,"select count(MAT_ID) FROM tbl_matriculas"); 
$per= mysqli_query($con,"select count(PERI_ID) FROM tbl_periodos");
while($row = mysqli_fetch_array($mat)) { 

  $num=$row[0];
}
while($peri = mysqli_fetch_array($per)) { 

  $numper=$peri[0];
}

if($num==0){


?> 
  
  <div class="alert alert-danger" role="alert">
  No cuenta con matrículas registrados en el sistema!
</div>
<?php
}
if($numper==0){

?>
<div class="alert alert-danger" role="alert">
  No cuenta con períodos registrados o activos en el sistema!
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
    <h3 class="box-title">FORMULARIO ASIGNACIÓN DE PERÍODOS-MATRÍCULAS</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  







  <div class="card">
 
  <div class="card-body">
    
    <form action="{{ route('periodomatricula.store') }}" method="post">
  
 
  
  <div class="form-group">
    <label for="exampleInputPassword1">Fecha Inicio</label>
    <input type="date" class="form-control" name="txtfechini"   placeholder="Ingrese fecha inicio" value="{{old('txtfechini')}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Fecha Fin</label>
    <input type="date" class="form-control" name="txtfechfin" id="exampleInputPassword1"  value="{{old('txtfechfin')}}" placeholder="Ingrese fechafin"  >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Período</label>

    <select name="cbxperiodo" > 
                <option value="{{old('cbxperiodo')}}" selected > -- Seleccione un período -- </option> 
                <?php 



$result = mysqli_query($con,"SELECT PERI_ID, PERI_DESCRIPCION FROM tbl_periodos WHERE PERI_ESTADO='A'"); 

while($row = mysqli_fetch_array($result)) { 
?> 
  <option value="<?php echo $row['PERI_ID']; ?>"><?php echo $row['PERI_DESCRIPCION']; ?></option> 
<?php 
} 


?> 
                </select>

      </div>
      <div class="form-group">
    <label for="exampleInputPassword1">Matrícula</label> 

    <select name="cbxmatricula" > 
                <option value="{{old('cbxmatricula')}}" selected > -- Seleccione una matrícula -- </option> 
                <?php 



$resul = mysqli_query($con,"SELECT MAT_ID, MAT_DESCRIPCION FROM tbl_matriculas WHERE MAT_ESTADO='A'"); 

while($rows = mysqli_fetch_array($resul)) { 
?> 
  <option value="<?php echo $rows['MAT_ID']; ?>"><?php echo $rows['MAT_DESCRIPCION']; ?></option> 
<?php 
} 


?> 
                </select>

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
