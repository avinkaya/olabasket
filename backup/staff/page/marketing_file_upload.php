<?php
include("dbase_conection.php");
$id=$_GET["id"];
$type=$_POST['type'];
$stylec=$_POST['style'];
echo"   $style
        <form method=post action='marketing_file_upload.php?proses=kirim&id=$id' enctype='multipart/form-data' style='font-family:arial;font-size:12px'>
	Type file &nbsp;
	<select name=type style='padding:2 3 2 3;'>
	       	<option value='a'>File Pola</option>
	       	<option value='b'>Photo Sampel</option>
	       	<option value='c'>Photo Contoh Kain</option>
	</select>&nbsp;&nbsp;
	Style &nbsp;
	<select name=style style='padding:2 3 2 3;'>
";
$styleq=mysql_query("SELECT*FROM marketing_style WHERE idkk like '$id' Order by id Asc");
while($style=mysql_fetch_array($styleq)){
	echo"  	<option value='$style[id]'>$style[stylecom]</option>";
}
echo"
	</select>
	<br><br>
	<table border=0 width=100%>
	<tr>
		<td width=200px>
			<input name='file_data' type='file'>
			<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />
		</td>
		<td><input type='submit' value='Upload' /></td>
	</tr></table>
	</form>
";

SWITCH($_GET["proses"]){
case"kirim":
        function uploadfile($fileFoto,$ia,$random,$ib,$ic) {
  		$folder = '../photo_kk/';
  		$fileTujuan = $folder."$ia.$ic.$ib.".$random.".".$fileFoto['name'];
  		if (move_uploaded_file($fileFoto['tmp_name'], $fileTujuan)) {return true;} else {return false;}
  	}
  	$random_digit=rand(0000,9999);
  	$size=$_FILES["file_data"]["size"];
	$extensi=$_FILES["file_data"]["type"];
	if($extensi=="image/jpeg" or $extensi=="image/png" or $extensi=="image/gif" or $extensi=="image/bmp"){
  		$prosesUpload = uploadfile($_FILES["file_data"],$id,$random_digit,$type,$stylec);
  		$file="$id.$stylec.$type.$random_digit.".$_FILES["file_data"]["name"];
  		if ($prosesUpload & $_FILES["file_data"] != "") {
  	        	switch($type){
	  	        	case"a":
				  	$save=mysql_query("UPDATE marketing_style SET filedesign='$file' WHERE id like '$stylec'");
					if($save){}else{
			        		echo"<script language='javascript'>window.alert('[01] File GAGAL tersimpan.')</script>";
					}
				break;
		  	        case"b":
				  	$save=mysql_query("UPDATE marketing_style SET filephotodesign='$file' WHERE id like '$stylec'");
					if($save){}else{
			        		echo"<script language='javascript'>window.alert('[02] File GAGAL tersimpan.')</script>";
					}
				break;
		  	        case"c":
				  	$save=mysql_query("UPDATE marketing_style SET filephotokain='$file' WHERE id like '$stylec'");
					if($save){}else{
			        		echo"<script language='javascript'>window.alert('[03] File GAGAL tersimpan.')</script>";
					}
				break;
			}
    		}else{echo"<script language='javascript'>window.alert('File terlalu besar, kompreslah terlebih dahulu.')</script>";}
	}else{echo"<script language='javascript'>window.alert('File anda tidak sesuai dengan ketentuan. File yang dapat diupload hanya file gambar dengan type JPG, PNG, GIF atau BMP.')</script>";}
break;
}

$styleq=mysql_query("SELECT*FROM marketing_style WHERE idkk like '$id' Order by id Asc");
while($style=mysql_fetch_array($styleq)){

	echo"
		<div style='border:solid 1px rgb(147,151,145);background:#EAEAEA;padding:7 7 7 7'><b>$style[stylecom]</b></div>
		<div style='font-family:arial;font-size:12px;padding:5 5 5 5;border:solid 1px rgb(147,151,145);border-top:solid 0px white;'>
	";
	if($style['filedesign']==""&$style['filephotodesign']==""&$style['filephotokain']==""){echo"Belum ada file untuk style ini";}
	else{
		if($style['filedesign']!=""){echo"<img src='../photo_kk/$style[filedesign]' height=60px style='border:solid 1px rgb(147,151,145)'>&nbsp;&nbsp;";}
		if($style['filephotodesign']!=""){echo"<img src='../photo_kk/$style[filephotodesign]' height=60px style='border:solid 1px rgb(147,151,145)'>&nbsp;&nbsp;";}
		if($style['filephotokain']!=""){echo"<img src='../photo_kk/$style[filephotokain]' height=60px style='border:solid 1px rgb(147,151,145)'>&nbsp;&nbsp;";}
	}
	echo"	</div>&nbsp;
	";
}
?>
