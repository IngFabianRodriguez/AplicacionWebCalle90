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

  <title>Consulta mantenimientos</title>
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
        <a href="/Calle90/modulos/Electronica/Hojasdevida/PDFmnto.php" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar PDF</a>
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
          <h3>MANTENIMIENTO</h3>
      </div>
      <div class="row">&nbsp;</div>

    <?php

    $sql='SELECT * FROM mantenimiento WHERE Equipo_ActivoFijo="'.$_GET['ActivoFijo'].'" ORDER BY CodigoMnto DESC';
    $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

    if($result->num_rows>0){?>
    <?php  while($r=$result->fetch_array()){?>
      <div class="container">

    <table class="table table-bordered">
    <thead class="thead-inverse">
      <th>Quien Realiza</th>
      <th>Fecha Mantenimiento</th>
      <th>Proximo mantenimiento</th>
      <th>Periodicidad</th>
      <th>Proveedor NIT</th>
      <th>Tipo mantenimiento</th>
    </thead>
    <tr>
      <td><?php echo $r["QuienRealiza"]; ?></td>
      <td><?php echo $r["FechaMnto"]; ?></td>
      <td><?php echo $r["ProximoMnto"]; ?></td>
      <td><?php echo $r["Periodicidad"]; ?></td>
      <td><?php echo $r["Proveedor_NIT"]; ?></td>
      <td><?php echo $r["TipoMantenimiento"]; ?></td>
    </tr>
  </div>
  <div class="row">


    <table class="table table-bordered">

    <thead class="thead-inverse">
      <th class="text-center">Descripción</th>
    </thead>
    <tr>
      <td><?php echo $r["DescripcionMnto"]; ?></td>

    </tr>
  </table>
<hr>
</div>
    <?php } ?>
    <?php} else {
    echo "NO SE ENCONTRARON RESULTADOS";
    ?>
    <?php } ?>
    </table>

    </div>
  </section>

  </div>
  </div>
  </div>
  </div>
</body>
</html>
