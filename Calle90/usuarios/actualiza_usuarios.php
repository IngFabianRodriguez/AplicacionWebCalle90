<?php
session_start();
include 'conexion.php';
$link=conectar();

$nombre_usuario=$_REQUEST['nombre_usuario'];
$apellido_usuario=$_REQUEST['apellido_usuario'];
$identificacion_usuario=$_REQUEST['identificacion_usuario'];
$cargo_usuario=$_REQUEST['cargo_usuario'];
$telefono_usuario=$_REQUEST['telefono_usuario'];
$correo_usuario=$_REQUEST['correo_usuario'];


$sql='UPDATE `usuario` SET  `Nombre`="'.$nombre_usuario.'",`Apellido`="'.$apellido_usuario.'",`Cargo`="'.$cargo_usuario.'",
`Telefono`="'.$telefono_usuario.'",`Correo`="'.$correo_usuario.'" WHERE `IdUsuario`="'.$_SESSION['IdUsuario'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));


echo "<script type='text/javascript'>
  alert('Usuario Actualizado con exito al sistema ');
  window.location='/Calle90/usuarios/index_usuarios.php';
</script>";

 ?>
