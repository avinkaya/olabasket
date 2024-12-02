<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");
session_start();
if($_GET[md5("page_halaman")]==md5("login_session")){
        $username=$_POST[md5("UsernamE")];
        $password=$_POST[md5("PassworD")];
        $Security=$_POST[md5("Security")];
        if($username==""){pesan("Username masih kosong, silahkan isi dahulu");$_GET[md5("page_halaman")]=md5("Login");}
        elseif($password==""){pesan("Password masih kosong, silahkan isi dahulu");$_GET[md5("page_halaman")]=md5("Login");}
	elseif($_SESSION["serverkeamanan"]==""){pesan("Aplikasi login tidak berfungsi dengan baik.");$_GET[md5("page_halaman")]=md5("Login");}
        elseif($Security!=$_SESSION["serverkeamanan"]){pesan("Kode keamanan yang anda masukkan salah.");$_GET[md5("page_halaman")]=md5("Login");}
        else{
                $check_query=mysql_query("SELECT*FROM vi_user WHERE username like '$username' AND password like '".md5("$password")."' ",$sambungan);
                $check_num=mysql_num_rows($check_query);
                $check_data=mysql_fetch_array($check_query);
                if($check_num==0){pesan("Anda belum terdaftar sebagai user dalam website kami.");$_GET[md5("page_halaman")]=md5("Login");}
                elseif($check_num>=2){pesan("User double erorr, Silahkan hubungi www.lordnet.tk untuk service website ini.");$_GET[md5("page_halaman")]=md5("Login");}
                elseif($check_data['status']=="Confirm"){pesan("Maaf, akun anda belum di aktifasi oleh administrator, silahkan tunggu hingga di aktifasi.");$_GET[md5("page_halaman")]=md5("Login");}
                elseif($check_data['status']=="Blokir"){pesan("Akun anda telah diblokir oleh administrator, anda dilarang menggunakan akun anda.");$_GET[md5("page_halaman")]=md5("Login");}
                elseif($check_data['status']=="Purna"){pesan("Maaf, anda sudah tidak memiliki wewenang dalam mengakses akun anda.");$_GET[md5("page_halaman")]=md5("Login");}
                elseif($check_data){
                        $_SESSION["username"]="$check_data[username]";
                        $_SESSION["nama"]="$check_data[nama]";
                        $_SESSION["noid"]="$check_data[noid]";
                        $_SESSION["email"]="$check_data[email]";
                        $_SESSION["id"]="$check_data[id]";
                        $_SESSION["wewenang"]="$check_data[wewenang]";
                        $_SESSION["jam_login"]="$jam";
                        $u=$_SESSION["username"];
                        $_GET[md5("page_halaman")]="";
                        mysql_query("INSERT INTO v1_log_record VALUE ('','$check_data[id]','$check_data[username]','$ip','$host','$hari','$tanggal','$bulan','$tahun','$jam','','login','not-identivied','not-identivied','not-identivied','not-identivied')",$sambungan);
                        pesan("Selamat datang $u di akun anda, silahkan gunakan fasilitas yang anda perlukan.");}
                else{pesan("Anda tidak dapat login, silahkan coba kembali");$_GET[md5("page_halaman")]=md5("Login");}
        }
}
elseif($_GET[md5("page_halaman")]==md5("login_destroyed")){
        $id_user_online=$_SESSION["id"];
        $login_time=$_SESSION["jam_login"];
        mysql_query("UPDATE v1_log_record SET jam_logout='$jam',status='logout' WHERE id_user like '$id_user_online' AND status like 'login' ",$sambungan);
        session_unregister ('username');
        session_unregister ('nama');
        session_unregister ('noid');
        session_unregister ('email');
        session_unregister ('id');
        session_unregister ('wewenang');
	session_unregister ('serverkeamanan');
        $_GET[md5("page_halaman")]="";
        pesan("Anda telah logout dari akun anda, terima kasih telah mengunjungi kami.");
}


if($_SESSION["id"]==""){
        $button1="<td class='menu linehead'><a href='javascript:void()' onclick=menu('kampungan/kontak','','inti')>Contact</a></td>";
        $button2="<td class='menu linehead'><a href='?".md5("page_halaman")."=".md5("Login")."'>Login</a></td>";
//        $button1="<td class='menu linehead'><a href='?".md5("page_halaman")."=".md5("tag_video_view")."'>Multimedia</a></td>";
}else{
        $akun=$_SESSION["wewenang"];
        $button1="<td class='menu linehead'><a href='?".md5("mode")."=".md5("profil")."'><b  style='color:white'>$akun</b></a></td>";
        $button2="<td class='menu linehead'><a href='../new_v4/?".md5("loginaksi")."=".md5("login_logout")."'><b style='color:red'>Logout</b></a></td>";
        $id=$_SESSION['id'];
        $nama=$_SESSION['nama'];
        $username=$_SESSION['username'];
        $noid=$_SESSION['noid'];
        $email=$_SESSION['email'];
        $wewenang=$_SESSION['wewenang'];
}
switch($_SESSION["site_viewers"]){
case "":
        mysql_query("INSERT INTO v1_log_pengunjung VALUE ('','0','Tamu','$ip','$host','$hari','$tanggal','$bulan','$tahun','$jam','','not-identivied','not-identivied','not-identivied','not-identivied')",$sambungan);
        $_SESSION["site_viewers"]="Tamu";
break;
}
?>
