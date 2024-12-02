<?php
$j=date("h");
$m=date("i");
$ap=date("a");
$daay=date('D');
echo"<div id='divinti'><div id='divintia'>";
if($ip=="127.0.0.1" or $ip=="" or $ip=="::1"){
	include("page/page_hrd_form_absen.php");
}
echo"
	</div></div>
";
?>
