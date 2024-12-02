<?php
session_start();
if(isset($_GET['user_id'])){
    $_SESSION['olabasket_admin_id'] = $_GET['user_id'];
    setcookie("olabasket_admin_id",$_GET['user_id'],time() + (10 * 365 * 24 * 60 * 60), "/");
    $_SESSION['olabasket_admin_user_name'] = $_GET['user_name'];
    setcookie("olabasket_admin_user_name",$_GET['user_name'],time() + (10 * 365 * 24 * 60 * 60), "/");
    $_SESSION['olabasket_admin_user_type'] = $_GET['user_type'];
    setcookie("olabasket_admin_user_type",$_GET['user_type'],time() + (10 * 365 * 24 * 60 * 60), "/");
    header('Location: index.php');
}
?>
