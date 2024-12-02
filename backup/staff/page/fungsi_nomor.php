<?php

$jam=date("h : i a");
$tanggal=date("d");
$bulan=date('m');
$tahun=date("Y");
switch($lang){
case"":
        switch($_POST['lang']){
           case"jobsubbagian":
               include("dbase_conection.php");
               $idbagian=$_POST['idbagian'];
	           $query_jobstatus=mysql_query("SELECT*FROM hrd_staff_jobsubbagian WHERE idbagian like '$idbagian'");
	           while($data_jobstatus=mysql_fetch_array($query_jobstatus)){echo"<option value='$data_jobstatus[id]'>$data_jobstatus[subbagian]</option>";}
	       break;
           case"jobsubsubbagian":
           	include("dbase_conection.php");
               	   $idsubbagian=$_POST['idsubbagian'];
	           $query_jobstatus=mysql_query("SELECT*FROM hrd_staff_jobsubsubbagian WHERE idsubbagian like '$idsubbagian'");
		   $num=mysql_num_rows($query_jobstatus);
		   if($num==0){echo"<option value='0'>Abaikan form ini</option>";}
		   else{
		   	while($data_jobstatus=mysql_fetch_array($query_jobstatus)){echo"<option value='$data_jobstatus[id]'>$data_jobstatus[subsubbagian]</option>";}
		   }
	       break;
        }	
break;
case"tgl":
	        $ttgl=1;
	        while($ttgl<=31){echo"<option value='$ttgl'>$ttgl</option>";$ttgl++;}
break;
case"bln":
	        echo"
			<option value='1'>Januari</option>
			<option value='2'>Februari</option>
			<option value='3'>Maret</option>
			<option value='4'>April</option>
			<option value='5'>Mei</option>
			<option value='6'>Juni</option>
			<option value='7'>Juli</option>
			<option value='8'>Agustus</option>
			<option value='9'>September</option>
			<option value='10'>Oktober</option>
			<option value='11'>November</option>
			<option value='12'>Desember</option>
		";
	break;
	case"thn":
	        $tthn=$tahun;
	        while($tthn>=1980){echo"<option value='$tthn'>$tthn</option>";$tthn--;}
	break;
	case"provinsi":
	        $queryprov=mysql_query("SELECT*FROM hrd_provinsi");
	        while($dataprov=mysql_fetch_array($queryprov)){echo"<option value='$dataprov[id]'>$dataprov[provinsi]</option>";}
	break;
	case"jobstatus":
	        $query_jobstatus=mysql_query("SELECT*FROM hrd_staff_jobstatus");
	        while($data_jobstatus=mysql_fetch_array($query_jobstatus)){echo"<option value='$data_jobstatus[id]'>$data_jobstatus[status]</option>";}
	break;
	case"jobbagian":
	        $query_jobstatus=mysql_query("SELECT*FROM hrd_staff_jobbagian");
	        while($data_jobstatus=mysql_fetch_array($query_jobstatus)){echo"<option value='$data_jobstatus[id]'>$data_jobstatus[bagian]</option>";}
	break;
}
?>
