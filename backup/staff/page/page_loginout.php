<?php
$userform=$_POST[md5("resu")];
$log=$_POST[md5("logindata")];
$logoutform=$_GET[md5("logoutform")];
if($log=="log"){
	if($userform==""){pesan("Anda belum mengisi username !");}
	else{
		$passform=md5($_POST[md5("drowssap")]);
		if($passform==""){pesan("Anda belum mengisi password");}else{
		        $querylog=mysql_query("SELECT*FROM user_data WHERE username like '$userform' AND password like '$passform'");
		        $user_log_num=mysql_num_rows($querylog);
		        if($user_log_num==0){pesan("Username atau password salah..");}
		        else{
				$user_log_data=mysql_fetch_array($querylog);
				$_SESSION["sessionid"]="$user_log_data[id]";
				$_SESSION["sessionnama"]="$user_log_data[nama]";
				$_SESSION["sessionidwewenang"]="$user_log_data[wewenang]";
				$wewenangdata=mysql_fetch_array(mysql_query("SELECT*FROM user_wewenang WHERE id like '$user_log_data[wewenang]'"));
				$_SESSION["sessionwewenang"]="$wewenangdata[wewenang]";
				pesan("Selamat datang ".$_SESSION["sessionnama"]);
			}
		        
		}
	}
}elseif($logoutform==md5("logout")){
	$_SESSION["sessionid"]=null;
	$_SESSION["sessionnama"]=null;
	$_SESSION["sessionwewenang"]=null;
	$_SESSION["sessionidwewenang"]=null;
}
?>
