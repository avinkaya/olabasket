<?php $pi=$_GET["ip"];$sumber = "http://smart-ip.net/geoip-xml/$pi";$data=@file_get_contents($sumber);preg_match_all( "/<geoip>(.*?)<\/geoip\>/s", $data, $datahasil );foreach($datahasil[1] as $field){preg_match_all( "/<source>(.*?)<\/source>/", $field, $source );preg_match_all( "/<host>(.*?)<\/host>/", $field, $host );preg_match_all( "/<lang>(.*?)<\/lang>/", $field, $lang );preg_match_all( "/<countryName>(.*?)<\/countryName>/", $field, $countryName );preg_match_all( "/<countryCode>(.*?)<\/countryCode>/", $field, $countryCode );preg_match_all( "/<city>(.*?)<\/city>/", $field, $city );preg_match_all( "/<region>(.*?)<\/region>/", $field, $region );preg_match_all( "/<latitude>(.*?)<\/latitude>/", $field, $latitude );preg_match_all( "/<longitude>(.*?)<\/longitude>/", $field, $longitude );}$source=$source[1][0];$host=$host[1][0];$lang=$lang[1][0];$countryName=$countryName[1][0];$countryCode=$countryCode[1][0];$city=$city[1][0];$region=$region[1][0];$latitude=$latitude[1][0];$longitude=$longitude[1][0];$a=$latitude;$l=$longitude;$map1="http://maps.google.com/?ie=UTF8&amp;ll=$a,$l&amp;spn=$a,$l&amp;t=h&amp;z=12&amp;vpsrc=6&amp;output=embed";$map2="http://maps.google.com/?ie=UTF8&amp;ll=$a,$l&amp;spn=$a,$l&amp;t=m&amp;z=12&amp;vpsrc=6&amp;output=embed";if($host==""){echo"<entry><ip>unLocation</ip><negara>Your location not found, try again.</negara></entry>";}else{echo"<entry><ip>$host</ip><negara>$countryName</negara><kode>$countryCode</kode><provinsi>$region</provinsi><kota>$city</kota><latitude>$latitude</latitude><longitude>$longitude</longitude><lang>$lang</lang><map1>$map1</map1><map2>$map2</map2><status>1</status></entry>";} ?>
