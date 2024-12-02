<?php
include("../../../src/koneksi_database2.php");
$namaTabel = "pemira_suara";
 $query = "SELECT suara, COUNT(id) FROM pemira_suara WHERE sebagai LIKE '10' GROUP BY suara";
$result = mysql_query($query) or die(mysql_error());
$qcek=mysql_query("SELECT * FROM pemira_suara") ;
$cek=mysql_fetch_array($qcek);
//$no=$cek['3'];
$jumField = mysql_num_fields($result);

$abs=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM pemira_user WHERE status LIKE'0'"));
$abs2=$abs['COUNT(id)'];
$plh=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM pemira_user WHERE status LIKE'1'"));
$plh2=$plh['COUNT(id)'];
$all=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM pemira_user "));
$all2=$all['COUNT(id)'];
$sbg=mysql_fetch_array(mysql_query("SELECT COUNT(id) FROM pemira_suara WHERE sebagai LIKE '10' "));
$sbg2=$sbg['COUNT(id)'];
echo "<.'xml Chart><br>";
echo "< use value= $plh2><br>< abs value= $abs2><br>< total value= $all2><br>";

while ($row = mysql_fetch_array($result)) {

$no=$row['suara'];
$qcek_nama=mysql_query("SELECT * FROM pemira_calon WHERE no_urut LIKE '$no'") ;
$cek_nama=mysql_fetch_array($qcek_nama);
$nama=$cek_nama['no_urut'];
$suara= $nama;
//print_r($row);
$hitung= $row['COUNT(id)'];
$namaField = mysql_field_name($result, $i);

echo "< number= $suara ,value= $hitung > <br>";

}
echo "<'total =$sbg2><br>";
echo"<.'/xml>";

?>