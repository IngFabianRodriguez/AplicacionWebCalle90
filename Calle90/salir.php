<?php
session_start();
session_destroy();
echo "<script type='text/javascript'>
   alert('Se ha cerrado la session exitosamente');
     window.location='index.php';
 </script>";
  ?>
