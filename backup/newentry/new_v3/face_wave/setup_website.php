<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Setting Identitas Website</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table border=0 width=100% cellspacing=5 cellpadding=5>
        <tr>    <form method=post action='?".md5("page_halaman")."=".md5("setup_website")."&&".md5("proses")."=".md5("Simpan_Website")."'>
                <td style='width:100px;font-size:12px'>Title</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='font-size:12px'><input type=text name='".md5("title")."' value='$site[title]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Deskripsi</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("deskripsi")."' value='$site[deskripsi]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Keyword Google</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("keyword")."' value='$site[keyword]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Statusbar 1</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("bar_1")."' value='$site[bar_1]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Statusbar 2</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("bar_2")."' value='$site[bar_2]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Statusbar 3</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("bar_3")."' value='$site[bar_3]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Statusbar 4</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("bar_4")."' value='$site[bar_4]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Developer</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text value='$site[Developer]' disabled='disable' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Tahun Produk</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text value='$site[tahun_site]' disabled='disable' style='padding:5 5 5 5;font-size:13px;width:80px'></td>
        </tr>
        <tr>
                <td style='font-size:12px' colspan=3><input type=submit value='Simpan' style='padding:5 5 5 5;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:5 5 5 5;width:100px'></td>             
        </tr></form>
        </table>
        </div><div style='height:20px'></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <b>Tips Google Search Machine :</b><br>
        Agar website anda ini dapat ditemukan oleh mesin pencari dan agar muncul di halaman paling depan pada google ikuti tips berikut :
        <ol>
                <li>Pada setingan title, deskripsi dan keyword gunakan kata - kata yang menjadi kunci ketika searching di google misalnya : pesawat, air, tiket, perjalanan, dll.</li>
                <li>Deskripsi website anda harus jelas dan mencerminkan isi dari website anda ini.</li>
                <li>Jangan gunakan keyword yang bersifat porno grafik, porno aksi, sara, teroris, dll. karena terdapat beberapa provider di negara - negara tertentu yang mencegah keyword tersebut</li>
                <li>Daftarkan alamat website anda ke google master ( ada beberapa ketentuan dimana mungkin anda harus membayar ke google )</li>
                <li>Update selalu berita dan informasi di website anda setiap saat karena google selalu menampilkan data yang terhangat, terlaris dan terbanyak pengunjungnya</li>
        </ol>
        </div><div style='height:20px'></div>
        
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Identitas Perusahaan</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table border=0 width=100% cellspacing=5 cellpadding=5>
        <tr>    <form method=post action='?".md5("page_halaman")."=".md5("setup_website")."&&".md5("proses")."=".md5("Simpan_Perusahaan")."'>
                <td style='width:100px;font-size:12px'>Perusahaan</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='font-size:12px'><input type=text name='".md5("perusahaan")."' value='$site[perusahaan]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Direktur/Pimpinan</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("dirut")."' value='$site[dirut]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Deskripsi</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("ket")."' value='$site[ket]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Motto</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("motto")."' value='$site[motto]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Alamat</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("alamat")."' value='$site[alamat]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Website</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("website")."' value='$site[website]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Email</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("email")."' value='$site[email]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='width:100px;font-size:12px'>Telephone</td>
                <td style='width:5px;font-size:12px'>:</td>
                <td style='width;100%;font-size:12px'><input type=text name='".md5("phone")."' value='$site[phone]' style='padding:5 5 5 5;font-size:13px;width:280px'></td>
        </tr>
        <tr>
                <td style='font-size:12px' colspan=3><input type=submit value='Simpan' style='padding:5 5 5 5;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:5 5 5 5;width:100px'></td>             
        </tr></form>
        </table>
";
?>
