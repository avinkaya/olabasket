<?php

/**
* @author Jasman
* @Copyright (c) 2010 Ihsana IT Solution (www.ihsana.com)
* Licensed under the MIT license
* http://www.opensource.org/licenses/mit-license.php
*/

class Browser {

public static function detect() {
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);

if (preg_match('/opera/', $userAgent)) {
  $name = 'Opera';
}
elseif (preg_match('/webkit/', $userAgent)) {
  $name = 'Safari/Chrome';
}
elseif (preg_match('/msie/', $userAgent)) {
  $name = 'Internet Explorer';
}
elseif (preg_match('/mozilla/', $userAgent) && !preg_match('/compatible/', $userAgent)) {
  $name = 'Mozilla Firefox';
}
else {
  $name = 'unrecognized';
}


if (preg_match('/.+(?:fox|it|ra|ie)[\/: ]([\d.]+)/', $userAgent, $matches)) {
  $version = $matches[1];
}
else {
  $version = 'unknown';
}


if (preg_match('/linux/', $userAgent)) {
  $platform = 'linux';
}
elseif (preg_match('/macintosh|mac os x/', $userAgent)) {
  $platform = 'mac';
}
elseif (preg_match('/windows|win32/', $userAgent)) {
  $platform = 'Windows';
}
else {
  $platform = 'unrecognized';
}

return array(
'name' => $name,
'version' => $version,
'platform' => $platform
);
}
}

$browser = Browser::detect();
$rip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$engine = $_SERVER['HTTP_VIA'];
$ip = $_SERVER['REMOTE_ADDR'];
?>

