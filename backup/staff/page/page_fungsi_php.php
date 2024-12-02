<?php

function pesan($a,$aa){
		if($aa==""){$aa="staff";}else{$aa="work";}
		echo"
                        <div style='position:fixed; left:0%; top:50%; width:100%' align=center>
				<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>PT. Mulia Impex</b></div>
				<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
					<br>$a<br><br><div align=center>
					<input type='button' value='OK' style='padding:10 20 10 20;' onclick=post('page/page_$aa"."_add_form','".md5("v")."=".md5("back")."','proses')>
				</div></div>
				</div>
		";
}
function jabatanbagian($b){
	$function=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE id like '$b'"));
	$hasil=$function[bagian];
	return $hasil;
}
function jabatansubbagian($c){
	$function=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE id like '$c'"));
	$hasil=$function[subbagian];
	return $hasil;
}
function line($d){
	$function=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$d'"));
	$hasil=$function['subsubbagian'];
	return $hasil;
}
function jobstatus($e){
	$function=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobstatus WHERE id like '$e'"));
	$hasil=$function[status];
	return $hasil;
}
function regnext($f,$ff,$fff,$ffff){
		echo"
                        <div style='position:fixed; left:0%; top:50%; width:100%' align=center>
				<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>PT. Mulia Impex</b></div>
				<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
					<br>$f<br><br><div align=center>
					<input type='button' value='Next' style='padding:10 20 10 20;' onclick=post('$ff','$fff','$ffff')>
				</div></div>
				</div>
		";
}
