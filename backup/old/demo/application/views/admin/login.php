<?php
echo"
<!DOCTYPE html>

<html>
	<head>
		<meta charset='UTF-8'>
		<title>Indo Swiss Medicare Product Ltd | Administator</title>
		<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
		<link rel='stylesheet' href='".base_url("assets/admin/css/style_login.css")."'>
		
		<script>var base_url = '".base_url()."';</script>
		<script src=".base_url("assets/admin/jLib/jQuery/jQuery-2.1.4.min.js")."></script>
		<script src='".base_url("assets/admin/jController/CtrlSystem.js")."'></script>
		<script src='".base_url("assets/admin/jController/CtrlLogin.js")."'></script>
	</head>
	<body>
		<div class='body_top'>
			Indo Swiss Medicare Product
		</div>
		<form id='formLogin'>
		<div class='box_login'>
			Username :<br><br>
			<input type='text' name='username' placeholder='Insert your username' class='textbox'><br><br><br>
			
			Password :<br><br>
			<input type='password' name='password' placeholder='Insert your password' class='textbox'><br><br><br>
			
			<input id='btnLogin' type='button' value='Login' class='button'>
		</div>
		</form>
	</body>
</html>

<script>
	var ctrlLogin = new CtrlLogin();
	ctrlLogin.init();
</script>
";
?>