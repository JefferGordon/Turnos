@extends('menu/index')
@section('content')


    <!-- Content Header (Page header) -->
    
    <section class="container-fluid">
    <?php 

include 'conexion.php';
$con=conectar();
?>
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Seleccione periodo</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  <div class="card">
  <div class="card-body">
    <form action="{{ url('/reporteperiodo') }}" method="GET">
  <div class="form-group">
    <label for="exampleInputPassword1">Lista de periodos</label>

    <select name="selpersona" multiple class="form-control" id="exampleFormControlSelect2">
                <?php 



$result = mysqli_query($con,"SELECT * FROM `tbl_periodos`"); 

while($row = mysqli_fetch_array($result)) { 
?> 
  <option value="<?php echo $row['PERI_ID']; ?>"><?php echo $row['PERI_DESCRIPCION']; ?></option> 
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
