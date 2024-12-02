<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$halaman_setup=mysql_fetch_array(mysql_query("SELECT*FROM v1_halaman_setup WHERE id like '1'",$sambungan));
$halaman_query=mysql_query("SELECT*FROM v1_halaman WHERE status like 'Tampil' ORDER By id $halaman_setup[mode_urutan] LIMIT $halaman_setup[min_tampil],$halaman_setup[max_tampil]",$sambungan);
$halaman_sum=mysql_num_rows($halaman_query);
if($halaman_sum!=0){
echo"
        <div id='metitle'><b> $halaman_setup[title]</b></div>
        <div  id='link_menu'>
";

while($halaman_link=mysql_fetch_array($halaman_query)){
$halaman_link['judul']=potong($halaman_link['judul'],25);       
echo"
	<div id='memenu'>
	<a href='?".md5("page_halaman")."=".md5("halaman_view")."&&".md5("id_data")."=$halaman_link[id]'><img src='gambar/icon-age.png' border=0 width=10px align=middle> $halaman_link[judul]</a></div>	
";
}

echo"<div id='memenu'></div>";
}
?>
