<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_POST[md5("Terapkan")]){
case md5("Terapkan"):
        $title=$_POST[md5("title")];
        $mode_urutan=$_POST[md5("mode_urutan")];
        $min_tampil=$_POST[md5("min_tampil")];
        $max_tampil=$_POST[md5("max_tampil")];
        if($title==""){pesan("Judul menu anda masih kosong");}
        elseif($mode_urutan==""){pesan("Mode urutan belum dipilih");}
        elseif($min_tampil==""){pesan("Nilai minimal tampilan belum diisi");}
        elseif($max_tampil==""){pesan("Nilai maksimal tampilan belum diisi");}
        elseif($min_tampil>=$max_tampil){pesan("Nilai minimal tampilan tidak boleh sama dan atau lebih dari nilai maksimal.");}
        elseif($max_tampil==0){pesan("Nilai maksimal tidak boleh 0");}
        else{
                $simpan=mysql_query("UPDATE v1_halaman_setup SET title='$title',mode_urutan='$mode_urutan',min_tampil='$min_tampil',max_tampil='$max_tampil',hari='$hari',tanggal='$tanggal',bulan='$bulan',tahun='$tahun',ip='$ip',host='$host',jam='$jam'",$sambungan);
                if($simpan){pesan("Halaman telah di setting.");}else{pesan("Setingan gagal, silahkan coba kembali.");}
        }
break;
}

$halaman_setup=mysql_fetch_array(mysql_query("SELECT*FROM v1_halaman_setup WHERE id like '1'",$sambungan));
echo"   <form method=POST action='?".md5("page_halaman")."=".md5("halaman_setup")."'>
        <input type=hidden name='".md5("Terapkan")."' value='".md5("Terapkan")."'>
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left>Setting Tampilan Halaman</div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                Judul Menu :<br><input type=text name='".md5("title")."' value='$halaman_setup[title]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:440px;'><br><br><br>
                Pengurutan :<br>
                        <select type=text name='".md5("mode_urutan")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:150px;'>
                                <option value='Asc'>Ascending</option>
                                <option value='Desc'>Descending</option>
                                <option value='Rand();'>Random</option>
                        </select><br><br><br>
                Tampilkan dari data nomor :<br><input type=text name='".md5("min_tampil")."' value='$halaman_setup[min_tampil]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:50px;'> s.d <input type=text name='".md5("max_tampil")."' value='$halaman_setup[max_tampil]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:50px;'> <br><br><br>
                <input type=submit value='Terapkan' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:10 10 10 10;width:100px'></form>
        </div>
";
?>
