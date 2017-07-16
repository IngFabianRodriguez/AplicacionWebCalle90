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

        <div class="jumbotron bg-success text-center">
          <h2>Bienvenido <?php include 'operaciones.php';imprimirnombre(); ?></i></h2>
          <p>A continuacion podras realizar las operaciones correspondientes a los proveedores</p>
        </div>

    </section>

<section id=insertar>
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h5>Para agregar algun proveedor ir a el apartado de insertar proveedor o seguir el siguiente boton</h5>
      </div>
      <div class="col-lg-2">
        <a href="/Calle90/Proveedores/insertarprov.php" class="btn btn-primary ">Insertar Proveedor</a>
        </div>
      </div>
    </div>
  </div>
</section>
<section>

  <div class="container">
<div class="row">&nbsp;</div>
  <div class="row">
    <div class="col-lg-10">
      <h5>Para exportar esta hoja de vida de equipo a PDF podras generarlo con solo seguir el siguiente boton</h5>
    </div>
    <div class="col-lg-2">
      <a href="/Calle90/Proveedores/PDFprov.php" class="btn btn-danger "><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Generar PDF</a>
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
$_SESSION['NIT']=$_GET['NIT'];

$sql='SELECT * FROM proveedor WHERE NIT= "'.$_GET['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
?>

<div class="card">
  <div class="card-block">
    <h4 class="card-title">Informacion Basica</h4>

    <?php if($result->num_rows>0){?>
    <table class="table table-bordered ">
    <thead class="thead-inverse">
    	<th>Nombre Proveedor</th>
    	<th>Telefono</th>
    	<th>Correo</th>
      <th>Observaciones</th>

    </thead>
    <?php  while($r=$result->fetch_array()){?>
    <tr>
    	<td><?php echo $r["RazonSocial"]; ?></td>
    	<td><?php echo $r["Telefono"]; ?></td>
    	<td><?php echo $r["Correo"]; ?></td>
      <td><?php echo $r["Observaciones"];?></td>
      <?php $NIT=$r['NIT']; ?>
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

$sql='SELECT * FROM contacto WHERE proveedor_NIT= "'.$_GET['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Informacion de Contacto</h4>

  <?php if($result->num_rows>0){?>
  <table class="table table-bordered ">
  <thead class="thead-inverse">
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Identificacion</th>
    <th>Tipo Identificacion</th>
    <th>Celular</th>
    <th>Telefono</th>
    <th>Correo</th>
    <th>Tiempo Residencia</th>


  </thead>
  <?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["Nombre"]; ?></td>
    <td><?php echo $r["Apellido"]; ?></td>
    <td><?php echo $r["Identificacion"]; ?></td>
    <td><?php echo $r["TipoIdentificacion"];?></td>
    <td><?php echo $r["Celular"];?></td>
    <td><?php echo $r["TelefonoFijo"];?></td>
    <td><?php echo $r["Correo"];?></td>
    <td><?php echo $r["Residencia"];?></td>
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

$sql='SELECT * FROM infolegal WHERE proveedor_NIT= "'.$_GET['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Informacion Legal</h4>

  <?php if($result->num_rows>0){?>
  <table class="table table-bordered ">
  <thead class="thead-inverse">
    <th>RUT</th>
    <th>Nombre Representante legal</th>
    <th>Identificacion</th>
    <th>Objeto Social</th>
    <th>Descripcion bien o servicio</th>
    <th>Regimen</th>


  </thead>
  <?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["RUT"]; ?></td>
    <td><?php echo $r["NombreRL"]; ?></td>
    <td><?php echo $r["IdentificacionRL"]; ?></td>
    <td><?php echo $r["ObjetoSocial"];?></td>
    <td><?php echo $r["DescripcionBienServicio"];?></td>
    <td><?php echo $r["Regimen"];?></td>

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

$sql=' SELECT idPais,NombrePais,idCiudad,nombre,IdPoblacion,NombrePoblacion,CodigoDepartamento,NombreDepartamento FROM proveedor
JOIN pais ON proveedor.pais_idPais=pais.idPais
JOIN ciudad ON proveedor.ciudad_idCiudad=ciudad.idCiudad
JOIN poblacion ON proveedor.poblacion_idPoblacion=poblacion.idPoblacion
JOIN departamento ON proveedor.departamento_CodigoDepartamento=departamento.CodigoDepartamento
WHERE proveedor.NIT="'.$_GET['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Informacion Ubicacion</h4>

  <?php if($result->num_rows>0){?>
  <table class="table table-bordered text-center">
  <thead class="thead-inverse">
    <th class="text-center">Codigo Pais</th>
    <th class="text-center">Pais</th>
    <th class="text-center">Codigo Ciudad</th>
    <th class="text-center">Ciudad</th>
    <th class="text-center">Codigo Departamento</th>
    <th class="text-center">Departamento</th>
    <th class="text-center">Codigo Poblacion</th>
    <th class="text-center">Poblacion</th>


  </thead>
  <?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["idPais"]; ?></td>
    <td><?php echo $r["NombrePais"]; ?></td>
    <td><?php echo $r["idCiudad"]; ?></td>
    <td><?php echo $r["nombre"];?></td>
    <td><?php echo $r["CodigoDepartamento"];?></td>
    <td><?php echo $r["NombreDepartamento"];?></td>
    <td><?php echo $r["IdPoblacion"];?></td>
    <td><?php echo $r["NombrePoblacion"];?></td>
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

$sql='SELECT * FROM tributaria WHERE proveedor_NIT= "'.$_GET['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Informacion Tributarial</h4>

  <?php if($result->num_rows>0){?>
  <table class="table table-bordered ">
  <thead class="thead-inverse">
    <th>Numero Resolucion</th>
    <th>Nombre</th>
    <th>Respuesta</th>
    <th>Fecha</th>

  </thead>
  <?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["NumeroResolucion"]; ?></td>
    <td><?php echo $r["nombre"]; ?></td>
    <td><?php echo $r["Respuesta"]; ?></td>
    <td><?php echo $r["Fecha"];?></td>
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

$sql='SELECT NumeroCuenta,TipoCuenta,TitularCuenta,CodigoBanco,EntidadBancaria FROM bancaria
JOIN banco On bancaria.banco_CodigoBanco=banco.CodigoBanco WHERE bancaria.proveedor_NIT="'.$_GET['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

?>

<div class="card">
<div class="card-block">
  <h4 class="card-title">Informacion Bancaria</h4>

  <?php if($result->num_rows>0){?>
  <table class="table table-bordered ">
  <thead class="thead-inverse">
    <th>Numero Cuenta</th>
    <th>Tipo Cuenta</th>
    <th>Titular</th>
    <th>Codigo Banco</th>
    <th>Entidad Bancaria</th>

  </thead>
  <?php  while($r=$result->fetch_array()){?>
  <tr>
    <td><?php echo $r["NumeroCuenta"]; ?></td>
    <td><?php echo $r["TipoCuenta"]; ?></td>
    <td><?php echo $r["TitularCuenta"]; ?></td>
    <td><?php echo $r["CodigoBanco"];?></td>
    <td><?php echo $r["EntidadBancaria"];?></td>
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
    <div class="col-lg-8">&nbsp;</div>
    <div class="col-lg-2">
        <a href="updateproveedor.php?NIT=<?php echo $NIT;?>" class="btn  btn-success">Actualizar</a><br>
    </div>
        <div class="col-lg-2">
        <a href="eliminarproveedor.php?NIT=<?php echo $NIT;?>" class="btn  btn-danger">Eliminar</a><br>

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

    <div class="row">
      <div class="col-lg-8">&nbsp;</div>
      <div class="col-lg-2">
        <input type="button" class="btn btn-primary" onclick="history.back()" name="volver atrás" value="Volver">
      </div>
      <div class="col-lg-2">
        <a href="/Calle90/salir.php" class="btn btn-primary"><i class="fa fa-sign-out" aria-hidden="true"></i>Cerrar Sesion</a>
      </div>
    </div>

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
