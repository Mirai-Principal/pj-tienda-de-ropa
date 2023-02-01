<?php
require_once("plantilla.php");
require_once("../config/conexion.php");
$sql = "SELECT * from persona as a join personal as b on a.Id_Persona=b.Id_Persona where a.tipo_persona='personal' and a.Eliminado='no' ";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}

//include "../model/read.php"; aqui llama a la consulta de datos

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(190,10,'Empleados',1,0,'C');

$pdf->Ln();

$pdf->SetFont('Times', 'i', 12);


$pdf->Cell(10, 10, '#', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nombre y Apellido', 1, 0, 'C');
$pdf->Cell(40, 10, 'Teléfono', 1, 0, 'C');
$pdf->Cell(30, 10, 'Cédula', 1,0 , 'C');
$pdf->Cell(30, 10, 'Dirección', 1,0, 'C');
$pdf->Cell(40, 10, 'Correo', 1,1, 'C');


//aqui se muestra dos datos

foreach ($datos as $key => $fila){
$pdf->Cell(10,10, $key + 1,1,0, 'C');
$pdf->Cell(40,10, $fila['Nombre'].$fila['Apellido'],1,0, 'C');
$pdf->Cell(40,10, $fila['Telefono_persona'],1,0, 'C');
$pdf->Cell(30,10,$fila['Cedula'],1,0, 'C');
$pdf->Cell(30,10, $fila['Direccion'],1,0, 'C');
$pdf->Cell(40,10, $fila['Correo'],1,1, 'C');

}

$pdf->Output('i', 'rep.pdf');
?>