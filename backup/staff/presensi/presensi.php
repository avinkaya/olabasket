<?php
include("../page/dbase_conection.php");
$nik=$_GET['nik'];
$filename = $nik."_".date('YmdHisa').'.jpg';
$result = file_put_contents( $filename, file_get_contents('php://input') );
$url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/' . $filename;
$jam=date("H");
$menit=date("i");
$detik=date("s");
$tanggal=date("d");
$bulan=date('m');
$tahun=date("Y");
$ip=$_SERVER['REMOTE_ADDR'];
$host=gethostbyaddr($_SERVER['REMOTE_ADDR']);
function num($d){
    if(strlen($d)==1){$hasil="0$d";}
    elseif(strlen($d)==2){$hasil="$d";}
    return $hasil;
}
function hari(){
	$input=date('D');
	if($input=='Sun'){$output='Minggu';}
	if($input=='Mon'){$output='Senin';}
	if($input=='Tue'){$output='Selasa';}
	if($input=='Wed'){$output='Rabu';}
	if($input=='Thu'){$output='Kamis';}
	if($input=='Fri'){$output='Jumat';}
	if($input=='Sat'){$output='Sabtu';}
	return $output;
}
$hari=hari();
if ($result){
	$qsearch=mysql_query("SELECT * FROM hrd_staff_data WHERE nik like $nik AND status like '1'");
	$check=mysql_num_rows($qsearch);
	if($check=="0"){echo"Gagal|NIK $nik tidak terdaftar sebagai karyawan PT Mulia Impex";}
	else{
		$data=mysql_fetch_array($qsearch);
		$filter1q=mysql_query("SELECT * FROM hrd_staff_absen WHERE nik like $nik AND hari like '$hari' AND tanggal like $tanggal AND bulan like $bulan AND tahun like $tahun AND status like 1");
		$filter1=mysql_num_rows($filter1q);
		if($filter1!="0"){
		        $filter=mysql_fetch_array($filter1q);
		        if($filter['statusabsen']=="2"){echo"Gagal| Anda telah melakukan absensi sebelumnya";}
		        elseif($filter['statusabsen']=="1"){
		        
		        
		                $filter['menitmasuk']=num($filter['menitmasuk']);
		                $sumjmasuk="$filter[jammasuk]$filter[menitmasuk]";
		                $menitkeluar=num($menit);
		                $sumjkeluar="$jam$menitkeluar";
		                $jamsum=$sumjkeluar - $sumjmasuk;
				$jamlembur=$jamsum-800;
				$pengalilembur=$jamlembur/100;
				$sisabagi=$jamlembur % 100;
				$umk=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '1'"));
		                $ums=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '2'"));
		                $uml1=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '3'"));
		                $uml2=mysql_fetch_array(mysql_query("SELECT*FROM hrd_standar_gaji WHERE id like '4'"));

				if($jamsum>=800){
					if($filter['idsubbagian']==60){
						$uangmakan=$ums['harga'];
					}elseif($filter['idsubbagian']!=60){
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
				$uangkerja=$filter['jobstatus'];
				if($filter['jobstatus']==2){
				        $uangkerja="$filter[jobstatus]";
				}else if($filter['jobstatus']==1){
					if($jamsum>=800){$uangkerja=2000;}else{$uangkerja=0.5*$filter['jobgajiharian'];}
				}$gaji=$uangmakan+$uanglembur+$uangkerja;
                                
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
		        
                                $save=mysql_query("UPDATE hrd_staff_absen SET jamkeluar='$jam',menitkeluar='$menit',detikkeluar='$detik',statusabsen='2',uangmakan='$uangmakan',uanglembur='$uanglembur',uangkerja='$uangkerja',gaji='$gaji' WHERE nik like $nik AND hari like '$hari' AND tanggal like $tanggal AND bulan like $bulan AND tahun like $tahun AND status like 1");
	        		if(!$save){
                                	echo"Gagal| Anda gagal melakukan presensi pulang silahkan coba kembali!";
		        	}else{
		                        $jobbagian=mysql_fetch_array(mysql_query("SELECT bagian FROM hrd_staff_jobbagian WHERE id like $data[jobbagian]"));
					$jobsubbagian=mysql_fetch_array(mysql_query("SELECT subbagian FROM hrd_staff_jobsubbagian WHERE id like $data[jobsubbagian]"));
					echo"pulang|$data[nama]|$data[nik]|$jobbagian[bagian]|$jobsubbagian[subbagian]|$filter[jammasuk]:$filter[menitmasuk]:$filter[detikmasuk] WIB|$jam:$menit:$detik WIB";
				}
			}else{echo"Gagal| Anda telah melakukan absensi sebelumnya";}
		}
		else{
		        $add=mysql_query("INSERT INTO hrd_staff_absen VALUE ('','0','$nik','$data[id]','$hari','$tanggal','$bulan','$tahun','$jam','$menit','$detik','','','','','','','','','','','1','0','$hari','$tanggal','$bulan','$tahun','$ip','$host','$jam:$menit:$detik','1','$filename')");
	        	if(!$add){
                                echo"Gagal| Anda gagal melakukan presensi silahkan coba kembali!";
	        	}else{
	                        $jobbagian=mysql_fetch_array(mysql_query("SELECT bagian FROM hrd_staff_jobbagian WHERE id like $data[jobbagian]"));
				$jobsubbagian=mysql_fetch_array(mysql_query("SELECT subbagian FROM hrd_staff_jobsubbagian WHERE id like $data[jobsubbagian]"));
				echo"masuk|$data[nama]|$data[nik]|$jobbagian[bagian]|$jobsubbagian[subbagian]|$jam:$menit:$detik WIB|00:00:00 WIB";
			}
		}
	}
}else{echo"Gagal | Sorry coult't support your browser, please download java browser.";}


?>
