<?php
$QSliders = $this->db->get("tb_slider")->result();

echo"
	<div class='slider_default'>
			<ul id='slider'>
";

$no=0;
foreach($QSliders as $QSlider){
	echo"
			<li id='slider-item-1_s".$no."'>
				<img src='".base_url("assets/pic/sliders/".$QSlider->image)."' width='100%'>
			</li>
	";
	$no++;
}

echo"
			</ul>
		</div>
	";
?>