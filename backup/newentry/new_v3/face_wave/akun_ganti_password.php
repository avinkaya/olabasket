<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case"":
break;

case md5("Simpan"):
        $password1=$_POST[md5("password_1")];
        $password2=$_POST[md5("password_2")];
        $password3=$_POST[md5("password_3")];
        if($password1==""){pesan("Password lama anda belum diisi.");}
        elseif($password2==""){pesan("Password baru anda belum diisi.");}
        elseif($password3==""){pesan("Re-Password baru anda belum diisi.");}
        elseif("$password2"!="$password3"){pesan("Kedua password baru anda tidak sesuai.");}
        else{
                $check=mysql_num_rows(mysql_query("SELECT*FROM vi_user WHERE id like '$id' AND password like '".md5("$password1")."'",$sambungan));
                if($check!=1){pesan("Anda tidak dapat merubah password anda.");}
                else{
                        $simpan_query=mysql_query("UPDATE vi_user SET password='".md5("$password2")."' WHERE id like '$id'",$sambungan);
                        if($simpan_query){pesan("Password anda telah dirubah. Silahkan logout dan login kembali menggunakan password baru anda.");}
                        else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
                }
        }
        
break;
}

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Ganti Password</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table border=0 width=100% cellspacing=5 cellpadding=5>
        <tr>    <form method=post action='?".md5("page_halaman")."=".md5("akun_ganti_password")."&&".md5("proses")."=".md5("Simpan")."'>
                <td style='width:100px;font-size:12px'>Username</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='font-size:12px'>$username</td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Password Lama</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=password name='".md5("password_1")."' style='padding:5 5 5 5;font-size:13px;width:250px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Password Baru</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=password name='".md5("password_2")."' style='padding:5 5 5 5;font-size:13px;width:250px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Re-Password</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=password name='".md5("password_3")."' style='padding:5 5 5 5;font-size:13px;width:250px'></td>
        </tr>
        <tr>
                <td style='font-size:12px' colspan=3><input type=submit value='Ganti' style='padding:5 5 5 5;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:5 5 5 5;width:100px'></td>             
        </tr></form>
        </table>
        </div><div style='height:20px'></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <b>Tips Keamanan Akun</b>
        <ol>
                <li>Buatlah password dengan panjang minimal 8 karakter;</li>
                <li>Karakter yang digunakan merupakan perpaduan huruf (besar dan kecil), angka, dan tanda baca seperti : ! + - _ # @ dll</li>
                <li>Catat password anda di tempat yang anda anggap aman dan privasi terjamin</li>
                <li>Ganti password anda secara berkala misalnya 2 minggu sekali</li>
                <li>Jangan tunjukkan fasilitas akun anda kepada orang lain, meskipun rekan kerja anda</li>
                <li>Jangan berikan username dan password anda kepada orang lain baik melalui media cetak, online maupun visual</li>
                <li>Jangan lupa logout akun anda bila hendak meninggalkan komputer/laptop anda</li>
                <li>Ingatlah selalu perubahan - perubahan data akun anda untuk mendeteksi ada perubahan yang mungkin tidak anda lakukan</li>
                <li>Segera laporkan kepada webmaster/site developer anda apabila akun anda telah digunakan oleh orang yang tidak bertanggungjawab</li>
                <li>Setiap user yang melakukan login akan selalu dicatat oleh sistem, data - data yang dicatat meliputi : user, waktu, tanggal, lokasi akses, jaringan akses, kode komputer/laptop, dll.</li>
        </ol>
        </div>
";
?>
