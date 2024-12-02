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
function bulannama($mont){
	switch($mont){
	case"1":$hasil="Januari";break;
	case"2":$hasil="Februari";break;
	case"3":$hasil="Maret";break;
	case"4":$hasil="April";break;
	case"5":$hasil="Mei";break;
	case"6":$hasil="Juni";break;
	case"7":$hasil="Juli";break;
	case"8":$hasil="Agustus";break;
	case"9":$hasil="September";break;
	case"10":$hasil="Oktober";break;
	case"11":$hasil="November";break;
	case"12":$hasil="Desember";break;
	}return $hasil;
}
function num($d){
    if(strlen($d)==1){$hasil="0$d";}
    elseif(strlen($d)==2){$hasil="$d";}
    return $hasil;
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
case"listtanggal":
	$tanggal=$_GET['tanggal'];
	$bulan=$_GET['bulan'];
	$tahun=$_GET['tahun'];
	$bulannama=bulannama($bulan);
	$no=1;
	$title="Absen_1101";
	
        $pdf->setFont('Arial','B',10);
	$pdf->text(70,28,'LAPORAN DAFTAR HADIR KARYAWAN');
        $pdf->setXY(140,10);
	$pdf->CELL(20,8,"TGL",1,1,'C',0);
	$pdf->setXY(160,10);
	$pdf->CELL(42,8,"$tanggal $bulannama $tahun ",1,1,'C',0);
	$pdf->setFont('Arial','',8);
	$pdf->setXY(10,35);$pdf->CELL(5,5,"NO",1,1,'C',0);
	$pdf->setXY(15,35);$pdf->CELL(15,5,"NIK",1,1,'C',0);
	$pdf->setXY(30,35);$pdf->CELL(40,5,"KARYAWAN",1,1,'C',0);
	$pdf->setXY(70,35);$pdf->CELL(25,5,"JABATAN",1,1,'C',0);
	$pdf->setXY(95,35);$pdf->CELL(15,5,"MASUK",1,1,'C',0);
	$pdf->setXY(110,35);$pdf->CELL(15,5,"PULANG",1,1,'C',0);
	$pdf->setXY(125,35);$pdf->CELL(15,5,"STATUS",1,1,'C',0);
	$pdf->setXY(140,35);$pdf->CELL(13,5,"LEMBUR",1,1,'C',0);
	$pdf->setXY(153,35);$pdf->CELL(13,5,"MAKAN",1,1,'C',0);
	$pdf->setXY(166,35);$pdf->CELL(13,5,"GAJI",1,1,'C',0);
	$pdf->setXY(179,35);$pdf->CELL(15,5,"TOTAL",1,1,'C',0);
	$pdf->setFont('Arial','',7);
	$dataq=mysql_query("SELECT*FROM hrd_staff_absen WHERE tanggal like '$tanggal' AND bulan like '$bulan' AND tahun like '$tahun' AND status like '1' ORDER by id DESC");
	$datan=mysql_num_rows($dataq);
	$sell=40;
	if($datan==0){
	        $pdf->setXY(10,$sell);$pdf->CELL(184,5,"Belum ada data kehadiran pada hari ini..",1,1,'C',0);$sell=$sell+5;
	}else{
		        $no=1;$biayapegawai=0;
			WHILE($data=mysql_fetch_array($dataq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' AND status like '1'"));
			        $jobstatus=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobstatus WHERE id like '$karyawan[jobstatus]' LIMIT 0,1"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$karyawan[subsubbagian]' LIMIT 0,1"));
			        $karyawan[nama]=strtolower($karyawan[nama]);
                                $biayapegawai=$data['gaji']+$biayapegawai;
			        $data['jammasuk']=num($data['jammasuk']);
			        $data['menitmasuk']=num($data['menitmasuk']);
			        $data['detikmasuk']=num($data['detikmasuk']);
			        $data['jamkeluar']=num($data['jamkeluar']);
			        $data['menitkeluar']=num($data['menitkeluar']);
			        $data['detikkeluar']=num($data['detikkeluar']);
                                
                                $pdf->setXY(10,$sell);$pdf->CELL(5,5,"$no",1,1,'C',0);
				$pdf->setXY(15,$sell);$pdf->CELL(15,5,"$data[nik]",1,1,'C',0);
				$pdf->setXY(30,$sell);$pdf->CELL(40,5,"$karyawan[nama]",1,1,'',0);
				$pdf->setXY(70,$sell);$pdf->CELL(25,5,"$jabatan[subsubbagian]",1,1,'',0);
				$pdf->setXY(95,$sell);$pdf->CELL(15,5,"$data[jammasuk] : $data[menitmasuk] : $data[detikmasuk]",1,1,'C',0);
				$pdf->setXY(110,$sell);$pdf->CELL(15,5,"$data[jamkeluar] : $data[menitkeluar] : $data[detikkeluar]",1,1,'C',0);
				$pdf->setXY(125,$sell);$pdf->CELL(15,5,"$jobstatus[status]",1,1,'',0);
				$pdf->setXY(140,$sell);$pdf->CELL(13,5,"$data[uanglembur],-",1,1,'R',0);
				$pdf->setXY(153,$sell);$pdf->CELL(13,5,"$data[uangmakan],-",1,1,'R',0);
				$pdf->setXY(166,$sell);$pdf->CELL(13,5,"$data[uangkerja],-",1,1,'R',0);
				$pdf->setXY(179,$sell);$pdf->CELL(15,5,"$data[gaji],-",1,1,'R',0);
				$no++;$sell=$sell+5;
			}
		}
		$pdf->setFont('Arial','B',10);
		$pdf->setXY(10,$sell);$pdf->CELL(156,7,"TOTAL GAJI",1,1,'R',0);
		$pdf->setXY(166,$sell);$pdf->CELL(28,7,"Rp. $biayapegawai,-",1,1,'R',0);
break;

case"listbulan":
break;

case"listtahun":
break;
}
//-----------------------------------------------------------------------------------------
$pdf->output("$title",'I');
?>
