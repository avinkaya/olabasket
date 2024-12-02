<?php
include ("includes/fpdf/fpdf.php");
include ("../page/dbase_conection.php");
class PDF extends FPDF{
 function Footer(){
     $this->SetY(20);
     $this->SetFont('Arial','I',8);
     $this->Cell(10,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }
}

$pdf = new FPDF('l','mm','Legal');
$pdf->AliasNbPages();
$pdf->Open();
$pdf->addPage();
$pdf->SetAuthor("Heri Siswanto Bayu Nugroho");
$pdf->setAutoPageBreak(true);
$pdf->SetMargins(5,4,3,4);
$pdf->setFont('Arial','B',12);
$pdf->PageNo();
$pdf->text(10,10,'PT. MULIA IMPEX');
$pdf->text(10,14,'GARMENT AND FURNITURE FACTORY');
$pdf->setFont('Arial','B',10);
$pdf->text(10,18,'Jl. Raya Solo - Sragen Km 9.5, Palur, Karanganyar');
$pdf->setFont('Arial','',10);
$pdf->text(10,22,'');
$pdf->text(10,26,'');

//-----------------------------------------------------------------------------------------






//-----------------------------------------------------------------------------------------
$pdf->output('Kartu_Kendali_Produksi.pdf','I');
?>
