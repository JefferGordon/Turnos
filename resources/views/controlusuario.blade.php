<!doctype html>
<?php
include 'conexion.php';
$con=conectar();
?>
<html lang="en">
  <head>
    <!-- Etiquetas <meta> obligatorias para Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('recursos/css/botones.css')}}">
    <link rel="shortcut icon" href="{{asset('recursos/img/itsco.jpg')}}">

    <!-- Enlazando el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title></title>
  </head>
  <body >

  <style>
  body{
    background-image: url("recursos/img/fondoLogo.png");
    height: 100%;
        width: 95%;
        background-repeat: no-repeat;
			  background-size: cover;
			  position: relative;
  }
  </style>
  <div class="container" >
  <br>
  <br>

  <h1><img src="https://www.cordillera.edu.ec/wp-content/uploads/logo2018.png"  title="">
SISTEMA DE TURNOS INSTITUTO TECNOLÓGICO SUPERIOR CORDILLERA</h1>
  <br>

 
  <h4>Genere su turno de acuerdo al proceso correspondiente:</h4>
  <br>
  <br>

  <style> #sep{
    padding-bottom: 10px;
    padding-top: 10px;
    margin-top: 20px;
  } 
  
  
  </style>

<script>setTimeout('document.location.reload()',60000); </script>
<div class="col-md-12">
  <div class="row" align="center">
      <?php
      $mat="call proc_mostrarmatricula()";
      $sql = mysqli_query($con,$mat); 

      while($row = mysqli_fetch_array($sql)) { 
       
      ?>
<div class="col-md-6" id="sep"> <a href="guardarturnos.php?idmat=<?php echo $row[0] ?>" style='text-decoration:none'><?php echo $row[1] ?></a></div>
<br>

<?php
}
mysqli_close($con);
?>

</div>
  
</div>
    <!-- Opcional: enlazando el JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>