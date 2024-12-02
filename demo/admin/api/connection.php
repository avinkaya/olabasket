<?php
ob_start();
@session_start();
date_default_timezone_set('Asia/Kolkata');
require_once ('constant.php');
require_once ('PDODb.php');
define("LOCALDB", "olabasket_test_db");
define("LOCALHOSTNAME", 'localhost');
define("LOCALUSERNAME", 'olabasket_website');
define("LOCALPASSWORD", 'Olabasket@123_4');
define("ROOT", 'https://www.olabasket.com/demo/');
define("ADMIN_PANEL", ROOT.'admin/');
define("API_URL", ADMIN_PANEL.'api/api.php');
error_reporting(1);
$pdo = new PDO('mysql:dbname='.LOCALDB.';host='.LOCALHOSTNAME.'', LOCALUSERNAME, LOCALPASSWORD);
$db = new PDODb($pdo);
?>
