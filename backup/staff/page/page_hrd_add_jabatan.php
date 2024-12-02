<?php
session_start();
include("dbase_conection.php");
include("page_function_time.php");
switch($_POST['v']){
    case"":    
        echo"
            <div style='height:20px;'></div>
            <div align=left>
            <table border=0 width=100% cellspacing=0 cellpadding=0>
            <tr>
                <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=entrybagian','formulir');><b>Bidang</a><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=entrysubbagian','formulir');><b>Sub Bagian</a><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=entrysubsubbagian','formulir');><b>Jabatan</a></td>
                <td width=400px>&nbsp;</td>
            </tr>
            </table>
            <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' >
            <div id='formulir'>
                <div style='color:#808080;font-size:15px'><b>Bidang Pekerjaan</b></div><br><form name='form11'>
       		<div id=formstyle>
                	Code <input name='code' style='width:70px'>&nbsp;&nbsp;&nbsp;Nama <input name='bagian' style='width:230px'>&nbsp;&nbsp;&nbsp;Keterangan <input name='ket' style='width:180px'>
                	<input type=button value='Tambah' onclick=post('page/page_hrd_add_jabatan','v=tambahbagian&code='+document.form11.code.value+'&bagian='+document.form11.bagian.value+'&ket='+document.form11.ket.value,'proses');document.form11.code.value='';document.form11.bagian.value='';document.form11.ket.value='';>
            	</div></form>
	    &nbsp;&nbsp;
	    <div id='proses'>
            <table border=0 width=100% cellspacing=0 cellpadding=0>
            <tr>
                <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
                    <a href='javascript:void();'><b>Daftar Bidang Kerja&nbsp;&nbsp;&nbsp;</a>
                </td>
                <td width=400px>&nbsp;</td>
            </tr>
            </table>
            <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='tableinti'>
        ";
        $querydata=mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE status like '2' ORDER BY id DESC");
        $datanum=mysql_num_rows($querydata);
        if($datanum!=0){
            echo"
                <table width=100% cellspacing=1 cellpadding=5>
                <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>CODE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:300px;'>BAGIAN</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>TINDAKAN</th>
		        </tr>
            ";$no=1;
            WHILE($data=mysql_fetch_array($querydata)){
                $data[bagian]=strtoupper($data[bagian]);
                echo"
                    <tr valign=top>
                        <td>$no.</td>
                        <td>$data[code]</td>
                        <td><b>$data[bagian]</b><br>$data[ket]</td>
                        <td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
                        <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=hapusbagian&id=$data[id]','proses');>Hapus</a></td>
                    </tr>
                ";$no++;
            }
            echo"</table>";
        }
        echo"
		</div></div></div>
        ";
    break;
    case"entrybagian":
        echo"
            <div style='color:#808080;font-size:15px'><b>Bidang Pekerjaan</b></div><br><form name='form11'>
            <div id=formstyle>
                Code <input name='code' style='width:70px'>&nbsp;&nbsp;&nbsp;Nama <input name='bagian' style='width:230px'>&nbsp;&nbsp;&nbsp;Keterangan <input name='ket' style='width:180px'>
                <input type=button value='Tambah' onclick=post('page/page_hrd_add_jabatan','v=tambahbagian&code='+document.form11.code.value+'&bagian='+document.form11.bagian.value+'&ket='+document.form11.ket.value,'proses');document.form11.code.value='';document.form11.bagian.value='';document.form11.ket.value='';>
            </div></form>
            <div id='proses'>
            <table border=0 width=100% cellspacing=0 cellpadding=0>
            <tr>
                <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
                    <a href='javascript:void();'><b>Daftar Bidang Kerja&nbsp;&nbsp;&nbsp;</a>
                </td>
                <td width=400px>&nbsp;</td>
            </tr>
            </table>
            <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='tableinti'>
        ";
        $querydata=mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE status like '2' ORDER BY id DESC");
        $datanum=mysql_num_rows($querydata);
        if($datanum!=0){
            echo"
                <table width=100% cellspacing=1 cellpadding=5>
                <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>CODE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:300px;'>BAGIAN</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>TINDAKAN</th>
		        </tr>
            ";$no=1;
            WHILE($data=mysql_fetch_array($querydata)){
                $data[bagian]=strtoupper($data[bagian]);
                echo"
                    <tr valign=top>
                        <td>$no.</td>
                        <td>$data[code]</td>
                        <td><b>$data[bagian]</b><br>$data[ket]</td>
                        <td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
                        <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=hapusbagian&id=$data[id]','proses');>Hapus</a></td>
                    </tr>
                ";$no++;
            }
            echo"</table>";
        }
        echo"
		</div></div></div>
        ";
    break;
    case"tambahbagian":
        $code=$_POST['code'];
        $bagian=$_POST['bagian'];
        $ket=$_POST['ket'];
        if($code!="" & $bagian !=""){
            $tambah=mysql_query("INSERT INTO hrd_staff_jobbagian VALUE ('','$code','$bagian','$ket','".$_SESSION['sessionid']."','$hari','$tanggal','$bulan','$tahun','$ip','','$jam','2')");
            if($tambah){
                echo"
                    <br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>Entri new job sucsesfull</div></br>
                ";
            }
            else{
                 echo"
                    <br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Entri new job not sucsesfull, please try again</div></br>
                ";
            }
        }
        echo"
            <div align=left>
            <table border=0 width=100% cellspacing=0 cellpadding=0>
            <tr>
                <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
                    <a href='javascript:void();'><b>Daftar Bidang Kerja&nbsp;&nbsp;&nbsp;</a>
                </td>
                <td width=400px>&nbsp;</td>
            </tr>
            </table>
            <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='tableinti'>
        ";
        $querydata=mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE status like '2' ORDER BY id DESC");
        $datanum=mysql_num_rows($querydata);
        if($datanum!=0){
            echo"
                <table width=100% cellspacing=1 cellpadding=5>
                <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>CODE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:300px;'>BAGIAN</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>TINDAKAN</th>
		        </tr>
            ";$no=1;
            WHILE($data=mysql_fetch_array($querydata)){
                $data[bagian]=strtoupper($data[bagian]);
                echo"
                    <tr valign=top>
                        <td>$no.</td>
                        <td>$data[code]</td>
                        <td><b>$data[bagian]</b><br>$data[ket]</td>
                        <td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
                        <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=hapusbagian&id=$data[id]','proses');>Hapus</a></td>
                    </tr>
                ";$no++;
            }
            echo"</table>";
        }
        echo"
	       </div>
        ";
    break;
    case"hapusbagian":
	$id=$_POST['id'];
	$hapus=mysql_query("UPDATE hrd_staff_jobbagian SET status = 0 WHERE id like '$id'");
	if(!hapus){
		echo"
			<br><br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Sorry this data can't delete from record, please try again</div></br>
		";
	}else{
		echo"
                        <br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>The data has bin remove from record</div></br>
		";
	}
	echo"
            <div align=left>
            <table border=0 width=100% cellspacing=0 cellpadding=0>
            <tr>
                <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
                    <a href='javascript:void();'><b>Daftar Bidang Kerja&nbsp;&nbsp;&nbsp;</a>
                </td>
                <td width=400px>&nbsp;</td>
            </tr>
            </table>
            <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='tableinti'>
        ";
        $querydata=mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE status like '2' ORDER BY id DESC");
        $datanum=mysql_num_rows($querydata);
        if($datanum!=0){
            echo"
                <table width=100% cellspacing=1 cellpadding=5>
                <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>CODE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:300px;'>BAGIAN</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>TINDAKAN</th>
		        </tr>
            ";$no=1;
            WHILE($data=mysql_fetch_array($querydata)){
                $data[bagian]=strtoupper($data[bagian]);
                echo"
                    <tr valign=top>
                        <td>$no.</td>
                        <td>$data[code]</td>
                        <td><b>$data[bagian]</b><br>$data[ket]</td>
                        <td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
                        <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=hapusbagian&id=$data[id]','proses');>Hapus</a></td>
                    </tr>
                ";$no++;
            }
            echo"</table>";
        }
        echo"
	       </div>
        ";
    break;
//------------------------------------------------------------------------------------------

	case"entrysubbagian":
	$selectquery=mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE status like '2' ORDER BY id DESC");
	$selectnum=mysql_num_rows($selectquery);
	if($selectnum==0){echo"<div style='color:#808080;font-size:15px'><b>Sub Bidang Pekerjaan</b></div><br><form name='form11'><div id=formstyle>Anda belum memasukkan data Bidang Pekerjaan, silahkan entri data tersebut</div>";}
	else{
        	echo"
            		<div style='color:#808080;font-size:15px'><b>Sub Bidang Pekerjaan</b></div><br><form name='form11'>
            		<div id=formstyle>
                		Bidang <select name='idbagian' style='width:110px'>
		";
		WHILE($select=mysql_fetch_array($selectquery)){
		        echo"<option value='$select[id]'>$select[bagian]</option>";
		}
		echo"
				</select>&nbsp;&nbsp;&nbsp;
				Code <input name='code' style='width:50px'>&nbsp;&nbsp;&nbsp;
				Sub <input name='subbagian' style='width:230px'>&nbsp;&nbsp;&nbsp;
				Ket <input name='ket' style='width:80px'>
                		<input type=button value='Tambah' onclick=post('page/page_hrd_add_jabatan','v=entrysubbagian&aksi=tambah&idbagian='+document.form11.idbagian.value+'&subbagian='+document.form11.subbagian.value+'&ket='+document.form11.ket.value+'&code='+document.form11.code.value,'formulir');document.form11.code.value='';document.form11.subbagian.value='';document.form11.ket.value='';document.form11.idbagian.value='';>
            		</div></form>
		";
            	SWITCH($_POST['aksi']){
		case"tambah":
		        $idbagian=$_POST['idbagian'];
		        $subbagian=$_POST['subbagian'];
		        $code=$_POST['code'];
		        $ket=$_POST['ket'];
		        if($code!="" & $subbagian !=""){
            			$tambah=mysql_query("INSERT INTO hrd_staff_jobsubbagian VALUE ('','$idbagian','$code','$subbagian','$ket','".$_SESSION['sessionid']."','$hari','$tanggal','$bulan','$tahun','$ip','','$jam','2')");
				if($tambah){
                			echo"
                    				<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>Entri new sub job sucsesfull</div></br>
                			";
            			}else{
                 			echo"
                    				<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Entri new sub job not sucsesfull, please try again</div></br>
                			";
            			}
        		}
		break;
		case"hapus":
		        $id=$_POST['id'];
			$hapus=mysql_query("UPDATE hrd_staff_jobsubbagian SET status = 0 WHERE id like '$id'");
			if(!hapus){
				echo"
					<br><br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Sorry this data can't delete from record, please try again</div></br>
				";
			}else{
				echo"
                        		<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>The data has bin remove from record</div></br>
				";
			}
		break;
		}
		$querydata=mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE status like '2' ORDER BY id DESC");
        	$datanum=mysql_num_rows($querydata);
        	if($datanum!=0){
            	echo"
            		<table border=0 width=100% cellspacing=0 cellpadding=0>
            		<tr>
                		<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
                    			<a href='javascript:void();'><b>Daftar Sub Bidang Kerja&nbsp;&nbsp;&nbsp;</a>
                		</td>
                		<td width=400px>&nbsp;</td>
            		</tr>
            		</table>
            		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='tableinti'>
        	        <table width=100% cellspacing=1 cellpadding=5>
                	<tr valign=top style='background:#C10000'>
		        	<th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:200px;'>SUB BIDANG</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:250px;'>KETERANGAN</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:130px;'>TINDAKAN</th>
		        </tr>
            		";$no=1;
            		WHILE($data=mysql_fetch_array($querydata)){
                	$data[bagian]=strtoupper($data[bagian]);
                	$bagi=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE id like '$data[idbagian]'"));
                	echo"
                    		<tr valign=top>
                        		<td>$no.</td>
                        		<td>$bagi[bagian], <b>$data[subbagian]</b></td>
					<td>$data[ket]</td>
                        		<td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
                        		<td align=center><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=entrysubbagian&aksi=hapus&id=$data[id]','formulir');>Hapus</a></td>
                    		</tr>
                	";$no++;
            		}
            		echo"</table>";
        	}
        	echo"
			</div></div>
        	";
        }
    break;
    
//------------------------------------------------------------------------------------------

	case"entrysubsubbagian":
	$selectquery=mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE status like '2' ORDER BY id DESC");
	$selectnum=mysql_num_rows($selectquery);
	$subjobquery=mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE status like '2' ORDER BY id DESC");
	$subjobnum=mysql_num_rows($subjobquery);
	if($selectnum==0){echo"<div style='color:#808080;font-size:15px'><b>Jabatan Pekerjaan</b></div><br><div id=formstyle>Anda belum memasukkan data Bidang Pekerjaan, silahkan entri data tersebut</div>";}
	elseif($subjobnum==0){echo"<div style='color:#808080;font-size:15px'><b>Jabatan Pekerjaan</b></div><br><div id=formstyle>Anda belum memasukkan data Sub Bidang Pekerjaan, silahkan entri data tersebut</div>";}
	else{
        	echo"
            		<div style='color:#808080;font-size:15px'><b>Jabatan Pekerjaan</b></div><br><form name='form11'>
            		<div id=formstyle>
                		Bidang <select name='idbagian' style='width:130px' onchange=post('page/page_hrd_add_jabatan','v=subbagselect&id='+document.form11.idbagian.value,'subbid')><option>~ Pilih Bidang ~</option>
		";
		WHILE($select=mysql_fetch_array($selectquery)){
		        echo"<option value='$select[id]'>$select[bagian]</option>";
		}
		echo"
				</select>&nbsp;&nbsp;&nbsp;
				Sub Bidang <select name='idsubbagian' id='subbid' style='width:210px'></select>&nbsp;&nbsp;Code <input name='code' style='width:70px'><br><br>
				Jabatan <input name='subsubbagian' style='width:230px'>
				Ket <input name='ket' style='width:200px'>
                		<input type=button value='Tambah' onclick=post('page/page_hrd_add_jabatan','v=entrysubsubbagian&aksi=tambah&idbagian='+document.form11.idbagian.value+'&idsubbagian='+document.form11.idsubbagian.value+'&ket='+document.form11.ket.value+'&code='+document.form11.code.value+'&subsubbagian='+document.form11.subsubbagian.value,'formulir');document.form11.code.value='';document.form11.idsubbagian.value='';document.form11.ket.value='';document.form11.subsubbagian.value='';>
            		</div></form>
		";
            	SWITCH($_POST['aksi']){
		case"tambah":
		        $idbagian=$_POST['idbagian'];
		        $idsubbagian=$_POST['idsubbagian'];
		        $subsubbagian=$_POST['subsubbagian'];
		        $code=$_POST['code'];
		        $ket=$_POST['ket'];
		        if($code!="" & $subsubbagian !=""& $idsubbagian !=""){
            			$tambah=mysql_query("INSERT INTO hrd_staff_jobsubsubbagian VALUE ('','$idbagian','$idsubbagian','$code','$subsubbagian','$ket','".$_SESSION['sessionid']."','$hari','$tanggal','$bulan','$tahun','$ip','','$jam','2')");
				if($tambah){
                			echo"
                    				<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>Entri new job sucsesfull</div></br>
                			";
            			}else{
                 			echo"
                    				<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Entri new job not sucsesfull, please try again</div></br>
                			";
            			}
        		}
		break;
		case"hapus":
		        $id=$_POST['id'];
			$hapus=mysql_query("UPDATE hrd_staff_jobsubsubbagian SET status = 0 WHERE id like '$id'");
			if(!hapus){
				echo"
					<br><br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Sorry this data can't delete from record, please try again</div></br>
				";
			}else{
				echo"
                        		<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>The data has bin remove from record</div></br>
				";
			}
		break;
		}
		$querydata=mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE status like '2' ORDER BY id DESC");
        	$datanum=mysql_num_rows($querydata);
        	if($datanum!=0){
            	echo"
            		<table border=0 width=100% cellspacing=0 cellpadding=0>
            		<tr>
                		<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
                    			<a href='javascript:void();'><b>Daftar Jabatan Kerja&nbsp;&nbsp;&nbsp;</a>
                		</td>
                		<td width=400px>&nbsp;</td>
            		</tr>
            		</table>
            		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='tableinti'>
        	        <table width=100% cellspacing=1 cellpadding=5>
                	<tr valign=top style='background:#C10000'>
		        	<th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:150px;'>BIDANG</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:150px;'>SUB BIDANG</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:200px;'>JABATAN</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
		        	<th style='color:white;font-size:12px;font-family:arial;width:100px;'>TINDAKAN</th>
		        </tr>
            		";$no=1;
            		WHILE($data=mysql_fetch_array($querydata)){
                	$data[bagian]=strtoupper($data[bagian]);
                	$bagi=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE id like '$data[idbagian]'"));
                	$subbagi=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE id like '$data[idsubbagian]'"));
                	echo"
                    		<tr valign=top>
                        		<td>$no.</td>
                        		<td>$bagi[bagian] ($bagi[code])</td>
                        		<td>$subbagi[subbagian] ($subbagi[code])</td>
                        		<td><b>$data[subsubbagian] ($data[code])</b></td>
                        		<td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
                        		<td align=center><a href='javascript:void();' onclick=post('page/page_hrd_add_jabatan','v=entrysubsubbagian&aksi=hapus&id=$data[id]','formulir');>Hapus</a></td>
                    		</tr>
                	";$no++;
            		}
            		echo"</table>";
        	}
        	echo"
			</div></div>
        	";
        }
    break;
    case"subbagselect":
        $id=$_POST['id'];
        $selectquery=mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE status like '2' AND idbagian like $id Order By id Asc");
	$selectnum=mysql_num_rows($selectquery);
	if($selectnum==0){echo"<option value=''>Tidak ada data</option>";}
	else{
		WHILE($select=mysql_fetch_array($selectquery)){
	        	echo"<option value='$select[id]'>$select[subbagian]</option>";
		}
	}
    break;
}
?>
