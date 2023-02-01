<?php
require_once("plantilla.php");
require_once("../config/conexion.php");
$sql = "SELECT * from persona as a join clientes as b on a.Id_Persona =b.Id_Persona join empresa as c on c.Id_Cliente=b.Id_Cliente where a.tipo_persona='clientes' and a.Eliminado='no' ";
$res = mysqli_query($conexion, $sql);
$datos = array();
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}

$sql = "SELECT * from persona as a join clientes as b on a.Id_Persona =b.Id_Persona join persona_natural as c on c.Id_Cliente=b.Id_Cliente where a.tipo_persona='clientes' and a.Eliminado='no' ";
$res = mysqli_query($conexion, $sql);
while ($fila = mysqli_fetch_assoc($res)) {
    $datos[] = $fila;
}

//include "../model/read.php"; aqui llama a la consulta de datos

// Creación del objeto de la clase heredada

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Cell(190,10,'Clientes',1,0,'C');

$pdf->Ln();

$pdf->SetFont('Times', 'i', 12);

$pdf->Cell(10, 10, '#', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nombre y Apellido', 1, 0, 'C');
$pdf->Cell(35, 10, 'Teléfono', 1, 0, 'C');
$pdf->Cell(35, 10, 'Tipo', 1, 0, 'C');
$pdf->Cell(30, 10, 'Cédula/Ruc', 1,0 , 'C');
$pdf->Cell(40, 10, 'Correo', 1,1, 'C');


//aqui se muestra dos datos
$r=0;
foreach ($datos as $key => $fila){
$pdf->Cell(10,10, $key + 1,1,0, 'C');
$pdf->Cell(40,10, $fila['Nombre'].$fila['Apellido'],1,0, 'C');
$pdf->Cell(35,10, $fila['Telefono_persona'],1,0, 'C');
$pdf->Cell(35,10, $fila['tipo_cliente'],1,0, 'C');
if($fila['tipo_cliente'] == 'Empresa'){$r= $fila['ruc'];}else{$r= $fila['Cedula'];}
$pdf->Cell(30,10,$r,1,0, 'C');
$pdf->Cell(40,10, $fila['Correo'],1,1, 'C');

}

$pdf->Output('i', 'rep.pdf');
?>