<?php

echo"
	<div class='body_default' align='center'>
		<div class='content' align='left'>
			<div class='box_title'>Contact Us </div>
			<table border='0' width='100%' cellspacing='0' cellpadding='0'>
				<tr valign='top'>
					<td width='50%'>
						<div align='center'>
							<img src='".base_url("assets/image/icon.png")."' height='150px'>
						</div><br><br>
						
						For more information about ISMP, you can contact our marketing team at :<br><br>
						
						<b style='font-size:16px;font-family:verdana;display:block;margin-bottom:10px;'>Regd. Office :-</b>
						<b style='font-size:14px;'>Indo Swiss Medicare Products</b><br>
						5/72, Vikas Nagar, Lucknow, <br>
						U.P - 226022<br>
						India<br><br>
						
						Tech Sales Director :<br>
						<b>Neeraj Srivastava</b><br>
						Ph : +62-82225335105<br><br><br>
						
						<b style='font-size:16px;font-family:verdana;display:block;margin-bottom:10px;'>Indonesia Office :-</b>
						<b style='font-size:14px;'>Indo Swiss Medicare Products</b><br>
						Jl. Solo - Sragen Km 9.5, Palur,<br>
						Karanganyar, Solo - 57771<br>
						Indonesia<br><br>
						
						Sales Rep. :<br>
						<b>Ms. Armalita</b><br>
						Ph : +62-271-821102 | Fax : +62-271-821360<br><br><br>
						
						<b style='font-size:16px;font-family:verdana;display:block;margin-bottom:10px;'>Vietnam Office :-</b>
						<b style='font-size:14px;'>Indo Swiss Medicare Products</b><br>
						No. 10 Lane 4, Thaodien Ward, <br>
						District Two, Hochiminh City,<br>
						Vietnam<br><br>
						
						Resident Rep :<br>
						<b>Chinh Truong</b><br><br><br>
						
						<b style='font-size:16px;font-family:verdana;display:block;margin-bottom:10px;'>Factories :</b>
						<table collspan='0' collpadding='0'>
							<tr>
								<td width='200px'>
									Unit - I : <br>
									Plot No 149, First Floor,<br>
									Badli, Delhi - 110042<br>
									India
								</td>
								<td>
									Unit - II : <br>
									4/21, Ajanta Compound,<br>
									Loni Road Industrial Area, Side-II,<br>
									Mohan Nagar, Gaziabad UP, India
								</td>
							</tr>
						</table>
					</td>
					<td width='50%'>
						<div style='background:#fafafa;border-radius:15px;padding:10px;'>
						<form id='formMessage'>
							<div style='font-size:16px;border-bottom:solid 1px #cccccc;padding-bottom:10px;margin-bottom:20px;' align='center'><i>SEND MESSAGE</i></div>
							Name :<br>
							<input type='text' name='txtName' placeholder='Your full name' style='width:100%;padding:10px;'><br><br>
							
							Email :<br>
							<input type='text' name='txtEmail' placeholder='Your email address' style='width:100%;padding:10px;'><br><br>
							
							Message :<br>
							<textarea name='txtMessage' placeholder='Write your message' style='width:100%;height:150px;padding:10px;'></textarea><br><br>
							<input type='button' id='btnSend' value='Send' style='padding:7px;width:100px;'/>
							<span id='lblContactNotif'></span>
						</form>
						</div>
					</td>
				</tr>
			</table>
		</div>			
	</div><br><br>
	
	<script>
		var ctrlContact = new CtrlContact();
		ctrlContact.init();
	</script>
";

?>