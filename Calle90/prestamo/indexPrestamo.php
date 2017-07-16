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
      <h1 class="text-center"><?php session_start();include 'operaciones.php';bienvenida(); ?></h1>
  <?php $_SESSION['ActivoFijo']=$_GET['ActivoFijo']; ?>
      <p class="text-center">A continuacion encontrara los modulos que estan disponibles para manejar de los equipos</p>

    </div>
  </section>

  <section>
    <div class="container">
      <div class="col-lg-12 text-center bg-faded">
          <h4>GESTIONAR PRESTAMO</h4>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">
        <div class="col-lg-1">&nbsp;</div>
        <div class="col-lg-5">
          <div class="card">
  <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Prestamo</h4>
    <p class="card-text">
      Some quick example text to build on the card title
      and make up the bulk of the card's content.
    </p>
    <a href="/Calle90/prestamo/prestamo.php" class="btn btn-primary">Prestamos</a>
  </div>
</div>
        </div>
        <div class="col-lg-5">
          <div class="card">
  <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Devolucion</h4>
    <p class="card-text">
      Some quick example text to build on the card title
      and make up the bulk of the card's content.
    </p>
    <a href="/Calle90/prestamo/devolucion.php" class="btn btn-primary">Devolucion</a>
  </div>
</div>
        </div>
        <div class="col-lg-1">&nbsp;</div>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">&nbsp;</div>
      <div class="row">&nbsp;</div>
      <div class="row">&nbsp;</div>
      <div class="row">&nbsp;</div>
    </div>

  </section>
<section>

  <div class="jumbotron bg-inverse">

    <div class="row">
      <div class="col-lg-4">&nbsp;</div>
      <div class="col-lg-6">&nbsp;</div>
      <div class="col-lg-2">
        <input type="button" class="btn btn-primary" onclick="history.back()" name="volver atrás" value="Volver">
      </div>
    </div>
  </div>
</section>



  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="js/jquery.min.js"></script>

  <script src="js/bootstrap.min.js"></script>

</body>

</html>
