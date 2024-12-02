<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$id_data=$_GET[md5("id_data")];

$data=mysql_fetch_array(mysql_query("SELECT*FROM v1_halaman WHERE id like '$id_data'",$sambungan));
if($data[id]!=""){
if($_SESSION['id']==""){$id_user="0";$user="Tamu";}else{$id_user=$_SESSION['id'];$user=$_SESSION['username'];}
$pengunjung=mysql_query("INSERT INTO v1_halaman_count VALUE ('','$id_user','$user','$data[id]','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','')",$sambungan);
$banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_halaman_count WHERE id_halaman like '$data[id]'",$sambungan));
echo"   
        <div id='infotitle' align=left><b>$data[judul]</b></div>
        <div id='infointi' align=left>
        $data[isi]       
        </div><div style='height:10px'></div></form>
        <div id='infointi' align=left>Ditulis oleh <b>$data[user]</b> | $data[hari], $data[tanggal] / $data[bulan] / $data[tahun]</b> | dilihat <b>$banyak</b> orang</div>
";}else{include("face_wave/kosong.php");}

?>
