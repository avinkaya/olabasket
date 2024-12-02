<?php
switch($_GET['tv']){
case"":
echo"
<head><title>SSU Television Transmition</title></head>
<body  topMargin='0' rightMargin='0' marginwidth='0' marginheight='0' bgcolor=white><center>
<div style='padding:8 10 8 10;border-top:solid 2px #ebebeb;background:#fafafa;font-size:12px;font-family:arial' align=left><b>TV Online</b> ( <a href='javascript:void()' onclick=window.open('http://io.unnes.ac.id/tv.php','','height=490,width=480,toolbar=no,scrollbars=no')>SCTV</a> )</div>
<div style='padding:5 10 10 10;border-bottom:solid 1px #efefef;font-size:11px;font-family:arial' align=center>
<table border=0 cellspacing=0 cellpadding=0 width=100%>
<tr valign=top><td width=380px style='font-size:11px;font-family:arial'>
<iframe src='tv2.php?tv=view' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100%;height:700px;' allowTransparency='true'></iframe>

</td></tr></table>
</div>";

break;

case"view":
echo"<iframe align=center src='tv2.php?tv=view1' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:600;height:800px;left:-20px;position:relative;top:-245px' allowTransparency='true'></iframe>";
break;


case"view1":
echo"<center>
<object align=center classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0' width='100%' height='900'>
<param name='movie' value='kampungan/tv2.swf' />
<param name='quality' value='high' />
<param name='wmode' value='transparent' />
<embed src='kampungan/tv2.swf?r=33712' quality='high' wmode='transparent' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='100%' height='900'></embed>
</object>
</center>";
break;
}


//<iframe src='http://zons.000a.biz/etc/tv/multitv01.html' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:376px;height:321px' allowTransparency='true'></iframe>
?>
