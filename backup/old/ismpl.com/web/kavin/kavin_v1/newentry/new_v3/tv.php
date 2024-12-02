<?php
switch($_GET['tv']){
case"":
echo"
<body  topMargin='0' rightMargin='0' marginwidth='0' marginheight='0' bgcolor=white><center>
<div style='padding:5 5 5 5;background:#252525;color:white;'>
      <div style='width:500px;font-family:arial;font-size:18px' align=left><b>International Office Semarang State University</b></div>
    </div><br>
<div style='padding:8 10 8 10;border-top:solid 2px #ebebeb;background:#fafafa;font-size:12px;font-family:arial' align=left><b>TV Online</b></div>
<div style='padding:10 10 10 10;border-bottom:solid 1px #efefef;font-size:11px;font-family:arial' align=center>
<table border=0 cellspacing=0 cellpadding=0 width=100%>
<tr valign=top><td width=380px style='font-size:11px;font-family:arial'>
<iframe src='kampungan/tv.php?tv=view' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100%;height:330px;' allowTransparency='true'></iframe>
Sementara stasiun TV yang dapat anda lihat baru TransTV, SCTV, Trans7, Indosiar, TVone dan MivoTV. untuk stasiun TV yang lainya baru kami proses untuk mengkomunikasikan ke Server Stasiun tersebut.
</td><td align=left>
<img src='gambar/tv_an.gif' width=50px border=0><br>
<img src='gambar/tv_sctv.gif' width=50px border=0><br>
<img src='gambar/tv_rcti.jpg' width=50px border=0><br>
<img src='gambar/tv_one.jpg' width=50px border=0><br>
<img src='gambar/tv_metro.jpg' width=50px border=0><br>
<img src='gambar/tv_transtv.jpg' width=50px border=0><br>
<img src='gambar/tv_mivo.jpg' width=50px border=0><br>
<img src='gambar/tv_bali.jpg' width=50px border=0><br>
<img src='gambar/tv_pj.jpg' width=50px border=0><br>
<img src='gambar/tv_global.png' width=50px border=0><br>
<img src='gambar/tv_space.jpg' width=50px border=0><br>
</td></tr></table>
</div>";

break;

case"view":
echo"<iframe align=center src='kampungan/tv.php?tv=view1' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:513;height:580px;left:-150px;position:relative;top:-233px' allowTransparency='true'></iframe>";
break;


case"view1":
echo"<center>
<object align=center classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0' width='100%' height='560'>
<param name='movie' value='kampungan/tv.swf' />
<param name='quality' value='high' />
<param name='wmode' value='transparent' />
<embed src='kampungan/tv.swf?r=33712' quality='high' wmode='transparent' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='100%' height='560'></embed>
</object>
</center>";
break;
}


//<iframe src='http://zons.000a.biz/etc/tv/multitv01.html' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:376px;height:321px' allowTransparency='true'></iframe>
?>
