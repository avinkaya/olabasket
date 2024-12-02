<?php
session_start();
include("dbase_conection.php");
include("page_fungsi_php.php");
$id=$_POST['id'];
if($id==""){
	switch($_POST['aksi']){
	        case"aktifasi":
		 $idd=$_POST['idd'];
		 $update=mysql_query("UPDATE hrd_staff_data SET status=1 WHERE id like '$idd'");
		 if($update){echo"<div style='padding:10 10 10 10;border:solid 1px #228888;background:#D5F4F4'>Data karyawan telah DIAKTIFKAN</div>";}
		 else{echo"<div style='padding:10 10 10 10;border:solid 1px red;background:pink'>Data karyawan BELUM BERHASIL diaktifasi</div>";}
	        break;
	        case"pasif":
		 $idd=$_POST['idd'];
		 $update=mysql_query("UPDATE hrd_staff_data SET status=3 WHERE id like '$idd'");
		 if($update){echo"<div style='padding:10 10 10 10;border:solid 1px #228888;background:#D5F4F4'>Data karyawan telah DIPASIFKAN</div>";}
		 else{echo"<div style='padding:10 10 10 10;border:solid 1px red;background:pink'>Data karyawan BELUM BERHASIL dipasifkan</div>";}
	        break;
	        case"mantan":
		 $idd=$_POST['idd'];
		 $update=mysql_query("UPDATE hrd_staff_data SET status=4 WHERE id like '$idd'");
		 if($update){echo"<div style='padding:10 10 10 10;border:solid 1px #228888;background:#D5F4F4'>Data karyawan telah KELUAR</div>";}
		 else{echo"<div style='padding:10 10 10 10;border:solid 1px red;background:pink'>Data karyawan BELUM BERHASIL dikeluarkan</div>";}
	        break;
	        case"hapus":
		 $idd=$_POST['idd'];
		 $update=mysql_query("UPDATE hrd_staff_data SET status=0 WHERE id like '$idd'");
		 if($update){echo"<div style='padding:10 10 10 10;border:solid 1px #228888;background:#D5F4F4'>Data karyawan telah DIHAPUS</div>";}
		 else{echo"<div style='padding:10 10 10 10;border:solid 1px red;background:pink'>Data karyawan BELUM BERHASIL dihapus</div>";}
	        break;
	}
}else{
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
					        <td width=30%>
							<div style='padding:10 10 10 10;color:#696969'>
							<b>Employment</b><br>
							Status : <a href='#' style='text-decoration:none;color:#660000'>$jobstatus</a><br>
							Position : <a href='#' style='text-decoration:none;color:#660000'>$jabatan</a><br>
							Sub-Position : <a href='#' style='text-decoration:none;color:#660000'>$subjabatan</a><br>
							Detil Potition : <a href='#' style='text-decoration:none;color:#660000'>$linee</a><br>
							</div>
						</td>
						<td>
						        <div style='padding:10 10 10 10;color:#696969'>
						        Address <a href='#' style='text-decoration:none;color:#660000'>$data[alamat], $data[kecamatan], $data[kota], $data[provinsi]</a>
						        Place & Date of Birth <a href='#' style='text-decoration:none;color:#660000'>$data[tempatlahir],$data[tanggallahir]/$data[bulanlahir]/$data[tahunlahir]</a>
						        Telp <a href='#' style='text-decoration:none;color:#660000'>$data[telphp] / $data[telprumah]</a>
						        School of <a href='#' style='text-decoration:none;color:#660000'>$data[sekolah]</a>
						        </div>
						</td>
					</tr>
					<tr valign=top>
					        <td>";
     	switch($data['status']){
     		case"0":
		    echo"
		                <div id='detilproses'>
		     			<input type='button' value='Aktivasi' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=aktifasi&idd=$data[id]','detilproses')>&nbsp;&nbsp;
				</div>
			";
		break;
	
		case"1":
        	     echo"
        	                <div id='detilproses'>
                                <input type='button' value='Pasive' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=pasif&idd=$data[id]','detilproses')>&nbsp;&nbsp;
                                <input type='button' value='Keluar' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=mantan&idd=$data[id]','detilproses')>&nbsp;&nbsp;
                                </div>
			";
		break;

		case"2":
              		echo"
                                <div id='detilproses'>
		     			<input type='button' value='Aktivasi' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=aktifasi&idd=$data[id]','detilproses')>&nbsp;&nbsp;
				</div>
			";
		break;
	
		case"3":
	             echo"
                                <div id='detilproses'>
                                <input type='button' value='Aktivasi' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=aktifasi&idd=$data[id]','detilproses')>&nbsp;&nbsp;
                                <input type='button' value='Keluar' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=mantan&idd=$data[id]','detilproses')>&nbsp;&nbsp;
                                </div>
			";
		break;
	
		case"4":
        	     echo"
                                <div id='detilproses'>
		     			<input type='button' value='Aktivasi' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','aksi=aktifasi&idd=$data[id]','detilproses')>&nbsp;&nbsp;
				</div>
			";
		break;
	}
	echo"					</td>
					        <td align=right><input type='button' value='OK' style='padding:5 20 5 20;' onclick=post('page/page_work_add_detil','','detil')></td>
					</tr>
					</table>
				</div>
				</div>
			
	";
}

?>

