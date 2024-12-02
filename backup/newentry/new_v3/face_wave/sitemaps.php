<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
include("../kampungan/log_data.php");
include("fungsi.php");

switch($_GET[md5("lihat")]){
case"":
	$group_query=mysql_query("SELECT*FROM v1_informasi_group WHERE status like 'tampil' Order By nama Asc",$sambungan);
	while($gr=mysql_fetch_array($group_query)){
        	$gr['nama']=potong($gr['nama'],23);
	        $kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori WHERE status like 'Tampil' AND id_group like '$gr[id]' ORDER By nama Asc",$sambungan);$no=1;
        	echo"
                	<div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left>$gr[nama]</div>
                	<div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
	        ";$n=1;
        	while($kategori=mysql_fetch_array($kategori_query)){
			$dquery=mysql_query("SELECT*FROM v1_informasi_berita WHERE id_kategori like '$kategori[id]' ORDER By Rand() LIMIT 0,10",$sambungan);
			$ddquery=mysql_query("SELECT*FROM v1_informasi_berita WHERE id_kategori like '$kategori[id]'",$sambungan);
        		$banyak=mysql_num_rows($ddquery);
        		echo"$n. <b style='font-size:12px'>$kategori[nama]</b> ($banyak tulisan )<ul>";
			while($ddata=mysql_fetch_array($dquery)){
				$ddata['judul']=ucwords(strtolower($ddata['judul']));
				echo"<li><a href='javascript:void()' onclick=menu('face_wave/informasi_view','".md5("id_data")."=$ddata[id]','inti')>$ddata[judul]</a></li>";
			}echo"</ul><div style='height:10px'></div>";$n++;
        	}
        echo"</div><div style='height:5px'></div>";
	}
break;


}
?>
