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
  <section>
    <div class="col-lg-12 text-center bg-faded">
        <h4>GESTIONAR MANTENIMIENTO</h4>
    </div>>
  </section>
<section>
<div class="container">
  <div class="row">
    <div class="col-lg-1">&nbsp;</div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-block">
          <h4 class="card-title"> Ingresar Mantenimiento </h4>
          <div class="row">&nbsp;</div>
          <a href="/Calle90/modulos/Electronica/Hojasdevida/consultahv.php"class="btn btn-primary">Ingresar</a>
        </div>
      </div>
    </div>
    <div class="col-lg-5">
      <div class="card">
        <div class="card-block">
          <h4 class="card-title"> Operaciones mantenimientos </h4>
            <div class="row">&nbsp;</div>
          <a href="/Calle90/mantenimiento/consultaMnto.php"class="btn btn-primary">Ingresar</a>
        </div>
      </div>
    </div>
    <div class="col-lg-1">&nbsp;</div>
  </div>
</div>


</section>



</body>
</html>
