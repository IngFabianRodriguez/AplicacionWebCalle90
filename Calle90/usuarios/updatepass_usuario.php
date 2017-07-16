<?php
include 'conexion.php';
$link=conectar();
session_start();

$contraseña_nueva=$_REQUEST['contraseña_nueva'];

$sql='UPDATE login SET password = "'.$contraseña_nueva.'" WHERE Usuario_IdUsuario= "'.$_SESSION['IdUsuario'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

session_destroy();

header('location: /Calle90/index.php');

  ?>
