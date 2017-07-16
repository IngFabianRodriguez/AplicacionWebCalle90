<?php
session_start();
include 'conexion.php';
include 'operaciones.php';
$link=conectar();
imprimirhora();


$sql='UPDATE `equipo` SET `Estado`="Libre" WHERE equipo.ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

$sql='UPDATE prestamo SET HoraDevolucion="'.$_SESSION['hora'].'" WHERE CodigoPrestamo="'.$_GET['CodigoPrestamo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

echo "<script type='text/javascript'>
  alert('Proveedor ingresado con exito al sistema ');
  window.location='/Calle90/modulos/Electronica/Hojasdevida/consultarhv.php';
</script>";

 ?>
