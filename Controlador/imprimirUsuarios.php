<?php
require("fpdf.php");
$pdf = new FPDF();
$pdf -> AddPage('L');
$pdf->SetFont('Arial', '', 10);




require_once '../Modelo/MySQL.PHP';
$mysql = new MySQL;
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("select * from usuarios where Estado_usuario = 1;");
$mysql->desconectar();


$pdf->Cell(10,9,"Id",1);
$pdf->Cell(70,9,"Correo",1);
$pdf->Cell(170,9,utf8_decode("Contraseña"),1);
$pdf->Cell(15,9,"Estado",1);


$pdf->Ln();
for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
    $fila = mysqli_fetch_array($consulta);
  
    $pdf->Cell(10,9,$fila[0],1);
    $pdf->Cell(70,9,$fila[1],1);
    $pdf->Cell(170,9,$fila[2],1);
    $pdf->Cell(15,9,$fila[3],1);

    $pdf->Ln();

}
$pdf-> Output();


?>


