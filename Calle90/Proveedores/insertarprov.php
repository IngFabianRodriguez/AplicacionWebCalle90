<?php
session_start();
include 'conexion.php';
$link=conectar();
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
    <title>Insertar Proveedor</title>
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
        <div class="jumbotron bg-success text-center">

            <h2>Creación de proveedores</h2>
            <p>A continuacion rellenar con los datos solicitados para la creacion de proveedor, acreedor o deudor</p>
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
        <form class="form-group" action="ingresarprov.php" method="post">
            <div class="container">
                <div class="row">
                    &nbsp;
                </div>

                <div class="row">
                    <div class="col-lg-6">&nbsp;</div>
                    <div class="col-lg-3">
                        <label for=""><strong>Fecha de creacion</strong></label>
                    </div>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" name="fecha_creacion" placeholder=""  required/>
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
                      <input type="text" name="razonsocial" pattern="[a-zA-Z ]+" class="form-control" required/>
                    </div>
                  </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">

                      <div class="col-lg-1"><strong>NIT</strong></div>
                      <div class="col-lg-5">
                        <input type="text" name="NIT" placeholder="" pattern="[0-9]+" maxlength="15" class="form-control" required/>
                      </div>
                      <div class="col-lg-1"><strong>RUT</strong></div>
                      <div class="col-lg-5">
                        <input type="text" name="RUT" placeholder="" pattern="[0-9]+" maxlength="12" class="form-control" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Telefono</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="telefono_proveedor" pattern="[0-9]+{0,7}" maxlength="7" class="form-control" required/>
                      </div>
                      <div class="col-lg-3"><strong>Correo</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="correo_proveedor" placeholder="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Direccion Proveedor</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="direccion_proveedor" placeholder="" pattern="[a-zA-Z0-9 ]+{0,40}" maxlength="40" class="form-control" required/>
                      </div>
                      <div class="col-lg-1 text"> <strong>Ciudad</strong></div>
                      <?php

                      $sql="select * from ciudad";
                      $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
                      ?>
                      <div class="col-lg-2 text-center">
                        <select class="custom-select" name="ciudad_proveedor" required/>

                        <option Selected>Seleccionar</option>
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
                        <select class="custom-select" name="pais_proveedor" required/>

                        <option Selected>Seleccionar</option>
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
                        <input type="text" name="objeto_social" placeholder="" pattern="[A-Za-z ]+" class="form-control" required/>
                      </div>
                      <div class="col-lg-3"><strong>Descripcion bien o servicio</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="descripcion_bien_servicio" placeholder="" pattern="[A-Za-z ]+" class="form-control" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Nombre Representante legal</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="nombre_RL" placeholder="" pattern="[A-Za-z ]+{0,30}"  maxlength="30" class="form-control" required/>
                      </div>
                      <div class="col-lg-3"><strong>Identificacion Representante legal</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="identificacionRL" placeholder="" pattern="[0-9]+{0,15}" maxlength="15" class="form-control" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Nombre contacto</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="nombre_contacto" placeholder="" pattern="[A-Za-z ]+{0,30}" maxlength="30" class="form-control" required/>
                      </div>
                      <div class="col-lg-3"><strong>Apellido contacto</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="apellido_contacto" placeholder="" pattern="[A-Za-z ]+{0,30}" maxlength="30" class="form-control" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Tipo identificacion</strong></div>
                      <div class="col-lg-3">
                        <select class="form-control" name="tipo_identificacion_contacto">
                            <option selected>Seleccione</option>
                            <option value="Cedula ciudadania">Cedula Ciudadania</option>
                            <option value="Pasaporte">Pasaporte</option>
                            <option value="Visa">Visa</option>
                        </select>
                      </div>
                      <div class="col-lg-3"><strong>Identificacion Contacto</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="identificacion_contacto" placeholder="" pattern="[0-9]+{0,15}" maxlength="15" class="form-control" required/>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Correo electronico</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="correo_contacto" placeholder="" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" class="form-control" required/>
                      </div>
                      <div class="col-lg-3"><strong>Tiempo residencia</strong></div>
                      <div class="col-lg-3">
                      <select class="form-control" name="tiempo_residencia">
                        <option selected>Seleccione</option>
                        <option value="Temporal">Temporal</option>
                        <option value="Permanente">Permanente</option>
                        <option value="Indefinida y con libertad laboral">Indefinida y con libertad laboral</option>
                      </select>
                      </div>
                    </div>
                    <div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3"><strong>Telefono Fijo</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="telefono_contacto" placeholder="" pattern="[0-9]+{0,7}" maxlength="7" class="form-control" required/>
                      </div>
                      <div class="col-lg-3"><strong>Telefono Celular</strong></div>
                      <div class="col-lg-3">
                        <input type="text" name="celular_contacto" placeholder="" pattern="[0-9]+{0,10}" maxlength="10" class="form-control" required/>
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
                            <select class="custom-select" name="nombre_Poblacion" required/>

                            <option Selected>Seleccionar</option>
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
                                  <select class="custom-select" name="nombre_departamento" required/>

                                  <option Selected>Seleccionar</option>
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
                        <select class="form-control" name="grancon_resp" required/>
                            <option value="Si">SI</option>
                            <option value="No">NO</option>
                        </select>
                      </div>
                      <div class="col-lg-1"><strong>Fecha</strong></div>
                      <div class="col-lg-3">
                        <input type="date" name="fecha_granco" placeholder="" class="form-control" required/>
                      </div>
                      <div class="col-lg-4">
                        <input type="text" name="resolucion_granco" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" required/>
                      </div>

                    </div>
                    <div class="row">&nbsp;</div>

                    <div class="row">
                      <div class="col-lg-3">Su empresa esta catalogada como Autorretenedor</div>
                      <div class="col-lg-1">
                        <select class="form-control" name="respuesta_au" required/>
                            <option value="Si">SI</option>
                            <option value="No">NO</option>
                        </select>
                      </div>
                      <div class="col-lg-1"><strong>Fecha</strong></div>
                      <div class="col-lg-3">
                        <input type="date" name="fecha_au" placeholder="" class="form-control" required/>
                      </div>
                      <div class="col-lg-4">
                        <input type="text" name="resolucion_au" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" required/>
                      </div>

                    </div>
                    <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-3">Su empresa esta catalogada como Entidad sin animo de lucro</div>
                        <div class="col-lg-1">
                          <select class="form-control" name="respuesta_animo" required/>
                              <option value="Si">SI</option>
                              <option value="No">NO</option>
                          </select>
                        </div>
                        <div class="col-lg-1"><strong>Fecha</strong></div>
                        <div class="col-lg-3">
                          <input type="date" name="fecha_animo" placeholder="" class="form-control" required/>
                        </div>
                        <div class="col-lg-4">
                          <input type="text" name="resolucion_animo" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" required/>
                        </div>

                      </div>
                      <div class="row">&nbsp;</div>
                        <div class="row">
                          <div class="col-lg-3">Su empresa es Agente de Retencion en IVA</div>
                          <div class="col-lg-1">
                            <select class="form-control" name="respuesta_agIVA" required/>
                                <option value="Si">SI</option>
                                <option value="No">NO</option>
                            </select>
                          </div>
                          <div class="col-lg-1"><strong>Fecha</strong></div>
                          <div class="col-lg-3">
                            <input type="date" name="fecha_agIVA" placeholder="" class="form-control" required/>
                          </div>
                          <div class="col-lg-4">
                            <input type="text" name="resolucion_agIVA" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" required/>
                          </div>

                        </div>
                        <div class="row">&nbsp;</div>
                          <div class="row">
                            <div class="col-lg-3">Su empresa es Agente de Retencion en ICA</div>
                            <div class="col-lg-1">
                              <select class="form-control" name="respuestaICA" required/>
                                  <option value="Si">SI</option>
                                  <option value="No">NO</option>
                              </select>
                            </div>
                            <div class="col-lg-1"><strong>Fecha</strong></div>
                            <div class="col-lg-3">
                              <input type="date" name="fechaICA" placeholder="" class="form-control" required/>
                            </div>
                            <div class="col-lg-4">
                              <input type="text" name="resolucionICA" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" required/>
                            </div>

                          </div>

                          <div class="row">&nbsp;</div>
                          <div class="row">
                            <div class="col-lg-3">Sus operaciones estan gravadas con IVA</div>
                            <div class="col-lg-1">
                              <select class="form-control" name="respuesta_opIVA" required/>
                                  <option value="Si">SI</option>
                                  <option value="No">NO</option>
                              </select>
                            </div>
                            <div class="col-lg-1"><strong>Fecha</strong></div>
                            <div class="col-lg-3">
                              <input type="date" name="fecha_opIVA" placeholder="" class="form-control" required/>
                            </div>
                            <div class="col-lg-4">
                              <input type="text" name="resolucion_opIVA" placeholder="Numero resolucion" pattern="[0-9]+{0,20}" maxlength="20" class="form-control" required/>
                            </div>

                          </div>
                          <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-3"><strong>Regimen</strong></div>
                        <div class="col-lg-3">
                          <select class="form-control" name="TipoRegimen" required/>
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
                          <input type="text" name="numero_cuenta_bancaria" placeholder="" pattern="[0-9]+{0,15}" maxlength="15" class="form-control" required/>
                        </div>
                        <div class="col-lg-2"><strong>Tipo de cuenta</strong></div>
                        <div class="col-lg-4">
                        <select class="form-control" name="tipo_cuenta">
                          <option selected>Seleccione</option>
                          <option value="Corriente">Cuenta Corriente</option>
                          <option value="Ahorro">Cuenta Ahorro</option>
                        </select>
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

                            <option Selected>Seleccionar</option>
                            <?php if($result->num_rows>0){?>

                              <?php while ($r=$result->fetch_array()){


                              echo "<option value=".$r["CodigoBanco"].">".$r['EntidadBancaria']."</option>";}} ?>
                            </select>
                          </div>

                              <div class="col-lg-2"><strong>Titular cuenta</strong></div>
                              <div class="col-lg-4">
                                <input type="text" name="TitularCuenta" placeholder="" pattern="[A-Za-z ]+{0,30}" maxlength="30" class="form-control" required/>
                              </div>

                      </div>
                      <div class="row">&nbsp;</div>
                      <div class="row">
                        <div class="col-lg-2"><strong>Codigo SWIFT</strong></div>
                        <div class="col-lg-4">
                          <input type="text" name="codigo_SWIFT" placeholder="" pattern="[A-Za-z0-9 ]+{0,20}" maxlength="20" class="form-control" required/>
                        </div>
                        <div class="col-lg-2"><strong>Codigo IBAN</strong></div>
                        <div class="col-lg-4">
                          <input type="text" name="codigo_IBAN" placeholder="" pattern="[A-Za-z0-9 ]+{0,20}" maxlength="20" class="form-control" required/>
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
                            <textarea class="form-control" placeholder="Observaciones" name="observaciones" required/></textarea>
                          </div>
                        </div>

                    <div class="row">&nbsp;</div><div class="row">&nbsp;</div><div class="row">&nbsp;</div>
                    <div class="row">
                      <div class="col-lg-3">&nbsp;</div>
                      <div class="col-lg-3">&nbsp;</div>
                      <div class="col-lg-4">&nbsp;</div>
                      <div class="col-lg-2">
                        <input type="submit" name="" value="Ingresar proveedor" class="btn btn-primary">
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
          <div class="col-lg-4">&nbsp;</div>
          <div class="col-lg-6">&nbsp;</div>
          <div class="col-lg-2">
          </div>
        </div>
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
