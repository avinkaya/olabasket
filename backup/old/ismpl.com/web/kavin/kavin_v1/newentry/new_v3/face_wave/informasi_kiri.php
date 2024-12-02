<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$group_query=mysql_query("SELECT*FROM v1_informasi_group WHERE status like 'tampil' Order By id LIMIT 0,3",$sambungan);
while($gr=mysql_fetch_array($group_query)){
        $gr['nama']=potong($gr['nama'],23);
        echo"<div id='metitle'><b> $gr[nama]</b></div>";        
        $kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori WHERE status like 'tampil' AND id_group like '$gr[id]'Order By id ",$sambungan);
        $banyak_kt=mysql_num_rows($kategori_query);
        if($banyak_kt==0){echo"<div id='memenu'>Belum ada data ..</div>";}else{
                while($kt=mysql_fetch_array($kategori_query)){
                echo"<div id='memenu' >
                        <a href='javascript:void()' onclick=menu('face_wave/informasi_array','".md5("id_data")."=$kt[id]','inti')>
                        <img src='gambar/icon-age.png' width=10px align=middle> $kt[nama]</a></div>";
        }}

echo"<div id='memenu'></div>";
}


?>
