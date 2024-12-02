<?php
echo"
	<div id='divinti' align=left>
		<table border=0px width=100% cellspacing=0 cellpadding=0>
		<tr valign=top>
		        <td width=202px align=left>
		                <div style='width:202px'>
				<div style='height:20px;'></div>
				<img src='user_photo/hsbn.jpg' width=202px border=0><br>
				<small style='font-size:11px;font-family:arial;'><b>".strtoupper($_SESSION["sessionnama"])."</b></small>
				<div style='font-family:arial;font-size:11px'>as ".$_SESSION["sessionwewenang"]."</div><br><br>
				<div style='width:197px'>
					<img src='images/top_home_user.gif' width=197px>
				        <div style='border:solid 2px rgb(138,40,41)'>
     					<div id='menuakun'><a href='#' onclick=post('SS','','intipage')><b>Add User</b><br>&nbsp;&nbsp;&nbsp;<i>Menambahkan akun user</i></a></div>
					<div id='menuakun'><a href='#' onclick=post('S','','intipage')><b>Search User</b><br>&nbsp;&nbsp;&nbsp;<i>Pencarian user</i></a></div>
					<div id='menuakun'><a href='#' onclick=post('S','','intipage')><b>List User</b><br>&nbsp;&nbsp;&nbsp;<i>Daftar user</i></a></div>
					<div id='menuakun'><a href='#' onclick=post('S','','intipage')><b>Visitors reports</b><br>&nbsp;&nbsp;&nbsp;<i>Laporan kunjungan</i></a></div>
					</div><br>
				</div>
				</div>
			</td>
		        <td style='border-left:solid 1px #6F0000;border-right:solid 1px #6F0000;border-bottom:solid 1px #6F0000;'>
				<div id='intidisplaystyle'><div id='intipage'>";
				include("page_wall_beranda.php");
echo"				</div></div>
			</td>
		</tr>
		</table>
	</div>
";
?>
