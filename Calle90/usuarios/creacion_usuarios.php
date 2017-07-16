<?php
include 'conexion.php';
$link=conectar();

$nombre_usuario=$_REQUEST['nombre_usuario'];
$apellido_usuario=$_REQUEST['apellido_usuario'];
$identificacion_usuario=$_REQUEST['identificacion_usuario'];
$cargo_usuario=$_REQUEST['cargo_usuario'];
$telefono_usuario=$_REQUEST['telefono_usuario'];
$correo_usuario=$_REQUEST['correo_usuario'];

$sql='INSERT INTO `usuario` ( `IdUsuario`,`Nombre`, `Apellido`,  `cargo`, `telefono`, `correo`)
        VALUES ("'.$identificacion_usuario.'", "'.$nombre_usuario.'","'.$apellido_usuario.'","'.$cargo_usuario.'", "'.$telefono_usuario.'", "'.$correo_usuario.'")';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

$password="Uniminuto";
$sql='INSERT INTO `login` (`Correo`, `Password`, `Usuario_idusuario`)
      VALUES ( "'.$correo_usuario.'", "'.$password.'", "'.$identificacion_usuario.'")';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));


echo "<script type='text/javascript'>
  alert('Usuario ingresado con exito al sistema al sistema');
  window.location='/Calle90/usuarios/index_usuarios.php';
</script>";

 ?>
