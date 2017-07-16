<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/Calle90/css/bootstrap.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="/Calle90/css/estilos.css">
    <!-- fuentes -->
    <link rel="stylesheet" href="/Calle90/css/font-awesome.min.css">

  </head>
  <body>

    <section id="navbar">

    <div class="row-fluid">
        <nav class="text-center navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="index.php">Uniminuto</a>


        </nav>
      </div>
    </section>


<section id="jumbotron">
  <div class="jumbotron">

  <form class="" action="validacion.php" method="post">


  <div class="row">

    <div class="col-lg-8">
      <br><br>
      <h1 class="text-center display-4"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Software de gestión de la información </h1>

      </div>

  <div class="col-lg-4">
    <br><br>
    <div class="col-lg-10">
      <label for="usuario" ><strong><i class="fa fa-envelope-open" aria-hidden="true"></i> Correo:</strong></label>
      <input class="form-control" <input type="email" name="usuario" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" placeholder="Correo" required/>
    </div>
    <div class="col-lg-10">
      <label for="contraseña" ><strong><i class="fa fa-key" aria-hidden="true"></i> Contraseña:</strong></label>
      <input class="form-control" type="password" name="contraseña" placeholder="Contraseña" required/>
    </div>
    <div class="col-lg-12">
    &nbsp;
    </div>
    <div class="col-lg-2">
      <button type="submit" name="Ingresar" class="btn btn-primary bg-inverse"><i class="fa fa-sign-in" aria-hidden="true"></i> Ingresar</button>

    </div>
  </div>
  </div>
    </form>
  </div>
  <div class="jumbotron bg-inverse">
    <div class="row">
      <div class="col-lg-4">&nbsp;</div>
      <div class="col-lg-6">&nbsp;</div>
      <div class="col-lg-2">&nbsp;</div>
    </div>
  </div>
</section>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js/jquery.min.js"></script>

    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
