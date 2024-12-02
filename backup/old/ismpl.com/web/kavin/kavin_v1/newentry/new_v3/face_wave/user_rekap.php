<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Menu</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <table cellspacing=1 cellpadding=4 width=100% >
                <tr>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("user_rekap")."'><img src='icon/user_tampil.png' width=40px border=0></a><br>User Aktif</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("tampil")."=".md5("Konfirm")."'><img src='icon/user_konfirm.png' width=40px border=0></a><br>Pengajuan User</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("tampil")."=".md5("Blokir")."'><img src='icon/user_blokir.png' width=40px border=0></a><br>User Blokir</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("tampil")."=".md5("Purna")."'><img src='icon/user_purna.png' width=40px border=0></a><br>User Purna</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("tampil")."=".md5("Hapus")."'><img src='icon/user_hapus.png' width=40px border=0></a><br>User Hapus</th>
                </tr>
                </table>
       </div><div style='height:10px'></div>
";

switch($_GET[md5("proses")]){
case md5("Aktif"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
 //       elseif($id_data==1 or $id_data==11){pesan("Maaf user ini tidak dapat anda rubah datanya.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Active' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Blokir"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
//        elseif($id_data==1 or $id_data==11){pesan("Maaf user ini tidak dapat anda rubah datanya.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Blokir' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Purna"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
//        elseif($id_data==1 or $id_data==11){pesan("Maaf user ini tidak dapat anda rubah datanya.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Purna' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Hapus"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
//        elseif($id_data==1 or $id_data==11){pesan("Maaf user ini tidak dapat anda rubah datanya.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET status='Hapus' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;
}

switch($_GET[md5("tampil")]){
case"":
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar User</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah daftar user yang telah menjadi member, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=40px>FOTHO</th>
                        <th width=180px>IDENTITAS</th>
                        <th width=15px>WEWENANG</th>
                        <th width=20px>OPSI</th>
                </tr>";

        $user_query=mysql_query("SELECT*FROM vi_user WHERE status like 'Active' ORDER By rand();",$sambungan);$no=1;
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
                        <td style='background:white'>$user[wewenang]</td>
                        <td style='background:white'>
                                <a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("ok")."=".md5("yes")."&&".md5("id_data")."=$user[id]'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Aktif")."&&".md5("id_data")."=$user[id]'>[ Aktif ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Blokir")."&&".md5("id_data")."=$user[id]'>[ Blokir ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Purna")."&&".md5("id_data")."=$user[id]'>[ Purna  ]</a><br> 
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$user[id]'>[ Hapus  ]</a>                        </td>
                </tr>";$no++;
        }}

echo"  </table></div>";
break;

case md5("Konfirm"):
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar Pengajuan User</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah daftar pengajuan untuk member/user, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=40px>FOTHO</th>
                        <th width=180px>IDENTITAS</th>
                        <th width=15px>WEWENANG</th>
                        <th width=20px>OPSI</th>
                </tr>";

        $user_query=mysql_query("SELECT*FROM vi_user WHERE status like 'Confirm' ORDER By rand();",$sambungan);$no=1;
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
                        <td style='background:white'>$user[wewenang]</td>
                        <td style='background:white'>
                                <a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("ok")."=".md5("yes")."&&".md5("id_data")."=$user[id]'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Aktif")."&&".md5("id_data")."=$user[id]'>[ Aktif ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Blokir")."&&".md5("id_data")."=$user[id]'>[ Blokir ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Purna")."&&".md5("id_data")."=$user[id]'>[ Purna  ]</a><br> 
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$user[id]'>[ Hapus  ]</a>                        </td>
                </tr>";$no++;
        }}

echo"  </table></div>";
break;

case md5("Blokir"):
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar User Terblokir</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah daftar user yang diblokir, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=40px>FOTHO</th>
                        <th width=180px>IDENTITAS</th>
                        <th width=15px>WEWENANG</th>
                        <th width=20px>OPSI</th>
                </tr>";

        $user_query=mysql_query("SELECT*FROM vi_user WHERE status like 'Blokir' ORDER By rand();",$sambungan);$no=1;
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
                        <td style='background:white'>$user[wewenang]</td>
                        <td style='background:white'>
                                <a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("ok")."=".md5("yes")."&&".md5("id_data")."=$user[id]'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Aktif")."&&".md5("id_data")."=$user[id]'>[ Aktif ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Blokir")."&&".md5("id_data")."=$user[id]'>[ Blokir ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Purna")."&&".md5("id_data")."=$user[id]'>[ Purna  ]</a><br> 
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$user[id]'>[ Hapus  ]</a>                        </td>
                </tr>";$no++;
        }}

echo"  </table></div>";
break;

case md5("Purna"):
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar User Purna Tugas</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah daftar User yang tidak memiliki wewenang sebagai karyawan perusahaan, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=40px>FOTHO</th>
                        <th width=180px>IDENTITAS</th>
                        <th width=15px>WEWENANG</th>
                        <th width=20px>OPSI</th>
                </tr>";

        $user_query=mysql_query("SELECT*FROM vi_user WHERE status like 'Purna' ORDER By rand();",$sambungan);$no=1;
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
                        <td style='background:white'>$user[wewenang]</td>
                        <td style='background:white'>
                                <a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("ok")."=".md5("yes")."&&".md5("id_data")."=$user[id]'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Aktif")."&&".md5("id_data")."=$user[id]'>[ Aktif ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Blokir")."&&".md5("id_data")."=$user[id]'>[ Blokir ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Purna")."&&".md5("id_data")."=$user[id]'>[ Purna  ]</a><br> 
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$user[id]'>[ Hapus  ]</a>                        </td>
                </tr>";$no++;
        }}

echo"  </table></div>";
break;

case md5("Hapus"):
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Daftar User Terhapus</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Berikut ini adalah daftar user yang dihapus, silahkan lakukan pengelolaan dengan memilih link pada tabel opsi.<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=40px>FOTHO</th>
                        <th width=180px>IDENTITAS</th>
                        <th width=15px>WEWENANG</th>
                        <th width=20px>OPSI</th>
                </tr>";

        $user_query=mysql_query("SELECT*FROM vi_user WHERE status like 'Hapus' ORDER By rand();",$sambungan);$no=1;
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
                        <td style='background:white'>$user[wewenang]</td>
                        <td style='background:white'>
                                <a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("ok")."=".md5("yes")."&&".md5("id_data")."=$user[id]'>[ Edit ]</a> <br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Aktif")."&&".md5("id_data")."=$user[id]'>[ Aktif ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Blokir")."&&".md5("id_data")."=$user[id]'>[ Blokir ]</a><br>
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Purna")."&&".md5("id_data")."=$user[id]'>[ Purna  ]</a><br> 
                                <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$user[id]'>[ Hapus  ]</a>
                        </td>
                </tr>";$no++;
        }}

echo"  </table></div>";
break;

}
?>
