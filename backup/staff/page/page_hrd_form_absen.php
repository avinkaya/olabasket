<?php

echo"
	<div style='padding:20 0 20 0;font-family:arial;font-size:19px;' align=left><b>
		<img src='avin.jpg' width=40px border=0 align=left>&nbsp;
		ABSENSI KARYAWAN<br>&nbsp;&nbsp;<small>PT MULIA IMPEX, KARANGANYAR</small></b>
	</div>
	<table width=100% cellspacing=0 cellpadding=0>
	<tr valign=top>
		<td align=left width=350px>
			<script type='text/javascript' src='presensi/webcam.js'></script>
			<script language='JavaScript'>
				webcam.set_api_url( 'presensi/presensi.php');
				webcam.set_quality( 60 );
				webcam.set_shutter_sound( true );
				window.onload = function(){
         				var text_input = document.getElementById('identitas');
          				text_input.focus ();
          				text_input.select ();
        			}
    				webcam.set_hook( 'onComplete', 'my_completion_handler' );

				function take_snapshot() {
		        		if(document.getElementById('identitas').value){
						webcam.snap('presensi/presensi.php?nik='+document.getElementById('identitas').value);
					}
				}
				
				function my_completion_handler(msg) {
					update = msg.split('|');
					var image_url = RegExp.$1;
					if(update[0]=='masuk'){
						document.getElementById('hasil_nama').innerHTML =update[1];
						document.getElementById('hasil_nik').innerHTML =update[2];
						document.getElementById('hasil_uk').innerHTML =update[3];
						document.getElementById('hasil_jabatan').innerHTML =update[4];
						document.getElementById('hasil_masuk').innerHTML =update[5];
						document.getElementById('hasil_keluar').innerHTML =update[6];
						document.getElementById('gagal').innerHTML ='<div style=padding:7;border:1px;background:#B3C6FF;><b>ABSENSI MASUK</b>. <br>Selamat datang di PT Mulia Impex, selamat bekerja!</div>';
     					}else if(update[0]=='pulang'){
						document.getElementById('hasil_nama').innerHTML =update[1];
						document.getElementById('hasil_nik').innerHTML =update[2];
						document.getElementById('hasil_uk').innerHTML =update[3];
						document.getElementById('hasil_jabatan').innerHTML =update[4];
						document.getElementById('hasil_masuk').innerHTML =update[5];
						document.getElementById('hasil_keluar').innerHTML =update[6];
						document.getElementById('gagal').innerHTML ='<div style=padding:7;border:1px;background:#B3C6FF;><b>ABSENSI PULANG</b>. <br>Terimakasih anda telah bekerja giat hari ini!</div>';
     					}else{
					        document.getElementById('hasil_nama').innerHTML ='';
						document.getElementById('hasil_nik').innerHTML ='';
						document.getElementById('hasil_uk').innerHTML ='';
						document.getElementById('hasil_jabatan').innerHTML ='';
						document.getElementById('hasil_masuk').innerHTML ='';
						document.getElementById('hasil_keluar').innerHTML ='';
						document.getElementById('gagal').innerHTML ='<div style=padding:7;border:1px;border:red;background:pink;><b>ABSENSI GAGAL</b>. <br>'+update[1]+'</div>';
					}
					var text_input = document.getElementById ('identitas');
					webcam.reset();
					text_input.value='';
          				text_input.focus ();
          				text_input.select ();
				}
                        
			</script>
   				<embed id='webcam_movie' src='webcam.swf' loop='false' menu='false' quality='best' bgcolor='#ffffff' name='webcam_movie' allowscriptaccess='always' allowfullscreen='false' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' flashvars='shutter_enabled=1&amp;shutter_url=shutter.mp3&amp;width=350&amp;height=420&amp;server_width=170&amp;server_height=200' align='middle' height='420' width='350'>
		</td>
		<td width=20>&nbsp;</td>
		<td width=500 valign=top onclick=document.getElementById ('identitas').focus>
			<form name='form1' >
		        <div style='background:black;width:480px;'>
		        <input type=text name='identitas' id='identitas' style='padding:7 7 7 7;border:solid 1px black;width:300px;font-size:30px' onchange=take_snapshot() align=center>
			<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0' id='jam' align='middle' height='50' width='170'>
				<param name='allowScriptAccess' value='sameDomain'>
				<param name='movie' value='presensi/jam.swf'>
				<param name='quality' value='high'>
				<param name='bgcolor' value='#993300'>
				<embed src='presensi/jam.swf' quality='high' bgcolor='#993300' wmode='transparent' name='jam' allowscriptaccess='sameDomain' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' align='top' height='50' width='170'>
			</object></form></div><br>
			<table width=70% border=0 cellspacing=10 cellpadding=5 style='background:yellow;opacity:0.6;filter:alpha(opacity=100);'>
			<tr valign=top>
			        <td align=left colspan=3>
					<div id='gagal'></div><br>
					<b><div id='hasil_nama' style='font-size:16px;font-family:arial;text-transform:uppercase;'>Karyawan</div></b>
				</td>
			</tr>
			<tr valign=top>
			        <td align=right style='font-size:12px;font-family:arial' width=60px>NIK</td>
			        <td style='font-size:12px;font-family:arial' width=5px align=center>:</td>
			        <td><b><div id='hasil_nik' style='font-size:13px;font-family:arial;text-transform:capitalize;border-bottom: 1px dotted black'>&nbsp;</div></td>

			</tr>
			<tr valign=top>
			        <td align=right style='font-size:12px;font-family:arial'>Unit Kerja</td>
			        <td style='font-size:12px;font-family:arial' align=center>:</td>
			        <td><b><div id='hasil_uk' style='font-size:13px;font-family:arial;text-transform:capitalize;border-bottom: 1px dotted black'>&nbsp;</div></td>

			</tr>
			<tr valign=top>
			        <td align=right style='font-size:12px;font-family:arial'>Jabatan</td>
			        <td style='font-size:12px;font-family:arial' align=center>:</td>
			        <td ><b><div id='hasil_jabatan' style='font-size:13px;font-family:arial;text-transform:capitalize;border-bottom: 1px dotted black'>&nbsp;</div></td>

			</tr>
			<tr valign=top>
			        <td align=right style='font-size:12px;font-family:arial'>Masuk</td>
			        <td style='font-size:12px;font-family:arial' align=center>:</td>
			        <td><b><div id='hasil_masuk' style='font-size:13px;font-family:arial;text-transform:capitalize;border-bottom: 1px dotted black'>&nbsp;</div></td>

			</tr>
			<tr valign=top>
			        <td align=right style='font-size:12px;font-family:arial'>Pulang</td>
			        <td style='font-size:12px;font-family:arial' align=center>:</td>
			        <td><b><div id='hasil_keluar' style='font-size:13px;font-family:arial;text-transform:capitalize;border-bottom: 1px dotted black'>&nbsp;</div></td>

			</tr>
			<tr><td  colspan=3><br></td></tr>
			</table>
			</div>
		</td>
	</tr>
	</table>
";
?>
