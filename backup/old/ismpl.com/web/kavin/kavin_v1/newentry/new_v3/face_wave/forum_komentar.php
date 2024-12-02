<?php
session_start();
define ('www.kampungbudaya.co.cc_expresso',1);
include("log_data.php");
include("fungsi.php");
include("../TuneUp/dbase_conection.php");
if($_GET[md5("id_data")]!=""){$id_data=$_GET[md5("id_data")];}
elseif($_POST['id_data']!=""){$id_data=$_POST['id_data'];}

switch($_POST["proses"]){
case "tambah_komentar":
        $pesan=form($_POST["komentar"]);
        $id_data=form($_POST["id_data"]);
        if($pesan==""){pesan("Anda tidak dapat menuliskan komentar kosong");}
        elseif($id_data==""){pesan("Anda tidak dapat memberi komentar");}
        else{
                $tambah=mysql_query("INSERT INTO v1_reforum VALUE ('','$id_data','$id','$email','$wewenang','$pesan','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','Tampil')",$sambungan);
                if($tambah){pesan("Terimakasih telah mengomentari pesan pelanggan.");}
                else{pesan("komentar anda gagal di kirim.");}
                echo"
                        <script language=javascript> menu('face_wave/forum_komentar_form','".md5("id_data")."=$id_data','form$id_data')</script>
                ";
        }
break;

}



if($_POST['id_data']=="" & $_GET[md5("id_data")]==""){}
else{
$komentar_query=mysql_query("SELECT*FROM v1_reforum WHERE id_pesan like '$id_data' AND status like 'Tampil' ORDER BY id",$sambungan);
$sum_koment=mysql_num_rows($komentar_query);
if($sum_koment!=0){
        echo"<div style='padding:5 5 5 5;background:#fafafa'><img src='icon/coment.png' width=20px align=middle> Komentar : $sum_koment orang mengomentari</div>";
        while($komentar=mysql_fetch_array($komentar_query)){
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$komentar[dari]'",$sambungan));
        $img=$user['avatar'];
        echo"
                <div style='height:2px'></div>
                <div style='padding:5 5 5 5;background:#fafafa'>
                <table border=0 width=100%>
                <tr valign=top>
                        <td width=40px><img src='foto_user/$img' width=40px border=0></td>
                        <td style='font-size:11px;padding:0 0 0 10'>
                                <b style='font-size:12px;color:blue'>$user[nama]</b> 
                                $komentar[pesan]<div style='height:2px'></div>
                                <i>$komentar[hari], $komentar[tanggal]/$komentar[bulan]/$komentar[tahun] pukul $komentar[jam]</i>
                        </td>
                </tr></table></div>
        ";}}

}
?>
