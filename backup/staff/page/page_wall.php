<?php
echo"
<script language=javascript>
function textin(){
	if(document.status1.statusbar.value='Tulis catatan anda disini ..'){document.status1.statusbar.value='';}
}
</script>
	<div style='height:20px;'></div>
	<table width=100% border=0>
	<tr valign=top>
		<td width=507px style='border-bottom:solid 1px #969696;height:160px;'>
			<div style='font-size:18px;font-family:arial;'><b>".$_SESSION["sessionnama"]."</b></div>
			<small style='font-size:13px;font-family:arial narrow;' id='stylestandart'>Born on <a href='#'>June 16, 1989</a>. Live in <a href='#'>Boyolali, Jawa Tengah</a>. Work in PT. Mulia Impex as position <a href='#'>ICT Programer</a></small><br><br>
			<img src='images/1.gif' height=92px>&nbsp;
			<img src='images/2.jpg' height=92px>&nbsp;
			<img src='images/3.jpg' height=92px>&nbsp;
			<img src='images/4.jpg' height=92px>&nbsp;
			<img src='images/5.jpg' height=92px>
		</td>
		<td rowspan=2 style='width:300px;'>";
//	include("page/page_iklan.php");
	echo"
		</td>
	</tr>
	<tr valign=top>
		<td id='stylestandart'>
			<img src='images/icon-update.jpg' align=middle> <small>Pesan singkat  <img src='images/icon-photo.jpg' align=middle> Pesan photo</small><br>
			<form name='status1'>
			<textarea id='inputtextarea' name='statusbar' onfocus=textin(); style='color:#333333'>Tulis catatan anda disini ..</textarea>
			<div align=right style='padding:5 5 5 5'>
			<input type=button value='Bagikan' onclick=post('page/page_wall_status','v=submitstatus&status='+document.status1.statusbar.value,'status');document.status1.statusbar.value=''></div>
			</form>
			<div id='status'>
";
$querypesan=mysql_query("SELECT*FROM web_status WHERE view like 1 ORDER by id Desc LIMIT 0,50");
$numpesan=mysql_num_rows($querypesan);
WHILE($datapesan=mysql_fetch_array($querypesan)){
	echo"
		<div style='border-top:solid 1px #D3D3D3' celspacing=0 celpadding=0>
		        <table border=0 width=100% cellspacing=5>
		        <tr valign=top>
		                <td width=75px><img src='user_photo/$datapesan[photo]' style='width:70px'></td>
		                <td>$datapesan[status]<br><br>
				<font style='size:11px;color:#808080'>$datapesan[hari], $datapesan[tanggal]-$datapesan[bulan]-$datapesan[tahun] ~ Sukai ~ Komentar ~ Hapus</font></td>
			</tr>
		        </table>
		</div>
	";
}
	echo"	</div>
		</td>
	</tr>
	</table>
";
?>
