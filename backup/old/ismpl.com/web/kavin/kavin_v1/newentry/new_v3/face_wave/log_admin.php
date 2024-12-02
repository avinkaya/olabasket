<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div align=left>
        <br><img src='gambar/$site[logo]' width=40px style='border-right:solid 5px white;' align=left>
        <b style='font-size:16px'>Akun $wewenang</b><br>
        Sugeng rawuh <b><i>$nama</i></b> wonten ing menu iki. Yen panjenengan kepengen metu, monggo logout rumiyen saking akun jenengan.
        </div><div style='height:50px'></div>
";

switch($wewenang){
case"Programer":

$check_pesan=mysql_num_rows(mysql_query("SELECT*FROM v1_forum WHERE status like 'Confirm'",$sambungan));
if($check_pesan!=0){$pesan_confirm="<li>Terdapat <b style='color:blue'>$check_pesan</b> pesan baru dari pelanggan <a href='?".md5("page_halaman")."=".md5("forum_confirm")."' style='color:red'>[ detail .. ]</a></li>";}else{$pesan_confirm="";}

$check_laporan=mysql_num_rows(mysql_query("SELECT*FROM v1_forum WHERE laporan like 'dilaporkan'",$sambungan));
if($check_laporan!=0){$pesan_laporan="<li>Terdapat <b style='color:blue'>$check_laporan</b> pesan pelanggan yang dilaporkan atas isi yang mungkin tidak layak di tampilkan  <a href='?".md5("page_halaman")."=".md5("forum_laporan")."' style='color:red'>[ detail .. ]</a></li>";}else{$pesan_laporan="";}

$check_user=mysql_num_rows(mysql_query("SELECT*FROM vi_user WHERE status like 'Confirm'",$sambungan));
if($check_user!=0){$user_confirm="<li>Terdapat <b style='color:blue'>$check_user</b> permintaan menjadi user  <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("tampil")."=".md5("Konfirm")."' style='color:red'>[ detail .. ]</a>";}else{$user_confirm="";}

if($check_pesan!=0 or $check_laporan!=0 or $check_user!=0){
        echo"
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Informasi</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <ul>
                        $pesan_confirm
                        $pesan_laporan
                        $user_confirm
                </ul>
                </div><div style='height:30px'></div>
        ";
}  
        echo"      
                <!-- AKUN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Data Akun</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_biodata")."'><img src='icon/akun_biodata.jpg' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_ganti_password")."'><img src='icon/akun_password.png' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_record_login")."'><img src='icon/akun_record.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Biodata</td>
                                <td align=center>Ganti Password</td>
                                <td align=center>Record Sign-in</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- SETUP -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Setting Website</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("setup_website")."'><img src='icon/setup_Tools.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("setup_background")."'><img src='icon/setup_background.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("setup_service")."'><img src='icon/setup_service.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Atur Identitas</td>
                                <td align=center>Background</td>
                                <td align=center>Customer Service</td>
                        </tr>
		        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('kampungan/setup_banner','','inti')><img src='icon/setup_banner.png' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('kampungan/setup_iklan','','inti')><img src='icon/setup_iklan.png' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('kampungan/setup_pimpinan','','inti')><img src='icon/setup_pimpinan.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Banner Setup</td>
                                <td align=center>Gambar Iklan</td>
                                <td align=center>Foto Camat</td>
                        </tr>

                        </table>
                </div><div style='height:30px'></div>
                
                <!-- USER -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Manajemen User</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_tambah")."'><img src='icon/user_tambah.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_rekap")."'><img src='icon/user_rekap.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_searching")."'><img src='icon/user_cari.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah User</td>
                                <td align=center>Rekap User</td>
                                <td align=center>Pencarian User</td>
                        </tr>
                        <tr><td colspan=3>&nbsp;</td></tr>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_laporan_user")."'><img src='icon/user_laporan.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_laporan_tamu")."'><img src='icon/user_pengunjung.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_statistik")."'><img src='icon/user_statistik.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Laporan User</td>
                                <td align=center>Laporan Pengunjung</td>
                                <td align=center>Statistik Kunjungan</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- PROFIL DAN HALAMAN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Profil & Halaman</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("halaman_profil_in")."'><img src='icon/halaman_profil.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("halaman_kelola")."'><img src='icon/halaman_kelola.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("halaman_setup")."'><img src='icon/halaman_setting.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Profil</td>
                                <td align=center>Kelola Halaman</td>
                                <td align=center>Setting Halaman</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- BERITA & INFORMASI -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Berita & Informasi</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_kategori")."'><img src='icon/informasi_kategori.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."'><img src='icon/informasi_tambah.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."'><img src='icon/informasi_kelola.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Kategori Informasi</td>
                                <td align=center>Tambah Informasi</td>
                                <td align=center>Kelola Informasi</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- TAG HTML -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tag HTML Script</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Gambar'><img src='icon/tag_gambar.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Video'><img src='icon/tag_video.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Flash'><img src='icon/tag_flash.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tag Gambar & Banner</td>
                                <td align=center>Tag Video Streaming</td>
                                <td align=center>Tag Macromedia Flash</td>
                        </tr>
                        <tr><td colspan=3>&nbsp;</td></tr>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=MP3'><img src='icon/tag_mp3.png' width=60px border=0></td>
                                <td width=100px align=center></td>
                                <td width=100px align=center></td>
                        </tr>
                        <tr>
                                <td align=center>Tag MP3 Audio</td>
                                <td align=center></td>
                                <td align=center></td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- KAMUS BAHASA DAERAH -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Kamus Daerah</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_daerah_in','','inti')><img src='icon/tiket_pesan.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_kosakata_in','','inti')><img src='icon/tiket_validasi.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/terjemah_form','','inti')><img src='icon/tiket_terjual.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Daerah</td>
                                <td align=center>Kelola Kosakata</td>
                                <td align=center>Terjemahkan Kata</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>

        ";
break;

case"Administrator":

$check_pesan=mysql_num_rows(mysql_query("SELECT*FROM v1_forum WHERE status like 'Confirm'",$sambungan));
if($check_pesan!=0){$pesan_confirm="<li>Terdapat <b style='color:blue'>$check_pesan</b> pesan baru dari pelanggan <a href='?".md5("page_halaman")."=".md5("forum_confirm")."' style='color:red'>[ detail .. ]</a></li>";}else{$pesan_confirm="";}

$check_laporan=mysql_num_rows(mysql_query("SELECT*FROM v1_forum WHERE laporan like 'dilaporkan'",$sambungan));
if($check_laporan!=0){$pesan_laporan="<li>Terdapat <b style='color:blue'>$check_laporan</b> pesan pelanggan yang dilaporkan atas isi yang mungkin tidak layak di tampilkan  <a href='?".md5("page_halaman")."=".md5("forum_laporan")."' style='color:red'>[ detail .. ]</a></li>";}else{$pesan_laporan="";}

$check_user=mysql_num_rows(mysql_query("SELECT*FROM vi_user WHERE status like 'Confirm'",$sambungan));
if($check_user!=0){$user_confirm="<li>Terdapat <b style='color:blue'>$check_user</b> permintaan menjadi user  <a href='?".md5("page_halaman")."=".md5("user_rekap")."&&".md5("tampil")."=".md5("Konfirm")."' style='color:red'>[ detail .. ]</a>";}else{$user_confirm="";}

if($check_pesan!=0 or $check_laporan!=0 or $check_user!=0){
        echo"
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Informasi</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <ul>
                        $pesan_confirm
                        $pesan_laporan
                        $user_confirm
                </ul>
                </div><div style='height:30px'></div>
        ";
}  
        echo"      
                <!-- AKUN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Data Akun</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_biodata")."'><img src='icon/akun_biodata.jpg' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_ganti_password")."'><img src='icon/akun_password.png' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_record_login")."'><img src='icon/akun_record.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Biodata</td>
                                <td align=center>Ganti Password</td>
                                <td align=center>Record Sign-in</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- SETUP -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Setting Website</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("setup_website")."'><img src='icon/setup_Tools.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("setup_background")."'><img src='icon/setup_background.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("setup_service")."'><img src='icon/setup_service.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Atur Identitas</td>
                                <td align=center>Background</td>
                                <td align=center>Customer Service</td>
                        </tr>
		        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('kampungan/setup_banner','','inti')><img src='icon/setup_banner.png' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('kampungan/setup_iklan','','inti')><img src='icon/setup_iklan.png' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('kampungan/setup_pimpinan','','inti')><img src='icon/setup_pimpinan.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Banner Setup</td>
                                <td align=center>Gambar Iklan</td>
                                <td align=center>Foto Camat</td>
                        </tr>

                        </table>
                </div><div style='height:30px'></div>
                
                <!-- USER -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Manajemen User</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_tambah")."'><img src='icon/user_tambah.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_rekap")."'><img src='icon/user_rekap.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_searching")."'><img src='icon/user_cari.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah User</td>
                                <td align=center>Rekap User</td>
                                <td align=center>Pencarian User</td>
                        </tr>
                        <tr><td colspan=3>&nbsp;</td></tr>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_laporan_user")."'><img src='icon/user_laporan.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_laporan_tamu")."'><img src='icon/user_pengunjung.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("user_statistik")."'><img src='icon/user_statistik.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Laporan User</td>
                                <td align=center>Laporan Pengunjung</td>
                                <td align=center>Statistik Kunjungan</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- PROFIL DAN HALAMAN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Profil & Halaman</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("halaman_profil_in")."'><img src='icon/halaman_profil.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("halaman_kelola")."'><img src='icon/halaman_kelola.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("halaman_setup")."'><img src='icon/halaman_setting.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Profil</td>
                                <td align=center>Kelola Halaman</td>
                                <td align=center>Setting Halaman</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- BERITA & INFORMASI -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Berita & Informasi</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_kategori")."'><img src='icon/informasi_kategori.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."'><img src='icon/informasi_tambah.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."'><img src='icon/informasi_kelola.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Kategori Informasi</td>
                                <td align=center>Tambah Informasi</td>
                                <td align=center>Kelola Informasi</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- TAG HTML -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tag HTML Script</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Gambar'><img src='icon/tag_gambar.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Video'><img src='icon/tag_video.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Flash'><img src='icon/tag_flash.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tag Gambar & Banner</td>
                                <td align=center>Tag Video Streaming</td>
                                <td align=center>Tag Macromedia Flash</td>
                        </tr>
                        <tr><td colspan=3>&nbsp;</td></tr>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=MP3'><img src='icon/tag_mp3.png' width=60px border=0></td>
                                <td width=100px align=center></td>
                                <td width=100px align=center></td>
                        </tr>
                        <tr>
                                <td align=center>Tag MP3 Audio</td>
                                <td align=center></td>
                                <td align=center></td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- KAMUS BAHASA DAERAH -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Kamus Daerah</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_daerah_in','','inti')><img src='icon/tiket_pesan.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_kosakata_in','','inti')><img src='icon/tiket_validasi.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/terjemah_form','','inti')><img src='icon/tiket_terjual.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Daerah</td>
                                <td align=center>Kelola Kosakata</td>
                                <td align=center>Terjemahkan Kata</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>

        ";
break;

case"Pengurus":
        echo"      
                <!-- AKUN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Data Akun</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_biodata")."'><img src='icon/akun_biodata.jpg' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_ganti_password")."'><img src='icon/akun_password.png' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_record_login")."'><img src='icon/akun_record.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Biodata</td>
                                <td align=center>Ganti Password</td>
                                <td align=center>Record Sign-in</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- BERITA & INFORMASI -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Berita & Informasi</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>

                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."'><img src='icon/informasi_tambah.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."'><img src='icon/informasi_kelola.png' width=60px border=0></td>
                                <td width=100px align=center>&nbsp;</td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Informasi</td>
                                <td align=center>Kelola Informasi</td>
                                <td align=center>&nbsp;</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- TAG HTML -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tag HTML Script</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Gambar'><img src='icon/tag_gambar.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Video'><img src='icon/tag_video.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Flash'><img src='icon/tag_flash.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tag Gambar & Banner</td>
                                <td align=center>Tag Video Streaming</td>
                                <td align=center>Tag Macromedia Flash</td>
                        </tr>
                        <tr><td colspan=3>&nbsp;</td></tr>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=MP3'><img src='icon/tag_mp3.png' width=60px border=0></td>
                                <td width=100px align=center></td>
                                <td width=100px align=center></td>
                        </tr>
                        <tr>
                                <td align=center>Tag MP3 Audio</td>
                                <td align=center></td>
                                <td align=center></td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
		
		<!-- KAMUS BAHASA DAERAH -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Kamus Daerah</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_daerah_in','','inti')><img src='icon/tiket_pesan.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_kosakata_in','','inti')><img src='icon/tiket_validasi.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/terjemah_form','','inti')><img src='icon/tiket_terjual.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Daerah</td>
                                <td align=center>Kelola Kosakata</td>
                                <td align=center>Terjemahkan Kata</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
        ";
break;

case"Pengawas":
        echo"      
                <!-- AKUN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Data Akun</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_biodata")."'><img src='icon/akun_biodata.jpg' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_ganti_password")."'><img src='icon/akun_password.png' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_record_login")."'><img src='icon/akun_record.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Biodata</td>
                                <td align=center>Ganti Password</td>
                                <td align=center>Record Sign-in</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- BERITA & INFORMASI -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Berita & Informasi</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>

                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_berita_in")."'><img src='icon/informasi_tambah.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("informasi_kelola")."'><img src='icon/informasi_kelola.png' width=60px border=0></td>
                                <td width=100px align=center>&nbsp;</td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Informasi</td>
                                <td align=center>Kelola Informasi</td>
                                <td align=center>&nbsp;</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                
                <!-- TAG HTML -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tag HTML Script</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Gambar'><img src='icon/tag_gambar.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Video'><img src='icon/tag_video.png' width=60px border=0></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=Flash'><img src='icon/tag_flash.png' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tag Gambar & Banner</td>
                                <td align=center>Tag Video Streaming</td>
                                <td align=center>Tag Macromedia Flash</td>
                        </tr>
                        <tr><td colspan=3>&nbsp;</td></tr>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tag")."=MP3'><img src='icon/tag_mp3.png' width=60px border=0></td>
                                <td width=100px align=center></td>
                                <td width=100px align=center></td>
                        </tr>
                        <tr>
                                <td align=center>Tag MP3 Audio</td>
                                <td align=center></td>
                                <td align=center></td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
		
		<!-- KAMUS BAHASA DAERAH -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Kamus Daerah</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_daerah_in','','inti')><img src='icon/tiket_pesan.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_kosakata_in','','inti')><img src='icon/tiket_validasi.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/terjemah_form','','inti')><img src='icon/tiket_terjual.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Daerah</td>
                                <td align=center>Kelola Kosakata</td>
                                <td align=center>Terjemahkan Kata</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
        ";
break;

case"Anggota":
        echo"      
                <!-- AKUN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Data Akun</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_biodata")."'><img src='icon/akun_biodata.jpg' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_ganti_password")."'><img src='icon/akun_password.png' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_record_login")."'><img src='icon/akun_record.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Biodata</td>
                                <td align=center>Ganti Password</td>
                                <td align=center>Record Sign-in</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                		
		<!-- KAMUS BAHASA DAERAH -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Kamus Daerah</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_daerah_in','','inti')><img src='icon/tiket_pesan.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_kosakata_in','','inti')><img src='icon/tiket_validasi.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/terjemah_form','','inti')><img src='icon/tiket_terjual.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Daerah</td>
                                <td align=center>Kelola Kosakata</td>
                                <td align=center>Terjemahkan Kata</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
        ";
break;

case"Alumni":
        echo"      
                <!-- AKUN -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Data Akun</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_biodata")."'><img src='icon/akun_biodata.jpg' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_ganti_password")."'><img src='icon/akun_password.png' width=60px border=0></a></td>
                                <td width=100px align=center><a href='?".md5("page_halaman")."=".md5("akun_record_login")."'><img src='icon/akun_record.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Biodata</td>
                                <td align=center>Ganti Password</td>
                                <td align=center>Record Sign-in</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
                		
		<!-- KAMUS BAHASA DAERAH -->
                
                <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Kamus Daerah</b></div>
                <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                        <table border=0 collspacing=3 collpadding=3 width=100%>
                        <tr>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_daerah_in','','inti')><img src='icon/tiket_pesan.jpg' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/t_kosakata_in','','inti')><img src='icon/tiket_validasi.gif' width=60px border=0></td>
                                <td width=100px align=center><a href='javascript:void()' onclick=menu('translate/terjemah_form','','inti')><img src='icon/tiket_terjual.jpg' width=60px border=0></td>
                        </tr>
                        <tr>
                                <td align=center>Tambah Daerah</td>
                                <td align=center>Kelola Kosakata</td>
                                <td align=center>Terjemahkan Kata</td>
                        </tr>
                        </table>
                </div><div style='height:30px'></div>
        ";
break;
}
?>
