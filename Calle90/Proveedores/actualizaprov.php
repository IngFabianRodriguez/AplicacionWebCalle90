<?php
include 'conexion.php';
$link=conectar();
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
        <style>
   .error {font-weight: bold; color:red;}
   .mensaje {color:#030;}
   .listadoImagenes img {float:left;border:1px solid #ccc; padding:2px;margin:2px;}
   </style>
        <title>Siguiente...</title>
    </head>

    <body>

<?php

# Conectamos con MySQL
$fecha_actualizacion=$_REQUEST['fecha_actualizacion'];
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
$nombre_poblacion = $_REQUEST['nombrePoblacion'];
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
$codigoPoblacion= $r["idPoblacion"];
 }
}

$sql='SELECT * FROM `departamento` WHERE NombreDepartamento="'.$nombre_departamento.'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$codigoDepartamento= $r["CodigoDepartamento"];
 }
}


$sql='UPDATE `proveedor` SET `NIT`="'.$NIT.'",`RazonSocial`="'.$razonsocial.'",`Telefono`="'.$telefono_proveedor.'",`Correo`="'.$correo_proveedor.'",
`FechaActualizacion`="'.$fecha_actualizacion.'",`Observaciones`="'.$observaciones.'",`Ciudad_idCiudad`="'.$codigoCiudad.'",`Pais_idPais`="'.$codigoPais.'",
`Departamento_CodigoDepartamento`="'.$codigoDepartamento.'",`Poblacion_idPoblacion`="'.$codigoPoblacion.'" WHERE NIT ="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `infolegal` SET `RUT`="'.$RUT.'",`NombreRL`="'.$nombre_RL.'",`IdentificacionRL`="'.$identificacionRL.'",`ObjetoSocial`="'.$objeto_social.'",
`DescripcionBienServicio`="'.$descripcion_bien_servicio.'",`Regimen`="'.$tipoRegimen.'",`Proveedor_NIT`="'.$NIT.'" WHERE Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `tributaria` SET `NumeroResolucion`="'.$resolucion_granco.'",`Respuesta`="'.$grancon_resp.'",`Fecha`="'.$fecha_granco.'",`Proveedor_NIT`="'.$NIT.'"
WHERE nombre="Su empresa esta catalogada como Gran contribuyente" AND Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `tributaria` SET `NumeroResolucion`="'.$resolucion_au.'",`Respuesta`="'.$respuesta_au.'",`Fecha`="'.$fecha_au.'",`Proveedor_NIT`="'.$NIT.'"
WHERE nombre="Su empresa esta catalogada como Autorretenedor" AND Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `tributaria` SET `NumeroResolucion`="'.$resolucion_animo.'",`Respuesta`="'.$respuesta_animo.'",`Fecha`="'.$fecha_animo.'",`Proveedor_NIT`="'.$NIT.'"
WHERE nombre="Su empresa esta catalogada como Entidad sin animo de lucro" AND Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `tributaria` SET `NumeroResolucion`="'.$resolucion_agIVA.'",`Respuesta`="'.$respuesta_agIVA.'",`Fecha`="'.$fecha_animo.'",`Proveedor_NIT`="'.$NIT.'"
WHERE nombre="Su empresa es Agente de Retencion IVA" AND Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `tributaria` SET `NumeroResolucion`="'.$resolucionICA.'",`Respuesta`="'.$respuestaICA.'",`Fecha`="'.$fechaICA.'",`Proveedor_NIT`="'.$NIT.'"
WHERE nombre="Su empresa es Agente de Retencion ICA" AND Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `tributaria` SET `NumeroResolucion`="'.$resolucion_opIVA.'",`Respuesta`="'.$respuesta_opIVA.'",`Fecha`="'.$fecha_opIVA.'",`Proveedor_NIT`="'.$NIT.'"
WHERE nombre="Sus operaciones estan grabadas con IVA" AND Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='UPDATE `contacto` SET `Identificacion`="'.$identificacion_contacto.'",`TipoIdentificacion`="'.$tipo_identificacion_contacto.'",`Nombre`="'.$nombre_contacto.'",`Apellido`="'.$apellido_contacto.'",
`Celular`="'.$celular_contacto.'",`TelefonoFijo`="'.$telefono_contacto.'",`Correo`="'.$correo_contacto.'",`Residencia`="'.$tiempo_residencia.'",`Proveedor_NIT`="'.$NIT.'" WHERE Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));

$sql='SELECT * FROM banco WHERE EntidadBancaria="'.$entidad_financiera.'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
    $CodigoBanco = $r['CodigoBanco'];
}
}

$sql='UPDATE `bancaria` SET `NumeroCuenta`="'.$numero_cuenta_bancaria.'",`TipoCuenta`="'.$tipo_cuenta.'",`TitularCuenta`="'.$TitularCuenta.'",
`codigoSWIFT`="'.$codigo_SWIFT.'",`codigoIBAN`="'.$codigo_IBAN.'",`Proveedor_NIT`="'.$NIT.'",`Banco_CodigoBanco`="'.$CodigoBanco.'" WHERE Proveedor_NIT="'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));


echo "<script type='text/javascript'>
  alert('Proveedor Actualizado con exito en el sistema');
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
