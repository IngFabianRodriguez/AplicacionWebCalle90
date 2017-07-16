<?php
function conectar(){
$h='localhost';// servidor de MYSQL
$u='id370009_mccracflow'; // Usuario de MYSQL
$p='fabian17+'; // password de la MYSQL
$db_name='id370009_appwebpcis';
//crea a conexion a la BD
$link= mysqli_connect($h,$u,$p) or die ("Error al conectarse a la BD");
//seleccionar la BD
  mysqli_select_db($link,$db_name) or die ("ERROR al seleccionar la BD");
   return $link;
   }
    ?>
