<?php
$method=$_GET["method"];
if($method==""){$pi=$_SERVER["REMOTE_ADDR"];}elseif($method=="add"){$pi=$_GET["ip"];}
mysql_connect("localhost","kavindata2011","sqlkavin512");mysql_select_db("kavin1");
$check=mysql_num_rows(mysql_query("SELECT*FROM web_iplocation WHERE ip like '$pi'"));
$sumber = "http://smart-ip.net/geoip-xml/$pi";$data=@file_get_contents($sumber);preg_match_all( "/<geoip>(.*?)<\/geoip\>/s", $data, $datahasil );foreach($datahasil[1] as $field){preg_match_all( "/<source>(.*?)<\/source>/", $field, $source );preg_match_all( "/<host>(.*?)<\/host>/", $field, $host );preg_match_all( "/<lang>(.*?)<\/lang>/", $field, $lang );preg_match_all( "/<countryName>(.*?)<\/countryName>/", $field, $countryName );preg_match_all( "/<countryCode>(.*?)<\/countryCode>/", $field, $countryCode );preg_match_all( "/<city>(.*?)<\/city>/", $field, $city );preg_match_all( "/<region>(.*?)<\/region>/", $field, $region );preg_match_all( "/<latitude>(.*?)<\/latitude>/", $field, $latitude );preg_match_all( "/<longitude>(.*?)<\/longitude>/", $field, $longitude );}$source=$source[1][0];$host=$host[1][0];$lang=$lang[1][0];$countryName=$countryName[1][0];$countryCode=$countryCode[1][0];$city=$city[1][0];$region=$region[1][0];$latitude=$latitude[1][0];$longitude=$longitude[1][0];$a=$latitude;$l=$longitude;$map1="http://maps.google.com/?ie=UTF8&amp;ll=$a,$l&amp;spn=$a,$l&amp;t=h&amp;z=12&amp;vpsrc=6&amp;output=embed";$map2="http://maps.google.com/?ie=UTF8&amp;ll=$a,$l&amp;spn=$a,$l&amp;t=m&amp;z=12&amp;vpsrc=6&amp;output=embed";
if($check!=0){}else{
	if($host!=""){mysql_query("INSERT INTO web_iplocation VALUE ('','$host','$countryName','$countryCode','$region','$city','$latitude','$longitude','$lang','$source','$map1','$map2','1')");
}}
echo"<html><head><title>$pi</title></head></html>";
//<iframe src='http://www.camellia-house.com/aplication/whois_add.php?ip=$host&negara=$countryName&kode=$countryCode&provinsi=$region&kota=$city&latitude=$latitude&longitude=$longitude&lang=$lang&source=$souce&map1=$map1&map2=$map2' width=0px height=0px frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
?>
