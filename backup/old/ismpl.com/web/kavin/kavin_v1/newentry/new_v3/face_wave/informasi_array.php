<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
include("fungsi.php");
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$id_data=$_GET[md5("id_data")];
$kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori WHERE status like 'tampil' AND id like '$id_data' LIMIT 0,1",$sambungan);
$kat=mysql_fetch_array($kategori_query);
        echo"<div style='border-bottom:solid 1px #EAEAEA;padding:0 0 5 0;font-size:15px' align=left><img src='icon/berita.jpg' align=left border=0 width=40px> <b>$kat[nama]</b></div><div style='height:10px'></div>
                <div style='border:solid 1px #EAEAEA;color:black;font-size:11px;font-family:arial;padding:5 5 5 5;' align=justify>$kat[ket]</div><div style='height:15px'></div>
        ";
        $informasi_query=mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Tampilkan' AND id_kategori like '$kat[id]'  ORDER By id Desc",$sambungan);
        while($informasi=mysql_fetch_array($informasi_query)){
                $informasi['isi']=potong(form($informasi['isi']),450);
                $informasi['judul']=ucwords(strtolower(potong($informasi['judul'],65)));
                $banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_count WHERE id_informasi like '$informasi[id]'",$sambungan));
                $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$informasi[id_user]'",$sambungan));
                $img=$user['avatar'];
                echo"
                        <div style='height:25px;font-size:15px;padding:8 0 0 5;border-right:solid 1px #EAEAEA;border-left:solid 1px #EAEAEA;border-top:solid 1px #EAEAEA;background-image: url(gambar/bg_title.jpg);' align=left>$informasi[judul]</div>
	                <div style='border:solid 1px #EAEAEA;color:black;font-size:11px;font-family:arial;padding:5 5 5 5;' align=justify>
                                <table border=0 cellpadding=0 cellspacing=2 width=100%>
	                        <tr valign=top style='width:60px'><td>
	                        <img src='foto_user/$img' width=55px style='border:solid 2px white'>
	                        </td><td style='font-size:11px;width:100%;'>$informasi[isi]
                                </td></tr></table>
	                </div><div style='height:3px'></div>
	                <div style='background:#FEFEFE;border:solid 1px #EAEAEA;color:black;font-size:11px;font-family:arial;padding:5 5 5 5;' align=justify>
		                Ditulis oleh <b>$informasi[user]</b> | $informasi[hari], $informasi[tanggal] / $informasi[bulan] / $informasi[tahun] | dilihat $banyak orang | <b>
				<a href='javascript:void()' onclick=menu('face_wave/informasi_view','".md5("id_data")."=$informasi[id]','inti')>Selengkapnya...</a></b>				
                        </div><div style='height:15px'></div>			
                ";
        }echo"<div style='height:30px'></div>";

?>
