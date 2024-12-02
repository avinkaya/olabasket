<?PHP
echo "ada";
?>
//fungsi str to title
function strtotitle($title) {
	$title = strtolower($title);
	$smallwordsarray = array('of','the','and','an','or','nor','but','is','if','then','else','when', 'at','from','by','on','off','for','in','out','over','to','into','with');
	$words = explode(' ', $title);
		foreach ($words as $key => $word) {
		if ($key == 0 or !in_array($word, $smallwordsarray)) $words[$key] = ucwords($word);
	}
	$title = implode(' ', $words);
	return $title;
}
function xml($nim)
	{
	
		$url='http://akademik.unnes.ac.id/cek_xml.php?n='.$nim;
		$parent='ceking';
		$xml = "";
		$f = fopen( $url, 'r' );
		while( $data = fread( $f, 4096 ) ) { $xml .= $data; }
		if (empty($xml)) {
   

     fclose( $f );
    }
		 else{
      fclose( $f );
		preg_match_all( "/<ceking>(.*?)<\/ceking\>/s", $xml, $bookblocks );
	
		foreach( $bookblocks[1] as $block )
			{
			preg_match_all( "/<nim>(.*?)<\/nim>/", $block, $nim );//1
			preg_match_all( "/<nama>(.*?)<\/nama>/", $block, $nama );//2
			preg_match_all( "/<prodi>(.*?)<\/prodi>/", $block, $prodi );#3
			preg_match_all( "/<fakultas>(.*?)<\/fakultas>/", $block, $fakultas );#4
			preg_match_all( "/<almtrumah>(.*?)<\/almtrumah>/", $block, $almtrumah );#5
			preg_match_all( "/<almtkos>(.*?)<\/almtkos>/", $block, $almtkos );#6
			preg_match_all( "/<tempatlahir>(.*?)<\/tempatlahir>/", $block, $tempatlahir );#7
			preg_match_all( "/<tgllahir>(.*?)<\/tgllahir>/", $block, $tgllahir );	#8
			preg_match_all( "/<krs>(.*?)<\/krs>/", $block, $krs );#9
			preg_match_all( "/<nilai>(.*?)<\/nilai>/", $block, $nilai );#10
			preg_match_all( "/<sks>(.*?)<\/sks>/",$block, $sks );#11			
			preg_match_all( "/<sex>(.*?)<\/sex>/",$block, $sex );#12
			preg_match_all( "/<telp>(.*?)<\/telp>/",$block, $hp );#13
			preg_match_all( "/<goldar>(.*?)<\/goldar>/",$block, $goldar );#14
			preg_match_all( "/<email>(.*?)<\/email>/",$block, $email);
			preg_match_all( "/<username>(.*?)<\/username>/",$block, $foto );#5
	
			}
			$data=array();
		if($nim==0)
			{
			$data['nim']='Undefined';
			$data['nama']='Undefined';
			$data['prodi']='Undefined';
			$data['fakultas']='Undefined';
			$data['almtrumah']='Undefined';
			$data['almtkos']='Undefined';
			$data['tempatlahir']='Undefined';
			$data['tgllahir']='Undefined';
			$data['krs']='Undefined';
			$data['nilai']='Undefined';
			$data['sks']='Undefined';
			$data['sex']='Undefined';
			$data['telp']='Undefined';
			$data['goldar']='Undefined';
			$data['username']='Undefined';
			}
		else
			{
			$data['nim']=$nim[1][0];
			$data['nama']=strtotitle($nama[1][0]);
			$data['prodi']=$prodi[1][0];
			$data['fakultas']=$fakultas[1][0];#4
			$data['almtrumah']=$almtrumah[1][0];#5
			$data['almtkos']=$almtkos[1][0];#6
			$data['tempatlahir']=$tempatlahir[1][0];#7
			$data['tgllahir']=$tgllahir[1][0];#8
			$data['krs']=$krs1[1][0];#9
			$data['nilai']=$nilai1[1][0];#10
			$data['sks']=$sks1[1][0];#11
			$data['sex']=$sex[1][0];#12
			$data['telp']=$hp[1][0];#13
			$data['goldar']=$goldar[1][0];#14
			$data['email']=$email[1][0];
			$data['username']=$foto[1][0];#15

			}

		return $data;
}}

$nim=$_GET['n'];

/*
$kode_pkm=$_GET[md5("kode_pkm")];
$id_pkm_data=$_GET[md5("id_pkm_data")];
$kode_pendaftaran=$_GET[md5("kode_pendaftaran")];
$nim_ketua=$_GET[md5("ketua")];

$kode_pkm=$_GET["kode_pkm"];
$id_pkm_data=$_GET["id_pkm_data"];
$kode_pendaftaran=$_GET["kode_pendaftaran"];
$nim_ketua=$_GET["ketua"];
*/
$jam=date("h : i a");
$tanggaly=date("d");
$bulan=date('m');

switch ($bulan){
  Case "01": $bulan="Januari"; Break;
  Case "02": $bulan="Februari"; Break;
  Case "03": $bulan="Maret"; Break;
  Case "04": $bulan="April"; Break;
  Case "05": $bulan="Mei"; Break;
  Case "06": $bulan="Juni"; Break;
  Case "07": $bulan="Juli"; Break;
  Case "08": $bulan="Agustus"; Break;
  Case "09": $bulan="September"; Break;
  Case "10": $bulan="Oktober"; Break;
  Case "11": $bulan="November"; Break;
  Case "12": $bulan="Desember"; Break;
  default :$bulan="Januari"; Break;
}
$tahun=date("Y");
$ip_dapat=$_SERVER['REMOTE_ADDR'];
$tanggal="$tanggaly $bulan $tahun";

//include ("fpdf/fpdf.php");
include ("../../koneksi_database.php");



$org1=mysql_query(" SELECT keg_organisasi_pengurus_intern.nim, biodata_user_mahasiswa.nama_lengkap, keg_jabatan.jabatan, keg_organisasi_pengurus_intern.kedudukan, keg_organisasi_pengurus_intern.masa_bakti, keg_organisasi_intern.organisasi, keg_organisasi_pengurus_intern.id_lk_intern, keg_organisasi_pengurus_intern.jabatan, keg_organisasi_intern.id_jenis_organisasi, keg_organisasi_intern.id_sub_jenis_organisasi, keg_organisasi_intern.id_tingkat
FROM keg_organisasi_pengurus_intern
INNER JOIN biodata_user_mahasiswa ON biodata_user_mahasiswa.nim = keg_organisasi_pengurus_intern.nim
INNER JOIN keg_jabatan ON keg_jabatan.id_jabatan = keg_organisasi_pengurus_intern.jabatan
INNER JOIN keg_organisasi_intern ON keg_organisasi_intern.id_lk_intern = keg_organisasi_pengurus_intern.id_lk_intern 
WHERE keg_organisasi_pengurus_intern.nim LIKE '$nim'",$sambungan);

$keg1=mysql_query("SELECT keg_organisasi_peserta.nim,keg_organisasi_peserta.id_lk_intern,keg_organisasi_agenda.kegiatan,keg_organisasi_intern.organisasi,keg_organisasi_intern.id_jenis_organisasi,keg_organisasi_intern.id_sub_jenis_organisasi,keg_organisasi_intern.id_tingkat  FROM `keg_organisasi_peserta` INNER JOIN keg_organisasi_intern ON keg_organisasi_intern.id_lk_intern=keg_organisasi_peserta.id_lk_intern INNER JOIN keg_organisasi_agenda ON keg_organisasi_agenda.id_agenda=keg_organisasi_peserta.id_kegiatan WHERE nim LIKE '$nim'",$sambungan);

$data=mysql_fetch_row(mysql_query("SELECT biodata_user_mahasiswa.nim,biodata_user_mahasiswa.nama_lengkap,biodata_user_mahasiswa.prodi,fakultas_unnes.fakultas,biodata_user_mahasiswa.tanggal_lahir,biodata_user_mahasiswa.bulan_lahir,biodata_user_mahasiswa.tahun_lahir FROM biodata_user_mahasiswa INNER JOIN fakultas_unnes ON fakultas_unnes.id_fakultas = biodata_user_mahasiswa.fakultas WHERE biodata_user_mahasiswa.nim LIKE '$nim'",$sambungan));



switch($bum[9])
{ 
  Case "1":$bum[9]="Januari";Break;
	Case "2":$bum[9]="Februari";Break;
	Case "3":$bum[9]="Maret";Break;
	Case "4":$bum[9]="April";Break;
	Case "5":$bum[9]="Mei";Break;
	Case "6":$bum[9]="Juni";Break;
	Case "7":$bum[9]="Juli";Break;
	Case "8":$bum[9]="Agustus";Break;
	Case "9":$bum[9]="September";Break;
	Case "10":$bum[9]="Oktober";Break;
	Case "11":$bum[9]="November";Break;
	Case "12":$bum[9]="Desember";Break;	
}
/*
class PDF extends FPDF
 {
 function Footer()
 {
     //Go to 1.5 cm from bottom
     $this->SetY(20);
     //Select Arial italic 8
     $this->SetFont('Arial','I',8);
     //Print current and total page numbers
     $this->Cell(10,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
 }
 }
 */
//require( '../../fpdf/code39.php' ); 
require_once("class.fpdf_table.php");
	require_once("header_footer.inc");
	
	//Table Defintion File
	require_once("table_def.inc");

$tgl = date('d-M-Y');
$pdf = new FPDF();
$pdf =new pdf_usage (); 
$pdf->AliasNbPages();
$pdf->Open();





//-------------------------------------- HALAMAN PERTAMA -----------------------------------------------------------
$pdf->addPage();
$pdf->SetAuthor("ICT Bidang Kemahasiswaan Unnes");
$pdf->setAutoPageBreak(true);
$pdf->SetMargins(1,1,3);
$pdf->setFont('Arial','B',12);
$pdf->PageNo();
$pdf->Image('../../unnes.jpg',10,5,20);
$pdf->text(35,10,'KEMENTERIAN PENDIDIKAN NASIONAL');
$pdf->text(35,14,'UNIVERSITAS NEGERI SEMARANG ( UNNES )');
$pdf->setFont('Arial','B',11);
$pdf->text(35,18,'Gedung H : Kampus Sekaran - Gunungpati - Semarang 50229');
$pdf->setFont('Arial','',8);
$pdf->text(35,22,'Rektor Fax. (024) 8508082, Purek I : 8508001 - Purek II : 8508002 - Purek III : 8508003');
$pdf->text(35,26,'Purek IV : 8508004 - Ka. BAAK : Fax. (024) 8508085 - Ka. BAUK : 8508091 - Bag. UHTP : 8508088');
$pdf->setFont('Arial','',9);
$pdf->setFillColor(black);
$pdf->setXY(10,30);
$pdf->CELL(190,1,'',1,0,'C',1);
$pdf->setFont('Arial','',9);
$pdf->setFillColor(black);

$font_type="Arial";

$pdf->setFont('Arial','B',12);
$pdf->text(70,40,"TRANSKIP KEAKTIFAN MAHASISWA");
$pdf->setFont('Arial','',10);
$pdf->text(10,50,'Nama ');
$pdf->setFont("$font_type",'',10);
$pdf->text(35,50,": $data[1]");
$pdf->text(10,55,'NIM ');
$pdf->text(35,55,": $data[0]");
$pdf->text(10,60,'Tanggal lahir ');
$pdf->text(35,60,": $data[4]-$data[5]-$data[6]");
$pdf->text(10,65,'Tahun masuk ');
$pdf->text(35,65,": 20".substr($data[0],5,2));
//Kanan
$pdf->text(120,50,'Fakultas ');
$pdf->text(155,50,": $data[3] ");
$pdf->text(120,55,'Jurusan');
$pdf->text(155,55,": $data[2] ");
$pdf->text(120,60,'Prodi ');
$pdf->text(155,60,": $data[2] ");

//header cell kiri
$top=75;
$pdf->setXY(15,$top);
$pdf->setFont('Arial','B',7);
$pdf->setFillColor(255,255,255);
$pdf->MultiCellTag(100, 2, "Pengalaman Organisasi", 0);
	$pdf->Ln(2)
$columns = 5;
$pdf->tbInitialize($columns, true, true);	
	//set the Table Type
$pdf->tbSetTableType($table_default_table_type);
for($i=0; $i<$columns; $i++) $header_type[$i] = $table_default_header_type;
	
	for($i=0; $i<$columns; $i++) {
		$header_type1[$i] = $table_default_header_type;
		$header_type2[$i] = $table_default_header_type;
		
		$header_type2[$i]['T_COLOR'] = array(10,20, 100);
		$header_type2[$i]['BG_COLOR'] = $bg_color2;
	}
	$pdf->Ln(1);
	$header_type1[0]['WIDTH'] = 7;
	$header_type1[1]['WIDTH'] = 15;
	$header_type1[2]['WIDTH'] = 25;
	$header_type1[3]['WIDTH'] = 12;
	$header_type1[4]['WIDTH'] = 12;

	
	$header_type1[0]['TEXT'] = "NO";
	$header_type1[1]['TEXT'] = "Jabatan";
	$header_type1[2]['TEXT'] = "Lembaga";
	$header_type1[3]['TEXT'] = "Tahun";
	$header_type1[4]['TEXT'] = "Bobot";

	$aHeaderArray = array($header_type1);
		//set the Table Header
	$pdf->tbSetHeaderType($aHeaderArray, true);
	
	//Draw the Header
	$pdf->tbDrawHeader();
  $aDataType = Array();
	for ($i=0; $i<$columns; $i++) 
  $aDataType[$i] = $table_default_data_type;

	$pdf->tbSetDataType($aDataType);
	$no=1;$space=80;
  while ($org=mysql_fetch_row($org1)) {
$bobot=mysql_fetch_row(mysql_query("SELECT id_ref_bobot,bobot FROM keg_ref_bobot WHERE id_jabatan='$org[7]' AND id_jenis='$org[8]' AND	id_tingkat='$org[10]'",$sambungan));

		$data = Array();
		$data[0]['TEXT'] = $no;
		$data[0]['T_ALIGN'] = "L";//default in the example is C
		$data[1]['TEXT'] = $org[3];
		$data[2]['TEXT'] = $org[5];
		//$data[2]['T_ALIGN'] = "R";
		$data[3]['TEXT'] = $org[4];
		$data[4]['TEXT'] = $bobot[1];

	




/*
$pdf->MultiCELL(5,5,"No",1,0,'',0);
$pdf->setXY(15,$top);
$pdf->MultiCELL(30,5,"Jabatan",1,0,'R',0);
$pdf->setXY(45,$top);
$pdf->MultiCELL(40,5,"Lembaga",1,0,'L',0);
$pdf->setXY(85,$top);
$pdf->MultiCELL(10,5,"Tahun",1,0,'',0);
$pdf->setXY(95,$top);
$pdf->MultiCELL(10,5,"Bobot",1,0,'',0);
//Header cell kanan
$pdf->setFont('Arial','B',7);
$pdf->setFillColor(255,255,255);
$pdf->setXY(110,$top);
$pdf->MultiCELL(5,5,"No",1,0,'C',0);
$pdf->setXY(115,$top);
$pdf->MultiCELL(30,5,"Kegiatan",1,0,'C',0);
$pdf->setXY(145,$top);
$pdf->MultiCELL(40,5,"Lembaga",1,0,'C',0);
$pdf->setXY(185,$top);
$pdf->MultiCELL(10,5,"Tahun",1,0,'C',0);
$pdf->setXY(195,$top);
$pdf->MultiCELL(10,5,"Bobot",1,0,'C',0);
*/
//isi cell

/*

$pdf->setFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->setXY(10,$space);
$pdf->MultiCELL(5,5,"$no",1,0,'C',0);
$pdf->setXY(15,$space);
$pdf->MultiCELL(30,5,"$org[3]",1,0,'',0);
$pdf->setXY(45,$space);
$pdf->MultiCELL(40,5,"$org[5]",1,0,'',0);
$pdf->setXY(85,$space);
$pdf->MultiCELL(10,5,"$org[4]",1,0,'',0);
$pdf->setXY(95,$space);
$pdf->MultiCELL(10,5,"$bobot[1]",1,0,'L',0);
*/
		$pdf->tbDrawData($data);
$space=$space+5;$no++;

}
//$pdf->setXY(10,$top);



	//output the table data to the pdf
	$pdf->tbOuputData();
	
	//draw the Table Border
	$pdf->tbDrawBorder();	
//cell default 10 row
/*
$top=75;
for ($i=0;$i<=40 ;$i=$i+5 ) {
//cell kosong kiri
$pdf->setXY(10,$top + $i);
$pdf->CELL(5,5,"",1,0,'C',0);
$pdf->setXY(15,$top + $i);
$pdf->CELL(30,5,"",1,0,'C',0);
$pdf->setXY(45,$top + $i);
$pdf->CELL(40,5,"",1,0,'C',0);
$pdf->setXY(85,$top + $i);
$pdf->CELL(10,5,"",1,0,'C',0);
$pdf->setXY(95,$top + $i);
$pdf->CELL(10,5,"",1,0,'C',0);
//cell kosong kanan
$pdf->setXY(110,$top + $i);
$pdf->CELL(5,5,"",1,0,'C',0);
$pdf->setXY(115,$top + $i);
$pdf->CELL(30,5,"",1,0,'C',0);
$pdf->setXY(145,$top + $i);
$pdf->CELL(40,5,"",1,0,'C',0);
$pdf->setXY(185,$top + $i);
$pdf->CELL(10,5,"",1,0,'C',0);
$pdf->setXY(195,$top + $i);
$pdf->CELL(10,5,"",1,0,'C',0);
}
//isi cell kanan
$pdf->setFont('Arial','',7);
$pdf->setFillColor(255,255,255);
$pdf->setXY(10,$space);
$pdf->MultiCELL(5,5,"$no",1,0,'C',0);
$pdf->setXY(15,$space);
$pdf->MultiCELL(70,5,"$org[3] $org[5] $org[4]",1,0,'L',0);
$pdf->setXY(85,$space);
$pdf->MultiCELL(10,5,"",1,0,'L',0);
$pdf->setXY(95,$space);
$pdf->MultiCELL(10,5,"$org[4]",1,0,'L',0);
$space=$space+5;$no++;

*/

//Seminar/Training/Pelatihan
//header cell kiri
	$pdf->Ln(5);
	
$pdf->setFont('Arial','B',7);
$pdf->setFillColor(255,255,255);
$pdf->SetX(15);
$pdf->MultiCellTag(60, 10, "Seminar/Training/Pelatihan", 0);
/*
	$pdf->Ln(2)
$column = 5;
$pdf->tbInitialize($column, true, true);	
	//set the Table Type
$pdf->tbSetTableType($table_default_table_type);
for($i=0; $i<$column; $i++) $header_type[$i] = $table_default_header_type;
	
	for($i=0; $i<$column; $i++) {
		$header_type2[$i] = $table_default_header_type;
		$header_type2[$i] = $table_default_header_type;
		
		$header_type2[$i]['T_COLOR'] = array(10,20, 100);
		$header_type2[$i]['BG_COLOR'] = $bg_color2;
	}
	$pdf->Ln(1);
	$header_type2[0]['WIDTH'] = 7;
	$header_type2[1]['WIDTH'] = 15;
	$header_type2[2]['WIDTH'] = 25;
	$header_type2[3]['WIDTH'] = 12;
	$header_type2[4]['WIDTH'] = 12;

	
	$header_type2[0]['TEXT'] = "NO";
	$header_type2[1]['TEXT'] = "Jenis";
	$header_type2[2]['TEXT'] = "Penyelenggara";
	$header_type2[3]['TEXT'] = "Tahun";
	$header_type2[4]['TEXT'] = "Bobot";

	$bHeaderArray = array($header_type2);
		//set the Table Header
	$pdf->tbSetHeaderType($bHeaderArray, true);
	
	//Draw the Header
	$pdf->tbDrawHeader();
  $aDataType = Array();
	for ($i=0; $i<$column; $i++) 
  $aDataType[$i] = $table_default_data_type;

	$pdf->tbSetDataType($aDataType);
	$nn=1;$space=80;
 while ($keg=mysql_fetch_row($keg1)) {
//$bobot=mysql_fetch_row(mysql_query("SELECT id_ref_bobot,bobot FROM keg_ref_bobot WHERE id_jabatan='$keg[7]' AND id_jenis='$keg[8]' AND	id_tingkat='$keg[10]'",$sambungan));

		$data = Array();
		$data[0]['TEXT'] = $nn;
		$data[0]['T_ALIGN'] = "L";//default in the example is C
		$data[1]['TEXT'] = $keg[2];
		$data[2]['TEXT'] = $keg[3];
		//$data[2]['T_ALIGN'] = "R";
		$data[3]['TEXT'] = $keg[4];
		$data[4]['TEXT'] = $keg[1];
		$pdf->tbDrawData($data);
		$no++;
}
	$pdf->tbOuputData();
	
	//draw the Table Border
	$pdf->tbDrawBorder();	
$top=130;
$pdf->setFont('Arial','B',7);
$pdf->setFillColor(255,255,255);
$pdf->text(10,$top-2,"Seminar/Training/Pelatihan");
$pdf->setXY(10,$top);
$pdf->MultiCELL(5,5,"NO",1,0,'C',0);
$pdf->setXY(15,$top);
$pdf->MultiCELL(40,5,"Jenis",1,0,'C',0);
$pdf->setXY(55,$top);
$pdf->MultiCELL(30,5,"Penyelenggara",1,0,'C',0);
$pdf->setXY(85,$top);
$pdf->MultiCELL(10,5,"Tahun",1,0,'C',0);
$pdf->setXY(95,$top);
$pdf->MultiCELL(10,5,"Bobot",1,0,'C',0);
//Header cell kanan
$pdf->setFont('Arial','B',7);
$pdf->setFillColor(255,255,255);
$pdf->setXY(110,$top);
$pdf->MultiCELL(5,5,"NO",1,0,'C',0);
$pdf->setXY(115,$top);
$pdf->MultiCELL(40,5,"Kegiatan",1,0,'C',0);
$pdf->setXY(155,$top);
$pdf->MultiCELL(30,5,"Lembaga",1,0,'',0);
$pdf->setXY(185,$top);
$pdf->MultiCELL(10,5,"Tahun",1,0,'',0);
$pdf->setXY(195,$top);
$pdf->MultiCELL(10,5,"Bobot",1,0,'',0);

//cell default 10 row
for ($i=0;$i<=80 ;$i=$i+5 ) {
//cell kosong kiri
$pdf->setXY(10,$top + $i);
$pdf->CELL(5,5,"",1,0,'',0);
$pdf->setXY(15,$top + $i);
$pdf->CELL(40,5,"",1,0,'',0);
$pdf->setXY(55,$top + $i);
$pdf->CELL(30,5,"",1,0,'',0);
$pdf->setXY(85,$top + $i);
$pdf->CELL(10,5,"",1,0,'',0);
$pdf->setXY(95,$top + $i);
$pdf->CELL(10,5,"",1,0,'',0);
//cell kosong kanan
$pdf->setXY(110,$top + $i);
$pdf->CELL(5,5,"",1,0,'',0);
$pdf->setXY(115,$top + $i);
$pdf->CELL(40,5,"",1,0,'',0);
$pdf->setXY(155,$top + $i);
$pdf->CELL(30,5,"",1,0,'',0);
$pdf->setXY(185,$top + $i);
$pdf->CELL(10,5,"",1,0,'',0);
$pdf->setXY(195,$top + $i);
$pdf->CELL(10,5,"",1,0,'',0);
}
$no=1;$space=135;
while ($keg=mysql_fetch_row($keg1)) {
//$bobot=mysql_fetch_row(mysql_query("SELECT id_ref_bobot,bobot FROM keg_ref_bobot WHERE id_jabatan='$keg[7]' AND id_jenis='$keg[8]' AND	id_tingkat='$keg[10]'",$sambungan));
$pdf->setFont('Arial','',8);
$pdf->setFillColor(255,255,255);
$pdf->setXY(10,$space);
$pdf->MultiCELL(5,5,"$no",1,0,'',0);
$pdf->setXY(15,$space);
$pdf->MultiCELL(40,5,"$keg[2]",1,0,'L',0);
$pdf->setXY(55,$space);
$pdf->MultiCELL(30,5,"$keg[3]",1,0,'L',0);
$pdf->setXY(85,$space);
$pdf->MultiCELL(10,5,"$keg[4]",1,0,'L',0);
$pdf->setXY(95,$space);
$pdf->MultiCELL(10,5,"$keg[1]",1,0,'L',0);

$space=$space+5;$no++;
}
*/
$pdf->setFont('Arial','',10);
//$pdf->text(50,245,"Total Poin:,");
$pdf->text(50,250,',');
$pdf->setFont('Arial','B',12);
$pdf->text(50,270,"");
$pdf->text(50,275,"");

$pdf->setFont('Arial','',10);
$pdf->text(120,245,"Semarang, $tanggal");
$pdf->text(120,250,'Rektor,');
$pdf->setFont('Arial','B',12);
$pdf->text(120,270,"Prof.Dr. Sudijono Sastroatmodjo	M.Si.");
$pdf->text(120,275,"NIP. 195208151982031007");

$pdf->Output('Transkip Kegiatan','I');

?>
