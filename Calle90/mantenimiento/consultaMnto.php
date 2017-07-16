<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/Calle90/css/bootstrap.css">
  <!-- Estilos -->
  <link rel="stylesheet" href="/Calle90/css/estilos.css">
  <!-- fuentes -->
  <link rel="stylesheet" href="/Calle90/css/font-awesome.min.css">
  <title>Prestamos</title>
</head>


</head>
<body>

  <section id="navbar">

    <div class="row-fluid">
      <nav class="text-center navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        <a class="navbar-brand" href="/Calle90/administradores/indexadmon.php">Uniminuto</a>

      </nav>

    </div>

  </section>
  <section id="jumbotron">

    <div class="jumbotron">
      <h1 class="text-center"><?php session_start();include 'operaciones.php';imprimirnombre(); ?></h1>

      <p class="text-center">A continuacion encontrara el formulario correspondiente para prestamo de equipos</p>

    </div>

  </section>
  <section>


  </section>
    <form action="ejecdevol.php" method="post">
  <section id="formulario">

<div class="container">
      <div class="col-lg-12 text-center bg-faded">
          <h3>MANTENIMIENTO</h3>
      </div>
      <div class="row">&nbsp;</div>

    <?php
    include 'conexion.php';
    $link=conectar();
    $sql='SELECT * FROM mantenimiento  ORDER BY CodigoMnto DESC';
    $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

    if($result->num_rows>0){?>
      <?php  while($r=$result->fetch_array()){?>

    <div class="container">
    <table class="table table-bordered ">
    <thead class="thead-inverse">
      <th>Quien realiza</th>
      <th>Fecha mantenimiento</th>
      <th>Proximo mantenimiento</th>
      <th>Periodicidad</th>
      <th>Tipo Mantenimiento</th>
      <th>Operaciones</th>
    </thead>
    <tr>
      <td><?php echo $r["QuienRealiza"]; ?></td>
      <td><?php echo $r["FechaMnto"]; ?></td>
      <td><?php echo $r["ProximoMnto"]; ?></td>
      <td class="text-center"><?php echo $r["Periodicidad"]; ?></td>
      <td><?php echo $r["TipoMantenimiento"]; ?></td>
      <?php $_SESSION['CodigoMnto']=$r['CodigoMnto']; ?>
      <?php $Usuario_IdUsuario=$r['Proveedor_NIT']; ?>
      <?php $Equipo_ActivoFijo=$r['Equipo_ActivoFijo']; ?>
      <td><a href="updateMnto.php?CodigoMnto=<?php echo $_SESSION['CodigoMnto'];?>" class="btn btn-sm btn-primary">Actualizar</a><br>
      <a href="eliminarMnto.php?CodigoMnto=<?php echo $_SESSION['CodigoMnto'];?>" class="btn btn-sm btn-danger">Eliminar</a><br></td>
    </tr>
</div>
<div class="row">
  <table class="table table-bordered ">
        <thead class="thead-inverse">
          <th class="text-center">Descripcion Mantenimiento</th>
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



</form>
<div class="row">&nbsp;</div>
<div class="col-lg-12">


</div>

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

</body>

</html>
