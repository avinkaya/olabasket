<?php
define ('www.kampungbudaya.co.cc_expresso',1);
include("../TuneUp/dbase_conection.php");
include("fungsi.php");

$id_data=$_GET[md5("id_data")];
if($id_data=="0"){
        $tag_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'Video' or mode like 'MP3' ORDER By Rand() LIMIT 0,1",$sambungan);
}else{
        $tag_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND id like '$id_data' ORDER By Rand() LIMIT 0,1",$sambungan);
}

$banyak=mysql_num_rows($tag_query);
if($banyak!=0){

while($tag=mysql_fetch_array($tag_query)){
$tag['judul']=potong($tag['judul'],40);
mysql_query("INSERT INTO v1_tag_count VALUE ('','$tag[id]','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','Tampil')",$sambungan);
$jumlah=mysql_num_rows(mysql_query("SELECT*FROM v1_tag_count WHERE id_tag like '$tag[id]'",$sambungan));
mysql_query("UPDATE v1_tag SET count='$jumlah' WHERE id like '$tag[id]'",$sambungan);


switch($tag['mode']){
case "Video":
        echo"
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>Video : <b>$tag[judul]</b><i> ~ by $tag[user]</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;background:#eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;' align=left>
                <embed src=tag/Video/flvplayer.swf bgcolor=#f39948 allowscriptaccess=always allowfullscreen=true flashvars=file=$tag[url]&amp;autostart=true&amp;fullscreen=true&amp;stretching=fill&logo=icon/imovie.png height=400px width=464px>
        ";
break;
case "MP3":
        echo"
                <div style='padding:7 10 6 10;font-size:13px;background-image: url(gambar/bg_title.jpg);border:solid 1px #eeeeee;' align=left>MP3 : <b>$tag[judul]</b><i> ~ by $tag[user]</i></div>
                <div style='padding:2 2 2 2;border-left:solid 1px #eeeeee;border-right:solid 1px #eeeeee;border-bottom:solid 1px #eeeeee;font-size:12px;background:#eeeeee' align=left>
                <object type='application/x-shockwave-flash' data='tag/Video/mp3player.swf' id='audioplayer1' height='40' width='464'>
                        <param name='FlashVars' value='autostart=yes&amp;playerID=1&amp;bg=0xCDDFF3&amp;leftbg=0x357DCE&amp;lefticon=0xF2F2F2&amp;rightbg=0x357DCE&amp;rightbghover=0x6797CC&amp;righticon=0xF2F2F2&amp;righticonhover=0xF2F2F2&amp;text=0x357DCE&amp;slider=0x357DCE&amp;track=0xFFFFFF&amp;loader=0x72A4DD&amp;border=0xFFFFFF&amp;soundFile=$tag[url]'>
                        <param name='quality' value='high'>
                        <param name='menu' value='true'>
                        <param name='wmode' value='transparent'>
                        </object>
        ";
break;

}
echo"
        </div><div style='height:10px' ></div>
        <div align=left>
        <b>$tag[user]</b> $tag[ket]
        </div><div style='height:50px;border-bottom:solid 1px #eeeeee;padding:10 0 10 0' align=left>
                <i>dilihat : $jumlah kali ~ uploaded : $tag[hari], $tag[tanggal]/$tag[bulan]/$tag[tahun] ~ 
                        <a href='javascript:void()' onclick=menu('face_wave/streaming_komentar','".md5("id_data")."=$tag[id]','komentar')>komentari</a> ~ 
                        <a href='javascript:void()' onclick=menu('face_wave/streaming_melapor','".md5("id_data")."=$tag[id]','komentar')>laporkan</a>
                </i><br><br>
                <a href='$tag[url]' target=_blank><img src='gambar/download.jpg' width=150px border=0 align=left></a>&nbsp;&nbsp;
                <input type=text value='<a href=http://lordnet-bisnis1.comule.com/client_2/?".md5("page_halaman")."=".md5("tag_video_view")."&&".md5("id_data")."=$tag[id]>$tag[judul]</a>' style='padding:5 5 5 5;width:300px'>
        </div>

";
}}

?>

