
<?php 
include 'conexion.php';
$con=conectar();


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
 <style>
 #contador{
   margin-left:500px;
 }
 
 table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #fff}

th {
  background-color: #2d4838;
  color: white;
}
 </style>


    <label id="contador">
     
     <?php
$cont=mysqli_query($con,"SELECT COUNT(TUR_ID) as turnos from tbl_turnos  where TUR_ESTADO='GENERADO'");

while($conta=mysqli_fetch_array($cont)){
  $contar=$conta[0];
}
      ?>

    Turnos en espera:<label class="btn btn-info"><?php echo $contar ?></label>
</label>
   

<div class="table-responsive" id="general">
    <table class="table">
    <tr>

    <th scope="col">TURNO</th>
    <th scope="col">MATRÍCULAS</th>
    <th scope="col">ESTADO </th>
    </tr>
    <?php

      $query="call proce_panelmatriculas()";
      $sql = mysqli_query($con,$query); 

      while($rows = mysqli_fetch_array($sql)) { 
       
      ?>
    <tr>
  

    <td scope="row"><?php echo $rows[1] ?></td>
    <td scope="row"><?php echo $rows[2] ?></td>
    <td scope="row"><div class="btn btn-primary"><?php echo $rows[6] ?></div></td>
   

    <tr> 
    <?php
      }
      mysqli_free_result($sql);
      mysqli_close($con);
      ?>
   </table>
  
    </div>
    </div>
    <script>setTimeout('document.location.reload()',2000); </script>
  </section>
  
 
