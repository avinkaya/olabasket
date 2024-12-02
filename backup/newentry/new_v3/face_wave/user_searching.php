<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Searching User</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Pencarian data user, silahkan masukkan kata kunci dari user yang ingin dicari pada form yang disediakan.<br><br>
                <table border=0 cellspacing=3 cellpadding=2>
                <tr><form method=post action='?".md5("page_halaman")."=".md5("user_searching")."'>
                        <td>
                                Target Pencarian :<br>
                                <select name='".md5("field")."' style='padding:7 7 7 7;width=200px'>
                                        <option value='nama'>Nama</option>
                                        <option value='noid'>No Identitas</option>
                                        <option value='username'>Username</option>
                                        <option value='jabatan'>Jabatan</option>
                                </select>
                        </td>
                        <td>
                                Kata Kunci :<br>
                                <input type=text name='".md5("kunci")."' style='padding:7 7 7 7;width:250px'>
                        </td>
                        <td>
                                <br>
                                <input type=submit value='Cari' style='padding:7 7 7 7;width:70px'>
                        </td>
                </tr></table></form>
       </div><div style='height:10px'></div>
";

switch($_GET[md5("proses")]){
case md5("Aktif"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Active' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Blokir"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Blokir' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Purna"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Purna' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Hapus"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Hapus' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;
}
$kunci=$_POST[md5("kunci")];
$field=$_POST[md5("field")];
if($kunci==""){$kunci=0;}
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar User</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah daftar user yang dicari dengan kata kunci <b>$kunci</b>, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=40px>FOTHO</th>
                        <th width=180px>IDENTITAS</th>
                        <th width=15px>WEWENANG</th>
                        <th width=20px>OPSI</th>
                </tr>";
        
        $user_query=mysql_query("SELECT*FROM vi_user WHERE $field like '%$kunci%' ORDER By rand();",$sambungan);$no=1;
        $user_banyak=mysql_num_rows($user_query);
        if($user_banyak==0){
         echo"
                <tr>
                        <td colspan=5 style='background:white'>Belum terdapat data ..</td>
                </tr>
         ";
        }else{
        while($user=mysql_fetch_array($user_query)){
        echo"        <tr valign=top>
                        <td style='background:white' align=center>$no</td>
                        <td style='background:white'><img src='foto_user/$user[avatar]' border=0 width=40px></td>
                        <td style='background:white'><b>$user[nama]</b><br>No. ID : $user[noid]<br>Username : $user[username]<br>Email : $user[email]</td>
                        <td style='background:white'>$user[wewenang]<br><br>Status : <i>$user[status]</i></td>
                        <td style='background:white'>
                                <a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("id_data")."=$user[id]&&".md5("ok")."=".md5("yes")."'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("user_searching")."&&".md5("id_data")."=$user[id]&&".md5("proses")."=".md5("Aktif")."'>[ Aktif ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_searching")."&&".md5("id_data")."=$user[id]&&".md5("proses")."=".md5("Blokir")."'>[ Blokir ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_searching")."&&".md5("id_data")."=$user[id]&&".md5("proses")."=".md5("Purna")."'>[ Purna  ]</a><br> 
                                <a href='?".md5("page_halaman")."=".md5("user_searching")."&&".md5("id_data")."=$user[id]&&".md5("proses")."=".md5("Hapus")."'>[ Hapus  ]</a>                        </td>
                </tr>";$no++;
        }}

echo"  </table></div>";

?>
