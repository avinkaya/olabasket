<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
include("fungsi.php");
?>

<table width=100%>
<tr valign=top>
        <td>
                <form name="form_2" onsubmit="posting_var('face_wave/streaming_3','aksi=cari&kunci='+document.form_2.input.value,'komentar'); return false;">
                Kata kunci <input type=text name="input" style="width:300px;padding:10 10 10 10;font-size:11px">
        </td><td>
                <input onclick="posting_var('face_wave/streaming_3','aksi=cari&kunci='+document.form_2.input.value,'komentar')" type="button" value="Cari" style="padding:10 10 10 10;width:100px">
</form></td></tr></table>

<?php
switch ($_POST['aksi']){ 
case "cari":
$kunci=form($_POST['kunci']);
if($kunci!=""){
// PLAYLIST ---------------- mp3 -----------------------
$mp3_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'Video' AND judul like '%$kunci%' ORDER By Rand() ",$sambungan);
$banyak_mp3=mysql_num_rows($mp3_query);

echo"
        <table border=0 width=100% cellspacing=2 cellpadding=0>
        <tr valign=top><td width=50%>
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>Video Searching</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left><ol>";

if($banyak_mp3!=0){
while($mp3=mysql_fetch_array($mp3_query)){
        $mp3['judul']=strtolower($mp3['judul']);
        echo"<li><a href='javascript:void()' onclick=menu('face_wave/streaming','".md5("id_data")."=$mp3[id]','player')><b>$mp3[judul]</a></b> <small><i style='color:#aaaaaa'>| oleh $mp3[user]</i></small></li>";
}}else{
echo"
Tidak terdapat data yang diketemukan.
";
}

echo"          </ol></div></td><td width=50%>      
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>MP3 Searching</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left><ol>";

$mp3_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'MP3'  AND judul like '%$kunci%' ORDER By Rand() ",$sambungan);
$banyak_mp3=mysql_num_rows($mp3_query);
if($banyak_mp3!=0){
while($mp3=mysql_fetch_array($mp3_query)){
        $mp3['judul']=strtolower($mp3['judul']);
        echo"<li><a href='javascript:void()' onclick=menu('face_wave/streaming','".md5("id_data")."=$mp3[id]','player')><b>$mp3[judul]</a></b> <small><i style='color:#aaaaaa'>| oleh $mp3[user]</i></small></li>";
}}else{
echo"
Tidak terdapat data yang diketemukan.
";}echo"</ol></div></td></tr></table>";
}else{
echo"
      <div style='height:2px'></div><div style='border:solid 1px red;background:pink;padding:10 10 10 10;'>Anda belum memasukkan kata kunci.</div><div style='height:2px'></div>
";
}
break;
}
?>
