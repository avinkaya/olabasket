<?php
$code=$_GET[md5("code")];
switch($_GET[md5("mediamassa")]){
case"":
	
	echo"
		sorry you can't view this content...
	";
break;

case md5("banjarmasin"):
	echo"
		<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://active.macromedia.com/flash5/cabs/swflash.cab#version=8,0,0,0' width='100%' height='590px'>
        	<param name='MOVIE' value='http://epaper.banjarmasinpost.co.id/dok/$code.swf'>
        	<param name='PLAY' value='true'>
        	<param name='LOOP' value='true'>
        	<param name='QUALITY' value='high'>
        	<param name='FLASHVARS' value='zoomtype=3'>
          	<embed src='http://epaper.banjarmasinpost.co.id/dok/$code.swf' play='true' loop='true' quality='high' type='application/x-shockwave-flash' flashvars='zoomtype=3' pluginspage='http://www.macromedia.com/go/getflashplayer' width='100%' height='590px' align=''>
		</object>
	";
break;
}
?>
