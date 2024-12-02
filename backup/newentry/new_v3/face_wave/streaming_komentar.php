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
                                <div style='height:2px'></div><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Anda tidak dapat mengomentari pesan kosong.</div><div style='height:2px'></div>
                        ";
                }else{
                mysql_query("INSERT INTO v1_tag_komentar VALUE ('','$id_tag','$id','$wewenang','$komentar','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','Tampil','')",$sambungan);
                }
        break;
        }

$kom=mysql_query("SELECT*FROM v1_tag_komentar WHERE id_tag like '$id_tag' AND status like 'Tampil'",$sambungan);
$sum=mysql_num_rows($kom);
if($sum!=0){
echo"<div style='padding:10 5 10 5;background:#fafafa' align=left>Komentar : <b style='color:red'>$sum</b> orang mengomentari</div>";
        while($data=mysql_fetch_array($kom)){
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$data[id_user]'",$sambungan));
        $img=$user['avatar'];
        echo"
                                <div style='height:2px'></div>
                                <div style='padding:5 5 10 5;border-top:solid 1px #fafafa'>
                                        <table border=0 width=100%>
                                        <tr valign=top>
                                                <td width=40px><img src='foto_user/$img' width=40px border=0></td>
                                                <td style='font-size:11px;padding:0 0 0 10'>
                                                        <b style='font-size:12px;color:blue'>$user[nama]</b> 
                                                        $data[komentar]
                                                        <br><br><i>$data[hari], $data[tanggal]/$data[bulan]/$data[tahun] pukul $data[jam]</i>
                                                </td>
                                        </tr>
                                        </table>
                                </div>
        ";}}


echo"
        <div align=left style='border-top:solid 1px #eaeaea;background:#fafafa'>
        <table width=100%>
        <tr valign=top><td>
                <img src='foto_user/$use[avatar]' width=40px>
        </td>
";?>

        <td>
                <form name="form_1" onsubmit="posting_var('face_wave/streaming_komentar','aksi=tambah&komentar='+document.form_1.input.value,'komentar'); return false;">
                <textarea name="input" style="width:300px;height:40px;padding:5 5 5 5;font-size:11px"></textarea>
        </td><td>
                <input onclick="posting_var('face_wave/streaming_komentar','aksi=tambah&komentar='+document.form_1.input.value,'komentar')" type="button" value="Kirim" style="padding:10 10 10 10;height:40px;width:100px">
        </form>
        </td></tr></table>

<?php
echo"   </div><div style='height:2px;border-bottom:solid 1px #fafafa;'></div>";
}else{
echo"
        <div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Untuk memberi komentar silahkan <b><a href='?".md5("page_halaman")."=".md5("Login")."'>login</a></b> terlebih dahulu. Jika anda belum menjadi user silahkan <b>daftar</b> dahulu.</div>
";
}
?>
