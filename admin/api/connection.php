<?php
ob_start();
@session_start();
date_default_timezone_set('Asia/Kolkata');
require_once ('constant.php');
require_once ('PDODb.php');
define("LOCALDB", "olabasket_website");
define("LOCALHOSTNAME", 'localhost');
define("LOCALUSERNAME", 'root');
define("LOCALPASSWORD", '');
define("ROOT", 'https://www.olabasket.com/');
define("ADMIN_PANEL", ROOT.'admin/');
define("API_URL", ADMIN_PANEL.'api/api.php');
error_reporting(1);
$pdo = new PDO('mysql:dbname='.LOCALDB.';host='.LOCALHOSTNAME.'', LOCALUSERNAME, LOCALPASSWORD);
$db = new PDODb($pdo);
?>
