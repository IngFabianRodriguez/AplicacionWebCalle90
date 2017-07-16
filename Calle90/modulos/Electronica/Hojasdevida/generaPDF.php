<?php
session_start();
require 'fpdf/fpdf.php';
include 'conexion.php';
$link=conectar();

$pdf= new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(11);
$pdf->Image('Logo-Uniminuto-01.png',17,21,28,15,'PNG');
$pdf->Cell(40,15,'',1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,15,'               HOJA DE VIDA EQUIPO/MAQUINARIA', 1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,15,'  Fecha: '.date('d-m-Y').'',1);
$pdf->Ln(15);
//Consulta
$sql=' SELECT idPais,NombrePais,idCiudad,nombre,idSede,Sede,Laboratorio,Piso,imagen_idImagen FROM equipo
JOIN pais ON equipo.Pais_idPais=pais.idPais
JOIN ciudad ON equipo.Ciudad_idCiudad=ciudad.idCiudad
JOIN ubicacion ON equipo.ubicacion_idSede=ubicacion.idSede
JOIN imagen ON equipo.imagen_idImagen=imagen.idImagen
WHERE equipo.ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
   while($r=$result->fetch_array()){
$pdf->Cell(65,8," SEDE: ".$r['Sede']."",1);
$pdf->Cell(50,8," CIUDAD: ".$r['nombre']."",1);
$pdf->Cell(75,8," UBICACION: ".$r['Laboratorio']." ".$r['Piso']."",1);
$pdf->Ln(8);
$pdf->Cell(115,8," RESPONSABLE: ".$_SESSION['nombre']." ".$_SESSION['apellido']."",1);
$pdf->Cell(75,8," CARGO: ".$_SESSION['cargo']."",1);

   }
 }
 $pdf->Ln(12);
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(190,8," 1.Especificaciones del equipo o maquinaria",1,0,'C');
 $pdf->Ln(10);
 $pdf->SetFont('Arial','',10);

//Consulta
 $sql='SELECT * FROM equipo WHERE ActivoFijo= "'.$_SESSION['ActivoFijo'].'"';
 $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

 if($result->num_rows>0){
    while($r=$result->fetch_array()){
$pdf->Cell(80,8,"  Nombre del equipo",1);
$pdf->Cell(110,8,"    ".$r['NombreEquipo']."",1);
$pdf->Ln(8);
$pdf->Cell(80,8,"  Marca o Fabricante",1);
$pdf->Cell(110,8,"    ".$r['Fabricante']."",1);
$pdf->Ln(8);
$pdf->Cell(80,8,"  Modelo",1);
$pdf->Cell(110,8,"    ".$r['Modelo']."",1);
$pdf->Ln(8);
$pdf->Cell(80,8,"  Serie",1);
$pdf->Cell(110,8,"    ".$r['Serie']."",1);
$pdf->Ln(8);
$pdf->Cell(80,8,"  Fecha Adquisicion",1);
$pdf->Cell(110,8,"    ".$r['FechaAdquisicion']."",1);
$fechaAd=$r['FechaAdquisicion'];
$descripcion=$r['Descripcion'];
    }
  }
  $pdf->Ln(12);
  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(190,8," 2.Informacion de garantia",1,0,'C');
  $pdf->Ln(10);
  $pdf->SetFont('Arial','',10);
  //Consulta
  $sql='SELECT * FROM garantia WHERE Equipo_ActivoFijo= "'.$_SESSION['ActivoFijo'].'"';
  $result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

  if($result->num_rows>0){
     while($r=$result->fetch_array()){
 $pdf->Cell(80,8,"  Fecha inicio Garantia",1);
 $pdf->Cell(110,8,"    ".$fechaAd."",1);
 $pdf->Ln(8);
 $pdf->Cell(80,8,"  Tiempo de Garantia",1);
 $pdf->Cell(110,8,"    ".$r['TiempoGarantia']." Meses",1);
 $pdf->Ln(8);
 $pdf->Cell(80,8,"  Fecha finalizacion Garantia",1);
 $pdf->Cell(110,8,"    ".$r['FechaFin']."",1);
     }
   }
   $pdf->Ln(12);
   $pdf->SetFont('Arial','B',10);
   $pdf->Cell(190,8," 3.Informacion de mantenimiento",1,0,'C');
   $pdf->Ln(10);
   $pdf->SetFont('Arial','',10);
//Consulta
//Consulta
$sql='SELECT * FROM mantenimiento WHERE Equipo_ActivoFijo= "'.$_SESSION['ActivoFijo'].'" order by FechaMnto DESC';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
   while($r=$result->fetch_array()){
     $pdf->Cell(80,8,"  Fecha Mantenimiento",1);
     $pdf->Cell(110,8,"    ".$r['FechaMnto']."",1);
     $pdf->Ln(8);
     $pdf->Cell(80,8,"  Fecha Proximo Mantenimiento",1);
     $pdf->Cell(110,8,"    ".$r['ProximoMnto']."",1);
     $pdf->Ln(8);
     $pdf->Cell(80,8,"  Tipo Mantenimiento",1);
     $pdf->Cell(110,8,"    ".$r['TipoMantenimiento']."",1);
     $pdf->Ln(8);
      $pdf->SetFont('Arial','B',10);
     $pdf->Cell(190,8,"  Descripcion",1);
      $pdf->SetFont('Arial','',10);
     $pdf->Ln(8);
     $pdf->MultiCell(190,8,"    ".$r['DescripcionMnto']."",1,'L');
      $pdf->Ln(4);
    }
   }else{

      $pdf->Cell(190,8,"  El Equipo no tiene registrado ningun Mantenimiento",1);
        $pdf->Ln(7);
   }
 $pdf->Ln(5);
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(190,8," 4.Descripcion de el equipo o maquinaria",1,0,'C');
 $pdf->Ln(10);
 $pdf->SetFont('Arial','',10);
 $pdf->MultiCell(190,8,"    ".$descripcion."",1,'L');


 $pdf->Ln(5);
 $pdf->SetFont('Arial','B',10);
 $pdf->Cell(190,8," 4.Imagen del equipo",1,0,'C');
 $pdf->Ln(10);
 $pdf->SetFont('Arial','',10);
  $sql = 'SELECT * FROM imagen WHERE idImagen="'.$_SESSION['ActivoFijo'].'"';
 $result=mysqli_query($link,$sql) or die ("ERROR AL REALIZAR LA CONSULTA $sql".mysqli_error($result));
 if($r=$result->fetch_array()){
   while($r=$result->fetch_array()){
     if($r['nombre_archivo']==""){
 $pdf->Cell(190,8,"No tiene imagen",1,0,'C');
     }else{
       $imagen="uploads/" . $r['nombre_archivo'];
$pdf->Image("/Calle90/modulos/Electronica/Hojasdevida/uploads/".$r['nombre_archivo'],17,21,35,15,'PNG');
}
}
}

//$pdf->Cell();
$pdf->Output();
  ?>
