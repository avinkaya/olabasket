<?php
$jam=date("h : i a");
$tanggal=date("d");
$bulan=date('m');
$tahun=date("Y");
$ip=$_SERVER['REMOTE_ADDR'];
$host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
function hari()
	{
	$input=date('D');
	if($input=='Sun'){$output='Minggu';}
	if($input=='Mon'){$output='Senin';}
	if($input=='Tue'){$output='Selasa';}
	if($input=='Wed'){$output='Rabu';}
	if($input=='Thu'){$output='Kamis';}
	if($input=='Fri'){$output='Jumat';}
	if($input=='Sat'){$output='Sabtu';}
	return $output;
}
$hari=hari();
function bulannama($mont){
	switch($mont){
	case"1":$hasil="Januari";break;
	case"2":$hasil="Februari";break;
	case"3":$hasil="Maret";break;
	case"4":$hasil="April";break;
	case"5":$hasil="Mei";break;
	case"6":$hasil="Juni";break;
	case"7":$hasil="Juli";break;
	case"8":$hasil="Agustus";break;
	case"9":$hasil="September";break;
	case"10":$hasil="Oktober";break;
	case"11":$hasil="November";break;
	case"12":$hasil="Desember";break;
	}return $hasil;
}
$iduser=$_SESSION["sessionid"];
$userdata=mysql_fetch_array(mysql_query("SELECT*FROM user_data WHERE id like '$iduser'"));
$staffdata=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$userdata[idstaff]'"));
$staffdata[nama]=strtoupper($staffdata[nama]);

function form($input)
	{
	$input=trim($input);
	$input=strip_tags($input);
	$input=addslashes($input);
	$input=stripslashes($input);
	$input=htmlentities($input);
	$input=nl2br($input);
	$input=ltrim($input);
	$input=rtrim($input);
	return $input;
}
function potong($input,$limit)
	{
	if(strlen($input)>$limit)
		{
		$input=substr($input,0,($limit-3))."...";
		}
	return $input;
}
function num($d){
    if(strlen($d)==1){$hasil="0$d";}
    elseif(strlen($d)==2){$hasil="$d";}
    return $hasil;
}
?>
