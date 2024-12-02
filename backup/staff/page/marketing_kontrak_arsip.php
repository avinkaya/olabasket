<?php
include("dbase_conection.php");
switch($_POST['v']){
case "0":break;
case"":
	echo"
	        <div style='height:20px;'></div>
		<b>Arsip Kontrak Kerja</b><div id='tableinti'>
		<table width=100% cellspacing=1 cellpadding=7>
		<tr valign=top style='background:#C10000'>
		        <th width=10px style='font-size:12px;color:white;'>NO</th>
		        <th width=200px style='font-size:12px;color:white;'>KONTRAK</th>
		        <th width=250px style='font-size:12px;color:white;'>CMT</th>
		        <th width=250px style='font-size:12px;color:white;'>ITEM</th>
		        <th width=250px style='font-size:12px;color:white;'>FABRIC</th>
		        <th width=250px style='font-size:12px;color:white;'>DATE ENTRY</th>
		        <th width=100px style='font-size:12px;color:white;'>KELOLA</th>
		</tr>
	";$no=1;
	$querydata=mysql_query("SELECT*FROM marketing_kontrak_kerja ORDER By id Desc");
	$numdata=mysql_num_rows($querydata);
	if($numdata==0){
		echo"<tr><td rowspan=8>Belum ada data ..</td></tr>";
	}else{
		WHILE($data=mysql_fetch_array($querydata)){
		echo"
			<tr valign=top>
			        <td>$no</td>
                                <td>$data[nomor]</td>
                                <td>$data[cmt]</td>
                                <td>$data[barang]</td>
                                <td>$data[kain]</td>
                                <td>$data[iduser]<br>$data[harientry], $data[tanggalentry]-$data[bulanentry]-$data[tahunentry]</td>
                                <td align=center><a href='javascript:void()' onclick=post('page/marketing_kontrak_arsip','v=a&iddata=$data[id]','detil');>Detil</a></td>
			</tr>
		";$no++;
	}}
	echo"
		</table></div><div id='detil'></div>
	";
break;

case "a":
	$iddata=$_POST['iddata'];
	$data=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$iddata'"));
	echo"
	        <div style='position:fixed; left:0%; top:8%; width:100%' align=center>
	        <div style='padding:5 10 5 10;width:800px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Document Production</b></div>
		<div style='padding:10 10 10 10;width:800px;border:solid 1px #6F0000;background:white' align=left>
		<div id='tableinti1'>
		<table border=0 width=100% cellspacing=0 cellpadding=3>
		<tr valign=bottom>
		        <td width=120px align=right>CMT</td>
		        <td width=2px>:</td>
		        <td width=200px>$data[cmt]</td>
		        <td width=120px align=right>Finish</td>
		        <td width=2px>:</td>
		        <td width=200px>$data[tanggalselesai]-$data[bulanselesai]-$data[tahunselesai]</td>
		        <td colspan=3 align=center style='font-size:15px;background:#C10000;color:white;padding:7 7 7 7;'>Nomor $data[nomor]</td>
		</tr>
		<tr valign=top>
		        <td align=right>Item</td>
		        <td>:</td>
		        <td>$data[barang]</td>
		        <td align=right>Date</td>
		        <td>:</td>
		        <td>$data[tanggal]-$data[bulan]-$data[tahun]</td>
		        <td  width=120px align=right>Material Delivery</td>
		        <td width=2px>:</td>
		        <td width=100px>$data[tanggalbahan]-$data[bulanbahan]-$data[tahunbahan]</td>
		</tr>
		<tr valign=top>
		        <td align=right>Fabric</td>
		        <td>:</td>
		        <td>$data[kain]</td>
		        <td align=right>PO.No</td>
		        <td>:</td>
		        <td>$data[pono]</td>
		        <td align=right>Delivery</td>
		        <td>:</td>
		        <td>$data[tanggalpengiriman]-$data[bulanpengiriman]-$data[tahunpengiriman]</td>
		</tr>
		<tr valign=top>
		        <td align=right>Gramasi</td>
		        <td>:</td>
		        <td>$data[gramasi]</td>
		        <td align=right>S.A.S</td>
		        <td>:</td>
		        <td>$data[sas]</td>
		        <td align=right>User</td>
		        <td>:</td>
		        <td>$data[iduser]</td>
		</tr>
		<tr valign=top>
		        <td align=right>Repeat</td>
		        <td>:</td>
		        <td>$data[repeat]</td>
		        <td align=right>T.No</td>
		        <td>:</td>
		        <td>$data[tono]</td>
		        <td align=right>Entry</td>
		        <td>:</td>
		        <td>$data[tanggalentry]-$data[bulanentry]-$data[tahunentry]</td>
		</tr>
		<tr valign=top>
		        <td align=right>Quantity</td>
		        <td>:</td>
		        <td>$data[kuantitas]</td>
		        <td align=right>Brand</td>
		        <td>:</td>
		        <td>$data[merek]</td>
		        <td align=right></td>
		        <td></td>
		        <td></td>
		</tr>
		</table></div>
		
	        <br><br><input type='button' value='Close' style='padding:5 20 5 20;' onclick=post('page/marketing_kontrak_arsip','v=0','detil')>&nbsp;&nbsp;
	        </div>
	        </div>
	";
break;
}
?>
