<?php
session_start();
include("dbase_conection.php");
include("page_function_time.php");
$status=$_POST["status"];
if($status==""){}
elseif($status=="Tulis catatan anda disini .."){}
elseif($iduser==""){}
else{
	$status="<a href=javascript:void(); style=font-size:12px;color:#6F0000;font-family:arial><b>$staffdata[nama]</b></a> $status";
	$queryinsert=mysql_query("INSERT INTO web_status VALUE ('','$iduser','$staffdata[photo]','$status','','$hari','$tanggal','$bulan','$tahun','1')");
	if($queryinsert){

	}else{
                echo"
			<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
			<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 01-STWLL</b></div>
			<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
				<br>Note you can not be included, please check back!<br><br>
				<i>Catatan anda tidak dapat dimasukkan, silahkan periksa kembali!</i><br><div align=center>
				<input type='button' value='Back' style='padding:10 20 10 20;' onclick=post('page/page_wall','','intipage')>
			</div></div>
			</div>
		";
	}
}

$querypesan=mysql_query("SELECT*FROM web_status WHERE view like 1 ORDER by id Desc LIMIT 0,50");
$numpesan=mysql_num_rows($querypesan);
WHILE($datapesan=mysql_fetch_array($querypesan)){
	echo"
		<div style='border-top:solid 1px #D3D3D3' celspacing=0 celpadding=0>
		        <table border=0 width=100%>
		        <tr valign=top>
		                <td width=75px><img src='user_photo/$datapesan[photo]' style='width:70px'></td>
		                <td>$datapesan[status]<br><br>
				<font style='size:11px;color:#808080'>$datapesan[hari], $datapesan[tanggal]-$datapesan[bulan]-$datapesan[tahun] ~ Sukai ~ Komentar ~ Hapus</font></td>
			</tr>
		        </table>
		</div>
	";
}

?>
