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

    <form action="ejecdevol.php" method="post">
  <section id="formulario">


    <div class="container">
      <div class="col-lg-12 text-center bg-faded">
          <h3>PRESTAMOS</h3>
      </div>
      <div class="row">&nbsp;</div>

    <?php
    include 'conexion.php';
    $link=conectar();
    $sql='SELECT * FROM prestamo WHERE CodigoEstudiante="'.$_REQUEST['idEstudiante'].'" ORDER BY CodigoPrestamo DESC';
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
      <th>Devolver</th>

    </thead>
    <?php  while($r=$result->fetch_array()){?>

    <tr>
      <td><?php echo $r["NombreCompleto"]; ?></td>
      <td><?php echo $r["Fecha"]; ?></td>
      <td><?php echo $r["HoraPrestamo"]; ?></td>
      <td><?php echo $r["HoraDevolucion"]; ?></td>

      <td><?php echo $r["Equipo_ActivoFijo"]; ?></td>
      <td><?php echo $_SESSION['NombreEquipo']; ?></td>
      <?php if ($r["HoraDevolucion"=="00:00:00"]){
      echo "<td><a href='ejecdevol.php?CodigoPrestamo=".$r["CodigoPrestamo"]."' class='btn btn-sm btn-primary'>Devolucion</a><br></td>";
    }else {     echo "<td>Devolucion completada</td>";
     } ?>

      <?php $_SESSION['CodigoPrestamo']=$r['CodigoPrestamo']; ?>
      <?php $Usuario_IdUsuario=$r['Usuario_IdUsuario']; ?>
      <?php $Equipo_ActivoFijo=$r['Equipo_ActivoFijo']; ?>
      <?php } ?>
      <?php} else {
      echo "NO SE ENCONTRARON RESULTADOS";
      ?>
      <?php } ?>

    </tr>

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
