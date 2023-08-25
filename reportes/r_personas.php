<?php
require_once('../Libs/fpdf/fpdf.php');
require_once('../Modelo/cls_persona.php');
$objp = new persona();
$result = $objp->consultar('');
$pdf = new FPDF();

$pdf->AddPage();
$pdf->setFont('Arial', 'B', 28);
$pdf->SetXY(10, 10);
$pdf->Cell(190, 10, "Reporte de Personas", 0, 0, 'C');
$pdf->SetFillColor(200, 40, 50);
$pdf->SetTextColor(255, 255, 255);

$pdf->SetFont('Arial', 'B', 15);
$pdf->SetXY(10, 20);
$pdf->Cell(10, 10, "N.-", 1, 0, 'C', 1);
$pdf->SetXY(20, 20);
$pdf->Cell(70, 10, "Apellido", 1, 0, 'C', 1); // Ajuste de ancho
$pdf->SetXY(90, 20);
$pdf->Cell(70, 10, "Nombre", 1, 0, 'C', 1); // Ajuste de ancho
$pdf->SetXY(160, 20);
$pdf->Cell(30, 10, utf8_decode("Cédula"), 1, 0, 'C', 1);

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', 'B', 10);
$y = 30;
$f = 1;

while ($row = $result->fetch_assoc()) {
    $pdf->SetXY(10, $y);
    $pdf->Cell(10, 5, $f, 1, 0, 'C');
    $pdf->SetXY(20, $y);
    $pdf->Cell(70, 5, utf8_decode($row['ape_persona']), 1, 0); // Ajuste de ancho
    $pdf->SetXY(90, $y);
    $pdf->Cell(70, 5, utf8_decode($row['nom_persona']), 1, 0); // Ajuste de ancho
    $pdf->SetXY(160, $y);
    $pdf->Cell(30, 5, utf8_decode($row['ci_persona']), 1, 1, 'C');
    $y += 5;
    $f++;
}

$pdf->Output('F', 'reporte.pdf');
$pdf->Output('I', 'reporte.pdf');

echo "reporte.pdf";
