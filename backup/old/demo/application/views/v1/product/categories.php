<?php

echo"
	<div class='body_default' align='center'>
			<div class='content' align='left'>
				<div class='box_title'>Product Categories </div>
				
				<div class='box-products'>
					<table border='0' width='100%' cellpadding='0' cellspacing='0'>
						<tr valign='top'>
							<td width='250px' class='menu'>
								<ul>
";
	
	foreach($QCategoryParents as $QCategoryParent){
		echo"
			<li><a href='#div".$QCategoryParent->id."' style='color:black;text-decoration:none;'>".$QCategoryParent->name."</a></li>
		";
	}
		
echo"
								</ul>
								<br><br><br>
								
								<div class='category_content'>
									<div class='box_title'>Meet us at:</div>
									<div style='border-bottom:solid 1px #f1f1f1;font-size:12px;padding:0px 10px 10px 10px;'>
										<b>Indo Medicare Expo 2015</b><br>
										06<sup>th</sup> to 08<sup>th</sup> Aug, 2015 at <br>
										JIExpo, Kemayoran,<br>
										Jakarta, Indonesia<br>
									</div>&nbsp;
									
									<div style='border-bottom:solid 1px #f1f1f1;font-size:12px;padding:0px 10px 10px 10px;'>
										<b>Medica 2015</b><br>
										16<sup>th</sup> to 19<sup>th</sup> Nov, 2015 at <br>
										Dusseldorf, Germany
									</div>&nbsp;
									
									<div style='border-bottom:solid 1px #f1f1f1;font-size:12px;padding:0px 10px 10px 10px;'>
										<b>Arab Health 2016</b><br>
										25<sup>th</sup> to 28<sup>th</sup> Jan, 2016 at <br>
										Dubai International Convention <br>
										& Exhibition Centre,<br>
										Dubai, U.A.E
									</div>
								</div>
							</td>
							<td width='15px'>&nbsp;</td>
							<td>
";
							
							
	foreach($QCategoryParents as $QCategoryParent){
		$QCategories = $this->db->where("category_id",$QCategoryParent->id)->where("active",1)->get("ms_category")->result();
		
		echo"
			<div id='div".$QCategoryParent->id."' class='categories_content visible'>
				<a href='".base_url("product/products/".$QCategoryParent->id)."'><div class='box_title'>".$QCategoryParent->name."</div></a>
				<div class='box_list'>
					<ul>
		";
		
		foreach($QCategories as $QCategory){
			echo"
						<li>
							<a href='".base_url("product/products/".$QCategory->id)."'>
								".$QCategory->name."
							</a>
						</li>
			";
		}
		
		echo"	
					</ul>
				</div>
			</div><br><br>
		";
	}

echo"
								
							</td>
						</tr>
					</table>
				</div>
			</div>			
		</div><br><br>
	";
?>