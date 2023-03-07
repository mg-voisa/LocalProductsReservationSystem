<?php

define('FPDF_FONTPATH','font/');
require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello friend!');
$pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');
$pdf->Output();
?>