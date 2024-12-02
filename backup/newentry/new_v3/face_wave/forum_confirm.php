<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case md5("tampilkan"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat menampilkan pesan ini.");}
        else{
                $lapor=mysql_query("UPDATE v1_forum SET status='Tampil' WHERE id like '$id_data'",$sambungan);
                if($lapor){pesan("Pesan telah ditampilkan.");}
                else{pesan("Pesan gagal di tampilkan.");}
        }
break;

case md5("hapus"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat dihapus pesan ini.");}
        else{
                $lapor=mysql_query("UPDATE v1_forum SET status='Hapus' WHERE id like '$id_data'",$sambungan);
                if($lapor){pesan("Pesan telah dihapus.");}
                else{pesan("Pesan gagal di hapus.");}
        }
break;
}

echo"
<div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Pesan Baru</b></div>
<div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
Silahkan cermati isi pesan dari pengunjung, jika terdapat pesan yang tidak layak untuk ditampilkan silahkan hapus pesan tersebut. sebaliknya jika 
anda merasa pesan tersebut layak silahkan tampilkan pesan tersebut.
</div><div style='height:30px'></div>
";

$pesan_query=mysql_query("SELECT*FROM v1_forum WHERE tujuan like '0' AND status like 'Confirm' ORDER BY id Desc",$sambungan);
while($pesan=mysql_fetch_array($pesan_query)){
if($pesan['wewenang']=="Tamu"){
        $img="blank.png";
        $pesan['dari']=$pesan['dari'];
}else{
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$pesan[dari]'",$sambungan));
        $img=$user['avatar'];
        $pesan['dari']=$user['nama'];
}
      
        echo"
                <div style='border-top:solid 1px #eaeaea;padding:5 5 5 5;'>
                <table border=0 width=100%>
                <tr valign=top>
                        <td width=40px><img src='foto_user/$img' width=40px border=0></td>
                        <td style='font-size:11px;padding:0 0 0 10'>
                                <b style='font-size:12px;color:blue'>$pesan[dari]</b> $pesan[pesan]
                                <br><br><i>$pesan[hari], $pesan[tanggal]/$pesan[bulan]/$pesan[tahun] pukul $pesan[jam] ~ 
                                <a href='?".md5("page_halaman")."=".md5("forum_confirm")."&&".md5("proses")."=".md5("tampilkan")."&&".md5("id_data")."=$pesan[id]'>Tampilkan</a> ~ 
                                <a href='?".md5("page_halaman")."=".md5("forum_confirm")."&&".md5("proses")."=".md5("hapus")."&&".md5("id_data")."=$pesan[id]'>Hapus</a>
                                </i>
                                <div style='height:5px'></div>
        ";
        
        
        
        
        
        
        
        
        // ---------------------------- komentar -----------------------------------------
        $komentar_query=mysql_query("SELECT*FROM v1_reforum WHERE id_pesan like '$pesan[id]' AND status like 'Tampil' ORDER BY id",$sambungan);
        $sum_koment=mysql_num_rows($komentar_query);
        if($sum_koment!=0){
        echo"<div style='padding:10 5 10 5;background:#fafafa'>Komentar : <b style='color:red'>$sum_koment</b> mengomentari</div>";
        while($komentar=mysql_fetch_array($komentar_query)){
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$komentar[dari]'",$sambungan));
        $img=$user['avatar'];
        echo"
                                <div style='height:2px'></div>
                                <div style='padding:5 5 5 5;background:#fafafa'>
                                        <table border=0 width=100%>
                                        <tr valign=top>
                                                <td width=40px><img src='foto_user/$img' width=40px border=0></td>
                                                <td style='font-size:11px;padding:0 0 0 10'>
                                                        <b style='font-size:12px;color:blue'>$user[nama]</b> 
                                                        $komentar[pesan]
                                                        <br><br><i>$komentar[hari], $komentar[tanggal]/$komentar[bulan]/$komentar[tahun] pukul $komentar[jam]</i>
                                                </td>
                                        </tr>
                                        </table>
                                </div>
        ";}}
         echo"                       $form_komentar
                        </td>
                </tr>
                </table>
                </div><div style='height:10px'></div>
        ";
}
?>
