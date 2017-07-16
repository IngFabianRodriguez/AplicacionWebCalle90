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
<title>Busqueda equipo</title>
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

        <div class="jumbotron bg-success text-center">
          <h2>Bienvenido <?php include 'operaciones.php'; imprimirnombre();?></h2>
          <p>A continuacion podras realizar las operaciones correspondientes a los equipos</p>
        </div>

    </section>

<section id=insertar>
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h5>Para agregar algun equipo ir a el apartado de insertar equipo o seguir el siguiente boton</h5>
      </div>
      <div class="col-lg-2">
        <a href="/Calle90/modulos/Eelectronica/Hojasdevida/ingresofoto.php" class="btn btn-primary ">Insertar Equipo</a>
        </div>
      </div>
    </div>
  </div>
</section>

    <section>
      <div class="row">&nbsp;</div>
      <div class="container">

      <form class="navbar-form navbar-left" role="search" action="BusquedaEquipo.php">

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
  <div class="row">&nbsp;</div>
  <div class="row">
    <div class="container">

<?php
include 'conexion.php';
$link=conectar();

$sql='SELECT * FROM equipo where ActivoFijo like "%'.$_GET['s'].'%" or NombreEquipo like "%'.$_GET['s'].'%" or Fabricante like "%'.$_GET['s'].'%" or Modelo like "%'.$_GET['s'].'%" or Serie like "%'.$_GET['s'].'%"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>
<?php if($result->num_rows>0){?>
<table class="table table-bordered ">
<thead class="thead-inverse">
  <th>Numero Activo Fijo</th>
  <th>Nombre </th>
  <th>Fabricante</th>
	<th>Estado</th>

		<th>Operaciones</th>
</thead>
<?php  while($r=$result->fetch_array()){?>
<tr>
  <td><?php echo $r['ActivoFijo'] ?></td>
	<td><?php echo $r["NombreEquipo"]; ?></td>
	<td><?php echo $r["Fabricante"]; ?></td>
	<td><?php echo $r["Estado"]; ?></td>
<?php $_SESSION['NombreEquipo']=$r['NombreEquipo']; ?>

	<td>
<?php if ($_SESSION['cargo']=="Desarrollador" || $_SESSION['cargo']=="Coordinador" ) {
   ?>
        <a href="consultageneral.php?ActivoFijo=<?php echo $r["ActivoFijo"];?>" class="btn btn-sm btn-primary">Más información</a><br>
        <a href="/Calle90/mantenimiento/ingresarMnto.php?ActivoFijo=<?php echo $r["ActivoFijo"];?>" class="btn btn-sm btn-success">Mantenimiento</a><br>
        <a href="/Calle90/Préstamo/indexPréstamo.php?ActivoFijo=<?php echo $r["ActivoFijo"];?>" class="btn btn-sm btn-danger">Préstamo</a><br>


<?php }else{ ?>
  <a href="consultageneral.php?ActivoFijo=<?php echo $r["ActivoFijo"];?>" class="btn btn-sm btn-primary">Más información</a><br>
  <a href="updateequipo.php?ActivoFijo=<?php echo $r["ActivoFijo"];?>" class="btn btn-sm btn-success">Actualizar</a><br>
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

</html>
<?php
}
else {
	echo "<script type='text/javascript'>
		alert('Usted no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/index.php';
	</script>";
} ?>
