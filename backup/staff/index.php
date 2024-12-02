<?php
session_start();
include("page/dbase_conection.php");
include("page/page_function.php");
include("page/page_loginout.php");
include("page/page_top_atribut.php");

if($_SESSION["sessionid"]==""){include("page/page_home_log.php");}
else{
	switch($_GET["destop"]){
		case"":
		        include("page/page_home_user.php");
		break;
		case md5("akun"):
		        include("page/page_home_akun.php");
		break;
		case md5("work"):
		        include("page/page_home_work.php");
		break;
                case md5("facebook"):
		        include("page/page_facebook_wall.php");
		break;
	}
}

include("page/page_bottom.php");
?>

