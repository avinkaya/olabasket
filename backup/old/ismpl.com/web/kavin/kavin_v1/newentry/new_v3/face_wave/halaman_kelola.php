<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Menu</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <table cellspacing=1 cellpadding=4 width=100% >
                <tr>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("tampil")."=".md5("input")."'><img src='icon/user_tampil.png' width=40px border=0></a><br>Tambah Halaman</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("look")."=Tampil'><img src='icon/user_konfirm.png' width=40px border=0></a><br>Halaman Tampil</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("look")."=Hidden'><img src='icon/user_blokir.png' width=40px border=0></a><br>Halaman Hidden</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("look")."=Hapus'><img src='icon/user_purna.png' width=40px border=0></a><br>Halaman Hapus</th>
                </tr>
                </table>
       </div><div style='height:10px'></div>
";

switch($_GET[md5("proses")]){
case md5("Tampil"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_halaman SET status='Tampil' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Halaman telah ditampilkan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Hidden"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_halaman SET status='Hidden' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Halaman telah disembunyikan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Hapus"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_halaman SET status='Hapus' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Halaman telah dihapus.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Tambah"):
        $judul=$_POST[md5("judul")];
        $isi=$_POST[md5("isi")];
        if($judul==""){pesan("Anda belum menuliskan judul halaman.");}
        elseif($isi==""){pesan("Anda belum menuliskan isi halaman.");}
        else{
                $tambah_query=mysql_query("INSERT INTO v1_halaman VALUE ('','$judul','$isi','$id','$username','$hari','$tanggal','$bulan','$tahun','$ip','$host','$jam','','','Tampil')",$sambungan);
                if($tambah_query){pesan("Halaman telah di tambahkan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Edit"):
        $id_data=$_GET[md5("id_data")];
        $edit=mysql_fetch_array(mysql_query("SELECT*FROM v1_halaman WHERE id like '$id_data'",$sambungan));
        $form_id="<input type=hidden name='".md5("id_data")."' value='$edit[id]'>";
        $proses="Simpan";
        $_GET[md5("tampil")]=md5("input");
break;

case md5("Simpan"):
        $id_data=$_POST[md5("id_data")];
        $judul=$_POST[md5("judul")];
        $isi=$_POST[md5("isi")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_halaman SET judul='$judul',isi='$isi' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Halaman telah disimpan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;
}

switch($_GET[md5("tampil")]){
case"":
$look=$_GET[md5("look")];if($look==""){$look="Tampil";}
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Halaman $look</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah halaman informasi anda, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=240px>JUDUL</th>
                        <th width=180px>PENULIS</th>
                        <th width=20px>OPSI</th>
                </tr>";

        $halaman_query=mysql_query("SELECT*FROM v1_halaman WHERE status like '$look' ORDER By id desc",$sambungan);$no=1;
        $halaman_banyak=mysql_num_rows($halaman_query);
        if($halaman_banyak==0){
        echo"
                <tr>
                        <td colspan=5 style='background:white'>Belum terdapat data ..</td>
                </tr>
         ";
        }else{
        while($halaman=mysql_fetch_array($halaman_query)){
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$halaman[id_user]' ORDER By id desc",$sambungan));
        echo"        <tr valign=top>
                        <td style='background:white' align=center>$no</td>
                        <td style='background:white;width:150px;'>$halaman[judul]</td>
                        <td style='background:white'><b>$user[nama]</b><br>Username : $halaman[user]<br>Ditulis $halaman[hari], $halaman[tanggal] / $halaman[bulan] / $halaman[tahun]</td>
                        <td style='background:white;width:200px;'>
                                <a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("proses")."=".md5("Edit")."&&".md5("id_data")."=$halaman[id]'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("proses")."=".md5("Tampil")."&&".md5("id_data")."=$halaman[id]'>[ Tampil ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("proses")."=".md5("Hidden")."&&".md5("id_data")."=$halaman[id]'>[ Hidden ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$halaman[id]'>[ Hapus  ]</a>                        
                        </td>
                </tr>";$no++;
        }
        }

echo"  </table></div>";
break;

case md5("input"):
include("face_wave/style_besar.php");
if($proses==""){$proses="Tambah";$form_id="";}
echo"   <form method=post action='?".md5("page_halaman")."=".md5("halaman_kelola")."&&".md5("proses")."=".md5("$proses")."'>$form_id
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tambah / Edit Halaman</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        Judul halaman : <br><input type=text name='".md5("judul")."' value='$edit[judul]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:440px;'><br><br><br>
        <textarea name='".md5("isi")."' style='padding:5 5 5 5;width:430px;height:600px'>$edit[isi]</textarea><br><br>
        <input type=submit value='Simpan' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:10 10 10 10;width:100px'>
       </div><div style='height:10px'></div></form>
";
break;
}

?>
