<?php
echo"
<script language=javascript>
function textin(){
	if(document.status1.statusbar.value='Tulis catatan anda disini ..'){document.status1.statusbar.value='';}
}
</script>
	<div style='height:20px;'></div>
	<table width=100%>
	<tr valign=top width=507px>
		<td id='stylestandart'>
			<img src='images/icon-update.jpg' align=middle> <small>Pesan singkat</small><br>
			<div id='fb-root'></div>
			<script>(
			function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) {return;}
				  js = d.createElement(s); js.id = id;
				  js.src = '//connect.facebook.net/en_US/all.js#xfbml=1';
				  fjs.parentNode.insertBefore(js, fjs);
			}
			(document, 'script', 'facebook-jssdk'));</script>
			<div class='fb-comments' data-href='www.kavinkayu.com/Staff/?title=Factory Forum Management | PT. Mulia Impex, Solo - Indonesia' data-num-posts='50' data-width='505'></div>
		</td>
		<td>
	";
	include("page/page_iklan.php");
echo"		</td>
	</tr>
	</table>
";
?>
