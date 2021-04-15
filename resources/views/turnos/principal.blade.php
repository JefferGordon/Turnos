
@extends('menu/index')
@section('content')
<?php

include 'conexion.php';
$con=conectar();

$idper= session()->get('id');
?>


<audio id="sonido">


<source src="recursos/sonidos/turnos.mp3" />

</audio>

  
<script>
   
       
    $(docunent).ready(function (){

var sonido=document.getElementById("sonido")
sonido.play();
});
    </script>
    
<div class="content">

  <div id="turnos">

  <section class="container-fluid">
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Panel de control </h3>
    <label id="contador">
      <?php
$contar=0;
      try {
        $cont=mysqli_query($con,"SELECT COUNT(TUR_ID) as turnos from tbl_turnos  where (TUR_ESTADO='FINALIZADO' OR TUR_ESTADO='ANULADO') and (PER_ID=$idper and TUR_FECHA= CURRENT_DATE())  ");
        while($conta=mysqli_fetch_array($cont)){
          $contar=$conta[0];
        }
      } catch (\Throwable $th) {
       
      }finally{
        
      }


      ?>
    Turnos atendidos:<label class="btn btn-info"><?php echo $contar ?></label>
</label>
    </div>
 </div>

   
<div class="row">
    <div class="col">
    <table class="table">
  <thead>
  
    <tr>
     
      <th>TURNO</th>
      <th>MATRÍCULA</th>
      <th>ESTADO</th>
    </tr>
   
  </thead>
  <tbody>
  
  
  <?php
  

$turno="call proc_turnopersonas($idper)";
$turno_pers=mysqli_query($con,$turno);

$llamar="";

$finalizar="disabled";
$anular="disabled";

while($row=mysqli_fetch_array($turno_pers)){
   
  
  if($row[2]=="LLAMANDO"){
    
   $finalizar="";
$anular="";
    $llamar="disabled";
  }
  if ($row[2]=="FINALIZAR"){
   
    $llamar="";
   
    $finalizar="disabled";
    $anular="disabled";
  }
  if ($row[2]=="ANULAR"){
 
    $llamar="";
   
    $finalizar="disabled";
    $anular="disabled";
  }
  
?>
    <tr>

   
      <td><?php echo $row[0] ?> </td>
      <td><?php echo $row[1] ?> </td>
      <td><div class="alert alert-success" role="alert"><?php echo $row[2] ?></div> </td>
    </tr>
 <?php
}
 


mysqli_free_result($turno_pers);
mysqli_close($con);

 ?>

  </tbody>
</table>
    </div>
    <div class="col">
      
    <div class="row">
    
    <div class="col-sm">
    <form action="logica/gestion.php" method="GET">
    <input type="text" name="accion" value="llamar" hidden>
    <input type="text" name="idper" value="<?php echo $idper?>" hidden>
    <input type="submit" value="Llamar" class="btn btn-warning" onclick="sonido.play()" <?php echo $llamar?>/>
    </form>
    </div>
    <div class="col-sm">
    <form action="logica/gestion.php" method="GET">
    <input type="text" name="accion" value="finalizar" hidden>
    <input type="text" name="idper" value="<?php echo $idper?>" hidden>
    <input type="submit" value="Finalizar" class="btn btn-dark" <?php echo $finalizar?>  />
    </form></div>
    <div class="col-sm">
    <form action="logica/gestion.php" method="GET">
    <input type="text" name="accion" value="anular" hidden>
    <input type="text" name="idper" value="<?php echo $idper?>" hidden>
    <input type="submit" value="Anular" class="btn btn-danger"  <?php echo $anular?> />
    </form></div>
  </div>

  
  </div>

    </div>
  </div>
  







  </div>


  <div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Turnos generados</h3>


    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
        <i class="fa fa-minus"></i></button>
     
    </div>
  </div>
  <div class="box-body">
  
  <div class="card">
 
  <div class="card-body">
  <div id="contenido" class="table-responsive">
  

<iframe src="principal2" width="1200" height="200" style="border:none;"></iframe>

</div>
   


  </div>

  </div>
  <!-- /.box-body -->
  
  <!-- /.box-footer-->
</div>

  

</div>







@endsection
