<?php
session_start();
include 'conexion.php';
$link=conectar();

$_SESSION['CodigoMnto']=$_GET['CodigoMnto'];

$sql='SELECT * FROM mantenimiento WHERE CodigoMnto="'.$_GET['CodigoMnto'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
$QuienRealiza = $r['QuienRealiza'];
$FechaMnto = $r['FechaMnto'];
$ProximoMnto = $r['ProximoMnto'];
$Periodicidad = $r['Periodicidad'];
$TipoMantenimiento = $r['TipoMantenimiento'];
$DescripcionMnto = $r['DescripcionMnto'];
$_SESSION['Equipo_ActivoFijo'] = $r['Equipo_ActivoFijo'];
$Proveedor_NIT = $r['Proveedor_NIT'];

 }
}


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

 </head>
 <body>

   <section id="navbar">

   <div class="row-fluid">
       <nav class="text-center navbar navbar-inverse navbar-toggleable-md navbar-light bg-inverse">
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
         <a class="navbar-brand" href="index.php">Uniminuto</a>


       </nav>
     </div>
   </section>


   <section id="jumbotron">

       <div class="jumbotron bg-success text-center">
         <h2>Bienvenido <?php include 'operaciones.php'; imprimirnombre();?></h2>
         <p>A continuacion podras realizar las operaciones correspondientes a los proveedores</p>
       </div>

   </section>
<form  action="actualizaMnto.php" method="post">


<div class="container">
<div class="row">&nbsp;</div>
<div class="row">
 <div class="col-lg-12 bg-faded text-center">
<h4>Mantenimiento</h4>
 </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">
 <div class="col-lg-3">
<strong>Nombre completo quien realiza el mantenimiento</strong>
 </div>
 <div class="col-lg-9">
<input type="text" class="form-control" name="quienRealiza" pattern="[A-Za-z ]+{0,50}" maxlength="50" placeholder="Quien realiza el mantenimiento" value="<?php echo $QuienRealiza; ?>" required/>
 </div>
</div>
<div class="row">&nbsp;</div>
<div class="row">

<div class="col-lg-3"><strong>Fecha mantenimiento</strong></div>
<div class="col-lg-3">
 <input type="date" name="fechaMnto" class="form-control" value="<?php echo $FechaMnto; ?>" required/>
</div>
<div class="col-lg-3"><strong>Fecha proximo mantenimiento</strong></div>
<div class="col-lg-3">
 <input type="date" name="fechaProxMnto" class="form-control" value="<?php echo $ProximoMnto;?>" required/>
</div>
</div>
<div class="row">&nbsp;</div>
   <div class="row">
       <div class="col-lg-3"><strong>Tipo de mantenimiento</strong></div>
       <div class="col-lg-3">
           <select name="tipo_mantenimiento" class="custom-select" value="<?php echo $TipoMantenimiento; ?>" required/>
     <option value="Correctivo">Correctivo</option>
     <option value="Preventivo">Preventivo</option>
   </select>
       </div>
       <div class="col-lg-3"><strong>Periodicidad del mantenimiento</strong></div>
       <div class="col-lg-2">
           <input type="text" name="periodicidad" class="form-control" pattern="[0-9]+{0,2}" maxlength="2" placeholder="Periodicidad" value="<?php echo $Periodicidad ?>" required/>
       </div>
       <div class="col-lg-1">
           <strong>Meses</strong>
       </div>
   </div>
   <div class="row">&nbsp;</div>
   <div class="col-lg-12 bg-faded">
       <h4 class="text-center">Proveedor</h4>
   </div>
   <div class="row">&nbsp;</div>
   <div class="row">
         <div class="col-lg-3" ></div>
       <div class="col-lg-3 text-center"> <strong>Nombre proveedor</strong></div>
       <?php

       $sql='SELECT * FROM proveedor WHERE NIT="'.$Proveedor_NIT.'"';
       $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
       ?>
       <div class="col-lg-2 text-center">
         <select class="custom-select" name="nombre_proveedor" required/>


               <?php if($result->num_rows>0){?>

                 <?php while ($r=$result->fetch_array()){


                 echo "<option value=".$r["NIT"].">".$r['RazonSocial']."</option>";}} ?>
               </select>
       </div>
   </div>
   <div class="row">&nbsp;</div>
   <div class="row">
     <div class="col-lg-12 text-center bg-faded">
       <h3>Descripcion mantenimiento</h3>
     </div>
   </div>
   <div class="row">&nbsp;</div>
   <div class="row">
     <div class="col-lg-12">
       <textarea name="descripcionMnto" class="form-control" placeholder="En este lugar agregar el que se le hizo al equipo"><?php echo $DescripcionMnto ?></textarea>
     </div>
   </div>
   <div class="row">&nbsp;</div>
   <div class="row">&nbsp;</div>

   <div class="row">
     <div class="col-lg-4">&nbsp;</div>
     <div class="col-lg-6">&nbsp;</div>
     <div class="col-lg-2">
       <input type="submit" class="btn btn-primary" value="Ingresar Mantenimiento">
     </div>
   </div>
 </div>
</form>
 </div>
 <div class="col-lg-4">&nbsp;</div>
 <div class="col-lg-6">&nbsp;</div>
 <div class="col-lg-2">&nbsp;</div>
 <div class="jumbotron bg-inverse">
   <div class="row">
     <div class="col-lg-4">&nbsp;</div>
     <div class="col-lg-6">&nbsp;</div>
     <div class="col-lg-2">&nbsp;</div>
   </div>
 </div>
</section>

   <!-- jQuery first, then Tether, then Bootstrap JS. -->
   <script src="js/jquery.min.js"></script>

   <script src="js/bootstrap.min.js"></script>
 </body>
</html>
