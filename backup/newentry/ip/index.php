<?php
include("browserCLASS.php");
include("ip2locationlite.class.php");
$ipLite = new ip2location_lite;
$ipLite->setKey('aca21178357bf36c85043b402fe7b289ebc696232ba3a1c7225b119a28c12655');
$iplocation=$_GET["pi"];

if($iplocation==""){}
else{
	$locations = $ipLite->getCity($iplocation);
	$errors = $ipLite->getError();
	$fields="start";
	if (!empty($locations) && is_array($locations)) {
		foreach ($locations as $field => $val) {
			$fields="$fields|$field=$val";
  		}
	}
	$data=explode("|",$fields);
	$no=0;
	$iplocation=array();
	WHILE($no<=11){$hasil=explode("=",$data[$no]);$iplocation["$hasil[0]"]=$hasil[1];$no++;}
	echo"$iplocation[ipAddress]|$iplocation[countryCode]|$iplocation[countryName]|$iplocation[regionName]|$iplocation[cityName]|$iplocation[zipCode]|$iplocation[latitude]|$iplocation[longitude]|$iplocation[timeZone]|$iplocation[statusCode]|$iplocation[statusMessage]";
}
?>
