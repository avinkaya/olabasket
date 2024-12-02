<?php
require_once 'includes/Classes/PHPExcel.php';
require_once 'includes/Classes/PHPExcel/IOFactory.php';
require_once '../page/dbase_conection.php';
$id=$_GET['id'];
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
		->mergecells('a1:g1')
		->mergecells('a2:g2')
		->mergecells('a3:g3')
		->mergecells('f7:g7')
		->mergecells('f8:g8')
		->mergecells('f9:g9')
		->mergecells('f10:g10')
		->mergecells('f11:g11')
		->mergecells('f12:g12')
		->mergecells('f13:g13')
        	->setCellValue('a1', 'PT. MULIA IMPEX')
        	->setCellValue('a2', 'JL. RAYA SOLO - SRAGEN KM 9.5,KARANGANYAR')
        	->setCellValue('a3', 'KONTRAK KERJA PRODUKSI')
		->setCellValue('b7', 'Nomor')                   ->setCellValue('e7', 'PO.No')
		->setCellValue('b8', 'Tanggal')                 ->setCellValue('e8', 'T.No')
		->setCellValue('b9', 'C.M.T')                   ->setCellValue('e9', 'S.A.S')
		->setCellValue('b10', 'Item')                   ->setCellValue('e10', 'Brand')
		->setCellValue('b11', 'Fabric')                 ->setCellValue('e11', 'Tanggal Bahan')
		->setCellValue('b12', 'Quantity')               ->setCellValue('e12', 'Tanggal Selesai')
		->setCellValue('b13', 'Gramasi')                ->setCellValue('e13', 'Tanggal Pengiriman')
		->setCellValue('b14', 'Repeat')                 
		->setCellValue('a16', 'Detail Order')
		->setCellValue('a17', 'NO')                     
		->setCellValue('b17', 'STYLE BUYER')            
		->setCellValue('c17', 'STYLE STANDAR')       	
		->setCellValue('d17', 'COMBO')                  
		->setCellValue('e17', 'WARNA')                  
		->setCellValue('f17', 'SIZE')                   
		->setCellValue('g17', 'QUANTITY')               
;

$sheet = $objPHPExcel->getActiveSheet();
$sheet->getColumnDimension('A')->setWidth(5);
$sheet->getColumnDimension('B')->setWidth(15);
$sheet->getColumnDimension('C')->setWidth(18);
$sheet->getColumnDimension('E')->setWidth(18);

$sheet = $objPHPExcel->getActiveSheet();
$styleArray = array('font' => array('bold' => true));
$sheet->getStyle('A1')->applyFromArray($styleArray);
$sheet->getStyle('A2')->applyFromArray($styleArray);
$sheet->getStyle('A3')->applyFromArray($styleArray);
$sheet->getStyle('A17')->applyFromArray($styleArray);
$sheet->getStyle('B17')->applyFromArray($styleArray);
$sheet->getStyle('C17')->applyFromArray($styleArray);
$sheet->getStyle('D17')->applyFromArray($styleArray);
$sheet->getStyle('E17')->applyFromArray($styleArray);
$sheet->getStyle('F17')->applyFromArray($styleArray);
$sheet->getStyle('G17')->applyFromArray($styleArray);

$styleArray = array('borders' => array('allborders' => array('style' => PHPExcel_Style_Border::BORDER_DASHDOT)));
$objPHPExcel->getActiveSheet()->getStyle('A17:G18')->applyFromArray($styleArray);


$data=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$id' LIMIT 0,1"));
$objPHPExcel	->setActiveSheetIndex(0)
		->setCellValue('c7', ': '.$data['nomor'])                   					->setCellValue('f7', ': '.$data['pono'])
		->setCellValue('c8', ': '.$data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'])          	->setCellValue('f8', ': '.$data['tno'])
		->setCellValue('c9', ': '.$data['cmt'])                   					->setCellValue('f9', ': '.$data['sas'])
		->setCellValue('c10', ': '.$data['barang'])                   					->setCellValue('f11', ': '.$data['tanggalbahan'].'-'.$data['bulanbahan'].'-'.$data['tahunbahan'])
		->setCellValue('c11', ': '.$data['kain'])                 					->setCellValue('f12', ': '.$data['tanggalselesai'].'-'.$data['bulanselesai'].'-'.$data['tahunselesai'])
		->setCellValue('c12', ': '.$data['kuantitas'])                                                  ->setCellValue('f10', ': '.$data['merek'])
		->setCellValue('c13', ': '.$data['gramasi'])                                                    ->setCellValue('f13', ': '.$data['tanggalpengiriman'].'-'.$data['bulanpengiriman'].'-'.$data['tahunpengiriman'])
		->setCellValue('c14', ': '.$data['repeat'])
;
$cell=18;
$sizeq=mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$data[id]' AND status like '1' ORDER By idstylecom,idcombo,id Asc");
$sizen=mysql_num_rows($sizeq);
if($sizen==0){
        $objPHPExcel	->setActiveSheetIndex(0)
        		->mergecells('a'.$cell.':g'.$cell)
		       	->setCellValue('a'.$cell, 'Belum ada data');
        $objPHPExcel->getActiveSheet()->getStyle('a'.$cell.':g'.$cell)->applyFromArray($styleArray);
        $cell++;
}else{$no=1;$jumlah=0;
        WHILE($size=mysql_fetch_array($sizeq)){
       	$styleq=mysql_query("SELECT*FROM marketing_style WHERE id like '$size[idstylecom]' and status like '1' ORDER by id Asc");
        $comboq=mysql_query("SELECT*FROM marketing_combo WHERE id like '$size[idcombo]' AND status like '1' ORDER By id Asc");
        $stylen=mysql_num_rows($styleq);$combon=mysql_num_rows($comboq);
        $style=mysql_fetch_array($styleq);$combo=mysql_fetch_array($comboq);
        $jumlah=$jumlah+$size['kuantitas'];
        	$objPHPExcel	->setActiveSheetIndex(0)
		       		->setCellValue('a'.$cell, $no)
		       		->setCellValue('b'.$cell, $style[stylebuy])
		       		->setCellValue('c'.$cell, $style[stylecom])
		       		->setCellValue('d'.$cell, $combo[combo])
		       		->setCellValue('e'.$cell, $combo[warna])
		       		->setCellValue('f'.$cell, $size[ukuran])
		       		->setCellValue('g'.$cell, $size[kuantitas]);
	$no++;$cell++;
	}$cellending=$cell-1;$objPHPExcel->getActiveSheet()->getStyle('a18:g'.$cellending)->applyFromArray($styleArray);
}

$cell++; $objPHPExcel	->setActiveSheetIndex(0)->setCellValue('a'.$cell, 'Detail Accesories');
$cell++; $objPHPExcel	->setActiveSheetIndex(0)->setCellValue('a'.$cell, $data['accsesories']); $cell++;
$cell++; $objPHPExcel	->setActiveSheetIndex(0)->setCellValue('a'.$cell, 'Detail Sewing');
$cell++; $objPHPExcel	->setActiveSheetIndex(0)->setCellValue('a'.$cell, $data['sewing']); $cell++;
$cell++; $objPHPExcel	->setActiveSheetIndex(0)->setCellValue('a'.$cell, 'Detail Packing');
$cell++; $objPHPExcel	->setActiveSheetIndex(0)->setCellValue('a'.$cell, $data['packing']); $cell++;











unset($styleArray);
$objPHPExcel->getActiveSheet()->setTitle('Detail Kontrak Kerja');
$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="www.kavinkayu.com_kontrak_kerja.xls"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
exit;


?>
