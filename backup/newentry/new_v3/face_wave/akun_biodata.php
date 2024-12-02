<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");


switch($_GET[md5("proses")]){
case"":
break;

case md5("Simpan"):
        $noid=$_POST[md5("noid")];
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
        if($noid==""){pesan("Nomor identitas anda belum diisi.");}
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
        else{
                $simpan_query=mysql_query("UPDATE vi_user SET noid='$noid',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',bulan_lahir='$bulan_lahir',tahun_lahir='$tahun_lahir',agama='$agama',kelamin='$kelamin',alamat='$alamat',kota='$kota',provinsi='$provinsi',email='$email',tlp_rumah='$tlp_rumah',tlp_hp='$tlp_hp',jabatan='$jabatan' WHERE id like '$id'",$sambungan);
                if($simpan_query){pesan("Biodata anda telah disimpan. lakukan editing biodata apabila anda perubahan yang diperlukan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
        
break;
}



$biodata=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$id'",$sambungan));
switch($_GET[md5("aksi")]){
case"":
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
                <td style='width;100%;font-size:12px'><a href='?".md5("page_halaman")."=".md5("akun_biodata")."&&".md5("aksi")."=".md5("Form_Edit")."'>Edit</a> </td>
        </tr>
        </table>
        </div>                
";
break;

case md5("Form_Edit"):
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Edit Biodata Anda</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table border=0 width=100% cellspacing=5 cellpadding=5>
        <tr>    <form method=post action='?".md5("page_halaman")."=".md5("akun_biodata")."&&".md5("proses")."=".md5("Simpan")."'>
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
                <td style='width;100%;font-size:12px'><input type=text name='".md5("noid")."' value='$biodata[noid]' style='padding:5 5 5 5;font-size:13px;width:200px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Username</td>
                <td style='width;5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'>$biodata[username]</td>
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
                <td style='font-size:12px' colspan=3><input type=submit value='Simpan' style='padding:5 5 5 5;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:5 5 5 5;width:100px'></td>             
        </tr></form>
                </table>
        </div>                
";
break;
}

?>
