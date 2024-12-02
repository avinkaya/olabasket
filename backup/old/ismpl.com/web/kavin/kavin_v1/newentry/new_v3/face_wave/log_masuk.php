<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");
session_start();
srand(time());
@header("Cache-control: private");
$a1= chr(rand(ord("a"), ord("z")));
$a2= chr(rand(ord("A"), ord("Z")));
$a3= chr(rand(ord("0"), ord("9")));
$a4= chr(rand(ord("11"), ord("20")));
$a5= chr(rand(ord("0"), ord("5")));
$a6= chr(rand(ord("a"), ord("h")));
$sec_l="$a1$a2$a3$a4$a5";
session_is_registered ('serverkeamanan');
$_SESSION["serverkeamanan"]="$sec_l";
$sec_y=$_SESSION["serverkeamanan"];

echo"
        <form method=post action='?".md5("page_halaman")."=".md5("login_session")."'>
        <div style='padding:7 10 6 10;font-size:16px;background-image: url(gambar/bg_title.jpg);border:solid 1px #EAEAEA' align=left><b>Login System</b></div>
        <div style='padding:10 10 10 10;border:solid 1px #EAEAEA;font-size:12px;' align=left>
        <table cellspacing=3 cellpadding=3 border=0>
        <tr valign=top><td>
                Username :<br><input type=text name='".md5("UsernamE")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:300px;'><br><br><br>
                Password :<br><input type=password name='".md5("PassworD")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:300px;'><br><br><br>
            </td>
	    <td>
		Keamanan :<br><div align=center style='border:solid 1px #fafafa;padding:5 5 5 5;font-size:15px'><b>$sec_y</div>
		<div style='height:18px'></div>
		Masukkan kode diatas
                <input type=text name='".md5("Security")."' style='padding:5 5 5 5;border:solid 1px #EAEAEA;font-size:15px;color:black;width:120px;'>
	    </td>


         </tr></table>
                <input type=submit value='Login' style='padding:10 10 10 10;width:100px'>&nbsp;&nbsp;<input type=reset value='Hapus' style='padding:10 10 10 10;;width:100px'>&nbsp;&nbsp;
        </div></form><div style='height:20px'></div>
";
include("face_wave/user_tambah.php");
?>
