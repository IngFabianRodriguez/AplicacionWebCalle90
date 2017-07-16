<?php
include 'conexion.php';

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

        <title>Insert </title>
    </head>

    <body>

<?php

# Conectamos con MySQL
$link=conectar();
//Variables
$fecha_creacion=$_REQUEST['fecha_creacion'];
$razonsocial = $_REQUEST['razonsocial'];
$NIT = $_REQUEST['NIT'];
$RUT=$_REQUEST['RUT'];
$direccion_proveedor = $_REQUEST['direccion_proveedor'];
$ciudad_proveedor = $_REQUEST['ciudad_proveedor'];
$pais_proveedor = $_REQUEST['pais_proveedor'];
$telefono_proveedor =$_REQUEST['telefono_proveedor'];
$correo_proveedor = $_REQUEST['correo_proveedor'];
$objeto_social = $_REQUEST['objeto_social'];
$descripcion_bien_servicio = $_REQUEST['descripcion_bien_servicio'];
$nombre_RL = $_REQUEST['nombre_RL'];
$identificacionRL = $_REQUEST['identificacionRL'];
$nombre_contacto = $_REQUEST['nombre_contacto'];
$apellido_contacto = $_REQUEST['apellido_contacto'];
$tipo_identificacion_contacto = $_REQUEST['tipo_identificacion_contacto'];
$identificacion_contacto = $_REQUEST['identificacion_contacto'];
$correo_contacto = $_REQUEST['correo_contacto'];
$tiempo_residencia = $_REQUEST['tiempo_residencia'];
$telefono_contacto = $_REQUEST['telefono_contacto'];
$celular_contacto = $_REQUEST['celular_contacto'];
$nombre_poblacion = $_REQUEST['nombre_Poblacion'];
$nombre_departamento = $_REQUEST['nombre_departamento'];
$grancon_resp = $_REQUEST['grancon_resp'];
$fecha_granco = $_REQUEST['fecha_granco'];
$resolucion_granco = $_REQUEST['resolucion_granco'];
$respuesta_au = $_REQUEST['respuesta_au'];
$fecha_au = $_REQUEST['fecha_au'];
$resolucion_au = $_REQUEST['resolucion_au'];
$respuesta_animo = $_REQUEST['respuesta_animo'];
$fecha_animo = $_REQUEST['fecha_animo'];
$resolucion_animo = $_REQUEST['resolucion_animo'];
$respuesta_agIVA = $_REQUEST['respuesta_agIVA'];
$fecha_agIVA = $_REQUEST['fecha_agIVA'];
$resolucion_agIVA = $_REQUEST['resolucion_agIVA'];
$respuestaICA = $_REQUEST['respuestaICA'];
$fechaICA = $_REQUEST['fechaICA'];
$resolucionICA = $_REQUEST['resolucionICA'];
$respuesta_opIVA = $_REQUEST['respuesta_opIVA'];
$fecha_opIVA = $_REQUEST['fecha_opIVA'];
$resolucion_opIVA = $_REQUEST['resolucion_opIVA'];
$tipoRegimen = $_REQUEST['TipoRegimen'];
$numero_cuenta_bancaria = $_REQUEST['numero_cuenta_bancaria'];
$tipo_cuenta = $_REQUEST['tipo_cuenta'];
$entidad_financiera = $_REQUEST['entidad_financiera'];
$TitularCuenta=$_REQUEST['TitularCuenta'];
$codigo_SWIFT = $_REQUEST['codigo_SWIFT'];
$codigo_IBAN = $_REQUEST['codigo_IBAN'];
$observaciones = $_REQUEST['observaciones'];



//Insert a tablas
$sql='SELECT * FROM `ciudad` WHERE nombre="'.$ciudad_proveedor.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$codigoCiudad= $r["idCiudad"];
 }
}
$sql='SELECT * FROM `pais` WHERE NombrePais="'.$pais_proveedor.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$codigoPais= $r["idPais"];
 }
}
$sql='SELECT * FROM `poblacion` WHERE NombrePoblacion="'.$nombre_poblacion.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$codigoPoblacion = $r["idPoblacion"];

 }
}

$sql='SELECT * FROM `departamento` WHERE NombreDepartamento="'.$nombre_departamento.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$codigoDepartamento= $r["CodigoDepartamento"];
 }
}


$sql='INSERT INTO `proveedor`(`NIT`, `RazonSocial`, `Telefono`, `Correo`, `FechaCreacion`, `FechaActualizacion`, `Observaciones`, `Ciudad_idCiudad`, `Pais_idPais`, `Departamento_CodigoDepartamento`, `Poblacion_idPoblacion`)
 VALUES ("'.$NIT.'","'.$razonsocial.'","'.$telefono_proveedor.'","'.$correo_proveedor.'","'.$fecha_creacion.'","null","'.$observaciones.'","'.$codigoCiudad.'","'.$codigoPais.'","'.$codigoDepartamento.'","'.$codigoPoblacion.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `contacto`(`Identificacion`, `TipoIdentificacion`, `Nombre`, `Apellido`, `Celular`, `TelefonoFijo`, `Correo`, `Residencia`, `Proveedor_NIT`)
VALUES ("'.$identificacion_contacto.'","'.$tipo_identificacion_contacto.'","'.$nombre_contacto.'","'.$apellido_contacto.'","'.$celular_contacto.'","'.$telefono_contacto.'","'.$correo_contacto.'","'.$tiempo_residencia.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `tributaria`(`NumeroResolucion`, `nombre`, `Respuesta`, `Fecha`, `Proveedor_NIT`)
VALUES ("'.$resolucion_granco.'","Su empresa esta catalogada como Gran contribuyente","'.$grancon_resp.'","'.$fecha_granco.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `tributaria`(`NumeroResolucion`, `nombre`, `Respuesta`, `Fecha`, `Proveedor_NIT`)
 VALUES ("'.$resolucion_au.'","Su empresa esta catalogada como Autorretenedor","'.$respuesta_au.'","'.$fecha_au.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `tributaria`(`NumeroResolucion`, `nombre`, `Respuesta`, `Fecha`, `Proveedor_NIT`)
 VALUES ("'.$resolucion_animo.'","Su empresa esta catalogada como Entidad sin animo de lucro","'.$respuesta_animo.'","'.$fecha_animo.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `tributaria`(`NumeroResolucion`, `nombre`, `Respuesta`, `Fecha`, `Proveedor_NIT`)
 VALUES ("'.$resolucion_agIVA.'","Su empresa es Agente de Retencion IVA","'.$respuesta_agIVA.'","'.$fecha_agIVA.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `tributaria`(`NumeroResolucion`, `nombre`, `Respuesta`, `Fecha`, `Proveedor_NIT`)
 VALUES ("'.$resolucionICA.'","Su empresa es Agente de Retencion ICA","'.$respuestaICA.'","'.$fechaICA.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='INSERT INTO `tributaria`(`NumeroResolucion`, `nombre`, `Respuesta`, `Fecha`, `Proveedor_NIT`)
 VALUES ("'.$resolucion_opIVA.'","Sus operaciones estan grabadas con IVA","'.$respuesta_opIVA.'","'.$fecha_opIVA.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));


$sql='INSERT INTO `infolegal`(`RUT`, `NombreRL`, `IdentificacionRL`, `ObjetoSocial`, `DescripcionBienServicio`, `Regimen`, `Proveedor_NIT`)
VALUES ("'.$RUT.'","'.$nombre_RL.'","'.$identificacionRL.'","'.$objeto_social.'","'.$descripcion_bien_servicio.'","'.$tipoRegimen.'","'.$NIT.'")';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));


$sql='INSERT INTO `bancaria`(`NumeroCuenta`, `TipoCuenta`, `TitularCuenta`, `codigoSWIFT`, `codigoIBAN`, `Proveedor_NIT`, `Banco_CodigoBanco`)
 VALUES ("'.$numero_cuenta_bancaria.'","'.$tipo_cuenta.'","'.$TitularCuenta.'","'.$codigo_SWIFT.'","'.$codigo_IBAN.'","'.$NIT.'","'.$entidad_financiera.'")';
 $result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));


echo "<script type='text/javascript'>
  alert('Proveedor ingresado con exito al sistema al sistema');
  window.location='/Calle90/modulos/Electronica/electronica.php';
</script>";



 ?>

    </body>

    </html>
    <?php
}
else {
	echo "<script type='text/javascript'>
		alert('Ud no ha iniciado sesion. Por favor iniciar una o registrese');
		window.location='/Calle90/index.php';
	</script>";
}

 ?>
