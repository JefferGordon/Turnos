@extends('menu/index')
@section('content')
<?php 
include 'conexion.php';
$con=conectar();


?>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
<label>BUSCAR:</label> <input id="searchTerm" type="text"  onkeyup="doSearch()" class="input-helper"/>
<div id="areaImprimir">
<div style="overflow-x:auto;">
  <table id="datos">
    <tr>
      <th>Codigo</th>
      <th>Turno</th>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Estado</th>
      <th>Matricula</th>
      <th>Periodo</th>
      <th>Apellidos</th>
      <th>Nombres</th>
      <th>Cedula</th>
      
    </tr>

    <?php
$id=$_GET['selpersona'];
$query="call proc_reporteMatricula(2)";
$sql = mysqli_query($con,$query); 

while($rows = mysqli_fetch_array($sql)) { 

?>

    <tr>
    <td ><?php echo $rows[0] ?></td>
    <td ><?php echo $rows[1] ?></td>
    <td ><?php echo $rows[2] ?></td>
    <td ><?php echo $rows[3] ?></td>
    <td ><?php echo $rows[4] ?></td>
    <td ><?php echo $rows[5] ?></td>
    <td ><?php echo $rows[6] ?></td>
    <td ><?php echo $rows[7] ?></td>
    <td ><?php echo $rows[8] ?></td>
    <td ><?php echo $rows[9] ?></td>

    </tr>
  
    <?php
}
?>
  </table>
</div>

</div>
<br>
<input type="button" onclick="printDiv('areaImprimir')" value="Imprimir reporte" class="btn badge-primary"/>
@endsection