<?php
require_once 'includes/Classes/PHPExcel.php';
require_once 'includes/Classes/PHPExcel/IOFactory.php';
$objPHPExcel = new PHPExcel();
$objPHPExcel	->getProperties()
		->setCreator("copyright@Nov 2011 by hsbn89 www.lordnet.tk")
		->setLastModifiedBy("kavinkayu.com the factory garment of solo")
		->setTitle("Office 2007 XLSX Test Document")
		->setSubject("Office 2007 XLSX Test Document")
		->setDescription("Kontrak Kerja Produksi")
		->setKeywords("kavinkayu.com")
		->setCategory("kavin ICT");

$objPHPExcel	->setActiveSheetIndex(0)
        	->setCellValue('A1', 'SA');

$objPHPExcel->getActiveSheet()->setTitle('Detail Kontrak Kerja');
$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="www.kavinkayu.com_kontrak_kerja.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
/*
------------------------------- Membuat Border ----------------------------------
$styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT)));
$objPHPExcel->getActiveSheet()->getStyle('A7:D15')->applyFromArray($styleArray);
unset($styleArray);

------------------------------- Membuat panjang cell ----------------------------
$sheet = $objPHPExcel->getActiveSheet();
 $sheet->getColumnDimension('A')->setWidth(15);
 $sheet->getColumnDimension('B')->setWidth(30);
 $sheet->getColumnDimension('C')->setWidth(45);

------------------------------- Membuat huruf tebal ----------------------------
$sheet = $objPHPExcel->getActiveSheet();
 $styleArray = array('font' => array('bold' => true));
 $sheet->getStyle('A1')->applyFromArray($styleArray);

*/


?>
