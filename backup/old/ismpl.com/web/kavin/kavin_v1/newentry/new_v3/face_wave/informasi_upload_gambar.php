<?php
session_start();
SWITCH($_GET['view']){
	case"":
	        $_SESSION['avatar1']="";
	        $_SESSION['size']="";
		$_SESSION['extensi']="";
	        echo"
	                <div style='position:fixed; left:0%; top:10%; width:100%' align=center >
			<div style='padding:5 10 5 10;width:500px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=menu('face_wave/informasi_upload_gambar','view=blank','upload');>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absensi</b> | $data[tanggal]$data[bulan]$data[tahun] : NIK $data[nik]</div>
			<div style='padding:10 10 10 10;width:500px;border:solid 1px #6F0000;background:white' align=left>
			        <iframe src='face_wave/informasi_upload_gambar.php?view=form' width=490px height=350px frameSpacing='0' frameBorder='0' scrolling='yes'></iframe>
			</div>
		";
	break;
	
	case"form":
		echo"
		        <form method=post action='informasi_upload_gambar.php?view=form&aksi=upload' enctype='multipart/form-data'>
		        File
			<input name='file_data' type='file' style='border:solid 1px #C0C0C0;padding:7 7 7 7;'>
			<input type='hidden' name='MAX_FILE_SIZE' value='3000000000' />
			<input type='submit' value='Upload'/></form>
		";
	break;
	case"blank":break;
}

SWITCH($_GET['aksi']){
	case"":$_SESSION['avatar']="";break;
	case"upload":
                function uploadfile($fileFoto,$random) {
  			$folder = '../img_data/informasi/';
  			$fileTujuan = $folder.$random.".".$fileFoto['name'];
	  		if (move_uploaded_file($fileFoto['tmp_name'], $fileTujuan)) {return true;} else {return false;}
	  	}
  		$random_digit=rand(0000,9999);
	  	$size=$_FILES["file_data"]["size"];
		$extensi=$_FILES["file_data"]["type"];
		if($extensi=="image/jpeg" or $extensi=="image/png" or $extensi=="image/gif" or $extensi=="image/bmp"){
  			$prosesUpload = uploadfile($_FILES["file_data"],$random_digit);
  			$file="$random_digit.".$_FILES["file_data"]["name"];
		  		if ($prosesUpload & $_FILES["file_data"] != "") {
                     			$_SESSION['avatar1']="$file";
                     			$_SESSION['size']="$size";
                     			$_SESSION['extensi']="$extensi";
  	        		        echo"<script language='javascript'>window.alert('Proses upload selesai.')</script>";
		    		}else{echo"<script language='javascript'>window.alert('File terlalu besar, kompreslah terlebih dahulu.')</script>";}
			}else{echo"<script language='javascript'>window.alert('File anda tidak sesuai dengan ketentuan. File yang dapat diupload hanya file gambar dengan type JPG, PNG, GIF atau BMP.')</script>";}
			if($_SESSION['avatar1']!=""){
	$avatar=$_SESSION['avatar1'];
	$size=$_SESSION['size'];
	$extensi=$_SESSION['extensi'];
	echo"
	        <div style='padding:7 7 7 7;border:solid 1px #E6E6E6;font-family:arial;font-size:11px'>
			<img src='../img_data/informasi/$avatar' border=0 width=430px style='padding:7 7 7 7;'>
			<br>Name file : <font color=red>$avatar</font><br>Size: <font color=red>$size</font> byte<br>Type : <font color=red>$extensi</font>
		</div>
	";
		}else{
			echo"";
		}
	break;
}


?>
