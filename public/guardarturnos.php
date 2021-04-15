<?php
require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
include 'conexion.php';
$con=conectar();

$idmat=$_GET['idmat'];
$hora= time();


$sql="call proc_generarturnos($idmat)";
$imprimir="call proc_imprimir($idmat)";
$query = mysqli_query($con,$sql); 
$imp = mysqli_query($con,$imprimir); 

//$quer = mysqli_query($con, 'UPDATE numero set NUM_NUMERO=NUM_NUMERO+1');


while($row = mysqli_fetch_array($imp)) { 
        
$turno=$row[0];
$matricula=$row[1];
$fecha=$row[2];
$hora=$row[3];

}

if($query){
    
    echo "<script> alert('Imprimiendo.....') ;window.location.replace('turnos');   </script>";


/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = "impresora"; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);




/*
	Intentaremos cargar e imprimir
	el logo
*/

/*
	Ahora vamos a imprimir un encabezado
*/


$printer->text("-----------------------------"."\n");
$printer->text("ITSCO" . "\n");

$printer->setFont(Printer::FONT_B);
$printer->text("Su turno es:"."\n");

#La fecha también

$printer->text("-----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer ->selectPrintMode(Printer::MODE_DOUBLE_WIDTH | Printer:: MODE_DOUBLE_HEIGHT);


$printer->text($turno . "\n");
$printer -> selectPrintMode();
$printer->text($matricula . "\n");
$printer->text($fecha . "\n");
$printer->text($hora . "\n");
$printer->text("-----------------------------"."\n");

/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_LEFT);


$printer->text("Manténgase atento a su turno en   el monitor de la sala de espera.  \n");
$printer -> selectPrintMode();


/*Alimentamos el papel 3 veces*/
$printer->feed();

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

mysqli_close($con);

}
else
{
    echo "<script> alert('Eroor....') ;window.location.replace('turnos');   </script>";
}
?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('../recursos/css/sweetalert.css')}}">
    <link href="../recursos/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <title></title>
</head>
<body>
<?php
include 'conexion.php';
$con=conectar();

$idmat=$_GET['idmat'];
$hora= time();


$sql="call proc_generarturnos($idmat)";
$query = mysqli_query($con,$sql); 
$quer = mysqli_query($con,'UPDATE numero set NUM_NUMERO=NUM_NUMERO+1;');
if($query){
   
    
    

   ?>
   
   <script type="text/javascript"> 
  alert('Turno generado') ;window.location.replace('turnos');  
 
 </script>
<?php
}else{

    echo "<script> alert('Eroor....') ;window.location.replace('turnos');   </script>";
}


?>

<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="{{asset('../recursos/js/sweetalert.min.js')}}"></script>

</body>
</html>