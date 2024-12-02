<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");
$pimpinan=mysql_fetch_array(mysql_query("SELECT*FROM v1_banner WHERE kategori like 'Camat' AND status like 'tampil' ORDER by id Desc",$sambungan));
if($pimpinan['file']==""){$pimpinan['file']="blank.jpg";$pimpinan['nama']="none";}
echo"  
        <div id='metitle' align=left><b></b></div>
        <div id='tag' align=center>
		<img src='pimpinan/$pimpinan[file]' width='180px' border=0>
		<div style='height:10px'></div>
		<div id='metitle' style='width:180px;padding:5 2 0 2;'><b>$pimpinan[nama]</b></div>
		<div style='height:10px'></div>
       	</div>
";
?>
