<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

echo"  <form method=post action='?".md5("page_halaman")."=".md5("informasi_searching")."'>
        <div id='metitle' align=left><b>Cari berita</b></div>
        <div id='tag' align=left>
                Kata Kunci :<br>
                <input type=text name='".md5("isi")."' style='padding:7 7 7 7;width:110px;border:solid 1px #016f01'>
                <input type=submit value='Golek' style='padding:7 7 7 7;'><br><br>
       </div>
</center>
";
?>
