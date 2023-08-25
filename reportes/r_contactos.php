<?php
require_once('../Libs/fpdf/fpdf.php');
require_once('../Modelo/cls_contacto.php');
$objc = new contacto();
$result = $objc->consultar('', $_POST['cod_persona']);
$pdf = new FPDF();

$pdf->AddPage();
$pdf->setFont('Arial', 'B', 28);
$pdf->SetXY(10, 10);
$pdf->Cell(190, 10, "Reporte de Contactos", 0, 0, 'C');
$pdf->SetFillColor(51, 116, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 15);
$pdf->SetXY(10, 20);
$pdf->Cell(10, 10, "N.-", 1, 0, 'C', 1);
$pdf->SetXY(20, 20);
$pdf->Cell(40, 10, "Nombre", 1, 0, 'C', 1);
$pdf->SetXY(60, 20);
$pdf->Cell(40, 10, "Apellido", 1, 0, 'C', 1);
$pdf->SetXY(100, 20);
$pdf->Cell(40, 10, "Teléfono", 1, 0, 'C', 1);
$pdf->SetXY(140, 20);
$pdf->Cell(60, 10, "Correo", 1, 0, 'C', 1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 10);
$y = 30;
$f = 1;

while ($row = $result->fetch_assoc()) {
    // ...
    $pdf->SetXY(10, $y);
    $pdf->Cell(10, 5, $f, 1, 0, 'C');
    $pdf->SetXY(20, $y);
    $pdf->Cell(40, 5, utf8_decode($row['nom_contacto']), 1, 0);
    $pdf->SetXY(60, $y);
    $pdf->Cell(40, 5, utf8_decode($row['ape_contacto']), 1, 0);
    $pdf->SetXY(100, $y);
    $pdf->Cell(40, 5, utf8_decode($row['tel_contacto']), 1, 0, 'C');
    $pdf->SetXY(140, $y);
    $pdf->Cell(60, 5, utf8_decode($row['correo_contacto']), 1, 1);
    $y += 5;
    $f++;
}

$pdf->Output('F', 'reporte_contacto.pdf');
$pdf->Output('I', 'reporte_contacto.pdf');

echo "reporte_contacto.pdf";
