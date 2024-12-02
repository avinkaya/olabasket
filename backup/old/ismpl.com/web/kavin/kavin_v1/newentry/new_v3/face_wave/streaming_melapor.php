<?php
session_start();
define ('www.kampungbudaya.co.cc_expresso',1);
include("log_data.php");
include("fungsi.php");
include("../TuneUp/dbase_conection.php");
$use=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$id'",$sambungan));

if($_GET[md5("id_data")]!=""){
        $id_tag=$_GET[md5("id_data")];
        $_SESSION["id_tag"]="$id_tag";
}elseif($_SESSION["id_tag"]!=""){
        $id_tag=$_SESSION["id_tag"];
}

if($id!=""&$id_tag!=""){
        switch($_POST['aksi']){
        case "tambah":
                $komentar=form($_POST["komentar"]);
                if($komentar==""){  
                        echo"
                                <div style='height:2px'></div><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Anda tidak dapat melaporkan content ini tanpa ada alasan yang jelas!</div><div style='height:2px'></div>
                        ";
                }else{
                $tambah=mysql_query("INSERT INTO v1_tag_laporan VALUE ('','$id_tag','$id','$wewenang','$komentar','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','Tampil','')",$sambungan);
                if($tambah){  
                        echo"
                                <div style='height:2px'></div><div style='border:solid 1px gold;background:yellow;padding:10 10 10 10;'>Terimakasih telah melaporkan content ini,<br>laporan anda akan kami periksa dahulu.</div><div style='height:2px'></div>
                        ";
                }else{
                        echo"
                                <div style='height:2px'></div><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Laporan anda gagal terkirim.</div><div style='height:2px'></div>
                        ";
                }}
        break;
        }


echo"<div style='padding:10 5 10 5;background:#fafafa' align=left>Laporkan : berikan alasan mengapa anda melaporkan hal ini?</div>
        <div align=left style='border-top:solid 1px #eaeaea;'>
        <table width=100%>
        <tr valign=top><td>
                <img src='foto_user/$use[avatar]' width=40px>
        </td>
";?>

        <td>
                <form name="form_1" onsubmit="posting_var('face_wave/streaming_melapor','aksi=tambah&komentar='+document.form_1.input.value,'komentar'); return false;">
                <textarea name="input" style="width:300px;height:50px;padding:5 5 5 5;font-size:11px"></textarea>
        </td><td>
                <input onclick="posting_var('face_wave/streaming_melapor','aksi=tambah&komentar='+document.form_1.input.value,'komentar')" type="button" value="Laporkan" style="padding:10 10 10 10;height:40px;width:100px">
        </form>
        </td></tr></table>

<?php
echo"   </div><div style='height:2px;border-bottom:solid 1px #fafafa;'></div>";
}else{
echo"
        <div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Untuk melaporkan silahkan <b><a href='?".md5("page_halaman")."=".md5("Login")."'>login</a></b> terlebih dahulu. Jika anda belum menjadi user silahkan <b>daftar</b> dahulu.</div>
";
}
?>
