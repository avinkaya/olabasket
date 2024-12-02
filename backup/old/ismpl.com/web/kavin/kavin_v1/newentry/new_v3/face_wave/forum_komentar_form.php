<?php
session_start();
define ('www.kampungbudaya.co.cc_expresso',1);
include("log_data.php");
include("fungsi.php");
include("../TuneUp/dbase_conection.php");
if($_GET[md5("id_data")]!=""){$id_data=$_GET[md5("id_data")];}
elseif($_POST['id_data']!=""){$id_data=$_POST['id_data'];}


echo"
<div style='height:2px'></div>
<div style='padding:5 5 5 5;background:#fafafa'>
<table border=0>
        <tr><td>
                <form name='form_$id_data' method=post>
               <textarea name='input' style='padding:5 5 5 5;width:300px;height:40px;background:white'></textarea>
        </td><td>
               <input type=button onclick=posting_var('face_wave/forum_komentar','id_data=$id_data&proses=tambah_komentar&komentar='+document.form_$id_data.input.value,'komentar$id_data') value='Kirim' style='padding:7 5 7 5;width:70px;height:40px'>
</form></td>
</tr></table>
</div>
";

?>
