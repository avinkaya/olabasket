<?php
session_start();
include("dbase_conection.php");
$nik=$_GET["nik"];
if($nik!=""){$_SESSION["nikses"]="$nik";$nikk=$nik;}else{$nikk=$_SESSION["nikses"];}

switch($_GET["proses"]){
case "kirim":
  function uploadfile($fileFoto,$ia,$random) {
  	$folder = '../user_photo/';
  	$fileTujuan = $folder."$ia"."_".$random."_".$fileFoto['name'];
  	if (move_uploaded_file($fileFoto['tmp_name'], $fileTujuan)) {return true;} else {return false;}
  }
  $random_digit=rand(0000,9999);
  $prosesUpload = uploadfile($_FILES["file_data"],$nikk,$random_digit);
  	$file=$nikk."_".$random_digit."_".$_FILES["file_data"]["name"];
	$size=$_FILES["file_data"]["size"];
	$extensi=$_FILES["file_data"]["type"];
  if ($prosesUpload & $_FILES["file_data"] != "") {
    	if(mysql_query("UPDATE hrd_staff_data SET photo='$file' WHERE nik like '$nikk'")){
	  echo"<script language='javascript'>window.alert('File berhasil disimpan')</script>";$view="sukses";
	}else{echo"<script language='javascript'>window.alert('File gagal disimpan')</script>";$view="";}
    }else{echo"<script language='javascript'>window.alert('File terlalu besar, kompreslah terlebih dahulu.')</script>";$view="";}
break;
}

$data=mysql_fetch_array(mysql_query("SELECT photo FROM hrd_staff_data WHERE nik like '$nikk'"));
if($data[photo]==""){$photo="default.jpg";}else{$photo=$data["photo"];}
echo"
<div style='padding:10 5 10 5;background:#fafafa;border-top:solid 1px #bababa;font-size:12px;font-family:arial;' align=left><b>Foto Profil</b></div><div style='height:2px'></div>
<div style='padding:5 0 0 0;border-top:solid 1px #fafafa' align=justify>
<table border=0 width=100% cellspacing=0 cellpadding=0>
<tr valign=top>
	<td width=30px>
		<img src='../user_photo/$photo' style='border:solid 0px #f4e2d3;padding:3 3 3 3;' height=150px>
	</td>
	<td style='font-size:12px;padding:0 0 0 10;font-family:arial;'>
";

switch($view){
case"":
echo"
		<form method=post action='page_photo_upload.php?proses=kirim' enctype='multipart/form-data'>
		Foto harus berwarna, rapih dan sopan. Gunakan foto terbaru dalam sistem ini.<br><br>
		Pilih foto dari komputer anda <i><small>(maxsize 30kB)</small></i> :<br>
		<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />
		<input style='width:330px' name='file_data' type='file' style='padding:17 17 17 17;'/>
		<div style='height:3px'></div>
		<input type='submit' value='Terapkan' style='padding:7 7 7 7;' /></form>
";
break;
case"sukses":
echo"Photo telah diterapkan. Penambahan staff baru telah berhasil.";
break;
}
echo"	</td>
	</tr>
	</table>
</div>";

?>
