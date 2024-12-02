<?php
defined('www.kampungbudaya.co.cc_expresso') or die ("this file error, please back to home url as valid");

$tag_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'Gambar' ORDER By Rand() ",$sambungan);
$banyak=mysql_num_rows($tag_query);
if($banyak!=0){
echo"
<div id='metitle' align=left><b>Tautan</b></div>
<div id='tag' align=left>
";

while($tag=mysql_fetch_array($tag_query)){
if($tag['tautan']!=""){$a="<a href='http://$tag[tautan]' target=_blank>";$ba="</a>";}else{$a="";$ba="";}
        echo"$a $tag[isi] $ba<div style='height:2px'></div>";
}
echo"</div></form>";
}


$tag_query=mysql_query("SELECT*FROM v1_tag WHERE status like 'Tampil' AND mode like 'Flash' ORDER By Rand() LIMIT 0,1 ",$sambungan);
$banyak=mysql_num_rows($tag_query);
if($banyak!=0){
while($tag=mysql_fetch_array($tag_query)){
$tag['judul']=potong($tag['judul'],20);
echo"
<div id='metitle' align=left><b>$tag[judul]</b></div>
<div id='tag' align=left>
";

echo"$tag[isi]<div style='height:10px'></div>";
}
echo"</div>";
}


echo"
<div id='metitle' align=left><b>Counter</b></div>
<div id='tag' align=left>
<img src='http://s04.flagcounter.com/count/yhi/bg=FFFFFF/txt=000000/border=000000/columns=2/maxflags=18/viewers=New+Entry+Visitors/labels=1/pageviews=1/' alt='New Entry' border='0'>
<div style='height:10px'></div>
";

/*
Counter Page Website :<br>
<!-- Start of Globel Code -->
<CENTER>
<script language="JavaScript">
var count = "kopmaunnes";          // Change Your Account?
var type = "wgrneo";       // Change Your Counter Image?
var digits = "5";          // Change The Amount of Digits on Your Counter?
var prog = "hit";          // Change to Either hit/unique?
var statslink = "no";    // provide statistical link in counter yes/no?
var sitelink = "yes";     // provide link back to our site;~) yes/no?
var cntvisible = "yes"; // do you want counter visible yes/no?
</script>
<script language="JavaScript" src="http://005.free-counters.co.uk/count-084.js">
</script>
<noscript>
</noscript>
</CENTER>        


<div style='height:10px'></div>

</div>
*/
?>


