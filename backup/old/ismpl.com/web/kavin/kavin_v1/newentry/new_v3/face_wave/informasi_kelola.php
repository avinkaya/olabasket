<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case md5("Tampilkan"):
        $id_informasi=$_GET[md5("id_informasi")];
        $_GET[md5("lihat")]=md5("page_informasi");
        $rubah=mysql_query("UPDATE v1_informasi_berita SET status='Tampilkan' WHERE id like '$id_informasi'",$sambungan);
        if($rubah){pesan("Informasi telah di tampilkan");}
        else{pesan("Informasi gagal ditampilkan, silahkan coba kembali");}
break;

case md5("Sembunyikan"):
        $id_informasi=$_GET[md5("id_informasi")];
        $_GET[md5("lihat")]=md5("page_informasi");
        $rubah=mysql_query("UPDATE v1_informasi_berita SET status='Sembunyikan' WHERE id like '$id_informasi'",$sambungan);
        if($rubah){pesan("Informasi telah di sembunyikan");}
        else{pesan("Informasi gagal disembunyikan, silahkan coba kembali");}
break;
}

switch($_GET[md5("lihat")]){
case"":
        session_unregister (md5('id_data'));
        $kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori ORDER By nama Asc",$sambungan);$no=1;
        echo"
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left>Pilih Kategori</div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        Pilihlah kategori yang ingin anda kelola informasinya dengan memilih salah satu kategori dibawah ini :
                              <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                                <tr>
                                        <th width=10px>NO</th>
                                        <th width=200px>KATEGORI</th>
                                        <th width=160px>DATA</th>
                                        <th width=100px>INFORMASI</th>
                                </tr>
        ";
        while($kategori=mysql_fetch_array($kategori_query)){
        $banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_berita WHERE id_kategori like '$kategori[id]'  AND id_user like '$id' ",$sambungan));
        echo"
                                <tr height=40px>
                                        <td bgcolor=white>$no</td>
                                        <td bgcolor=white><b style='font-size:12px'>$kategori[nama]</b><br>Status : <i>$kategori[status]</i></td>
                                        <td bgcolor=white><b>$banyak</b> tulisan</td>
                                        <td bgcolor=white align=center>
                                                <a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("lihat")."=".md5("page_informasi")."&&".md5("id_data")."=$kategori[id]'>[ lihat ]</a>
                                        </td>
                                </tr>
        ";$no++;
        }
        echo"</table></div>";
break;

case md5("page_informasi"):
        $id_data=$_SESSION[md5("id_data")];
        if($id_data==""){
                $id_data=$_GET[md5("id_data")];
                $_SESSION[md5("id_data")]="$id_data";
        }
        $kategori=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_kategori WHERE id like '$id_data'",$sambungan));
        echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Menu $kategori[nama]</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <table cellspacing=1 cellpadding=4 width=100% >
                <tr>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("lihat")."='><img src='icon/user_tampil.png' width=40px border=0></a><br>Pilih Kategori</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("lihat")."=".md5("page_informasi")."&&".md5("express")."=".md5("konsep")."'><img src='icon/user_konfirm.png' width=40px border=0></a><br>Konsep Informasi</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("lihat")."=".md5("page_informasi")."'><img src='icon/user_blokir.png' width=40px border=0></a><br>Informasi Tampil</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("lihat")."=".md5("page_informasi")."&&".md5("express")."=".md5("hidden")."'><img src='icon/user_purna.png' width=40px border=0></a><br>Informasi Hidden</th>
                </tr>
                </table>
       </div><div style='height:30px'></div>
       ";
       
       switch($_GET[md5("express")]){
       case "":
                echo"<div style='border-bottom:solid 1px #EAEAEA;padding:0 0 5 0;font-size:15px' align=left><b>Informasi Tampil</b></div><div style='height:15px'></div>";
                $informasi_query=mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Tampilkan' AND id_kategori like '$id_data'  AND id_user like '$id' ORDER By id Desc",$sambungan);
       
echo"
<table border=0 width=100% cellspacing=3 cellpadding=0>
<tr valign=top>
";
$noo=1;
         while($informasi=mysql_fetch_array($informasi_query)){
                $informasi['isi']=potong(form($informasi['isi']),450);
                $informasi['judul']=strtoupper(potong($informasi['judul'],65));
                $banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_count WHERE id_informasi like '$informasi[id]'",$sambungan));
                echo"
<td width=100px align=center style='font-size:12px;font-family:arial'>
<img src='img_data/informasi/$informasi[avatar]' width=100px><br>
<b>$informasi[judul]</b><br>
<a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."&&".md5("aksi")."=".md5("edit")."&&".md5("id_data")."=$informasi[id]'>edit</a> | 
<a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("proses")."=".md5("Tampilkan")."&&".md5("id_informasi")."=$informasi[id]'>tampil</a> | 
<a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("proses")."=".md5("Sembunyikan")."&&".md5("id_informasi")."=$informasi[id]'>hidden</a> | 
</td>
";
if($noo<=2){echo"";$noo++;}else{echo"</tr><tr valign=top><td colspan=3>&nbsp;</td></tr><tr valign=top>";$noo=1;}
}
echo"</tr></table>";
       break;
       
       case md5("hidden"):
                echo"<div style='border-bottom:solid 1px #EAEAEA;padding:0 0 5 0;font-size:15px' align=left><b>Informasi Hidden</b></div><div style='height:15px'></div>";
                $informasi_query=mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Sembunyikan' AND id_kategori like '$id_data'  AND id_user like '$id' ORDER By id Desc",$sambungan);
                echo"
<table border=0 width=100% cellspacing=3 cellpadding=0>
<tr valign=top>
";
$noo=1;
         while($informasi=mysql_fetch_array($informasi_query)){
                $informasi['isi']=potong(form($informasi['isi']),450);
                $informasi['judul']=strtoupper(potong($informasi['judul'],65));
                $banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_count WHERE id_informasi like '$informasi[id]'",$sambungan));
                echo"
<td width=100px align=center style='font-size:12px;font-family:arial'>
<img src='img_data/informasi/$informasi[avatar]' width=100px><br>
<b>$informasi[judul]</b><br>
<a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."&&".md5("aksi")."=".md5("edit")."&&".md5("id_data")."=$informasi[id]'>edit</a> | 
<a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("proses")."=".md5("Tampilkan")."&&".md5("id_informasi")."=$informasi[id]'>tampil</a> | 
<a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("proses")."=".md5("Sembunyikan")."&&".md5("id_informasi")."=$informasi[id]'>hidden</a> | 
</td>
";
if($noo<=2){echo"";$noo++;}else{echo"</tr><tr valign=top><td colspan=3>&nbsp;</td></tr><tr valign=top>";$noo=1;}
}
echo"</tr></table>";
       break;
       
       case md5("konsep"):
                echo"<div style='border-bottom:solid 1px #EAEAEA;padding:0 0 5 0;font-size:15px' align=left><b>Konsep Informasi</b></div><div style='height:15px'></div>";
                $informasi_query=mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Konsep' AND id_kategori like '$id_data'  AND id_user like '$id' ORDER By id Desc",$sambungan);
                echo"
<table border=0 width=100% cellspacing=3 cellpadding=0>
<tr valign=top>
";
$noo=1;
         while($informasi=mysql_fetch_array($informasi_query)){
                $informasi['isi']=potong(form($informasi['isi']),450);
                $informasi['judul']=strtoupper(potong($informasi['judul'],65));
                $banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_count WHERE id_informasi like '$informasi[id]'",$sambungan));
                echo"
<td width=100px align=center style='font-size:12px;font-family:arial'>
<img src='img_data/informasi/$informasi[avatar]' width=100px><br>
<b>$informasi[judul]</b><br>
<a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."&&".md5("aksi")."=".md5("edit")."&&".md5("id_data")."=$informasi[id]'>edit</a> | 
<a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("proses")."=".md5("Tampilkan")."&&".md5("id_informasi")."=$informasi[id]'>tampil</a> | 
<a href='?".md5("page_halaman")."=".md5("informasi_kelola")."&&".md5("proses")."=".md5("Sembunyikan")."&&".md5("id_informasi")."=$informasi[id]'>hidden</a> | 
</td>
";
if($noo<=2){echo"";$noo++;}else{echo"</tr><tr valign=top><td colspan=3>&nbsp;</td></tr><tr valign=top>";$noo=1;}
}
echo"</tr></table>";
       break;
       }


break;
}
?>
