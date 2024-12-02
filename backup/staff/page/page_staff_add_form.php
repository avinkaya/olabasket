<?php
session_start();
include("dbase_conection.php");
include("page_fungsi_php.php");
include("page_function_time.php");
switch($_POST[md5("v")]){
case"":
	echo"
	<div id='menu_judul_inti'><b>Add New Staff</b></div><br><br>
	<b>Personal Data
	<form name='form1'>
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Employee Identification Number<br><small><i>Nomor Induk Karyawan (NIK)</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='nik' value='$anik' type=text style='width:150px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Name<br><small><i>Nama</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='nama' value='$anama' type=text style='width:350px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Education Degree<br><small><i>Gelar Pendidikan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='gelar' value='$agelar' type=text style='width:100px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Place of Birth<br><small><i>Tempat Lahir</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='tempatlahir' value='$atempatlahir' type=text style='width:200px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Date of Birth<br><small><i>Tanggal Lahir</i></small></td>
	        <td width=1px>:</td>
	        <td>
			<select name='tanggallahir' style='width:60'>";
				$lang="tgl";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='bulanlahir' style='width:150'>";
				$lang="bln";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='tahunlahir' style='width:70'>";
				$lang="thn";include("fungsi_nomor.php");
echo"			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Gender<br><small><i>Jenis Kelamin</i></small></td>
	        <td width=1px>:</td>
	        <td>	<select name='jeniskelamin' style='width:80'>
				<option value='0'>Wanita</option>
				<option value='1'>Pria</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Nationality<br><small><i>Kewarganegaraan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='warganegara' value='$awarganegara' type=text style='width:200px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Religion<br><small><i>Agama</i></small></td>
	        <td width=1px>:</td>
	        <td>
                        <select name='agama' style='width:100'>
				<option value='0'>Islam</option>
				<option value='1'>Kristen</option>
				<option value='2'>Katolik</option>
				<option value='3'>Hindu</option>
				<option value='4'>Buda</option>
				<option value='5'>Lainnya</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Address<br><small><i>Alamat</i></small></td>
	        <td width=1px>:</td>
	        <td><textarea name='alamat' value='$aalamat' style='width:400;height:100;'></textarea></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Sub-district<br><small><i>Kecamatan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kecamatan' value='$akecamatan' type=text style='width:250px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> District/City<br><small><i>Kabupaten/Kota</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kota' value='$akota' type=text style='width:235px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Province<br><small><i>Provinsi</i></small></td>
	        <td width=1px>:</td>
	        <td>
                        <select name='provinsi' style='width:200'>
				<option value='9'>Jawa Tengah</option>";
				$lang="provinsi";include("fungsi_nomor.php");
echo"
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Telephone House<br><small><i>Telephone Rumah</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telprumah' value='$atelprumah' type=text style='width:220px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Mobile Phone<br><small><i>Handphone</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telphp' value='$atelphp' type=text style='width:220px'></td>
	</tr>
	</table><br><br>
	Education data
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Latest Education<br><small><i>Pendidikan Terakhir</i></small></td>
	        <td width=1px>:</td>
	        <td>
	                <select name='luluspend' style='width:150'>
				<option value='0'>SD</MIoption>
				<option value='1'>SLTP/MTs</option>
				<option value='2'>SLTA/MA/SMK</option>
				<option value='3'>D1 (Diploma 1)</option>
				<option value='4'>D2 (Diploma 2)</option>
				<option value='5'>D3 (Diploma 3)</option>
				<option value='6'>D4 (Diploma 4)</option>
				<option value='7'>S1 (Sarjana)</option>
				<option value='8'>S2 (Master)</option>
				<option value='9'>S3 (Doktor)</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Schools / Colleges<br><small><i>Sekolah / Perguruan Tinggi</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='sekolah' value='$asekolah' type=text style='width:400px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Number of Diploma<br><small><i>Nomor Ijasah</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='noijasah' value='$anoijasah' type=text style='width:220px'></td>
	</tr>
	</table><br><br>
	Family data
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Marriage Status<br><small><i>Status Nikah</i></small></td>
	        <td width=1px>:</td>
	        <td>
			<select name='statusnikah' style='width:150'>
			        <option value='1'>Tidak Kawin</option>
			        <option value='2'>Kawin</option>
			        <option value='3'>Duda / Janda</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Name of Husband / Wife<br><small><i>Nama Suami / Istri</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='namasi' value='$anamasi' type=text style='width:300px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Address<br><small><i>Alamat </i></small></td>
	        <td width=1px>:</td>
	        <td><textarea name='alamatsi' value='$aalamatsi' style='width:400;height:100;'></textarea></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Sub - district<br><small><i>Kecamatan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kecamatansi' value='$akecamatansi' type=text style='width:300px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> District / City<br><small><i>Kabupaten / Kota</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kotasi' value='$akotasi' type=text style='width:300px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Province<br><small><i>Provinsi</i></small></td>
	        <td width=1px>:</td>
	        <td><select name='provinsisi' style='width:200'>
				<option value='9'>Jawa Tengah</option>";
				$lang="provinsi";include("fungsi_nomor.php");
echo"
			</select></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Telephone House<br><small><i>Telephone Rumah</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telprumahsi' value='$atelprumahsi' type=text style='width:220px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Mobile Phone<br><small><i>Handphone</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telphpsi' value='$atelphpsi' type=text style='width:220px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Employmeen<br><small><i>Pekerjaan</i></small></td>
	        <td width=1px>:</td>
	        <td>
                       <input name='jobsi' value='$ajobsi' type=text style='width:320px'>
		</td>
	</tr>
	</table><br><br>
	Employment data
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Date Received Work<br><small><i>Tanggal Diterima Bekerja</i></small></td>
	        <td width=1px>:</td>
	        <td>
			<select name='tanggalmasuk' style='width:60'>";
				$lang="tgl";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='bulanmasuk' style='width:150'>";
				$lang="bln";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='tahunmasuk' style='width:70'>";
				$lang="thn";include("fungsi_nomor.php");
echo"			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Old Contract<br><small><i>Lama Kontrak</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='lamakontrak' value='$alamakontrak' type=text style='width:60px'> Bulan</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Employment Status<br><small><i>Status Pekerjaan</i></small></td>
	        <td width=1px>:</td>
	        <td><select name='jobstatus' style='width:150'>";
				$lang="jobstatus";include("fungsi_nomor.php");
echo"
			</select></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Employment Position<br><small><i>Jabatan Pekerjaan</i></small></td>
	        <td width=1px>:</td>
	        <td><select name='jobbagian' style='width:200'>";
				$lang="jobbagian";include("fungsi_nomor.php");
echo"
			</select></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Position Description<br><small><i>Deskripsi Jabatan</i></small></td>
	        <td width=1px>:</td>
	        <td><textarea name=jobbagianketerangan style='width:400;height:100;'>$ajobagianketerangan</textarea></td>
	</tr>
	<input  type=hidden name='jobsubbagian' value='1'>
	<input  type=hidden name='jobline' value='0'>
	<tr valign=top>
	        <td width=200px align=right> salary<br><small><i>Gaji</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='jobgajiharian' value='$ajobgajianharian' type=text style='width:220px'> / hari</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Contract Status<br><small><i>Status Kontrak</i></small></td>
	        <td width=1px>:</td>
	        <td>
                       <select name='jobstatuskontrak' style='width:150'>
				<option value='0'> </option>
				<option value='1'>Staff</option>
				<option value='3'>Freelance</option>
			</select>
		</td>
	</tr>
	</table></form>
";
break;
case md5("p"):
session_start();
	//nik=&nama=&gelar=&tempatlahir=&tanggallahir=&bulanlahir=&tahunlahir=&jeniskelamin=&warganegara=&agama=&alamat=&kecamatan=&kota=&provinsi=&telprumah=&telphp=&luluspend=&sekolah=&noijasah=&statusnikah=&namasi=&alamatsi=&kecamatansi=&kotasi=&provinsisi=&telprumahsi=&telphpsi=&jobsi=&tanggalmasuk=&bulanmasuk=&tahunmasuk=&lamakontrak=&jobstatus=&jobbagian=&jobbagianketerangan=&jobsubbagian=&jobline=&jobgajiharian=&jobstatuskontrak=
        $nik=$_POST["nik"];$_SESSION["nik"]="$nik";
	$nama=$_POST["nama"];$_SESSION['nama']="$nama";
	$gelar=$_POST["gelar"];$_SESSION['gelar']="$gelar";
	$tempatlahir=$_POST["tempatlahir"];$_SESSION['tempatlahir']="$tempatlahir";
	$tanggallahir=$_POST["tanggallahir"];$_SESSION['tanggallahir']="$tanggallahir";
	$bulanlahir=$_POST["bulanlahir"];$_SESSION['bulanlahir']="$bulanlahir";
	$tahunlahir=$_POST["tahunlahir"];$_SESSION['tahunlahir']="$tahunlahir";
	$jeniskelamin=$_POST["jeniskelamin"];$_SESSION['jeniskelamin']="$jeniskelamin";
	$warganegara=$_POST["warganegara"];$_SESSION['warganegara']="$warganegara";
	$agama=$_POST["agama"];$_SESSION['agama']="$agama";
	$alamat=$_POST["alamat"];$_SESSION['alamat']="$alamat";
	$kecamatan=$_POST["kecamatan"];$_SESSION['kecamatan']="$kecamatan";
	$kota=$_POST["kota"];$_SESSION['kota']="$kota";
	$provinsi=$_POST["provinsi"];$_SESSION['provinsi']="$provinsi";
	$telprumah=$_POST["telprumah"];$_SESSION['telprumah']="$telprumah";
	$telphp=$_POST["telphp"];$_SESSION['telphp']="$telphp";
	$luluspend=$_POST["luluspend"];$_SESSION['luluspend']="$luluspend";
	$sekolah=$_POST["sekolah"];$_SESSION['sekolah']="$sekolah";
	$noijasah=$_POST["noijasah"];$_SESSION['noijasah']="$noijasah";
	$statusnikah=$_POST["statusnikah"];$_SESSION['statusnikah']="$statusnikah";
	$namasi=$_POST["namasi"];$_SESSION['namasi']="$namasi";
	$alamatsi=$_POST["alamatsi"];$_SESSION['alamatsi']="$alamatsi";
	$kecamatansi=$_POST["kecamatansi"];$_SESSION['kecamatan']="$kecamatan";
	$kotasi=$_POST["kotasi"];$_SESSION['kotasi']="$kotasi";
	$provinsisi=$_POST["provinsisi"];$_SESSION['provinsisi']="$provinsisi";
	$telprumahsi=$_POST["telprumahsi"];$_SESSION['telprumahsi']="$telprumahsi";
	$telphpsi=$_POST["telphpsi"];$_SESSION['telphpsi']="$telphpsi";
	$jobsi=$_POST["jobsi"];$_SESSION['jobsi']="$jobsi";
	$tanggalmasuk=$_POST["tanggalmasuk"];$_SESSION['tanggalmasuk']="$tanggalmasuk";
	$bulanmasuk=$_POST["bulanmasuk"];$_SESSION['bulanmasuk']="$bulanmasuk";
	$tahunmasuk=$_POST["tahunmasuk"];$_SESSION['tahunmasuk']="$tahunmasuk";
	$lamakontrak=$_POST["lamakontrak"];$_SESSION['lamakontrak']="$lamakontrak";
	$jobstatus=$_POST["jobstatus"];$_SESSION['jobstatus']="$jobstatus";
	$jobbagian=$_POST["jobbagian"];$_SESSION['jobbagian']="$jobbagian";
	$jobbagianketerangan=$_POST["jobbagianketerangan"];$_SESSION['jobbagianketerangan']="$jobbagianketerangan";
	$jobsubbagian=$_POST["jobsubbagian"];$_SESSION['jobsubbagian']="$jobsubbagian";
	$jobline=$_POST["jobline"];$_SESSION['jonline']="$jobline";
	$jobgajiharian=$_POST["jobgajiharian"];$_SESSION['jobgajiharian']="$jobgajiharian";
	$jobstatuskontrak=$_POST["jobstatuskontrak"];$_SESSION['jobstatuskontrak']="$jobstatuskontrak";
	if($nik==""){pesan("You do not fill out a form Identification Number","");}
	elseif($nama==""){pesan("You do not fill out a form Name","");}
	elseif($gelar==""){pesan("You do not fill out a form Education Degree","");}
	elseif($tempatlahir==""){pesan("You do not fill out a form Place of Birth","");}
	elseif($warganegara==""){pesan("You do not fill out a form Nationality","");}
	elseif($alamat==""){pesan("You do not fill out a form Address","");}
	elseif($kecamatan==""){pesan("You do not fill out a form Sub-district","");}
	elseif($kota==""){pesan("You do not fill out a form District","");}
	elseif($telphp==""){pesan("You do not fill out a form Mobile Phone","");}
        elseif($sekolah==""){pesan("You do not fill out a form Schools / Colleges","");}
        elseif($noijasah==""){pesan("You do not fill out a form Number of Diploma","");}
        elseif($jobstatus==""){pesan("You do not fill out a form Employment Status","");}
        elseif($jobbagian==""){pesan("You do not fill out a form Employment Position","");}
        elseif($jobsubbagian==""){pesan("You do not fill out a form Employment Sub Position","");}
        elseif($jobline==""){pesan("You do not fill out a form Line Work ","");}
        elseif($jobgajiharian==""){pesan("You do not fill out a form Salary","");}
        elseif($jobstatuskontrak==""){pesan("You do not fill out a form Contract Status","");}
	else{
		$querysimpan=mysql_query("INSERT INTO hrd_staff_data VALUE ('','$nik','','$nama','$gelar','$tempatlahir','$tanggallahir','$bulanlahir','$tahunlahir','$jeniskelamin','$warganegara','$agama','$alamat','$kecamatan','$kota','$provinsi','$telprumah','$telphp','$luluspend','$sekolah','$noijasah','','$tanggalmasuk','$bulanmasuk','$tahunmasuk','$jobstatus','','$jobbagian','$jobbagianketerangan','$jobsubbagian','$jobline','1','','$jobgajiharian','','','$jobstatuskontrak','$statusnikah','$namasi','','$alamatsi','$kecamatansi','$kotasi','$provinsisi','$telprumahsi','$telphpsi','$jobsi','')");
		if($querysimpan){
		        $status="<a href=javascript:void(); style=font-size:12px;color:#6F0000;font-family:arial><b>$staffdata[nama]</b></a><div style=border-left:1px black;padding-left:7;>Menambah karyawan <b>$nama</b>, NIK. <b>$nik</b>, lulusan <b>$sekolah</b> sebagai karyawan. Alamat karyawan <b>$alamat, $kecamatan, $kota, $provinsi</b>, Telp. <b>$telprumah/$telphp</b> </div>";
			$queryinsert=mysql_query("INSERT INTO web_status VALUE ('','$iduser','$staffdata[photo]','$status','','$hari','$tanggal','$bulan','$tahun','1')");
			$_SESSION["nik"]="";$_SESSION["nama"]="";$_SESSION["gelar"]="";$_SESSION["tempatlahir"]="";$_SESSION["tanggallahir"]="";
			$_SESSION["bulanlahir"]="";$_SESSION["tahunlahir"]="";$_SESSION["jeniskelamin"]="";$_SESSION["warganegara"]="";$_SESSION["agama"]="";
			$_SESSION["alamat"]="";$_SESSION["kecamatan"]="";$_SESSION["kota"]="";$_SESSION["provinsi"]="";$_SESSION["telprumah"]="";
			$_SESSION["telphp"]="";$_SESSION["luluspend"]="";$_SESSION["sekolah"]="";$_SESSION["noijasah"]="";$_SESSION["statusnikah"]="";
			$_SESSION["namasi"]="";$_SESSION["alamatsi"]="";$_SESSION["kecamatan"]="";$_SESSION["kotasi"]="";$_SESSION["provinsisi"]="";
			$_SESSION["telprumahsi"]="";$_SESSION["telphpsi"]="";$_SESSION["jobsi"]="";$_SESSION["tanggalmasuk"]="";$_SESSION["bulanmasuk"]="";
			$_SESSION["tahunmasuk"]="";$_SESSION["lamakontrak"]="";$_SESSION["jobstatus"]="";$_SESSION["jobbagian"]="";$_SESSION["jobbagianketerangan"]="";
			$_SESSION["jobsubbagian"]="";$_SESSION["jonline"]="";$_SESSION["jobgajiharian"]="";$_SESSION["jobstatuskontrak"]="";
			regnext("Data storage is successful, please complete the following family data:","page/page_staff_add_form",md5("v")."=".md5("photo")."&nik=$nik","proses");
		}else{pesan("Data storage has not been successful, please try again ..","");}
	}

break;
case md5("back"):
SESSION_start();
	$anik=$_SESSION['nik'];
	$anama=$_SESSION['nama'];
	$agelar=$_SESSION['gelar'];
	$atempatlahir=$_SESSION['tempatlahir'];
	$atanggallahir=$_SESSION['tanggallahir'];
	$abulanlahir=$_SESSION['bulanlahir'];
	$atahunlahir=$_SESSION['tahunlahir'];
	$ajeniskelamin=$_SESSION['jeniskelamin'];
	$awarganegara=$_SESSION['warganegara'];
	$aagama=$_SESSION['agama'];
	$aalamat=$_SESSION['alamat'];
	$akecamatan=$_SESSION['kecamatan'];
	$akota=$_SESSION['kota'];
	$aprovinsi=$_SESSION['provinsi'];
	$atelprumah=$_SESSION['telprumah'];
	$atelphp=$_SESSION['telphp'];
	$aluluspend=$_SESSION['luluspend'];
	$asekolah=$_SESSION['sekolah'];
	$anoijasah=$_SESSION['noijasah'];
	$astatusnikah=$_SESSION['statusnikah'];
	$anamasi=$_SESSION['namasi'];
	$aalamatsi=$_SESSION['alamatsi'];
	$akecamatansi=$_SESSION['kecamatan'];
	$akotasi=$_SESSION['kotasi'];
	$aprovinsisi=$_SESSION['provinsisi'];
	$atelprumahsi=$_SESSION['telprumahsi'];
	$atelphpsi=$_SESSION['telphpsi'];
	$ajobsi=$_SESSION['jobsi'];
	$atanggalmasuk=$_SESSION['tanggalmasuk'];
	$abulanmasuk=$_SESSION['bulanmasuk'];
	$atahunmasuk=$_SESSION['tahunmasuk'];
	$alamakontrak=$_SESSION['lamakontrak'];
	$ajobstatus=$_SESSION['jobstatus'];
	$ajobbagian=$_SESSION['jobbagian'];
	$ajobbagianketerangan=$_SESSION['jobbagianketerangan'];
	$ajobsubbagian=$_SESSION['jobsubbagian'];
	$ajobline=$_SESSION['jonline'];
	$ajobgajiharian=$_SESSION['jobgajiharian'];
	$ajobstatuskontrak=$_SESSION['jobstatuskontrak'];
	echo"
	<div id='menu_alert_inti'><b>Notice !!</b><br>We have not detected a form that you fill, you should complete the form provided.</div><br><br>
	<b>Personal Data
	<form name='form1'>
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Employee Identification Number<br><small><i>Nomor Induk Karyawan (NIK)</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='nik' value='$anik' type=text style='width:150px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Name<br><small><i>Nama</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='nama' value='$anama' type=text style='width:350px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Education Degree<br><small><i>Gelar Pendidikan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='gelar' value='$agelar' type=text style='width:100px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Place of Birth<br><small><i>Tempat Lahir</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='tempatlahir' value='$atempatlahir' type=text style='width:200px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Date of Birth<br><small><i>Tanggal Lahir</i></small></td>
	        <td width=1px>:</td>
	        <td>
			<select name='tanggallahir' style='width:60'>
				<option value='$atanggallahir'></option>
			";
				$lang="tgl";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='bulanlahir' style='width:150'>
                                <option value='$abulanlahir'></option>
			";
				$lang="bln";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='tahunlahir' style='width:70'>
			        <option value='$atahunlahir'></option>
			";
				$lang="thn";include("fungsi_nomor.php");
echo"			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Gender<br><small><i>Jenis Kelamin</i></small></td>
	        <td width=1px>:</td>
	        <td>	<select name='jeniskelamin' style='width:80'>
	                        <option value='$jeniskelamin'></option>
				<option value='0'>Wanita</option>
				<option value='1'>Pria</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Nationality<br><small><i>Kewarganegaraan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='warganegara' value='$awarganegara' type=text style='width:200px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Religion<br><small><i>Agama</i></small></td>
	        <td width=1px>:</td>
	        <td>
                        <select name='agama' style='width:100'>
                                <option value='$aagama'></option>
				<option value='0'>Islam</option>
				<option value='1'>Kristen</option>
				<option value='3'>Katolik</option>
				<option value='4'>Hindu</option>
				<option value='5'>Buda</option>
				<option value='6'>Lainnya</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Address<br><small><i>Alamat</i></small></td>
	        <td width=1px>:</td>
	        <td><textarea name='alamat' style='width:400;height:100;'>$aalamat</textarea></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Sub-district<br><small><i>Kecamatan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kecamatan' value='$akecamatan' type=text style='width:250px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> District/City<br><small><i>Kabupaten/Kota</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kota' value='$akota' type=text style='width:235px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Province<br><small><i>Provinsi</i></small></td>
	        <td width=1px>:</td>
	        <td>
                        <select name='provinsi' style='width:200'>
				<option value='$aprovinsi'></option>";
				$lang="provinsi";include("fungsi_nomor.php");
echo"
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Telephone House<br><small><i>Telephone Rumah</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telprumah' value='$atelprumah' type=text style='width:220px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Mobile Phone<br><small><i>Handphone</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telphp' value='$atelphp' type=text style='width:220px'></td>
	</tr>
	</table><br><br>
	Education data
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Latest Education<br><small><i>Pendidikan Terakhir</i></small></td>
	        <td width=1px>:</td>
	        <td>
	                <select name='luluspend' style='width:150'>
	                        <option value='$aluluspend'></option>
				<option value='0'>SD</MIoption>
				<option value='1'>SLTP/MTs</option>
				<option value='3'>SLTA/MA/SMK</option>
				<option value='4'>D1 (Diploma 1)</option>
				<option value='5'>D2 (Diploma 2)</option>
				<option value='6'>D3 (Diploma 3)</option>
				<option value='7'>D4 (Diploma 4)</option>
				<option value='8'>S1 (Sarjana)</option>
				<option value='9'>S2 (Master)</option>
				<option value='10'>S3 (Doktor)</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Schools / Colleges<br><small><i>Sekolah / Perguruan Tinggi</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='sekolah' value='$asekolah' type=text style='width:400px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Number of Diploma<br><small><i>Nomor Ijasah</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='noijasah' value='$anoijasah' type=text style='width:220px'></td>
	</tr>
	</table><br><br>
	Family data
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Marriage Status<br><small><i>Status Nikah</i></small></td>
	        <td width=1px>:</td>
	        <td>
			<select name='statusnikah' style='width:150'>
			        <option value='$astatusnikah'></option>
			        <option value='1'>Tidak Kawin</option>
			        <option value='2'>Kawin</option>
			        <option value='3'>Duda / Janda</option>
			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Name of Husband / Wife<br><small><i>Nama Suami / Istri</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='namasi' value='$anamasi' type=text style='width:300px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Address<br><small><i>Alamat </i></small></td>
	        <td width=1px>:</td>
	        <td><textarea name='alamatsi' style='width:400;height:100;'>$aalamatsi</textarea></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Sub - district<br><small><i>Kecamatan</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kecamatansi' value='$akecamatansi' type=text style='width:300px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> District / City<br><small><i>Kabupaten / Kota</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='kotasi' value='$akotasi' type=text style='width:300px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Province<br><small><i>Provinsi</i></small></td>
	        <td width=1px>:</td>
	        <td><select name='provinsisi' style='width:200'>
				<option value='$aprovinsisi'></option>";
				$lang="provinsi";include("fungsi_nomor.php");
echo"
			</select></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Telephone House<br><small><i>Telephone Rumah</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telprumahsi' value='$atelprumahsi' type=text style='width:220px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Mobile Phone<br><small><i>Handphone</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='telphpsi' value='$atelphpsi' type=text style='width:220px'></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Employmeen<br><small><i>Pekerjaan</i></small></td>
	        <td width=1px>:</td>
	        <td>
                       <input name='jobsi' value='$ajobsi' type=text style='width:320px'>
		</td>
	</tr>
	</table><br><br>
	Employment data
	<table width=100% cellspacing=10 cellpadding=0>
	<tr valign=top>
	        <td width=200px align=right> Date Received Work<br><small><i>Tanggal Diterima Bekerja</i></small></td>
	        <td width=1px>:</td>
	        <td>
			<select name='tanggalmasuk' style='width:60'>
				<option value='$atanggalmasuk'></option>
			";
				$lang="tgl";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='bulanmasuk' style='width:150'>
			        <option value='$abulanmasuk'></option>
			";
				$lang="bln";include("fungsi_nomor.php");
echo"			</select>&nbsp;
			<select name='tahunmasuk' style='width:70'>
                                <option value='$atahunmasuk'></option>
			";
				$lang="thn";include("fungsi_nomor.php");
echo"			</select>
		</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Old Contract<br><small><i>Lama Kontrak</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='lamakontrak' value='$alamakontrak' type=text style='width:60px'> Bulan</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Employment Status<br><small><i>Status Pekerjaan</i></small></td>
	        <td width=1px>:</td>
	        <td><select name='jobstatus' style='width:150'>
                        <option value='$ajobstatus'></option>
		";
				$lang="jobstatus";include("fungsi_nomor.php");
echo"
			</select></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Employment Position<br><small><i>Jabatan Pekerjaan</i></small></td>
	        <td width=1px>:</td>
	        <td><select name='jobbagian' style='width:200'>
                        <option value='$ajobbagian'></option>
		";
				$lang="jobbagian";include("fungsi_nomor.php");
echo"
			</select></td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Position Description<br><small><i>Deskripsi Jabatan</i></small></td>
	        <td width=1px>:</td>
	        <td><textarea name=jobbagianketerangan style='width:400;height:100;'>$ajobbagianketerangan</textarea></td>
	</tr>
	<input  type=hidden name='jobsubbagian' value='1'>
	<input  type=hidden name='jobline' value='0'>
	<tr valign=top>
	        <td width=200px align=right> salary<br><small><i>Gaji</i></small></td>
	        <td width=1px>:</td>
	        <td><input name='jobgajiharian' value='$ajobgajiharian' type=text style='width:220px'> / hari</td>
	</tr>
	<tr valign=top>
	        <td width=200px align=right> Contract Status<br><small><i>Status Kontrak</i></small></td>
	        <td width=1px>:</td>
	        <td>
                       <select name='jobstatuskontrak' style='width:150'>
				<option value='$ajobstatuskontrak'> </option>
				<option value='1'>Staff</option>
				<option value='3'>Freelance</option>
			</select>
		</td>
	</tr>
	</table></form>
";
break;

case md5("s"):
	echo"<br><form name=form1>
		<div style='border:0px;font-size:15px;font-family:arial;'><b>Pencarian Data Staff</b><br>
			<input type=text name='kata' style='width:200px'>
			<select name='type' style='width:120px'>
				<option value='nik'>NIK</option>
				<option value='nama'>Nama</option>
				<option value='jobline'>Line</option>
			</select>
			<input type='button' value='Search' onclick=post('page/page_staff_add_form','".md5("v")."=".md5("s")."&cari='+document.form1.kata.value+'&type='+document.form1.type.value,'proses');>
		</div></form>
	";
	$cari=$_POST["cari"];$type=$_POST["type"];
	if($type!=""){
		$querysearch=mysql_query("SELECT*FROM hrd_staff_data WHERE $type like '%$cari%' AND sk like '1'");
		$numsearch=mysql_num_rows($querysearch);
		if($numsearch!=0){
		        echo"<br><br><div id='tableinti'>
		                <table width=100% cellspacing=1 cellpadding=5>
		                <tr valign=top style='background:#C10000'>
		                        <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		                        <th style='color:white;font-size:12px;font-family:arial;width:60px;'>FOTHO</th>
		                        <th style='color:white;font-size:12px;font-family:arial;width:200px;'>NAMA</th>
		                        <th style='color:white;font-size:12px;font-family:arial;width:200px;'>JABATAN</th>
		                        <th style='color:white;font-size:12px;font-family:arial;width:100px;'>TINDAKAN</th>
		                </tr>
			";$no=1;
			While($datasearch=mysql_fetch_array($querysearch)){
			$jabatan=jabatanbagian($datasearch[jobbagian]);
			$subjabatan=jabatansubbagian($datasearch[jobsubbagian]);
			$linee=line($datasearch[jobline]);
			echo"
				<tr valign=top>
					<td align=center>$no.</td>
					<td align=center><img src='user_photo/$datasearch[photo]' width=60px></td>
					<td><a href='#'><b style='font-size:14px'>".strtoupper($datasearch[nama])."</a></b><br>NIK. <a href='#'><b>$datasearch[nik]</b></a></td>
					<td>Jabatan <a href='#'><b>$jabatan</b></a><br>Sub-Jabatan <a href='#'><b>$subjabatan</b></a><br>Line <a href='#'><b>$linee</b></a></td>
					<td align=center><a href='#' onclick=post('page/page_staff_detil_a','id=$datasearch[id]','detil');>Detail</a></td>
				</tr>
			";$no++;
		}echo"</table></div><div id='detil'></div>";}
		else{pesan("The data you are looking for is not found<br><i>Data yang anda cari tidak ditemukan</i>","");}
	}
break;
case md5("photo"):
	$nik=$_POST["nik"];
	echo"
		<div id='menu_gold_inti'><b>Attribute !!</b><br>As a complement data please insert images, data of children, and diploma scan images.<br><i>Sebagai pelengkap data silahkan masukkan foto, data anak, dan foto scan ijasah.</i></div><br><br>
                <iframe src='page/page_photo_upload.php?nik=$nik' width=100% height=200px border=0 frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
	";
break;
}
?>
