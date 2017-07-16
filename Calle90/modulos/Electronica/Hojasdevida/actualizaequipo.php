<?php
include 'conexion.php';

session_start();
if ($_SESSION) {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/Calle90/css/bootstrap.css">
        <!-- Estilos -->
        <link rel="stylesheet" href="/Calle90/css/estilos.css">
        <!-- fuentes -->
        <link rel="stylesheet" href="/Calle90/css/font-awesome.min.css">
        <style>
   .error {font-weight: bold; color:red;}
   .mensaje {color:#030;}
   .listadoImagenes img {float:left;border:1px solid #ccc; padding:2px;margin:2px;}
   </style>
        <title>Actuaizar equipo</title>
    </head>

    <body>

<?php

# Conectamos con MySQL
$link=conectar();

$nombre_elemento=$_REQUEST['nombre_elemento'];
$sede=$_REQUEST['sede'];
$ciudad=$_REQUEST['ciudad'];
$Pais=$_REQUEST['pais'];
$Piso=$_REQUEST['piso'];
$Laboratorio=$_REQUEST['laboratorio'];
$ActivoFijo=$_REQUEST['ActivoFijo'];
$categoria=$_REQUEST['categoria'];
$marca=$_REQUEST['marca'];
$modelo=$_REQUEST['modelo'];
$serie=$_REQUEST['serie'];
$fecha_adquisicion=$_REQUEST['fecha_adquisicion'];
$descripcion_equipo=$_REQUEST['descripcion_equipo'];
$tiempo_garantia=$_REQUEST['tiempo_garantia'];
$garantia_fecha_fin=$_REQUEST['garantia_fecha_fin'];
$estado=$_REQUEST['estado'];



$sql='SELECT * FROM `ciudad` WHERE nombre="'.$ciudad.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$codigoCiudad= $r["idCiudad"];
 }
}
$sql='SELECT * FROM `pais` WHERE NombrePais="'.$Pais.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$idPais= $r["idPais"];
 }
}
$sql  = 'SELECT * FROM ubicacion WHERE ubicacion.Sede="'.$sede.'" AND ubicacion.Laboratorio="'.$Laboratorio.'" AND ubicacion.Piso="'.$Piso.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$idUbicacion= $r["idSede"];

 }
}

$sql='UPDATE `equipo` SET `NombreEquipo`="'.$nombre_elemento.'",`Fabricante`="'.$marca.'",`Modelo`="'.$modelo.'",
`Serie`="'.$serie.'",`Categoria`="'.$categoria.'",`Descripcion`="'.$descripcion_equipo.'",`Estado`="'.$estado.'",`FechaAdquisicion`="'.$fecha_adquisicion.'",
`Pais_idPais`="'.$idPais.'",`Ciudad_idCiudad`="'.$codigoCiudad.'",`Ubicacion_idSede`="'.$idUbicacion.'" WHERE ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `garantia` SET `TiempoGarantia`="'.$tiempo_garantia.'",`FechaFin`="'.$garantia_fecha_fin.'" WHERE Equipo_ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));



echo "<script type='text/javascript'>
  alert('Equipo ingresado con exito al sistema ');
  window.location='/Calle90/modulos/Electronica/electronica.php';
</script>";


?>

    </body>

    </html>
    <?php
}
else {
	echo "<script type='text/javascript'>
		alert('Usted no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/index.php';
	</script>";
}

 ?>
