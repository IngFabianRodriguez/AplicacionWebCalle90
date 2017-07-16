<?php
session_start();
require 'fpdf/fpdf.php';
include 'conexion.php';

$link=conectar();
$pdf= new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial','',10);
$pdf->Ln(11);
$pdf->Image('Logo-Uniminuto-01.png',17,21,50,20,'PNG');
$pdf->Cell(40,15,'',0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,15," ", 0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,15,'  Fecha: '.date('d-m-Y').'',0);
$pdf->Ln(30);
$pdf->SetFont('Arial','B',11);
//Consulta//Consulta
$sql='SELECT * FROM equipo WHERE ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
if($result->num_rows>0){
  while($r=$result->fetch_array()){
$pdf->Cell(190,15,"Informe de mantenimiento del equipo ".$r['NombreEquipo']." con numero de activo fijo ".$r['ActivoFijo']."",0,1,"C");
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->Cell(12,15,'',0);
$pdf->MultiCell(170,8,"A continuación se presentan los datos referentes a los mantenimientos realizados al equipo ".$r['NombreEquipo']." identificado internamente con numero de Activo Fijo ".$r['ActivoFijo'].", en este historico presentado se evidencia los matenimientos con su última fecha de mantenimiento, próxima fecha mantenimiento y periodicidad de este, también la descripcién detallada de lo realizado en el mantenimiento.",0);
$pdf->Ln(10);
}
}
//Consulta
$sql='SELECT * FROM mantenimiento WHERE Equipo_ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));

if($result->num_rows>0){
while($r=$result->fetch_array()){
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(12,8,"  ",0);
  $pdf->Cell(35,8,"Quien Realizo",1);
  $pdf->Cell(40,8," Fecha mantenimiento",1);
  $pdf->Cell(40,8," Proximo mantenimiento",1);
  $pdf->Cell(25,8," Periodicidad",1);
  $pdf->Cell(35,8," Tipo mantenimiento",1);
  $pdf->Ln(8);
  $pdf->SetFont('Arial','',10);
  $pdf->Cell(12,8,"  ",0);
  $pdf->Cell(40,8,"".$r['QuienRealiza']."",0);
  $pdf->Cell(40,8,"".$r['FechaMnto']."",0);
  $pdf->Cell(40,8,"".$r['ProximoMnto']."",0);
  $pdf->Cell(25,8,"".$r['Periodicidad']."",0);
  $pdf->Cell(35,8,"".$r['TipoMantenimiento']."",0);
  $pdf->Ln(8);
  $pdf->Cell(12,8,"  ",0);
  $pdf->Cell(175,8,"Descripcion mantenimiento Realizado",1,1,'C');
  $pdf->Ln(2);
  $pdf->Cell(12,8,"  ",0);
  $pdf->MultiCell(175,8,"".$r['DescripcionMnto']."",1);
  $pdf->Ln(12);

}
}else {
  $pdf->Cell(12,8,"  ",0);
  $pdf->Cell(178 ,8,"No se registran mantenimientos a este equipo  ",0);
}
$pdf->Output();
  ?>
