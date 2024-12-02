<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Searching Informasi</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Pencarian data informasi, silahkan masukkan kata kunci informasi yang ingin dicari pada form yang disediakan.<br><br>
                <table border=0 cellspacing=3 cellpadding=2>
                <tr><form method=post action='?".md5("page_halaman")."=".md5("informasi_searching")."'>
                        <td>
                                Kata Kunci :<br>
                                <input type=text name='".md5("isi")."' style='padding:7 7 7 7;width:250px'>
                        </td>
                        <td>
                                <br>
                                <input type=submit value='Cari' style='padding:7 7 7 7;width:70px'>
                        </td>
                </tr></table></form>
       </div><div style='height:10px'></div>
";

$isi=$_POST[md5("isi")];
$informasi_query=mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Tampilkan' AND isi like '%$isi%'  ORDER By id Desc",$sambungan);
$sum=mysql_num_rows($informasi_query);
if($sum==0){
        echo"<div style='border:solid 1px #EAEAEA;color:black;font-size:11px;font-family:arial;padding:5 5 5 5;' align=justify>Maaf, berita yang anda cari tidak dapat ditemukan. Coba cari dengan kata kunci lain ..</div>";
}else{
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
	                        <tr valign=top><td>
	                        <img src='foto_user/$img' width=55px style='border:solid 2px white'>
	                        </td><td style='font-size:11px'>$informasi[isi]
                                </td></tr></table>
	                </div><div style='height:3px'></div>
	                <div style='background:#FEFEFE;border:solid 1px #EAEAEA;color:black;font-size:11px;font-family:arial;padding:5 5 5 5;' align=justify>
		                Ditulis oleh <b>$informasi[user]</b> | $informasi[hari], $informasi[tanggal] / $informasi[bulan] / $informasi[tahun] | dilihat $banyak orang | <b>
				<a href='javascript:void()' onclick=menu('face_wave/informasi_view','".md5("id_data")."=$informasi[id]','inti')>Selengkapnya...</a></b>				
                        </div><div style='height:15px'></div>			
                ";
}}


?>
