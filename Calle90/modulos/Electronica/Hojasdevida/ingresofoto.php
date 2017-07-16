<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'conexion.php';
session_start();
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "uploads/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $idImagen=$_POST['ActivoFijo'];
            $_SESSION['idImagen']=$idImagen;
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $link=conectar();
            $sql = "INSERT INTO imagen(idImagen,titulo,descripcion,tamanio,tipo,nombre_archivo) VALUES('$idImagen','$titulo','$descri','$tamanio','$tipo','$nombre')";
            $result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));
            if($result){

              echo "<script type='text/javascript'>
                alert('Imagen ingresado con exito al sistema ahora ingrese la informacion de este elemento');
                window.location='/Calle90/modulos/Electronica/Hojasdevida/insertarhv.php';
              </script>";

            }
        } else {
          echo "<script type='text/javascript'>
            alert('Imagen no ingresada al sistema ahora ingrese de nuevo la imagen');
            window.location='/Calle90/modulos/Electronica/Hojasdevida/ingresofoto.php';
          </script>";

        }
    }
}
?>

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
                <h3 class="text-center ">Ingrese Imagen del equipo o maquinaria a ingresar.</h3>
            </div>
        </section>

            <form method="post" action="" enctype="multipart/form-data">
                <div class="container">
                  <div class="row">&nbsp;</div>
                  <div class="row">&nbsp;</div>

                  <div class="row">
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-3"><strong>Número Activo fijo del equipo</strong></div>
                    <div class="col-lg-5">
                      <input type="text" name="ActivoFijo" class="form-control" pattern="[A-Za-z0-9 ][-]+{0,12}"  maxlength="12" placeholder="Activo fijo" required/>
                    </div>
                    <div class="col-lg-2">&nbsp;</div>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-3"><strong>Titulo imagen</strong></div>
                    <div class="col-lg-5">
                      <input type="text" name="titulo" class="form-control" pattern="[A-Za-z0-9 ]+" maxlength="20" placeholder="Titulo" required/>
                    </div>
                    <div class="col-lg-2">&nbsp;</div>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-3"><strong>Descripción imagen</strong></div>
                    <div class="col-lg-5">
                      <textarea name="descripcion" class="form-control" placeholder="Descripcion imagen" pattern="[A-Za-z0-9 ]+" required/></textarea>
                    </div>
                    <div class="col-lg-2">&nbsp;</div>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-lg-2">&nbsp;</div>
                    <div class="col-lg-3">&nbsp;</div>
                    <div class="col-lg-5">
                      <input type="file" name="archivo" >
                    </div>
                    <div class="col-lg-2">&nbsp;</div>
                  </div>
                  <div class="row">&nbsp;</div>

                  <div class="row">
                    <div class="col-lg-8">&nbsp;</div>
                    <div class="col-lg-4">
                      <input type="submit" name="subir" value="Ingresar Imagen" class="btn btn-primary">
                    </div>
                  </div>
                </div>
            </form>

    </body>
</html>
