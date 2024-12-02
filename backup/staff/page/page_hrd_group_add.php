<?php
$sesstart="on";
echo"
<div style='height:20px;'></div>
        <div align=left>
        <table border=0 width=100% cellspacing=0 cellpadding=0>
        <tr>
             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     		<a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','','proses');><b>Formulir Group</a><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=daftar','proses')><b>Data Group</a><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=search','proses')><b>Pencarian</a><a href='javascript:void();' onclick=post('page/page_hrd_group_add_form','v=input_gaji','proses')><b>Penggajian</a>
	     </td>
             <td width=400px>&nbsp;</td>
        </tr>
        </table>
        <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='proses'>
";
        include("page_hrd_group_add_form.php");
echo"
	</div>
";
?>
