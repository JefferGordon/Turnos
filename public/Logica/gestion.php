<?php
include '../conexion.php';

$con=conectar();

$idper=$_GET['idper'];
$accion= $_GET["accion"];

$file='../recursos/sonidos/turnos.mp3';

 if($accion=="llamar"){

    try {
        $llamar="call proc_llamar($idper)";
        $turno_siguiente=mysqli_query($con,$llamar);


if($turno_siguiente){
   
   
      
        sleep(2);
    
         echo "<script>window.location.replace('../principal');</script>";
}else{
    echo "<script>window.location.replace('../principal');</script>";
}
        
        } catch (\Throwable $th) {
            
        }
        finally{
            mysqli_close($con);
        }
}



if($accion=="finalizar"){

    try {
        $finalizar="call proc_finalizar($idper)";
        $turno_siguiente=mysqli_query($con,$finalizar);

if($turno_siguiente){
    echo "<script>window.location.replace('../principal');</script>";
}else{
    echo "<script>window.location.replace('../principal');</script>";
}
        
        } catch (\Throwable $th) {
            
        }
        finally{
            mysqli_close($con);
        }
}
if($accion=="anular"){

    try {
        $anular="call proc_anular($idper)";
        $turno_siguiente=mysqli_query($con,$anular);

if($turno_siguiente){
   // header('Location:../principal');
   echo "<script>window.location.replace('../principal');</script>";
}else{
    echo "<script>window.location.replace('../principal');</script>";
}
        
        } catch (\Throwable $th) {
            
        }
        finally{
            mysqli_close($con);
        }
}



?>