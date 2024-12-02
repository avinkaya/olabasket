<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");
$baner=mysql_fetch_array(mysql_query("SELECT*FROM v1_banner WHERE status like 'tampil' AND kategori like 'Banner' ORDER by Rand() LIMIT 0,1",$sambungan));
$iklan=mysql_fetch_array(mysql_query("SELECT*FROM v1_banner WHERE status like 'tampil' AND kategori like 'Iklan' ORDER by Rand() LIMIT 0,1",$sambungan));
if($iklan['file']!=""){$ikk="<img src='banner/$iklan[file]' width='485px'>";}else{$ikk=="";}
echo"
        <table width='900' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#351404'>
        <tr>
                <td bgcolor='#EAEAEA'>
	                <img src='banner/$baner[file]' width=900px>
	        </td>
        </tr>
        </table>
        <div style='width:900px;height:3px;background:#0e5316;'></div>
        <div style='width:900px;background:white;height:auto;' align=left>
        <table border=0 cellspacing=0 cellpadding=2  >
        <tr valign=top  bgcolor='#0e5316'>
                <td width=200px >
                <div style='width:200px;'>";
//include("face_wave/home_pimpinan.php");
include("face_wave/halaman_kiri.php");
include("face_wave/informasi_kiri.php");
include("face_wave/tag_kiri.php");

echo"</div></td><td  width=500px bgcolor=white>
<div  style='font-size:12px;height:auto;' align=center>
$ikk
<div style='padding:3 1 5 1;'><div id='inti'>";
			
$halaman=$_GET[md5("page_halaman")];
$halaman_query=mysql_query("SELECT*FROM v1_page WHERE var like '$halaman'",$sambungan);
$halaman_num=mysql_num_rows($halaman_query);
if($halaman_num==0){echo"<div style='padding:10 10 10 10;border:solid 1px red;background:pink'>Halaman yang anda cari tidak tersedia. silahkan kembali ke halaman <a href='?'><b>Home</b></a></div>";}
elseif($halaman_num>=2){echo"<div style='padding:10 10 10 10;border:solid 1px red;background:pink'>Halaman double error, silahkan laporkan kepada LordNET Site Developer di www.lordnet.tk</div>";}
else{$halaman_data=mysql_fetch_array($halaman_query);include("face_wave/$halaman_data[page]");}



echo"</div></div></div></td><td width=200px ><div style='width:200px'>";

include("face_wave/home_search.php");
include("face_wave/informasi_kanan.php");
include("face_wave/tag_kanan.php");

echo"</div></td></tr></table></div>";
?>
