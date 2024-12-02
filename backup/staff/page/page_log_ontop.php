<?php
echo"<form method=post action='index.php'>
<td align=right><div id='divtopcenterblank'>
<b>".$_SESSION["sessionnama"]."</b>&nbsp;&nbsp;&nbsp;
<a href='?destop=".md5("facebook")."' id='menu_top_link'>Facebook</a>&nbsp;&nbsp;
<input type=text id='inputsearch' name=".md5("resu").">
<input type=hidden name=".md5("logindata")." value='log'>
<input type=submit value='Go' id='inputsearchbutton'>&nbsp;&nbsp;
<a href='?' id='menu_top_link'>Beranda</a>
<a href='?destop=".md5("work")."' id='menu_top_link'>Work</a>
<a href='?".md5("logoutform")."=".md5("logout")."' id='menu_top_link'>Logout</a>
</div>
</td></form>
";
?>
