<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
// PLAYLIST ---------------- video -----------------------
$video_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'video' ORDER By Rand() LIMIT 0,20",$sambungan);
$banyak_video=mysql_num_rows($video_query);

echo"
        <table border=0 width=100% cellspacing=2 cellpadding=0>
        <tr valign=top><td width=50%>
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>Video Playlist</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left><ol>";

if($banyak_video!=0){
while($video=mysql_fetch_array($video_query)){
        $video['judul']=strtolower($video['judul']);
        echo"<li><a href='javascript:void()' onclick=menu('face_wave/streaming','".md5("id_data")."=$video[id]','player')><b>$video[judul]</a></b> <small><i style='color:#aaaaaa'>| oleh $video[user]</i></small></li>";
}}

echo"          </ol></div></td><td width=50%>      
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>Video Playlist</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left><ol>";

$video_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'video' ORDER By Rand() LIMIT 0,20",$sambungan);
$banyak_video=mysql_num_rows($video_query);
if($banyak_video!=0){
while($video=mysql_fetch_array($video_query)){
        $video['judul']=strtolower($video['judul']);
        echo"<li><a href='javascript:void()' onclick=menu('face_wave/streaming','".md5("id_data")."=$video[id]','player')><b>$video[judul]</a></b> <small><i style='color:#aaaaaa'>| oleh $video[user]</i></small></li>";
}}

echo"          </ol></div>
                
        </td></tr></table>
";
?>
