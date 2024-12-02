<?php
session_start();
include("dbase_conection.php");
include("page_function_time.php");
switch($_POST["miniproses"]){
	case"":break;
	case "miniproses":
	        $nomor=form($_POST["nomor"]);
		$sewing=form($_POST["sewing"]);
		$accesories=form($_POST["accesories"]);
		$packing=form($_POST["packing"]);
		$querysave=mysql_query("UPDATE marketing_kontrak_kerja SET sewing='$sewing',accsesories='$accesories',packing='$packing' WHERE nomor like '$nomor'");
		if($querysave){$pesan="&nbsp;<div style='padding:7 7 7 7 ;border:solid 1px #298D31;background:#D9F4DB;'>Contract work has been complete, please download the contract file for further management.<br><br><i>Kontrak kerja telah lengkap, silahkan download file kontrak kerja untuk pengelolaan lebih lanjut.</i></div><br><br>&nbsp;";}
		else{$pesan="&nbsp;<div style='padding:7 7 7 7 ;border:solid 1px #993300;background:#FFE2D5;'>Employment contract is incomplete, please try again.<br><br><i>Kontrak kerja tidak lengkap, silahkan coba kembali.</i></div><br><br>&nbsp;";}
	break;
	
	case"delkontrak":
	        $id=$_POST['id'];
		$delsize=mysql_query("UPDATE marketing_standart_size SET status=0 WHERE idkk like '$id'");
		if(!$delsize){
			$_POST['id']=$id;
			$_POST["v"]="detailkontrak";
			echo"<div style='border:solid 1px red;background:pink'>[0] Data kontrak gagal dihapus,silahkan coba lagi.</div><br><br>";
		}else{
                        $delcombo=mysql_query("UPDATE marketing_combo SET status=0 WHERE idkk like '$id'");
			if(!$delcombo){
				$_POST['id']=$id;
				$_POST["v"]="detailkontrak";
				echo"<div style='border:solid 1px red;background:pink'>[1] Data kontrak gagal dihapus,silahkan coba lagi.</div><br><br>";
			}else{
                                $delstyle=mysql_query("UPDATE marketing_style SET status=0 WHERE idkk like '$id'");
				if(!$delstyle){
					$_POST['id']=$id;
					$_POST["v"]="detailkontrak";
					echo"<div style='border:solid 1px red;background:pink'>[2] Data kontrak gagal dihapus,silahkan coba lagi.</div><br><br>";
				}else{
                                        $delkontrak=mysql_query("UPDATE marketing_kontrak_kerja SET status=0 WHERE id like '$id'");
					if(!$delkontrak){
						$_POST['id']=$id;
						$_POST["v"]="detailkontrak";
						echo"<div style='border:solid 1px red;background:pink'>[3] Data kontrak gagal dihapus,silahkan coba lagi.</div><br><br>";
					}else{
						$_POST["v"]="listkontrak";
					}
				}
			}
		}
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
	     	<a href='javascript:void();' onclick=post('page/market_kontrak_kerja','','intipage');><b>Formulir</a><a href='javascript:void();' onclick=post('page/market_kontrak_kerja','v=listkontrak','proses')><b>Daftar Kontrak</a><a href='javascript:void();' onclick=post('page/market_kontrak_kerja','v=pencarian','proses')><b>Pencarian</a>
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
        elseif($kuantitas==""){echo"<div style='padding:7 7 7 7 ;border:solid 1px #993300;background:#FFE2D5;'>You did not enter a quantity form, please fill first<br><br><i>Anda belum mengisi formulir kuantitas, silahkan diisi dahulu.</i><br><br><input type='button' value='Back' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')></div>";}
        elseif($kuantitas=="0"){echo"<div style='padding:7 7 7 7 ;border:solid 1px #993300;background:#FFE2D5;'>You did not enter a quantity form to zero, please fill first<br><br><i>Formulir kuantitas tidak boleh 0 (nol), silahkan diisi dahulu.</i><br><br><input type='button' value='Back' style='padding:10 20 10 20;' onclick=post('page/market_kontrak_kerja','','intipage')></div>";}
        else{
           if($banyakpilih==0){
		$querysave=mysql_query("INSERT INTO marketing_kontrak_kerja VALUE ('','$nomor','$cmt','$barang','$kain','$gramasi','$kuantitas','$pono','$merek','$tno','$tanggall','$bulann','$tahunn','','','$sas','','','','$iduser','$hari','$tanggal','$bulan','$tahun','','','','','','','1','$tanggalpengiriman','$bulanpengiriman','$tahunpengiriman','$tanggalselesai','$bulanselesai','$tahunselesai','$tanggalbahan','$bulanbahan','$tahunbahan','$repeat','$kuantitas')");
		if($querysave){
		$status="<a href=javascript:void(); style=font-size:12px;color:#6F0000;font-family:arial><b>$staffdata[nama]</b></a><div style=border-left:1px black;padding-left:7;><b>CMT. $cmt</b><br>Membuat kontrak kerja untuk Item <b>$barang</b> dengan spesifikasi data <b>$nomor</b>, PO. No <b>$pono</b>, T.No <b>$tno</b>, Quantity <b>$kuantitas</b>, Delivery <b>$tanggalpengiriman/$bulanpengiriman/$tahunpengiriman</b>.</div>";
		$queryinsert=mysql_query("INSERT INTO web_status VALUE ('','$iduser','$staffdata[photo]','$status','','$hari','$tanggal','$bulan','$tahun','1')");
	        $querypilih=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE nomor like '$nomor'"));
		echo"
			<div style='height:10px;'></div>
			<div align=left>
			<table border=0 width=100% cellspacing=0 cellpadding=0>
			<tr>
		             	<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
		     			<a href='javascript:void();' ><b>Data Style</a>
	     			</td>
				<td width=400px>&nbsp;</td>
			</tr>
        		</table>
        		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
       			<form name='form1'>
                		<table cellspacing=2 cellpadding=5 width=100%>
				<tr>
		        		<td width=80px align=right>Style (Buyer)</td>
		        		<td width=100px><input type=text name='stylebuy' style='width:110px'></td>
		        		<td width=150px align=right>Style Standar Perusahaan</td>
		        		<td width=100px><input type=text name='stylecom' style='width:110px'></td>
		        		<td width=80px align=right>Quantity</td>
		        		<td width=100px><input type=text name='kuantitas' style='width:100px'  onKeyUp='javascript:checkNumber(form1.kuantitas);'></td>
		        		<td width=80px><input type=button value='OK' style='width:50px' onclick=post('page/market_kontrak_kerja','v=addstyle&aksi=tambah&id=$querypilih[id]&stylecom='+document.form1.stylecom.value+'&stylebuy='+document.form1.stylebuy.value+'&kuantitas='+document.form1.kuantitas.value,'addstyle');document.form1.stylebuy.value='';document.form1.stylecom.value='';document.form1.kuantitas.value=''; onmouseout=post('page/market_kontrak_kerja','v=comboselect&id=$querypilih[id]','comboselect');></td>
				</tr>
				</table></form>
				<div id='addstyle'></div>
			</div>

			<div style='height:10px;'></div>
			<div align=left>
			<table border=0 width=100% cellspacing=0 cellpadding=0>
			<tr>
		             	<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
		     			<a href='javascript:void();' ><b>Data Combo</a>
	     			</td>
				<td width=400px>&nbsp;</td>
			</tr>
        		</table>
        		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
			<form name='form2'>
			<table cellspacing=2 cellpadding=5 width=100%>
			<tr>
			        <td width=30px align=right>Style</td>
			        <td width=100px><select name='idstylecom'  style='width:130px' id='comboselect' onmouseout=post('page/market_kontrak_kerja','v=comboselect&id=$querypilih[id]','sizeselect1');></select></td>
		        	<td width=50px align=right>Combo</td>
		        	<td width=80px><input type=text name='combo' style='width:80px'></td>
		        	<td width=50px align=right>Warna</td>
		        	<td width=80px><input type=text name='warna' style='width:80px'></td>
		        	<td width=50px align=right>Quantity</td>
		        	<td width=80px><input type=text name='kuantitas' style='width:80px'></td>
		        	<td width=100px><input type=button value='OK' style='width:50px' onclick=post('page/market_kontrak_kerja','v=addcombo&aksi=tambah&id=$querypilih[id]&idstylecom='+document.form2.idstylecom.value+'&combo='+document.form2.combo.value+'&warna='+document.form2.warna.value+'&kuantitas='+document.form2.kuantitas.value,'addcombo');document.form2.idstylecom.value='';document.form2.warna.value='';document.form2.combo.value='';document.form2.kuantitas.value='';></td>
			</tr>
			</table></form>
			<div id='addcombo'></div></div>

                       	<div style='height:10px;'></div>
			<div align=left>
			<table border=0 width=100% cellspacing=0 cellpadding=0>
			<tr>
		             	<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
		     			<a href='javascript:void();' ><b>Data Size & Rasio</a>
	     			</td>
				<td width=400px>&nbsp;</td>
			</tr>
        		</table>
        		<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
			<form name='form3'>
                		<table cellspacing=2 cellpadding=2 border=0 width=100%>
                		<tr>
                		        <td width=30px align=right>Style</td>
				        <td width=100px><select name='idstylecom' style='width:130px' id='sizeselect1'  onchange=post('page/market_kontrak_kerja','v=sizeselect&idstylecom='+document.form3.idstylecom.value,'sizeselectcombo'); ></select></td>
				        <td width=50px align=right>Combo</td>
			        	<td width=100px><select name='idcombo'  style='width:130px' id='sizeselectcombo'></select></td>
			        	<td width=50px align=right>Size</td>
		        		<td width=100px><input type=text name='ukuran' style='width:100px'></td>
		        		<td width=100px>
						<select name=code style='width:100px'>
						        <option value='Code'>Code</option>
						        <option value='/'>/</option>
						</select>
					</td>
                		</tr>
				<tr>
		        		<td align=right>Ratio</td>
		        		<td colspan=5><input type=text name='ratio' style='width:80px'>&nbsp;&nbsp;
						Kuantitas&nbsp;&nbsp;<input type=text name='kuantitas' style='width:80px' onKeyUp='javascript:checkNumber(form3.kuantitas);'>
						Ket&nbsp;&nbsp;<input type=text name='ket' style='width:250px'></td>
		        		<td ><input type=button value='OK' style='width:100px' onclick=post('page/market_kontrak_kerja','v=addsize&idkk=$querypilih[id]&aksi=tambah&idstylecom='+document.form3.idstylecom.value+'&idcombo='+document.form3.idcombo.value+'&ukuran='+document.form3.ukuran.value+'&code='+document.form3.code.value+'&ratio='+document.form3.ratio.value+'&ket='+document.form3.ket.value+'&kuantitas='+document.form3.kuantitas.value,'addsize');document.form3.ukuran.value='';document.form3.ratio.value='';document.form3.ket.value='';document.form3.kuantitas.value='';></td>
				</tr>
				</table></form>
				<div id='addsize'></div></div>


				<div style='height:10px;'></div>
				<div align=left>
				<table border=0 width=100% cellspacing=0 cellpadding=0>
				<tr>
		             	<td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
		     			<a href='javascript:void();' ><b>Detail Production</a>
	     			</td>
				<td width=400px>&nbsp;</td>
				</tr>
        			</table>
        			<div style='border:solid 1px rgb(147,151,145);padding:10 10 10 10;'>
				<b>Detail Sewing</b>
				<form name='form4'>
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
				        <td><input type=button value='Simpan Document' style='width:150px' onclick=post('page/market_kontrak_kerja','miniproses=miniproses&nomor=$nomor&sewing='+document.form4.sewing.value+'&accesories='+document.form4.accesories.value+'&packing='+document.form4.packing.value,'intipage');></td>
				</tr>
				</table></div></div></div>
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


case "addstyle":
	SWITCH($_POST['aksi']){
	case"tambah":
	        $id=$_POST['id'];
		$stylecom=$_POST['stylecom'];
		$stylebuy=$_POST['stylebuy'];
		$kuantitas=$_POST['kuantitas'];
		$kk=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$id'"));
		$sisa=$kk['sisa'];
		if($sisa>=$kuantitas){
			if($id!=""&$stylecom!=""&$kuantitas!=""&$kuantitas!="0"){
				$querysave=mysql_query("INSERT INTO marketing_style VALUE ('','$id','$stylecom','$stylebuy','$kuantitas','','$hari','$tanggal','$bulan','$tahun','$ip','','$jam','1','','','','$kuantitas')");
				if($querysave){
				        $sisa=$sisa-$kuantitas;
					mysql_query("UPDATE marketing_kontrak_kerja SET sisa=$sisa WHERE id like '$id'");
				}else{
                                        echo"
                				<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Gagal menghitung Quantity!</div></br>
                			";
				}
			}
		}else{
                        echo"
                		<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Maaf Jumlah Quantity Style yang anda masukkan melebihi quantity Kontrak Kerja!</div></br>
                	";
		}
	break;
	case"delete":
	        $id=$_POST['idkk'];
	        $idstylecom=$_POST['idstylecom'];
	        $kk=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$id'"));
		$sisa=$kk['sisa'];
		$sty=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$idstylecom'"));
		$qty=$sty['kuantitas'];
		$sisa=$sisa+$qty;
		$return=mysql_query("UPDATE marketing_kontrak_kerja SET sisa=$sisa WHERE id like '$id'");;
		if($return){
	        	if($idstylecom!=""){
	                	$querysave=mysql_query("UPDATE marketing_style SET status=0 WHERE id like '$idstylecom' AND idkk like '$id'");
	                	if(!$querysave){
                                	echo"
                    				<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Data style gagal dihapus, silahkan coba lagi!</div></br>
                			";
				}else{
                                	echo"
                    				<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>Data style telah dihapus</div></br>
                			";
				}
			}
		}else{
                        echo"
                		<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Perhitungan gagal, silahkan coba kembali!</div></br>
                	";
		}
	break;
	}
	
	echo"<div id='tableinti'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px red'>
	        <tr valign=top style='background:#C10000'>
	            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>KONTRAK</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:200px;'>STYLE BUYER</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:200px;'>STYLE PERUSAHAAN</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>QUANTITY</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>KELOLA</th>
	        </tr>
		";
	$no=1;$sum=0;
        $querydata=mysql_query("SELECT*FROM marketing_style WHERE idkk like '$id' AND status like '1' ORDER by id Desc");
        while($data=mysql_fetch_array($querydata)){
        	$kontrak=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$data[idkk]' LIMIT 0,1"));
                echo"
	        <tr>
	            <td align=center>$no</td>
	            <td>$kontrak[nomor]</td>
	            <td>$data[stylebuy]</td>
	            <td>$data[stylecom]</td>
	            <td align=center>$data[kuantitas]</td>
	            <td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
	            <td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=addstyle&aksi=delete&idkk=$id&idstylecom=$data[id]','addstyle');>Delete</a></td>
	        </tr>
		";$no++;$sum=$sum+$data['kuantitas'];
		}
		echo"
                        <tr>
		            <td align=right colspan=4 bgcolor=#C0C0C0><b>TOTAL</td>
		            <td align=left style='font-size:16px' colspan=3 bgcolor=#C0C0C0><b>$sum </b><small style='font-size:12px'>(Quantity Order Style)</small></td>
		        </tr>
		</table></div>";
break;

case "addcombo":
	SWITCH($_POST['aksi']){
	case"tambah":
	        $id=$_POST['id'];
		$idstylecom=$_POST['idstylecom'];
		$combo=$_POST['combo'];
		$warna=$_POST['warna'];
		$kuantitas=$_POST['kuantitas'];
		$sisastyle=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$idstylecom'"));
		$sisa=$sisastyle['sisa'];
		if($sisa>=$kuantitas){
			if($id!=""&$idstylecom!=""&$combo!=""&$kuantitas!=""&$kuantitas!="0"){
				$querysave=mysql_query("INSERT INTO marketing_combo VALUE ('','$id','$idstylecom','','$combo','$warna','$hari','$tanggal','$bulan','$tahun','$ip','','$jam','1','$kuantitas','$kuantitas')");
				if($querysave){
				        $sisa=$sisa-$kuantitas;
					mysql_query("UPDATE marketing_style SET sisa=$sisa WHERE id like '$idstylecom'");
				}
			}
		}else{
                        echo"
                		<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Maaf Jumlah Quantity combo yang anda masukkan melebihi quantity style yang dipilih.!</div></br>
                	";
		}
	break;
	case"delete":
	        $id=$_POST['idkk'];
	        $idcombo=$_POST['idcombo'];
		$combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$idcombo'"));
		$style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$combo[idstylecom]'"));
		$sisastyle=$style['sisa'];
		$kuantitas=$combo['kuantitas'];
		$sisa=$sisastyle+$kuantitas;
		if($idcombo!=""){
	           $update=mysql_query("UPDATE marketing_style SET sisa=$sisa WHERE id like '$combo[idstylecom]'");
	           if($update){
	                $querysave=mysql_query("UPDATE marketing_combo SET status=0 WHERE id like '$idcombo' AND idkk like '$id'");
	                if(!$querysave){
                                echo"
                    			<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Data combo gagal dihapus, silahkan coba lagi!</div></br>
                		";
			}else{
                                echo"
                    			<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>Data combo telah dihapus</div></br>
                		";
			}
		     }
		}
	break;
	}

	echo"<div id='tableinti'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px red'>
	        <tr valign=top style='background:#C10000'>
	            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>KONTRAK</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:200px;'>STYLE</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>COMBO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>WARNA</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>QUANTITY</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:200px;'>ENTRY</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>KELOLA</th>
	        </tr>
		";
	$no=1;$sum=0;$jumlah=0;
        $querydata=mysql_query("SELECT*FROM marketing_combo WHERE idkk like '$id' AND status like '1' ORDER by id Desc");
        while($data=mysql_fetch_array($querydata)){
        	$kontrak=mysql_fetch_array(mysql_query("SELECT*FROM marketing_kontrak_kerja WHERE id like '$data[idkk]' LIMIT 0,1"));
        	$style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$data[idstylecom]' LIMIT 0,1"));
                echo"
		        <tr>
		            	<td align=center>$no</td>
	        	    	<td>$kontrak[nomor]</td>
	            		<td>$style[stylecom]</td>
	            		<td align=center>$data[combo]</td>
	            		<td>$data[warna]</td>
	            		<td align=center>$data[kuantitas]</td>
	            		<td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
	            		<td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=addcombo&aksi=delete&idkk=$id&idcombo=$data[id]','addcombo');>Delete</a></td>
	        	</tr>
		";$no++;$jumlah=$jumlah+$data['kuantitas'];
		}
		echo"
			<tr>
			        <td colspan=5 align=right><b>TOTAL</td>
			        <td colspan=3 align=left><b style='font-size:15px'>$jumlah</b> (Quantity Order Combo)</td>
			</tr>
			</table></div>
		";
break;

case "addsize":
	SWITCH($_POST['aksi']){
	case"tambah":
	        $id=$_POST['idkk'];
		$idstylecom=$_POST['idstylecom'];
		$idcombo=$_POST['idcombo'];
		$ukuran=$_POST['ukuran'];
		$code=$_POST['code'];
		$ratio=$_POST['ratio'];
		$kuantitas=$_POST['kuantitas'];
		$sisastyle=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$idcombo'"));
		$sisa=$sisastyle['sisa'];
		if($sisa>=$kuantitas){
			if($id!=""&$idstylecom!=""&$idcombo!=""&$ukuran!=""&$kuantitas!=""){
				$querysave=mysql_query("INSERT INTO marketing_standart_size VALUE ('','$id','$idstylecom','$idcombo','$code','$ukuran','$ratio','$ket','','$hari','$tanggal','$bulan','$tahun','$ip','','$jam','1','$kuantitas')");
				if($querysave){
				        $sisa=$sisa-$kuantitas;
					mysql_query("UPDATE marketing_combo SET sisa=$sisa WHERE id like '$idcombo'");
				}
			}
                }else{
                        echo"
                		<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Maaf Jumlah Quantity Size yang anda masukkan melebihi quantity combo yang dipilih.!</div></br>
                	";
		}
	break;
	case"delete":
	        $id=$_POST['idkk'];
	        $idsize=$_POST['idsize'];
	        $size=mysql_fetch_array(mysql_query("SELECT*FROM marketing_standart_size WHERE id like '$idsize'"));
		$combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$size[idcombo]'"));
		$sisacombo=$combo['sisa'];
		$kuantitas=$size['kuantitas'];
		$sisa=$sisacombo+$kuantitas;
	        if($idsize!=""){
                   $update=mysql_query("UPDATE marketing_combo SET sisa=$sisa WHERE id like '$size[idcombo]'");
	           if($update){
	                $querysave=mysql_query("UPDATE marketing_standart_size SET status=0 WHERE id like '$idsize' AND idkk like '$id'");
	                if(!$querysave){
                                echo"
                    			<br><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Data size gagal dihapus, silahkan coba lagi!</div></br>
                		";
			}else{
                                echo"
                    			<br><div style='border:solid 1px #33CCCC;background:#CCFFFF;padding:10 10 10 10;'>Data size telah dihapus</div></br>
                		";
			}
		    }
		}
	break;
	}

	echo"<div id='tableinti'>
		<table width=100% cellspacing=1 cellpadding=5 style='border-bottom:solid 1px red'>
	        <tr valign=top style='background:#C10000'>
	            <th style='color:white;font-size:12px;font-family:arial;width:10px;'>NO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>STYLE</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:80px;'>COMBO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:80px;'>SIZE</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:80px;'>RATIO</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:100px;'>QUANTITY</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:150px;'>ENTRY</th>
	            <th style='color:white;font-size:12px;font-family:arial;width:70px;'>KELOLA</th>
	        </tr>
		";
	$no=1;$sum=0;$jumlah=0;
        $querydata=mysql_query("SELECT*FROM marketing_standart_size WHERE idkk like '$id' AND status like '1' ORDER by id Desc");
        while($data=mysql_fetch_array($querydata)){
        	$style=mysql_fetch_array(mysql_query("SELECT*FROM marketing_style WHERE id like '$data[idstylecom]' LIMIT 0,1"));
        	$combo=mysql_fetch_array(mysql_query("SELECT*FROM marketing_combo WHERE id like '$data[idcombo]' LIMIT 0,1"));
                echo"
	        <tr>
	            <td align=center>$no</td>
	            <td>$style[stylecom]</td>
	            <td>$combo[combo] / $combo[warna]</td>
	            <td align=center>$data[ukuran]</td>
	            <td align=center>$data[ratio]</td>
	            <td align=center>$data[kuantitas]</td>
	            <td>$data[hariuserentry], $data[tgluserentry]-$data[blnuserentry]-$data[thnuserentry]</td>
	            <td align=center><a href='javascript:void()' onclick=post('page/market_kontrak_kerja','v=addsize&aksi=delete&idkk=$id&idsize=$data[id]','addsize');>Delete</a></td>
	        </tr>
		";$no++;$jumlah=$data['kuantitas']+$jumlah;
		}
		echo"
		<tr>
		        <td colspan=5 align=right><b>TOTAL</td>
		        <td colspan=3 align=left><b style='font-size:15px'>$jumlah</b> (Quantity order size)</td>
		</tr>
		</table></div>";
break;

case"comboselect":
	$id=$_POST['id'];
	echo"<option value=''>~ Pilih ~</option>";
	$query=mysql_query("SELECT*FROM marketing_style WHERE idkk like '$id' AND status like '1' ORDER By id Asc");
	WHILE($data=mysql_fetch_array($query)){
		echo"<option value='$data[id]'>$data[stylecom] (Q-$data[kuantitas])</option>";
	}
break;

case"sizeselect":
	$idstylecom=$_POST['idstylecom'];
	echo"<option value=''>~ Pilih ~</option>";
	$query=mysql_query("SELECT*FROM marketing_combo WHERE idstylecom like $idstylecom AND status like '1' ORDER By id Asc");
	WHILE($data=mysql_fetch_array($query)){
		echo"<option value='$data[id]'>$data[combo] / $data[warna] (Q-$data[kuantitas])</option>";
	}
break;

case"listkontrak":
	echo"
                <div style='font-size:16px;background:#EAEAEA;color:black;font-family:arial;padding:7 7 7 7;border:solid 1px rgb(147,151,145)'>
			<b>List Kontrak Kerja</b>
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
						<a href='javascript:void();' onclick=post('page/market_kontrak_kerja','v=detailkontrak&id=$data[id]','proses');>Detil</a>
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
		     		<a href='javascript:void();' onclick=post('page/market_kontrak_kerja','v=detailkontrak&id=$id','proses');>Kontrak No : <b>$data[nomor]</a>
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
		if($style['filedesign']!=""){echo"<img src='photo_kk/$style[filedesign]' height=30px style='border:solid 1px rgb(147,151,145)'  onclick=post('page/market_kontrak_kerja','v=imgshow&file=$style[filedesign]','imgshow');>&nbsp;&nbsp;";$nn++;}
		if($style['filephotodesign']!=""){echo"<img src='photo_kk/$style[filephotodesign]' height=30px style='border:solid 1px rgb(147,151,145)' onclick=post('page/market_kontrak_kerja','v=imgshow&file=$style[filephotodesign]','imgshow');>&nbsp;&nbsp;";$nn++;}
		if($style['filephotokain']!=""){echo"<img src='photo_kk/$style[filephotokain]' height=30px style='border:solid 1px rgb(147,151,145)' onclick=post('page/market_kontrak_kerja','v=imgshow&file=$style[filephotokain]','imgshow');>&nbsp;&nbsp;";$nn++;}
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
	<img src='photo_kk/$styleran[filedesign]' width=250px style='padding:5 5 5 5;border:solid 1px rgb(147,151,145)'  onclick=post('page/market_kontrak_kerja','v=imgshowbig&file=1.jpg','imgshowbig');>
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
        	        <td>$data[tanggal] - $data[bulan] - $data[tahun]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Quantity</td>
        	        <td><b>:</td>
        	        <td>$data[kuantitas] &nbsp;&nbsp;&nbsp;<b>Repeat :</b> $data[repeat] &nbsp;&nbsp;&nbsp;<b>Gramasi :</b> $data[gramasi] </td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Bahan</td>
        	        <td><b>:</td>
        	        <td>$data[tanggal] - $data[bulan] - $data[tahun]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Selesai</td>
        	        <td><b>:</td>
        	        <td>$data[tanggalselesai] - $data[bulanselesai] - $data[tahunselesai]</td>
        	</tr>
        	<tr valign=top>
        	        <td align=right><b>Tanggal Pengiriman</td>
        	        <td><b>:</td>
        	        <td>$data[tanggalpengiriman] - $data[bulanpengiriman] - $data[tahunpengiriman]</td>
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
			<input type=button value='Print Exel' onclick=post('page/market_kontrak_kerja','v=downloadexcel&id=$id','upload');>&nbsp;&nbsp;
			<input type=button value='Print PDF'>&nbsp;&nbsp;
			<input type=button value='Printed'>&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type=button value='Upload File' onclick=post('page/market_kontrak_kerja','v=uploadfile&iddata=$id','upload');>&nbsp;&nbsp;
			<input type=button value='&nbsp;&nbsp;Edit&nbsp;&nbsp;'>&nbsp;&nbsp;
			<input type=button value='Delete' onclick=post('page/market_kontrak_kerja','miniproses=delkontrak&id=$id','proses');>&nbsp;&nbsp;
		</div><div id='upload'></div>
	";
break;

case"imgshow":
	$file=$_POST['file'];
	echo"<img src='photo_kk/$file' width=250px style='padding:5 5 5 5;border:solid 1px rgb(147,151,145)'  onclick=post('page/market_kontrak_kerja','v=imgshowbig&file=$file','imgshowbig');>";
break;
case"imgshowbig":
	$file=$_POST['file'];
	echo"
			<div style='position:fixed; left:0%; top:5%; width:100%' align=center onclick=post('page/market_kontrak_kerja','v=vv','imgshowbig')>
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
	        <input type=button value='Cari' onclick=post('page/market_kontrak_kerja','v=pencariandata&kunci='+document.form11.kunci.value+'&type='+document.form11.type.value,'searchdata');>
	        </form><div id='searchdata'></div>
	";
break;

case"pencariandata":
	$kunci=$_POST['kunci'];
	$type=$_POST['type'];
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
						<a href='javascript:void();' onclick=post('page/market_kontrak_kerja','v=detailkontrak&id=$data[id]','proses');>Detil</a>
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

case"uploadfile":
	$id=$_POST["iddata"];
	echo"
		<div style='position:fixed; left:0%; top:5%; width:100%' align=center onclick=post('page/market_kontrak_kerja','v=vv','upload')>
		<div style='padding:5 10 5 10;width:400px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow'>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Upload File ( Pola, Sampel, & Kain )</b></div>
		<div style='padding:10 10 10 10;width:400px;border:solid 1px #6F0000;background:white' align=center>
			<iframe src='page/marketing_file_upload.php?id=$id' width=398px height=450px frameSpacing='0' frameBorder='0' scrolling='yes'></iframe>
		</div><div style='height:250px;'>&nbsp;</div></div>
		";

break;
case"downloadexcel":
	$id=$_POST["id"];
	echo"
		<iframe src='creator/marketing_kontrak_print_excel.php?id=$id' width=100% height=5px frameSpacing='0' frameBorder='0' scrolling='no'></iframe>
		";

break;
}
?>
