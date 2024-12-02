<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case md5("tambah_pesan"):
        $dari=form($_POST[md5("dari")]);
        $emailu=form($_POST[md5("email")]);
        $pesan=form($_POST[md5("pesan")]);
        $security=$_POST[md5("Security")];
        $wewen=form($_POST[md5("wewenang")]);
        if($dari==""){pesan("Anda belum menuliskan nama anda");}
        elseif($emailu==""){pesan("Anda belum menuliskan email anda");}
        elseif($pesan==""){pesan("Anda tidak dapat menuliskan pesan kosong");}
        elseif($security==""){pesan("Anda belum menuliskan kode keamanan");}
        elseif($security!=$_SESSION["serverkeamanan"]){pesan("Kode keamanan yang anda masukkan tidak sesuai");}
        else{
                $tambah=mysql_query("INSERT INTO v1_forum VALUE ('','0','$dari','$emailu','$wewen','$pesan','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','Confirm')",$sambungan);
                if($tambah){pesan("Terimakasih telah mengirimkan pesan kepada kami, pesan anda akan kami tanggapi oleh customer service kami.");}
                else{pesan("Pesan anda gagal di kirim.");}
        }
break;

case md5("laporkan"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melaporkan pesan ini.");}
        else{
                $lapor=mysql_query("UPDATE v1_forum SET laporan='dilaporkan' WHERE id like '$id_data'",$sambungan);
                if($lapor){pesan("Terimakasih telah melaporkan pesan yang tidak layak dari pelanggan.");}
                else{pesan("laporan anda gagal di kirim.");}
        }
break;
}

if($_SESSION['id']==""){
        $tamu="<input type=hidden name='".md5("wewenang")."' value='Tamu'>";
        $pengirim="
                <tr><td>
                        Nama : <input type=text name='".md5("dari")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:170px;'>
                    </td>
                    <td>
                        Email : <input type=text name='".md5("email")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:170px;'>
                    </td>
                </tr>";
        $submit="
        <table >
       <tr valign=top>
            <td>
                Keamanan :<br>
                <img src='securityimg/images.php?width=120&height=30&characters=5' />
            </td>
            <td>
                Masukkan kode :<br>
                <input type=text name='".md5("Security")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:120px;'>
            </td>
            <td> <br>
                <input type=submit value='Kirim' style='padding:7 5 7 5;width:70px'>
            </td>
        </tr></table>
        ";
}else{
        $tamu="<input type=hidden name='".md5("wewenang")."' value='$wewenang'><input type=hidden name='".md5("Security")."' value=' '>";
        $pengirim="<input type=hidden name='".md5("dari")."' value='$id'><input type=hidden name='".md5("email")."' value='$email'>";
        $submit="<div align=right style='padding:0 10 0 0;'><input type=submit value='Kirim' style='padding:7 5 7 5;width:70px'></div>";
        $_SESSION["serverkeamanan"]=" ";
}

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Forum</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:11px;' align=left>
        <table cellspacing=3 cellpadding=3 border=0>
        <form method=post action='?".md5("page_halaman")."=".md5("forum")."&&".md5("proses")."=".md5("tambah_pesan")."'>
        $tamu
        $pengirim
       <tr>
        <td colspan=2>
                <textarea name='".md5("pesan")."' style='padding:5 5 5 5;width:430px;height:45px'></textarea>
        </td>
       </tr>
       </table>
       $submit
       </div></form><div style='height:20px'></div>
";

$pesan_query=mysql_query("SELECT*FROM v1_forum WHERE tujuan like '0' AND status like 'Tampil' ORDER BY id Desc",$sambungan);
while($pesan=mysql_fetch_array($pesan_query)){
$su=mysql_query("SELECT*FROM v1_reforum WHERE id_pesan like '$pesan[id]' AND status like 'Tampil' ORDER BY id",$sambungan);
$sumsu=mysql_num_rows($su);
if($pesan['wewenang']=="Tamu"){
        $img="blank.png";
        $pesan['dari']=$pesan['dari'];
}else{
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$pesan[dari]'",$sambungan));
        $img=$user['avatar'];
        $pesan['dari']=$user['nama'];
}if($_SESSION['id']==""){
        $link_komentar="";
}else{
        $link_komentar="
                         ~ <a href='javascript:void()' onclick=menu('face_wave/forum_komentar_form','".md5("id_data")."=$pesan[id]','form$pesan[id]')  style='font-size:9px'>komentari</a> 
                         ~ <a href='?".md5("page_halaman")."=".md5("forum")."&&".md5("proses")."=".md5("laporkan")."&&".md5("id_data")."=$pesan[id]'  style='font-size:9px'>laporkan</a> 
        ";
}

        echo"
                <div style='border-top:solid 1px #eaeaea;padding:5 5 5 5;'>
                <table border=0 width=100%>
                <tr valign=top>
                        <td width=40px><img src='foto_user/$img' width=40px border=0></td>
                        <td style='font-size:11px;padding:0 0 0 10'>
                                <b style='font-size:12px;color:blue'>$pesan[dari]</b> $pesan[pesan]
                                <div style='height:4px;'></div><i style='font-size:9px'>$pesan[hari], $pesan[tanggal]/$pesan[bulan]/$pesan[tahun] pukul $pesan[jam] $link_komentar 
                                ~ <a href='javascript:void()' onclick=menu('face_wave/forum_komentar','".md5("id_data")."=$pesan[id]','komentar$pesan[id]')  style='font-size:9px'>(<b style='color:red'>$sumsu</b>) komentar</a>
                                </i>
                                <div style='height:5px'></div>
                                <div id='komentar$pesan[id]'></div>
                                <div id='form$pesan[id]'></div>
                        </td>
                </tr>
                </table>
                </div><div style='height:10px'></div>
        ";
}
?>
