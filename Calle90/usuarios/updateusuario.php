<?php
include 'operaciones.php';
include 'conexion.php';

session_start();
if($_SESSION){
  ?>


  <?php
$link=conectar();
$_SESSION['IdUsuario']=$_GET['IdUsuario'];

$sql='SELECT * FROM usuario WHERE IdUsuario="'.$_GET['IdUsuario'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($row=mysqli_fetch_array($result)){

$IdUsuario=$row['IdUsuario'];
$nombre=$row['Nombre'];
$Apellido=$row['Apellido'];
$Cargo=$row['Cargo'];
$Telefono=$row['Telefono'];
$Correo=$row['Correo'];

}
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="/Calle90/css/bootstrap.css">
  <!-- Estilos -->
  <link rel="stylesheet" href="/Calle90/css/estilos.css">
  <!-- fuentes -->
  <link rel="stylesheet" href="/Calle90/css/font-awesome.min.css">

  <title>Creacion de usuarios</title>
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
  <div class="jumbotron text-center">
    <h1> Actualizar Usuario</h1>
    <p>Sr.(a) <?php  imprimirnombre()?> podra consultar usuarios que podran ingresar al sistema.</p>
  </div>
<form class="form-group" action="actualiza_usuarios.php" method="post">


 </section>
<section id="formulario">
<div class="container">
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-3">&nbsp;</div>
    <div class="col-lg-3"><strong>Nombre</strong></div>

    <div class="col-lg-4">
      <input type="text" name="nombre_usuario" class="form-control" pattern="[A-Za-z ]+" placeholder="Nombre" value="<?php echo $nombre ;?>">
    </div>
    <div class="col-lg-2">&nbsp;</div>
  </div>
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-3">&nbsp;</div>
    <div class="col-lg-3"><strong>Apellido</strong></div>

    <div class="col-lg-4">
      <input type="text" name="apellido_usuario" class="form-control" pattern="[A-Za-z ]+" placeholder="Apellido" value="<?php echo $Apellido; ?>">
    </div>
    <div class="col-lg-2">&nbsp;</div>
  </div>

  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-3">&nbsp;</div>
    <div class="col-lg-3"><strong>Cargo</strong></div>

    <div class="col-lg-4">
      <input type="text" name="cargo_usuario" class="form-control" placeholder="Cargo" value="<?php  echo $Cargo ?>">
    </div>
    <div class="col-lg-2">&nbsp;</div>
  </div>
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-3">&nbsp;</div>
    <div class="col-lg-3"><strong>Telefono</strong></div>

    <div class="col-lg-4">
      <input type="text" name="telefono_usuario" class="form-control" pattern="[0-9]+" placeholder="Telefono" value="<?php echo $Telefono ?>">
    </div>
    <div class="col-lg-2">&nbsp;</div>
  </div>
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-3">&nbsp;</div>
    <div class="col-lg-3"><strong>Correo</strong></div>

    <div class="col-lg-4">
      <input type="text" name="correo_usuario" class="form-control" placeholder="Correo" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo $Correo?>">
    </div>
    <div class="col-lg-2">&nbsp;</div>
  </div>
  <div class="row">&nbsp;</div>

  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-4">&nbsp;</div>
    <div class="col-lg-4">&nbsp;</div>
    <div class="col-lg-4">
      <input type="submit" class="btn btn-primary" value="Actualizar usuario">
    </div>
  </div>
</div>
</section>
</form>
<section>
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
