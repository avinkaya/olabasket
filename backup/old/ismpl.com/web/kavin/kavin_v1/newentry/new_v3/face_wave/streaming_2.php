<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
// PLAYLIST ---------------- mp3 -----------------------
$mp3_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'MP3' ORDER By Rand() LIMIT 0,20",$sambungan);
$banyak_mp3=mysql_num_rows($mp3_query);

echo"
        <table border=0 width=100% cellspacing=2 cellpadding=0>
        <tr valign=top><td width=50%>
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>MP3 Playlist</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left><ol>";

if($banyak_mp3!=0){
while($mp3=mysql_fetch_array($mp3_query)){
        $mp3['judul']=strtolower($mp3['judul']);
        echo"<li><a href='javascript:void()' onclick=menu('face_wave/streaming','".md5("id_data")."=$mp3[id]','player')><b>$mp3[judul]</a></b> <small><i style='color:#aaaaaa'>| oleh $mp3[user]</i></small></li>";
}}

echo"          </ol></div></td><td width=50%>      
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>MP3 Playlist</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left><ol>";

$mp3_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'MP3' ORDER By Rand() LIMIT 0,20",$sambungan);
$banyak_mp3=mysql_num_rows($mp3_query);
if($banyak_mp3!=0){
while($mp3=mysql_fetch_array($mp3_query)){
        $mp3['judul']=strtolower($mp3['judul']);
        echo"<li><a href='javascript:void()' onclick=menu('face_wave/streaming','".md5("id_data")."=$mp3[id]','player')><b>$mp3[judul]</a></b> <small><i style='color:#aaaaaa'>| oleh $mp3[user]</i></small></li>";
}}

echo"          </ol></div>
                
        </td></tr></table>
";
?>
