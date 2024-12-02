<?php
@session_start();
if(!empty($_COOKIE['olabasket_admin_id'])){
    unset($_SESSION['olabasket_admin_id']);
    setcookie('olabasket_admin_id', null, -1, '/'); 
    unset($_SESSION['olabasket_admin_user_name']);
    setcookie('olabasket_admin_user_name', null, -1, '/'); 
    unset($_SESSION['olabasket_admin_user_type']);
    setcookie('olabasket_admin_user_type', null, -1, '/'); 
}
header('Location: login.php');
?>