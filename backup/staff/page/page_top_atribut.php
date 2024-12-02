<?php
$gtitle=$_GET["title"];$ptitle=$_POST["title"];
if($gtitle =="" & $ptitle==""){$title="PT. Mulia Impex | Sistem Akun User - factory of Solo, Indonesia";}
elseif($ptitle!=""){$title="$ptitle";}
elseif($gtitle!=""){$title="$gtitle";}
echo"
<html><head>
<title>$title</title>
<link  rel='SHORTCUT ICON' href='avin.jpg'>
<meta name='google-site-verification' content='G5UF2Q-ojU9Yt1cYe-QQHwWNUrq7pbl1_yleI7iEMgs' />
<meta http-equiv='Content-Type' content='text/html; charset=windows-1250'>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1' />
<meta name='description' content='$description' />
<meta name='Keywords' content='$keyword'>
<meta name='Author' content='$author'>
<meta name='Copyright' content='$copyright'>
<meta name='MSSmartTagsPreventParsing' content='true'>
<meta http-equiv='Content-Language' content='en-us'>
<link rel='stylesheet' href='styler/impex_akun_style.css' type='text/css'>
<script type='text/javascript' src='styler/js.js'></script>
</head>";


echo"
<body style='margin:0 0 0 0;'><center>
<div id='divtop'>
<div id='divtopcenter' align=left>
<div style='height:5px'></div>
<table width=100% cellspacing=0 rowspacing=0>
<tr valign=top>
<td width=200px id='divtopcentertext' align=center><b>PT. Mulia Impex</b><br><small style='font-size:11px'>www.kavinkayu.com</small></td>
";
if($_SESSION["sessionid"]!="" & $_SESSION["sessionnama"]!="" ){include("page/page_log_ontop.php");}else{include("page/page_log_form.php");}

echo"
</tr>
</table>
</div>
</div>
";
?>
