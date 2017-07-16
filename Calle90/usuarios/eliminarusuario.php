<?php

if($_GET["IdUsuario"]){
			include 'conexion.php';
						$link=conectar();
$sql= 'DELETE FROM `login` WHERE `Usuario_IdUsuario`= "'.$_GET["IdUsuario"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql= 'DELETE FROM `usuario` WHERE `IdUsuario`= "'.$_GET["IdUsuario"].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));


			if($result!=null){
				echo "<script>alert(\"Eliminado exitosamente.\");window.location='consulta_usuarios.php';</script>";
			}else{
				echo "<script>alert(\"No se pudo eliminar.\");window.location='consulta_usuarios.php';</script>";

			}
}

?>
