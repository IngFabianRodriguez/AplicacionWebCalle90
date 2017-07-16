<?php
session_start();
include 'conexion.php';

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
    <title>Actualizar Proveedor</title>
</head>

<body>

  <?php

  # Conectamos con MySQL
  $link=conectar();
  //Variables
  $NIT=$_GET['NIT'];
  $_SESSION['NIT']=$NIT;
  $sql='SELECT * FROM proveedor WHERE NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){
  $fecha_creacion=$r['FechaCreacion'];
  $razonsocial = $r['RazonSocial'];
  $NIT = $r['NIT'];
  $telefono_proveedor =$r['Telefono'];
  $correo_proveedor = $r['Correo'];
  $observaciones = $r['Observaciones'];
  $codigoPais=$r['Pais_idPais'];
  $codigoCiudad=$r['Ciudad_idCiudad'];
  $CodigoDepartamento=$r['Departamento_CodigoDepartamento'];
  $codigoPoblacion=$r['Poblacion_idPoblacion'];

   }
  }

  $sql='SELECT * FROM pais WHERE idPais="'.$codigoPais.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){
      $pais_proveedor = $r['NombrePais'];
  }
}
$sql='SELECT * FROM ciudad WHERE idCiudad="'.$codigoCiudad.'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
    $nombreciudad = $r['nombre'];
}
}

$sql='SELECT * FROM poblacion WHERE idPoblacion="'.$codigoPoblacion.'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
    $NombrePoblacion = $r['NombrePoblacion'];
}
}

$sql='SELECT * FROM departamento WHERE CodigoDepartamento="'.$CodigoDepartamento.'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
    $NombreDepartamento = $r['NombreDepartamento'];
}
}

  $sql='SELECT * FROM infolegal WHERE proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){
  $RUT=$r['RUT'];
  $objeto_social = $r['ObjetoSocial'];
  $descripcion_bien_servicio = $r['DescripcionBienServicio'];
  $nombre_RL = $r['NombreRL'];
  $identificacionRL = $r['IdentificacionRL'];
  $tipoRegimen = $r['Regimen'];
  }
}

  $sql='SELECT * FROM bancaria WHERE proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

    $numero_cuenta_bancaria = $r['NumeroCuenta'];
    $tipo_cuenta = $r['TipoCuenta'];
    $TitularCuenta=$r['TitularCuenta'];
    $codigo_SWIFT = $r['codigoSWIFT'];
    $codigo_IBAN = $r['codigoIBAN'];
    $CodigoBanco=$r['Banco_CodigoBanco'];
  }
}
  $sql='SELECT * FROM banco WHERE CodigoBanco="'.$CodigoBanco.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){
      $entidad_financiera = $r['EntidadBancaria'];
  }
}
  $sql='SELECT * FROM tributaria WHERE nombre="Su empresa esta catalogada como Gran contribuyente" AND proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

  $grancon_resp = $r['Respuesta'];
  $fecha_granco = $r['Fecha'];
  $resolucion_granco = $r['NumeroResolucion'];

  }
}

  $sql='SELECT * FROM tributaria WHERE nombre="Su empresa esta catalogada como Autorretenedor" AND proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

    $respuesta_au = $r['Respuesta'];
    $fecha_au = $r['Fecha'];
    $resolucion_au = $r['NumeroResolucion'];

  }
}
  $sql='SELECT * FROM tributaria WHERE nombre="Su empresa esta catalogada como Entidad sin animo de lucro" AND proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

    $respuesta_animo = $r['Respuesta'];
    $fecha_animo = $r['Fecha'];
    $resolucion_animo = $r['NumeroResolucion'];

  }
}
  $sql='SELECT * FROM tributaria WHERE nombre="Su empresa es Agente de Retencion IVA" AND proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

    $respuesta_agIVA = $r['Respuesta'];
    $fecha_agIVA = $r['Fecha'];
    $resolucion_agIVA = $r['NumeroResolucion'];

  }
}

  $sql='SELECT * FROM tributaria WHERE nombre="Su empresa es Agente de Retencion ICA" AND proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

    $respuestaICA = $r['Respuesta'];
    $fechaICA = $r['Fecha'];
    $resolucionICA = $r['NumeroResolucion'];

  }
}

  $sql='SELECT * FROM tributaria WHERE nombre="Sus operaciones estan grabadas con IVA" AND proveedor_NIT="'.$NIT.'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
  while($r=$result->fetch_array()){

    $respuesta_opIVA = $r['Respuesta'];
    $fecha_opIVA = $r['Fecha'];
    $resolucion_opIVA = $r['NumeroResolucion'];

  }
}
$sql='SELECT * FROM contacto WHERE proveedor_NIT="'.$NIT.'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){

  $nombre_contacto = $r['Nombre'];
  $apellido_contacto = $r['Apellido'];
  $tipo_identificacion_contacto = $r['TipoIdentificacion'];
  $identificacion_contacto = $r['Identificacion'];
  $correo_contacto = $r['Correo'];
  $tiempo_residencia = $r['Residencia'];
  $telefono_contacto = $r['TelefonoFijo'];
  $celular_contacto = $r['Celular'];

}
}


   ?>
    <section id="navbar">

        <div class="row-fluid">
            <nav class="text-center navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
                <a class="navbar-brand" href="/Calle90/admon/indexadmon.php">Uniminuto</a>
            </nav>
        </div>
    </section>
    <section id="jumbotron">
        <div class="jumbotron bg-success text-center">

            <h2>Actualizacion de proveedores</h2>
            <p>A continuacion rellenar con los datos solicitados para la Actualizacion de proveedor</p>
        </div>
    </section>
    <section id=insertar>
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <h5>Para consultar la existencia de un proveedor ir a el apartado de consulta o seguir el siguiente boton</h5>
                </div>
                <div class="col-lg-3">
                    <a href="/Calle90/Proveedores/consultaprov.php" class="btn btn-primary ">Consulta de Proveedores</a>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="nuevoprov">
        <form class="form-group" action="actualizaprov.php" method="post">
            <div class="container">
                <div class="row">
                    &nbsp;
                </div>

                <div class="row">
                    <div class="col-lg-6">&nbsp;</div>
                    <div class="col-lg-3">
                        <label for=""><strong>Fecha de Actualizacion</strong></label>
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" name="fecha_actualizacion" placeholder="" required/>
                    </div>
                </div>
                <div class="row">&nbsp;</div>
                  <section>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                        <div class="col-lg-12 text-center bg-faded">
                            <h4>1. DATOS BASICOS DEL PROVEEDOR</h4>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                    <div class="col-lg-3"><strong>Razon Social</strong></div>
                    <div class="col-lg-9">
                      <input type="text" name="razonsocial" placeholder="" class="form-control" pattern="[a-zA-Z ]+" value="<?php echo $razonsocial?>" required/>
                    </div>
                  </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">

                      <div class="col-lg-1"><strong>NIT</strong></div>
                      <div class="col-lg-5">
                        <input type="text" name="NIT" placeholder="" class="form-control"  pattern="[0-9]+{0,12}" maxlength="12" value="<?php echo $NIT ?>"  required/>
                      </div>
                      <div class="col-lg-1"><strong>RUT</strong></div>
                      <div class="col-lg-5">
                        <input type="text" name="RUT" placeholder="" class="form-control" pattern="[0-9]+{0,12}" maxlength="12" value="<?php echo $RUT ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Telefono</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="telefono_proveedor" placeholder="" class="form-control" pattern="[0-9]+{0,7}" maxlength="7" value="<?php echo $telefono_proveedor ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Correo</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="correo_proveedor" placeholder="" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo $correo_proveedor ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Direccion Proveedor</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="direccion_proveedor" placeholder="" pattern="[a-zA-Z0-9 ]+{0,40}" maxlength="40" class="form-control" value="<?php echo $direccion_proveedor ?>" required/>
                      </div>
                      <div class="col-lg-1 text"> <strong>Ciudad</strong></div>
                      <?php

                      $sql="select * from ciudad";
                      $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                      ?>
                      <div class="col-lg-2 text-center">
                        <select class="custom-select" name="ciudad_proveedor" value="<?php echo $nombreciudad ?>">

                        <option Selected><?php echo $nombreciudad;?></option>
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
                        <select class="custom-select" name="pais_proveedor">

                        <option Selected><?php echo $pais_proveedor ?></option>
                        <?php if($result->num_rows>0){?>

                          <?php while ($r=$result->fetch_array()){


                          echo "<option value=".$r["NombrePais"].">".$r['NombrePais']."</option>";}} ?>
                        </select>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Objeto Social</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="objeto_social" placeholder="" class="form-control" pattern="[A-Za-z ]+" maxlength="40" value="<?php echo $objeto_social ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Descripcion bien o servicio</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="descripcion_bien_servicio" placeholder="" pattern="[A-Za-z ]+" maxlength="40" class="form-control" value="<?php echo $descripcion_bien_servicio ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Nombre Representante legal</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="nombre_RL" placeholder="" class="form-control" pattern="[A-Za-z ]+{0,30}" maxlength="30" value="<?php echo $nombre_RL ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Identificacion Representante legal</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="identificacionRL" placeholder="" class="form-control" pattern="[0-9]+{0,15}" maxlength="15" value="<?php echo $identificacionRL ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Nombre contacto</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="nombre_contacto" placeholder="" class="form-control" pattern="[A-Za-z ]+{0,30}" maxlength="30" value="<?php echo $nombre_contacto ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Apellido contacto</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="apellido_contacto" placeholder="" class="form-control" pattern="[A-Za-z ]+{0,30}" maxlength="30" value="<?php echo $apellido_contacto ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Tipo identificacion</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="tipo_identificacion_contacto" placeholder="" class="form-control" value="<?php echo $tipo_identificacion_contacto ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Identificacion Contacto</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="identificacion_contacto" placeholder="" pattern="[0-9]+{0,15}" maxlength="15" class="form-control" value="<?php echo $identificacion_contacto ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Correo electronico</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="correo_contacto" placeholder="" class="form-control" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" value="<?php echo $correo_contacto ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Tiempo residencia</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="tiempo_residencia" placeholder="" class="form-control" pattern="[A-Za-z ]+{0,30}" maxlength="30" value="<?php echo $tiempo_residencia ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Telefono Fijo</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="telefono_contacto" placeholder="" class="form-control" pattern="[0-9]+{0,7}" maxlength="7" value="<?php echo $telefono_contacto ?>" required/>
                      </div>
                      <div class="col-lg-3"><strong>Telefono Celular</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="celular_contacto" placeholder="" class="form-control" pattern="[0-9]+{0,10}" maxlength="10" value="<?php echo $celular_contacto ?>" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">


                          <div class="col-lg-3 text"> <strong>Nombre Poblacion</strong></div>
                          <?php

                          $sql="select * from poblacion";
                          $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                          ?>
                          <div class="col-lg-3 text-center">
                            <select class="custom-select" name="nombrePoblacion">

                            <option Selected><?php echo $NombrePoblacion ?></option>
                            <?php if($result->num_rows>0){?>

                              <?php while ($r=$result->fetch_array()){


                              echo "<option value=".$r["NombrePoblacion"].">".$r['NombrePoblacion']."</option>";}} ?>
                            </select>
                          </div>


                                <div class="col-lg-3"> <strong>Nombre Departamento</strong></div>
                                <?php

                                $sql="select * from departamento";
                                $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                                ?>
                                <div class="col-lg-3 text-center">
                                  <select class="custom-select" name="nombre_departamento">

                                  <option Selected><?php echo $NombreDepartamento ?></option>
                                  <?php if($result->num_rows>0){?>

                                    <?php while ($r=$result->fetch_array()){


                                    echo "<option value=".$r["NombreDepartamento"].">".$r['NombreDepartamento']."</option>";}} ?>
                                  </select>
                                </div>


                                </div>



                    <div class="row">&nbsp;</div>

                    <div class="row">
                        <div class="col-lg-12 text-center bg-faded">
                            <h4>2. INFORMACION TRIBUTARIA DEL PROVEEDOR</h4>
                        </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3">Su empresa esta catalogada como Gran contribuyente</div>
                      <div class="col-lg-1">
                  <input type="text" name="grancon_resp" value="<?php echo $grancon_resp ?>" class="form-control" required/>
                      </div>
                      <div class="col-lg-1"><strong>Fecha</strong></div>
                      <div class="col-lg-3">
                        <input type="date" name="fecha_granco" placeholder="" class="form-control" value="<?php echo $fecha_granco ?>" required/>
                      </div>
                      <div class="col-lg-4">
                        <input type="text" name="resolucion_granco" placeholder="Numero resolucion" class="form-control" pattern="[0-9]+{0,20}" maxlength="20" value="<?php echo $resolucion_granco ?>" required/>
                      </div>

                    </div>
                    <div class="row">&nbsp;</div>

                    <div class="row">
                      <div class="col-lg-3">Su empresa esta catalogada como Autorretenedor</div>
                      <div class="col-lg-1">
                      <input type="text" name="respuesta_au" value="<?php echo $respuesta_au ?>" class="form-control" required/>
                      </div>
                      <div class="col-lg-1"><strong>Fecha</strong></div>
                      <div class="col-lg-3">
                        <input type="date" name="fecha_au" placeholder="" class="form-control" value="<?php echo $fecha_au ?>" required/>
                      </div>
                      <div class="col-lg-4">
                        <input type="text" name="resolucion_au" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" value="<?php echo $resolucion_au ?>" required/>
                      </div>

                    </div>
                    <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-3">Su empresa esta catalogada como Entidad sin animo de lucro</div>
                        <div class="col-lg-1">
                          <input type="text" name="respuesta_animo" value="<?php echo $respuesta_animo ?>" class="form-control" required/>
                        </div>
                        <div class="col-lg-1"><strong>Fecha</strong></div>
                        <div class="col-lg-3">
                          <input type="date" name="fecha_animo" placeholder="" class="form-control" value="<?php echo $fecha_animo ?>" required/>
                        </div>
                        <div class="col-lg-4">
                          <input type="text" name="resolucion_animo" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" value="<?php echo $resolucion_animo ?>" required/>
                        </div>

                      </div>
                      <div class="row">&nbsp;</div>
                        <div class="row">
                          <div class="col-lg-3">Su empresa es Agente de Retencion en IVA</div>
                          <div class="col-lg-1">
                            <input type="text" name="respuesta_agIVA" value="<?php echo $respuesta_agIVA ?>" class="form-control" required/>
                          </div>
                          <div class="col-lg-1"><strong>Fecha</strong></div>
                          <div class="col-lg-3">
                            <input type="date" name="fecha_agIVA" placeholder="" class="form-control" value="<?php echo $fecha_agIVA ?>" required/>
                          </div>
                          <div class="col-lg-4">
                          </div>
                          <input type="text" name="resolucion_agIVA" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" value="<?php echo $resolucion_agIVA ?>" required/>

                        </div>
                        <div class="row">&nbsp;</div>
                          <div class="row">
                            <div class="col-lg-3">Su empresa es Agente de Retencion en ICA</div>
                            <div class="col-lg-1">
                              <input type="text" name="respuestaICA" value="<?php echo $respuestaICA ?>" class="form-control" required/>
                            </div>
                            <div class="col-lg-1"><strong>Fecha</strong></div>
                            <div class="col-lg-3">
                              <input type="date" name="fechaICA" placeholder="" class="form-control" value="<?php echo $fechaICA ?>" required/>
                            </div>
                            <div class="col-lg-4">
                              <input type="text" name="resolucionICA" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" value="<?php echo $resolucionICA ?>" required/>
                            </div>

                          </div>

                          <div class="row">&nbsp;</div>
                          <div class="row">
                            <div class="col-lg-3">Sus operaciones estan gravadas con IVA</div>
                            <div class="col-lg-1">
                            <input type="text" name="respuesta_opIVA" value="<?php echo $respuesta_opIVA ?>" class="form-control" required/>
                            </div>
                            <div class="col-lg-1"><strong>Fecha</strong></div>
                            <div class="col-lg-3">
                              <input type="date" name="fecha_opIVA" placeholder="" class="form-control" value="<?php echo $fecha_opIVA ?>" required/>
                            </div>
                            <div class="col-lg-4">
                              <input type="text" name="resolucion_opIVA" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" value="<?php echo $resolucion_opIVA ?>" required/>
                            </div>

                          </div>
                          <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-3"><strong>Regimen</strong></div>
                        <div class="col-lg-3">
                          <select class="form-control" name="TipoRegimen" >
                            <option value="<?php $tipoRegimen ?>"><?php echo $tipoRegimen ?></option>
                            <option value="Regimen Simplificado">Regimen Simplificado</option>
                            <option value="Regimen Comun">Regimen Comun</option>
                          </select>
                        </div>

                      </div>
                        <div class="row">&nbsp;</div>  <div class="row">&nbsp;</div>
                      <div class="row">
                          <div class="col-lg-12 text-center bg-faded">
                              <h4>3. INFORMACION BANCARIA DEL PROVEEDOR</h4>
                          </div>
                      </div>
                      <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-2"><strong>Numero Cuenta Bancaria</strong></div>
                        <div class="col-lg-4">
                          <input type="text" name="numero_cuenta_bancaria" placeholder="" pattern="[0-9]+{0,15}" maxlength="15" class="form-control" value="<?php echo $numero_cuenta_bancaria ?>" required/>
                        </div>
                        <div class="col-lg-2"><strong>Tipo de cuenta</strong></div>
                        <div class="col-lg-4">
                          <input type="text" name="tipo_cuenta" placeholder="" class="form-control" value="<?php echo $tipo_cuenta ?>" required/>
                        </div>
                      </div>
                      <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-2"><strong>Entidad Financiera</strong></div>

                          <?php

                          $sql="select * from banco";
                          $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                          ?>
                          <div class="col-lg-4 text-center">
                            <select class="custom-select" name="entidad_financiera" required/>

                            <option Selected><?php echo $entidad_financiera ?></option>
                            <?php if($result->num_rows>0){?>

                              <?php while ($r=$result->fetch_array()){


                              echo "<option value=".$r["EntidadBancaria"].">".$r['EntidadBancaria']."</option>";}} ?>
                            </select>
                          </div>

                              <div class="col-lg-2"><strong>Titular cuenta</strong></div>
                              <div class="col-lg-4">
                                <input type="text" name="TitularCuenta" placeholder="" class="form-control" pattern="[A-Za-z ]+{0,30}" maxlength="30" value="<?php echo $TitularCuenta ?>" required/>
                              </div>

                      </div>
                      <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-2"><strong>Codigo SWIFT</strong></div>
                        <div class="col-lg-4">
                          <input type="text" name="codigo_SWIFT" placeholder="" class="form-control" pattern="[A-Za-z0-9 ]+{0,20}" maxlength="20" value="<?php echo $codigo_SWIFT ?>" required/>
                        </div>
                        <div class="col-lg-2"><strong>Codigo IBAN</strong></div>
                        <div class="col-lg-4">
                          <input type="text" name="codigo_IBAN" placeholder="" pattern="[A-Za-z0-9 ]+{0,20}" maxlength="20" class="form-control" value="<?php echo $codigo_IBAN ?>" required/>
                        </div>
                      </div>
                      <div class="row">&nbsp;</div>  <div class="row">&nbsp;</div>
                        <div class="row">
                          <div class="col-lg-12 text-center bg-faded">
                            <h4>4. OBSERVACIONES</h4>
                          </div>
                        </div>
                        <div class="row">&nbsp;</div>
                        <div class="row">
                          <div class="col-lg-12">
                            <textarea class="form-control" placeholder="Observaciones" name="observaciones"><?php echo $observaciones ?></textarea>
                          </div>
                        </div>

                    <div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3">&nbsp;</div>
                      <div class="col-lg-3">&nbsp;</div>
                      <div class="col-lg-4">&nbsp;</div>
                      <div class="col-lg-2">
                        <input type="submit" name="" value="Actualizar proveedor" class="btn btn-primary">
                      </div>
                    </div>
                </div>
        </form>
    </section>
    <section id="salir">
      <div class="row">&nbsp;</div>
      <div class="row">&nbsp;</div>
      <div class="row">&nbsp;</div>
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
