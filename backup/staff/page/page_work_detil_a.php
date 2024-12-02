<?php
session_start();
include("dbase_conection.php");
include("page_fungsi_php.php");
$id=$_POST['id'];
if($id==""){}else{
	$data=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$id'"));
	$jabatan=jabatanbagian($data[jobbagian]);
	$subjabatan=jabatansubbagian($data[jobsubbagian]);
	$linee=line($data[subsubbagian]);
	$jobstatus=jobstatus($data[jobstatus]);
	echo"
                        <div style='position:fixed; left:0%; top:10%; width:100%' align=center>
				<div style='padding:5 10 5 10;width:800px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Staff & Worker Document</b></div>
				<div style='padding:0 0 10 0;width:820px;border:solid 1px #6F0000;background:white' align=left>
					<div style='background:black' align=center><img src='user_photo/$data[photo]' height=300px></div>
					<div style='padding:10 10 10 10;color:#696969'>
							<b style='font-size:14px;color:#202020'>".strtoupper($data[nama])."</b>
					</div>
					<table border=0 cellspacing=5 cellpadding=0>
					<tr valign=top>
					        <td width=30%  style='background:white'>
							<div style='padding:10 10 10 10;color:#696969'>
							<b>Employment</b><br>
							Status : <a href='#' style='text-decoration:none;color:#660000'>$jobstatus</a><br>
							Position : <a href='#' style='text-decoration:none;color:#660000'>$jabatan</a><br>
							Sub-Position : <a href='#' style='text-decoration:none;color:#660000'>$subjabatan</a><br>
							Detil Potition : <a href='#' style='text-decoration:none;color:#660000'>$linee</a><br>
							</div>
						</td>
						<td  style='background:white'>
						        <div style='padding:10 10 10 10;color:#696969'>
						        <b>Detail Biodata</b><br>
						        Address <a href='#' style='text-decoration:none;color:#660000'>$data[alamat], $data[kecamatan], $data[kota], $data[provinsi]</a>
						        <br>Place & Date of Birth <a href='#' style='text-decoration:none;color:#660000'>$data[tempatlahir],$data[tanggallahir]/$data[bulanlahir]/$data[tahunlahir]</a>
						        <br>Telp <a href='#' style='text-decoration:none;color:#660000'>$data[telphp] / $data[telprumah]</a>
						        <br>School of <a href='#' style='text-decoration:none;color:#660000'>$data[sekolah]</a>
						        </div>
						</td>
					</tr>
					<tr valign=top>
					        <td></td>
					        <td align=right><input type='button' value='OK' style='padding:5 20 5 20;' onclick=post('page/page_work_detil_a','','detil')></td>
					</tr>
					</table>
					
					<div align=right>
					        <!--<input type='button' value='Profil' style='padding:5 20 5 20;' onclick=post('page/page_work_detil_a','','detil')>&nbsp;&nbsp;
						<input type='button' value='Print' style='padding:5 20 5 20;' onclick=post('page/page_work_detil_a','','detil')>&nbsp;&nbsp;
						-->&nbsp;&nbsp;
					</div>
				</div>
				</div>
			
	";
}
?>

