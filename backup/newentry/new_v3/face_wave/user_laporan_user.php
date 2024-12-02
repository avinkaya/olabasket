<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Rekap Kunjungan User</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Ini adalah data perekaman aktifitas kunjungan user, data ini diambil ketika user login. Data ini akan dipantau oleh Administrator sebagai pengawasan aktifitas user perusahaan $site[perusahaan].<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=120px>IDENTITAS</th>
                        <th width=300px>KOMPUTER</th>
                </tr>";
        
        $record_query=mysql_query("SELECT*FROM v1_log_record ORDER by id Desc",$sambungan);$no=1;
        $record_banyak=mysql_num_rows($record_query);
        if($record_banyak==0){
         echo"
                <tr>
                        <td colspan=5 style='background:white'>Belum terdapat data ..</td>
                </tr>
         ";
        }else{
        while($record=mysql_fetch_array($record_query)){
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$record[id_user]' ",$sambungan));
        echo"        <tr valign=top>
                        <td style='background:white' align=center>$no</td>
                        <td style='background:white'><b>$user[nama]</b><br>No.$user[noid]<br><br>Login :<br>$record[hari], $record[tanggal]/$record[bulan]/$record[tahun]</b><br>Pukul : $record[jam_login]<div style='height:7px'>Logout :<br>$record[hari], $record[tanggal]/$record[bulan]/$record[tahun]</b><br>Pukul : $record[jam_logout]</td>
                        <td style='background:white'>Jaringan :<br>$record[ip]<br><br>Host :<br>$record[host]</tr>
        ";$no++;
        }}

echo"  </table></div>";

?>
