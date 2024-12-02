<?php
session_start();
SWITCH($_GET["v"]){
Case"":
	$id=$_GET["id"];
	include("new_v4/config/config.php");
	include("new_v4/function/function_php.php");
	dbase();
	$data=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_berita WHERE id like '$id'"));
	$kategori=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_kategori WHERE id like '$data[id_kategori]'"));
	if($data[diskon!=0]){$dis="Diskon sampai $data[diskon]%";}else{$dis="";}
	echo"
		<html>
		<head>
		        <title>$kategori[nama] $data[judul] cuma Rp.$data[harga],- $dis</title>
			<meta name='description' content='Order melalui Email : camellia_house@yahoo.com. Kunjungi website kami di www.kavinkayu.com/newentry, dan kunjungi pula outlet - outlet kami. Kami juga menyediakan berbagai variasi fashion dan aksesoris.' />
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		</head><body>
<img src='new_v3/img_data/informasi/$data[avatar]' width=100px><br>
Kunjungi website kami di <a href='http://www.kavinkayu.com/newentry/'>www.kavinkayu.com/newentry/</a>
</body></html>
	";

	dbase_close();
Break;

Case"button":
        $id=$_GET["id"];
        //newentry/facebook.php?id=$id
	echo"
	        <div id='fb-root'></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = '//connect.facebook.net/id_ID/all.js#xfbml=1';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<div class='fb-like' data-href='http://www.kavinkayu.com/newentry/facebook.php?id=$id' data-send='true' data-layout='box_count' data-width='50' data-show-faces='true' data-font='arial'></div>

	";
Break;

Case"1":
echo"
<html>
		<head>
		        <title>Camellia House | Shop & Store Online | Solo, Java</title>
			<meta name='description' content='Selamat datang di Camellia House kami menyediakan berbagai macam fashion, aksesories, photograpy, dan lainnya. kunjungi website kami http://www.kavinkayu.com/newentry dan order barang yang anda sukai.' />
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		</head><body>
<img src='http://kavinkayu.com/newentry/new_v4/template/default/img_template/logo.gif' width=100px><br>
Kunjungi website kami di <a href='http://www.kavinkayu.com/newentry/'>www.kavinkayu.com/newentry/</a>
</body></html>
";
break;

Case"Produk0":
	$id=$_GET["id"];
	include("new_v4/config/config.php");
	include("new_v4/function/function_php.php");
	dbase();
	$data=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_berita WHERE id like '$id'"));
	$kategori=mysql_fetch_array(mysql_query("SELECT*FROM v1_informasi_kategori WHERE id like '$data[id_kategori]'"));
	if($data[diskon!=0]){$dis="Diskon sampai $data[diskon]%";}else{$dis="";}
	echo"
		<html>
		<head>
		        <title>$kategori[nama] $data[judul] cuma Rp.$data[harga],- $dis</title>
			<meta name='description' content='Order melalui Email : camellia_house@yahoo.com. Kunjungi website kami di www.kavinkayu.com/newentry, dan kunjungi pula outlet - outlet kami. Kami juga menyediakan berbagai variasi fashion dan aksesoris.' />
			<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		</head><body>
<img src='new_v3/img_data/informasi/$data[avatar]' width=100px><br>
Kunjungi website kami di <a href='http://www.kavinkayu.com/newentry/'>www.kavinkayu.com/newentry/</a>
</body></html>
	";

	dbase_close();
break;
}
?>
	