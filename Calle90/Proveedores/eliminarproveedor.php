<?php

if($_GET["NIT"]){
			include "conexion.php";
						$link=conectar();
$sql= 'DELETE FROM `infolegal` WHERE `proveedor_NIT`= "'.$_GET["NIT"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql= 'DELETE FROM `tributaria` WHERE `proveedor_NIT`= "'.$_GET["NIT"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql= 'DELETE FROM `contacto` WHERE `proveedor_NIT`= "'.$_GET["NIT"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql= 'DELETE FROM `bancaria` WHERE `proveedor_NIT`= "'.$_GET["NIT"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql= 'DELETE FROM `proveedor` WHERE `NIT`= "'.$_GET["NIT"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));


			if($result!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='consultaprov.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='consultaprov.php';</script>";

			}
}

?>
