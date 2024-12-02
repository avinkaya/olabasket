<?php
include("../TuneUp/dbase_conection.php");
$id=$_GET["id"];
if($id!=""){
        $data=mysql_fetch_array(mysql_query("SELECT avatar FROM v1_informasi_berita WHERE id like '$id_data'",$sambungan));
	echo"
	                <div style='position:fixed; left:0%; top:5%; width:100%' align=center >
			<div style='padding:5 10 5 10;width:700px;border:solid 1px #6F0000;background:#6F0000;color:white'align=left><b>
			<a href='javascript:void();' style='text-decoration:none;color:yellow' onclick=menu('face_wave/informasi_berita_photo','id=','photo');>[ close ]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zoom Picture</b> </div>
			<div style='padding:10 10 10 10;width:700px;border:solid 1px #6F0000;background:white' align=center>
			      <img src='img_data/informasi/$data[avatar]' height=250px>$data[avatar]
			</div>
		";
}else{echo"bb";}echo"aa";
?>
