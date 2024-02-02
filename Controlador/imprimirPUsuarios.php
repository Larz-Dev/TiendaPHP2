<?php
require("fpdf.php");
$pdf = new FPDF();
$pdf -> AddPage('L');
$pdf->SetFont('Arial', '', 10);





$id = $_POST['id'];







require_once '../Modelo/MySQL.PHP';
$mysql = new MySQL;
$mysql->conectar();
$consulta = $mysql->efectuarConsulta("SELECT Id_producto,Nombre_producto,Cantidad_producto,Imagen_producto,Estado_producto, usuarios.Correo_usuario
FROM  productos
            INNER JOIN usuarios ON productos.Id_usuario = usuarios.Id_usuario  where usuarios.Id_usuario = $id;");
$mysql->desconectar();





$pdf->Cell(10,15,"Id",1);
$pdf->Cell(70,15,"Producto",1);
$pdf->Cell(30,15,utf8_decode("Cantidad"),1);
$pdf->Cell(25,15,"Estado",1);
$pdf->Cell(80,15,"Importador",1);
$pdf->Cell(35,15,"Imagen",1);
$pdf->Ln();
for ($i = 0; $i < mysqli_num_rows($consulta); $i++) {
    $fila = mysqli_fetch_array($consulta);
  




    $pdf->Cell(10,20,$fila[0],1);
    $pdf->Cell(70,20,$fila[1],1);
    $pdf->Cell(30,20,$fila[2],1);
    $pdf->Cell(25,20,$fila[4],1);
    $pdf->Cell(80,20,$fila[5],1);
   
  
 
    if( str_contains($fila[3], 'https://') == false)
        {
        
          // echo __DIR__ . "/images/" . str_replace($fila[3],'./Controlador//images/',"") ;
        $dirimagen = __DIR__ . "/images/" . str_replace('./Controlador//images/',"",$fila[3]);
        
        }
        else {
            $dirimagen= $fila[3];
        }

    $pdf->Cell(35,20, $pdf->Image(   $dirimagen, $pdf->GetX(), $pdf->GetY(),30,20),1); 
    $pdf->Ln();

}
$pdf-> Output();


