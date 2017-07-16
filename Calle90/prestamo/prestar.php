<?php
session_start();
include 'conexion.php';
$link=conectar();

$idEstudiante=$_REQUEST['idEstudiante'];
$nombreEstudiante=$_REQUEST['nombreEstudiante'];
$horaPrestamo=$_REQUEST['hora_prestamo'];
$fecha_prestamo=$_REQUEST['fecha_prestamo'];

$sql='SELECT idUsuario From usuario WHERE usuario.Nombre="'.$_SESSION['nombre'].'" AND usuario.Apellido="'.$_SESSION['apellido'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$idUsuario= $r["idUsuario"];
 }
}

$sql='INSERT INTO `prestamo`(`CodigoEstudiante`, `NombreCompleto`, `Fecha`, `HoraPrestamo`, `HoraDevolucion`, `Equipo_ActivoFijo`, `Usuario_IdUsuario`)
VALUES ("'.$idEstudiante.'","'.$nombreEstudiante.'","'.$fecha_prestamo.'","'.$horaPrestamo.'","null","'.$_SESSION['ActivoFijo'].'","'.$idUsuario.'")';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

$sql='UPDATE `equipo` SET `Estado`="Prestado" WHERE equipo.ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));


echo "<script type='text/javascript'>
  alert('Prestamo realizado con exito en el sistema ');
  window.location='/Calle90/modulos/Electronica/Hojasdevida/consultarhv.php';
</script>";

 ?>
