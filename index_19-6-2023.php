<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '1'");
$meta_title = isset($fetchSeoData['0']['meta_title']) ? $fetchSeoData['0']['meta_title'] : "";
$meta_description = isset($fetchSeoData['0']['meta_description']) ? $fetchSeoData['0']['meta_description'] : "";
$meta_keywords = isset($fetchSeoData['0']['meta_keywords']) ? $fetchSeoData['0']['meta_keywords'] : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $meta_title; ?></title>
	<meta name="description" content="<?= $meta_description; ?>">
	<meta name="keywords" content="<?= $meta_keywords; ?>">
	<meta name="author" content="Ola Basket">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
	<!-- Mobile Specific Meta -->

	<meta itemprop="name" content="<?= $meta_title; ?>">
    <meta itemprop="description" content="<?= $meta_description; ?>">
    <meta itemprop="url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta itemprop="image" content="<?= ADMIN_PANEL.UPLOAD.'olabasket.png'; ?>">

	<meta property="og:title" content="<?= $meta_title; ?>"/>
    <meta property="og:type" content="Import Export"/>
    <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <meta property="og:image" content="<?= ADMIN_PANEL.UPLOAD.'olabasket.png'; ?>"/>
    <meta property="og:site_name" content="Ola Basket"/>
    <meta property="fb:admins" content="Ola Basket"/>
    <meta property="og:description"
          content="<?= $meta_description; ?>"/>


	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/css/flaticon.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="stylesheet" href="assets/css/video.min.css">
	<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="assets/css/rs6.css">
	<link rel="stylesheet" href="assets/css/slick.css">
	<link rel="stylesheet" href="assets/css/slick-theme.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="organio-wrapper">
    <div id="preloader"></div>
	<?php
        require_once './header.php';
        ?>
<!-- Start of Banner section
	============================================= -->
	<section id="or-banner" class="or-banner-section" data-background="assets/img/banner.jpg">
		<div class="or-banner-content position-relative">
			<div class="container">
				<div class="or-banner-slider">
					<div class="or-banner-slider-item-wrapper headline-2 pera-content text-center">
						<div class="or-banner-slider-item">
							<h1>
                                                            <?= $labelData['LBL_BANNER_TITLE']; ?>
							</h1>
                                                    <p>
                                                        <?= $labelData['LBL_BANNER_DESCRIPTION']; ?>
                                                    </p>
							<div class="or-banner-btn d-flex justify-content-center">
                                                            <a href="catalogue.php"><?= $labelData['LBL_PRODUCT_CATALOGUE']; ?></a>
								<a href="<?= $call_us_now; ?>"><?= $labelData['LBL_BTN_CALL_US_NOW']; ?></a>
							</div>
						</div>
					</div>
<!--					<div class="or-banner-slider-item-wrapper headline-2 pera-content text-center">
						<div class="or-banner-slider-item">
							<h1>Always Fresh & <span>Organic</span>
							Vegetables</h1>
							<p>Our  Job is to filling  Your Tummy  with Delicious Healthy  Food
							and Fast free Delivery. </p>
							<div class="or-banner-btn d-flex justify-content-center">
								<a href="#">Shop Now</a>
								<a href="#">About us</a>
							</div>
						</div>
					</div>
					<div class="or-banner-slider-item-wrapper headline-2 pera-content text-center">
						<div class="or-banner-slider-item">
							<h1>Always Fresh & <span>Organic</span>
							Vegetables</h1>
							<p>Our  Job is to filling  Your Tummy  with Delicious Healthy  Food
							and Fast free Delivery. </p>
							<div class="or-banner-btn d-flex justify-content-center">
								<a href="#">Shop Now</a>
								<a href="#">About us</a>
							</div>
						</div>
					</div>-->
				</div>
			</div>
<!--			<div class="banner-deco-img position-absolute">
                            <img src="assets/img/banner.jpg" alt="">
			</div>-->
		</div>
	</section>
<!-- End of Banner section
	============================================= -->

<!-- Start of Feeatur section
	============================================= -->
<!--	<section id="or-feature" class="or-feature-section">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
				<h2>Our Special <span>Features</span></h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			</div>
			<div class="or-feature-content position-relative">
				<span class="section-deco1 position-absolute"><img src="assets/img/deco1.png" alt=""></span>
				<span class="section-deco2 position-absolute"><img src="assets/img/deco2.png" alt=""></span>
				<span class="section-deco3 position-absolute"><img src="assets/img/deco3.png" alt=""></span>
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
								<img src="assets/img/icon/ft-icon1.png" alt="">
							</div>
							<div class="or-feature-text">
								<h3>Fresh Organic Vegetable</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do dunt ut labore.</p>
								<a href="service-single.html">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
								<img src="assets/img/icon/ft-icon2.png" alt="">
							</div>
							<div class="or-feature-text">
								<h3>Fast & Easy Grocery Delivery</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do dunt ut labore.</p>
								<a href="service-single.html">Learn More</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
								<img src="assets/img/icon/ft-icon3.png" alt="">
							</div>
							<div class="or-feature-text">
								<h3>Very Easy Payment System</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do dunt ut labore.</p>
								<a href="service-single.html">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of Feeatur section
	============================================= -->

		<section id="or-feature" class="or-feature-section">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
				<h2><?= $labelData['LBL_POPULAR']; ?> <span><?= $labelData['LBL_CATEGORY']; ?></span></h2>
				<p><?= $labelData['LBL_POPULAR_CATEGORY_DESCRIPTION']; ?></p>
			</div>
			<div class="or-feature-content position-relative">
				<span class="section-deco1 position-absolute"><img src="assets/img/deco1.png" alt=""></span>
				<span class="section-deco2 position-absolute"><img src="assets/img/deco2.png" alt=""></span>
				<span class="section-deco3 position-absolute"><img src="assets/img/deco3.png" alt=""></span>
				<div class="row justify-content-center">
					<?php
$fetchCategoryData = array();
$fetchCategoryData = $db->rawQuery("SELECT CM.* FROM ".CATEGORY." CM WHERE CM.is_deleted = '0' AND CM.is_active = '1' ORDER BY CM.category_index IS NULL,CM.category_index ASC");
if(count($fetchCategoryData) > 0){
    for($i=0;$i<count($fetchCategoryData);$i++){
        $category_id  = $fetchCategoryData[$i]['category_id'];
        $category_name = $fetchCategoryData[$i]['category_name'];
        $category_slug = $fetchCategoryData[$i]['category_slug'];
        $category_image = ADMIN_PANEL.$fetchCategoryData[$i]['category_image'];
        $category_remark = $fetchCategoryData[$i]['category_remark'];
        $category_index = $fetchCategoryData[$i]['category_index'];
        $is_active = $fetchCategoryData[$i]['is_active'];
        $is_deleted = $fetchCategoryData[$i]['is_deleted'];
        ?>
					<div class="col-lg-4 col-md-6">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
                                                            <img src="<?= $category_image; ?>" style="width: 200px;" alt="<?= $category_name; ?>">
							</div>
							<div class="or-feature-text">
<!--								<h3><?= $category_name; ?></h3>-->
								<p><?= $category_remark; ?></p>
                                                                <a href="products/<?= $category_slug; ?>">
                                                                    <img src="assets/img/icon/arrow2.png" alt="">&nbsp; <?= $labelData['LBL_BROWSE']; ?>
                                                                </a>
							</div>
						</div>
					</div>
                                    <?php
    }
}
?>
				</div>
			</div>
		</div>
	</section>


<!-- Start of Category section
	============================================= -->
<!--	<section id="or-popular-category" class="or-popular-category-section">
		<div class="container">
			<div class="or-popular-category-top-content d-flex justify-content-between align-items-end">
				<div class="or-section-title-3 pera-content headline-2">
					<h2>Popular <span>Category</span></h2>
					<p>We have our clients in more than 30 countries and have regularly exported Garments , Furniture from our own manufacturing units based in Central Jawa Indonesia.</p>
				</div>
				<div class="carousel_nav  clearfix">
					<button type="button" class="or-pop-cat-left_arrow"><i class="far fa-chevron-left"></i></button>
					<button type="button" class="or-pop-cat-right_arrow"><i class="far fa-chevron-right"></i></button>
				</div>
			</div>
			<div class="or-popular-category-slider-area">
				<div class="or-popular-category-slider-wrap">
					<div class="or-popular-cat-slider">
						<?php
$fetchCategoryData = array();
$fetchCategoryData = $db->rawQuery("SELECT CM.* FROM ".CATEGORY." CM WHERE CM.is_deleted = '0' AND CM.is_active = '1' ORDER BY CM.category_index IS NULL,CM.category_index ASC");
if(count($fetchCategoryData) > 0){
    for($i=0;$i<count($fetchCategoryData);$i++){
        $category_id  = $fetchCategoryData[$i]['category_id'];
        $category_name = $fetchCategoryData[$i]['category_name'];
        $category_image = ADMIN_PANEL.$fetchCategoryData[$i]['category_image'];
        $category_remark = $fetchCategoryData[$i]['category_remark'];
        $category_index = $fetchCategoryData[$i]['category_index'];
        $is_active = $fetchCategoryData[$i]['is_active'];
        $is_deleted = $fetchCategoryData[$i]['is_deleted'];
        ?>
						<div class="organio-inner-item">
							<div class="or-p-cat-innerbox headline-2">
								<a href="#">
									<div class="or-p-cat-img">
										<img src="<?= $category_image; ?>" alt="<?= $category_name; ?>">
									</div>
									<h3>  <?= $category_name; ?></h3>
								</a>
							</div>
						</div>
						<?php
                                                }
                                                }
                                                ?>
					</div>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of Category section
	============================================= -->



<!-- Start of CTA  section
	============================================= -->
<!--	<section id="or-cta" class="or-cta-section">
		<div class="container">
			<div class="or-cta-content" data-background="assets/img/myavin_app.png">
				<div class="or-cta-text text-center headline-2 pera-content">
					<p>Start from <span>$04.99</span></p>
					<h3>Organic Food up to 20% off</h3>
					<a class="d-flex justify-content-center align-items-center" href="#">Contact Us</a>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of CTA  section
	============================================= -->

<!-- Start of About us section
	============================================= -->
	<section id="or-about-1" class="or-about-section-1">
		<div class="container">
			<div class="or-about-content-1 position-relative">
				<div class="or-about-img-1 position-absolute" style="left: 0px;">
                                    <img src="assets/img/installation.png" alt="">
				</div>
				<div class="or-about-text-area  d-flex justify-content-end">
					<div class="or-about-img-text-wrapper-1">
                                                <div class="or-section-title-3 pera-content headline-2">
					            <h2><?= $labelData['LBL_ABOUT_OLABASKET']; ?></h2>
					            <p><?= $labelData['LBL_ABOUT_US']; ?></p>
				                </div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of About Us section
	============================================= -->
<br/>
<!-- Start of Category section
	============================================= -->
	<section id="or-category-1" class="or-category-section-1">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
				<h2><?= $labelData['LBL_FEATURED_PRODUCTS']; ?></h2>
<!--				<p>We have the skilled and qualified staffs to install the security system protects your place and introduced you new technology.</p>-->
			</div>
			<div class="or-category-content">
				<div class="or-category-slider-wrapper position-relative">
					<div class="or-category-slider-area">
<?php
$fetchProductData = $db->rawQuery("SELECT PM.*"
. ",(SELECT category_name FROM ".CATEGORY." WHERE category_id = PM.category_id) AS category_name "
. "FROM ".PRODUCT." PM WHERE PM.is_deleted = '0' AND PM.is_popular = '1' AND PM.is_active = '1' ORDER BY PM.product_index IS NULL,PM.product_index ASC");
if(count($fetchProductData) > 0){
    for($i=0;$i<count($fetchProductData);$i++){
        $product_id  = $fetchProductData[$i]['product_id'];
        $category_id = $fetchProductData[$i]['category_id'];
        $product_name = $fetchProductData[$i]['product_name'];
        $product_slug = $fetchProductData[$i]['product_slug'];
        $product_image = ADMIN_PANEL.$fetchProductData[$i]['product_image'];
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
								<div class="position-relative">
									<img src="<?= $product_image; ?>" alt="">
									<!-- <div class="cat-latter position-absolute text-uppercase">V</div> -->
								</div>
								<div class="or-category-text headline pera-content">
									<h3><?= $product_name; ?> </h3>
									<p><?= $product_short_description; ?></p>
									<div class="item-more position-relative">
										<a href="product_details/<?= $product_slug; ?>"><i class="icon-first far fa-long-arrow-right"></i> <?= $labelData['LBL_VIEW']; ?> <i class="icon-last far fa-long-arrow-right"></i></a>
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
						<button type="button" class="or-category-left_arrow"><img src="assets/img/icon/arrow1.png" alt=""></button>
						<button type="button" class="or-category-right_arrow"><img src="assets/img/icon/arrow2.png" alt=""></button>
					</div>
				</div>
			</div>
		</div>
	</section>				
<!-- End of Category section
	============================================= -->

<section id="or-cta" class="or-cta-section">
		<div class="container">
			<div class="or-popular-category-top-content d-flex justify-content-between align-items-end">
				<div class="or-section-title-3 pera-content headline-2">
					<h2><?= $labelData['LBL_ASSOCIATED_LINKS']; ?></h2>
<!--					<p>We have our clients in more than 30 countries and have regularly exported Garments , Furniture from our own manufacturing units based in Central Jawa Indonesia.</p>-->
				</div>
			</div>
                    <br/>
                    <div class="container">
                        <a href="https://myavin.com/id/" target="_blank">
                                <img src="assets/img/myavin_app.png" />
                                </a>
                        <br/>
                        <br/>
                        <br/>
                        <a href="http://myavin.co.id/" target="_blank">
                                <img src="assets/img/myavin_technologies.png" />
                        </a>
                            </div>
		</div>
	</section>


<!-- Start of Trending product  section
	============================================= -->
<!--	<section id="or-trending-product" class="or-trending-product-section">
		<div class="container">
			<div class="or-trending-product-top d-flex justify-content-between align-items-end">
				<div class="or-section-title-3 pera-content headline-2">
					<h2>Trending <span>Products</span></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				</div>
				<div class="or-trending-item-filter-btn ul-li">
					<ul id="filters" class="nav-gallery">
						<li class="filtr-button filtr-active" data-filter="all">All Product</li>
						<li class="filtr-button" data-filter="1">Fresh Fruits</li>
						<li class="filtr-button" data-filter="2">Nature</li>
						<li class="filtr-button" data-filter="3">Recpies </li>
						<li class="filtr-button" data-filter="4">Vegetable </li>
					</ul>
				</div>
			</div>
			<div class="or-trending-item-wrapper filtr-container row">
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="1, 3, 4" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp2.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Fresh Orange</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="2, 3, 4" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp1.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Red Apple Envy</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="1, 2, 4" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp3.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Green Bow</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="2, 1, 3" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp4.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Organic Lemon</a></h3>
							<span>$12.00 <del>$15.00</del> </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="2, 3, 4" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp5.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Organic Carrot</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="4, 1, 2" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp6.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Organic Cabbage</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="1, 3, 4" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp7.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Organic Potato</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6 filtr-item" data-category="1, 3, 5" data-sort="Busy streets">
					<div class="or-trending-product-item text-center">
						<div class="or-trend-item-img position-relative">
							<img src="assets/img/product/tp8.png" alt="">
							<div class="e-commerce-btn">
								<a href="#"><i class="fal fa-shopping-cart"></i></a>
								<a href="#"><i class="fal fa-heart"></i></a>
								<a href="#"><i class="fal fa-eye"></i></a>
							</div>
						</div>
						<div class="or-trend-item-text headline-2">
							<h3><a href="shop-single.html">Organic Peas</a></h3>
							<span>$12.00 – $65.00 </span>
							<a class="add-cart-btn" href="cart.html">Add To Cart</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of Trending product  section
	============================================= -->

<!-- Start of Best Deal  section
	============================================= -->
<!--	<section id="or-best-deal-3" class="or-best-deal-section-3" data-background="assets/img/bg/deal-bg2.jpg">
		<div class="container">
			<div class="or-deal-content-3 headline-2 pera-content">
				<h2>Deals Of The <span>Weeks!</span></h2>
				<p>Organio is a design studio founded in London. Nowadays, we’ve grown and expanded our services, and have become a multinational firm.</p>
				<div class="best-deal-countdown ul-li">
					<ul>
						<li class="days">
							<span class="or-count-down-number"></span>
							<span class="count-unit">Days</span>
						</li>

						<li class="hours">
							<span class="or-count-down-number"></span>
							<span class="count-unit">Hours</span>
						</li>

						<li class="minutes">
							<span class="or-count-down-number"></span>
							<span class="count-unit">Mins</span>
						</li>

						<li class="seconds">
							<span class="or-count-down-number"></span>
							<span class="count-unit">Sec</span>
						</li>
					</ul>
				</div>
				<a href="shop.html">Shop Now</a>
			</div>
		</div>
	</section>-->
<!-- End of Best Deal  section
	============================================= -->

<!-- Start of CTA  section
	============================================= -->
<!--	<section id="or-cta" class="or-cta-section">
		<div class="container">
			<div class="or-cta-content" data-background="assets/img/myavin_technologies.png">
				<div class="or-cta-text text-center headline-2 pera-content">
					<p>Start from <span>$04.99</span></p>
					<h3>Organic Food up to 20% off</h3>
					<a class="d-flex justify-content-center align-items-center" href="#">Contact Us</a>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of CTA  section
	============================================= -->

<!-- Start of team  section
	============================================= -->
	<section id="or-team-2" class="or-team-section-2" style="padding-top: 50px;">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
				<h2><?= $labelData['LBL_OUR_EXPERT_TEAM']; ?></h2>
<!--				<p>We have the skilled and qualified staffs to install the security system protects your place and introduced you new technology.</p>-->
			</div>
			<div class="or-team-content">
				<div class="or-team-content-area">
					<div class="or-team-slider">
						<?php
                                                                    $fetchTeamData = array();
$fetchTeamData = $db->rawQuery("SELECT TM.* FROM ".TEAM." TM WHERE TM.is_deleted = '0' AND TM.is_active = '1' ORDER BY TM.team_id ASC");
if(count($fetchTeamData) > 0){
    for($i=0;$i<count($fetchTeamData);$i++){
        $team_id  = $fetchTeamData[$i]['team_id'];
        $team_name = $fetchTeamData[$i]['team_name'];
        $team_designation = $fetchTeamData[$i]['team_designation'];
        $team_image = ADMIN_PANEL.$fetchTeamData[$i]['team_image'];
        $team_remark = $fetchTeamData[$i]['team_remark'];
        $is_active = $fetchTeamData[$i]['is_active'];
        $is_deleted = $fetchTeamData[$i]['is_deleted'];
        ?>
                                            <div class="organio-inner-item">
							<div class="or-team-innerbox">
								<div class="or-team-img position-relative">
									<img src="<?= $team_image; ?>" alt="<?= $team_name; ?>">
								</div>
								<div class="or-taam-item-holder">
									<div class="or-team-meta text-center headline position-relative">
										<h3><a href="#"><?= $team_name; ?></a></h3>
										<span><?= $team_designation; ?></span>
										<div class="team-item-side-img">
											<img class="side-img" src="assets/img/icon/t-icon2.png" alt="">
											<img class="side-img" src="assets/img/icon/t-icon1.png" alt="">
										</div>
									</div>
									<div class="or-team-text-social pera-content text-center">
										<p><?= $team_remark; ?></p>
<!--										<div class="or-team-social">
											<a href="#"><i class="fab fa-facebook-f"></i></a>
											<a href="#"><i class="fab fa-twitter"></i></a>
											<a href="#"><i class="fab fa-dribbble"></i></a>
											<a href="#"><i class="fab fa-behance"></i></a>
										</div>-->
									</div>
								</div>
							</div>
                                                </div>
                                                    <?php
    }
}
?>
					</div>
				</div>
		</div>
	</section>
<!-- End of team  section
	============================================= -->
	<!-- Start of Blog section
	============================================= -->
	<section id="or-blog" class="or-blog-section position-relative">
		<span class="or-deco1 position-absolute" data-parallax='{"y" : 80}'><img src="assets/img/leaf1.png" alt=""></span>
		<span class="or-deco2 position-absolute" data-parallax='{"y" : -60}'><img src="assets/img/leaf2.png" alt=""></span>
		<div class="container">
		<div class="or-section-title-3 text-center pera-content headline-2">
				<h2><?= $labelData['LBL_OUR_LATEST_EVENT']; ?></h2>
<!--				<p>We have the skilled and qualified staffs to install the security system protects your place and introduced you new technology.</p>-->
			</div>
			<div class="or-blog-content">
				<div class="row">
				<?php
                                                                    $fetchEventData = array();
$fetchEventData = $db->rawQuery("SELECT EM.* FROM ".EVENT." EM WHERE EM.is_deleted = '0' AND EM.is_active = '1' ORDER BY EM.event_id DESC LIMIT 0,3");
if(count($fetchEventData) > 0){
    for($i=0;$i<count($fetchEventData);$i++){
        $event_id  = $fetchEventData[$i]['event_id'];
        $event_name = $fetchEventData[$i]['event_name'];
        $event_slug = $fetchEventData[$i]['event_slug'];
        $event_image = ADMIN_PANEL.$fetchEventData[$i]['event_image'];
        $event_description = $fetchEventData[$i]['event_description'];
        $event_date = date("M d, Y", strtotime($fetchEventData[$i]['event_date']));
        $event_time = date("h:i:s A", strtotime($fetchEventData[$i]['event_time']));
        $is_active = $fetchEventData[$i]['is_active'];
        $is_deleted = $fetchEventData[$i]['is_deleted'];
        ?>
					<div class="col-lg-4 col-md-6">
		<a href="event_details/<?= $event_slug; ?>">
						<div class="or-blog-innerbox">
							<div class="or-blog-img position-relative">
								<img src="<?= $event_image; ?>" alt="">
							</div>
							<div class="or-blog-text headline position-relative">
								<div class="blog-meta">
									<a href="#"><i class="fas fa-calendar-alt"></i> On <?= $event_date; ?></a>
									<br/>
									<a href="#"><i class="fas fa-user"></i> By Admin</a>
								</div>
								<h3>
									<a href="event_details/<?= $event_slug; ?>">
							    <?= $event_name; ?>  
								</a>
							</h3>
								<div class="blog-more-comment d-flex justify-content-between">
									<a class="read-more" href="event_details/<?= $event_slug; ?>"><?= $labelData['LBL_READ_MORE']; ?> <i class="far fa-chevron-right"></i></a>
									<a class="commnet" href="#"><i class="fas fa-clock"></i><?= $event_time; ?></a>
								</div>
							</div>
						</div>
								</a>
					</div>
<?php
	}
}
?>
				</div>
				<div class="or-blog-btn">
					<a class="d-flex justify-content-center align-items-center" href="event.php"> <?= $labelData['LBL_VIEW_ALL']; ?> <i class="far fa-long-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</section>
<!-- End of Blog section
	============================================= -->

<!-- Start of Testimonial  section
	============================================= -->
<!--	<section id="or-testimonial-2" class="or-testimonial-section-2" data-background="assets/img/bg/h5-bg-testimonial1.png">
		<div class="container">
			<div class="or-testimonial-content-2">
				<div class="row">
					<div class="col-lg-6">
						<div class="or-testimonial-img-2 text-center">
                                                    <img src="assets/img/testimonial_banner.png" alt="" style="width: 390px;">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="or-testimonial-text-2 headline-2 pera-content">
							<h2>What our Clients are 
								<span>Saying</span>
							</h2>
							<div class="or-testimonial-slider-content-2 position-relative">
								<span class="quote-icon position-absolute"><i class="fas fa-quote-right"></i></span>
								<div class="or-testimonial-slider-2">
									<div class="or-testimonial-item-2">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
										<div class="testimonial-meta">
											<h3>Leslile Alexnder</h3>
											<span>CEO/ Founder</span>
										</div>
									</div>
									<div class="or-testimonial-item-2">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
										<div class="testimonial-meta">
											<h3>Leslile Alexnder</h3>
											<span>CEO/ Founder</span>
										</div>
									</div>
									<div class="or-testimonial-item-2">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan.</p>
										<div class="testimonial-meta">
											<h3>Leslile Alexnder</h3>
											<span>CEO/ Founder</span>
										</div>
									</div>
								</div>
								<div class="carousel_nav  clearfix">
									<button type="button" class="or-tst-cat-left_arrow"><i class="far fa-chevron-left"></i></button>
									<button type="button" class="or-tst-cat-right_arrow"><i class="far fa-chevron-right"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of Testimonial  section
	============================================= -->

<!-- Start of blog  section
	============================================= -->
<!--	<section id="or-blog-3" class="or-blog-section-3">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
				<h2><span>Latest</span> News & Blog</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
			</div>
			<div class="or-blog-content-3">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-4 col-md-6">
							<div class="or-blog-innerbox-3">
								<div class="or-blog-img">
									<img src="assets/img/blog/blg2.1.jpg" alt="">
								</div>
								<div class="or-blog-text">
									<div class="or-blog-meta d-flex justify-content-between">
										<a href="#"><i class="fas fa-tags"></i> Organic Food</a>
										<a href="#"><i class="fas fa-calendar-alt"></i> 1/17/2021</a>
									</div>
									<div class="or-blog-title headline-2">
										<h3><a href="blog-single.html">What Should Know About
											Detox Water
										</a></h3>
										<a class="read-more" href="blog-single.html">Learn More</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="or-blog-innerbox-3">
								<div class="or-blog-img">
									<img src="assets/img/blog/blg2.2.jpg" alt="">
								</div>
								<div class="or-blog-text">
									<div class="or-blog-meta d-flex justify-content-between">
										<a href="#"><i class="fas fa-tags"></i> Organic Food</a>
										<a href="#"><i class="fas fa-calendar-alt"></i> 1/17/2021</a>
									</div>
									<div class="or-blog-title headline-2">
										<h3><a href="blog-single.html">Better Hot Drink Elegant 
											Can Order By Online
										</a></h3>
										<a class="read-more" href="blog-single.html">Learn More</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="or-blog-innerbox-3">
								<div class="or-blog-img">
									<img src="assets/img/blog/blg2.3.jpg" alt="">
								</div>
								<div class="or-blog-text">
									<div class="or-blog-meta d-flex justify-content-between">
										<a href="#"><i class="fas fa-tags"></i> Organic Food</a>
										<a href="#"><i class="fas fa-calendar-alt"></i> 1/17/2021</a>
									</div>
									<div class="or-blog-title headline-2">
										<h3><a href="blog-single.html">Role Genetics In Treating
											Low-Grade Glioma
										</a></h3>
										<a class="read-more" href="blog-single.html">Learn More</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="or-blog-btn-3">
						<a href="blog.html">View More</a>
					</div>
				</div>
			</div>
		</div>
	</section>-->
<!-- End of blog  section
	============================================= -->
<?php
require_once './footer.php';
?>
	<!-- For Js Library -->
	<script src="assets/js/jquery.min.js"></script>
        <script>
            setTimeout(function() {
               $("#preloader").hide();
            }, 3000);
        </script>
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
	<script src="assets/js/parallax-scroll.js"></script>
	<script src="assets/js/rbtools.min.js"></script>
	<script src="assets/js/rs6.min.js"></script>
	<script src="assets/js/script.js"></script>
</body>
</html>			
