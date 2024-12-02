<?php
session_start();
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

switch($_GET[md5("proses")]){
case md5("tambah"):
        $judul=$_POST[md5("judul")];
        $kategori=$_POST[md5("kategori")];
        $status=$_POST[md5("status")];
        $isi=$_POST[md5("isi")];
        $produk_berita=$_POST[md5("produk_berita")];
        $harga=$_POST[md5("harga")];
        $diskon=$_POST[md5("diskon")];
        $size=$_POST[md5("size")];
        $warna=$_POST[md5("warna")];
        $merek=$_POST[md5("merek")];
        $stok=$_POST[md5("stok")];
        $statusjual=$_POST[md5("statusjual")];
        $kategoriinformasi=$_POST[md5("kategoriinformasi")];
        $avatar=$_SESSION["avatar1"];
        if($judul==""){pesan("Anda belum menulis judul informasi.");}
        elseif($kategori==""){pesan("Anda belum memilih kategori informasi, silahkan tambahkan kategori informasi melalui menu kategori.");}
        elseif($status==""){pesan("Anda belum memilih status untuk menampilkan informasi.");}
        elseif($isi==""){pesan("Anda belum menulis isi informasi.");}
        else{
                $tambah_query=mysql_query("INSERT INTO v1_informasi_berita VALUE ('','$kategori','$judul','$isi','$avatar','$id','$username','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','$status','','$produk_berita','$harga','$diskon','$size','$warna','$merek','$stok','$statusjual','$kategoriinformasi')",$sambungan);
                if($tambah_query){pesan("Informasi anda telah di tambahkan.");}else{pesan("Informasi anda gagal di tambahkan, silahkan coba kembali. periksalah tanda baca dalam informasi anda. kami tidak dapat menyimpan tanda baca petik atas.");}
        }
break;

case md5("simpan"):
        $id_data=$_POST[md5("id_data")];
        $judul=$_POST[md5("judul")];
        $kategori=$_POST[md5("kategori")];
        $status=$_POST[md5("status")];
        $isi=$_POST[md5("isi")];
        $harga=$_POST[md5("harga")];
        $diskon=$_POST[md5("diskon")];
        $size=$_POST[md5("size")];
        $warna=$_POST[md5("warna")];
        $merek=$_POST[md5("merek")];
        $stok=$_POST[md5("stok")];
        $statusjual=$_POST[md5("statusjual")];
        $kategoriinformasi=$_POST[md5("kategoriinformasi")];
        $avatar=$_SESSION["avatar1"];
        if($judul==""){pesan("Anda belum menulis judul informasi.");}
        elseif($kategori==""){pesan("Anda belum memilih kategori informasi, silahkan tambahkan kategori informasi melalui menu kategori.");}
        elseif($status==""){pesan("Anda belum memilih status untuk menampilkan informasi.");}
        elseif($isi==""){pesan("Anda belum menulis isi informasi.");}
        elseif($id_data==""){pesan("Anda tidak dapat melanjutkan proses ini.");}
        else{
                $tambah_query=mysql_query("UPDATE v1_informasi_berita SET id_kategori='$kategori',judul='$judul',isi='$isi',status='$status',harga='$harga',diskon='$diskon',size='$size',warna='$warna',merek='$merek',stok='$stok',statusjual='$statusjual',kategoriinformasi='$kategoriinformasi' WHERE id like '$id_data'",$sambungan);
                if($tambah_query){pesan("Informasi anda telah di simpan.");}else{pesan("Informasi anda gagal di simpan, silahkan coba kembali. periksalah tanda baca dalam informasi anda. kami tidak dapat menyimpan tanda baca petik atas.");}
        }
break;
}
if($_GET[md5("aksi")]==md5("edit")){
        $proses="simpan";
        $id_data=$_GET[md5("id_data")];
        $edit=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_berita WHERE id like '$id_data'",$sambungan));
        $form="<input type=hidden name='".md5("id_data")."' value='$edit[id]'>";
}else{
        $proses="tambah";
}

include("face_wave/style_besar.php");
echo"<form method=post action='?".md5("page_halaman")."=".md5("informasi_berita_in")."&&".md5("proses")."=".md5("$proses")."'>$form
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tambah / Edit Informasi</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        Untuk menambah informasi silahkan tulis informasi anda pada form yang telah disediakan, pilihlah kategori informasi sesuai dengan isi informasi yang anda tuliskan.<br><br>
        Kategori :<br>
        <select type=text name='".md5("kategori")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:300px;'>
                <option value='$edit[id_kategori]'></option>
";

$group_query=mysql_query("SELECT*FROM v1_informasi_group WHERE status like 'tampil' ORDER By nama",$sambungan);
while($group=mysql_fetch_array($group_query)){
        echo"<option value='$group[id]'  disabled='disable'>~>$group[nama]</option>";

	$kategori_query=mysql_query("SELECT*FROM v1_informasi_kategori WHERE status like 'tampil' AND id_group like '$group[id]' ORDER By nama",$sambungan);
	while($kategori=mysql_fetch_array($kategori_query)){
	echo"<option value='$kategori[id]'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$kategori[nama]</option>";
}}
echo"   </select><br><br>
        Judul Informasi :<br><input type=text name='".md5("judul")."' value='$edit[judul]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:430px;'><br><br>
        Harga Jual :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diskon khusus :<br>
	Rp. <input type=text name='".md5("harga")."' value='$edit[harga]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:100px;'>,00 &nbsp;&nbsp;&nbsp;&nbsp;
        <input type=text name='".md5("diskon")."' value='$edit[diskon]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:60px;'> %<br><br>
        Size :<br><input type=text name='".md5("size")."' value='$edit[size]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:330px;'><br><br>
        Warna :<br><input type=text name='".md5("warna")."' value='$edit[warna]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:330px;'><br><br>
        Merek :<br><input type=text name='".md5("merek")."' value='$edit[merek]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:230px;'><br><br>
        Stok :<br><input type=text name='".md5("stok")."' value='$edit[stok]' style='padding:8 10 8 10;border:solid 1px #C4C4C4;font-size:15px;color:black;width:60px;'>Pcs<br><br>

        Status Tampil :<br>
        <select type=text name='".md5("status")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:200px;'>
        <option value='$edit[status]'></option>
                <option value='Konsep'>Konsep</option>
                <option value='Sembunyikan'>Sembunyikan</option>
                <option value='Tampilkan'>Tampilkan</option>
        </select><br><br>
        Isi Informasi : <a href='javascript:void();' onclick=menu('face_wave/informasi_upload_gambar','','upload')>Sisipkan Gambar Produk</a><br><br><textarea name='".md5("isi")."' style='padding:5 5 5 5;width:430px;height:250px'>$edit[isi]</textarea><br><br>
        
        Kategori informasi :
        <select type=text name='".md5("kategoriinformasi")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:300px;'>
                <option value='1'>Produk</option>
                <option value='2'>Berita</option>
	</select><br><br>
	
	Persediaan :
        <select type=text name='".md5("statusjual")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:150px;'>
<option value='$edit[statusjual]'></option>
                <option value='1'>Baru Desain</option>
                <option value='2'>Masih ada stok</option>
                <option value='3'>Terbatas</option>
                <option value='4'>Terjual (Habis)</option>
                <option value='5'>Kosong</option>
	</select><br><br>
        <input type=submit value='Simpan' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Hapus' style='padding:10 10 10 10;;width:100px'>
        </div></form></div></div><div id='upload'></div>
";
        
?>
