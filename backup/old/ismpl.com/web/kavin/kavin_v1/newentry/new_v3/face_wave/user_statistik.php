<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Laporan Kunjungan</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Pilih bulan dan tahun untuk melihat statistik kunjungan.<br><br>
                <table border=0 cellspacing=3 cellpadding=2>
                <tr><form method=post action='?".md5("page_halaman")."=".md5("user_statistik")."'>
                        <td>
                                Bulan :<br>
                                <select name='".md5("bulan")."' style='padding:7 7 7 7;width=200px'>
                                        <option value='01'>Januari</option>
                                        <option value='02'>Februari</option>
                                        <option value='03'>Maret</option>
                                        <option value='04'>April</option>
                                        <option value='05'>Mei</option>
                                        <option value='06'>Juni</option>
                                        <option value='07'>Juli</option>
                                        <option value='08'>Agustus</option>
                                        <option value='09'>September</option>
                                        <option value='10'>Oktober</option>
                                        <option value='11'>November</option>
                                        <option value='12'>Desember</option>
                                </select>
                        </td>
                        <td>
                                Tahun :<br>
                                <select name='".md5("tahun")."' style='padding:7 7 7 7;width=200px'>";
                        $tahun_cari=$tahun;
                        while($tahun_cari>=2010){
                                echo"<option value='$tahun_cari'>$tahun_cari</option>";$tahun_cari--;
                        }
      
echo"           </select></td><td><br><input type=submit value='Lihat' style='padding:7 7 7 7;width:70px'></td>
                </tr></table></form>
       </div><div style='height:10px'></div>
";

$bulan_cari=$_POST[md5("bulan")];
$tahun_cari=$_POST[md5("tahun")];
if($bulan_cari=="" or $tahun_cari==""){$bulan_cari=$bulan;$tahun_cari=$tahun;}
switch($bulan_cari){
        case"01":$bulan_cari="1";break;
        case"02":$bulan_cari="2";break;
        case"03":$bulan_cari="3";break;
        case"04":$bulan_cari="4";break;
        case"05":$bulan_cari="5";break;
        case"06":$bulan_cari="6";break;
        case"07":$bulan_cari="7";break;
        case"08":$bulan_cari="8";break;
        case"09":$bulan_cari="9";break;
        case"10":$bulan_cari="10";break;
        case"11":$bulan_cari="11";break;
        case"12":$bulan_cari="12";break;
}

$bulan=mysql_fetch_array(mysql_query("SELECT*FROM v1_time_mont WHERE angka like '$bulan_cari' LIMIT 0,1",$sambungan));$no=1;
echo"   
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left>$bulan[bulan] $tahun_cari</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Pengunjung harian website $site[perusahaan] pada bulan $bulan[bulan] $tahun_cari adalah :<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=100px>HARI</th>
                        <th width=100px>PENGUNJUNG</th>
                        <th width=100px>USER</th>
                        <th width=100px>JUMLAH</th>
                </tr>";
        
        $day_query=mysql_query("SELECT*FROM v1_time_day",$sambungan);$no=1;
        $day_banyak=mysql_num_rows($day_query);
        if($day_banyak==0){
         echo"
                <tr>
                        <td colspan=5 style='background:white'>Belum terdapat data ..</td>
                </tr>
         ";
        }else{
        $sum_user_total=0;$sum_pengunjung_total=0;$sum_jumlah_total=0;
        while($day=mysql_fetch_array($day_query)){
                $sum_user=mysql_num_rows(mysql_query("SELECT*FROM v1_log_record WHERE hari like '%$day[hari]%' AND bulan like '$bulan[angka]' AND tahun like '$tahun_cari'",$sambungan));
                $sum_pengunjung=mysql_num_rows(mysql_query("SELECT*FROM v1_log_pengunjung WHERE hari like '%$day[hari]%' AND bulan like '$bulan[angka]' AND tahun like '$tahun_cari'",$sambungan));
                $jumlah=0;$jumlah=$jumlah+$sum_user+$sum_pengunjung;
                $sum_user_total=$sum_user_total+$sum_user;
                $sum_pengunjung_total=$sum_pengunjung_total+$sum_pengunjung;
                $sum_jumlah_total=$sum_jumlah_total+$jumlah;
                echo"  <tr valign=top>
                        <td style='background:white' align=center>$no</td>
                        <td style='background:white'><b>$day[hari]</b></td>
                        <td style='background:white' align=center>$sum_pengunjung</td>
                        <td style='background:white' align=center>$sum_user</td>
                        <td style='background:white' align=center>$jumlah</td>
                     </tr>
                ";$no++;
        }
                echo"  <tr valign=top>
                        <td style='background:white' align=right colspan=2>TOTAL PENGUNJUNG</td>
                        <td style='background:white' align=center>$sum_pengunjung_total</td>
                        <td style='background:white' align=center>$sum_user_total</td>
                        <td style='background:white' align=center>$sum_jumlah_total</td>
                     </tr>";
        }
echo"  </table></div><div style='height:25px'></div>";
















echo"   
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left>Kunjungan Tahun $tahun_cari</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Pengunjung bulanan website $site[perusahaan] pada tahun $tahun_cari adalah :<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=100px>BULAN</th>
                        <th width=100px>PENGUNJUNG</th>
                        <th width=100px>USER</th>
                        <th width=100px>JUMLAH</th>
                </tr>";

        $bulan_query=mysql_query("SELECT*FROM v1_time_mont",$sambungan);$no=1;
        $bulan_banyak=mysql_num_rows($bulan_query);
        if($bulan_banyak==0){
         echo"
                <tr>
                        <td colspan=5 style='background:white'>Belum terdapat data ..</td>
                </tr>
         ";
        }else{
        $sum_user_total=0;$sum_pengunjung_total=0;$sum_jumlah_total=0;
        while($bulan=mysql_fetch_array($bulan_query)){
                $sum_user=mysql_num_rows(mysql_query("SELECT*FROM v1_log_record WHERE bulan like '$bulan[angka]' AND tahun like '$tahun_cari'",$sambungan));
                $sum_pengunjung=mysql_num_rows(mysql_query("SELECT*FROM v1_log_pengunjung WHERE bulan like '$bulan[angka]' AND tahun like '$tahun_cari'",$sambungan));
                $jumlah=0;$jumlah=$jumlah+$sum_user+$sum_pengunjung;
                $sum_user_total=$sum_user_total+$sum_user;
                $sum_pengunjung_total=$sum_pengunjung_total+$sum_pengunjung;
                $sum_jumlah_total=$sum_jumlah_total+$jumlah;
                echo"  <tr valign=top>
                        <td style='background:white' align=center>$no</td>
                        <td style='background:white'><b>$bulan[bulan]</b></td>
                        <td style='background:white' align=center>$sum_pengunjung</td>
                        <td style='background:white' align=center>$sum_user</td>
                        <td style='background:white' align=center>$jumlah</td>
                     </tr>
                ";$no++;
        }
                echo"  <tr valign=top>
                        <td style='background:white' align=right colspan=2>TOTAL PENGUNJUNG</td>
                        <td style='background:white' align=center>$sum_pengunjung_total</td>
                        <td style='background:white' align=center>$sum_user_total</td>
                        <td style='background:white' align=center>$sum_jumlah_total</td>
                     </tr>";
        }
echo"  </table></div><div style='height:25px'></div>";
?>
