<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$tag=$_GET[md5("tag")];
if($tag!=""){
        $_SESSION[md5("tag")]="$tag";
}else{
        $tag=$_SESSION[md5("tag")];
}
echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tag $tag</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
                <table cellspacing=1 cellpadding=4 width=100% >
                <tr>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("tampil")."=".md5("input")."'><img src='icon/user_tampil.png' width=40px border=0></a><br>Tambah Tag</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("look")."=Tampil'><img src='icon/user_konfirm.png' width=40px border=0></a><br>Tag Tampil</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("look")."=Hidden'><img src='icon/user_blokir.png' width=40px border=0></a><br>Tag Hidden</th>
                        <th width=40px><a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("look")."=Hapus'><img src='icon/user_purna.png' width=40px border=0></a><br>Tag Hapus</th>
                </tr>
                </table>
       </div><div style='height:10px'></div>
";

switch($_GET[md5("proses")]){
case md5("Tampil"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_tag SET status='Tampil' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Tag telah ditampilkan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Hidden"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_tag SET status='Hidden' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Tag telah disembunyikan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Hapus"):
        $id_data=$_GET[md5("id_data")];
        if($id_data==""){pesan("Anda tidak dapat melakukan proses pengubahan data.");}
        else{
                $simpan_query=mysql_query("UPDATE v1_tag SET status='Hapus' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Tag telah dihapus.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Tambah"):
        $judul=$_POST[md5("judul")];
        $url=$_POST[md5("url")];
        $tautan=$_POST[md5("tautan")];
        $ket=$_POST[md5("ket")];
        if($judul==""){pesan("Anda belum menuliskan judul tag.");}
        elseif($url==""){pesan("Anda belum menuliskan alamat url file tag.");}
        else{
                switch($tag){
                        case "Gambar":
                                $isi="<img src=$url width=100% border=0>";
                        break;
        
                        case "Video":
                                $isi="<embed src=tag/Video/flvplayer.swf bgcolor=#f39948 allowscriptaccess=always allowfullscreen=true flashvars=file=$url&amp;autostart=false&amp;fullscreen=true&amp;stretching=fill&logo=icon/imovie.png height=160 width=190px>";
                        break;
                
                        case "Flash":
                                $isi="<embed src=$url quality=high bgcolor=green width=185 type=application/x-shockwave-flash pluginspage=http://www.macromedia.com/go/getflashplayer></embed>";
                        break;
                        case "MP3":
                                $isi="<object type=application/x-shockwave-flash data=tag/Video/mp3player.swf id=audioplayer1 height=30 width=190><param name=FlashVars value=autostart=no&amp;playerID=1&amp;bg=0xCDDFF3&amp;leftbg=0x357DCE&amp;lefticon=0xF2F2F2&amp;rightbg=0x357DCE&amp;rightbghover=0x6797CC&amp;righticon=0xF2F2F2&amp;righticonhover=0xF2F2F2&amp;text=0x357DCE&amp;slider=0x357DCE&amp;track=0xFFFFFF&amp;loader=0x72A4DD&amp;border=0xFFFFFF&amp;soundFile=$url><param name=quality value=high><param name=menu value=true><param name=wmode value=transparent></object>";
                        break;
                }
                $tambah_query=mysql_query("INSERT INTO v1_tag VALUE ('','$id','$username','$tag','$url','$judul','$isi','$ket','$hari','$tanggal','$bulan','$tahun','$jam','$ip','$host','Tampil','$tautan','')",$sambungan);
                if($tambah_query){pesan("Tag $tag telah di tambahkan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;

case md5("Edit"):
        $id_data=$_GET[md5("id_data")];
        $edit=mysql_fetch_array(mysql_query("SELECT*FROM v1_tag WHERE id like '$id_data'",$sambungan));
        $form_id="<input type=hidden name='".md5("id_data")."' value='$edit[id]'>";
        $proses="Simpan";
        $_GET[md5("tampil")]=md5("input");
break;

case md5("Simpan"):
        $id_data=$_POST[md5("id_data")];
        $judul=$_POST[md5("judul")];
        $url=$_POST[md5("url")];
        $tautan=$_POST[md5("tautan")];
        $ket=$_POST[md5("ket")];
        if($judul==""){pesan("Anda belum menuliskan judul tag.");}
        elseif($url==""){pesan("Anda belum menuliskan alamat url file tag.");}
        else{
                switch($tag){
                        case "Gambar":
                                $isi="<img src=$url width=100% border=0>";
                        break;
        
                        case "Video":
                                $isi="<embed src=tag/$tag/flvplayer.swf bgcolor=#f39948 allowscriptaccess=always allowfullscreen=true flashvars=file=$url&amp;autostart=false&amp;fullscreen=true&amp;stretching=fill&logo=icon/imovie.png height=160 width=190px>";
                        break;
                
                        case "Flash":
                                $isi="<embed src=$url quality=high  width=190  bgcolor=green type=application/x-shockwave-flash pluginspage=http://www.macromedia.com/go/getflashplayer></embed>";
                        break;
                        case "MP3":
                                $isi="<object type=application/x-shockwave-flash data=tag/Video/mp3player.swf id=audioplayer1 height=30 width=190><param name=FlashVars value=autostart=no&amp;playerID=1&amp;bg=0xCDDFF3&amp;leftbg=0x357DCE&amp;lefticon=0xF2F2F2&amp;rightbg=0x357DCE&amp;rightbghover=0x6797CC&amp;righticon=0xF2F2F2&amp;righticonhover=0xF2F2F2&amp;text=0x357DCE&amp;slider=0x357DCE&amp;track=0xFFFFFF&amp;loader=0x72A4DD&amp;border=0xFFFFFF&amp;soundFile=$url><param name=quality value=high><param name=menu value=true><param name=wmode value=transparent></object>";
                        break;

                }
                $simpan_query=mysql_query("UPDATE v1_tag SET judul='$judul',isi='$isi',url='$url',tautan='$tautan',ket='$ket' WHERE id like '$id_data'",$sambungan);
                if($simpan_query){pesan("Tag telah disimpan.");}
                else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
break;
}

switch($_GET[md5("tampil")]){
case"":
$look=$_GET[md5("look")];if($look==""){$look="Tampil";}
        $tag_query=mysql_query("SELECT*FROM v1_tag WHERE status like '$look' AND mode like '$tag' AND id_user like '$id' ORDER By id desc",$sambungan);$no=1;
        $tag_banyak=mysql_num_rows($tag_query);
        if($tag_banyak==0){
        echo"";
        }else{
        while($tag=mysql_fetch_array($tag_query)){
        $user=mysql_fetch_array(mysql_query("SELECT*FROM vi_user WHERE id like '$tag[id_user]' ORDER By id desc",$sambungan));

echo"
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>$tag[judul]</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table cellspacing=1 cellpadding=4 width=100% >
        <tr valign=top>
                        <td style='background:white;width:200px'>$tag[isi]</td>
                        <td style='background:white'>$tag[ket]<br>$tag[hari], $tag[tanggal] / $tag[bulan] / $tag[tahun]<br><br>Pengelolaan : <br>
                                <a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("proses")."=".md5("Edit")."&&".md5("id_data")."=$tag[id]'>[ Edit </a> 
                                <a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("proses")."=".md5("Tampil")."&&".md5("id_data")."=$tag[id]'>| Tampil </a>
                                <a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("proses")."=".md5("Hidden")."&&".md5("id_data")."=$tag[id]'>| Hidden </a>
                                <a href='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("proses")."=".md5("Hapus")."&&".md5("id_data")."=$tag[id]'>| Hapus  ]</a>                        
                        </td>
                </tr></table></div><div style='height:10px'></div>";$no++;
        }}


break;

case md5("input"):
if($proses==""){$proses="Tambah";$form_id="";}

echo"   <form method=post action='?".md5("page_halaman")."=".md5("tag_in")."&&".md5("proses")."=".md5("$proses")."'>$form_id
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Tambah / Edit Tag</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        Judul Tag : <br><input type=text name='".md5("judul")."' value='$edit[judul]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:440px;'><br><br><br>
        URL $tag : <br><input type=text name='".md5("url")."' value='$edit[url]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:400px;'><br><br><br>
        Tautan Link : <br><input type=text name='".md5("tautan")."' value='$edit[tautan]' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:400px;'><br><br><br>
        Deskripsi :<br>
        <textarea name='".md5("ket")."' style='padding:5 5 5 5;width:430px;height:200px'>$edit[ket]</textarea><br><br>
        Script :<br>
        <textarea name='".md5("isi")."' style='padding:5 5 5 5;width:430px;height:180px' disabled='disable'>$edit[isi]</textarea><br><br>
        <input type=submit value='Simpan' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Reset' style='padding:10 10 10 10;width:100px'>
       </div><div style='height:10px'></div></form>
";
break;
}

?>
