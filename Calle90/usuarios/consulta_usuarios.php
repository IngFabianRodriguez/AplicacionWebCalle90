<?php
session_start();
if ($_SESSION) {
 ?>
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
<title>Consulta Proveedor</title>
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
  <?php
      function imprimirnombre(){
      echo "<script type='text/javascript'>
              document.write('".$_SESSION['nombre']." ".$_SESSION['apellido']. ".');
            </script>";
      }

?>
        <div class="jumbotron bg-success text-center">
          <h2>Bienvenido <?php imprimirnombre();?></h2>
          <p>A continuacion podras realizar las operaciones correspondientes a los usuarios</p>
        </div>

    </section>

<section id=insertar>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 text-center">
        <h5>Para agregar algun usuario ir a el apartado de crear usuario o seguir el siguiente boton</h5>
      </div>
      <div class="col-lg-2">
        <a href="/Calle90/usuarios/crea_usuarios.php" class="btn btn-primary ">Crear Usuario</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="row">&nbsp;</div>
  <div class="container">

  <form class="navbar-form navbar-left" role="search" action="busca_usuarios.php">

      <div class="row">

      <div class="col-lg-10">
      <input type="text" name="s" class="form-control" placeholder="Buscar">
      </div>
      <div class="col-lg-2">
        <input type="submit" value="Busqueda especial" class="btn btn-primary">
      </div>
    </div>
    </div>


    </div>
  </form>
</div>
</section>

<section>

  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="container">

<?php
include 'conexion.php';
$link=conectar();

$sql='SELECT * FROM usuario ORDER BY IdUsuario DESC';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>
<?php if($result->num_rows>0){?>
<table class="table table-bordered ">
<thead class="thead-inverse">
	<th>Id Usuario</th>
	<th>Nombre</th>
	<th>Apellido</th>
	<th>Cargo</th>
	<th>Telefono</th>
	<th>Correo</th>

		<th>Operaciones</th>
</thead>
<?php  while($r=$result->fetch_array()){?>
<tr>
	<td><?php echo $r["IdUsuario"]; ?></td>
	<td><?php echo $r["Nombre"]; ?></td>
	<td><?php echo $r["Apellido"]; ?></td>
	<td><?php echo $r["Cargo"]; ?></td>
	<td><?php echo $r["Telefono"]; ?></td>
	<td><?php echo $r["Correo"]; ?></td>

	<td>
<?php if ($_SESSION['cargo']=="Desarrollador" || $_SESSION['cargo']=="Coordinador" ) {
   ?>
        <a href="updateusuario.php?IdUsuario=<?php echo $r["IdUsuario"];?>" class="btn btn-sm btn-success">Actualizar</a><br>
    		<a href="eliminarusuario.php?IdUsuario=<?php echo $r["IdUsuario"];?>" class="btn btn-sm btn-danger">Eliminar</a><br>
<?php }else{ ?>
  <a href="updateusuario.php?IdUsuario=<?php echo $r["IdUsuario"];?>" class="btn btn-sm btn-success">Actualizar</a><br>
  <?php } ?>
      </div>
    </div>

    <?php } ?>
    <?php} else {
    echo "NO SE ENCONTRARON RESULTADOS";
    ?>
    <?php } ?>
	</td>
</tr>
</table>

</div>
</div>
</section>



<section>
  <div class="row">&nbsp;</div>
  <div class="row">&nbsp;</div>
  <div class="row">&nbsp;</div>

</section>
</body>
<footer>
  <div class="jumbotron bg-inverse">
  </div>
</footer>
</html>
<?php
}
else {
	echo "<script type='text/javascript'>
		alert('Ud no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/index.php';
	</script>";
} ?>
