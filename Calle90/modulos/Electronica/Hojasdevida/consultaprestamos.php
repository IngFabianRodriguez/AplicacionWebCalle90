<?php

session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="/Calle90/css/bootstrap.css">
      <!-- Estilos -->
      <link rel="stylesheet" href="/Calle90/css/estilos.css">
      <!-- fuentes -->
      <link rel="stylesheet" href="/Calle90/css/font-awesome.min.css">

  <title>Consulta prestamos</title>
</head>
<body>
  <section id="navbar">

  <div class="row-fluid">
      <nav class="text-center navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand navbar-left" href="/Calle90/administradores/indexadmon.php">Uniminuto</a>

      </nav>
    </div>
  </section>
  <section id="jumbotron">

      <div class="jumbotron bg-success text-center">
        <h2>Bienvenido <?php include 'operaciones.php';imprimirnombre(); ?></i></h2>
        <p>A continuacion podras realizar las operaciones correspondientes a los equipos</p>
      </div>

  </section>
  <section>
    <div class="container">

    <div class="row">
      <div class="col-lg-10">
        <h5>Para exportar esta hoja de vida de equipo a PDF podras generarlo con solo seguir el siguiente boton</h5>
      </div>
      <div class="col-lg-2">
        <a href="/Calle90/modulos/Electronica/Hojasdevida/PDFprestamos.php" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar PDF</a>
        </div>
      </div>
    </div>
  </section>
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="container">

  <?php
  include 'conexion.php';
  $link=conectar();
  ?>
  <section id="formulario">


    <div class="container">
      <div class="col-lg-12 text-center bg-faded">
          <h3>DEVOLUCION</h3>
      </div>
      <div class="row">&nbsp;</div>

    <?php

    $sql='SELECT * FROM prestamo WHERE Equipo_ActivoFijo="'.$_GET['ActivoFijo'].'" ORDER BY CodigoPrestamo DESC';
    $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

    if($result->num_rows>0){?>

    <table class="table table-bordered ">
    <thead class="thead-inverse">
      <th>Nombre Estudiante</th>
      <th>Fecha</th>
      <th>Hora Prestamo</th>
      <th>Hora Devolucion</th>
      <th>ActivoFijo</th>
      <th>Elemento prestado</th>

    </thead>
    <?php  while($r=$result->fetch_array()){?>

    <tr>
      <td><?php echo $r["NombreCompleto"]; ?></td>
      <td><?php echo $r["Fecha"]; ?></td>
      <td><?php echo $r["HoraPrestamo"]; ?></td>
      <td><?php echo $r["HoraDevolucion"]; ?></td>
      <td><?php echo $r["Equipo_ActivoFijo"]; ?></td>
      <td><?php echo $_SESSION['NombreEquipo']; ?></td>
      <?php $_SESSION['ActivoFijo']=$r['Equipo_ActivoFijo'];?>

      <?php } ?>
      <?php} else {
      echo "NO SE ENCONTRARON RESULTADOS";
      ?>
      <?php } ?>

    </tr>

    </table>

    </div>
  </section>

  </div>
  </div>
  </div>
  </div>
</body>
</html>
