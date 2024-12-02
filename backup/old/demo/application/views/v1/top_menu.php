<?php

echo"
	<div class='menu_default' align='center'>
			<div class='content' align='left'>
				<div class='search'>
					<input type='text' placeholder='Search products ..' >
				</div>
				<ul>
					<li align='center'><a href='".base_url()."' class='icon-home' style='border-left:solid 1px #555;'>HOME</a></li>
					<li align='center'><a href='".base_url("product")."' class='icon-product'>PRODUCTS</a></li>
					<li align='center'><a href='".base_url("contact")."' class='icon-contact'>CONTACT US</a></li>
				</ul>
			</div>
		</div><br>
	";
?>