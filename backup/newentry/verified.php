<?php
include ("new_v4/config/config.php");
include ("new_v4/function/function_php.php");
$langsec=$_GET["langsec"];
$id=$_GET["id"];

dbase();
$numcheck=mysql_num_rows(mysql_query("SELECT*FROM vi_user WHERE id like '$id' LIMIT 0,1"));
if($numcheck==0){echo"null";}
else{
	$update=mysql_query("UPDATE vi_user SET status='Actives' WHERE status like 'Confirm' AND id like '$id' AND codeverifikasi like '$langsec'");
	if(!$update){
		echo"<script language='javascript'>window.alert('Sorry, your account not verified, please contact camelliahouse administrator for send verified code to your mail')</script>";
		echo"<meta http-equiv='refresh' content='1;url=http://www.kavinkayu.com/newentry'>";
	}
	else{
		echo"<script language='javascript'>window.alert('Your account has been verified. please login to sign in your account.')</script>";
		echo"<meta http-equiv='refresh' content='1;url=http://www.kavinkayu.com/newentry'>";
	}
}

dbase_close();

//	        header( 'Location: http://www.kavinkayu.com/newentry' );
?>
