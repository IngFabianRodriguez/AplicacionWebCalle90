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
        <title>Siguiente...</title>
    </head>

    <body>

<?php

# Conectamos con MySQL
$link=conectar();


$quienRealiza=$_REQUEST['quienRealiza'];
$fechaMnto=$_REQUEST['fechaMnto'];
$fechaProxMnto=$_REQUEST['fechaProxMnto'];
$tipo_mantenimiento=$_REQUEST['tipo_mantenimiento'];
$periodicidad=$_REQUEST['periodicidad'];
$nombre_proveedor=$_REQUEST['nombre_proveedor'];
$descripcionMnto=$_REQUEST['descripcionMnto'];



$sql='UPDATE `mantenimiento` SET `QuienRealiza`="'.$quienRealiza.'",`FechaMnto`="'.$fechaMnto.'",`ProximoMnto`="'.$fechaProxMnto.'",
`Periodicidad`="'.$periodicidad.'",`TipoMantenimiento`="'.$tipo_mantenimiento.'",`DescripcionMnto`="'.$descripcionMnto.'",
`Equipo_ActivoFijo`="'.$_SESSION['ActivoFijo'].'",`Proveedor_NIT`="'.$nombre_proveedor.'"
WHERE CodigoMnto="'.$_SESSION['CodigoMnto'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));



echo "<script type='text/javascript'>
  alert('Mantenimiento actualizado con exito al sistema ');
  window.location='/Calle90/modulos/Electronica/electronica.php';
</script>";


?>

    </body>

    </html>
    <?php
}
else {
	echo "<script type='text/javascript'>
		alert('Ud no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/index.php';
	</script>";
}

 ?>
