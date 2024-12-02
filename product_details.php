<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';
$fetchProductData = array();
if(isset($_REQUEST['token'])){
    $product_slug = $_REQUEST['token'];
    $fetchProductData = $db->rawQuery("SELECT PM.*"
        . ",(SELECT category_name FROM ".CATEGORY." WHERE category_id = PM.category_id) AS category_name "
        . "FROM ".PRODUCT." PM WHERE PM.is_deleted = '0' AND PM.is_active = '1' AND PM.product_slug = '".$product_slug."'");
    if(count($fetchProductData) > 0){
        $product_id  = $fetchProductData['0']['product_id'];
        $category_id = $fetchProductData['0']['category_id'];
        $product_name = $fetchProductData['0']['product_name'];
        $product_image = ADMIN_PANEL.$fetchProductData['0']['product_image'];
        $product_inner_image_1 = ADMIN_PANEL.$fetchProductData['0']['product_inner_image_1'];
        $product_inner_image_2 = ADMIN_PANEL.$fetchProductData['0']['product_inner_image_2'];
        $product_inner_image_3 = ADMIN_PANEL.$fetchProductData['0']['product_inner_image_3'];
        $product_inner_image_4 = ADMIN_PANEL.$fetchProductData['0']['product_inner_image_4'];
        $product_short_description = $fetchProductData['0']['product_short_description'];
        $product_video_url = $fetchProductData['0']['product_video_url'];
        $product_description = $fetchProductData['0']['product_description'];
        $product_catalogue = $fetchProductData['0']['product_catalogue'];
        $product_code = $fetchProductData['0']['product_code'];
        $is_available = $fetchProductData['0']['is_available'];
        $category_name_details = $fetchProductData['0']['category_name'];
        $is_active = $fetchProductData['0']['is_active'];

		$fetchCategoryProductData = array();
		$fetchCategoryProductData = $db->rawQuery("SELECT product_slug FROM ".PRODUCT." WHERE is_deleted = '0' AND is_active = '1' AND category_id = '".$category_id."'");
		$product_slug_arr = array();
		if(count($fetchCategoryProductData) > 0){
			for($i=0;$i<count($fetchCategoryProductData);$i++){
               $product_slug_arr[] = $fetchCategoryProductData[$i]['product_slug'];
			}
		}
		$max_key = max(array_keys($product_slug_arr));
		$min_key = min(array_keys($product_slug_arr));
		$product_slug_position = array_search($product_slug, $product_slug_arr);
		if(isset($product_slug_position)){
			if($product_slug_position != $max_key){
			    $product_slug_next = $product_slug_arr[$product_slug_position + 1];
			}else{
			    $product_slug_next = $product_slug_arr[$max_key];
			}
			if($product_slug_position != $min_key){
				$product_slug_prev = $product_slug_arr[$product_slug_position - 1];
			}else{
			    $product_slug_prev = $product_slug_arr[$min_key];
			}
		}
    }else{
        echo "<script>alert('Sorry !!! This Product Is Temporarily Unavailable.');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}else{
    echo "<script>alert('Please Enter Valid Details.');</script>";
    echo "<script>window.location='products.php';</script>";
}

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '8'");
$meta_title = isset($fetchSeoData['0']['meta_title']) ? $fetchSeoData['0']['meta_title'] : "";
$meta_description = isset($fetchSeoData['0']['meta_description']) ? $fetchSeoData['0']['meta_description'] : "";
$meta_keywords = isset($fetchSeoData['0']['meta_keywords']) ? $fetchSeoData['0']['meta_keywords'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $whitelist = array(
    '127.0.0.1',
    '::1'
);

if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    // not valid
}else{
    ?>
    <base href="/">
    <?php
}
?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= str_replace("{#PRODUCT_NAME#}",$product_name,$meta_title); ?></title>
	<meta name="description" content="<?= str_replace("{#PRODUCT_SHORT_DESCRIPTION#}",$product_short_description,$meta_description); ?>">
	<meta name="keywords" content="<?= $meta_keywords; ?>">
	<meta name="author" content="Ola Basket">

	<meta itemprop="name" content="<?= str_replace("{#PRODUCT_NAME#}",$product_name,$meta_title); ?>">
    <meta itemprop="description" content="<?= str_replace("{#PRODUCT_SHORT_DESCRIPTION#}",$product_short_description,$meta_description); ?>">
    <meta itemprop="url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta itemprop="image" content="<?= $product_image; ?>">

	<meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@olabasket">
    <meta name="twitter:title" content="<?= str_replace("{#PRODUCT_NAME#}",$product_name,$meta_title); ?>">
    <meta name="twitter:description" content="<?= str_replace("{#PRODUCT_SHORT_DESCRIPTION#}",$product_short_description,$meta_description); ?>">
    <meta name="twitter:creator" content="@Ola Basket">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="<?= $product_image; ?>">
    

	<meta property="og:title" content="<?= str_replace("{#PRODUCT_NAME#}",$product_name,$meta_title); ?>"/>
    <meta property="og:type" content="Import Export"/>
    <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <meta property="og:image" content="<?= $product_image; ?>"/>
    <meta property="og:site_name" content="Ola Basket"/>
    <meta property="fb:admins" content="Ola Basket"/>
    <meta property="og:description"
          content="<?= str_replace("{#PRODUCT_SHORT_DESCRIPTION#}",$product_short_description,$meta_description); ?>"/>

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
	<!-- Mobile Specific Meta -->

	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/video.min.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/css/rs6.css">
	<link rel="stylesheet" href="assets/css/zoomit.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<link rel="stylesheet" href="assets/css/style.css">
        <style>
.zoomit-zoomed {
    top: 0;
    left: 0;
    opacity: 0;
    z-index: 5;
    position: absolute;
    width: auto !important;
    height: auto !important;
    max-width: none !important;
    max-height: none !important;
    min-width: 222% !important;
    min-height: 222% !important;
}
.product_arrow {
	top: 66% !important;
	position: fixed;
	width: 66px !important;
    height: 66px !important;
}
        </style>
</head>
<body class="organio-wrapper">
	<?php
        require_once './header.php';
        ?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/header_all.webp" style="padding-top: 70px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				<div class="page-title headline"><h1><?= $labelData['LBL_PRODUCTS_DETAILS_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
						<li><a href="#"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_PRODUCT']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of Shop Details section
	============================================= -->
	<section id="or-shop-details" class="or-shop-details-section">
		<div class="container">
			<div class="or-shop-details-content">
			<div class="row">
			<div class="carousel_nav">
				<!--<div class="col-6">
					<?php if($product_slug_position != $min_key){ ?>
								<button onclick="window.location='product_details.php?token=<?= $product_slug_prev; ?>'" type="button" class="or-category-left_arrow product_arrow slick-arrow" style="display: block;"><img src="assets/img/icon/arrow1.png" alt=""></button>
				<?php } ?>
							</div>
				<div class="col-6">
					<?php if($product_slug_position != $max_key){ ?>
								<button type="button" onclick="window.location='product_details.php?token=<?= $product_slug_next; ?>'" class="or-category-right_arrow product_arrow slick-arrow" style="display: block;"><!--<img src="assets/img/icon/arrow2.png" alt=""></button
							<?php } ?>
							</div>-->
				</div>
</div>
				<div class="row">
                                    <div class="col-lg-1"></div>
					<div class="col-lg-5">
						<div class="shop-details-img-slider-area">
							<div class="shop-details-img-slider">
								<div class="shop-details-img-wrap">
									<img src="<?= $product_image; ?>" alt="" data-zoomed="<?= $product_image; ?>">
								</div>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_1'])){ ?>
								<div class="shop-details-img-wrap">
									<img src="<?= $product_inner_image_1; ?>" alt="" data-zoomed="<?= $product_inner_image_1; ?>">
								</div>
                                                            <?php } ?>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_2'])){ ?>
								<div class="shop-details-img-wrap">
									<img src="<?= $product_inner_image_2; ?>" alt="" data-zoomed="<?= $product_inner_image_2; ?>">
								</div>
                                                            <?php } ?>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_3'])){ ?>
								<div class="shop-details-img-wrap">
									<img src="<?= $product_inner_image_3; ?>" alt="" data-zoomed="<?= $product_inner_image_3; ?>">
								</div>
                                                            <?php } ?>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_4'])){ ?>
								<div class="shop-details-img-wrap">
									<img src="<?= $product_inner_image_4; ?>" alt="" data-zoomed="<?= $product_inner_image_4; ?>">
								</div>
                                                            <?php } ?>
							</div>
							<div class="shop-details-img-thumb">
								<div class="or-thumb-img">
									<img src="<?= $product_image; ?>" alt="">
								</div>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_1'])){ ?>
								<div class="or-thumb-img">
									<img src="<?= $product_inner_image_1; ?>" alt="">
								</div>
                                                            <?php } ?>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_2'])){ ?>
								<div class="or-thumb-img">
									<img src="<?= $product_inner_image_2; ?>" alt="">
								</div>
                                                            <?php } ?>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_3'])){ ?>
								<div class="or-thumb-img">
									<img src="<?= $product_inner_image_3; ?>" alt="">
								</div>
                                                            <?php } ?>
                                                            <?php if(!empty($fetchProductData['0']['product_inner_image_4'])){ ?>
								<div class="or-thumb-img">
									<img src="<?= $product_inner_image_4; ?>" alt="">
								</div>
                                                            <?php } ?>
							</div>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="shop-details-text  headline pera-content">
							<div class="shop-details-title">
								<h3><?= $product_name; ?></h3>
							</div>
							<div class="shop-details-rate-review ul-li d-flex">
<!--								<div class="shop-details-rate">
									<ul>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
										<li><i class="fas fa-star"></i></li>
									</ul>
								</div>
								<div class="shop-details-review">(4.9 Based on 02 Reviews)</div>
								<div class="shop-details-review"><span>02 Reviews</span> <span>24 orders</span></div>-->
							</div>
<!--							<div class="shop-details-price">US $3.525-$7.15</div>-->
							<div class="shop-details-text-decs">
								<?= $product_short_description; ?>
							</div>
<!--							<div class="shop-details-option color-option ul-li">
								<span class="option-title">Color:</span>
								<ul>
									<li class="color-1 active"></li>
									<li class="color-2"></li>
									<li class="color-3"></li>
									<li class="color-4"></li>
								</ul>
							</div>-->
<!--							<div class="shop-details-option">
								<span class="option-title">Quantity:</span>
								<div class="shop-quantity-option d-flex">
									<div class="quantity-field position-relative  d-inline-block">
										<input type="text" name="select1" value="1" class="quantity-input-arrow quantity-input-2  text-center">
									</div>
									<div class="stock-avaiable">85 pieces available </div>
								</div>
							</div>-->
<!--							<div class="shop-details-btn ">
								<a href="#">Add To Cart</a>
								<a href="#">Add To Wishlist</a>
							</div>-->
<!--							<div class="shop-details-btn ">
								<a href="#">Add To Cart</a>
								<a href="#">Add To Wishlist</a>
							</div>-->

							<div class="shop-details-product-code ul-li-block">
								<ul>	
									<li><span><?= $labelData['LBL_SKU']; ?>: </span> <?= $product_code; ?></li>
									<li><span><?= $labelData['LBL_CATEGORY']; ?>: </span><?= $category_name_details; ?></li>
								</ul>	
							</div>

							<div class="shop-details-product-code ul-li-block">
							<button class="btn btn-primary"><?= $labelData['LBL_PRODUCT_DESCRIPTION']; ?></button>
							<br/>

									<div class="shop-details-description-text" style="padding-top: 20px;">
								<?= $product_description; ?>
							</div>
							</div>
						</div>
					</div>
                                    <div class="col-lg-1"></div>
				</div>
				
			</div>
		</div>
	</section>
		<section id="or-category-1" class="or-category-section-1">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
			    <h2>
					<? echo "Other Product's"; ?>
					</span>
				</h2>
				<!-- <h2>
					<?php 
					//$labelData['LBL_FEATURED_PRODUCTS']; 
					?>
				</h2> -->
				<!--				<p>We have the skilled and qualified staffs to install the security system protects your place and introduced you new technology.</p>-->
			</div>
			<div class="row">
				<!-- <div class="col-sm-3">
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />
					<br />
					<p>
						<?php 
						//$labelData['LBL_FEATURED_PRODUCTS_DESCRIPTION']; 
						?>
					</p>
				</div> -->
				<div class="col-sm-12">
					<div class="or-category-content">
						<div class="or-category-slider-wrapper position-relative">
							<div class="or-category-slider-area">
								<?php
								$fetchProductData = $db->rawQuery("SELECT PM.*"
									. ",(SELECT category_name FROM " . CATEGORY . " WHERE category_id = PM.category_id) AS category_name "
									. "FROM " . PRODUCT . " PM WHERE PM.is_deleted = '0' AND PM.is_popular = '1' AND PM.is_active = '1' ORDER BY PM.product_index IS NULL,PM.product_index ASC");
								if (count($fetchProductData) > 0) {
									for ($i = 0; $i < count($fetchProductData); $i++) {
										$product_id = $fetchProductData[$i]['product_id'];
										$category_id = $fetchProductData[$i]['category_id'];
										$product_name = $fetchProductData[$i]['product_name'];
										$product_slug = $fetchProductData[$i]['product_slug'];
										$product_image = ADMIN_PANEL . $fetchProductData[$i]['product_image'];
										$product_short_description = $fetchProductData[$i]['product_short_description'];
										$product_description = $fetchProductData[$i]['product_description'];
										$product_code = $fetchProductData[$i]['product_code'];
										$product_video_url = $fetchProductData[$i]['product_video_url'];
										$is_available = $fetchProductData[$i]['is_available'];
										$category_name = $fetchProductData[$i]['category_name'];
										$is_active = $fetchProductData[$i]['is_active'];
										?>
										<div class="organio-inner-item">
											<div class="or-category-slider-inner-item text-center position-relative type-1">
												<div class="position-relative sliderHome">
													<img src="<?= $product_image; ?>" alt="">
													<!-- <div class="cat-latter position-absolute text-uppercase">V</div> -->
												</div>
												<div class="or-category-text headline pera-content">
													<h6>
														<?= $product_name; ?>
													</h6>
													<p>
														<?= $product_short_description; ?>
													</p>
													<div class="item-more position-relative">
														<a href="product_details/<?= $product_slug; ?>"><i
																class="icon-first far fa-long-arrow-right"></i>
															<?= $labelData['LBL_VIEW']; ?> <i
																class="icon-last far fa-long-arrow-right"></i>
														</a>
													</div>
												</div>
											</div>
										</div>
										<?php
									}
								}
								?>
							</div>
							<div class="carousel_nav  clearfix">
								<button type="button" class="or-category-left_arrow"><img
										src="assets/img/icon/arrow1.png" alt=""></button>
								<button type="button" class="or-category-right_arrow"><img
										src="assets/img/icon/arrow2.png" alt=""></button>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>
<!-- End of Shop Details section
	============================================= -->

<!-- Start of Shop details description tab section
	============================================= -->
	<section id="or-shop-details-tab" class="or-shop-details-tab-section">
		<div class="container">
			<div class="or-shop-details-review-tab-content">
				<div class="or-shop-review-tab-btn">
					<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<!-- <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><?= $labelData['LBL_PRODUCT_DESCRIPTION']; ?></button> -->
						</li>
                                                <?php if(!empty($product_video_url)){ ?>
                                                    <li class="nav-item" role="presentation">
							<button class="nav-link active" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false"><?= $labelData['LBL_PRODUCT_VIDEO']; ?></button>
						    </li>
                                                <?php } ?>
<!--						<li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Additional info</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Review (02)</button>
						</li>-->
					</ul>
				</div>
				<div class="or-shop-details-tab-textarea">
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
							<div class="shop-details-description-text  text-center">
								<?= $product_description; ?>
							</div>
						</div>
						<div class="tab-pane fade <?php if(!empty($product_video_url)){ ?>show active<?php } ?>" id="video" role="tabpanel" aria-labelledby="video-tab">
							<div class="product-description-text pera-content">
								<iframe width="100%" height="500" src="<?= $product_video_url; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</div>
						</div>
						<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
							<div class="product-description-text pera-content">
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
								<p>
									It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ‘lorem ipsum’ will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).
								</p>
								<table class="table-responsive">
									<tr>
										<td class="desc-title">Model</td>
										<td class="desc-value">Microsoft Surface Pro 6</td>
									</tr>
									<tr>
										<td class="desc-title">Processor</td>
										<td class="desc-value">Intel Core i3-8145U Processor (4M Cache, up to 3.90 GHz)</td>
									</tr>
									<tr>
										<td class="desc-title">Display</td>
										<td class="desc-value">	14" HD (1366x768) Anti-Glare, Non-Touch, WVA</td>
									</tr>
									<tr>
										<td class="desc-title">Memory</td>
										<td class="desc-value">	4GB DDR4 Non-ECC RAM</td>
									</tr>
									<tr>
										<td class="desc-title">Storage</td>
										<td class="desc-value">1TB 5400rpm HDD</td>
									</tr>
									<tr>
										<td class="desc-title">Graphics</td>
										<td class="desc-value">Intel UHD Graphics 620</td>
									</tr>
									<tr>
										<td class="desc-title">Battery</td>
										<td class="desc-value">3 Cell 42Whr ExpressChargeTM Capable Battery</td>
									</tr>
									<tr>
										<td class="desc-title">Adapter</td>
										<td class="desc-value">1 x 4.5mm adapter</td>
									</tr>
									<tr>
										<td class="desc-title">Audio</td>
										<td class="desc-value">Integrated digital array microphone</td>
									</tr>
									<tr>
										<td class="desc-title">Special Feature</td>
										<td class="desc-value">Finger Print Security</td>
									</tr>
									<tr>
										<td class="desc-title">Keyboard</td>
										<td class="desc-value">Single Pointing Backlit Keyboard</td>
									</tr>
									<tr>
										<td class="desc-title">WebCam</td>
										<td class="desc-value">Yes</td>
									</tr>

									<tr>
										<td class="desc-title">Card Reader</td>
										<td class="desc-value">1x SD 3.0 Memory card reader</td>
									</tr>
									<tr>
										<td class="desc-title">Wi-Fi</td>
										<td class="desc-value">Intel® Dual Band Wireless AC 9560 (802.11ac) 2x2</td>
									</tr>
									<tr>
										<td class="desc-title">Bluetooth</td>
										<td class="desc-value">Bluetooth 5.0</td>
									</tr>
									<tr>
										<td class="desc-title">HDMI</td>
										<td class="desc-value">1 x HDMI 1.4</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
							<div class="review-comment-area">
								<div class="review-buyer-box">
									<div class="buyer-review-inner clearfix">
										<div class="buyer-review-pic float-left">
											<img src="assets/img/blog/blg-c1.jpg" alt="">
										</div>
										<div class="buyer-review-text headline">
											<h4>James Fread</h4>
											<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. onsequat.Malorum” (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular </span>
											<div class="buyer-review-rate d-inline-block">
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
											</div>
											<div class="buyer-review-date position-relative d-inline-block">
												19 Oct 2021
											</div>
										</div>
									</div>
									<div class="buyer-review-inner clearfix">
										<div class="buyer-review-pic float-left">
											<img src="assets/img/blog/blg-c2.jpg" alt="">
										</div>
										<div class="buyer-review-text headline">
											<h4>James Fread</h4>
											<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. onsequat.Malorum” (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular </span>
											<div class="buyer-review-rate d-inline-block">
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
												<a href="#"><i class="fas fa-star"></i></a>
											</div>
											<div class="buyer-review-date position-relative d-inline-block">
												19 Oct 2021
											</div>
										</div>
									</div>
								</div>
								<div class="buyer-review-comment-box headline">
									<h4 class="float-left">Add Review:</h4>
									<div class="customer-rate-option ul-li float-left">
										<ul>
											<li>
												<label class="customer-rate-option">
													<input type="checkbox" name="#" class="customer-rate" checked="">
													<span class="rate-value"></span>
												</label>
											</li>
											<li>
												<label class="customer-rate-option">
													<input type="checkbox" name="#" class="customer-rate" checked="">
													<span class="rate-value"></span>
												</label>
											</li>
											<li>
												<label class="customer-rate-option">
													<input type="checkbox" name="#" class="customer-rate" checked="">
													<span class="rate-value"></span>
												</label>
											</li>
											<li>
												<label class="customer-rate-option">
													<input type="checkbox" name="#" class="customer-rate" checked="">
													<span class="rate-value"></span>
												</label>
											</li>
											<li>
												<label class="customer-rate-option">
													<input type="checkbox" name="#" class="customer-rate">
													<span class="rate-value"></span>
												</label>
											</li>
										</ul>
									</div>
									<form id="buyer-review" action="#">
										<textarea placeholder="Write Your Review"></textarea>
										<input type="text" name="name" placeholder="Your Name...">
										<input type="email" name="email" placeholder="Your Email...">
										<button type="submit">Submit</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End Shop details description tab section
	============================================= -->				
<?php
require_once './footer.php';
?>


	<!-- For Js Library -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/appear.js"></script>
	<script src="assets/js/slick.js"></script>
	<script src="assets/js/jquery.counterup.min.js"></script>
	<script src="assets/js/waypoints.min.js"></script>
	<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="assets/js/jquery.zoomit.min.js"></script>
	<script src="assets/js/jquery.inputarrow.js"></script>
	<script src="assets/js/parallax-scroll.js"></script>
	<script src="assets/js/rbtools.min.js"></script>
	<script src="assets/js/rs6.min.js"></script>
	<script src="assets/js/script.js"></script>	
</body>
</html>			