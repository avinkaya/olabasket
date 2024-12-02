<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case md5("tambah_group"):
        $nama=$_POST[md5("nama")];
        $ket=$_POST[md5("ket")];
        if($nama==""){pesan("Anda belum menuliskan nama group.");}
        elseif($ket==""){pesan("Anda belum memberi penjelasan keterangan group.");}
        else{
                $tambah=mysql_query("INSERT INTO v1_informasi_group VALUE ('','$nama','$ket','tampil')",$sambungan);
                if($tambah){pesan("Group $nama telah ditambahkan.");}
                else{pesan("Group gagal ditambahkan.");}
                $_GET[md5("tampil")]=md5("input_group");
        }
break;

case md5("tambah_kategori"):
        $id_group=$_POST[md5("id_group")];
        $kategori=$_POST[md5("kategori")];
        $ket=$_POST[md5("ket")];
        $home=$_POST[md5("home")];
        if($kategori==""){pesan("Anda belum menuliskan nama group.");}
        elseif($ket==""){pesan("Anda belum memberi penjelasan keterangan group.");}
        elseif($home==""){pesan("Anda belum memilih tampilan di halaman depan.");}
        elseif($id_group==""){pesan("Maaf, anda belum menambahkan group anda. silahkan tambahkan group anda pada menu tambah group.");}
        else{
                $tambah=mysql_query("INSERT INTO v1_informasi_kategori VALUE ('','$id_group','$kategori','$ket','tampil','$home')",$sambungan);
                if($tambah){pesan("Kategori $kategori telah ditambahkan.");}
                else{pesan("Kategori gagal ditambahkan.");}
                $_GET[md5("tampil")]=md5("input_kategori");
        }
break;

case md5("edit_kategori"):
        $id_data=$_GET[md5("id_data")];
        $edit_kategori=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_kategori WHERE id like '$id_data'",$sambungan));
        $group_kategori=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_group WHERE id like '$edit_kategori[id_group]'",$sambungan));
        $_GET[md5("tampil")]=md5("input_kategori");
        $proses="simpan_kategori";
        $form_id="<input type=hidden name='".md5("id_data")."' value='$edit_kategori[id]'>";
break;

case md5("simpan_kategori"):
        $id_data=$_POST[md5("id_data")];
        $id_group=$_POST[md5("id_group")];
        $kategori=$_POST[md5("kategori")];
        $ket=$_POST[md5("ket")];
        $home=$_POST[md5("home")];
        if($kategori==""){pesan("Anda belum menuliskan nama kategori.");}
        elseif($ket==""){pesan("Anda belum memberi penjelasan keterangan kategori.");}
        elseif($home==""){pesan("Anda belum memilih tampilan di halaman depan.");}
        elseif($id_group==""){pesan("Maaf, anda belum menambahkan group anda. silahkan tambahkan group anda pada menu tambah group.");}
        else{
                $simpan_kategori=mysql_query("UPDATE v1_informasi_kategori SET nama='$kategori',id_group='$id_group',ket='$ket',home='$home' WHERE id like '$id_data'",$sambungan);
                if($simpan_kategori){pesan("Data kategori telah di rubah.");}else{pesan("Penyimpanan gagal.");}
        }
break;

case md5("hapus_kategori"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melanjutkan proses ini.");}
        else{
                $simpan_kategori=mysql_query("UPDATE v1_informasi_kategori SET status='hapus' WHERE id like '$id_data'",$sambungan);
                if($simpan_kategori){pesan("Data kategori telah di hapus.");}else{pesan("Penghapusan gagal.");}
        }
break;
       
case md5("edit_group"):
        $id_data=$_GET[md5("id_data")];
        $edit_group=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_group WHERE id like '$id_data'",$sambungan));
        $_GET[md5("tampil")]=md5("input_group");
        $proses="simpan_group";
        $form_id="<input type=hidden name='".md5("id_data")."' value='$edit_group[id]'>";
break;

case md5("simpan_group"):
        $id_data=$_POST[md5("id_data")];
        $nama=$_POST[md5("nama")];
        $ket=$_POST[md5("ket")];
        if($nama==""){pesan("Anda belum menuliskan nama group.");}
        elseif($ket==""){pesan("Anda belum memberi penjelasan keterangan group.");}
        else{
                $simpan_group=mysql_query("UPDATE v1_informasi_group SET nama='$nama',ket='$ket' WHERE id like '$id_data'",$sambungan);
                if($simpan_group){pesan("Data group telah di rubah.");}else{pesan("Penyimpanan gagal.");}
        }
break;

case md5("hapus_group"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melanjutkan proses ini. ");}
        else{
                $simpan_group=mysql_query("UPDATE v1_informasi_group SET status='hapus' WHERE id like '$id_data'",$sambungan);
                if($simpan_group){pesan("Data group telah di hapus.");}else{pesan("Penghapusan gagal.");}
        }
break;

case md5("tampil_group"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melanjutkan proses ini. ");}
        else{
                $simpan_group=mysql_query("UPDATE v1_informasi_group SET status='tampil' WHERE id like '$id_data'",$sambungan);
                if($simpan_group){pesan("Data group telah di tampilkan.");}else{pesan("Penghapusan gagal.");}
        }
break; 

case md5("tampil_kategori"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melanjutkan proses ini. ");}
        else{
                $simpan_group=mysql_query("UPDATE v1_informasi_kategori SET status='tampil' WHERE id like '$id_data'",$sambungan);
                if($simpan_group){pesan("Data kategori telah ditampilkan.");}else{pesan("Penghapusan gagal.");}
        }
break; 
}


echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Menu</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <table cellspacing=1 cellpadding=4 width=100% >
                <tr>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("tampil")."=".md5("input_group")."'><img src='icon/user_tampil.png' width=40px border=0></a><br>Tambah Group</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("tampil")."=".md5("lihat_group")."'><img src='icon/user_konfirm.png' width=40px border=0></a><br>Daftar Group</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("tampil")."=".md5("input_kategori")."'><img src='icon/user_blokir.png' width=40px border=0></a><br>Tambah Kategori</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("tampil")."='><img src='icon/user_purna.png' width=40px border=0></a><br>Daftar Kategori</th>
                </tr>
                </table>
       </div><div style='height:10px'></div>
";

switch($_GET[md5("tampil")]){
case md5("input_group"):
if($proses==""){$proses="tambah_group";$form_id="";$submit="Tambah";}else{$submit="Simpan";}
echo"
        <form method=post action='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("$proses")."'>$form_id
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tambah Group</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        Tambahkan group kategori pada formulir dibawah ini :<br><br>
        Nama Group :<br><input type=text name='".md5("nama")."' value='$edit_group[nama]' value='$edit[nama]' style='padding:8 10 8 10;border:solid 1px #EAEAEA;font-size:15px;color:black;width:430px;'><br><br>
        Keterangan : <br><textarea name='".md5("ket")."' style='padding:5 5 5 5;width:430px;height:200px'>$edit_group[ket]</textarea><br><br>
        <input type=submit value='$submit' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Hapus' style='padding:10 10 10 10;;width:100px'>
        </div><div style='height:30px'></div></form>
";
break;

case md5("input_kategori"):
if($proses==""){$proses="tambah_kategori";$form_id="";$submit="Tambah";}else{$submit="Simpan";}
echo"  <form method=post action='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("$proses")."'>$form_id
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tambah Kategori</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        Tambahkan kategori pada formulir dibawah ini sesuai dengan group yang anda inginkan :<br><br>
        Pilih Group :<br>
                <select type=text name='".md5("id_group")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:300px;'>
                <option value='$group_kategori[id]'>$group_kategori[nama]</option>
";
$group_query=mysql_query("SELECT*FROM v1_informasi_group ",$sambungan);
while($group=mysql_fetch_array($group_query)){
        echo"<option value='$group[id]'>$group[nama]</option>";
}
echo"   </select><br><br><br>
        Nama Kategori :<br><input type=text name='".md5("kategori")."' value='$edit_kategori[nama]' style='padding:8 10 8 10;border:solid 1px #EAEAEA;font-size:15px;color:black;width:430px;'><br><br>
        Keterangan : <br><textarea name='".md5("ket")."' style='padding:5 5 5 5;width:430px;height:200px'>$edit_kategori[ket]</textarea><br><br>
        Tampil halaman depan (home) :<br>
        <select type=text name='".md5("home")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:300px;'>
                <option value='$edit_kategori[home]'>$edit_kategori[home]</option>
                <option value='Sembunyikan'>Sembunyikan</option>
                <option value='Tampilkan'>Tampilkan</option>
        </select><br><br>
        <input type=submit value='$submit' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Hapus' style='padding:10 10 10 10;;width:100px'>
        </div><div style='height:30px'></div></form>
";
break;

case "":
$kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori ORDER By nama",$sambungan);$no=1;
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar Kategori</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
        <tr>
                <th width=10px>NO</th>
                <th width=200px>KATEGORI</th>
                <th width=60px>DATA</th>
                <th width=140px>OPSI</th>
        </tr>
";
while($kategori=mysql_fetch_array($kategori_query)){
$banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_berita WHERE id_kategori like '$kategori[id]'",$sambungan));
   echo"
        <tr height=40px>
                <td bgcolor=white>$no</td>
                <td bgcolor=white><b style='font-size:12px'>$kategori[nama]</b><br>Status : <i>$kategori[status]</i></td>
                <td bgcolor=white>$banyak tulisan</td>
                <td bgcolor=white align=center>
                <a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("edit_kategori")."&&".md5("id_data")."=$kategori[id]'>edit</a> | 
                <a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("tampil_kategori")."&&".md5("id_data")."=$kategori[id]'>tampil</a> | 
                <a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("hapus_kategori")."&&".md5("id_data")."=$kategori[id]'>hapus</a></td>
        </tr>
   ";$no++;
}
echo"</table></div>";
break;

case md5("lihat_group"):
$group_query=mysql_query("SELECT*FROM v1_informasi_group  ORDER By nama",$sambungan);$no=1;
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar Group</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
        <tr>
                <th width=10px>NO</th>
                <th width=200px>GROUP</th>
                <th width=60px>DATA</th>
                <th width=140px>OPSI</th>
        </tr>
";
while($group=mysql_fetch_array($group_query)){
$kategori=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_kategori WHERE id_group like '$group[id]'",$sambungan));
   echo"
        <tr height=40px>
                <td bgcolor=white>$no</td>
                <td bgcolor=white><b style='font-size:12px'>$group[nama]</b><br>Status : <i>$group[status]</i></td>
                <td bgcolor=white><b>$kategori</b> kategori</td>
                <td bgcolor=white align=center>
                <a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("edit_group")."&&".md5("id_data")."=$group[id]'>edit</a> | 
                <a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("tampil_group")."&&".md5("id_data")."=$group[id]'>tampil</a> | 
                <a href='?".md5("page_halaman")."=".md5("informasi_kategori")."&&".md5("proses")."=".md5("hapus_group")."&&".md5("id_data")."=$group[id]'>hapus</a></td>
        </tr>
   ";$no++;
}
echo"</table></div>";
break;

}
?>
