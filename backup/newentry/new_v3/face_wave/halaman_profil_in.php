<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");
include("face_wave/style_besar.php");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Menu</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <table cellspacing=1 cellpadding=4 width=100% >
                <tr>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_profil_in")."&&".md5("id_data")."=1'><img src='icon/user_tampil.png' width=40px border=0></a><br>Profile</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_profil_in")."&&".md5("id_data")."=2'><img src='icon/user_konfirm.png' width=40px border=0></a><br>Company</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_profil_in")."&&".md5("id_data")."=3'><img src='icon/user_blokir.png' width=40px border=0></a><br>Product</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_profil_in")."&&".md5("id_data")."=4'><img src='icon/user_purna.png' width=40px border=0></a><br>Outlet</th>
                </tr>
                </table>
       </div><div style='height:10px'></div>
";
$id_data=$_GET[md5("id_data")];
if($id_data==""){$id_data=1;}
switch($id_data){
case "1":
        $prof="Profile";
break;
case "2":
        $prof="Company";
break;
case "3":
        $prof="Product";
break;
case "4":
        $prof="Outlet";
break;

}
switch($_POST[md5("Proses")]){
case md5("Simpan"):
        $isi=$_POST[md5("isi")];
        $simpan=mysql_query("UPDATE v1_profil SET isi='$isi',id_user='$id',user='$username',tanggal='$tanggal',bulan='$bulan',tahun='$tahun',ip='$ip',host='$host',jam='$jam' WHERE id like '$id_data'",$sambungan);
        if($simpan){pesan("Profil telah disimpan.");}else{pesan("Penyimpanan gagal.");}
break;
}

$profil=mysql_fetch_array(mysql_query("SELECT*FROM v1_profil WHERE id like '$id_data'",$sambungan));
echo"   <form method=post action='?".md5("page_halaman")."=".md5("halaman_profil_in")."&&".md5("id_data")."=$id_data'>
        <input type=hidden name='".md5("Proses")."' value='".md5("Simpan")."'>
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Edit $prof</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        Tuliskan $prof pada form berikut dibawah ini :<br><br><br>
        <textarea name='".md5("isi")."' style='padding:5 5 5 5;width:430px;height:600px'>$profil[isi]</textarea><br><br>
        <input type=submit value='Simpan' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:10 10 10 10;width:100px'>
       </div><div style='height:10px'></div></form>
";


?>
