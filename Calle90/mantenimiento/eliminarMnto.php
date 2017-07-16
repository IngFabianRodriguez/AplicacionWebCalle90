<?php

if($_GET["CodigoMnto"]){
			include "conexion.php";
						$link=conectar();
$sql= 'DELETE FROM `mantenimiento` WHERE `CodigoMnto`= "'.$_GET["CodigoMnto"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));


			if($result!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='consultaMnto.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='consultaMnto.php';</script>";

			}
}

?>
