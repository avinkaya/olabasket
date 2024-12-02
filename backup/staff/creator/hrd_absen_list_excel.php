<?php
require_once 'includes/Classes/PHPExcel.php';
require_once 'includes/Classes/PHPExcel/IOFactory.php';
require_once '../page/dbase_conection.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel	->getProperties()
		->setCreator("copyright@Nov 2011 by hsbn89 www.lordnet.tk")
		->setLastModifiedBy("kavinkayu.com the factory garment of solo")
		->setTitle("Office 2007 XLSX Test Document")
		->setSubject("Office 2007 XLSX Test Document")
		->setDescription("Kontrak Kerja Produksi")
		->setKeywords("kavinkayu.com")
		->setCategory("kavin ICT");

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
		
SWITCH($_GET['v']){
case"listtanggal":
	$tanggal=$_GET['tanggal'];
	$bulan=$_GET['bulan'];
	$tahun=$_GET['tahun'];
	$bulannama=bulannama($bulan);
	$objPHPExcel	->setActiveSheetIndex(0)
        		->mergecells('A1:K1')   ->setCellValue('A1', 'PT. MULIA IMPEX')
			->mergecells('A2:K2')   ->setCellValue('A2', 'Jl. Raya Solo - Sragen Km. 9.5, Karanganyar')
			->mergecells('A3:K3')   ->setCellValue('A3', 'LAPORAN DAFTAR HADIR KARYAWAN')
			->setcellvalue('A5','Tanggal')
			->setcellvalue('C5',": $tanggal $bulannama $tahun")
			->setcellvalue('A7','NO')
			->setcellvalue('B7','NIK')
			->setcellvalue('C7','KARYAWAN')
			->setcellvalue('D7','JABATAN')
			->setcellvalue('E7','MASUK')
			->setcellvalue('F7','PULANG')
			->setcellvalue('G7','STATUS')
			->setcellvalue('H7','LEMBUR')
			->setcellvalue('I7','MAKAN')
			->setcellvalue('J7','GAJI')
			->setcellvalue('K7','TOTAL')
			;
        $sheet = $objPHPExcel->getActiveSheet();
	$sheet->getColumnDimension('A')->setWidth(5);
	$sheet->getColumnDimension('B')->setWidth(10);
	$sheet->getColumnDimension('C')->setWidth(25);
	$sheet->getColumnDimension('D')->setWidth(15);
	$sheet->getColumnDimension('E')->setWidth(13);
	$sheet->getColumnDimension('F')->setWidth(13);
	$sheet->getColumnDimension('G')->setWidth(13);
	$sheet->getColumnDimension('H')->setWidth(10);
	$sheet->getColumnDimension('I')->setWidth(10);
	$sheet->getColumnDimension('J')->setWidth(10);
	$sheet->getColumnDimension('K')->setWidth(10);
	
 	$dataq=mysql_query("SELECT*FROM hrd_staff_absen WHERE tanggal like '$tanggal' AND bulan like '$bulan' AND tahun like '$tahun' AND status like '1' ORDER by id DESC");
	$datan=mysql_num_rows($dataq);
	$sell=8;
	if($datan==0){
	        $objPHPExcel	->setActiveSheetIndex(0) ->setCellValue('A'.$sell, 'Belum ada data absen untuk hari ini');$sell++;
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

                                $objPHPExcel	->setActiveSheetIndex(0)
        					->setCellValue('A'.$sell, "$no")
						->setCellValue('B'.$sell, "$data[nik]")
						->setCellValue('C'.$sell, "$karyawan[nama]")
						->setcellvalue('D'.$sell, "$jabatan[subsubbagian]")
						->setcellvalue('E'.$sell, "$data[jammasuk] : $data[menitmasuk] : $data[detikmasuk]")
						->setcellvalue('F'.$sell, "$data[jamkeluar] : $data[menitkeluar] : $data[detikkeluar]")
						->setcellvalue('G'.$sell, "$jobstatus[status]")
						->setcellvalue('H'.$sell, "$data[uanglembur]")
						->setcellvalue('I'.$sell, "$data[uangmakan]")
						->setcellvalue('J'.$sell, "$data[uangkerja]")
						->setcellvalue('K'.$sell, "$data[gaji]")
						;$no++;$sell++;
			}
		}
		$objPHPExcel	->setActiveSheetIndex(0)
	        		->mergecells('A'.$sell.':I'.$sell)   ->setCellValue('A'.$sell, 'TOTAL GAJI')
				->mergecells('J'.$sell.':K'.$sell)   ->setCellValue('J'.$sell, $biayapegawai);
				
                $sheet = $objPHPExcel->getActiveSheet();
		$styleArray = array('font' => array('bold' => true));
			$sheet->getStyle('A1')->applyFromArray($styleArray);
			$sheet->getStyle('A2')->applyFromArray($styleArray);
			$sheet->getStyle('A3')->applyFromArray($styleArray);
			$sheet->getStyle('A7')->applyFromArray($styleArray);
			$sheet->getStyle('B7')->applyFromArray($styleArray);
			$sheet->getStyle('C7')->applyFromArray($styleArray);
			$sheet->getStyle('D7')->applyFromArray($styleArray);
			$sheet->getStyle('E7')->applyFromArray($styleArray);
			$sheet->getStyle('F7')->applyFromArray($styleArray);
			$sheet->getStyle('G7')->applyFromArray($styleArray);
			$sheet->getStyle('H7')->applyFromArray($styleArray);
			$sheet->getStyle('I7')->applyFromArray($styleArray);
			$sheet->getStyle('J7')->applyFromArray($styleArray);
			$sheet->getStyle('K7')->applyFromArray($styleArray);
			$sheet->getStyle('A'.$sell)->applyFromArray($styleArray);
			$sheet->getStyle('J'.$sell)->applyFromArray($styleArray);
                $styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT)));
		$cellending=$cell-1;$objPHPExcel->getActiveSheet()->getStyle('a7:K'.$sell)->applyFromArray($styleArray);
break;
}



$objPHPExcel->getActiveSheet()->setTitle("DH");
$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="www.kavinkayu.com_Daftar_Hadir_Karyawan.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
