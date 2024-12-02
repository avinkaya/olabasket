<?php

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Rekap Kunjungan Tamu</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Ini adalah data perekaman aktifitas kunjungan tamu (non-user), data ini diambil ketika tamu pertama kali membuka website $site[perusahaan].<br><br>
                <table cellspacing=1 cellpadding=4 width=100% style='border:solid 1px #EAEAEA;background:#EAEAEA'>
                <tr>
                        <th width=10px>NO</th>
                        <th width=50px>IDENTITAS</th>
                        <th width=250px>JARINGAN / HOSTNAME</th>
                        <th width=100px>WAKTU</th>
                </tr>";
        
        $record_query=mysql_query("SELECT*FROM v1_log_pengunjung ORDER by id Desc",$sambungan);$no=1;
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
                        <td style='background:white'><b>$record[user]</b></td>
                        <td style='background:white'>IP. $record[ip]<br>$record[host]</td>
                        <td style='background:white'>$record[hari], $record[tanggal]/$record[bulan]/$record[tahun]</b><br>Pukul : $record[jam]</td>
        ";$no++;
        }}

echo"  </table></div>";

?>
