


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  <title></title>
</head>
<body>

<section class="container-fluid">
<?php 
include '../conexion.php';
$con=conectar();


?>

 

<div class="table-responsive" id="general">
<table class="table">
  <thead>
  
    <tr>
      <th scope="col">#</th>
      <th>TURNO</th>
      <th>MATRÍCULA</th>
      <th>ESTADO</th>
    </tr>
   
  </thead>
  <tbody>
  
  
  <?php
$turno="call proc_turnopersonas(2)";
$turno_pers=mysqli_query($con,$turno);

while($row=mysqli_fetch_array($turno_pers)){

?>
    <tr>

      <th></th>
      <td><?php echo $row[0] ?> </td>
      <td><?php echo $row[1] ?> </td>
      <td><div class="btn btn-primary"><?php echo $row[2] ?> </div></td>
    </tr>
 <?php
}
mysqli_free_result($turno_pers);
 ?>
  </tbody>
    </div>
    <hr class="my-4">
    <div class="container">
  <div class="row">
    <div class="col">
      
    <div class="table-responsive">
    <table align="center" class="table">
    <tr>
    <th scope="col">Turno</th>
    <th scope="col">Turno</th>
    <th scope="col">Turno</th>
    </tr>
    <tr>
    <td scope="row">fila1</td>
    <td scope="row">fila1</td>
    <td scope="row">fila1</td>
    <tr></table>

    </div>

    </div>
    <div class="col">
      
    <a href="Logica/gestion.php?idturno=<?php echo $id ?>" class="btn btn-primary" >Siguiente</a>
    <a href="#" class="btn btn-info"  >Finalizar</a>
    <a href="#" class="btn btn-warning">Llamar</a>
    <a href="#" class="btn btn-danger">Anular</a>
    <a href="#" class="btn btn-success">Atender</a>


     
    </div>
  </div>


    
   


    </section>
</body>
</html>