<?php
session_start();
include("dbase_conection.php");
include("page_function_time.php");

SWITCH($_POST['v']){
	case"":
                echo"
			<div style='height:20px;'></div>
		        <div align=left>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=','intipage')><b>Barcode Absen</a><a href='javascript:void();' onclick=post('page/page_hrd_absen','v=manual','proses')><b>Manual Absen</a><a href='javascript:void();' onclick=post('page/page_hrd_absen','v=laporan','proses')><b>Laporan</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div id='proses'>
		        Formulir presensi barcode dapat dilihat di halaman depan system ini. Presensi ini hanya dapat dibuka melalui jaringan internet PT. Mulia Impex.
          	        </div>
		";
	break;
	
	case"manual":
	        echo"
                        <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Manual Absensi</b> | Absensi Masuk Kerja</div>
			<div style='background:#5B5B5B'>
        	        <div id='menu_box1'>
				<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=manual','proses');>Absen Masuk</a>
				<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=manualpresensipulang','manualproses');>Absen Pulang</a>
			</div></div><div style='height:3px;background:black'></div>
			<div id=manualproses>

                        <div style='height:20px;'></div>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Formulir Absen Masuk</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div id='proses2'><form name=form11>
		                <table border=0 width=100% cellspacing=5 cellpadding=3>
		                <tr >
		                        <td width=100px>Hari</td>
		                        <td width=10px>:</td>
		                        <td width=200px>
						<select name='hari' style='width:80px'  onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');>
						        <option value='Senin'>Senin</option>
						        <option value='Selasa'>Selasa</option>
						        <option value='Rabu'>Rabu</option>
						        <option value='Kamis'>Kamis</option>
						        <option value='Jumat'>Jumat</option>
						        <option value='Sabtu'>Sabtu</option>
						        <option value='Minggu'>Minggu</option>
						</select>
					</td>
					<td width=150px rowspan=3>
						NIK<br>
						<input type=text name='nik' style='padding:15 7 15 7;font-size:23px;width:150px' onKeyUp=post('page/page_hrd_absen','v=autokaryawan&nik='+document.form11.nik.value,'karyawan');><br><br>
						<input type=button value='Hadir' style='padding:7 7 7 7;font-size:12px;width:150px;' onclick=post('page/page_hrd_absen','v=absenmasukproses&nik='+document.form11.nik.value+'&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value+'&jammasuk='+document.form11.jammasuk.value+'&menitmasuk='+document.form11.menitmasuk.value+'&detikmasuk='+document.form11.detikmasuk.value,'tableinti11');document.form11.nik.value='';>
					</td>
					<td width=100px  rowspan=3 align=center>
						<div id='karyawan'>&nbsp;</div>
					</td>
		                </tr>
		                <tr>
		                        <td>Tanggal</td>
		                        <td>:</td>
		                        <td>
						<input type=text name='tanggal' style='width:50px' maxlength=2  onKeyUp='javascript:checkNumber(form11.tanggal);' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');> /
						<input type=text name='bulan' style='width:50px' maxlength=2 onKeyUp='javascript:checkNumber(form11.bulan);' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');> /
						<input type=text name='tahun' style='width:50px'  maxlength=4 onKeyUp='javascript:checkNumber(form11.tahun);' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');></td>
		                </tr>
		                <tr>
		                        <td>Waktu Masuk</td>
		                        <td>:</td>
		                        <td><input type=text name='jammasuk' style='width:50px'  maxlength=2 onKeyUp='javascript:checkNumber(form11.jammasuk);'> : <input type=text name='menitmasuk' style='width:50px' maxlength=2 onKeyUp='javascript:checkNumber(form11.menitmasuk);'> : <input type=text name='detikmasuk' style='width:50px' maxlength=2 onKeyUp='javascript:checkNumber(form11.detikmasuk);'></td>
		                </tr>
		                </table></form>
			</div>
                        <div id='tableinti11'></div>
			</div>
		";
	break;
	
	case"absenmasukproses":
	        $hariini=$_POST['hari'];
        	$tanggalini=$_POST['tanggal'];
	        $bulanini=$_POST['bulan'];
	        $tahunini=$_POST['tahun'];
	        SWITCH($_POST['vv']){
	        Case "":
		        $nik=$_POST['nik'];
	        	$jammasuk=$_POST['jammasuk'];
		        $menitmasuk=$_POST['menitmasuk'];
		        $detikmasuk=$_POST['detikmasuk'];
	        	$karyawanq=mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$nik' AND status like '1'");
			$karyawann=mysql_num_rows($karyawanq);
			$karyawan=mysql_fetch_array($karyawanq);
			$check=mysql_num_rows(mysql_query("SELECT*FROM hrd_staff_absen WHERE hari like '$hariini' AND tanggal like '$tanggalini' AND bulan like '$bulanini' AND tahun like '$tahunini' AND idstaff like '$karyawan[id]' AND status like '1'"));
		        if($nik==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir NIK belum anda isi.</div><br>";}
		        elseif($hariini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir hari belum anda isi.</div><br>";}
	        	elseif($tanggalini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir tanggal belum anda isi.</div><br>";}
		        elseif($bulanini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir bulan belum anda isi.</div><br>";}
		        elseif($tahunini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir tahun belum anda isi.</div><br>";}
	        	elseif($jammasuk==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir jam belum anda isi.</div><br>";}
		        elseif($menitmasuk==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir menit belum anda isi.</div><br>";}
	        	elseif($karyawann==0){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Karyawan yang anda masukkan tidak terdaftar sebagai karyawan aktif.</div><br>";}
	       	        elseif($check!=0){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Karyawan yang anda masukkan telah mengisi daftar hadir, anda tidak dapat memasukkan kembali karyawan tersebut.</div><br>";}
		        else{
			        $add=mysql_query("INSERT INTO hrd_staff_absen VALUE ('','1','$nik','$karyawan[id]','$hariini','$tanggalini','$bulanini','$tahunini','$jammasuk','$menitmasuk','$detikmasuk','','','','','','','','','','','1','".$_SESSION['sessionid']."','$hari','$tanggal','$bulan','$tahun','$ip','$host','$jam','1','default.jpg')");
		        	if(!$add){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Presensi anda GAGAL, silahkan coba kembali.</div><br>";}
			        else{$pesan="<br><div style='padding:7 7 7 7;border:solid 1px #BBBB00;background:#FFFFBF;'>Presensi berhasil di masukkan.</div><br>";}
			}
		break;
		Case "delete":
		        $id=$_POST['id'];
		        $delete=mysql_query("UPDATE hrd_staff_absen SET status=0 WHERE id like '$id'");
		        if(!$delete){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Presensi anda GAGAL dihapus, silahkan coba kembali.</div><br>";}
		        else{$pesan="<br><div style='padding:7 7 7 7;border:solid 1px #BBBB00;background:#FFFFBF;'>Presensi berhasil di HAPUS.</div><br>";}
		break;
		}
	        
	        echo"
	                <div style='height:20px;'></div>
		        <div align=left>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Daftar Absen</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div id='proses2'>
		                <div id='tableinti1'>
				$pesan
				<table boder=0 cellspacing=1 cellpadding=3 width=100%>
					<tr bgcolor='#5B5B5B'>
					        <th width=10px>NO</th>
					        <th width=80px>NIK</th>
					        <th width=200px>KARYAWAN</th>
					        <th width=100px>TANGGAL</th>
					        <th width=100px>MASUK</th>
					        <th width=100px>PULANG</th>
					        <th width=80px>KELOLA</th>
					</tr>
		";
		$dataq=mysql_query("SELECT*FROM hrd_staff_absen WHERE hari like '$hariini' AND tanggal like '$tanggalini' AND bulan like '$bulanini' AND tahun like '$tahunini' AND status like '1' ORDER by id DESC");
		$datan=mysql_num_rows($dataq);
		if($datan==0){echo"<tr><td colspan=7>Belum ada karyawan yang masuk hari ini.</td></tr>";}
		else{
		        $no=1;
			WHILE($data=mysql_fetch_array($dataq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' AND status like '1'"));
			        $karyawan[nama]=strtoupper($karyawan[nama]);
			        
			        $data['jammasuk']=num($data['jammasuk']);
			        $data['menitmasuk']=num($data['menitmasuk']);
			        $data['detikmasuk']=num($data['detikmasuk']);
			        $data['jamkeluar']=num($data['jamkeluar']);
			        $data['menitkeluar']=num($data['menitkeluar']);
			        $data['detikkeluar']=num($data['detikkeluar']);
			        echo"
			                <tr>
			                        <td align=center>$no</td>
			                        <td align=center>$data[nik]</td>
			                        <td>$karyawan[nama] $da</td>
			                        <td>$data[hari], $data[tanggal]/$data[bulan]/$data[tahun]</td>
			                        <td align=center>$data[jammasuk] : $data[menitmasuk] : $data[detikmasuk] WIB</td>
			                        <td align=center>$data[jamkeluar] : $data[menitkeluar] : $data[detikkeluar] WIB</td>
			                        <td align=center><a href='javascript:void()' onclick=post('page/page_hrd_absen','v=absenmasukproses&vv=delete&id=$data[id]&hari=$data[hari]&tanggal=$data[tanggal]&bulan=$data[bulan]&tahun=$data[tahun]','tableinti11');>Delete</a></td>
			                </tr>
				";$no++;
			}
		}
		echo"
				</table>
				</div>
			</div>
		";
	break;
	
	case"manualpresensipulang":
		echo"
                        <div style='height:20px;'></div>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Formulir Absen Pulang</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div id='proses2'><form name=form11>
		                <table border=0 width=100% cellspacing=5 cellpadding=3>
		                <tr >
		                        <td width=100px>Hari</td>
		                        <td width=10px>:</td>
		                        <td width=200px>
						<select name='hari' style='width:80px' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');>
						        <option value='Senin'>Senin</option>
						        <option value='Selasa'>Selasa</option>
						        <option value='Rabu'>Rabu</option>
						        <option value='Kamis'>Kamis</option>
						        <option value='Jumat'>Jumat</option>
						        <option value='Sabtu'>Sabtu</option>
						        <option value='Minggu'>Minggu</option>
						</select>
					</td>
					<td width=150px rowspan=3>
						NIK<br>
						<input type=text name='nik' style='padding:15 7 15 7;font-size:23px;width:150px' onKeyUp=post('page/page_hrd_absen','v=autokaryawan&nik='+document.form11.nik.value,'karyawan');><br><br>
						<input type=button value='Pulang' style='padding:7 7 7 7;font-size:12px;width:150px;' onclick=post('page/page_hrd_absen','v=absenkeluarproses&nik='+document.form11.nik.value+'&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value+'&jamkeluar='+document.form11.jamkeluar.value+'&menitkeluar='+document.form11.menitkeluar.value+'&detikkeluar='+document.form11.detikkeluar.value,'tableinti11');document.form11.nik.value='';>
					</td>
					<td width=100px  rowspan=3 align=center>
						<div id='karyawan'>&nbsp;</div>
					</td>
		                </tr>
		                <tr>
		                        <td>Tanggal</td>
		                        <td>:</td>
		                        <td>
						<input type=text name='tanggal' style='width:50px' maxlength=2  onKeyUp='javascript:checkNumber(form11.tanggal);' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');> /
						<input type=text name='bulan' style='width:50px' maxlength=2 onKeyUp='javascript:checkNumber(form11.bulan);' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');> /
						<input type=text name='tahun' style='width:50px'  maxlength=4 onKeyUp='javascript:checkNumber(form11.tahun);' onchange=post('page/page_hrd_absen','v=autoview&hari='+document.form11.hari.value+'&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');></td>
		                </tr>
		                <tr>
		                        <td>Waktu Pulang</td>
		                        <td>:</td>
		                        <td><input type=text name='jamkeluar' style='width:50px'  maxlength=2 onKeyUp='javascript:checkNumber(form11.jamkeluar);'> : <input type=text name='menitkeluar' style='width:50px' maxlength=2 onKeyUp='javascript:checkNumber(form11.menitkeluar);'> : <input type=text name='detikkeluar' style='width:50px' maxlength=2 onKeyUp='javascript:checkNumber(form11.detikkeluar);'></td>
		                </tr>
		                </table></form>
			</div>
                        <div id='tableinti11'></div>
		";
	break;
	
	case"absenkeluarproses":
	        $hariini=$_POST['hari'];
        	$tanggalini=$_POST['tanggal'];
	        $bulanini=$_POST['bulan'];
	        $tahunini=$_POST['tahun'];
	        SWITCH($_POST['vv']){
	        Case "":
		        $nik=$_POST['nik'];
	        	$jamkeluar=$_POST['jamkeluar'];
		        $menitkeluar=$_POST['menitkeluar'];
		        $detikkeluar=$_POST['detikkeluar'];
	        	$karyawanq=mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$nik' AND status like '1'");
			$karyawann=mysql_num_rows($karyawanq);
			$karyawan=mysql_fetch_array($karyawanq);
			$checkq=mysql_query("SELECT*FROM hrd_staff_absen WHERE hari like '$hariini' AND tanggal like '$tanggalini' AND bulan like '$bulanini' AND tahun like '$tahunini' AND idstaff like '$karyawan[id]' AND status like '1'");
			$check=mysql_num_rows($checkq);
			$checkd=mysql_fetch_array($checkq);
		        if($nik==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir NIK belum anda isi.</div><br>";}
		        elseif($hariini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir hari belum anda isi.</div><br>";}
	        	elseif($tanggalini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir tanggal belum anda isi.</div><br>";}
		        elseif($bulanini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir bulan belum anda isi.</div><br>";}
		        elseif($tahunini==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir tahun belum anda isi.</div><br>";}
	        	elseif($jamkeluar==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir jam belum anda isi.</div><br>";}
		        elseif($menitkeluar==""){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Formulir menit belum anda isi.</div><br>";}
		        elseif($checkd['statusabsen']=="2"){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Data presensi pulang untuk karyawan ini telah ada sebelumnya, anda dilarang memasukkan data kepulangan karyawan.</div><br>";}
	        	elseif($karyawann==0){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Karyawan yang anda masukkan tidak terdaftar sebagai karyawan aktif.</div><br>";}
	       	        elseif($check==0){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Karyawan yang anda masukkan belum terdaftar dalam data presensi masuk, anda tidak dapat melanjutkan proses ini.</div><br>";}
		        else{
		                $checkd['menitmasuk']=num($checkd['menitmasuk']);
		                $menitkeluar=num($menitkeluar);
		                $sumjkeluar="$jamkeluar$menitkeluar";
		                $sumjmasuk="$checkd[jammasuk]$checkd[menitmasuk]";
		                $jamsum=$sumjkeluar - $sumjmasuk;
				$jamlembur=$jamsum-800;
				$pengalilembur=$jamlembur/100;
				$sisabagi=$jamlembur % 100;
				$umk=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '1'"));
		                $ums=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '2'"));
		                $uml1=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '3'"));
		                $uml2=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '4'"));
		                
				if($jamsum>=800){
					if($karyawan['idsubbagian']==60){
						$uangmakan=$ums['harga'];
					}elseif($karyawan['idsubbagian']!=60){
						$uangmakan=$umk['harga'];
					}
				}else{$uangmakan=0;}
				if($pengalilembur>=1){
				        if($sisabagi>=30){
                                                $lembur=explode(".", $pengalilembur);
						$uanglembur1=$lembur[0]*$uml1['harga'];
						$uanglembur2=0.5*$uml1['harga'];
						$uanglembur=$uanglembur1+$uanglembur2;
					}else{
                                                $lembur=explode(".", $pengalilembur);
						$uanglembur1=$lembur[0]*$uml1['harga'];
						$uanglembur2=0*$uml1['harga'];
						$uanglembur=$uanglembur1+$uanglembur2;
					}
				}else{$uanglembur=0;}
				if($karyawan['jobstatus']==1){
                                        if($jamsum>=800){$uangkerja=$karyawan['jobgajiharian'];}else{$uangkerja=0.5*$karyawan['jobgajiharian'];}
				}elseif($karyawan['jobstatus']==2){
					$uangkerja=0;
				}

				$gaji=$uangmakan+$uanglembur+$uangkerja;
			        $update=mysql_query("UPDATE hrd_staff_absen SET jamkeluar='$jamkeluar',menitkeluar='$menitkeluar',detikkeluar='$detikkeluar',statusabsen=2,uangmakan='$uangmakan',uanglembur='$uanglembur',uangkerja='$uangkerja',gaji='$gaji' WHERE hari like '$hariini' AND tanggal like '$tanggalini' AND bulan like '$bulanini' AND tahun like '$tahunini' AND idstaff like '$karyawan[id]' AND status like '1'");
		        	if(!$update){$pesan="<br><div style='padding:7 7 7 7;border:solid 1px red;background:pink;'>Presensi anda GAGAL, silahkan coba kembali.</div><br>";}
			        else{$pesan="<br><div style='padding:7 7 7 7;border:solid 1px #BBBB00;background:#FFFFBF;'>Presensi berhasil di masukkan.</div><br>";}
			}
		break;
		}

	        echo"
	                <div style='height:20px;'></div>
		        <div align=left>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Daftar Absen</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div id='proses2'>
		                <div id='tableinti1'>
				$pesan
				<table boder=0 cellspacing=1 cellpadding=3 width=100%>
					<tr bgcolor='#5B5B5B'>
					        <th width=10px>NO</th>
					        <th width=80px>NIK</th>
					        <th width=200px>KARYAWAN</th>
					        <th width=100px>TANGGAL</th>
					        <th width=100px>MASUK</th>
					        <th width=100px>PULANG</th>
					        <th width=100px>MAKAN</th>
					        <th width=100px>LEMBUR</th>
					        <th width=100px>GAJI</th>
					        <th width=100px>TOTAL</th>
					</tr>
		";
		$dataq=mysql_query("SELECT*FROM hrd_staff_absen WHERE hari like '$hariini' AND tanggal like '$tanggalini' AND bulan like '$bulanini' AND tahun like '$tahunini' AND status like '1' ORDER by id DESC");
		$datan=mysql_num_rows($dataq);
		if($datan==0){echo"<tr><td colspan=10>Belum ada karyawan yang masuk hari ini.</td></tr>";}
		else{
		        $no=1;$biayapegawai=0;
			WHILE($data=mysql_fetch_array($dataq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' AND status like '1'"));
			        $karyawan[nama]=strtoupper($karyawan[nama]);

			        $data['jammasuk']=num($data['jammasuk']);
			        $data['menitmasuk']=num($data['menitmasuk']);
			        $data['detikmasuk']=num($data['detikmasuk']);
			        $data['jamkeluar']=num($data['jamkeluar']);
			        $data['menitkeluar']=num($data['menitkeluar']);
			        $data['detikkeluar']=num($data['detikkeluar']);
			        $biayapegawai=$data['gaji']+$biayapegawai;
			        echo"
			                <tr>
			                        <td align=center>$no</td>
			                        <td align=center>$data[nik]</td>
			                        <td>$karyawan[nama]</td>
			                        <td>$data[hari], $data[tanggal]/$data[bulan]/$data[tahun]</td>
			                        <td align=center>$data[jammasuk] : $data[menitmasuk] : $data[detikmasuk]</td>
			                        <td align=center>$data[jamkeluar] : $data[menitkeluar] : $data[detikkeluar]</td>
			                        <td align=right>$data[uangmakan],-</td>
			                        <td align=right>$data[uanglembur],-</td>
			                        <td align=right>$data[uangkerja],-</td>
						<td align=right>$data[gaji],-</td>
			                </tr>
				";$no++;
			}
		}
		echo"
		                <tr>
		                        <td colspan=9 align=right><b>BIAYA GAJI KARYAWAN</td>
		                        <td><b>Rp. $biayapegawai,-</td>
		                </tr>
				</table>
				</div>
			</div>
		";
	break;
	
	case"autoview":
        	$tanggalini=$_POST['tanggal'];
	        $bulanini=$_POST['bulan'];
	        $tahunini=$_POST['tahun'];
	        $bulannama=bulannama($bulanini);
	        echo"
	                <div style='height:20px;'></div>
		        <div align=left>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=20% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Daftar Absen</a>
			     </td>
		             <td width=80%>Data tanggal : <b>$tanggalini $bulannama $tahunini</b></td>
		        </tr>
		        </table>
		        <div id='proses2'>
		                <div id='tableinti1'>
				<table boder=0 cellspacing=1 cellpadding=3 width=100%>
					<tr bgcolor='#5B5B5B'>
					        <th width=10px>NO</th>
					        <th width=50px>NIK</th>
					        <th width=200px>KARYAWAN</th>
					        <th width=130px>JABATAN</th>
					        <th width=50px>STATUS</th>
					        <th width=100px>MASUK</th>
					        <th width=100px>PULANG</th>
					        <th width=80px>LEMBUR</th>
					        <th width=100px>GAJI, UM</th>
					        <th width=100px>TOTAL</th>
					        <th width=80px>KELOLA</th>
					</tr>
		";
		$dataq=mysql_query("SELECT*FROM hrd_staff_absen WHERE tanggal like '$tanggalini' AND bulan like '$bulanini' AND tahun like '$tahunini' AND status like '1' ORDER by id DESC");
		$datan=mysql_num_rows($dataq);
		if($datan==0){echo"<tr><td colspan=11>Belum ada karyawan yang masuk hari ini.</td></tr>";}
		else{
		        $no=1;$biayapegawai=0;
			WHILE($data=mysql_fetch_array($dataq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' AND status like '1'"));
			        $jobstatus=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobstatus WHERE id like '$karyawan[jobstatus]' LIMIT 0,1"));
			        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$karyawan[subsubbagian]' LIMIT 0,1"));
			        $karyawan[nama]=strtoupper($karyawan[nama]);
                                $biayapegawai=$data['gaji']+$biayapegawai;
			        $data['jammasuk']=num($data['jammasuk']);
			        $data['menitmasuk']=num($data['menitmasuk']);
			        $data['detikmasuk']=num($data['detikmasuk']);
			        $data['jamkeluar']=num($data['jamkeluar']);
			        $data['menitkeluar']=num($data['menitkeluar']);
			        $data['detikkeluar']=num($data['detikkeluar']);
                                $data['uangkerja']=$data['uangmakan']+$data['uangkerja'];
			        echo"
			                <tr>
			                        <td align=center>$no</td>
			                        <td align=center>$data[nik]</td>
			                        <td>$karyawan[nama]</td>
			                        <td>$jabatan[subsubbagian]</td>
			                        <td>$jobstatus[status]</td>
			                        <td align=center>$data[jammasuk] : $data[menitmasuk] : $data[detikmasuk]</td>
			                        <td align=center>$data[jamkeluar] : $data[menitkeluar] : $data[detikkeluar]</td>
			                        <td align=right>$data[uanglembur],-</td>
			                        <td align=right>$data[uangkerja],-</td>
						<td align=right>$data[gaji],-</td>
						<td align=center>
							<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=detailabsen&id=$data[id]','detail')>Detail</a></td>
			                </tr>
				";$no++;
			}
		}
		echo"
		                <tr>
		                        <td colspan=9 align=right><b>BIAYA GAJI KARYAWAN</td>
		                        <td colspan=2><b>Rp. $biayapegawai,-</td>
		                </tr>
				</table>
				</div><div id='detail'></div>
			</div>
		";
	break;
	case"autokaryawan":
	        $nik=$_POST['nik'];
	        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE nik like '$nik' LIMIT 0,1"));
	        $karyawan[nama]=strtoupper($karyawan[nama]);
	        if($karyawan['id']==""){$foto="default.jpg";}else{$foto=$karyawan['photo'];}
	        echo"
			<img src='user_photo/$foto' style='padding:3 3 3 3;border:solid 1px #969696;width:100px'><br><small>$karyawan[nama]</small>
		";
	break;
	
	case"laporan":
	        echo"
	                <div id='menu_judul_inti' style='border:solid 1px #808080'><b>Laporan Absensi</b> | Daftar kehadian</div>
			<div style='background:#5B5B5B'>
        	        <div id='menu_box1'>
				<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=laporan','proses');>Daftar Hadir</a>
				<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=laporanstatistik','laporanproses');>Statistik</a>
				<a href='javascript:void();' onclick=post('page/page_hrd_absen','v=laporangrafik','laporanproses');>Grafik</a>
			</div></div><div style='height:3px;background:black'></div>
			<div id=laporanproses>
			<div style='height:20px;'></div>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=80% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Pilih Data</a>
			     </td>
		             <td width=400px>&nbsp;</td>
		        </tr>
		        </table>
		        <div id='proses2'><form name=form11>
		                <table border=0 width=100% cellspacing=5 cellpadding=3>
		                <tr >
		                        <td width=60px>Tanggal Absen</td>
		                        <td width=10px>:</td>
		                        <td width=400px>
						<select name='tanggal' style='width:60'  onchange=post('page/page_hrd_absen','v=autoview&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');>";
							$lang="tgl";include("fungsi_nomor.php");
					echo"	</select>&nbsp;
						<select name='bulan' style='width:150'  onchange=post('page/page_hrd_absen','v=autoview&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');>";
							$lang="bln";include("fungsi_nomor.php");
					echo"	</select>&nbsp;
						<select name='tahun' style='width:70'  onchange=post('page/page_hrd_absen','v=autoview&tanggal='+document.form11.tanggal.value+'&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'tableinti11');>";
							$lang="thn";include("fungsi_nomor.php");
					echo"	</select>
					</td>
		                </tr>
		                </table></form></div>
		                <div id=tableinti11></div>
		";
	break;
	
	case"detailabsen":
	        $id=$_POST['id'];
	        $data=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_absen WHERE id like '$id' LIMIT 0,1"));
	        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
	        $bagian=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobbagian WHERE id like '$karyawan[jobbagian]' LIMIT 0,1"));
	        $jabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE id like '$karyawan[jobsubbagian]' LIMIT 0,1"));
	        $subjabatan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE id like '$karyawan[subsubbagian]' LIMIT 0,1"));
	        $data['jammasuk']=num($data['jammasuk']);
	        $data['menitmasuk']=num($data['menitmasuk']);
	        $data['detikmasuk']=num($data['detikmasuk']);
	        $data['jamkeluar']=num($data['jamkeluar']);
	        $data['menitkeluar']=num($data['menitkeluar']);
	        $data['detikkeluar']=num($data['detikkeluar']);
		SWITCH($data['absenmodel']){
			case"0":   $presensi="Barcode System";		break;
			case"1":   $presensi="Manual System";		break;
			case"2":   $presensi="Fingerprint System";	break;
		}
	        echo"
                        <div style='position:fixed; left:0%; top:10%; width:100%' align=center >
			<div style='padding:5 10 5 10;width:500px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_absen','v=vv','detail');>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absensi</b> | $data[tanggal]$data[bulan]$data[tahun] : NIK $data[nik]</div>
			<div style='padding:10 10 10 10;width:500px;border:solid 1px #6F0000;background:white'>
			<table border=0 width=100% cellspacing=3 cellpadding=5>
			<tr>
			        <td width=100px align=right>Nama</td>
			        <td width=5px>:</td>
			        <td width=310px><input type=text style='width:270px' readonly='readonly' value='$karyawan[nama]'></td>
			</tr>
			<tr>
			        <td align=right>Jabatan</td>
			        <td>:</td>
			        <td><input type=text style='width:300px' readonly='readonly' value='$bagian[bagian], $jabatan[subbagian], $subjabatan[subsubbagian]'></td>
			</tr>
			<tr>
			        <td align=right>Tanggal</td>
			        <td>:</td>
			        <td><input type=text style='width:150px' readonly='readonly' value='$data[hari], $data[tanggal]/$data[bulan]/$data[tahun]'></td>
			</tr>
			<tr>
			        <td align=right>Presensi</td>
			        <td>:</td>
			        <td><input type=text style='width:150px' readonly='readonly' value='$presensi'> </td>
			</tr>
			<tr>
			        <td align=right>Masuk</td>
			        <td>:</td>
			        <td><input type=text style='width:80px' readonly='readonly' value='$data[jammasuk] : $data[menitmasuk] : $data[detikmasuk]'> WIB</td>
			</tr>
			<tr>
			        <td align=right>Pulang</td>
			        <td>:</td>
			        <td><input type=text style='width:80px' readonly='readonly' value='$data[jamkeluar] : $data[menitkeluar] : $data[detikkeluar]'> WIB</td>
			</tr>
			<tr>
			        <td align=right>Uang Makan</td>
			        <td>:</td>
			        <td>Rp. <input type=text style='width:100px' readonly='readonly' value='$data[uangmakan]'>,-</td>
			</tr>
			<tr>
			        <td align=right>Uang Lemburan</td>
			        <td>:</td>
			        <td>Rp. <input type=text style='width:100px' readonly='readonly' value='$data[uanglembur]'>,-</td>
			</tr>
			<tr>
			        <td align=right>Gaji</td>
			        <td>:</td>
			        <td>Rp. <input type=text style='width:100px' readonly='readonly' value='$data[uangkerja]'>,-</td>
			</tr>
			<tr>
			        <td align=right>TOTAL</td>
			        <td>:</td>
			        <td>Rp. <input type=text style='width:150px' readonly='readonly' value='$data[gaji]'>,-</td>
			</tr>
			</table>&nbsp;
			<div id=link>
				<a href='javascript:void()' onclick=post('page/page_work_detil_a','id=$data[idstaff]','detil');>Photo Profil</a>&nbsp;&nbsp;
				<a href='javascript:void()' onclick=post('page/page_hrd_absen','v=checkfotoabsen&id=$data[id]','detil');>Photo Absen</a>&nbsp;&nbsp;
				<a href='javascript:void()' onclick=post('page/page_hrd_absen','v=','detil');>Check Premi</a>&nbsp;&nbsp;
				<a href='javascript:void()' onclick=post('page/page_hrd_absen','v=','detil');>Laporan Poduksi</a>&nbsp;&nbsp;
			</div>&nbsp;
			<div id='detil'></div>
			</div>
		";
	break;
	
	case"vv":
	break;
	
	case"checkfotoabsen":
	        $id=$_POST['id'];
	        $data=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_absen WHERE id like '$id' LIMIT 0,1"));
	        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
	        if($data['foto']==""){$data['foto']="default.jpg";}else{$data['foto']=$data['foto'];}
                echo"
                	<div style='position:fixed; left:0%; top:10%; width:100%' align=center>
			<div style='padding:5 10 5 10;width:800px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>&nbsp;&nbsp;Check Photo Presensi</b></div>
			<div style='padding:0 0 10 0;width:820px;border:solid 1px #6F0000;background:white' align=center>
				<table border=0 width=100% cellspacing=0 cellpadding=0>
        	            	<tr bgcolor=black>
	                        	<td width=47% align=right style='border-bottom:solid 1px black'><img src='user_photo/$karyawan[photo]' height=300px></td>
	                        	<td width=6%></td>
	                        	<td width=47% align=left style='border-bottom:solid 1px black'><img src='presensi/$data[foto]' height=300px></td>
        	        	</tr>
        	        	<tr valign=top>
 		                       <td align=right style='padding:0 10 0 0'>
                		            <b>PROFIL</b>
		                        </td>
		                        <td align=center>|</td>
                		        <td align=left style='padding:0 0 0 5'>
		                            <b>ABSENSI</b>
		                        </td>
                		</tr>
                        	</table>
                		<br><br>
                    		<input type='button' value='Close' style='padding:5 20 5 20;' onclick=post('page/page_hrd_absen','v=vv','detil')>&nbsp;&nbsp;
			</div>
			</div>
	       ";
	break;
	case"laporanstatistik":
	        $bulannama=bulannama($bulan);
	        echo"
		        <div id='listabsen'>
			<div style='height:20px;'></div><form name=form11>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=20% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Statistik Harian</a>
			     </td>
		             <td width=400px>
                                <select name='bulan' style='width:150'  onchange=post('page/page_hrd_absen','v=laporanharian&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'harian');>";
				$lang="bln";include("fungsi_nomor.php");
		echo"		</select>&nbsp;
				<select name='tahun' style='width:70'  onchange=post('page/page_hrd_absen','v=laporanharian&bulan='+document.form11.bulan.value+'&tahun='+document.form11.tahun.value,'harian');>";
				$lang="thn";include("fungsi_nomor.php");
		echo"		</select>
			     </td>
		        </tr>
		        </table>
		        <div id='proses2'>
		                <div id='harian'>
				Laporan kehadiran karyawan berdasarkan tanggal pada bulan $bulannama
				<div id='tableinti1'>
				<table width=100% cellspacing=1 cellpadding=5>
				<tr bgcolor='#5B5B5B'>
				        <th width=150px>TANGGAL</th>
				        <th width=150px>KARYAWAN</th>
				        <th width=150px>GAJI HARIAN</th>
            				<th width=150px>GAJI BORONGAN</th>
            				<th width=180px>TOTAL GAJI</th>
				        <th width=200px>KELOLA</th>
				</tr>
		";
		$no=1;
		WHILE($no<=31){
		        
			$datq=mysql_query("SELECT*FROM hrd_staff_absen WHERE status like '1' AND tanggal like '$no' AND bulan like '$bulan' AND tahun like '$tahun' ORDER By id Desc");
			$datasum=mysql_num_rows($datq);
			$gajiharian=0;$gajiborongan=0;
			WHILE($data=mysql_fetch_array($datq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
				if($karyawan['jobstatus']=="1"){
				        $gajiharian=$gajiharian+$data['gaji'];
				}elseif($karyawan['jobstatus']=="2"){
                                        $gajiborongan=$gajiborongan+$data['gaji'];
				}
			}
			$gaji=$gajiharian+$gajiborongan;
			echo"
				<tr>
				        <td align=right>$no $bulannama $tahun</td>
				        <td align=right>$datasum orang</td>
				        <td align=right>Rp. $gajiharian,-</td>
				        <td align=right>Rp. $gajiborongan,-</td>
				        <td align=right>Rp. $gaji,-</td>
				        <td align=center>
                                                <a href='#' onclick=post('page/page_hrd_absen','v=autoview&tanggal=$no&bulan=$bulan&tahun=$tahun','listabsen');>Detil</a> |
						<a href='creator/hrd_absen_list_pdf.php?v=listtanggal&tanggal=$no&bulan=$bulan&tahun=$tahun' target=_BLANK>PDF</a> |
						<a href='creator/hrd_absen_list_excel.php?v=listtanggal&tanggal=$no&bulan=$bulan&tahun=$tahun' target=_BLANK>Excel</a>
					</td>
				</tr>
			";$no++;
		}
		echo"
				</table></div>View <a href='javascript:void()'>graph statistic</a>
				</div></form>
		        </div>
		        
		        <div style='height:20px;'></div><form name=form12>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=20% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Statistik Bulanan</a>
			     </td>
		             <td width=400px>
				<select name='tahun' style='width:70'  onchange=post('page/page_hrd_absen','v=laporanbulanan&tahun='+document.form12.tahun.value,'bulanan');>";
				$lang="thn";include("fungsi_nomor.php");
		echo"		</select>
			     </td>
		        </tr>
		        </table>
		        <div id='proses2'>
                                <div id='bulanan'>
				Laporan kehadiran karyawan berdasarkan bulan pada tahun $tahun
				<div id='tableinti1'>
				<table width=100% cellspacing=1 cellpadding=5>
				<tr bgcolor='#5B5B5B'>
				        <th width=150px>BULAN</th>
				        <th width=150px>KARYAWAN</th>
				        <th width=150px>GAJI HARIAN</th>
				        <th width=150px>GAJI BORONGAN</th>
				        <th width=150px>TOTAL GAJI</th>
				        <th width=200px>KELOLA</th>
				</tr>
		";
		$no=1;
		WHILE($no<=12){
		        $bulannama=bulannama($no);
			$datq=mysql_query("SELECT*FROM hrd_staff_absen WHERE status like '1' AND bulan like '$no' AND tahun like '$tahun' ORDER By id Desc");
			$datasum=mysql_num_rows($datq);
			$gajiharian=0;$gajiborongan=0;
			WHILE($data=mysql_fetch_array($datq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
				if($karyawan['jobstatus']=="1"){
				        $gajiharian=$gajiharian+$data['gaji'];
				}elseif($karyawan['jobstatus']=="2"){
                                        $gajiborongan=$gajiborongan+$data['gaji'];
				}
			}
                        $gaji=$gajiharian+$gajiborongan;
			echo"
				<tr>
				        <td align=right>$bulannama $tahun</td>
				        <td align=right>$datasum orang</td>
				        <td align=right>Rp. $gajiharian,-</td>
				        <td align=right>Rp. $gajiborongan,-</td>
				        <td align=right>Rp. $gaji,-</td>
				        <td align=center>
						<a href='#' onclick=post('page/page_hrd_absen','v=laporanharian&bulan=$no&tahun=$tahun','tableinti11');>Detil</a> |
						<a href='#' onclick=post('','','');>PDF</a> |
						<a href='#' onclick=post('','','');>Excel</a>
					</td>
				</tr>
			";$no++;
		}
		echo"
				</table></form></div>View <a href='javascript:void()'>graph statistic</a>
				</div>
		        </div>
		        
		        <div style='height:20px;'></div><form name=form13>
		        <table border=0 width=100% cellspacing=0 cellpadding=0>
		        <tr>
		             <td id='menu_box' width=20% style='border-left:solid 1px rgb(147,151,145)'>
	     			<a href='javascript:void();'><b>Statistik Tahunan</a>
			     </td>
		             <td width=80%>
		                <select name='year' style='width:60'  onchange=post('page/page_hrd_absen','v=laporantahunan&year='+document.form13.year.value,'tahunan');>
		                <option value=5>5</option>
		                <option value=10>10</option>
		                <option value=15>15</option>
		                <option value=20>20</option>
		                <option value=25>25</option>
		                <option value=30>30</option>
		                </select> Tahun Terakhir
			     </td>
		        </tr>
		        </table>
		        <div id='proses2'>
		                <div id='tahunan'>
				Laporan kehadiran karyawan dari tahun ke tahun
				<div id='tableinti1'>
				<table width=100% cellspacing=1 cellpadding=5>
				<tr bgcolor='#5B5B5B'>
				        <th width=80px>YEAR</th>
				        <th width=150px>KARYAWAN</th>
				        <th width=150px>GAJI HARIAN</th>
				        <th width=150px>GAJI BORONGAN</th>
				        <th width=150px>TOTAL GAJI</th>
				        <th width=200px>KELOLA</th>
				</tr>
		";
		$no=1;$year=$tahun;
		WHILE($no<=10){
		        $bulannama=bulannama($no);
			$datq=mysql_query("SELECT*FROM hrd_staff_absen WHERE status like '1' AND  tahun like '$year' ORDER By id Desc");
			$datasum=mysql_num_rows($datq);
			$gajiharian=0;$gajiborongan=0;
			WHILE($data=mysql_fetch_array($datq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
				if($karyawan['jobstatus']=="1"){
				        $gajiharian=$gajiharian+$data['gaji'];
				}elseif($karyawan['jobstatus']=="2"){
                                        $gajiborongan=$gajiborongan+$data['gaji'];
				}
			}$gaji=$gajiharian+$gajiborongan;

			echo"
				<tr>
				        <td align=center>$year</td>
				        <td align=right>$datasum orang</td>
				        <td align=right>Rp. $gajiharian,-</td>
				        <td align=right>Rp. $gajiborongan,-</td>
				        <td align=right>Rp. $gaji,-</td>
				        <td align=center>Detil | PDF | Excel</td>
				</tr>
			";$no++;$year--;
		}
		echo"
				</table></form></div>View <a href='javascript:void()'>graph statistic</a>
			</div>
		        </div>
		";
	break;
	
	case"laporanharian":
		$tanggali=$_POST['tanggal'];
		$bulani=$_POST['bulan'];
		$tahuni=$_POST['tahun'];
		$bulannama=bulannama($bulani);
		echo"
		        Laporan kehadiran karyawan berdasarkan tanggal pada bulan $bulannama
				<div id='tableinti1'>
				<table width=100% cellspacing=1 cellpadding=5>
				<tr bgcolor='#5B5B5B'>
				        <th width=150px>TANGGAL</th>
				        <th width=150px>KARYAWAN</th>
				        <th width=200px>GAJI HARIAN</th>
				        <th width=200px>GAJI BORONGAN</th>
				        <th width=150px>TOTAL GAJI</th>
				        <th width=200px>KELOLA</th>
				</tr>
		";
		$no=1;
		WHILE($no<=31){
  			$datq=mysql_query("SELECT*FROM hrd_staff_absen WHERE status like '1' AND tanggal like '$no' AND bulan like '$bulani' AND tahun like '$tahuni' ORDER By id Desc");
			$datasum=mysql_num_rows($datq);
			$gajiharian=0;$gajiborongan=0;
			WHILE($data=mysql_fetch_array($datq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
				if($karyawan['jobstatus']=="1"){
				        $gajiharian=$gajiharian+$data['gaji'];
				}elseif($karyawan['jobstatus']=="2"){
                                        $gajiborongan=$gajiborongan+$data['gaji'];
				}
			}
                        $gaji=$gajiharian+$gajiborongan;
			echo"
				<tr>
				        <td align=right>$no $bulannama $tahuni</td>
				        <td align=right>$datasum orang</td>
				        <td align=right>Rp. $gajiharian,-</td>
				        <td align=right>Rp. $gajiborongan,-</td>
				        <td align=right>Rp. $gaji,-</td>
				        <td align=center>
                                                <a href='#' onclick=post('page/page_hrd_absen','v=autoview&tanggal=$no&bulan=$bulani&tahun=$tahun','listabsen');>Detil</a> |
						<a href='creator/hrd_absen_list_pdf.php?v=listtanggal&tanggal=$no&bulan=$bulani&tahun=$tahun' target=_BLANK>PDF</a> |
						<a href='creator/hrd_absen_list_excel.php?v=listtanggal&tanggal=$no&bulan=$bulani&tahun=$tahun' target=_BLANK>Excel</a>
					</td>
				</tr>
			";$no++;
		}
		echo"
				</table></div>View <a href='javascript:void()'>graph statistic</a>
		";
	break;
	
	case"laporanbulanan":
	        $tahuni=$_POST['tahun'];
	        echo"
                        Laporan kehadiran karyawan berdasarkan bulan pada tahun $tahuni
				<div id='tableinti1'>
				<table width=100% cellspacing=1 cellpadding=5>
				<tr bgcolor='#5B5B5B'>
				        <th width=150px>BULAN</th>
				        <th width=150px>KARYAWAN</th>
				        <th width=200px>GAJI HARIAN</th>
				        <th width=200px>GAJI BORONGAN</th>
				        <th width=150px>TOTAL GAJI</th>
				        <th width=200px>KELOLA</th>
				</tr>
		";
		$no=1;
		WHILE($no<=12){
		        $bulannama=bulannama($no);
			$datq=mysql_query("SELECT*FROM hrd_staff_absen WHERE status like '1' AND bulan like '$no' AND tahun like '$tahuni' ORDER By id Desc");
			$datasum=mysql_num_rows($datq);
			$gajiharian=0;$gajiborongan=0;
			WHILE($data=mysql_fetch_array($datq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
				if($karyawan['jobstatus']=="1"){
				        $gajiharian=$gajiharian+$data['gaji'];
				}elseif($karyawan['jobstatus']=="2"){
                                        $gajiborongan=$gajiborongan+$data['gaji'];
				}
			}
                        $gaji=$gajiharian+$gajiborongan;
			echo"
				<tr>
				        <td align=right>$bulannama $tahuni</td>
				        <td align=right>$datasum orang</td>
				        <td align=right>Rp. $gajiharian,-</td>
				        <td align=right>Rp. $gajiborongan,-</td>
				        <td align=right>Rp. $gaji,-</td>
				        <td align=center>Detil | PDF | Excel</td>
				</tr>
			";$no++;
		}
		echo"
				</table></form></div>View <a href='javascript:void()'>graph statistic</a>
		";
	break;
	
	case"laporantahunan":
	        $lama=$_POST['year'];
		echo"       Laporan kehadiran karyawan dari tahun ke tahun.
				<div id='tableinti1'>
				<table width=100% cellspacing=1 cellpadding=5>
				<tr bgcolor='#5B5B5B'>
				        <th width=80px>YEAR</th>
				        <th width=150px>KARYAWAN</th>
				        <th width=200px>GAJI HARIAN</th>
				        <th width=200px>GAJI BORONGAN</th>
				        <th width=150px>TOTAL GAJI</th>
				        <th width=200px>KELOLA</th>
				</tr>
		";
		$no=1;$year=$tahun;
		WHILE($no<=$lama){
		        $bulannama=bulannama($no);
			$datq=mysql_query("SELECT*FROM hrd_staff_absen WHERE status like '1' AND  tahun like '$year' ORDER By id Desc");
			$datasum=mysql_num_rows($datq);
			$gajiharian=0;$gajiborongan=0;
			WHILE($data=mysql_fetch_array($datq)){
			        $karyawan=mysql_fetch_array(mysql_query("SELECT*FROM hrd_staff_data WHERE id like '$data[idstaff]' LIMIT 0,1"));
				if($karyawan['jobstatus']=="1"){
				        $gajiharian=$gajiharian+$data['gaji'];
				}elseif($karyawan['jobstatus']=="2"){
                                        $gajiborongan=$gajiborongan+$data['gaji'];
				}
			}
                        $gaji=$gajiharian+$gajiborongan;
			echo"
				<tr>
				        <td align=center>$year</td>
				        <td align=right>$datasum orang</td>
				        <td align=right>Rp. $gajiharian,-</td>
				        <td align=right>Rp. $gajiborongan,-</td>
				        <td align=right>Rp. $gaji,-</td>
				        <td align=center>Detil | PDF | Excel</td>
				</tr>
			";$no++;$year--;
		}
		echo"
				</table></form></div>View <a href='javascript:void()' onclick=post('page/page_hrd_absen','v=grafik1','detail')>graph statistic</a>
			</div><div id=detail></div>
		        </div>
		";
	break;
	
	case"grafik1":
	        $tanggalan=$_POST['tanggal'];
	        $bulanan=$_POST['bulan'];
	        $tahunan=$_POST['tahun'];
	        echo"
                        <div style='position:fixed; left:0%; top:10%; width:100%' align=center >
			<div style='padding:5 10 5 10;width:500px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b><a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=post('page/page_hrd_absen','v=vv','detail');>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Absensi</b> | $data[tanggal]$data[bulan]$data[tahun] : NIK $data[nik]</div>
			<div style='padding:10 10 10 10;width:500px;border:solid 1px #6F0000;background:white'>
			<div id=inti></div>
			<div id=link>
				<a href='javascript:void()' onclick=post('page/page_hrd_absen','v=vv','inti');>Kehadiran Karyawan</a>&nbsp;&nbsp;
			</div>&nbsp;
			</div>
		";
	break;
}
?>
