
<?php
function bienvenida(){
echo "<script type='text/javascript'>
        document.write('Bienvenido(a) ".$_SESSION['nombre']." ".$_SESSION['apellido']. " al sistema.');
        </script>";
}

function imprimirnombre(){
echo "<script type='text/javascript'>
        document.write('".$_SESSION['nombre']." ".$_SESSION['apellido']. "');
      </script>";
}
