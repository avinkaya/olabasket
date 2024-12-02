<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Rekam Akses Akun</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Ini adalah data perekaman aktifitas akses akun anda, data ini diambil ketika anda login. Data ini akan dipantau oleh Administrator sebagai pengawasan kinerja anda selama anda memiliki akun perusahaan $site[perusahaan].<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=140px>IDENTITAS</th>
                        <th width=120px>LOGIN</th>
                        <th width=120px>LOGOUT</th>
                        <th width=100px>KOMPUTER</th>
                </tr>";
        
        $record_query=mysql_query("SELECT*FROM v1_log_record WHERE id_user like '$id' ORDER by id Desc",$sambungan);$no=1;
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$id' ",$sambungan));
        $record_banyak=mysql_num_rows($record_query);
        if($record_banyak==0){
         echo"
                <tr>
                        <td colspan=5 style='background:white'>Belum terdapat data ..</td>
                </tr>
         ";
        }else{
        while($record=mysql_fetch_array($record_query)){
        echo"        <tr valign=top>
                        <td style='background:white' align=center>$no</td>
                        <td style='background:white'><b>$user[nama]</b><br>No.$user[noid]</td>
                        <td style='background:white'>$record[hari], $record[tanggal]/$record[bulan]/$record[tahun]</b><br>Pukul : $record[jam_login]</td>
                        <td style='background:white'>$record[hari], $record[tanggal]/$record[bulan]/$record[tahun]</b><br>Pukul : $record[jam_logout]</td>
                        <td style='background:white'>$record[ip]<br><br>Host :<br>$record[host]</tr>
        ";$no++;
        }}

echo"  </table></div>";

?>
