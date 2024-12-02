<?php
define ('www.kampungbudaya.co.cc_expresso',1);
session_start();
$ide_site=1;
include("TuneUp/dbase_conection.php");
include("face_wave/fungsi.php");
include("face_wave/log_session.php");
include("face_wave/atribut.php");
include("face_wave/top_v1.php");

switch($_GET[md5("mode")]){
case "":
        $pager="face_wave/center_v1.php";
break;

case md5("profil"):
if($id!=""){
        include("kampungan/menu_top.php");
        $pager="kampungan/profil.php";
}else{
        $pager="face_wave/center_v1.php";
        pesan("Maaf masa login anda telah berakhir, jika ingin masuk ke akun silahkan login kembali.");
}
break;

case md5("sahabat"):
if($id!=""){
        include("kampungan/menu_top.php");
        $pager="persahabatan/profil.php";
}else{
        $pager="face_wave/center_v1.php";
        pesan("Maaf masa login anda telah berakhir, jika ingin masuk ke akun silahkan login kembali.");
}
break;
}
include("$pager");
include("face_wave/bottom_v1.php");
?>
