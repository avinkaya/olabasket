<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
include("fungsi.php");
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$id_data=$_GET[md5("id_data")];

$data=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_berita WHERE id like '$id_data'",$sambungan));
$kategori=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_kategori WHERE id like '$data[id_kategori]'",$sambungan));
if($data[id]!=""){
if($_SESSION['id']==""){$id_user="0";$user="Tamu";}else{$id_user=$_SESSION['id'];$user=$_SESSION['username'];}
$pengunjung=mysql_query("INSERT INTO v1_informasi_count VALUE ('','$id_user','$user','$data[id]','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','')",$sambungan);
$banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_count WHERE id_informasi like '$data[id]'",$sambungan));
$data['judul']=strtoupper($data['judul']);
if($data['avatar']!=""){$foto="<img src='img_data/informasi/$data[avatar]' width=150px border=0 align=left onclick=menu('face_wave/informasi_berita_foto','id=$data[id]','photo');>";}else{$foto="";}
echo"   
        <div id='infotitle' align=left><b>$kategori[nama]</b></div>
        <div id='infointi1' align=left style='height:auto'><br><br>
        $foto
        <b style='font-size:13px'>$data[judul]</b>
	<div style='height:5px'></div>$data[isi]       
        </div><div style='height:10px'></div>
	<div id='photo'></div>
        <!--<div id='infointi' align=left>Ditulis oleh <b>$data[user]</b> | $data[hari], $data[tanggal] / $data[bulan] / $data[tahun]</b> | dilihat <b>$banyak</b> orang</div>-->
";}else{include("face_wave/kosong.php");}


$tag_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'MP3' ORDER By Rand() LIMIT 0,1",$sambungan);
$banyak=mysql_num_rows($tag_query);
if($banyak!=0){while($tag=mysql_fetch_array($tag_query)){suara("$tag[url]");}}


?>
