<?php
session_start();
include("../page/dbase_conection.php");
require_once 'includes/Classes/PHPExcel.php';
require_once 'includes/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel	->getProperties()
		->setCreator("copyright@Nov 2011 by hsbn89 www.lordnet.tk")
		->setLastModifiedBy("kavinkayu.com the factory garment of solo")
		->setTitle("Office 2007 XLSX Test Document")
		->setSubject("Office 2007 XLSX Test Document")
		->setDescription("Laporan Produksi")
		->setKeywords("kavinkayu.com")
		->setCategory("Kavin ICT");

//-----------------------------------------------------------------------------------------
SWITCH($_GET['v']){
Case"cetakexcelcombo":
	$style=$_GET['style'];
	$combos=$_GET['combos'];
	$no=1;
        $stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	$comboo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$combos'"));
        $kontrak=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$stylee[idkk]' AND status like '1'"));
        
        $objPHPExcel	->setActiveSheetIndex(0)
                        ->mergecells('a1:g1')
			->mergecells('a2:g2')
			->mergecells('a3:g3')
       			->setCellValue('A1', 'PT. MULIA IMPEX')
       			->setCellValue('A2', 'Jl. Raya Solo - Sragen Km. 9.5, Karanganyar')
       			->setCellValue('A3', 'DAFTAR KARYAWAN PELAKSANA ORDER')
       			->setCellValue('A5', 'Kontrak Kerja')
       			->setCellValue('A6', 'Brand')
       			->setCellValue('A7', 'Kode Style')
       			->setCellValue('A8', 'Combo')
       			->setCellValue('A9', 'Size')
       			->setCellValue('C5', ': '.$kontrak['nomor'])
       			->setCellValue('C6', ': '.$kontrak['merek'])
       			->setCellValue('C7', ': '.$stylee['stylecom'])
       			->setCellValue('C8', ': Combo '.$comboo['combo'].' / '.$comboo['warna'])
       			->setCellValue('C9', ': Semua ukuran')
       			->setCellValue('A11', 'Daftar karyawan yang ditugaskan memproduksi style diatas adalah sebagai berikut :')
       			->setCellValue('A12', 'NO')
       			->setCellValue('B12', 'NIK')
       			->setCellValue('C12', 'KARYAWAN')
       			->setCellValue('D12', 'JABATAN')
       			->setCellValue('E12', 'SIZE')
       			->setCellValue('F12', 'PROSES')
       			->setCellValue('G12', 'KET')
       			->setCellValue('G10', "=1+1")
       			;
	$sheet = $objPHPExcel->getActiveSheet();
	$sheet->getColumnDimension('A')->setWidth(5);
	$sheet->getColumnDimension('B')->setWidth(10);
	$sheet->getColumnDimension('C')->setWidth(40);
	$sheet->getColumnDimension('D')->setWidth(15);
	$sheet->getColumnDimension('E')->setWidth(10);
	$sheet->getColumnDimension('F')->setWidth(15);
	$sheet->getColumnDimension('G')->setWidth(20);
	
	$sheet = $objPHPExcel->getActiveSheet();
	$styleArray = array('font' => array('bold' => true));
	$sheet->getStyle('A1')->applyFromArray($styleArray);
	$sheet->getStyle('A2')->applyFromArray($styleArray);
	$sheet->getStyle('A3')->applyFromArray($styleArray);
	$sheet->getStyle('A12')->applyFromArray($styleArray);
	$sheet->getStyle('B12')->applyFromArray($styleArray);
	$sheet->getStyle('C12')->applyFromArray($styleArray);
	$sheet->getStyle('D12')->applyFromArray($styleArray);
	$sheet->getStyle('E12')->applyFromArray($styleArray);
	$sheet->getStyle('F12')->applyFromArray($styleArray);
	$sheet->getStyle('G12')->applyFromArray($styleArray);
	
        $dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$style' AND idcombo like '$combos' AND status like '1' Order by idstylecom,idsize,idproses,id Asc");
	$datan=mysql_num_rows($dataq);
	if($datan==0){

	}else{
		$cell=13;
		WHILE($data=mysql_fetch_array($dataq)){
			$staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			$jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			$size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			$proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[idproses]'"));
			$staff[nama]=strtoupper($staff['nama']);

			$objPHPExcel	->setActiveSheetIndex(0)
			                ->setCellValue('A'.$cell, $no)
       					->setCellValue('B'.$cell, $data['nik'])
		       			->setCellValue('C'.$cell, $staff['nama'])
       					->setCellValue('D'.$cell, $jabatan['subsubbagian'])
		       			->setCellValue('E'.$cell, $size['ukuran'])
       					->setCellValue('F'.$cell, $proses['item'])
		       			->setCellValue('G'.$cell, '-')
       			;
				$no++;$cell++;
			}
			$styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT)));
			$cellending=$cell-1;$objPHPExcel->getActiveSheet()->getStyle('a12:g'.$cellending)->applyFromArray($styleArray);
		}
		$objPHPExcel->getActiveSheet()->getStyle('a'.$cell.':g'.$cell)->applyFromArray($styleArray);
		$objPHPExcel	->setActiveSheetIndex(0)
				->mergecells('A'.$cell.':F'.$cell)
		                ->setCellValue('A'.$cell, 'JUMLAH PEKERJA')
	       			->setCellValue('G'.$cell, $datan.' orang');
break;

Case"cetakexcelsize":
	$style=$_GET['style'];
	$combos=$_GET['combos'];
	$size=$_GET['size'];
        $stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	$comboo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$combos'"));
        $kontrak=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$stylee[idkk]' AND status like '1'"));
        $sizee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$size'"));

        $objPHPExcel	->setActiveSheetIndex(0)
                        ->mergecells('a1:g1')
			->mergecells('a2:g2')
			->mergecells('a3:g3')
       			->setCellValue('A1', 'PT. MULIA IMPEX')
       			->setCellValue('A2', 'Jl. Raya Solo - Sragen Km. 9.5, Karanganyar')
       			->setCellValue('A3', 'DAFTAR KARYAWAN PELAKSANA ORDER')
       			->setCellValue('A5', 'Kontrak Kerja')
       			->setCellValue('A6', 'Brand')
       			->setCellValue('A7', 'Kode Style')
       			->setCellValue('A8', 'Combo')
       			->setCellValue('A9', 'Size')
       			->setCellValue('C5', ': '.$kontrak['nomor'])
       			->setCellValue('C6', ': '.$kontrak['merek'])
       			->setCellValue('C7', ': '.$stylee['stylecom'])
       			->setCellValue('C8', ': Combo '.$comboo['combo'].' / '.$comboo['warna'])
       			->setCellValue('C9', ': '.$sizee['ukuran'])
       			->setCellValue('A11', 'Daftar karyawan yang ditugaskan memproduksi style diatas adalah sebagai berikut :')
       			->setCellValue('A12', 'NO')
       			->setCellValue('B12', 'NIK')
       			->setCellValue('C12', 'KARYAWAN')
       			->setCellValue('D12', 'JABATAN')
       			->setCellValue('E12', 'PROSES')
       			->setCellValue('F12', 'KET')
       			;
	$sheet = $objPHPExcel->getActiveSheet();
	$sheet->getColumnDimension('A')->setWidth(5);
	$sheet->getColumnDimension('B')->setWidth(10);
	$sheet->getColumnDimension('C')->setWidth(40);
	$sheet->getColumnDimension('D')->setWidth(15);
	$sheet->getColumnDimension('E')->setWidth(20);
	$sheet->getColumnDimension('F')->setWidth(15);

	$sheet = $objPHPExcel->getActiveSheet();
	$styleArray = array('font' => array('bold' => true));
	$sheet->getStyle('A1')->applyFromArray($styleArray);
	$sheet->getStyle('A2')->applyFromArray($styleArray);
	$sheet->getStyle('A3')->applyFromArray($styleArray);
	$sheet->getStyle('A12')->applyFromArray($styleArray);
	$sheet->getStyle('B12')->applyFromArray($styleArray);
	$sheet->getStyle('C12')->applyFromArray($styleArray);
	$sheet->getStyle('D12')->applyFromArray($styleArray);
	$sheet->getStyle('E12')->applyFromArray($styleArray);
	$sheet->getStyle('F12')->applyFromArray($styleArray);

		$no=1;$cell=13;
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$style' AND idcombo like '$combos' AND idsize like '$size' AND status like '1' Order by idstylecom,idsize,idproses,id Asc");
		$datan=mysql_num_rows($dataq);
		if($datan==0){

		}else{
			WHILE($data=mysql_fetch_array($dataq)){
			        $staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[idproses]'"));
			        $staff[nama]=strtoupper($staff['nama']);

				$objPHPExcel	->setActiveSheetIndex(0)
			        	        ->setCellValue('A'.$cell, $no)
       						->setCellValue('B'.$cell, $data['nik'])
			       			->setCellValue('C'.$cell, $staff['nama'])
       						->setCellValue('D'.$cell, $jabatan['subsubbagian'])
       						->setCellValue('E'.$cell, $proses['item'])
		       				->setCellValue('F'.$cell, '-')
       				;
				$no++;$cell++;
			}
			$styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT)));
			$cellending=$cell-1;$objPHPExcel->getActiveSheet()->getStyle('a12:F'.$cellending)->applyFromArray($styleArray);
		}
	$objPHPExcel	->getActiveSheet()->getStyle('A'.$cell.':F'.$cell)->applyFromArray($styleArray);
	$objPHPExcel	->setActiveSheetIndex(0)
			->mergecells('A'.$cell.':E'.$cell)
		        ->setCellValue('A'.$cell, 'JUMLAH PEKERJA')
	       		->setCellValue('F'.$cell, $datan.' orang');

break;

Case"cetakexcelproses":
	$style=$_GET['style'];
	$proses=$_GET['proses'];
        $stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	$prosess=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$proses'"));
        $kontrak=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$stylee[idkk]' AND status like '1'"));
        $objPHPExcel	->setActiveSheetIndex(0)
                        ->mergecells('a1:g1')
			->mergecells('a2:g2')
			->mergecells('a3:g3')
       			->setCellValue('A1', 'PT. MULIA IMPEX')
       			->setCellValue('A2', 'Jl. Raya Solo - Sragen Km. 9.5, Karanganyar')
       			->setCellValue('A3', 'DAFTAR KARYAWAN PELAKSANA ORDER')
       			->setCellValue('A5', 'Kontrak Kerja')
       			->setCellValue('A6', 'Brand')
       			->setCellValue('A7', 'Kode Style')
       			->setCellValue('A8', 'Proses')
       			->setCellValue('C5', ': '.$kontrak['nomor'])
       			->setCellValue('C6', ': '.$kontrak['merek'])
       			->setCellValue('C7', ': '.$stylee['stylecom'])
       			->setCellValue('C8', ': '.$prosess['item'])
       			->setCellValue('A11', 'Daftar karyawan yang ditugaskan memproduksi style diatas adalah sebagai berikut :')
       			->setCellValue('A12', 'NO')
       			->setCellValue('B12', 'NIK')
       			->setCellValue('C12', 'KARYAWAN')
       			->setCellValue('D12', 'JABATAN')
       			->setCellValue('E12', 'COMBO')
       			->setCellValue('F12', 'SIZE')
       			->setCellValue('G12', 'KET')

       			;
	$sheet = $objPHPExcel->getActiveSheet();
	$sheet->getColumnDimension('A')->setWidth(5);
	$sheet->getColumnDimension('B')->setWidth(10);
	$sheet->getColumnDimension('C')->setWidth(40);
	$sheet->getColumnDimension('D')->setWidth(15);
	$sheet->getColumnDimension('E')->setWidth(20);
	$sheet->getColumnDimension('F')->setWidth(15);
	$sheet->getColumnDimension('G')->setWidth(15);

	$sheet = $objPHPExcel->getActiveSheet();
	$styleArray = array('font' => array('bold' => true));
	$sheet->getStyle('A1')->applyFromArray($styleArray);
	$sheet->getStyle('A2')->applyFromArray($styleArray);
	$sheet->getStyle('A3')->applyFromArray($styleArray);
	$sheet->getStyle('A12')->applyFromArray($styleArray);
	$sheet->getStyle('B12')->applyFromArray($styleArray);
	$sheet->getStyle('C12')->applyFromArray($styleArray);
	$sheet->getStyle('D12')->applyFromArray($styleArray);
	$sheet->getStyle('E12')->applyFromArray($styleArray);
	$sheet->getStyle('F12')->applyFromArray($styleArray);
	$sheet->getStyle('G12')->applyFromArray($styleArray);
	
	
	$no=1;$cell=13;
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$style' AND idproses like '$proses' AND status like '1' Order by idstylecom,idsize,idproses,id Asc");
		$datan=mysql_num_rows($dataq);
		if($datan==0){

		}else{
			WHILE($data=mysql_fetch_array($dataq)){
			        $staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			        $combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$data[idcombo]'"));
			        $staff[nama]=strtoupper($staff['nama']);

                                $objPHPExcel	->setActiveSheetIndex(0)
			        	        ->setCellValue('A'.$cell, $no)
       						->setCellValue('B'.$cell, $data['nik'])
			       			->setCellValue('C'.$cell, $staff['nama'])
       						->setCellValue('D'.$cell, $jabatan['subsubbagian'])
       						->setCellValue('E'.$cell, 'Combo '.$combo['combo'].' / '.$combo['warna'])
		       				->setCellValue('F'.$cell, $size['ukuran'])
		       				->setCellValue('G'.$cell, '-')
       				;$no++;$cell++;
			}
		$styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT)));
		$cellending=$cell-1;$objPHPExcel->getActiveSheet()->getStyle('a12:G'.$cellending)->applyFromArray($styleArray);
		}
	$objPHPExcel	->getActiveSheet()->getStyle('A'.$cell.':G'.$cell)->applyFromArray($styleArray);
	$objPHPExcel	->setActiveSheetIndex(0)
			->mergecells('A'.$cell.':F'.$cell)
		        ->setCellValue('A'.$cell, 'JUMLAH PEKERJA')
	       		->setCellValue('G'.$cell, $datan.' orang');
		

break;
}





//----------------------------------------------------------------------------------------
$objPHPExcel->getActiveSheet()->setTitle("PO $style_$combo");
$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="www.kavinkayu.com_Karyawan_Order.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
