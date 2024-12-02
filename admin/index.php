<?php
session_start();
if(!empty($_COOKIE['olabasket_admin_id'])){
    header('Location: dashboard.php');
}else{
    header('Location: login.php');
}
?>