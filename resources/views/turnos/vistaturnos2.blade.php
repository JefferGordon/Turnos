<?php 
include 'conexion.php';
$con=conectar();

?>


 
  <div class="row">

    <div class="col-6">
    <table class="">
  <thead>
    <tr>
      <th scope="col">TURNO</th>
      <th scope="col">DESCRIPCIÓN</th>
      <th scope="col">MÓDULO</th>
      <th scope="col">ESTADO</th>
    </tr>
  </thead>
  <tbody>
  <?php
$turno="call proc_vistaturnos()";
$turno_vista=mysqli_query($con,$turno);
while($row=mysqli_fetch_array($turno_vista)){
  
  
  if($row[3]=="LLAMANDO"){


  


      ?>

      
    <tr>
      <th class="alert alert-success"><?php echo $row[0] ?> </th>
      <th class="alert alert-success"><?php echo $row[1] ?> </td>
      <th class="alert alert-success"><?php echo $row[2] ?> </td>
      <th class="alert alert-success"><?php echo $row[3] ?> </td>
    </tr>
<?php 
  }

  if($row[3]=="ATENDIDO"){

 ?>
 <tr>
      <th class="alert alert-primary"><?php echo $row[0] ?> </th>
      <th class="alert alert-primary"><?php echo $row[1] ?> </td>
      <th class="alert alert-primary"><?php echo $row[2] ?> </td>
      <th class="alert alert-primary"><?php echo $row[3] ?> </td>
    </tr>
    <?php

  }

  if($row[3]=="FINALIZADO"){
    
  ?>

<tr>
      <th class="alert alert-secondary"><?php echo $row[0] ?> </th>
      <th class="alert alert-secondary"><?php echo $row[1] ?> </td>
      <th class="alert alert-secondary"><?php echo $row[2] ?> </td>
      <th class="alert alert-secondary"><?php echo $row[3] ?> </td>
    </tr>
    <?php
  }
  if($row[3]=="ANULADO"){
    
    
  ?>
  <tr>
      <th class="alert alert-danger"><?php echo $row[0] ?> </th>
      <th class="alert alert-danger"><?php echo $row[1] ?> </td>
      <th class="alert alert-danger"><?php echo $row[2] ?> </td>
      <th class="alert alert-danger"><?php echo $row[3] ?> </td>
    </tr>
    <?php
  }

}
mysqli_close($con);
?>
  </tbody>
</table>