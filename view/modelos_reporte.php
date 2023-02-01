<?php
require_once("plantilla.php");
//include "../model/read.php"; aqui llama a la consulta de datos
require_once("../config/conexion.php");
//get talla
$sql = "SELECT * from modelos where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
$datos[] = $fila;
}
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(185,10,'Modelos',1,0,'C');

$pdf->Ln();

$pdf->SetFont('Times', 'i', 12);

$pdf->Cell(10, 10, '#', 1, 0, 'C');
$pdf->Cell(40, 10, 'Modelos', 1, 0, 'C');
$pdf->Cell(55, 10, 'Imagen', 1, 0, 'C');
$pdf->Cell(40, 10, 'Stock', 1, 0, 'C');
$pdf->Cell(40, 10, 'Precio', 1, 1, 'C');

//aqui se muestra dos datos

foreach ($datos as $key => $fila){
$pdf->Cell(10,30, $key + 1,1,0, 'C');
$pdf->Cell(40,30, $fila['Des_Modelo'],1,0, 'C');
$pdf->Cell(55,30,$pdf->Image(PATH_FILES.'productos/'.$fila['Img_Modelo'],$pdf->GetX()+10, $pdf->GetY(),30,25),1,0,'C');
$pdf->Cell(40,30, $fila['Stock'],1,0, 'C');
$pdf->Cell(40,30, $fila['Precio'],1,1, 'C');
}

$pdf->Output('i', 'rep.pdf');