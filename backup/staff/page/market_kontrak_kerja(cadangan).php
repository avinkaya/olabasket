<?php
session_start();
include("dbase_conection.php");
include("page_function_time.php");
switch($_POST["miniproses"]){
	case"":break;
	case "miniproses":
	        $nomor=$_POST["nomor"];
		$sewing=$_POST["sewing"];
		$accesories=$_POST["accesories"];
		$packing=$_POST["packing"];
		$querysave=mysql_query("UPDATE marketing_kontrak_kerja SET sewing='$sewing',accsesories='$accesories',packing='$packing' WHERE nomor like '$nomor'");
		if($querysave){$pesan="&nbsp;<div style='padding:7 7 7 7 ;border:solid 1px #298D31;background:#D9F4DB;'>Contract work has been complete, please download the contract file for further management.<br><br><i>Kontrak kerja telah lengkap, silahkan download file kontrak kerja untuk pengelolaan lebih lanjut.</i></div><br><br>&nbsp;";}
		else{$pesan="&nbsp;<div style='padding:7 7 7 7 ;border:solid 1px #993300;background:#FFE2D5;'>Employment contract is incomplete, please try again.<br><br><i>Kontrak kerja tidak lengkap, silahkan coba kembali.</i></div><br><br>&nbsp;";}
	break;
}


switch($_POST["v"]){
case "":
	echo"
	<div style='height:20px;'></div>
        <div align=left>
        <table border=0 width=100% cellspacing=0 cellpadding=0>
        <tr>
             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     	<a href='javascript:void();' onclick=post('page/market_kontrak_kerja','','intipage');><b>Formulir</a><a href='javascript:void();' onclick=post('page/market_kontrak_kerja','','proses')><b>Daftar Kontrak</a><a href='javascript:void();' onclick=post('page/market_kontrak_kerja','','proses')><b>Pencarian</a>
	     </td>
             <td width=400px>&nbsp;</td>
        </tr>
        </table>
        <div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;' id='proses'>
	<div style='font-size:16px;background:#EAEAEA;color:black;font-family:arial;padding:7 7 7 7;border:solid 1px rgb(147,151,145)'>
		<b>Kontrak Kerja Produksi</b>
	</div>
	<div style='font-size:12px;background:#F8F8F8;color:black;font-family:arial;padding:7 7 7 7' id='kontrakkerja'>$pesan
		<b>Identificaton Contrack</b>
		<hr></hr>
		<form name='form1'>
		<table cellspacing=2 cellpadding=5 width=100%>
		<tr>
		        <td width=80px align=right>Contract Number</td>
		        <td width=5px>:</td>
		        <td width=250px><input type=text name='nomor' style='width:100px'></td>
		        <td width=110px align=right>Date / Tanggal</td>
		        <td width=5px>:</td>
		        <td width=250px>
				<select name='tanggal' style='width:50'>";
				$lang="tgl";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='bulan' style='width:90'>";
				$lang="bln";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='tahun' style='width:60'>";
				$lang="thn";include("fungsi_nomor.php");
	echo"			</select>
			</td>
		</tr>
		<tr>
		        <td align=right>C.M.T</td>
		        <td>:</td>
		        <td><input type=text name='cmt' style='width:200px' value='PT. Mulia Impex'></td>
		        <td align=right>PO.No</td>
		        <td>:</td>
		        <td><input type=text name='pono' style='width:150px'></td>
		</tr>
		<tr>
		        <td align=right>Item / Barang</td>
		        <td>:</td>
		        <td><input type=text name='barang' style='width:190px'></td>
		        <td align=right>S.A.S</td>
		        <td>:</td>
		        <td><input type=text name='sas' style='width:150px'></td>
		</tr>
		<tr>
		        <td align=right>Fabric / Kain</td>
		        <td>:</td>
		        <td><input type=text name='kain' style='width:190px'></td>
		        <td align=right>T.No</td>
		        <td>:</td>
		        <td><input type=text name='tno' style='width:150px'></td>
		</tr>
		<tr>
		        <td align=right>Gramasi</td>
		        <td>:</td>
		        <td><input type=text name='gramasi' style='width:130px' onKeyUp='javascript:checkNumber(form1.gramasi);' maxlength=4></td>
		        <td align=right>Brand</td>
		        <td>:</td>
		        <td><input type=text name='merek' style='width:200px'></td>
		</tr>
		<tr>
		        <td align=right>Finish/Selesai</td>
		        <td>:</td>
		        <td>
				<select name='tanggalselesai' style='width:50'><option value=''></option>";
				$lang="tgl";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='bulanselesai' style='width:90'><option value=''></option>";
				$lang="bln";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='tahunselesai' style='width:65'><option value=''></option>";
				$lang="thn";include("fungsi_nomor.php");
	echo"			</select>

			</td>
		        <td align=right>Material Delivery</td>
		        <td>:</td>
		        <td>
				<select name='tanggalbahan' style='width:50'><option value=''></option>";
				$lang="tgl";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='bulanbahan' style='width:90'><option value=''></option>";
				$lang="bln";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='tahunbahan' style='width:65'><option value=''></option>";
				$lang="thn";include("fungsi_nomor.php");
	echo"			</select>
			</td>
		</tr>
		<tr>
		        <td align=right>Repeat</td>
		        <td>:</td>
		        <td><input type=text name='repeat' style='width:100px'></td>
		        <td align=right>Delivery</td>
		        <td>:</td>
		        <td>
				<select name='tanggalpengiriman' style='width:50'><option value=''></option>";
				$lang="tgl";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='bulanpengiriman' style='width:90'><option value=''></option>";
				$lang="bln";include("fungsi_nomor.php");
	echo"			</select>&nbsp;
				<select name='tahunpengiriman' style='width:65'><option value=''></option>";
				$lang="thn";include("fungsi_nomor.php");
	echo"			</select>
			</td>
		</tr>
		<tr>
		        <td align=right>Quantity</td>
		        <td>:</td>
		        <td><input type=text name='kuantitas' style='width:100px' onKeyUp='javascript:checkNumber(form1.kuantitas);'></td>
		        <td align=right></td>
		        <td></td>
		        <td></td>
		</tr>
		<tr>
		        <td colspan=6>
				<a href='#' onclick=post('page/market_kontrak_kerja','v=size&nomor='+document.form1.nomor.value+'&cmt='+document.form1.cmt.value+'&tanggal='+document.form1.tanggal.value+'&bulan='+document.form1.bulan.value+'&tahun='+document.form1.tahun.value+'&tanggalbahan='+document.form1.tanggalbahan.value+'&bulanbahan='+document.form1.bulanbahan.value+'&tahunbahan='+document.form1.tahunbahan.value+'&tanggalselesai='+document.form1.tanggalselesai.value+'&bulanselesai='+document.form1.bulanselesai.value+'&tahunselesai='+document.form1.tahunselesai.value+'&tanggalpengiriman='+document.form1.tanggalpengiriman.value+'&bulanpengiriman='+document.form1.bulanpengiriman.value+'&tahunpengiriman='+document.form1.tahunpengiriman.value+'&pono='+document.form1.pono.value+'&tno='+document.form1.tno.value+'&barang='+document.form1.barang.value+'&kain='+document.form1.kain.value+'&merek='+document.form1.merek.value+'&gramasi='+document.form1.gramasi.value+'&sas='+document.form1.sas.value+'&kuantitas='+document.form1.kuantitas.value+'&repeat='+document.form1.repeat.value,'kontrakkerja')><img src='images/save.jpg' height=40px border=0 title='Save Document'></a>
                                <a href='#' onclick=document.form1.nomor.value='';document.form1.cmt.value='';document.form1.tanggal.value='';document.form1.bulan.value='';document.form1.tahun.value='';document.form1.tanggalbahan.value='';document.form1.bulanbahan.value='';document.form1.tahunbahan.value='';document.form1.tanggalselesai.value='';document.form1.bulanselesai.value='';document.form1.tahunselesai.value='';document.form1.tanggalpengiriman.value='';document.form1.bulanpengiriman.value='';document.form1.tahunpengiriman.value='';document.form1.pono.value='';document.form1.tno.value='';document.form1.barang.value='';document.form1.kain.value='';document.form1.merek.value='';document.form1.gramasi.value='';document.form1.sas.value='';document.form1.kuantitas.value='';document.form1.repeat.value='';><img src='images/delete.jpg' height=40px border=0 title='Clear Formulir'></a>
			</td>
		</tr>
		</table></form>
	</div>
	</div>
	";
break;

case "size":
	session_start();
	$nomor=$_POST['nomor'];
	$cmt=$_POST['cmt'];
	$tanggaln=$_POST['tanggal'];
	$bulann=$_POST['bulan'];
	$tahunn=$_POST['tahun'];
	$tanggalbahan=$_POST['tanggalbahan'];
	$bulanbahan=$_POST['bulanbahan'];
	$tahunbahan=$_POST['tahunbahan'];
	$tanggalselesai=$_POST['tanggalselesai'];
	$bulanselesai=$_POST['bulanselesai'];
	$tahunselesai=$_POST['tahunselesai'];
	$tanggalpengiriman=$_POST['tanggalpengiriman'];
	$bulanpengiriman=$_POST['bulanpengiriman'];
	$tahunpengiriman=$_POST['tahunpengiriman'];
	$pono=$_POST['pono'];
	$tno=$_POST['tno'];
	$barang=$_POST['barang'];
	$kain=$_POST['kain'];
	$merek=$_POST['merek'];
	$gramasi=$_POST['gramasi'];
	$sas=$_POST['sas'];
	$kuantitas=$_POST['kuantitas'];
	$repeat=$_POST['repeat'];
        $banyakpilih=mysql_num_rows(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE nomor like '$nomor'"));
        if($nomor==""){echo"<div style='padding:7 7 7 7 ;border:solid 1px #993300;background:#FFE2D5;'>You did not enter a contract number, please fill first<br><br><i>Anda belum mengisi nomor kontrak kerja, silahkan diisi dahulu.</i><br><br><input type='button' value='Back' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')></div>";}
        else{
        	if($banyakpilih==0){
		$querysave=mysql_query("INSERT INTO marketing_kontrak_kerja VALUE ('','$nomor','$cmt','$barang','$kain','$gramasi','$kuantitas','$pono','$merek','$tno','$tanggall','$bulann','$tahunn','','','$sas','','','','$iduser','$hari','$tanggal','$bulan','$tahun','','','','','','','','$tanggalpengiriman','$bulanpengiriman','$tahunpengiriman','$tanggalselesai','$bulanselesai','$tahunselesai','$tanggalbahan','$bulanbahan','$tahunbahan','$repeat')");
		if($querysave){
		        $status="<a href=javascript:void(); style=font-size:12px;color:#6F0000;font-family:arial><b>$staffdata[nama]</b></a><div style=border-left:1px black;padding-left:7;><b>CMT. $cmt</b><br>Membuat kontrak kerja untuk Item <b>$barang</b> dengan spesifikasi data <b>$nomor</b>, PO. No <b>$pono</b>, T.No <b>$tno</b>, Quantity <b>$kuantitas</b>, Delivery <b>$tanggalpengiriman/$bulanpengiriman/$tahunpengiriman</b>.</div>";
			$queryinsert=mysql_query("INSERT INTO web_status VALUE ('','$iduser','$staffdata[photo]','$status','','$hari','$tanggal','$bulan','$tahun','1')");
	        	$querypilih=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE nomor like '$nomor'"));
			echo"
                        	<b>Size & Ratio</b>
				<hr></hr><form name='form1'>
                		<table cellspacing=2 cellpadding=5 width=100%>
				<tr>
		        		<td width=50px align=right>Size</td>
		        		<td width=100px><input type=text name='ukuran' style='width:100px'></td>
		        		<td width=200px>
						<select name=code style='width:100px'>
						        <option value='Code'>Code</option>
						        <option value='/'>/</option>
						</select>
					</td>
		        		<td width=50px align=right>Ratio</td>
		        		<td width=200px><input type=text name='ratio' style='width:100px'></td>
		        		<td width=50px align=right>Ket</td>
		        		<td width=200px><input type=text name='ket' style='width:200px'></td>
		        		<td width=100px><input type=button value='OK' style='width:50px' onclick=post('page/market_kontrak_kerja','v=sizea&id=$querypilih[id]&ukuran='+document.form1.ukuran.value+'&ratio='+document.form1.ratio.value+'&code='+document.form1.code.value+'&ket='+document.form1.ket.value,'addsize');document.form1.ratio.value='';document.form1.ukuran.value='';document.form1.ket.value='';document.form1.code.value='';></td>
				</tr>
				</table></form>
				<div id='addsize'></div><br><br><br>
			<b>Detail Quantity</b>
			<hr></hr><form name='form2'>
                		<table cellspacing=2 cellpadding=5 width=100%>
				<tr>
		        		<td width=50px align=right>Style</td>
		        		<td width=100px><input type=text name='style' style='width:100px'></td>
		        		<td width=50px align=right>Design</td>
		        		<td width=100px><input type=text name='design' style='width:100px'></td>
		        		<td width=50px align=right>Combo</td>
		        		<td width=100px><input type=text name='combo' style='width:100px'></td>
		        		<td width=100px></td>
				</tr>
				<tr>
				        <td width=50px align=right>Color</td>
				        <td width=100px><input type=text name='color' style='width:100px'></td>
		        		<td width=50px align=right>Size</td>
		        		<td width=100px><input type=text name='size' style='width:100px'></td>
		        		<td width=50px align=right>Quantity</td>
		        		<td width=100px><input type=text name='quantity' style='width:100px'></td>
		        		<td width=100px><input type=button value='OK' style='width:50px' onclick=post('page/market_kontrak_kerja','v=sizec&id=$querypilih[id]&style='+document.form2.style.value+'&color='+document.form2.color.value+'&combo='+document.form2.combo.value+'&design='+document.form2.design.value+'&quantity='+document.form2.quantity.value+'&size='+document.form2.size.value,'addquantity');document.form2.style.value='';document.form2.design.value='';document.form2.color.value='';document.form2.combo.value='';document.form2.quantity.value='';document.form2.size.value='';></td>
				</tr>
				</table></form>
				<div id='addquantity'></div>
				<br><br><br>
				<b>Detail Sewing</b>
				<form name='form3'>
				<table border=0 width=100%>
				<tr>
				        <td><textarea name='sewing' style='width:600px;height:170px'></textarea></td>
				</tr>
				</table>
				<br><br><br>
				<b>Detail Accecories</b>
				<table border=0 width=100%>
				<tr>
				        <td><textarea name='accesories' style='width:600px;height:170px'></textarea></td>
				</tr>
				</table>
				<br><br><br>
				<b>Detail Packing</b>
				<table border=0 width=100%>
				<tr>
				        <td><textarea name='packing' style='width:600px;height:170px'></textarea></td>
				</tr>
				<tr>
				        <td><input type=button value='Simpan Document' style='width:150px' onclick=post('page/market_kontrak_kerja','miniproses=miniproses&nomor=$nomor&sewing='+document.form3.sewing.value+'&accesories='+document.form3.accesories.value+'&packing='+document.form3.packing.value,'intipage');></td>
				</tr>
				</table>
				</form>
			";
		}else{
		echo"
			<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
			<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 86-C21D</b></div>
			<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
				<br>Sorry data storage contract can not be done, please try again!<br><br>
				<i>Maaf penyimpanan data kontrak kerja tidak dapat dilakukan, silahkan coba kembali!</i><br><div align=center>
				<input type='button' value='Back' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')>
			</div></div>
			</div>
		";
	}}else{
                echo"
			<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
			<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 86-C21D</b></div>
			<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
				<br>The data that you enter the employment contract has been available previously, please re-edit or create new data with a different contract number.<br><br>
				<i>Data kontrak kerja yang anda masukkan sudah tersedia sebelumnya, silahkan edit kembali atau buat data yang baru dengan nomor kontrak yang berbeda.</i><br><div align=center>
				<input type='button' value='Back' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')>
			</div></div>
			</div>
		";
	}}
break;

case "sizea":
	$id=$_POST['id'];
	$ukuran=$_POST['ukuran'];
	$ratio=$_POST['ratio'];
	$code=$_POST['code'];
	$ket=$_POST['ket'];
	if($code=="Code"){$sizecode=$ukuran;}else{$sizeper=$ukuran;}
	$querysave=mysql_query("INSERT INTO marketing_standart_size VALUE ('','$id','','$sizecode','$sizeper','$ratio','$ket')");
	$numsave=mysql_num_rows(mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$id'"));
	if($numsave!=0){
		echo"<div id='tableinti'>
			<table width=100% cellspacing=1 cellpadding=5>
		        <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>CODE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>SIZE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>RATIO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:200px;'>KET</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>KELOLA</th>
		        </tr>
		";
	}
	if($querysave){$no=1;
                $querydata=mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$id' ORDER by id Desc");
                while($data=mysql_fetch_array($querydata)){
                echo"
		        <tr>
		            <td align=center>$no</td>
		            <td align=center>$data[code]</td>
		            <td align=center>$data[ukuran]</td>
		            <td align=center>$data[ratio]</td>
		            <td>$data[ket]</td>
		            <td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=sizeb&id=$id&iddel=$data[id]','addsize');>Delete</a></td>
		        </tr>
		";$no++;
		}
		echo"</table></div>";
	}else{
             	echo"
		<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
		<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 86-C21D</b></div>
		<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
			<br>Data size that you enter can not be inserted. please try again.<br><br>
			<i>Data ukuran yang anda masukkan tidak dapat dimasukkan. silahkan coba kembali.</i><br><div align=center>
			<input type='button' value='OK' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')>
		</div></div>
		</div>
	     	";
	}
break;

case "sizeb":
	$id=$_POST['id'];
	$iddel=$_POST['iddel'];
	$querysave=mysql_query("DELETE FROM marketing_standart_size WHERE id like '$iddel'");
	$numsave=mysql_num_rows(mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$id'"));
	if($numsave!=0){
		echo"<div id='tableinti'>
			<table width=100% cellspacing=1 cellpadding=5>
		        <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>CODE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>SIZE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>RATIO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:200px;'>KET</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:60px;'>KELOLA</th>
		        </tr>
		";
	}
	if($querysave){$no=1;
                $querydata=mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$id' ORDER by id Desc");
                while($data=mysql_fetch_array($querydata)){
                echo"
		        <tr>
		            <td align=center>$no</td>
		            <td align=center>$data[code]</td>
		            <td align=center>$data[ukuran]</td>
		            <td align=center>$data[ratio]</td>
		            <td>$data[ket]</td>
		            <td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=sizeb&id=$id&iddel=$data[id]','addsize');>Delete</a></td>
		        </tr>
		";$no++;
		}
		echo"</table></div>";
	}else{
             	echo"
		<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
		<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 86-C21D</b></div>
		<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
			<br>Data size that you enter can not be inserted. please try again.<br><br>
			<i>Data ukuran yang anda masukkan tidak dapat dimasukkan. silahkan coba kembali.</i><br><div align=center>
			<input type='button' value='Next' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')>
		</div></div>
		</div>
	     	";
	}
break;

case "sizec":
	$id=$_POST['id'];
	$style=$_POST['style'];
	$design=$_POST['design'];
	$combo=$_POST['combo'];
	$color=$_POST['color'];
	$size=$_POST['size'];
	$quantity=$_POST['quantity'];
	
	$querysave=mysql_query("INSERT INTO marketing_detail_quantity VALUE ('','$id','$style','$design','$combo','$color','$quantity','','','','','','$size')");
	$numsave=mysql_num_rows(mysql_query("SELECT*FROM marketing_detail_quantity WHERE idkk like '$id'"));
	if($numsave!=0){
		echo"<div id='tableinti'>
			<table width=100% cellspacing=1 cellpadding=5>
		        <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>STYLE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>DESIGN</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:50px;'>COMBO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>COLOR</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:50px;'>SIZE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>QUANTITY</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>KELOLA</th>
		        </tr>
		";
	}
	if($querysave){$no=1;$sum=0;
                $querydata=mysql_query("SELECT*FROM marketing_detail_quantity WHERE idkk like '$id' ORDER by id Desc");
                while($data=mysql_fetch_array($querydata)){
                echo"
		        <tr>
		            <td align=center>$no</td>
		            <td>$data[style]</td>
		            <td>$data[design]</td>
		            <td align=center>$data[combo]</td>
		            <td>$data[color]</td>
		            <td align=center>$data[size]</td>
		            <td align=center>$data[quantity]</td>
		            <td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=sized&id=$id&iddel=$data[id]','addquantity');>Delete</a></td>
		        </tr>
		";$no++;$sum=$sum+$data['quantity'];
		}
		echo"
                        <tr>
		            <td align=right colspan=6><b>TOTAL</td>
		            <td align=center><b>$sum</td>
		            <td align=center>&nbsp;</td>
		        </tr>
		</table></div>";
	}else{
             	echo"
		<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
		<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 86-C21D</b></div>
		<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
			<br>Data size that you enter can not be inserted. please try again.<br><br>
			<i>Data ukuran yang anda masukkan tidak dapat dimasukkan. silahkan coba kembali.</i><br><div align=center>
			<input type='button' value='OK' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')>
		</div></div>
		</div>
	     	";
	}
break;

case "sized":
	$id=$_POST['id'];
	$iddel=$_POST['iddel'];
	$querysave=mysql_query("DELETE FROM marketing_detail_quantity WHERE id like '$iddel'");
	$numsave=mysql_num_rows(mysql_query("SELECT*FROM marketing_detail_quantity WHERE idkk like '$id'"));
	if($numsave!=0){
		echo"<div id='tableinti'>
			<table width=100% cellspacing=1 cellpadding=5>
		        <tr valign=top style='background:#C10000'>
		            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>STYLE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>DESIGN</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:50px;'>COMBO</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>COLOR</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:50px;'>SIZE</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>QUANTITY</th>
		            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>KELOLA</th>
		        </tr>
		";
	}
	if($querysave){$no=1;$sum=0;
                $querydata=mysql_query("SELECT*FROM marketing_detail_quantity WHERE idkk like '$id' ORDER by id Desc");
                while($data=mysql_fetch_array($querydata)){
                echo"
		        <tr>
		            <td align=center>$no</td>
		            <td>$data[style]</td>
		            <td>$data[design]</td>
		            <td align=center>$data[combo]</td>
		            <td>$data[color]</td>
		            <td align=center>$data[size]</td>
		            <td align=center>$data[quantity]</td>
		            <td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=sized&id=$id&iddel=$data[id]','addquantity');>Delete</a></td>
		        </tr>
		";$no++;$sum=$sum+$data['quantity'];
		}
		echo"
                        <tr>
		            <td align=right colspan=6><b>TOTAL</td>
		            <td align=center><b>$sum</td>
		            <td align=center>&nbsp;</td>
		        </tr>
		</table></div>";
	}else{
             	echo"
		<div style='position:fixed; left:0%; top:50%; width:100%' align=center>
		<div style='padding:5 10 5 10;width:350px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>Error 86-C21D</b></div>
		<div style='padding:10 10 10 10;width:350px;border:solid 1px #6F0000;background:white' align=left>
			<br>Data size that you enter can not be inserted. please try again.<br><br>
			<i>Data ukuran yang anda masukkan tidak dapat dimasukkan. silahkan coba kembali.</i><br><div align=center>
			<input type='button' value='Next' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')>
		</div></div>
		</div>
	     	";
	}
break;



}
?>
