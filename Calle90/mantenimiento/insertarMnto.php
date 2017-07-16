<?php
session_start();
include 'conexion.php';


$quienRealiza=$_REQUEST['quienRealiza'];
$fechaMnto=$_REQUEST['fechaMnto'];
$fechaProxMnto=$_REQUEST['fechaProxMnto'];
$tipo_mantenimiento=$_REQUEST['tipo_mantenimiento'];
$periodicidad=$_REQUEST['periodicidad'];
$nombre_proveedor=$_REQUEST['nombre_proveedor'];
$descripcionMnto=$_REQUEST['descripcionMnto'];

/*
$sql='SELECT * FROM proveedor WHERE RazonSocial="'.$nombre_proveedor.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));
if($result->num_rows>0){
while($r=$result->fetch_array()){
$NIT= $r['NIT'];
 }
}
*/
$link=conectar();
$activoF=$_SESSION['ActivoFijo'];
$sql='INSERT INTO `mantenimiento`(`QuienRealiza`, `FechaMnto`, `ProximoMnto`, `Periodicidad`, `TipoMantenimiento`, `DescripcionMnto`, `Equipo_ActivoFijo`, `Proveedor_NIT`) VALUES ("'.$quienRealiza.'","'.$fechaMnto.'","'.$fechaProxMnto.'","'.$periodicidad.'","'.$tipo_mantenimiento.'","'.$descripcionMnto.'","'.$activoF.'","'.$nombre_proveedor.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

echo "<script type='text/javascript'>
  alert('Mantenimiento ingresado con exito al sistema');
  window.location='/Calle90/modulos/Electronica/Hojasdevida/consultarhv.php';
</script>";



 ?>