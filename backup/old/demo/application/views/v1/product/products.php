<?php

echo"
	<div class='body_default' align='center'>
			<div class='content' align='left'>
				<div class='box_title'>Products </div>
				
				<div class='box-products'>
					<table border='0' width='100%' cellpadding='0' cellspacing='0'>
						<tr valign='top'>
							<td width='250px' class='menu'>
								<ul>
";
	
	foreach($QCategoryParents as $QCategoryParent){
		echo"
			<li><a href='".base_url("product/products/".$QCategoryParent->id)."' style='color:black;text-decoration:none;'>".$QCategoryParent->name."</a></li>
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
							
							
								<div id='category_content_1' class='category_content visible'>
									<div class='box_title'>".$QCategory->name."</div>
									<div class='box_list'>
										<ul>
										
";
if(sizeOf($QProducts) > 0){
	foreach($QProducts as $QProduct){
		$QProductImage = $this->db->where("product_id",$QProduct->id)->get("tb_product_image")->row();
		
		$product_image = base_url("assets/image/img_default_photo.jpg");
		if(!empty($QProductImage)){
			if(@getimagesize(base_url("assets/pic/products/resize/".$QProductImage->image))){
				$product_image = base_url("assets/pic/products/resize/".$QProductImage->image);
			}
		}
		
		echo"
			<li>
				<a hre='#'>
					<div class='product_title' align='center'>".$QProduct->name."</div>
					<div class='".$cssBoxProduct."' style='background:url(".$product_image.");'></div>
					<div class='product_more' align='right'>Detail</div>
					<div class='product_code'>".$QProduct->code."</div>
				</a>
			</li>
		";
	}
}else{
	echo"<i style='color:#aaa'>Not found products for this category</i>";
}

echo"
										</ul>
									</div>
									<a class='box_more' align='center' style='display:none;'>[ Show More ]</a>
								</div>
								
";

if(sizeOf($QCategories) > 0){
	echo"
			<br><br><br>
			<div class='categories_content visible'>
				<div class='box_title'>Other category :</div>
				<div class='box_list'>
					<ul>
		";
		
		foreach($QCategories as $QCategory2){
			echo"
						<li>
							<a href='".base_url("product/products/".$QCategory2->id)."'>
								".$QCategory2->name."
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