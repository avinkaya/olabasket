<?php
include ("includes/fpdf/fpdf.php");
require( 'includes/fpdf/code39.php' );
include ("../page/dbase_conection.php");
class PDF extends FPDF{
 function Footer(){
     $this->SetY(20);
     $this->SetFont('Arial','I',8);
     $this->Cell(10,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }
}

$pdf = new FPDF('P','mm','Legal');
$pdf =new PDF_Code39 ();
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
//$pdf->Image('../images/logo.GIF',10,5,20);

//-----------------------------------------------------------------------------------------
SWITCH($_GET['v']){
case"cetakexcelpritilan";
	$idstyle=$_GET['style'];
        $style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE status like '1' AND id like '$idstyle'"));
	$kontrak=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$style[idkk]' AND status like '1' ORDER by id Desc"));
	

	$title="KKP_1101";
        $pdf->setFont('Arial','B',10);
	$pdf->text(70,28,'KARTU KENDALI PRODUKSI ( PRITILAN )');
        $pdf->setXY(140,10);
	$pdf->CELL(20,8,"STYLE",1,1,'C',0);
	$pdf->setXY(160,10);
	$pdf->CELL(42,8,"$style[stylecom]",1,1,'C',0);
	$pdf->setFont('Arial','',6);
	$pdf->text(140,21,"$kontrak[merek]");
	$line=31;
	$no=0;

        $no=1;$harga=0;
	$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$idstyle' AND status like '1' Order by id Asc");
	$prosesn=mysql_num_rows($prosesq);
	if($prosesn==0){
	        $pdf->setFont('Arial','',11);
		$pdf->setFillColor(black);
		$pdf->setXY(10,$line);
		$pdf->CELL(191,17,'Belum ada data proses kerja untuk style ini',1,1,'C',0);
	}else{
		WHILE($proses=mysql_fetch_array($prosesq)){
		        $proses[item]=strtoupper($proses[item]);
		        $pdf->setFont('Arial','',11);
			$pdf->setFillColor(black);
			$pdf->setXY(10,$line);
			$pdf->CELL(50,17,'',1,1,'C',0);
			$pdf->Code39( 12 , $line+1,"$proses[code]" , 1.1 , 10);
			$pdf->setXY(60,$line);
			$pdf->CELL(40,5,'Nama & NIK Karyawan',1,1,'C',0);
			$pdf->setXY(60,$line+5);
			$pdf->CELL(40,12,'',1,1,'C',0);
			$pdf->setXY(100,$line);
			$pdf->CELL(60,10,"$proses[item] ( $proses[code] )",1,1,'C',0);
			$pdf->setXY(100,$line+10);
			$pdf->CELL(10,7,'Style',1,1,'C',0);
			$pdf->setXY(110,$line+10);
			$pdf->CELL(20,7,"$style[stylecom]",1,1,'C',0);
			$pdf->setXY(130,$line+10);
			$pdf->CELL(10,7,'Banyak',1,1,'C',0);
			$pdf->setXY(140,$line+10);
			$pdf->CELL(20,7,"10",1,1,'C',0);
			$pdf->setXY(160,$line);
			$pdf->CELL(10,5,'Ikatan',1,1,'C',0);
			$pdf->setXY(160,$line+5);
			$pdf->CELL(10,12,'',1,1,'C',0);
			$pdf->setXY(170,$line);
			$pdf->CELL(10,5,'CODE',1,1,'C',0);
			$pdf->setXY(170,$line+5);
			$pdf->CELL(10,12,"$proses[code]",1,1,'C',0);
			$pdf->setXY(180,$line);
			$pdf->CELL(10,5,'NIK',1,1,'C',0);
			$pdf->setXY(180,$line+5);
			$pdf->CELL(10,12,'',1,1,'C',0);
			$pdf->setXY(190,$line);
			$pdf->CELL(10,5,'Ikatan',1,1,'C',0);
			$pdf->setXY(190,$line+5);
			$pdf->CELL(10,12,'',1,1,'C',0);
	  		if($line>=250){$line=10;$pdf->addPage();}else{$line=$line+18;}
  			$no++;
	}}
break;
}
//-----------------------------------------------------------------------------------------
$pdf->output("$title",'I');
?>
