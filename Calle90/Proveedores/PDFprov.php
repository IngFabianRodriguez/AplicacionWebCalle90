<?php
session_start();
require 'fpdf/fpdf.php';
include 'conexion.php';
$link=conectar();

$pdf= new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(11);
$pdf->Image('Logo-Uniminuto-01.png',12,21,35,15,'PNG');
$pdf->Cell(40,15,'',1);
 $pdf->SetFont('Arial','B',10);
$pdf->Cell(100,15,'HOJA DE VIDA PROVEEDOR', 1,0,'C');
$pdf->SetFont('Arial','',9);
$pdf->Cell(50,15,'  Fecha generacion: '.date('Y-m-d').'',1);
$pdf->Ln(18);
//Consulta


$sql='SELECT * FROM proveedor WHERE NIT= "'.$_SESSION['NIT'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
if($result->num_rows>0){
   while($r=$result->fetch_array()){
$pdf->Cell(100,8,'',0,'C');
$pdf->Cell(40,8,'Fecha de creacion',1,0,'C');
$pdf->Cell(50,8,$r['FechaCreacion'],1,0,'C');
$pdf->Ln(12);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,8," 1. Datos basicos del Proveedor",1,0,'C');
$pdf->Ln(12);
$pdf->SetFont('Arial','',10);


$pdf->Cell(45,8,'Razon Social:',1,0,'C');
$pdf->Cell(50,8,$r['RazonSocial'],1,0,'C');
$pdf->Cell(45,8,'NIT:',1,0,'C');
$pdf->Cell(50,8,$r['NIT'],1,0,'C');
$pdf->Ln(8);
$pdf->Cell(45,8,'Telefono:',1,0,'C');
$pdf->Cell(50,8,$r['Telefono'],1,0,'C');
$pdf->Cell(45,8,'Correo:',1,0,'C');
$pdf->Cell(50,8,$r['Correo'],1,0,'C');
$pdf->Ln(8);
   }

 }
 $sql='SELECT * FROM infolegal WHERE proveedor_NIT= "'.$_SESSION['NIT'].'"';
 $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
 if($result->num_rows>0){
    while($r=$result->fetch_array()){
      $regimen=$r['Regimen'];
      $pdf->Cell(45,8,'Representante Legal:',1,0,'C');
       $pdf->Cell(145,8,$r['NombreRL'],1,0,'C');
       $pdf->Ln(8);
       $pdf->Cell(45,8,'Identificacion :',1,0,'C');
       $pdf->Cell(50,8,$r['IdentificacionRL'],1,0,'C');
       $pdf->Cell(45,8,'Objeto Social:',1,0,'C');
       $pdf->Cell(50,8,$r['ObjetoSocial'],1,0,'C');
       $pdf->Ln(8);
       $pdf->Cell(45,8,'Descripcion bien o servicio:',1,0,'C');
       $pdf->Cell(50,8,$r['DescripcionBienServicio'],1,0,'C');
       $pdf->Cell(45,8,'RUT:',1,0,'C');
       $pdf->Cell(50,8,$r['RUT'],1,0,'C');
       $pdf->Ln(12);


    }

  }


  $sql='SELECT * FROM contacto WHERE proveedor_NIT= "'.$_SESSION['NIT'].'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
  if($result->num_rows>0){
     while($r=$result->fetch_array()){
       $pdf->SetFont('Arial','B',10);
       $pdf->Cell(190,8," 2. Datos de contacto",1,0,'C');
       $pdf->Ln(12);
       $pdf->SetFont('Arial','',10);


        $pdf->Cell(45,8,'Identificacion:',1,0,'C');
        $pdf->Cell(50,8,$r['Identificacion'],1,0,'C');
        $pdf->Cell(45,8,'Tipo Identificacion:',1,0,'C');
        $pdf->Cell(50,8,$r['TipoIdentificacion'],1,0,'C');
        $pdf->Ln(8);
        $pdf->Cell(45,8,'Nombre Contacto:',1,0,'C');
        $pdf->Cell(50,8,$r['Nombre'],1,0,'C');
        $pdf->Cell(45,8,'Apellido Contacto:',1,0,'C');
        $pdf->Cell(50,8,$r['Apellido'],1,0,'C');
        $pdf->Ln(8);
        $pdf->Cell(45,8,'Celular:',1,0,'C');
        $pdf->Cell(50,8,$r['Celular'],1,0,'C');
        $pdf->Cell(45,8,'Telefono Fijo:',1,0,'C');
        $pdf->Cell(50,8,$r['TelefonoFijo'],1,0,'C');
        $pdf->Ln(8);
        $pdf->Cell(45,8,'Correo Contacto:',1,0,'C');
        $pdf->Cell(50,8,$r['Correo'],1,0,'C');
        $pdf->Cell(45,8,'Tiempo residencia:',1,0,'C');
        $pdf->Cell(50,8,$r['Residencia'],1,0,'C');
        $pdf->Ln(12);

     }
   }

   $sql=' SELECT idPais,NombrePais,idCiudad,nombre,IdPoblacion,NombrePoblacion,CodigoDepartamento,NombreDepartamento FROM proveedor
   JOIN pais ON proveedor.pais_idPais=pais.idPais
   JOIN ciudad ON proveedor.ciudad_idCiudad=ciudad.idCiudad
   JOIN poblacion ON proveedor.poblacion_idPoblacion=poblacion.idPoblacion
   JOIN departamento ON proveedor.departamento_CodigoDepartamento=departamento.CodigoDepartamento
   WHERE proveedor.NIT="'.$_SESSION['NIT'].'"';
   $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
   if($result->num_rows>0){
      while($r=$result->fetch_array()){
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(190,8," 3. Informacion de ubicacion Proveedor",1,0,'C');
        $pdf->Ln(12);
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(45,8,'idPais:',1,0,'C');
        $pdf->Cell(50,8,$r['idPais'],1,0,'C');
        $pdf->Cell(45,8,'Pais:',1,0,'C');
        $pdf->Cell(50,8,$r['NombrePais'],1,0,'C');
        $pdf->Ln(8);
        $pdf->Cell(45,8,'Codigo Ciudad:',1,0,'C');
        $pdf->Cell(50,8,$r['idCiudad'],1,0,'C');
        $pdf->Cell(45,8,'Ciudad:',1,0,'C');
        $pdf->Cell(50,8,$r['nombre'],1,0,'C');
        $pdf->Ln(8);
        $pdf->Cell(45,8,'Codigo Departamento:',1,0,'C');
        $pdf->Cell(50,8,$r['CodigoDepartamento'],1,0,'C');
        $pdf->Cell(45,8,'Departamento:',1,0,'C');
        $pdf->Cell(50,8,$r['NombreDepartamento'],1,0,'C');
        $pdf->Ln(8);
        $pdf->Cell(45,8,'idPoblacion:',1,0,'C');
        $pdf->Cell(50,8,$r['IdPoblacion'],1,0,'C');
        $pdf->Cell(45,8,'Poblacion:',1,0,'C');
        $pdf->Cell(50,8,$r['NombrePoblacion'],1,0,'C');
        $pdf->Ln(12);
      }
    }
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,8," 4. Informacion tributaria del Proveedor",1,0,'C');
    $pdf->Ln(12);
    $pdf->SetFont('Arial','B',10);

      $pdf->Cell(100,8,'Nombre atributo tributario',1,0,'C');
      $pdf->Cell(25,8,'Respuesta',1,0,'C');
      $pdf->Cell(30,8,'Fecha',1,0,'C');
      $pdf->Cell(35,8,'NumeroResolucion',1,0,'C');
          $pdf->Ln(8);
                  $pdf->SetFont('Arial','',10);

    $sql='SELECT * FROM tributaria WHERE proveedor_NIT= "'.$_SESSION['NIT'].'"';
    $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
    if($result->num_rows>0){
       while($r=$result->fetch_array()){
         $pdf->Cell(100,8,$r['nombre'],1,0);
         $pdf->Cell(25,8,$r['Respuesta'],1,0,'C');
         $pdf->Cell(30,8,$r['Fecha'],1,0,'C');
         $pdf->Cell(35,8,$r['NumeroResolucion'],1,0,'C');
         $pdf->Ln(8);

       }
     }

     $sql='SELECT NumeroCuenta,TipoCuenta,TitularCuenta,codigoSWIFT,codigoIBAN,CodigoBanco,EntidadBancaria FROM bancaria
     JOIN banco On bancaria.banco_CodigoBanco=banco.CodigoBanco WHERE bancaria.proveedor_NIT="'.$_SESSION['NIT'].'"';
     $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
     if($result->num_rows>0){
        while($r=$result->fetch_array()){
          $pdf->SetFont('Arial','B',10);
          $pdf->Cell(190,8," 5. Informacion bancaria del Proveedor",1,0,'C');
          $pdf->Ln(12);


      $pdf->SetFont('Arial','B',10);
          $pdf->Cell(45,8,'Numero cuenta bancaria:',1,0,'C');
                $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,$r['NumeroCuenta'],1,0,'C');
      $pdf->SetFont('Arial','B',10);
          $pdf->Cell(45,8,'Tipo Cuenta:',1,0,'C');
                $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,$r['TipoCuenta'],1,0,'C');
          $pdf->Ln(8);
      $pdf->SetFont('Arial','B',10);
          $pdf->Cell(45,8,'Titular Cuenta:',1,0,'C');
                $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,$r['TitularCuenta'],1,0,'C');
      $pdf->SetFont('Arial','B',10);
          $pdf->Cell(45,8,'Codigo Banco:',1,0,'C');
                $pdf->SetFont('Arial','',10);
          $pdf->Cell(50,8,$r['CodigoBanco'],1,0,'C');
          $pdf->Ln(8);
      $pdf->SetFont('Arial','B',10);
          $pdf->Cell(45,8,'Entidad bancaria:',1,0,'C');
                $pdf->SetFont('Arial','',10);
          $pdf->Cell(145,8,$r['EntidadBancaria'],1,0,'C');
            $pdf->Ln(8);
            $pdf->SetFont('Arial','B',10);
                $pdf->Cell(45,8,'Codigo SWIFT:',1,0,'C');
                      $pdf->SetFont('Arial','',10);
                $pdf->Cell(50,8,$r['codigoSWIFT'],1,0,'C');
            $pdf->SetFont('Arial','B',10);
                $pdf->Cell(45,8,'Codigo IBAN:',1,0,'C');
                      $pdf->SetFont('Arial','',10);
                $pdf->Cell(50,8,$r['codigoIBAN'],1,0,'C');
                $pdf->Ln(12);
        }
      }

      $sql='SELECT * FROM proveedor WHERE NIT= "'.$_SESSION['NIT'].'"';
      $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
      if($result->num_rows>0){
         while($r=$result->fetch_array()){

      $pdf->SetFont('Arial','B',10);
      $pdf->Cell(190,8," 6. Observaciones",1,0,'C');
      $pdf->Ln(12);
      $pdf->SetFont('Arial','',10);
      $pdf->MultiCell(190,8,$r['Observaciones'],1,'L');
}
}
//$pdf->Cell();
$pdf->Output();
  ?>
