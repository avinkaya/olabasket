<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

	echo "<!-------------- maaf anda dilarang melihat tag html situs ini -------------------------------------------------->";
	for($load=1;$load<=350;$load++){echo "\n";}
if($_GET[md5("page_halaman")]==md5("setup_website")){
switch($_GET[md5("proses")]){
case"":
break;

case md5("Simpan_Website"):
        $title=$_POST[md5("title")];
        $deskripsi=$_POST[md5("deskripsi")];
        $keyword=$_POST[md5("keyword")];
        $bar_1=$_POST[md5("bar_1")];
        $bar_2=$_POST[md5("bar_2")];
        $bar_3=$_POST[md5("bar_3")];
        $bar_4=$_POST[md5("bar_4")];
        if($title==""){pesan("Title website anda belum diisi.");}
        elseif($deskripsi==""){pesan("Deskripsi website anda belum diisi.");}
        elseif($keyword==""){pesan("Keyword website anda belum diisi.");}
        elseif($bar_1==""){pesan("Status 1 pada bar anda belum diisi.");}
        elseif($bar_2==""){pesan("Status 2 pada bar anda belum diisi.");}
        elseif($bar_3==""){pesan("Status 3 pada bar anda belum diisi.");}
        elseif($bar_4==""){pesan("Status 4 pada bar anda belum diisi.");}
        else{
                        $simpan_query=mysql_query("UPDATE v1_config SET title='$title',deskripsi='$deskripsi',keyword='$keyword',bar_1='$bar_1',bar_2='$bar_2',bar_3='$bar_3',bar_4='$bar_4' WHERE id like '$ide_site'",$sambungan);
                        if($simpan_query){pesan("Setingan Website anda telah dirubah.");}
                        else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }        
break;

case md5("Simpan_Perusahaan"):
        $perusahaan=$_POST[md5("perusahaan")];
        $dirut=$_POST[md5("dirut")];
        $ket=$_POST[md5("ket")];
        $motto=$_POST[md5("motto")];
        $alamat=$_POST[md5("alamat")];
        $website=$_POST[md5("website")];
        $email=$_POST[md5("email")];
        $phone=$_POST[md5("phone")];
        if($perusahaan==""){pesan("Perusahaan anda belum diisi.");}
        elseif($dirut==""){pesan("Direktur perusahaan anda belum diisi.");}
        elseif($ket==""){pesan("Keterangan perusahaan anda belum diisi.");}
        elseif($motto==""){pesan("Motto perusahaan anda belum diisi.");}
        elseif($alamat==""){pesan("Alamat perusahaan anda belum diisi.");}
        elseif($website==""){pesan("Website perusahaan anda belum diisi.");}
        elseif($email==""){pesan("Email perusahaan anda belum diisi.");}
        elseif($phone==""){pesan("Telephone perusahaan anda belum diisi.");}
        else{
                        $simpan_query=mysql_query("UPDATE v1_config SET perusahaan='$perusahaan',dirut='$dirut',ket='$ket',motto='$motto',alamat='$alamat',website='$website',email='$email',phone='$phone' WHERE id like '$ide_site'",$sambungan);
                        if($simpan_query){pesan("Setingan data perusahaan telah dirubah.");}
                        else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }        
break;

case md5("Simpan_Background"):
        $color_body=$_POST[md5("color_body")];
        if($color_body==""){pesan("Belum ada warna yang anda pilih.");}
        else{
                        $simpan_query=mysql_query("UPDATE v1_config SET color_body='$color_body' WHERE id like '$ide_site'",$sambungan);
                        if($simpan_query){pesan("Setingan Background telah dirubah.");}
                        else{pesan("Penyimpanan gagal, silahkan coba kembali.");}
        }
        $_GET[md5("page_halaman")]=md5("setup_background");
break;

}}



	$site=mysql_fetch_array(mysql_query("SELECT*FROM v1_config WHERE id like '$ide_site' ",$sambungan));
	echo"
	<html><head>
		<LINK  rel='SHORTCUT ICON' href='http://www.kavinkayu.com/newentry/new_v3/gambar/logo.gif'>
		<title>$site[title]</title>
		<meta name='google-site-verification' content='G5UF2Q-ojU9Yt1cYe-QQHwWNUrq7pbl1_yleI7iEMgs' />
		<meta http-equiv='Content-Type' content='text/html; charset=windows-1250'>
		<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
		<meta name='description' content='$site[deskripsi]' />
		<meta name='Keywords' content='$site[keyword]'>
		<meta name='Author' content='Heri Siswanto Bayu Nugroho (hsbn89@lordnet.webatu.com)'>
		<meta name='Copyright' content='Copyright @ 2010 LordNET Corporation (www.lordnet.tk). All rights reserved.'>
		<meta name='MSSmartTagsPreventParsing' content='true'>
		<meta http-equiv='Content-Language' content='en-us'>
		<link href='styler/style000.css' rel='stylesheet' type='text/css'>
                <link rel='stylesheet' href='styler/style001.css' type='text/css'>
                <script type='text/javascript' src='styler/ajax0000.js'></script>
		<SCRIPT language=javascript>function scrollit_r21(seed){

      var jd1 = '$site[bar_1] | '
      var jd2 ='$site[bar_2] | '
      var jd3 = '$site[bar_3] | '
      var jd4 = '$site[bar_4]       Copyright @ Agustus 2010 by www.lordnet.tk '
      ";
?>
      var msg=jd1+jd2+jd3+jd4;
      var out = "  ";
      var c = 1;
      if (seed > 100) {seed--;var cmd="scrollit_r21(" + seed +")";timerTwo=window.setTimeout(cmd,100);}
      else if (seed <= 100 && seed > 0) {for(c=0 ; c < seed ; c++) {out +="  ";}
                 out +=msg;
                 seed--;
                 var cmd="scrollit_r21(" +  seed + ")";
                 window.status=out;
                timerTwo=window.setTimeout(cmd,100);
     }else if (seed <=0) {
           if (-seed < msg.length){
                 out +=msg.substring(-seed, msg.length);
                 seed--;
                 var cmd="scrollit_r21(" + seed + ")";
                 window.status=out;
                 timerTwo=window.setTimeout(cmd,100);
         }
         else {
                 window.status="  ";
        timerTwo=window.setTimeout("scrollit_r21(100)",75);
                }
        }
}


</SCRIPT>
</head>


