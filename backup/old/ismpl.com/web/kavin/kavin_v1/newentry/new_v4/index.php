<?php
session_start();

include("config/config.php");
include("function/function_php.php");
include("template/".$_SESSION['themfolder']."/src/login_aksi.php");
atribut();
atas();
tengah();
bawah();

?>

