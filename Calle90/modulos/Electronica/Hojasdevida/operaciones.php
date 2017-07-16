<?php
function imprimirnombre(){
echo "<script type='text/javascript'>
        document.write('Bienvenido(a) ".$_SESSION['cargo']." ".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema.');
      </script>";

}
 ?>
