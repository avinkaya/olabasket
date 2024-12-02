<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$id_prof=$_GET[md5("id_data")];
if($_SESSION['id']==""){$id_user="0";$user="Tamu";}else{$id_user=$_SESSION['id'];$user=$_SESSION['username'];}
$pengunjung=mysql_query("INSERT INTO v1_halaman_count VALUE ('','$id_user','$user','0','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','')",$sambungan);
$banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_halaman_count WHERE id_halaman like '0'",$sambungan));

$profil=mysql_fetch_array(mysql_query("SELECT*FROM v1_profil WHERE id like '$id_prof'",$sambungan));
echo"   
        <div id='infotitle' align=left><b>Profil $site[perusahaan]</b></div>
        <div id='infointi' align=left>
        $profil[isi]       
        </div><div style='height:10px'></div></form>
        <div id='infointi' align=left>Oleh <b>$profil[user]</b>, tanggal <b>$profil[tanggal] / $profil[bulan] / $profil[tahun]</b> | dilihat <b>$banyak</b> orang</div>
";


?>
