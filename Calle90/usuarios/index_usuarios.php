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
<title>Usuarios</title>
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

  <div class="jumbotron bg-success">
  <h2 class="text-center">Estas en el modulo de control de usuarios
  <?php include 'operaciones.php'; imprimirnombre();?></h2>
  <p class="text-center">A continuacion escoja que desea realizar</p>
  </div>
</section>

<section>
  <div class="container">

  <div class="alert alert-danger text-center" role="alert">
  <strong>Recuerda!</strong> que cualquier usuario que sea creado va a obtener acceso a operaciones como informacion de elementos y demas de la universidad.
</div>
</div>
</section>

<section id="acciones">
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
  <h3 class="card-header bg-success">Usuarios</h3>
  <div class="card-block">
    <h4 class="card-title">Crear Usuario</h4>
    <p class="card-text">En este apartado podras crear los usuarios que suministran insumos a la universidad</p>
    <a href="/Calle90/usuarios/crea_usuarios.php" class="btn btn-success">Ingresar</a>

  </div>
  <div class="card-block">
    <h4 class="card-title">Consultar Usuarios</h4>
    <p class="card-text">En este apartado podra consultar los usuarios ademas de realizar otras funciones de gestion de información</p>
  <a href="/Calle90/usuarios/consulta_usuarios.php" class="btn btn-success ">Ingresar</a>
  </div>
  </div>
</div>

</div>
    </div>


</section>
<section id="salir">
  <div class="row">&nbsp;</div>
  <div class="jumbotron bg-inverse">
    <div class="row">
      <div class="col-lg-4">&nbsp;</div>
      <div class="col-lg-6">&nbsp;</div>
      <div class="col-lg-2">
        <a href="/Calle90/salir.php" class="btn btn-success"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesion</a>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<?php
}
else {
	echo "<script type='text/javascript'>
		alert('Ud no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/index.php';
	</script>";
} ?>
