<?php
include 'conexion.php';
$link=conectar();
session_start();
if ($_SESSION){


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
        <title>Insertar hoja de vida</title>
    </head>

    <body>
        <form id="test_upload" name="test_upload" action="ingresarhv.php" enctype="multipart/form-data" method="post">
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

                <div class="jumbotron bg-primary">
                    <h3 class="text-center ">Ingrese datos de la hoja de vida del equipo o maquinaria</h3>
                </div>
            </section>
            <section>
                <div class="container">

                    <div class="alert alert-danger text-center" role="alert">
                        <strong>Recuerda!</strong> Antes de ingresar cualquier equipo o elemento verificar la existencia de su proveedor de lo contrario agregarlo primero.
                    </div>
                </div>
            </section>
            <section id="hojadevida">

              <form method="post" action="ingresarhv.php" enctype="multipart/form-data">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-9">
                                    <h5>Para consultar la existencia de un equipo ir a el apartado de consulta o seguir el siguiente boton</h5>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/Calle90/modulos/Electronica/Hojasdevida/consultahv.php" class="btn btn-primary ">Consulta de Equipos</a>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>

                            <div class="row">&nbsp;</div>
                            <div class="row">
                              <div class="col-lg-1"><strong>Sede</strong></div>
                                <?php

                                $sql="select * from ubicacion";
                                $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                                ?>
                                <div class="col-lg-4 text-center">
                                  <select class="custom-select" name="sede" required/>


                                  <?php if($result->num_rows>0){?>

                                    <?php while ($r=$result->fetch_array()){


                                    echo "<option value=".$r["Sede"].">".$r['Sede']."</option>";}} ?>
                                  </select>
                                </div>
                              <div class="col-lg-2"><strong>Laboratorio</strong></div>
                              <?php

                              $sql="select * from ubicacion";
                              $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                              ?>
                              <div class="col-lg-2 text-center">
                                <select class="custom-select" name="laboratorio" required/>


                                <?php if($result->num_rows>0){?>

                                  <?php while ($r=$result->fetch_array()){


                                  echo "<option value=".$r["Laboratorio"].">".$r['Laboratorio']."</option>";}} ?>
                                </select>
                              </div>
                              <div class="col-lg-1"><strong>Piso</strong></div>
                              <?php

                              $sql="select * from ubicacion";
                              $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                              ?>
                              <div class="col-lg-2 text-center">
                                <select class="custom-select" name="piso" required/>


                                <?php if($result->num_rows>0){?>

                                  <?php while ($r=$result->fetch_array()){


                                  echo "<option value=".$r["Piso"].">".$r['Piso']."</option>";}} ?>
                                </select>
                              </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                              <div class="col-lg-1">&nbsp;</div>
                              <div class="col-lg-1 text"> <strong>Ciudad</strong></div>
                              <?php

                              $sql="select * from ciudad";
                              $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                              ?>
                              <div class="col-lg-2 text-center">
                                <select class="custom-select" name="ciudad" required/>


                                <?php if($result->num_rows>0){?>

                                  <?php while ($r=$result->fetch_array()){


                                  echo "<option value=".$r["nombre"].">".$r['nombre']."</option>";}} ?>
                                </select>
                              </div>
                              <div class="col-lg-1"> <strong>Pais</strong></div>
                              <?php

                              $sql="select * from pais";
                              $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                              ?>
                              <div class="col-lg-2 text-center">
                                <select class="custom-select" name="pais" required/>


                                <?php if($result->num_rows>0){?>

                                  <?php while ($r=$result->fetch_array()){


                                  echo "<option value=".$r["NombrePais"].">".$r['NombrePais']."</option>";}} ?>
                                </select>
                              </div>
                              <div class="col-lg-1"><strong>Categoria</strong></div>
                              <div class="col-lg-2">
                                  <select class="custom-select" name="categoria" required/>
                              <option value="Equipos">Equipos</option>
                              <option value="Consumibles">Consumibles</option>
                              <option value="Software">Software</option>
                            </select>
                              </div>

                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12 bg-faded">
                                    <h4 class="text-center">1. Especificaciones tecnicas</h4>
                                </div>
                            </div>
                              <div class="row">&nbsp;</div>
                            <div class="row">&nbsp;</div>
                            <div class="row ">
                              <div class="col-lg-2"><strong>N° de activo del equipo</strong></div>
                              <div class="col-lg-2">
                                  <input type="text" name="ActivoFijo" class="form-control" placeholder="Numero activo" value="<?php echo $_SESSION['idImagen']?>" disabled>
                              </div>

                                <div class="col-lg-2"><strong>Nombre del elemento</strong></div>
                                <div class="col-lg-3"><input type="text" name="nombre_elemento" class="form-control" pattern="[A-Za-z0-9 ]+{0,50}" maxlength="50" placeholder="Nombre del elemento" required/></div>
                                <div class="col-lg-1"><strong>Estado</strong></div>
                                <div class="col-lg-2"><input type="text" name="estado" class="form-control" pattern="[A-Za-z]+" placeholder="Estado" value="Nuevo" required/></div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-2"><strong>Marca/Fabricante</strong></div>
                                <div class="col-lg-2">
                                    <input type="text" name="marca" class="form-control" pattern="[A-Za-z]+{0,30}" maxlength="30" placeholder="Marca" required/>
                                </div>
                                <div class="col-lg-1"><strong>Modelo</strong></div>
                                <div class="col-lg-3">
                                    <input type="text" name="modelo" class="form-control" pattern="[A-Za-z0-9]+{0,30}" maxlength="30" placeholder="Modelo del elemento" required/>
                                </div>

                                <div class="col-lg-1"><strong>Serie</strong></div>
                                <div class="col-lg-3">
                                    <input type="text" name="serie" class="form-control" pattern="[A-Za-z0-9]+{0,30}" maxlength="30" placeholder="Serie" required/>
                                </div>

                            </div>
                            <div class="row">&nbsp;</div>

                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12 bg-faded">
                                    <h4 class="text-center">3. Descripcion general del Equipo o Maquinaria</h4></div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="descripcion_equipo" placeholder="Insertar aqui descripcion del elemento" required/> </textarea>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg-12 bg-faded">
                                    <h4 class="text-center">4. Garantia</h4>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                              <div class="col-lg-1"><strong>Tiempo</strong></div>
                              <div class="col-lg-2.25">
                                <input type="text" name="tiempo_garantia" placeholder="Tiempo en meses" pattern="[0-9]+{0,2}" maxlength="2" class="form-control" required/>
                              </div>
                              <div class="col-lg-1">&nbsp;</div>
                                <div class="col-lg-2.25 "><strong>Fecha inicio</strong></div>
                                <div class="col-lg-3">
                                    <input type="date" name="fecha_adquisicion" class="form-control text-center" required/></div>
                                <div class="col-lg-2.25 "><strong>Fecha fin</strong></div>
                                <div class="col-lg-3">
                                    <input type="date" name="garantia_fecha_fin" class="form-control text-center" required/>
                                </div>
                            </div>



                            <div class="row">&nbsp;</div>

                            <div class="row">
                              <div class="col-lg-4">&nbsp;</div>

                              <div class="col-lg-4">&nbsp;</div>

                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <div class="col-lg 4">&nbsp;</div>

                                <div class="col-lg 4">&nbsp;</div>
                                <div class="col-lg-3">
                                    <input type="submit" name="subir" value="Ingresar datos de elemento" class="btn btn-primary">
                                </div>

                              </form>
                            </div>
                        </div>
                    </section>
                </form>

            </section>
            <div class="col-lg-12">&nbsp;</div>
            </div>
            <section id="salir">

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
