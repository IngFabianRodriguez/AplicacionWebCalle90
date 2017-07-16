<?php
session_start();
if ($_SESSION) {
 ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/Calle90/css/bootstrap.css">
    <!-- Estilos -->
    <link rel="stylesheet" href="/Calle90/css/estilos.css">
    <!-- fuentes -->
    <link rel="stylesheet" href="/Calle90/css/font-awesome.min.css">

<title>Consulta Equipo</title>
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
          <h2><?php include 'operaciones.php';imprimirnombre(); ?></i></h2>
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
        <a href="/Calle90/modulos/Electronica/Hojasdevida/ingresofoto.php" class="btn btn-primary ">Insertar Equipo</a>
        </div>
      </div>
      <div class="row">&nbsp;</div>
      <div class="row">
        <div class="col-lg-10">
          <h5>Para exportar esta hoja de vida de equipo a PDF podras generarlo con solo seguir el siguiente boton</h5>
        </div>
        <div class="col-lg-2">
          <a href="/Calle90/modulos/Electronica/Hojasdevida/generaPDF.php" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar PDF</a>
          </div>
        </div>
    </div>
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
$_SESSION['ActivoFijo']=$_GET['ActivoFijo'];
$sql='SELECT * FROM equipo WHERE ActivoFijo= "'.$_GET['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
  <div class="card-block">
    <h4 class="card-title">Información Basica</h4>
<?php if($result->num_rows>0){?>
<?php  while($r=$result->fetch_array()){?>
    <table class="table table-bordered ">
    <thead class="thead-inverse">
    	<th>Numero Activo Fijo</th>
    	<th>Nombre</th>
      <th>Estado</th>

    </thead>
    <tr>
    	<td><?php echo $r["ActivoFijo"]; ?></td>
    	<td><?php echo $r["NombreEquipo"]; ?></td>
      <td><?php echo $r["Estado"];?></td>
    </tr>
    <table class="table table-bordered ">
      <thead class="thead-inverse">
        <th class="text-center">Descripción  </th>
      </thead>
      <tr>
        <td><?php echo $r["Descripcion"]; ?></td>
      </tr>

    </table>
<?php $ActivoFijo=$r['ActivoFijo']; ?>
<?php $_SESSION['NombreEquipo']=$r['NombreEquipo']; ?>
<?php } ?>
<?php} else {
      echo "NO SE ENCONTRARON RESULTADOS";
      ?>
<?php } ?>


    </table>
  </div>
</div>
</div>
</div>
<div class="row">
  <div class="container">

<?php
$sql='SELECT * FROM equipo WHERE ActivoFijo= "'.$_GET['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Información Especifica</h4>
<?php if($result->num_rows>0){?>
  <table class="table table-bordered ">
  <thead class="thead-inverse">
    <th>Fabricante</th>
    <th>Modelo</th>
    <th>Serie</th>
    <th>Fecha Adquisicion</th>

  </thead>
<?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["Fabricante"]; ?></td>
    <td><?php echo $r["Modelo"]; ?></td>
    <td><?php echo $r["Serie"]; ?></td>
    <td><?php echo $r["FechaAdquisicion"];?></td>
<?php $ActivoFijo=$r['ActivoFijo'];
    $FechaAd=$r['FechaAdquisicion'];?>
<?php } ?>
<?php} else {
    echo "NO SE ENCONTRARON RESULTADOS";
    ?>
<?php } ?>
</tr>
</table>
</div>
</div>
</div>
</div>
<div class="row">
  <div class="container">

<?php
$sql='SELECT * FROM garantia WHERE Equipo_ActivoFijo= "'.$_GET['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Información de Garantia</h4>
<?php if($result->num_rows>0){?>
  <table class="table table-bordered ">
  <thead class="thead-inverse">
    <th>Tiempo Garantia</th>
    <th>Fecha Inicio Garantia</th>
    <th>Fecha Fin Garantia</th>

  </thead>
<?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["TiempoGarantia"]; ?></td>
    <td><?php echo $FechaAd; ?></td>
    <td><?php echo $r["FechaFin"]; ?></td>
<?php } ?>
<?php} else {
    echo "NO SE ENCONTRARON RESULTADOS";
    ?>
<?php } ?>

  </tr>

  </table>
</div>
</div>
</div>
</div>



<div class="row">
  <div class="container">
<?php

$sql=' SELECT idPais,NombrePais,idCiudad,nombre,idSede,Sede,Laboratorio,Piso,imagen_idImagen FROM equipo
JOIN pais ON equipo.pais_idPais=pais.idPais
JOIN ciudad ON equipo.ciudad_idCiudad=ciudad.idCiudad
JOIN ubicacion ON equipo.ubicacion_idSede=ubicacion.idSede
JOIN imagen ON equipo.imagen_idImagen=imagen.idImagen
WHERE equipo.ActivoFijo="'.$_GET['ActivoFijo'].'"';

$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
<h4 class="card-title">Información Ubicacion</h4>
<?php if($result->num_rows>0){?>
<table class="table table-bordered">
<thead class="thead-inverse">
<th>Codigo Pais</th>
<th>Pais</th>
<th>Codigo Ciudad</th>
<th>Ciudad</th>
</thead>
<?php while($r=$result->fetch_array()){?>
<tr>
<td><?php echo $r["idPais"]; ?></td>
<td><?php echo $r["NombrePais"]; ?></td>
<td><?php echo $r["idCiudad"]; ?></td>
<td><?php echo $r["nombre"];?></td>
<?php $idImagen=$r['imagen_idImagen']; ?>
<?php } ?>
<?php} else { echo "NO SE ENCONTRARON RESULTADOS";?>
<?php } ?>
</tr>
</table>
<?php
  $sql=' SELECT idPais,NombrePais,idCiudad,nombre,idSede,Sede,Laboratorio,Piso FROM equipo
  JOIN pais ON equipo.pais_idPais=pais.idPais
  JOIN ciudad ON equipo.ciudad_idCiudad=ciudad.idCiudad
  JOIN ubicacion ON equipo.ubicacion_idSede=ubicacion.idSede
  WHERE equipo.ActivoFijo="'.$_GET['ActivoFijo'].'"';

  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  ?>
<?php if($result->num_rows>0){?>
  <table class="table table-bordered">
  <thead class="thead-inverse">
    <th>Codigo Sede</th>
    <th>Nombre Sede</th>
    <th>Laboratorio</th>
    <th>Piso</th>
  </thead>
<?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["idSede"];?></td>
    <td><?php echo $r["Sede"];?></td>
    <td><?php echo $r["Laboratorio"];?></td>
    <td><?php echo $r["Piso"];?></td>
<?php } ?>
<?php} else {
    echo "NO SE ENCONTRARON RESULTADOS";
    ?>
<?php }
?>
  </tr>
</table>
<?php mysqli_close($link); ?>
</div>
</div>
</div>
</div>

<div class="row">
  <div class="container">
    <div class="card">
      <div class="card-block">
        <h4>Historico prestamos</h4>

          <a href="consultaprestamos.php?ActivoFijo=<?php echo $ActivoFijo;?>" class="btn  btn-primary bg-inverse">Para visualizar el historico de los prestamos realizados de este equipos seguir este boton</a><br>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="container">
    <div class="card">
      <div class="card-block">
        <h4>Historico Mantenimientos</h4>

          <a href="consultaMantenimiento.php?ActivoFijo=<?php echo $ActivoFijo;?>" class="btn  btn-primary bg-inverse">Para visualizar el historico de los mantenimientos realizados de este equipos seguir este boton</a><br>

      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="container">
<?php
$link=conectar();
$sql = 'select*from imagen where idImagen="'.$idImagen.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));
if($r=$result->fetch_array()){
    if($r['nombre_archivo']==""){?>
<p>NO tiene archivos</p>
    <?php }else{ ?>

  <div class="card">
<div class="card-block">
  <h4 class="card-title">Descripción visual</h4>


  <table class="table table-bordered ">
  <thead class="thead-inverse">

  <th class="text-center">Imagen</th>
  </thead>

  <tr>
    <td>
      <img src="uploads/<?php echo $r['nombre_archivo']; ?>" width="1050" height="700">
    </td>
  </tr>

<?php } ?>
<?php} else {
      echo "NO SE ENCONTRARON RESULTADOS";
      ?>
<?php } ?>
  </table>
</div>
</div>
</div>
</div>

</section>
<section>

</section>
<section>
<div class="container">
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
<div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-10">&nbsp;</div>
    <div class="col-lg-2">
        <a href="updateequipo.php?ActivoFijo=<?php echo $ActivoFijo;?>" class="btn  btn-success">Actualizar</a><br>
    </div>

    </div>
</div>

    </div>
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
		alert('Usted no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/index.php';
	</script>";
} ?>
