<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case"":
break;

case md5("Tambah"):
        $namaa=$_POST[md5("nama")];
        $noida=$_POST[md5("noid")];
        $usernamea=$_POST[md5("username")];
        $password_1=$_POST[md5("password_1")];
        $password_2=$_POST[md5("password_2")];
        $wewenanga=$_POST[md5("wewenang")];
        $tempat_lahir=$_POST[md5("tempat_lahir")];
        $tanggal_lahir=$_POST[md5("tanggal_lahir")];
        $bulan_lahir=$_POST[md5("bulan_lahir")];
        $tahun_lahir=$_POST[md5("tahun_lahir")];
        $agama=$_POST[md5("agama")];
        $kelamin=$_POST[md5("kelamin")];
        $alamat=$_POST[md5("alamat")];
        $kota=$_POST[md5("kota")];
        $provinsi=$_POST[md5("provinsi")];
        $email=$_POST[md5("email")];
        $tlp_rumah=$_POST[md5("tlp_rumah")];
        $tlp_hp=$_POST[md5("tlp_hp")];
        $jabatan=$_POST[md5("jabatan")];
	$sec=$_POST[md5("sec")];
	$secc=$_SESSION["secc"];
        if($noida==""){pesan("Nomor identitas anda belum diisi.");}
	elseif($secc!=$sec){pesan("Kode keamanan tidak sesuai.");}
        elseif($namaa==""){pesan("Nama anda belum diisi.");}
        elseif($usernamea==""){pesan("Username anda belum diisi.");}
        elseif($password_1==""){pesan("Password anda belum diisi.");}
        elseif($password_2==""){pesan("Re-Password anda belum diisi.");}
        elseif($wewenanga==""){pesan("Wewenang anda belum diisi.");}
        elseif($tempat_lahir==""){pesan("Tempat lahir anda belum diisi.");}
        elseif($tanggal_lahir==""){pesan("Tanggal lahir anda belum diisi.");}
        elseif($bulan_lahir==""){pesan("Bulan lahir anda belum diisi.");}
        elseif($tahun_lahir==""){pesan("Tahun lahir anda belum diisi.");}
        elseif($agama==""){pesan("Agama anda belum diisi.");}
        elseif($kelamin==""){pesan("Kelamin anda belum diisi.");}
        elseif($alamat==""){pesan("Alamat anda belum diisi.");}
        elseif($kota==""){pesan("Kota anda belum diisi.");}
        elseif($provinsi==""){pesan("Provinsi anda belum diisi.");}
        elseif($email==""){pesan("Email anda belum diisi.");}
        elseif($tlp_rumah==""){pesan("Telephone rumah anda belum diisi.");}
        elseif($tlp_hp==""){pesan("Nomor handphone anda belum diisi.");}
        elseif($jabatan==""){pesan("Jabatan anda belum diisi.");}
        elseif("$password_1"!="$password_2"){pesan("Password yang anda masukkan tidak sesuai.");}
        else{
                $simpan_query=mysql_query("INSERT INTO vi_user VALUE ('','$usernamea','".md5("$password_1")."','$wewenanga','$jabatan','$namaa','$noida','$tempat_lahir','$tanggal_lahir','$bulan_lahir','$tahun_lahir','$kelamin','$agama','$alamat','$kota','$provinsi','$pos','$email','$tlp_rumah','$tlp_hp','blank.jpg','$tanggal','$bulan','$tahun','$ip','$host','$jam','Active','','','','','','','','','','','','','','','','','','','','','','','','','')",$sambungan);
                if($simpan_query){pesan("Pendaftaran user berhasil, silahkan login dengan menggunakan username dan password anda. Jaga kerahasiaan username dan password anda.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Pendaftaran gagal, silahkan coba kembali.");}
        } 
break;

case md5("Simpan"):
        $namaa=$_POST[md5("nama")];
        $id_data=$_POST[md5("id_data")];
        $noida=$_POST[md5("noid")];
        $usernamea=$_POST[md5("username")];
        $password_1=$_POST[md5("password_1")];
        $password_2=$_POST[md5("password_2")];
        $wewenanga=$_POST[md5("wewenang")];
        $tempat_lahir=$_POST[md5("tempat_lahir")];
        $tanggal_lahir=$_POST[md5("tanggal_lahir")];
        $bulan_lahir=$_POST[md5("bulan_lahir")];
        $tahun_lahir=$_POST[md5("tahun_lahir")];
        $agama=$_POST[md5("agama")];
        $kelamin=$_POST[md5("kelamin")];
        $alamat=$_POST[md5("alamat")];
        $kota=$_POST[md5("kota")];
        $provinsi=$_POST[md5("provinsi")];
        $email=$_POST[md5("email")];
        $tlp_rumah=$_POST[md5("tlp_rumah")];
        $tlp_hp=$_POST[md5("tlp_hp")];
        $jabatan=$_POST[md5("jabatan")];
        if($noida==""){pesan("Nomor identitas anda belum diisi.");}
        elseif($namaa==""){pesan("Nama anda belum diisi.");}
        elseif($usernamea==""){pesan("Username anda belum diisi.");}
        elseif($password_1==""){pesan("Password anda belum diisi.");}
        elseif($password_2==""){pesan("Re-Password anda belum diisi.");}
        elseif($wewenanga==""){pesan("Wewenang anda belum diisi.");}
        elseif($tempat_lahir==""){pesan("Tempat lahir anda belum diisi.");}
        elseif($tanggal_lahir==""){pesan("Tanggal lahir anda belum diisi.");}
        elseif($bulan_lahir==""){pesan("Bulan lahir anda belum diisi.");}
        elseif($tahun_lahir==""){pesan("Tahun lahir anda belum diisi.");}
        elseif($agama==""){pesan("Agama anda belum diisi.");}
        elseif($kelamin==""){pesan("Kelamin anda belum diisi.");}
        elseif($alamat==""){pesan("Alamat anda belum diisi.");}
        elseif($kota==""){pesan("Kota anda belum diisi.");}
        elseif($provinsi==""){pesan("Provinsi anda belum diisi.");}
        elseif($email==""){pesan("Email anda belum diisi.");}
        elseif($tlp_rumah==""){pesan("Telephone rumah anda belum diisi.");}
        elseif($tlp_hp==""){pesan("Nomor handphone anda belum diisi.");}
        elseif($jabatan==""){pesan("Jabatan anda belum diisi.");}
        elseif("$password_1"!="$password_2"){pesan("Password yang anda masukkan tidak sesuai.");}
        elseif($id_data==1){pesan("Maaf user ini tidak dapat anda rubah datanya.");}
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET nama='$namaa',wewenang='$wewenanga',password='".md5("$password_1")."',username='$usernamea',noid='$noida',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',bulan_lahir='$bulan_lahir',tahun_lahir='$tahun_lahir',agama='$agama',kelamin='$kelamin',alamat='$alamat',kota='$kota',provinsi='$provinsi',email='$email',tlp_rumah='$tlp_rumah',tlp_hp='$tlp_hp',jabatan='$jabatan' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Data user telah diubah.");$_GET[md5("aksi")]=md5("Check");}
                else{pesan("Pendaftaran gagal, silahkan coba kembali.");}
        }
        $_GET[md5("ok")]=md5("yes");$_GET[md5("id_data")]=$id_data;
break;

}




switch($_GET[md5("aksi")]){
case md5("Check"):
$biodata=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE username like '$usernamea' AND noid like '$noida'",$sambungan));
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Biodata Anda</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table border=0 width=100% cellspacing=5 cellpadding=5>
        <tr>
                <td align=center colspan=3><img src='foto_user/$biodata[avatar]' style='border:solid 1px black;padding:3 3 3 3  ;' width=100px></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Nama Lengkap</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[nama]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>No Identitas</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[noid]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Username</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[username]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Tempat Lahir</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[tempat_lahir]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Tanggal Lahir</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[tanggal_lahir] $biodata[bulan_lahir] $biodata[tahun_lahir]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Agama / Kelamin</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[agama] / $biodata[kelamin]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Alamat</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[alamat]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Kota</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[kota]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Provinsi</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[provinsi]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Email</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[email]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Telp. Rumah</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[tlp_rumah]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Telp. Handphone</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[tlp_hp]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Jabatan</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[jabatan]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Status User</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[status]</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Aksi</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><a href='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("ok")."=".md5("yes")."&&".md5("id_data")."=$biodata[id]'>Edit</a> </td>
        </tr>
        </table>
        </div>                
";
break;

case "":
if($_GET[md5("ok")]==md5("yes")){$id_data=$_GET[md5("id_data")];$biodata=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$id_data'",$sambungan));$po="Simpan";$t="<input type=hidden name='".md5("id_data")."' value='$biodata[id]'>";}
else{
$po="Tambah";
srand(time());
@header("Cache-control: private");
$a1= chr(rand(ord("a"), ord("z")));
$a2= chr(rand(ord("A"), ord("Z")));
$a3= chr(rand(ord("0"), ord("9")));
$a4= chr(rand(ord("11"), ord("20")));
$a5= chr(rand(ord("0"), ord("5")));
$a6= chr(rand(ord("a"), ord("h")));
$sec="$a1$a2$a3$a4$a5";
session_is_registered ('sec');
$_SESSION["secc"]="$sec";

}
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Pendaftaran User</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table border=0 width=100% cellspacing=5 cellpadding=5>
        <form method=post action='?".md5("page_halaman")."=".md5("user_tambah")."&&".md5("proses")."=".md5("$po")."'>$t    
        <tr>
                <td style='width:100px;font-size:12px'>Nama Lengkap</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("nama")."' value='$biodata[nama]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>No Identitas</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("noid")."' value='$biodata[noid]' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Username</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("username")."' value='$biodata[username]' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Password</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=password name='".md5("password_1")."' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Re-Password</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=password name='".md5("password_2")."' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Wewenang</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>
                <select name='".md5("wewenang")."' style='padding:5 5 5 5;font-size:13px;width:150px'>
                        <option value='Pengurus'>Pengurus</option>
                        <option value='Anggota'>Anggota</option>
                        <option value='Alumni'>Alumni</option>
                </select></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Tempat Lahir</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("tempat_lahir")."' value='$biodata[tempat_lahir]' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Tanggal Lahir</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>
                        <select name='".md5("tanggal_lahir")."' style='padding:5 5 5 5;font-size:13px;width:50px'>
                        <option value='$biodata[tanggal_lahir]'>$biodata[tanggal_lahir]</option>";
                $i=1;
                while($i<=31){echo"<option value='$i'>$i</option>";$i++;}

echo"                  </select>&nbsp;&nbsp;
                        
                        <select name='".md5("bulan_lahir")."' style='padding:5 5 5 5;font-size:13px;width:50px'>
                        <option value='$biodata[bulan_lahir]'>$biodata[bulan_lahir]</option>";
                $i=1;
                while($i<=12){echo"<option value='$i'>$i</option>";$i++;}

echo"                  </select>&nbsp;&nbsp;
                         
                        <select name='".md5("tahun_lahir")."' style='padding:5 5 5 5;font-size:13px;width:100px'>
                        <option value='$biodata[tahun_lahir]'>$biodata[tahun_lahir]</option>";
                $i=$tahun;
                while($i>=1960){echo"<option value='$i'>$i</option>";$i--;}

echo"                  </select>&nbsp;&nbsp;
               </td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Agama / Kelamin</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("agama")."' value='$biodata[agama]' style='padding:5 5 5 5;font-size:13px;width:80px'> / 
                <select name='".md5("kelamin")."' style='padding:5 5 5 5;font-size:13px;width:50px'>
                        <option value='$biodata[kelamin]'>$biodata[kelamin]</option>
                        <option value='L'>L</option>
                        <option value='P'>P</option>
                        </select></td>
        </tr>
        <tr valign=top>
                <td style='width:100px;font-size:12px'>Alamat</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><textarea name='".md5("alamat")."' style='padding:5 5 5 5;font-size:13px;width:280px;height:100px'>$biodata[alamat]</textarea></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Kota</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("kota")."' value='$biodata[kota]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Provinsi</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("provinsi")."' value='$biodata[provinsi]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Email</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("email")."' value='$biodata[email]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Telp. Rumah</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("tlp_rumah")."' value='$biodata[tlp_rumah]' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Telp. Handphone</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("tlp_hp")."' value='$biodata[tlp_hp]' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Jabatan</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("jabatan")."' value='$biodata[jabatan]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px' align=right><div align=center style='border:solid 1px #fafafa;padding:10 10 10 10;font-size:15px'><b>$sec</div></td>
                <td style='width;5px;font-size:12px'></td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("sec")."' style='padding:10 10 10 10;font-size:15px;width:100px'>&nbsp;&nbsp;Masukkan kode</td>
        </tr>
	<tr>
                <td style='font-size:12px' colspan=3>
			Catatan :
			<ol>
				<li>Isikan semua data sesuai dengan identitas asli anda. jika data anda tidak sesuai, Administrator berhak untuk menonaktifkan akun anda tanpa pemberitahuan terlebih dahulu.</li>
				<li>Jangan biarkan terdapat formulir yang kosong. berilah tanda <b>-</b> bila data tidak dibutuhkan.</li>
				<li>Dengan mendaftar menjadi user bringin.semarang.go.id anda dapat berperan aktif dalam menyalurkan aspirasi anda melalui sosial network kecamatan bringin ini.</li>
				<li>Jangan anda publikasikan identitas username dan password anda kepada orang lain. jaga kerahasiaan identitas anda tersebut.</li>
			</ol>
		</td>             
        </tr>
        <tr>
                <td style='font-size:12px' colspan=3><input type=submit value='Daftarkan' style='padding:5 5 5 5;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:5 5 5 5;width:100px'></td>             
        </tr></form>
                </table>
        </div>
	
";
break;
}

?>
