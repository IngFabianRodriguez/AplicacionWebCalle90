<?php
function imprimirnombre(){
echo "<script type='text/javascript'>
        document.write('".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema.');
      </script>";

}
 ?>
