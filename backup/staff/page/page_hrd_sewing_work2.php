<?php
session_start();
include("dbase_conection.php");
include("page_function.php");

SWITCH($_GET['v']){
Case"":
	$style=$_GET['style'];
	$combos=$_GET['combos'];
	echo"
	        <div id='tableinti1'>
	        <table width=100% cellspacing=1 cellpadding=3 border=0>
	           <tr bgcolor='#969696'>
	                        <th style='width:5px;padding:7 7 7 7;font-size:12px;font-family:arial'>NO</th>
	                        <th style='width:80px;padding:7 7 7 7;font-size:12px;font-family:arial'>NIK</th>
	                        <th style='width:250px;padding:7 7 7 7;font-size:12px;font-family:arial'>NAMA</th>
	                        <th style='width:150px;padding:7 7 7 7;font-size:12px;font-family:arial'>JABATAN</th>
	                        <th style='width:50px;padding:7 7 7 7;font-size:12px;font-family:arial'>SIZE</th>
	                        <th style='width:200px;padding:7 7 7 7;font-size:12px;font-family:arial'>PROSES</th>
	           </tr>
		";$no=1;
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$style' AND idcombo like '$combos' AND status like '1' Order by idstylecom,idsize,idproses,id Asc");
		$datan=mysql_num_rows($dataq);
		if($datan==0){
		        echo"<tr><td colspan=6 style='font-size:12px;font-family:arial'>Belum ada data karyawan dalam proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($data=mysql_fetch_array($dataq)){
			        $staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[idproses]'"));
			        $staff[nama]=strtoupper($staff['nama']);
				echo"
				        <tr valign=top style='background:#C9C9C9;'>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$no</td>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$data[nik]</td>
				                <td style='text-decoration:none;font-size:11px;font-family:arial'>$staff[nama]</a></a></td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$jabatan[subsubbagian]</td>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$size[ukuran]</td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$proses[item]</td>
				        </tr>
				";$no++;
			}
		}
		echo"
			<tr style='background:#C9C9C9;'>
			        <td colspan=5 align=right style='text-decoration:none;font-size:12px;font-family:arial'>JUMLAH PEKERJA :</td>
			        <td colspan=2 align=left style='text-decoration:none;font-size:12px;font-family:arial'><b style='font-size:15px'>$datan orang</b></td>
			</tr>
			</table><div id=detil></div>";
	
break;

Case"listsize":
	$style=$_GET['style'];
	$combos=$_GET['combos'];
	$size=$_GET['size'];
	echo"
	        <div id='tableinti1'>
	        <table width=100% cellspacing=1 cellpadding=3 border=0>
	           <tr bgcolor='#969696'>
	                        <th style='width:5px;padding:7 7 7 7;font-size:12px;font-family:arial'>NO</th>
	                        <th style='width:80px;padding:7 7 7 7;font-size:12px;font-family:arial'>NIK</th>
	                        <th style='width:250px;padding:7 7 7 7;font-size:12px;font-family:arial'>NAMA</th>
	                        <th style='width:150px;padding:7 7 7 7;font-size:12px;font-family:arial'>JABATAN</th>
	                        <th style='width:50px;padding:7 7 7 7;font-size:12px;font-family:arial'>SIZE</th>
	                        <th style='width:200px;padding:7 7 7 7;font-size:12px;font-family:arial'>PROSES</th>
	           </tr>
		";$no=1;
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$style' AND idcombo like '$combos' AND idsize like '$size' AND status like '1' Order by idstylecom,idsize,idproses,id Asc");
		$datan=mysql_num_rows($dataq);
		if($datan==0){
		        echo"<tr><td colspan=6 style='font-size:12px;font-family:arial'>Belum ada data karyawan dalam proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($data=mysql_fetch_array($dataq)){
			        $staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[idproses]'"));
			        $staff[nama]=strtoupper($staff['nama']);
				echo"
				        <tr valign=top style='background:#C9C9C9;'>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$no</td>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$data[nik]</td>
				                <td style='text-decoration:none;font-size:11px;font-family:arial'>$staff[nama]</a></a></td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$jabatan[subsubbagian]</td>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$size[ukuran]</td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$proses[item]</td>
				        </tr>
				";$no++;
			}
		}
		echo"
			<tr style='background:#C9C9C9;'>
			        <td colspan=5 align=right style='text-decoration:none;font-size:12px;font-family:arial'>JUMLAH PEKERJA :</td>
			        <td colspan=2 align=left style='text-decoration:none;font-size:12px;font-family:arial'><b style='font-size:15px'>$datan orang</b></td>
			</tr>
			</table><div id=detil></div>";

break;

Case"listproses":
	$style=$_GET['style'];
	$proses=$_GET['proses'];
	echo"
	        <div id='tableinti1'>
	        <table width=100% cellspacing=1 cellpadding=3 border=0>
	           <tr bgcolor='#969696'>
	                        <th style='width:5px;padding:7 7 7 7;font-size:12px;font-family:arial'>NO</th>
	                        <th style='width:80px;padding:7 7 7 7;font-size:12px;font-family:arial'>NIK</th>
	                        <th style='width:250px;padding:7 7 7 7;font-size:12px;font-family:arial'>NAMA</th>
	                        <th style='width:150px;padding:7 7 7 7;font-size:12px;font-family:arial'>JABATAN</th>
	                        <th style='width:100px;padding:7 7 7 7;font-size:12px;font-family:arial'>COMBO</th>
	                        <th style='width:50px;padding:7 7 7 7;font-size:12px;font-family:arial'>SIZE</th>
	                        <th style='width:200px;padding:7 7 7 7;font-size:12px;font-family:arial'>PROSES</th>
	           </tr>
		";$no=1;
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$style' AND idproses like '$proses' AND status like '1' Order by idstylecom,idsize,idproses,id Asc");
		$datan=mysql_num_rows($dataq);
		if($datan==0){
		        echo"<tr><td colspan=6 style='font-size:12px;font-family:arial'>Belum ada data karyawan dalam proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($data=mysql_fetch_array($dataq)){
			        $staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			        $combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$data[idcombo]'"));
			        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[idproses]'"));
			        $staff[nama]=strtoupper($staff['nama']);
				echo"
				        <tr valign=top style='background:#C9C9C9;'>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$no</td>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$data[nik]</td>
				                <td style='text-decoration:none;font-size:11px;font-family:arial'>$staff[nama]</a></a></td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$jabatan[subsubbagian]</td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$combo[combo] / $combo[warna]</td>
				                <td align=center style='text-decoration:none;font-size:12px;font-family:arial'>$size[ukuran]</td>
				                <td style='text-decoration:none;font-size:12px;font-family:arial'>$proses[item]</td>
				        </tr>
				";$no++;
			}
		}
		echo"
			<tr style='background:#C9C9C9;'>
			        <td colspan=6 align=right style='text-decoration:none;font-size:12px;font-family:arial'>JUMLAH PEKERJA :</td>
			        <td colspan=2 align=left style='text-decoration:none;font-size:12px;font-family:arial'><b style='font-size:15px'>$datan orang</b></td>
			</tr>
			</table><div id=detil></div>";

break;
}

?>
