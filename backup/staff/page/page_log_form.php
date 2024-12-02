<?php
echo"<form method=post action='index.php'>
<td align=right><div id='divtopcenterblank'>
Username
<input type=text id='inputsearch' name=".md5("resu").">&nbsp;&nbsp;Password
<input type=password id='inputsearch' name=".md5("drowssap").">
<input type=hidden name=".md5("logindata")." value='log'>
<input type=submit value='Login' id='inputsearchbutton'>&nbsp;&nbsp;
</div>
</td></form>
";
?>
