<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");



$jam=date("h : i a");
$tanggal=date("d");
$bulan=date('m');
$tahun=date("Y");
$ip=$_SERVER['REMOTE_ADDR'];
$host=gethostbyaddr($_SERVER['REMOTE_ADDR']);





function suara($suara){
        echo"
              <script language=javascript> menu('face_wave/suara','suara=$suara','suara')</script>
       ";
}
function pesan($a){
		echo"<script language='javascript'>window.alert('$a')</script>";
}
function hari()
	{
	$input=date('D');
	if($input=='Sun'){$output='Minggu';}
	if($input=='Mon'){$output='Senin';}
	if($input=='Tue'){$output='Selasa';}
	if($input=='Wed'){$output='Rabu';}
	if($input=='Thu'){$output='Kamis';}
	if($input=='Fri'){$output='Jumat';}
	if($input=='Sat'){$output='Sabtu';}
	return $output;
}
$hari=hari();
function form($input)
	{
	$input=trim($input);
	$input=strip_tags($input);
	$input=addslashes($input);
	$input=stripslashes($input);
	$input=htmlentities($input);
//	$input=nl2br($input);
	$input=ltrim($input);
	$input=rtrim($input);
	return $input;
}
function potong($input,$limit)
	{
	if(strlen($input)>$limit)
		{
		$input=substr($input,0,($limit-3))."...";
		}
	return $input;
}
?>

<script language=javascript type="text/JavaScript">
var xmlHttp;
var peringatanSibuk = "<div style='position:fixed; left:0%; top:50%; width:100%' align=center><div style='padding:5 10 5 10;width:350px;border:solid 1px #4D7997;background:#4D7997;color:white'><b>Loading Process</b></div><div style='padding:10 10 10 10;width:350px;border:solid 1px #4D7997;background:white' align=center><img src='http://simawa.unnes.ac.id/simawa_v2/image/ajax-loader.gif'><br>Mohon tunggu sebentar ..</div></div>";
var peringatan_tidak_mendukung = 'Browser anda tidak mendukung AJAX';
function GetXmlHttpObject(){
	var xmlHttp = null;
	try{
		xmlHttp = new XMLHttpRequest();
	}catch(e){
		try
		{
			xmlHttp = new ActiveXObject("Msxml2.XMLHTTP.6.0");
		}
		catch(e)
		{
		}
		try{ xmlHttp = new ActiveXObject("Msxml2.XMLHTTP.3.0") }catch(e){}
		try{ xmlHttp = new ActiveXObject("Msxml2.XMLHTTP") }catch(e){}
		try{ xmlHttp = new ActiveXObject("Microsoft.XMLHTTP") }catch(e){}
	}
	return xmlHttp;
}


function menu(url,variabel,target){
	xmlHttp = GetXmlHttpObject();
	if(xmlHttp == null){
		alert(peringatan_tidak_mendukung);
		return
	}
	url = url + ".php?" + variabel + "&kue=" + Math.random();

	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4)	{
			document.getElementById(target).innerHTML = xmlHttp.responseText;
		}else if(xmlHttp.readyState == 1){
			document.getElementById(target).innerHTML = peringatanSibuk;
		}
	}
	xmlHttp.open('GET',url,true);
	xmlHttp.send(null);
}

function posting_var(url,variabel,target){
	xmlHttp = GetXmlHttpObject();
	if(xmlHttp == null){
		alert(peringatan_tidak_mendukung);
		return
	}
	var posting = variabel;
	url = url + '.php';
	xmlHttp.open('POST',url,true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", posting.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			document.getElementById(target).innerHTML = xmlHttp.responseText;
		}else if(xmlHttp.readyState == 1){
			document.getElementById(target).innerHTML = peringatanSibuk;
		}
	}
	xmlHttp.send(posting);
}
function postget(url,variabel,target){
	xmlHttp = GetXmlHttpObject();
	if(xmlHttp == null){
		alert(peringatan_tidak_mendukung);
		return
	}
	var posting = variabel;
	xmlHttp.open('POST',url,true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", posting.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			document.getElementById(target).innerHTML = xmlHttp.responseText;
		}else if(xmlHttp.readyState == 1){
			document.getElementById(target).innerHTML = peringatanSibuk;
		}
	}
	xmlHttp.send(posting);
}

function toogle_cek(target,str,peringatan_1,peringatan_2){
	xmlHttp = GetXmlHttpObject()
	if(xmlHttp == null){
		alert(peringatan_tidak_mendukung)
		return
	}
	var url = target + ".php?" + str + "&kue=" + Math.random();
	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4){
			if(xmlHttp.responseText == '1'){
				alert(peringatan_1);
			}else{
				alert(peringatan_2);
			}
		}
	}
	xmlHttp.open('GET',url,true);
	xmlHttp.send(null);
}
</script>
