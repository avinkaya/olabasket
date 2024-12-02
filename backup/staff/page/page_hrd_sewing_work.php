<?php
session_start();
include("dbase_conection.php");
include("page_function_time.php");

switch($_POST["v"]){
case "":
	echo"
	<div style='height:20px;'></div>
        <div align=left>
        <table border=0 width=100% cellspacing=0 cellpadding=0>
        <tr>
             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     	<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listkontrak','proses')><b>Daftar Kontrak</a><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerja','proses')><b>Proses Kerja</a><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerjagroup','proses')><b>Group Proses</a>
	     </td>
             <td width=400px>&nbsp;</td>
        </tr>
        </table>
        <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='proses'>
        <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Kontrak Kerja</b> | List</div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listkontrak','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=pencarian','proses');>Search</a>
		</div></div><div style='height:3px;background:black'></div>
		<div style='height:10px'></div>
		<div id='tableinti1'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px #5B5B5B'>
	        <tr valign=center style='background:#5B5B5B'>
	            <th style='color:white;font-size:12px;font-family:arial;width:10px;' rowspan=2>NO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;' rowspan=2>KONTRAK KERJA</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:300px;' rowspan=2>SPESIFIKASI</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:300px;' colspan=3>TANGGAL</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:60px;' rowspan=2>QUANTITY<br>(PCS)</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:60px;' rowspan=2>KELOLA</th>
	        </tr>
	        <tr valign=top style='background:#5B5B5B'>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>MATERIAL</th>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>FINISH</th>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>DELIVERY</th>
	        </tr>
	";
	$dataquery=mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE status like '1' ORDER by id Desc");
	$datanum=mysql_num_rows($dataquery);
	if($datanum=="0"){
	        echo"
			<tr valign=top><td colspan=6>Belum ada data kontrak kerja</td></tr>
		";
	}else{
		$no=1;
		WHILE($data=mysql_fetch_array($dataquery)){
			echo"
			        <tr valign=top>
			                <td>$no</td>
			                <td>$data[nomor]</td>
			                <td>Item $data[barang]<br>Fabric $data[kain]<br>Brand $data[merek]</td>
			                <td align=center>$data[tanggalbahan]/$data[bulanbahan]/$data[tahunbahan]</td>
			                <td align=center>$data[tanggalselesai]/$data[bulanselesai]/$data[tahunselesai]</td>
			                <td align=center>$data[tanggalpengiriman]/$data[bulanpengiriman]/$data[tahunpengiriman]</td>
			                <td>$data[kuantitas]</td>
			                <td align=center>
						<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=detailkontrak&id=$data[id]','proses');>Detil</a>
					</td>
			        </tr>
			";$no++;
		}
	}


	echo"
	        </table>
	        </div>
";
break;

case"listkontrak":
echo"
                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Kontrak Kerja</b> | List</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listkontrak','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=pencarian','proses');>Search</a>
		</div></div><div style='height:3px;background:black'></div>
		<div style='height:10px'></div>
		<div id='tableinti1'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px #5B5B5B'>
	        <tr valign=center style='background:#5B5B5B'>
	            <th style='color:white;font-size:12px;font-family:arial;width:10px;' rowspan=2>NO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;' rowspan=2>KONTRAK KERJA</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:300px;' rowspan=2>SPESIFIKASI</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:300px;' colspan=3>TANGGAL</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:60px;' rowspan=2>QUANTITY<br>(PCS)</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:60px;' rowspan=2>KELOLA</th>
	        </tr>
	        <tr valign=top style='background:#5B5B5B'>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>MATERIAL</th>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>FINISH</th>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>DELIVERY</th>
	        </tr>
	";
	$dataquery=mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE status like '1' ORDER by id Desc");
	$datanum=mysql_num_rows($dataquery);
	if($datanum=="0"){
	        echo"
			<tr valign=top><td colspan=6>Belum ada data kontrak kerja</td></tr>
		";
	}else{
		$no=1;
		WHILE($data=mysql_fetch_array($dataquery)){
			echo"
			        <tr valign=top>
			                <td>$no</td>
			                <td>$data[nomor]</td>
			                <td>Item $data[barang]<br>Fabric $data[kain]<br>Brand $data[merek]</td>
			                <td align=center>$data[tanggalbahan]/$data[bulanbahan]/$data[tahunbahan]</td>
			                <td align=center>$data[tanggalselesai]/$data[bulanselesai]/$data[tahunselesai]</td>
			                <td align=center>$data[tanggalpengiriman]/$data[bulanpengiriman]/$data[tahunpengiriman]</td>
			                <td>$data[kuantitas]</td>
			                <td align=center>
						<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=detailkontrak&id=$data[id]','proses');>Detil</a>
					</td>
			        </tr>
			";$no++;
		}
	}


	echo"
	        </table>
	        </div>
	";
break;

case"detailkontrak":
	$id=$_POST['id'];
	$data=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$id' LIMIT 0,1"));
	echo"
                <div style='font-size:16px;background:#EAEAEA;color:black;font-family:arial;padding:7 7 7 7;border:solid 1px rgb(147,151,145)'>
			<b>Detail Kontrak Kerja</b>
		</div><div style='height:10px;'></div>
		<div align=left>
		<table border=0 width=100% cellspacing=0 cellpadding=0>
		<tr>
			<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
		     		<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=detailkontrak&id=$id','proses');>Kontrak No : <b>$data[nomor]</a>
	     		</td>
			<td width=400px>&nbsp;</td>
		</tr>
        	</table>
		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
        	<table border=0 width=100% cellspacing=10 cellpadding=0>
        	<tr valign=top>
        	        <td width=100px align=right><b>C.M.T</td>
        	        <td width=5px><b>:</td>
        	        <td width=300px>$data[cmt]</td>
        	        <td rowspan=15 width=200px>";
$nn=1;
$styleq=mysql_query("SELECT*FROM marketing_style WHERE idkk like '$data[id]' Order by id Asc");
while($style=mysql_fetch_array($styleq)){
	if($style['filedesign']==""&$style['filephotodesign']==""&$style['filephotokain']==""){}
	else{
		if($style['filedesign']!=""){echo"<img src='photo_kk/$style[filedesign]' height=30px style='border:solid 1px rgb(147,151,145)'  onclick=post('page/page_hrd_sewing_work','v=imgshow&file=$style[filedesign]','imgshow');>&nbsp;&nbsp;";$nn++;}
		if($style['filephotodesign']!=""){echo"<img src='photo_kk/$style[filephotodesign]' height=30px style='border:solid 1px rgb(147,151,145)' onclick=post('page/page_hrd_sewing_work','v=imgshow&file=$style[filephotodesign]','imgshow');>&nbsp;&nbsp;";$nn++;}
		if($style['filephotokain']!=""){echo"<img src='photo_kk/$style[filephotokain]' height=30px style='border:solid 1px rgb(147,151,145)' onclick=post('page/page_hrd_sewing_work','v=imgshow&file=$style[filephotokain]','imgshow');>&nbsp;&nbsp;";$nn++;}
		if($nn>=4){echo"<br>";$nn=1;}else{echo"";}
	}
}
$styleran=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE idkk like '$data[id]' Order by rand()"));
$data['accsesories']=form($data['accsesories']);
$data['sewing']=form($data['sewing']);
$data['packing']=form($data['packing']);
echo"
	<br><br>
	<div style='padding:5 5 5 5;border:solid 1px rgb(147,151,145);border-bottom:solid 0px white;width:60px'>Tumbnail</div>
	<div id='imgshow'>
	<img src='photo_kk/$styleran[filedesign]' width=250px style='padding:5 5 5 5;border:solid 1px rgb(147,151,145)'  onclick=post('page/page_hrd_sewing_work','v=imgshowbig&file=1.jpg','imgshowbig');>
	</div><div id='imgshowbig'></div>
	</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Item / Barang</td>
        	        <td><b>:</td>
        	        <td>$data[barang]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Fabric / Kain</td>
        	        <td><b>:</td>
        	        <td>$data[kain]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Brand</td>
        	        <td><b>:</td>
        	        <td>$data[merek]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>PO. No</td>
        	        <td><b>:</td>
        	        <td>$data[pono]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>S.A.S</td>
        	        <td><b>:</td>
        	        <td>$data[sas]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>T. No</td>
        	        <td><b>:</td>
        	        <td>$data[tno]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Kontrak</td>
        	        <td><b>:</td>
        	        <td>$data[tanggal]/$data[bulan]/$data[tahun]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Quantity</td>
        	        <td><b>:</td>
        	        <td>$data[kuantitas] &nbsp;&nbsp;&nbsp;<b>Repeat :</b> $data[repeat] &nbsp;&nbsp;&nbsp;<b>Gramasi :</b> $data[gramasi] </td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Bahan</td>
        	        <td><b>:</td>
        	        <td>$data[tanggalbahan]/$data[bulanbahan]/$data[tahunbahan]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Selesai</td>
        	        <td><b>:</td>
        	        <td>$data[tanggalselesai]/$data[bulanselesai]/$data[tahunselesai]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Pengiriman</td>
        	        <td><b>:</td>
        	        <td>$data[tanggalpengiriman]/$data[bulanpengiriman]/$data[tahunpengiriman]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Detail Accessories</td>
        	        <td><b>:</td>
        	        <td>$data[accsesories]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Detail Sewing</td>
        	        <td><b>:</td>
        	        <td>$data[sewing]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Detail Packing</td>
        	        <td><b>:</td>
        	        <td>$data[packing]</td>
        	</tr>
        	</table><br><br>
		<b>Data Style</b>
		<hr style='border:solid 1px black'></hr>
		<div id='tableinti1'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px #5B5B5B'>
	        <tr valign=center style='background:#5B5B5B'>
	            <th style='color:white;font-size:11px;font-family:arial;width:10px;'>NO</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:120px;'>STYLE</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:120px;'>COMBO</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:60px;'>SIZE</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:60px;'>RATIO</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:60px;'>QTY<br>(PCS)</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:170px;'>KET</th>
	            <th style='color:white;font-size:11px;font-family:arial;width:60px;'>KELOLA</th>
	        </tr>
	";
	$sizeq=mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$data[id]' AND status like '1' ORDER By idstylecom,idcombo,id Asc");
       	$sizen=mysql_num_rows($sizeq);
       	if($sizen==0){
	        echo"
	                <tr><td colspan=8>Belum ada data style untuk kontrak kerja ini</td></tr>
		";
	}else{$no=1;$jumlah=0;
	        WHILE($size=mysql_fetch_array($sizeq)){
	        	$styleq=mysql_query("SELECT*FROM marketing_style WHERE id like '$size[idstylecom]' and status like '1' ORDER by id Asc");
	                $comboq=mysql_query("SELECT*FROM marketing_combo WHERE id like '$size[idcombo]' AND status like '1' ORDER By id Asc");
		        $stylen=mysql_num_rows($styleq);$combon=mysql_num_rows($comboq);
		        $style=mysql_fetch_array($styleq);$combo=mysql_fetch_array($comboq);
		        $jumlah=$jumlah+$size['kuantitas'];
			echo"
				<tr valign=top>
					<td align=center>$no</td>
					<td>$style[stylecom]</td>
					<td>Combo $combo[combo] ( $combo[warna] )</td>
					<td align=center>$size[ukuran]</td>
					<td align=center>$size[ratio]</td>
					<td align=center>$size[kuantitas]</td>
					<td>$size[ket]</td>
					<td align=center>Detil</td>
				</tr>
			";$no++;
		}
	}
	if($jumlah==$data['kuantitas']){$valid="<font style='color:#0000FF'>valid</font>";}else{$valid="<font style='color:red'>unValid</font>";}
	echo"
	        <tr>
	                <td colspan=7 align=right>Status order quantity ($valid) | <b>TOTAL QUANTITY</td>
	                <td><b style='font-size:16px'>$jumlah</b> pcs</td>
	        </tr>
		</table><br>
			<input type=button value='Print Exel' onclick=post('page/page_hrd_sewing_work','v=downloadexcel&id=$id','upload');>&nbsp;&nbsp;
			<input type=button value='Print PDF'>&nbsp;&nbsp;
			<input type=button value='Printed'>&nbsp;&nbsp;
		</div><div id='upload'></div>
	";
break;

case"imgshow":
	$file=$_POST['file'];
	echo"<img src='photo_kk/$file' width=250px style='padding:5 5 5 5;border:solid 1px rgb(147,151,145)'  onclick=post('page/page_hrd_sewing_work','v=imgshowbig&file=$file','imgshowbig');>";
break;
case"imgshowbig":
	$file=$_POST['file'];
	echo"
			<div style='position:fixed; left:0%; top:5%; width:100%' align=center onclick=post('page/page_hrd_sewing_work','v=vv','imgshowbig')>
			<div style='padding:5 10 5 10;width:700px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Zoom View (+)</b></div>
			<div style='padding:10 10 10 10;width:700px;border:solid 1px #6F0000;background:white' align=center>
			        <img src='photo_kk/$file' height=500px style='padding:5 5 5 5;'>
			</div></div>
			</div>
		";
break;
case"vv":
break;

case"pencarian":
	echo"
	        <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Kontrak Kerja</b> | Search</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listkontrak','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=pencarian','proses');>Search</a>
		</div></div>
		<div style='background:black;color:white;padding:0 5 0 5'>
	        <form name=form11>
	        Kata Kunci <input type=text name=kunci style='width:300px'>&nbsp;
	        <select name=type style='width:150px'>
	                <option value='nomor'>Nomor Kontrak</option>
	                <option value='barang'>Item / Barang</option>
	                <option value='kain'>Fabric / Kain</option>
	                <option value='merek'>Brand / Merek</option>
	                <option value='pono'>PO.No</option>
	                <option value='tno'>T.No</option>
	        </select>
	        <input type=button value='Cari' onclick=post('page/page_hrd_sewing_work','v=pencariandata&kunci='+document.form11.kunci.value+'&type='+document.form11.type.value,'searchdata');>
	        </form></div>
		<div id='searchdata'></div>
	";
break;

case"pencariandata":
	$kunci=$_POST['kunci'];
	$type=$_POST['type'];
	if($kunci==""){echo"&nbsp;anda belum mengisi kata kunci pencarian.";}
	else{
        echo"
                <div style='font-size:16px;background:#EAEAEA;color:black;font-family:arial;padding:7 7 7 7;border:solid 1px rgb(147,151,145)'>
			<b>Pencarian</b> [ $type : <i>$kunci ..</i> ]
		</div><div style='height:10px'></div>
		<div id='tableinti1'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px #5B5B5B'>
	        <tr valign=center style='background:#5B5B5B'>
	            <th style='color:white;font-size:12px;font-family:arial;width:10px;' rowspan=2>NO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;' rowspan=2>KONTRAK KERJA</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:300px;' rowspan=2>SPESIFIKASI</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:300px;' colspan=3>TANGGAL</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:60px;' rowspan=2>QUANTITY<br>(PCS)</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:60px;' rowspan=2>KELOLA</th>
	        </tr>
	        <tr valign=top style='background:#5B5B5B'>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>MATERIAL</th>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>FINISH</th>
                    <th style='color:white;font-size:12px;font-family:arial;width:100px;'>DELIVERY</th>
	        </tr>
	";
	$dataquery=mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE $type like '%$kunci%' AND status like '1' ORDER by id Desc");
	$datanum=mysql_num_rows($dataquery);
	if($datanum=="0"){
	        echo"
			<tr valign=top><td colspan=8>Pencarian dengan kata <b>$kunci</b> tidak diketemukan, gunakan kata kunci yang lain</td></tr>
		";
	}else{
		$no=1;
		WHILE($data=mysql_fetch_array($dataquery)){
			echo"
			        <tr valign=top>
			                <td>$no</td>
			                <td>$data[nomor]</td>
			                <td>Item $data[barang]<br>Fabric $data[kain]<br>Brand $data[merek]</td>
			                <td align=center>$data[tanggalbahan]/$data[bulanbahan]/$data[tahunbahan]</td>
			                <td align=center>$data[tanggalselesai]/$data[bulanselesai]/$data[tahunselesai]</td>
			                <td align=center>$data[tanggalpengiriman]/$data[bulanpengiriman]/$data[tahunpengiriman]</td>
			                <td>$data[kuantitas]</td>
			                <td align=center>
						<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=detailkontrak&id=$data[id]','proses');>Detil</a>
					</td>
			        </tr>
			";$no++;
		}
	}


	echo"
	        </table>
	        </div>
	";}
break;

case"downloadexcel":
	$id=$_POST["id"];
	echo"
		<iframe src='creator/marketing_kontrak_print_excel.php?id=$id' width=100% height=5px frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
		";

break;

case"proseskerja":
	$style=$_POST['style'];
	echo"
                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Proses Kerja</b> | Formulir</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerja','proses');>Formulir</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseslist','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=prosespencarian','proses');>Search</a>
		</div></div><div style='height:3px;background:black'></div>
		<div style='height:10px'></div>
                <form name='form101'>
		<table width=100% cellspacing=3 cellpadding=0>
		<tr>
		        <td width=100px align=right>Style</td>
		        <td>:</td>
		        <td>
				<select name='style' style='width:150px'>
				<option value='$style'>~ Pilih ~</option>
		";
		$query=mysql_query("SELECT*FROM marketing_style WHERE status like '1' ORDER By id Desc");
		WHILE($data=mysql_fetch_array($query)){
			echo"<option value='$data[id]'>$data[stylecom]</option>";
		}
		echo"
				</select>
			</td>
		        <td width=100px align=right>Code Proses</td>
		        <td>:</td>
		        <td width=300px>
		                <input type=text name='code' style='width:100px;font-size:15px'>
			</td>
		</tr>
		<tr>
		        <td align=right>Output @ Line</td>
			<td>:</td>
		        <td>
				<input type=text name='oline' style='width:70px'> ps/
				<select name='olinesat'>
					<option value='1'>Hari</option>
					<option value='2'>Jam</option>
					<option value='3'>Bulan</option>
				</select>
			</td>
			<td align=right>Item Proses</td>
			<td>:</td>
		        <td>
		                <input type=text name='item' style='width:300px;font-size:12px'>
			</td>
		</tr>
		<tr>
		        <td align=right>Penjahit</td>
			<td>:</td>
		        <td>
		                <input type=text name='penjahit' style='width:90px'> orang
			</td>
			<td align=right>Harga proses</td>
			<td>:</td>
		        <td>
                                &nbsp;&nbsp;Rp.
				<input type=text name='harga' style='width:50px;font-size:15px'> , 00
			</td>
		</tr>
                <tr>
		        <td align=right></td>
			<td></td>
		        <td colspan=4 align=left><br>
		                <input type=reset value='Reset' style='width:100px;font-size:12px'>
				<input type=button value='Simpan' style='width:100px;font-size:12px' onclick=post('page/page_hrd_sewing_work','v=proseskerja_proses&code='+document.form101.code.value+'&style='+document.form101.style.value+'&oline='+document.form101.oline.value+'&olinesat='+document.form101.olinesat.value+'&penjahit='+document.form101.penjahit.value+'&harga='+document.form101.harga.value+'&item='+document.form101.item.value,'aksiproseskerja');document.form101.item.value='';document.form101.harga.value='';document.form101.code.value='';>
			</td>
		</tr>
		</table><div style='height:15px'></div>
		<div id='aksiproseskerja'></div></form>
	";
break;
case"proseskerja_proses":
	$style=$_POST['style'];
	$oline=$_POST['oline'];
	$olinesat=$_POST['olinesat'];
	$penjahit=$_POST['penjahit'];
	$code=$_POST['code'];
	$harga=$_POST['harga'];
	$item=$_POST['item'];
 	if($style!=""){
 	        if($code!=""&$harga!=""&$item!=""){
			$save=mysql_query("INSERT INTO hrd_staff_proses_kerja VALUE ('','$style','$oline','$olinesat','$penjahit','','$code','$item','$harga','','','','".$_SESSION['sessionid']."','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','1')");
			if($save){}else{
				echo"<div style='padding:7 7 7 7;background:pink;border:solid 1px red;'>Data tidak dapat disimpan, silahkan coba kembali.</div>";
			}
		}
		$id=$_POST['id'];
		SWITCH($_POST['aksi']){
			case"delete":
		        	$delete=mysql_query("UPDATE hrd_staff_proses_kerja SET status=0 WHERE id like '$id'");
			        if(!$delete){echo"<div style='padding:7 7 7 7;background:pink;border:solid 1px red;'>Data tidak dapat dihapus, silahkan coba kembali.</div>";}
			break;
		}
		$stylename=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE status like '1' AND id like '$style'"));
	         echo"
	                <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
             		<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     		<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerja_proses&style=$style','aksiproseskerja');><b>Style : $stylename[stylecom]</a>
	     		</td>
             			<td width=400px>&nbsp;</td>
        		</tr>
        		</table>
        		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
	                <div id='tableinti1'>
	                <table width=100% cellspacing=1 cellpadding=3 border=0>
	                <tr bgcolor='#5B5B5B'>
	                        <th style='width:5px;padding:7 7 7 7;'>NO</th>
	                        <th style='width:80px;padding:7 7 7 7;'>CODE</th>
	                        <th style='width:250px;padding:7 7 7 7;'>ITEM</th>
	                        <th style='width:100px;padding:7 7 7 7;'>HARGA</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OUPUT LINE</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OPERATOR</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OUTPUT OPERATOR</th>
	                        <th style='width:100px;padding:7 7 7 7;'>KELOLA</th>
	                </tr>
			
		";$no=1;
		$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$style' AND status like '1' Order by id Desc");
		$prosesn=mysql_num_rows($prosesq);
		if($prosesn==0){
		        echo"<tr><td colspan=8>Belum ada data proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($proses=mysql_fetch_array($prosesq)){
			$oop=$proses['oline']/$proses['open'];
				echo"
				        <tr valign=top>
				                <td align=center >$no</td>
				                <td align=center >$proses[code]</td>
				                <td >$proses[item]</td>
				                <td align=right >$proses[harga],-</td>
				                <td align=center >$proses[oline] ps/hr</td>
				                <td align=center >$proses[open] org</td>
				                <td align=center >$oop ps/hr</td>
				                <td align=center ><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerja_proses&style=$style&aksi=delete&id=$proses[id]','aksiproseskerja');>Delete</a></td>
				        </tr>
				";$no++;
			}
		}
		echo"</table>
			</div></div>";
	}
break;

case"proseslist":
	echo"
                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Proses Kerja</b> | List ( Rekap )</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerja','proses');>Formulir</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseslist','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=prosespencarian','proses');>Search</a>
		</div></div><div style='height:3px;background:black'></div>
		<div style='height:10px'></div><div id='detail'>
		<div id='tableinti1'>
	        <table width=100% cellspacing=1 cellpadding=3 border=0>
	        <tr bgcolor='#5B5B5B'>
	        	<th style='width:5px;padding:7 7 7 7;'>NO</th>
	                <th style='width:80px;padding:7 7 7 7;'>STYLE</th>
	                <th style='width:250px;padding:7 7 7 7;'>BRAND</th>
	                <th style='width:80px;padding:7 7 7 7;'>QUANTITY</th>
	                <th style='width:80px;padding:7 7 7 7;'>ITEM PROSES</th>
	                <th style='width:120px;padding:7 7 7 7;'>BIAYA KERJA<br>( Rp. )</th>
	                <th style='width:120px;padding:7 7 7 7;'>BIAYA STYLE<br>( Rp. )</th>
	                <th style='width:60px;padding:7 7 7 7;'>KELOLA</th>
	        </tr>
	";$no=1;
	$styleq=mysql_query("SELECT*FROM marketing_style WHERE status like '1' Order By id Desc");
		WHILE($style=mysql_fetch_array($styleq)){
		$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$style[id]' AND status like '1' Order by id Asc");
		$prosesn=mysql_num_rows($prosesq);$biaya=0;
			WHILE($proses=mysql_fetch_array($prosesq)){
				$biaya=$biaya+$proses['harga'];
			}$biayastyle=$biaya*$style['kuantitas'];
		$kk=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$style[idkk]' AND status like '1' ORDER by id Desc"));
			echo"
			        <tr valign=top>
			                <td align=center>$no</td>
			                <td>$style[stylecom]</td>
			                <td>$kk[merek]</td>
			                <td align=center>$style[kuantitas] ps</td>
			                <td align=right>$prosesn proses</td>
			                <td align=right>$biaya,- /ps</td>
			                <td align=right>$biayastyle,-</td>
			                <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=styledetail&id=$style[id]','detail');>Detil</a></td>
			        </tr>
			";$no++;
		}
	echo"
		</table>
		</div></div>
	";
break;

case"styledetail":
	$id=$_POST['id'];
	$stylename=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE status like '1' AND id like '$id'"));
	$kk=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$stylename[idkk]' AND status like '1' ORDER by id Desc"));
	         echo"
	                <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
             		<td id='menu_box' width=20% style='border-left:solid 1px rgb(147,151,145)'>
	     		<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=styledetail&id=$id','detail');><b>Style : $stylename[stylecom]</a>
	     		</td>
             			<td width=400px >
             			        <div id=link align=right>
					<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=prosespilihkaryawan&style=$id','edit');>Pilih Karyawan</a>&nbsp;&nbsp;
					<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=datapekerjakaryawan&idstylecom=$id','datapekerja');>Lihat Karyawan</a>&nbsp;&nbsp;
                                        <a href='creator/hrd_sewing_work_pritilan_print_pdf.php?v=cetakexcelpritilan&style=$stylename[id]' target=_blank>Cetak Kartu Produksi</a>
					</div>
				</td>
        		</tr>
        		</table>
        		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
        		<table border=0 width=100% cellspacing=5 cellpadding=0>
        		        <tr valign=top>
					<td width=100px>Brand</td>
					<td width=5px>:</td>
					<td>$kk[merek]</td>
					<td rowspan=3 align=right>
						
					</td>
				</tr>
				<tr>
					<td width=100px>Kain</td>
					<td width=5px>:</td>
					<td>$kk[kain]</td>
				</tr>
				<tr>
					<td width=100px>Quantity Style</td>
					<td width=5px>:</td>
					<td>$stylename[kuantitas] ps</td>
				</tr>
        		</table>
			<div id='datapekerja'></div><br><br>
        		Daftar harga proses kerja untuk style $stylename[stylecom]
	                <div id='tableinti1'>
	                <table width=100% cellspacing=1 cellpadding=3 border=0>
	                <tr bgcolor='#5B5B5B'>
	                        <th style='width:5px;padding:7 7 7 7;'>NO</th>
	                        <th style='width:80px;padding:7 7 7 7;'>CODE</th>
	                        <th style='width:250px;padding:7 7 7 7;'>ITEM</th>
	                        <th style='width:100px;padding:7 7 7 7;'>HARGA (Rp)</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OUPUT LINE</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OPERATOR</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OUTPUT OPERATOR</th>
	                        <th style='width:250px;padding:7 7 7 7;'>KET</th>
	                        <th style='width:60px;padding:7 7 7 7;'>KELOLA</th>
	                </tr>

		";$no=1;$harga=0;
		$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$id' AND status like '1' Order by id Asc");
		$prosesn=mysql_num_rows($prosesq);
		if($prosesn==0){
		        echo"<tr><td colspan=9>Belum ada data proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($proses=mysql_fetch_array($prosesq)){
			$harian=$proses['oline']/$proses['open'];
				echo"
				        <tr valign=top>
				                <td align=center >$no</td>
				                <td align=center >$proses[code]</td>
				                <td >$proses[item]</td>
				                <td align=right >$proses[harga],-</td>
				                <td align=center >$proses[oline] ps/hr</td>
				                <td align=center >$proses[open] org</td>
				                <td align=center >$harian ps/hr</td>
				                <td >$proses[ket]</td>
				                <td align=center ><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=prosesedititem&id=$proses[id]','edit');>Edit</a></td>
				        </tr>
				";$no++;$harga=$harga+$proses['harga'];
			}
		}$total=$stylename[kuantitas]*$harga;
		echo"
			<tr>
			        <td colspan=7 align=right>Biaya Produksi @ PS :</td>
			        <td colspan=2 align=right><b style='font-size:15px'>Rp. $harga,-</b></td>
			</tr>
			<tr>
			        <td colspan=7 align=right>TOTAL (Biaya Produksi x Quantity) :</td>
			        <td colspan=2 align=right><b style='font-size:15px'>Rp. $total,-</b></td>
			</tr>
			</table>
			</div></div><div id='edit'></div>
		";
break;

case"prosesedititem":
	$id=$_POST['id'];
	$proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$id'"));
	echo"
		<div style='position:fixed; left:0%; top:20%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:400px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow'>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Proses</b> | $proses[item]</div>
		<div style='padding:10 10 10 10;width:400px;border:solid 1px #6F0000;background:white' align=left>
		<form name=forme1>
			<table border=0 width=100% cellspacing=5 cellpadding=0>
			<tr>
			        <td width=100px>Code</td>
			        <td width=10px>:</td>
			        <td width=80%><input type=text name='code' value='$proses[code]' style='width:100px'></td>
			</tr>
			<tr>
			        <td width=100px>Proses/Item</td>
			        <td width=10px>:</td>
			        <td width=80%><input type=text name='item' value='$proses[item]' style='width:300px'></td>
			</tr>
			<tr>
			        <td width=100px>Harga</td>
			        <td width=10px>:</td>
			        <td width=80%>Rp. <input type=text name='harga' value='$proses[harga]' style='width:90px'> ,00</td>
			</tr>
			<tr>
			        <td width=100px>Output Line</td>
			        <td width=10px>:</td>
			        <td width=80%><input type=text name='oline' value='$proses[oline]' style='width:80px'> ps/hari</td>
			</tr>
			<tr>
			        <td width=100px>Penjahit</td>
			        <td width=10px>:</td>
			        <td width=80%><input type=text name='penjahit' value='$proses[open]' style='width:80px'> orang</td>
			</tr>
			<tr>
			        <td width=100px>Keterangan</td>
			        <td width=10px>:</td>
			        <td width=80%><textarea name='ket' style='width:300px'>$proses[ket]</textarea></td>
			</tr>
			</table></form>
			<div align=right>
			<input type=button value='Simpan' onclick=post('page/page_hrd_sewing_work','v=prosesimpanitem&id=$id&code='+document.forme1.code.value+'&item='+document.forme1.item.value+'&harga='+document.forme1.harga.value+'&oline='+document.forme1.oline.value+'&penjahit='+document.forme1.penjahit.value+'&ket='+document.forme1.ket.value,'edit')>&nbsp;&nbsp;
			<input type=button value='&nbsp;&nbsp;Close&nbsp;&nbsp;' onclick=post('page/page_hrd_sewing_work','v=vv','edit')>
			</div>
		</div><div style='height:250px;'>&nbsp;</div></div>
	";
break;

case"prosesimpanitem":
	$id=$_POST['id'];
	$code=$_POST['code'];
	$item=$_POST['item'];
	$harga=$_POST['harga'];
	$oline=$_POST['oline'];
	$penjahit=$_POST['penjahit'];
	$ket=$_POST['ket'];
	$save=mysql_query("UPDATE hrd_staff_proses_kerja SET code='$code',item='$item',harga='$harga',oline='$oline',open='$penjahit',ket='$ket' WHERE id like '$id'");
	if($save){
	echo"
		<div style='position:fixed; left:0%; top:20%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:400px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow'>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Proses</b> | $proses[item]</div>
		<div style='padding:10 10 10 10;width:400px;border:solid 1px #6F0000;background:white' align=left>
		Proses kerja telah berhasil di rubah. untuk melihat hasil perubahan silahkan pilih close dan refresh tampilan style.
			<div align=right>
			<input type=button value='&nbsp;&nbsp;Close&nbsp;&nbsp;' onclick=post('page/page_hrd_sewing_work','v=vv','edit')>
			</div>
		</div><div style='height:250px;'>&nbsp;</div></div>
	";
	}else{
	echo"
		<div style='position:fixed; left:0%; top:20%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:400px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow'>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit Proses</b> | $proses[item]</div>
		<div style='padding:10 10 10 10;width:400px;border:solid 1px #6F0000;background:white' align=left>
		Data proses kerja tidak dapat disimpan, silahkan coba kembali.
			<div align=right>
			<input type=button value='Kembali' onclick=post('page/page_hrd_sewing_work','v=prosesedititem&id=$id','edit')>&nbsp;&nbsp;
			<input type=button value='&nbsp;&nbsp;Close&nbsp;&nbsp;' onclick=post('page/page_hrd_sewing_work','v=vv','edit')>
			</div>
		</div><div style='height:250px;'>&nbsp;</div></div>
	";}
break;

case"prosespencarian":
	echo"
                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Proses Kerja</b> | Fast Searching</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerja','proses');>Formulir</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseslist','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=prosespencarian','proses');>Search</a>
		</div></div><div style='padding:5 5 5 5;background:black;color:white'>
		<form name='form1'>
			<b>Kata kunci <input type=text name=kunci style='width:200px;border:0px'>
				<select name='type' style='width:100px'>
				        <option value='1'>Style</option>
				        <option value='2'>Code Proses</option>
				        <option value='3'>Item Proses</option>
				</select>
			</b><input type=button value='Cari' onclick=post('page/page_hrd_sewing_work','v=prosespencarian1&kunci='+document.form1.kunci.value+'&type='+document.form1.type.value,'detail');>
		</form></div>
		<div style='height:10px'></div>
		<div id='detail'></div>
	";
break;

case"prosespencarian1":
	$kunci=$_POST['kunci'];
	$type=$_POST['type'];
	if($type==1){
		echo"
                <div id='tableinti1'>
	        <table width=100% cellspacing=1 cellpadding=3 border=0>
	        <tr bgcolor='#5B5B5B'>
	        	<th style='width:5px;padding:7 7 7 7;'>NO</th>
	                <th style='width:80px;padding:7 7 7 7;'>STYLE</th>
	                <th style='width:250px;padding:7 7 7 7;'>BRAND</th>
	                <th style='width:80px;padding:7 7 7 7;'>QUANTITY</th>
	                <th style='width:80px;padding:7 7 7 7;'>ITEM PROSES</th>
	                <th style='width:120px;padding:7 7 7 7;'>BIAYA KERJA<br>( Rp. )</th>
	                <th style='width:120px;padding:7 7 7 7;'>BIAYA STYLE<br>( Rp. )</th>
	                <th style='width:60px;padding:7 7 7 7;'>KELOLA</th>
		        </tr>
		";$no=1;
		$styleq=mysql_query("SELECT*FROM marketing_style WHERE stylecom like '%$kunci%' AND status like '1' Order By id Desc");
		WHILE($style=mysql_fetch_array($styleq)){
		$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$style[id]' AND status like '1' Order by id Asc");
		$prosesn=mysql_num_rows($prosesq);$biaya=0;
			WHILE($proses=mysql_fetch_array($prosesq)){
				$biaya=$biaya+$proses['harga'];
			}$biayastyle=$biaya*$style['kuantitas'];
			$kk=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$style[idkk]' AND status like '1' ORDER by id Desc"));
			echo"
			        <tr valign=top>
			                <td align=center>$no</td>
			                <td>$style[stylecom]</td>
			                <td>$kk[merek]</td>
			                <td align=center>$style[kuantitas] ps</td>
			                <td align=right>$prosesn proses</td>
			                <td align=right>$biaya,- /ps</td>
			                <td align=right>$biayastyle,-</td>
			                <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=styledetail&id=$style[id]','detail');>Detil</a></td>
			        </tr>
			";$no++;
		}
		echo"
		</table>
		</div>
		";
	}else{
	        SWITCH($type){
	        case"2":$ty="code"; break;
	        case"3":$ty="item"; break;
		}
		echo"
                        <div id='tableinti1'>
	                <table width=100% cellspacing=1 cellpadding=3 border=0>
	                <tr bgcolor='#5B5B5B'>
	                        <th style='width:5px;padding:7 7 7 7;'>NO</th>
                     		<th style='width:80px;padding:7 7 7 7;'>CODE</th>
	                        <th style='width:250px;padding:7 7 7 7;'>ITEM</th>
	                        <th style='width:100px;padding:7 7 7 7;'>HARGA (Rp)</th>
	                        <th style='width:100px;padding:7 7 7 7;'>STYLE</th>
                     		<th style='width:200px;padding:7 7 7 7;'>BRAND</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OUPUT LINE</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OPRT</th>
	                        <th style='width:100px;padding:7 7 7 7;'>OUTPUT OPRT</th>
	                        <th style='width:60px;padding:7 7 7 7;'>KELOLA</th>
	                </tr>

		";$no=1;$harga=0;
		$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE $ty like '%$kunci%' AND status like '1' Order by id Asc");
		$prosesn=mysql_num_rows($prosesq);
		if($prosesn==0){
		        echo"<tr><td colspan=8>Belum ada data proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($proses=mysql_fetch_array($prosesq)){
			$harian=$proses['oline']/$proses['open'];
			$style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$proses[idstylecom]' AND status like '1'"));
			$kk=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$style[idkk]' AND status like '1'"));
				echo"
				        <tr valign=top>
				                <td align=center >$no</td>
				                <td align=center >$proses[code]</td>
				                <td >$proses[item]</td>
				                <td align=right >$proses[harga],-</td>
				                <td align=center>$style[stylecom]</td>
				                <td>$kk[merek]</td>
				                <td align=center >$proses[oline] ps/hr</td>
				                <td align=center >$proses[open] org</td>
				                <td align=center >$harian ps/hr</td>
				                <td align=center ><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=prosesedititem&id=$proses[id]','edit');>Edit</a></td>
				        </tr>
				";$no++;$harga=$harga+$proses['harga'];
			}
		}$total=$stylename['kuantitas']*$harga;
		echo"
			</table>
			</div></div><div id='edit'></div>
		";
	}
break;

case"prosespilihkaryawan":
	$id=$_POST['style'];
	$stylename=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE status like '1' AND id like '$id'"));
	echo"
                <div style='position:fixed; left:0%; top:3%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:820px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_sewing_work','v=vv','edit')>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proses Produksi</b> | Pilih karyawan</div>
		<div style='padding:0 0 10 0;width:840px;height:455px;border:solid 1px #6F0000;background:white' align=left>
		<table width=100% cellspacing=0 cellpadding=0 border=0>
		<tr valign=top>
		        <td width=490px><div id=list style='padding:10 0 10 0;'></div></td>
		        <td width=340px>
				<div style='padding:10 10 10 10;background:#DFDFDF'><form name='f01'>
				<table border=0 width=100% cellspacing=5 cellpadding=0>
				<tr>
				        <td width=80px>Style</td>
				        <td>
						<b style='font-size:16px'>$stylename[stylecom]</b>
					</td>
				</tr><tr>
				        <td width=80px>Combo</td>
				        <td>
						<select name='combo' style='width:200px' onchange=post('page/page_hrd_sewing_work','v=sizeselect&combo='+document.f01.combo.value,'size');>
						<option value=''> ~ Pilih Combo ~ </option>
	";
					$comboq=mysql_query("SELECT*FROM marketing_combo WHERE status like '1' AND idstylecom like '$id' ORDER by id Asc");
					WHILE($combo=mysql_fetch_array($comboq)){
						echo"<option value='$combo[id]'>$combo[combo] / $combo[warna]</option>";
					}
	echo"
	      			          	</select>
					</td>
				</tr><tr>
				        <td>Size</td>
				        <td>
						<select name='size' id='size' style='width:70px'></select>
					</td>
				</tr><tr>
				        <td>Proses</td>
					<td><select name='proses' style='width:220px'>
	";
					$prosesq=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$id' ORDER by id Asc");
					WHILE($proses=mysql_fetch_array($prosesq)){
						echo"<option value='$proses[id]'>$proses[code] $proses[item]</option>";
					}
	echo"
	                		</select></td>
				</tr><tr>
				        <td>Bidang</td>
				        <td>
						<select name='karyawan' style='width:150px' onchange=post('page/page_hrd_sewing_work','v=jabatanselect&idsubbagian='+document.f01.karyawan.value,'jabatan');>
						<option value=''> ~ Pilih Bidang ~ </option>
	";
					$prosesq=mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE status like '2' AND idbagian like '27' ORDER by id Asc");
					WHILE($proses=mysql_fetch_array($prosesq)){
						echo"<option value='$proses[id]'>$proses[subbagian]</option>";
					}
	echo"
	      			          	</select>
					</td>
				</tr><tr>
                        		<td>Jabatan</td>
					<td>
						<select name='jabatan' id=jabatan style='width:175px'></select>
					</td>
				</tr></table>
				</form>
				<input type=button value='Pilih Karyawan' onclick=post('page/page_hrd_sewing_work','v=prosessewinglist&style=$id&idsubsubbagian='+document.f01.jabatan.value+'&proses='+document.f01.proses.value+'&combo='+document.f01.combo.value+'&size='+document.f01.size.value,'list');>
				<input type=button value='Close' onclick=post('page/page_hrd_sewing_work','v=vv','edit')>
			</div></td>
		</tr></table>
	
		</div><div style='height:250px;'>&nbsp;</div></div>
	";
break;
case"prosessewinglist":
	$idsubsubbagian=$_POST['idsubsubbagian'];
	$proses=$_POST['proses'];
	$style=$_POST['style'];
	$combo=$_POST['combo'];
	$size=$_POST['size'];
	echo"<iframe src='page/page_hrd_sewing_work1.php?idsubsubbagian=$idsubsubbagian&&proses=$proses&&style=$style&&combo=$combo&&size=$size' width=490px height=450px frameSpacing='0' frameBorder='0' scrolling='yes'></iframe>";
break;

case"jabatanselect":
	$idsubbagian=$_POST['idsubbagian'];
	echo"<option value=''>~ Pilih Karyawan ~</option>";
	$query=mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE idsubbagian like '$idsubbagian' AND status like '2' ORDER By id Asc");
	WHILE($data=mysql_fetch_array($query)){
		echo"<option value='$data[id]'>$data[subsubbagian]</option>";
	}
break;
case"sizeselect":
	$combo=$_POST['combo'];
	echo"<option value=''>~ Pilih Size ~</option>";
	$query=mysql_query("SELECT*FROM marketing_standart_size WHERE idcombo like '$combo' AND status like '1' ORDER By id Asc");
	WHILE($data=mysql_fetch_array($query)){
		echo"<option value='$data[id]'>$data[ukuran]</option>";
	}
break;

case"datapekerjakaryawan":
	$idstylecom=$_POST['idstylecom'];
	echo"
		<br><br>Daftar pekerja yang mengerjakan style ini :
		<div id='tableinti1'>
	        <table width=100% cellspacing=1 cellpadding=3 border=0>
	           <tr bgcolor='#5B5B5B'>
	                        <th style='width:5px;padding:7 7 7 7;'>NO</th>
	                        <th style='width:80px;padding:7 7 7 7;'>NIK</th>
	                        <th style='width:250px;padding:7 7 7 7;'>NAMA</th>
	                        <th style='width:150px;padding:7 7 7 7;'>JABATAN</th>
	                        <th style='width:80px;padding:7 7 7 7;'>COMBO</th>
	                        <th style='width:50px;padding:7 7 7 7;'>SIZE</th>
	                        <th style='width:200px;padding:7 7 7 7;'>PROSES</th>
	           </tr>
		";$no=1;
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_worker WHERE idstylecom like '$idstylecom' AND status like '1' Order by idstylecom,idcombo,idsize,idproses,id Asc");
		$datan=mysql_num_rows($dataq);
		if($datan==0){
		        echo"<tr><td colspan=8>Belum ada data karyawan dalam proses kerja untuk style ini</td></tr>";
		}else{
			WHILE($data=mysql_fetch_array($dataq)){
			        $staff=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$data[nik]'"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$staff[subsubbagian]'"));
			        $combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$data[idcombo]'"));
			        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$data[idsize]'"));
			        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[idproses]'"));
			        $staff[nama]=strtolower($staff['nama']);
				echo"
				        <tr valign=top>
				                <td align=center >$no</td>
				                <td align=center >$data[nik]</td>
				                <td><a href='javascript:void();' onclick=post('page/page_staff_detil_a','id=$staff[id]','detil');>$staff[nama]</a></a></td>
				                <td>$jabatan[subsubbagian]</td>
				                <td><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listcombo&combo=$combo[id]&style=$idstylecom','detil');>$combo[combo] / $combo[warna]</a></td>
				                <td align=center ><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listsize&size=$size[id]&combo=$combo[id]&style=$idstylecom','detil');>$size[ukuran]</a></td>
				                <td><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=listprosess&proses=$proses[id]&style=$idstylecom','detil');>$proses[item]</a></td>
				        </tr>
				";$no++;
			}
		}
		echo"
			<tr>
			        <td colspan=6 align=right>JUMLAH PEKERJA :</td>
			        <td colspan=2 align=right><b style='font-size:15px'>$datan orang</b></td>
			</tr>
			</table><div id=detil></div>";
break;

case"listcombo":
	$combos=$_POST['combo'];
	$style=$_POST['style'];
	$stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	$combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$combos'"));
	echo"
                <div style='position:fixed; left:0%; top:3%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:820px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_sewing_work','v=vv','detil')>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List Pekerja</b> | Combo $combo[combo] / $combo[warna]</div>
		<div style='padding:10 10 10 10;width:820px;height:500px;border:solid 1px #6F0000;background:white' align=left>
		Daftar karyawan yang bekerja menyelesaikan style <b>$stylee[stylecom]</b> combo <b>$combo[combo]</b> warna <b>$combo[warna]</b>.
		<iframe src='page/page_hrd_sewing_work2.php?style=$style&combos=$combos' width=820px height=450px frameSpacing='0' frameBorder='0' scrolling='yes'></iframe>
		<div style='height:10px'></div>
		<input type=button value='Cetak Excel' onclick=post('page/page_hrd_sewing_work','v=cetakexcelcombo&style=$style&combos=$combos','cetak');>
		<div id='cetak'></div>
		</div>
	";
break;

case"listsize":
        $size=$_POST['size'];
	$combos=$_POST['combo'];
	$style=$_POST['style'];
	$stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	$combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$combos'"));
	$sizes=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$size'"));
	echo"
                <div style='position:fixed; left:0%; top:3%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:820px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_sewing_work','v=vv','detil')>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List Pekerja</b> | Size $sizes[ukuran]</div>
		<div style='padding:10 10 10 10;width:820px;height:500px;border:solid 1px #6F0000;background:white' align=left>
		Daftar karyawan yang bekerja menyelesaikan style <b>$stylee[stylecom]</b> Combo <b>$combo[combo]</b> Warna <b>$combo[warna]</b>, Size <b>$sizes[ukuran]</b>.
		<iframe src='page/page_hrd_sewing_work2.php?v=listsize&style=$style&combos=$combos&size=$size' width=820px height=450px frameSpacing='0' frameBorder='0' scrolling='yes'></iframe>
		<div style='height:10px'></div>
		<input type=button value='Cetak Excel' onclick=post('page/page_hrd_sewing_work','v=cetakexcelsize&style=$style&combos=$combos&size=$size','cetak');>
		<div id='cetak'></div>
		</div>
	";
break;

case"listprosess":
	$proses=$_POST['proses'];
	$style=$_POST['style'];
	$stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	$prosess=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$proses'"));
	echo"
                <div style='position:fixed; left:0%; top:3%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:820px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_sewing_work','v=vv','detil')>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;List Pekerja</b> | Proses $prosess[item]</div>
		<div style='padding:10 10 10 10;width:820px;height:500px;border:solid 1px #6F0000;background:white' align=left>
		Daftar karyawan yang bekerja menyelesaikan style <b>$stylee[stylecom]</b>, Proses Kerja <b>$prosess[item]</b>.
		<iframe src='page/page_hrd_sewing_work2.php?v=listproses&style=$style&proses=$prosess[id]' width=820px height=450px frameSpacing='0' frameBorder='0' scrolling='yes'></iframe>
		<div style='height:10px'></div>
		<input type=button value='Cetak Excel' onclick=post('page/page_hrd_sewing_work','v=cetakexcelproses&style=$style&proses=$proses','cetak');>
		<div id='cetak'></div>
		</div>
	";
break;

case"cetakexcelcombo":
	$combos=$_POST['combos'];
	$style=$_POST['style'];
	echo"
		<iframe src='creator/hrd_sewing_work_print_excel.php?v=cetakexcelcombo&style=$style&combos=$combos' width=1px height=0px frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
	";
break;

case"cetakexcelsize":
	$combos=$_POST['combos'];
	$style=$_POST['style'];
	$size=$_POST['size'];
	echo"
		<iframe src='creator/hrd_sewing_work_print_excel.php?v=cetakexcelsize&style=$style&combos=$combos&size=$size' width=1px height=0px frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
	";
break;

case"cetakexcelproses":
	$style=$_POST['style'];
	$proses=$_POST['proses'];
	echo"
		<iframe src='creator/hrd_sewing_work_print_excel.php?v=cetakexcelproses&style=$style&proses=$proses' width=1px height=0px frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
	";
break;

case"proseskerjagroup":
	echo"
                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Group Proses</b> | Formulir</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerjagroup','proses');>Formulir</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=groupproseslist','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=groupprosespencarian','proses');>Search</a>
		</div></div><div style='height:3px;background:black'></div>
		<div style='height:10px'></div>
                <form name='form101'>
		<table width=100% cellspacing=3 cellpadding=0>
		<tr>
		        <td width=70px align=right>Style</td>
		        <td width=10px>:</td>
		        <td width=100px>
				<select name='style' style='width:150px' onchange=post('page/page_hrd_sewing_work','v=proseskerjalistrik&style='+document.form101.style.value+'&code='+document.form101.code.value,'proseskerjalistrik');>
				<option value='$style'>~ Pilih ~</option>
		";
		$query=mysql_query("SELECT*FROM marketing_style WHERE status like '1' ORDER By id Desc");
		WHILE($data=mysql_fetch_array($query)){
			echo"<option value='$data[id]'>$data[stylecom]</option>";
		}
		echo"
				</select>
			</td>
			<td width=70px align=right>Code Group</td>
		        <td width=10px>:</td>
		        <td width=200px>
		                <input type=text name='code' style='width:100px;font-size:15px'  onchange=post('page/page_hrd_sewing_work','v=proseskerjalistrik&style='+document.form101.style.value+'&code='+document.form101.code.value,'proseskerjalistrik');>
			</td>
		</tr></table>
		
		<div id=proseskerjalistrik></div>
		<div style='height:15px'></div>
		<div id='aksiprosesgroup'></div>
		</form>
	";

break;

case"proseskerjalistrik":
	$idstyle=$_POST['style'];
	$code=$_POST['code'];
	$prosess=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$idstyle' AND status like '1'");
	$prosesn=mysql_num_rows($prosess);
	echo"
		<form name='form102'>
		<table width=100% cellspacing=3 cellpadding=0>
	        <tr valign=top>
		        <td width=100px align=right>Proses Kerja</td>
		        <td>:</td>
		        <td>";
	$document="v=proseskerjagroupadd&style=$idstyle&code=$code'";
	$cleare="";
	if($prosesn==0){echo"Belum ada data proses kerja untuk style ini";}
	else{
		WHILE($proses=mysql_fetch_array($prosess)){
		echo"<input type=checkbox name='aa$proses[id]'> ($proses[code]) $proses[item]</input><br>";
		$document="$document+'&aa$proses[id]='+document.form102.aa$proses[id].checked";
		$cleare="$cleare;document.form102.aa$proses[id].checked=false";
	}}

	echo"		</td>
	                <td width=300px><br><br><fieldset><b>Caption :</b><br><br>Group proses digunakan untuk mempermudah perhitungan kerja bagi proses kerja yang dilakukan oleh seorang penjahit. </fieldset></td>
		</tr>
                <tr>
		        <td colspan=4 align=left><br>
		                <input type=reset value='Reset' style='width:100px;font-size:12px'>
				<input type=button value='Terapkan Group' style='width:100px;font-size:12px' onclick=post('page/page_hrd_sewing_work','$document,'aksiprosesgroup')$cleare;document.form101.code.value='';>
			</td>
		</tr></table></form>
	";
break;

case"proseskerjagroupadd":
	$idstyle=$_POST['style'];
	$code=$_POST['code'];
	$prosess=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$idstyle' AND status like '1'");
	$prosesn=mysql_num_rows($prosess);
	$stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$idstyle'"));
	if($prosesn==0){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Belum ada data proses kerja untuk style ini</div>";}
	elseif($code==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Anda belum memasukkan kode group</div>";}
	else{
	        $filter=mysql_num_rows(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE idstyle like '$idstyle' AND code like '$code' AND status like '1'"));
	        if($filter==0){
			$add=mysql_query("INSERT INTO hrd_staff_proses_kerja_group VALUE ('','$stylee[idkk]','$idstyle','$code','".$_SESSION["sessionid"]."','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','1')");
			if($add){
			        $data=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE code like '$code' AND idstyle like '$idstyle' AND status like '1'"));
                                WHILE($proses=mysql_fetch_array($prosess)){
					$checked=$_POST["aa$proses[id]"];
					if($checked=="true"){
					        mysql_query("INSERT INTO hrd_staff_proses_kerja_group_item VALUE ('','$stylee[idkk]','$idstyle','$data[id]','$proses[id]','".$_SESSION["sessionid"]."','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','1')");
					}
				}
				echo"<div style='padding:7 7 7 7;border:solid 1px #C1C1C1;background:#DDDDDD'>Group berhasil diciptakan</div>";
			}else{echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Gagal untuk menciptakan group baru.</div>";}
		}else{echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Data code group yang anda masukkan telah tersedia sebelumnya, silahkan gunakan data code group yang lain.</div>";}
	}
	$groupq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE idstyle like '$idstyle' AND status like 1 ORDER by id Desc");
	$groupn=mysql_num_rows($groupq);
	if($groupn!=0){
	   WHILE($group=mysql_fetch_array($groupq)){
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_group_item WHERE idstyle like '$idstyle' AND idcode like '$group[id]' AND status like '1' Order by id Desc");
		$datan=mysql_num_rows($dataq);
		if($datan!=0){
	        echo"
                        <div style='height:20px;'></div>
		        <div align=left>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Group : $group[code]</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div style='border:solid 1px rgb(147,151,145);padding:5 5 5 5;'>
		        Daftar proses kerja yang tergabung dalam group ini adalah :
	                <div id='tableinti1'>
			<table border=0 width=100% cellspacing=1 cellpadding=3>
			<tr bgcolor='#5B5B5B'>
			        <th width=10px>NO</th>
			        <th width=200px>STYLE</th>
			        <th width=100px>CODE GROUP</th>
			        <th width=100px>CODE PROSES</th>
			        <th width=300px>PROSES GROUP</th>
			        <th>KELOLA</th>
			</tr>
		";$no=1;
		WHILE($data=mysql_fetch_array($dataq)){
		        $style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$data[idstyle]'"));
		        $code=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE id like '$data[idcode]'"));
		        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[iditem]'"));
			echo"
				<tr>
				        <td align=center>$no</td>
				        <td align=center>$style[stylecom]</td>
				        <td align=center>$code[code]</td>
				        <td align=center>$proses[code]</td>
				        <td>$proses[item]</td>
				        <td align=center><a href='javascript:void();'>Delete</a></td>
				</tr>
			";$no++;
		}echo"</table></div></div>";
	}}}
break;

case"groupproseslist":
	SWITCH($_POST['vv']){
	case"prosesdelete":
	        $iddata=$_POST['iddata'];
	        $update=mysql_query("UPDATE hrd_staff_proses_kerja_group_item SET status=0 WHERE id like '$iddata'");
	        if($update){echo"<div style='padding:7 7 7 7;border:solid 1px #C1C1C1;background:#DDDDDD'>Data proses kerja telah dihapus dari group.</div><br>&nbsp;";}
	        else{echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Data gagal dihapus.</div><br>&nbsp;";}
	break;
	
	case"groupdelete":
	        $iddata=$_POST['iddata'];
	        $update=mysql_query("UPDATE hrd_staff_proses_kerja_group SET status=0 WHERE id like '$iddata'");
	        if($update){
	                $update1=mysql_query("UPDATE hrd_staff_proses_kerja_group_item SET status=0 WHERE idcode like '$iddata'");
	                if($update){echo"<div style='padding:7 7 7 7;border:solid 1px #C1C1C1;background:#DDDDDD'>Group telah dihapus dari group.</div><br>&nbsp;";}
	        	else{
	        	        mysql_query("UPDATE hrd_staff_proses_kerja_group SET status=1 WHERE id like '$iddata'");
				echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Data gagal dihapus.</div><br>&nbsp;";}
		}else{echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Group gagal dihapus.</div><br>&nbsp;";}
	break;
	}
     echo"
                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Group Proses</b> | List Group</div><div style='height:0px'></div>
		<div style='background:#5B5B5B'>
                <div id='menu_box1'>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=proseskerjagroup','proses');>Formulir</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=groupproseslist','proses');>List</a>
			<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=groupprosespencarian','proses');>Search</a>
		</div></div><div style='height:3px;background:black'></div>
		<div style='height:10px'></div>
	";
        $groupq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE status like 1 ORDER by id Desc");
	$groupn=mysql_num_rows($groupq);
	if($groupn!=0){
	   WHILE($group=mysql_fetch_array($groupq)){
		$dataq=mysql_query("SELECT*FROM hrd_staff_proses_kerja_group_item WHERE idcode like '$group[id]' AND status like '1' Order by id Desc");
		$datan=mysql_num_rows($dataq);
		if($datan!=0){
	        echo"
                        <div style='height:20px;'></div>
		        <div align=left>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Group : $group[code]</a>
			     </td>
		             <td width=500px align=right>
		                <div id=link>
				     	<a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=groupproseslist&vv=groupdelete&iddata=$group[id]','proses');>Hapus Group</a>&nbsp;&nbsp;
					<a href='#' onclick=post('page/page_hrd_sewing_work','v=addprosesgroup&iddata=$group[id]','more');>Tambah Proses</a>&nbsp;&nbsp;
			     	</div>
				</td>
		        </tr>
		        </table>
		        <div style='border:solid 1px rgb(147,151,145);padding:5 5 5 5;'>
		        Daftar proses kerja yang tergabung dalam group ini adalah :
	                <div id='tableinti1'>
			<table border=0 width=100% cellspacing=1 cellpadding=3>
			<tr bgcolor='#5B5B5B'>
			        <th width=10px>NO</th>
			        <th width=100px>STYLE</th>
			        <th width=100px>CODE GROUP</th>
			        <th width=100px>CODE PROSES</th>
			        <th width=400px>PROSES GROUP</th>
			        <th>KELOLA</th>
			</tr>
		";$no=1;
		WHILE($data=mysql_fetch_array($dataq)){
		        $style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$data[idstyle]'"));
		        $code=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE id like '$data[idcode]'"));
		        $proses=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE id like '$data[iditem]'"));
			echo"
				<tr>
				        <td align=center>$no</td>
				        <td align=center>$style[stylecom]</td>
				        <td align=center>$code[code]</td>
				        <td align=center>$proses[code]</td>
				        <td>$proses[item]</td>
				        <td align=center><a href='javascript:void();' onclick=post('page/page_hrd_sewing_work','v=groupproseslist&vv=prosesdelete&iddata=$data[id]','proses');>Delete</a></td>
				</tr>
			";$no++;
		}echo"</table></div></div><div id='more'></div>";
	}}}
break;

case"addprosesgroup":
	$iddata=$_POST['iddata'];
        $code=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE id like '$iddata'"));
       	$prosess=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$code[idstyle]' AND status like '1'");
	$prosesn=mysql_num_rows($prosess);
	echo"
	        <div style='position:absolute; left:0%; top:7%; width:100%' align=center >
		<div style='padding:5 10 5 10;width:400px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>
			<a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_sewing_work','v=vv','more')>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Group Proses</b> | Group $code[code]</div>
		<div style='padding:10 10 10 10;width:400px;border:solid 1px #6F0000;background:white' align=left>
		<div id='prosesadd'>Pilih proses yang akan ditambahkan ke dalam group ini.
		<form name='form102'>
		";
	$document="v=addprosesgroup1&style=$code[idstyle]&idcode=$code[id]'";
	if($prosesn==0){echo"Belum ada data proses kerja untuk style ini";}
	else{
		WHILE($proses=mysql_fetch_array($prosess)){
			$check=mysql_num_rows(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group_item WHERE idcode like '$code[id]' AND idstyle like '$code[idstyle]' AND iditem like '$proses[id]'"));
			if($check==0){$checked="";}else{$checked="checked onclick=document.form102.aa$proses[id].checked=true";}
			echo"<input type=checkbox name='aa$proses[id]' $checked > ($proses[code]) $proses[item]</input><br>";
			$document="$document+'&aa$proses[id]='+document.form102.aa$proses[id].checked";
			
	}}

	echo"
	        <br><br>
		<input type=reset value='Reset' style='width:100px;font-size:12px'>
		<input type=button value='Tambahkan' style='width:100px;font-size:12px' onclick=post('page/page_hrd_sewing_work','$document,'prosesadd')>
		</form></div></div>
	";
break;

case"addprosesgroup1":
       	$style=$_POST['style'];
	$code=$_POST['idcode'];
	$prosess=mysql_query("SELECT*FROM hrd_staff_proses_kerja WHERE idstylecom like '$style' AND status like '1'");
	$prosesn=mysql_num_rows($prosess);
	$stylee=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$style'"));
	if($prosesn==0){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Belum ada data proses kerja untuk style ini</div>";}
	elseif($code==""){echo"<div style='padding:7 7 7 7;border:solid 1px red;background:pink'>Anda belum memasukkan kode group</div>";}
	else{
		$data=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group WHERE id like '$code' AND idstyle like '$style' AND status like '1'"));
                WHILE($proses=mysql_fetch_array($prosess)){
			$checked=$_POST["aa$proses[id]"];
			if($checked=="true"){
                        	$check=mysql_num_rows(mysql_query("SELECT*FROM hrd_staff_proses_kerja_group_item WHERE idcode like '$data[id]' AND idstyle like '$data[idstyle]' AND iditem like '$proses[id]'"));
				if($check==0){
				        mysql_query("INSERT INTO hrd_staff_proses_kerja_group_item VALUE ('','$stylee[idkk]','$data[idstyle]','$data[id]','$proses[id]','".$_SESSION["sessionid"]."','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','','1')");
				}
			}
		}
		echo"<div style='padding:7 7 7 7;'>Data telah ditambahkan.</div>";
	}
	echo"<br><br><input type=reset value='Close' style='width:100px;font-size:12px' onclick=post('page/page_hrd_sewing_work','v=groupproseslist','proses')>";
break;
}
?>
