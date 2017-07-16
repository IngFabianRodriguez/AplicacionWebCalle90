<?php
session_start();
if ($_SESSION) { ?>
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
                    <a class="navbar-brand" href="/Calle90/administradores/indexadmon.php">Uniminuto</a>
                </nav>
            </div>
        </section>

        <section id="jumbotron">

            <div class="jumbotron">
                <h1 class="text-center">
<?php
include 'operaciones.php';
bienvenida();
 ?>
</h1>

                <p class="text-center">A continuacion encontrara los modulos que estan disponibles para manejar la informacion de los equipos</p>

            </div>
        </section>

        <section id="card">
            <div class="container">
                <div class="row">

                </div>

<?php
if ($_SESSION['cargo']=='Desarrollador' || $_SESSION['cargo']== 'Coordinador') {
  echo "  <div class='row'>
      <div class='col-lg-2'>&nbsp;</div>
        <div class='col-lg-4'>
            <div class='card'>
              <img class='card-img-top' src='/Calle90/images/modulos.png' alt='Card image cap' width='255' height='200'>
                <div class='card-block'>
                    <h4 class='card-title'>Modulos</h4>
                    <a href='/Calle90/modulos/indexmodulos.php' class='btn btn-primary'>Ingresar</a>
                </div>
            </div>
        </div>

  <div class='col-lg-4'>
      <div class='card'>
        <img class='card-img-top' src='/Calle90/images/usuarios.jpg' alt='Card image cap' width='255' height='200'>
          <div class='card-block'>
              <h4 class='card-title'>Control de usuarios</h4>

              <a href='/Calle90/usuarios/index_usuarios.php' class='btn btn-primary'>Ingresar</a>
          </div>
      </div>
  </div>
  <div class='col-lg-2'>&nbsp;</div>";
}elseif ($_SESSION['cargo']=='Laboratorista') {
  echo "<script type='text/javascript'>
    window.location='/Calle90/modulos/indexmodulos.php';
  </script>";
}
  ?>

          </div>
        </div>
        </section>
        <section id="salir">
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="row">&nbsp;</div>
            <div class="jumbotron bg-inverse">
                <div class="row">
                    <div class="col-lg-4">&nbsp;</div>
                    <div class="col-lg-6">&nbsp;</div>
                    <div class="col-lg-2">
                        <a href="/Calle90/salir.php" class="btn btn-primary"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesion</a>
                    </div>
                </div>
            </div>
        </section>



        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="js/jquery.min.js"></script>

        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>
    <?php
}
else {
	echo "<script type='text/javascript'>
		alert('Ud no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/Calle90/index.php';
	</script>";
} ?>
