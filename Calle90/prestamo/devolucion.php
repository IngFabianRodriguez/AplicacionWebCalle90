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
    <form action="consultadev.php" method="post">
  <section id="formulario">


    <div class="container">
      <div class="col-lg-12 text-center bg-faded">
          <h3>DEVOLUCION</h3>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">
        <div class="col-lg-3">&nbsp;</div>
      <div class="col-lg-6">
      <h5> Id estudiante</h5>
      </div>
      <div class="col-lg-3">&nbsp;</div>
      </div>
    <?php

     ?>
    <div class="row">
      <div class="col-lg-3">&nbsp;</div>
      <div class="col-lg-6">
        <input type="text" name="idEstudiante" pattern="[0-9]+{0,9}" maxlength="9" class="form-control">
      </div>
    <div class="col-lg-3">&nbsp;</div>
    </div>


    </div>
  </section>
<section>
  <div class="container">
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">&nbsp;</div>
    <div class="row">
      <div class="col-lg-10">&nbsp;</div>
      <div class="col-lg-2">
        <input type="submit" class="btn btn-primary" value="Devolver">
      </div>
    </div>
  </div>

</section>
</form>
  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

</body>

</html>
