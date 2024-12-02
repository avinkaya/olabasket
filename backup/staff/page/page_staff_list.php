<?php
include("dbase_conection.php");
include("page_fungsi_php.php");
switch($_POST[md5("v")]){
case "":
		$querysearch=mysql_query("SELECT*FROM hrd_staff_data WHERE sk like '1' ORDER By id Desc");
		$numsearch=mysql_num_rows($querysearch);
		if($numsearch!=0){
		        echo"<br><br><div id='tableinti'>
		                <b style='color:#800000'>DAFTAR STAFF</b>
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
break;
}
?>
