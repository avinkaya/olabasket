<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"<div style='height:15px'></div>";

$kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori WHERE status like 'tampil' AND home like 'Tampilkan' ORDER By Rand()",$sambungan);
$swf=1;

while($kat=mysql_fetch_array($kategori_query)){
$chnum=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Tampilkan' AND id_kategori like '$kat[id]'",$sambungan));
if($chnum==0){}
else{
if($swf>=4){}
else{
        echo"	<div align=left>
			<table border=0 width=100% cellspacing=0 cellpadding=0>
				<tr valign=top>
					<td style=''><img src='gambar/h0.gif' height=30px></td>
					<td style='width:420px;background-image:url(gambar/h1.gif);color:green;padding:5 0 5 10;font-size:15px'>
						<a href='javascript:void()' onclick=menu('face_wave/informasi_array','".md5("id_data")."=$kat[id]','inti')>
						<b style='font-size:13px'>$kat[nama]</b></a></td>
					<td style=''><img src='gambar/h2.gif' height=30px></td>
				</tr>
			</table>
			</div><div style='border:solid 1px green;padding:5 5 5 5;width:474px' id=tdhover>
            <table border=0 width=100% cellspacing=3 cellpadding=0>
            <tr valign=top>
                <td width=50% >
            ";$no=1;
        $informasi_query=mysql_query("SELECT*FROM v1_informasi_berita WHERE status like 'Tampilkan' AND id_kategori like '$kat[id]' ORDER By id Desc LIMIT 0,6",$sambungan);
        while($informasi=mysql_fetch_array($informasi_query)){
                $informasi['isi']=strtolower(potong(form($informasi['isi']),100));
                $informasi['judul']=ucwords(strtoupper(potong($informasi['judul'],65)));
                $banyak=mysql_num_rows(mysql_query("SELECT*FROM v1_informasi_count WHERE id_informasi like '$informasi[id]'",$sambungan));
                $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$informasi[id_user]'",$sambungan));
                $img=$user['avatar'];
                echo"
                    <table border=0 width=100% cellspacing=0 cellpadding=0>
                    <tr valign=top>
                        <td width=80px>
                            <img src='img_data/informasi/$informasi[avatar]' width=80px style='border:solid 2px white'>
                        </td>
                        <td align=left style='color:black;font-size:11px;font-family:arial;padding:0 0 0 7'>
                        <b><a href='javascript:void()' onclick=menu('face_wave/informasi_view','".md5("id_data")."=$informasi[id]','inti') style='color:#800606;font-size:13px'>$informasi[judul]</a></b><br>
<b style='font-size:15px;color:blue'>Rp. $informasi[harga],-</b><br>

$informasi[isi]
                    </td></tr></table>
				    <div style='height:10px;'></div>		
                ";
                
                if($no==2){echo"</td></tr><tr valign=top><td width=50%>";}
                else{echo"</td><td width=50%>";}
                if($no<=1){
                    $no++;
                }else{$no=1;}
        }echo"
            </td>
            </tr></table>
        </div><div style='height:5px'></div>";
}$swf++;}
}


?>

