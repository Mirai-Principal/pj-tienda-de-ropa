<?php
require_once("plantilla.php");
require_once("../config/conexion.php");
$sql = "SELECT * from cuenta_bancaria where Eliminado = 'no'";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
// array_push($datos, $fila);
$datos[] = $fila;
}

//include "../model/read.php"; aqui llama a la consulta de datos

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(180,10,'Cuentas Bancarias',1,0,'C');

$pdf->Ln();

$pdf->SetFont('Times', 'i', 12);

$pdf->Cell(45, 10, '#', 1, 0, 'C');
$pdf->Cell(45, 10, 'Banco ', 1, 0, 'C');
$pdf->Cell(45, 10, 'Número de Cuenta', 1, 0, 'C');
$pdf->Cell(45, 10, 'Tipo de Cuenta ', 1, 1, 'C');

//aqui se muestra dos datos

foreach ($datos as $key => $fila){
$pdf->Cell(45,10, $key + 1,1,0, 'C');
$pdf->Cell(45,10, $fila['Banco'],1,0, 'C');
$pdf->Cell(45,10, $fila['Num_Cuenta'],1,0, 'C');
$pdf->Cell(45,10, $fila['tipo_cuenta'],1,1, 'C');
}

$pdf->Output('i', 'rep.pdf');
?>