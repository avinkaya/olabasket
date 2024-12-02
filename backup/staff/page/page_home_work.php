<?php
echo"
	<div id='divinti' align=left>
		<table border=0px width=100% cellspacing=0 cellpadding=0>
		<tr valign=top>
		        <td width=202px align=left>
		                <div style='width:202px'>
				<div style='height:20px;'></div>
				<img src='user_photo/hsbn.jpg' width=202px border=0><br><br>
				<div style='width:197px;'>
";
include("page/page_user_wewenang.php");
echo"
				</div>
				</div>
			</td>
		        <td style='border-left:solid 1px #6F0000;border-right:solid 1px #6F0000;border-bottom:solid 1px #6F0000;'>
				<div id='intidisplaystyle'><div id='intipage'>&nbsp;";
				include("page_wall.php");
echo"				</div></div>
			</td>
		</tr>
		</table>
	</div>
";
?>
