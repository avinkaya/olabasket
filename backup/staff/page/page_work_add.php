<?php
$sesstart="on";
echo"
	<div style='height:20px;'></div>
        <div align=left>
        <table border=0 width=100% cellspacing=0 cellpadding=0>
        <tr>
             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     	<a href='javascript:void();' onclick=post('page/page_work_add_form','".md5("v")."=','proses');><b>Formulir</a><a href='javascript:void();' onclick=post('page/page_work_add_form','".md5("v")."=".md5("dk")."','proses')><b>Data Karyawan</a><a href='javascript:void();' onclick=post('page/page_work_add_form','".md5("v")."=".md5("s")."','proses')><b>Pencarian</a>
	     </td>
             <td width=400px>&nbsp;</td>
        </tr>
        </table>
        <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='proses'>
";
include("page_work_add_form.php");
echo"
	</div>
";
		
?>
