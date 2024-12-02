<?php
session_start();
include("dbase_conection.php");
include("page_function.php");


SWITCH($_POST['v']){
case "":
        $proses=$_GET['proses'];
	$idsubsubbagian=$_GET['idsubsubbagian'];
	$style=$_GET['style'];
	$combo=$_GET['combo'];
	$size=$_GET['size'];
	if($style==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Anda belum memilih style</div>";}
	elseif($combo==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Anda belum memilih combo</div>";}
	elseif($size==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Anda belum memilih size</div>";}
	elseif($proses==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Anda belum memilih jenis proses poduksi</div>";}
	elseif($idsubsubbagian==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Anda belum memilih jabatan karyawan</div>";}
	else{
		$staffq=mysql_query("SELECT*FROM hrd_staff_data WHERE subsubbagian like '$idsubsubbagian' ORDER By Rand()");
		$pro=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$proses'"));
		$staffn=mysql_num_rows($staffq);
		if($staffn==0){echo"<div style='border:solid 1px red;padding:10 10 10 10;background:pink;'>Tidak ada data karyawan pada jabatan ini.</div>";}
		else{
			WHILE($staff=mysql_fetch_array($staffq)){
        		$staff[nama]=strtoupper($staff[nama]);
			echo"
				<div style='border:solid 1px #DBDBDB;padding:10 10 10 10;'>
				<table border=0 width=100% cellspacing=0 cellpadding=5>
				<tr valign=top>
					<td width=100px><img src='../user_photo/$staff[photo]' width=100px border=0></td>
					<td style='font-family:arial;font-size:12px'>
						<b>$staff[nama]</b>
						<div style='height:20px'></div>
						<div align=right style='color:black;' id='tugas$staff[nik]'>
			";
			$checkn=mysql_num_rows(mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE nik like '$staff[nik]' AND idstylecom like '$style' AND idcombo like '$combo' AND idsize like '$size' AND idproses like '$proses'"));
			if($checkn==0){
				echo"
					<a onclick=post('page_hrd_sewing_work1','v=add&style=$style&combo=$combo&size=$size&proses=$proses&nik=$staff[nik]','tugas$staff[nik]'); href='javascript:void()' style='padding:7 7 7 7;border:solid 1px #BFBFBF;background:#E4E4E4;text-decoration:none;'>
						<font style='color:#969696'>Tugaskan</font> $pro[item]
					</a>
				";
			}else{
				$styled=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
				$combod=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$combo'"));
				$sized=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$size'"));
				$prosesd=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$proses'"));
				echo"
				<div style='color:black' align=left>Telah ditugaskan :<br>
				<table width=100% cellspacing=3 cellpadding=0>
				<tr valign=top>
				        <td  style='color:#727272;width:80px;font-size:12px;font-family:arial;'>Style</td>
				        <td  style='color:#727272;width:10px;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$styled[stylecom]</td>
				        <td  style='color:black;font-size:12px;font-family:arial;' rowspan=3>
						<a href='javascript:void();' onclick=post('page_hrd_sewing_work1','v=cancel&style=$style&combo=$combo&size=$size&proses=$proses&nik=$staff[nik]','tugas$staff[nik]'); style='padding:7 7 7 7;border:solid 1px #BFBFBF;background:#E4E4E4;text-decoration:none;'>Cancel</a>
					</td>
				</tr>
				<tr>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>Combo</td>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$combod[combo] / $combod[warna]</td>
				</tr>
				<tr>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>Size</td>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$sized[ukuran]</td>
				</tr>
				<tr>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>Proses</td>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$prosesd[item]</td>
				</tr>
				</table></div>
				";
			}

			echo"			</div>
					</td>
				</tr>
				</table>
				</div>
				<div style='height:3px'></div>
			";
	}}}
break;

case"add":
        $proses=$_POST['proses'];
	$style=$_POST['style'];
	$combo=$_POST['combo'];
	$size=$_POST['size'];
	$nik=$_POST['nik'];
	if($style==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal identifikasi style</div>";}
	elseif($combo==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal identifikasi combo</div>";}
	elseif($size==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal identifikasi size</div>";}
	elseif($proses==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal identifikasi proses poduksi</div>";}
	elseif($nik==""){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal identifikasi ID karyawan</div>";}
	else{
	        $add=mysql_query("INSERT INTO hrd_staff_proses_kerja_worker VALUE ('','$style','$combo','$size','$proses','$nik','".$_SESSION["sessionid"]."','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','1')");
	        if(!$add){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal memberi tugas karyawan</div>";}
	        else{
			$styled=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
			$combod=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$combo'"));
			$sized=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$size'"));
			$prosesd=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$proses'"));
			echo"
				<div style='color:black' align=left>Telah ditugaskan :<br>
				<table width=100% cellspacing=3 cellpadding=0>
				<tr valign=top>
				        <td  style='color:#727272;width:80px;font-size:12px;font-family:arial;'>Style</td>
				        <td  style='color:#727272;width:10px;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$styled[stylecom]</td>
				        <td  style='color:black;font-size:12px;font-family:arial;' rowspan=3>
						<a href='javascript:void();' onclick=post('page_hrd_sewing_work1','v=cancel&style=$style&combo=$combo&size=$size&proses=$proses&nik=$nik','tugas$nik'); style='padding:7 7 7 7;border:solid 1px #BFBFBF;background:#E4E4E4;text-decoration:none;'>Cancel</a>
					</td>
				</tr>
				<tr>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>Combo</td>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$combod[combo] / $combod[warna]</td>
				</tr>
				<tr>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>Size</td>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$sized[ukuran]</td>
				</tr>
				<tr>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>Proses</td>
				        <td  style='color:#727272;font-size:12px;font-family:arial;'>:</td>
				        <td  style='color:black;font-size:12px;font-family:arial;'>$prosesd[item]</td>
				</tr>
				</table></div>
			";
		}
	}
break;

case"cancel":
        $proses=$_POST['proses'];
	$style=$_POST['style'];
	$combo=$_POST['combo'];
	$size=$_POST['size'];
	$nik=$_POST['nik'];
	$pro=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$proses'"));
	$delete=mysql_query("DELETE FROM hrd_staff_proses_kerja_worker WHERE nik like '$nik' AND idstylecom like '$style' AND idcombo like '$combo' AND idsize like '$size' AND idproses like '$proses'");
	if(!$delete){echo"<div style='font-family:arial;border:solid 1px red;padding:10 10 10 10;background:pink;'>Gagal menghapus tugas karyawan</div>";}
	else{
		echo"
                	<a onclick=post('page_hrd_sewing_work1','v=add&style=$style&combo=$combo&size=$size&proses=$proses&nik=$nik','tugas$nik'); href='javascript:void()' style='padding:7 7 7 7;border:solid 1px #BFBFBF;background:#E4E4E4;text-decoration:none;'>
			<font style='color:#969696'>Tugaskan</font> $pro[item]
			</a>
		";
	}
break;

case"":
break;
}

?>
