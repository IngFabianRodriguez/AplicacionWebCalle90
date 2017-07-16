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
//Consulta
$sql='SELECT * FROM equipo WHERE ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
if($result->num_rows>0){
  while($r=$result->fetch_array()){
$pdf->Cell(190,15,"Informe de prestamos del equipo ".$r['NombreEquipo']." con numero de activo fijo ".$r['ActivoFijo']."",0,1,"C");
$pdf->SetFont('Arial','',10);
$pdf->Ln(10);
$pdf->Cell(12,15,'',0);
$pdf->MultiCell(170,8,"A continuación se presentan los datos referentes a los prestamos realizados de el equipo ".$r['NombreEquipo']." identificado internamente con numero de Activo Fijo ".$r['ActivoFijo'].", en este historico presentado se evidencia los prestamos realizados de este equipo con su fecha de prestamo, hora de prestamo y hora de devolucion tambien el nombre de a quien fue prestado tanto como su codigo de estudiante (Id).",0);
$pdf->Ln(10);
}
}
//Consulta
$sql='SELECT * FROM prestamo WHERE Equipo_ActivoFijo="'.$_SESSION['ActivoFijo'].'"';
$result=mysqli_query($link,$sql) or die ("ERROR en la Consulta $sql".mysqli_error($link));
$pdf->SetFont('Arial','',10);
$pdf->Cell(12,8,"  ",0);
$pdf->Cell(31,8,"Codigo Estudiante",1);
$pdf->Cell(55,8," Nombre Completo",1);
$pdf->Cell(30,8," Fecha Prestamo",1);
$pdf->Cell(30,8," Hora Devolucion",1);
$pdf->Cell(30,8," Hora Prestamo",1);
$pdf->Ln(8);
if($result->num_rows>0){
while($r=$result->fetch_array()){
$pdf->SetFont('Arial','',10);
  $pdf->Cell(12,8,"  ",0);
  $pdf->Cell(31,8,"".$r['CodigoEstudiante']."",0);
  $pdf->Cell(55,8,"".$r['NombreCompleto']."",0);
  $pdf->Cell(30,8,"".$r['Fecha']."",0);
  $pdf->Cell(30,8,"".$r['HoraPrestamo']."",0);
  $pdf->Cell(30,8,"".$r['HoraDevolucion']."",0);
  $pdf->Ln(8);
}
}else {
  $pdf->Cell(12,8,"  ",0);
  $pdf->Cell(178 ,8,"No se registran resultados  ",0);
}
$pdf->Output();
  ?>
