<?php
$olabasket_lang = isset($_COOKIE['olabasket_lang']) ? $_COOKIE['olabasket_lang'] : "EN";
if (!empty($olabasket_lang)) {
	$fetchLabelData = $labelData = array();
	$fetchLabelData = $db->rawQuery("SELECT label_name,label_value_" . $olabasket_lang . " AS label_value FROM " . LABEL . " WHERE is_deleted = '0' AND is_active = '1'");
	if (count($fetchLabelData) > 0) {
		for ($l = 0; $l < count($fetchLabelData); $l++) {
			$label_name = $fetchLabelData[$l]['label_name'];
			$label_value = $fetchLabelData[$l]['label_value'];
			$labelData[$label_name] = $label_value;
		}
	}
}
//print_r();
//print_r($labelData);die;

/*if($olabasket_lang == "IN"){
require_once './indonesian.php';
}else{
require_once './english.php';
}*/

function isMobile()
{
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
// Use the function
if (isMobile()) {
	//$call_us_now = "tel:062816672904";
	$call_us_now = "https://wa.me/62816672904";
} else {
	$call_us_now = "contact_us.php";
}
?>
<style>
	.or-team-innerbox .team-item-side-img .side-img:nth-child(1) {
		left: -48px;
	}

	.or-team-innerbox .team-item-side-img .side-img:nth-child(2) {
		right: -47px;
	}

	.or-team-innerbox .team-item-side-img .side-img {
		top: 19px;
		position: absolute;
	}

	.or-breadcrumbs-section .background_overlay {
		background-color: initial;
	}

	.organio-header-section.header-style-three .main-navigation-area li {
		margin-left: 25px;
	}

	.olabasket_lang {
		background-color: #fea620;
	}

	.organio-wrapper {
		color: #010148;
	}
</style>

<!--    <div id="preloader"></div>
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>-->
<!-- Start of header section
	============================================= -->
<header id="organio-header" class="organio-header-section header-style-three">
	<div class="or-header-top">
		<div class="container">
			<div class="or-header-top-content d-flex justify-content-between align-items-center">
				<div class="or-header-top-slug">
					<a href="<?= $call_us_now; ?>"><i class="fas fa-phone-alt"></i> +62 81 6672904</a>
					&nbsp;&nbsp;
					<a href="mailto:info@olabasket.com"><i class="fas fa-envelope"></i> info@olabasket.com</a>
				</div>
				<div class="or-header-top-social1">
					<a href="https://www.facebook.com/people/Olabasket/100084045827685/" target="_blank">
						<img src="assets/img/facebook.png" />
					</a>
					<a href="#">
						<img src="assets/img/twitter.png" />
					</a>
					<a href="https://www.instagram.com/olabasketofficial/" target="_blank">
						<img src="assets/img/instagram.png" />
					</a>
					<a href="#">
						<img src="assets/img/youtube.png" />
					</a>
				</div>
				<!--					<div class="or-header-top-social">
						<a href="#"><i class="fab fa-facebook-f"></i></a>
						<a href="#"><i class="fab fa-twitter"></i></a>
						<a href="#"><i class="fab fa-dribbble"></i></a>
						<a href="#"><i class="fab fa-behance"></i></a>
					</div>-->
				<div class="or-header-top-login-btn position-relative1">
					<!--                                                <a href="<?= $call_us_now; ?>">+ 62 81 6672904</a>
						<a href="mailto:info@olabasket.com">info@olabasket.com</a>-->
					<!--						<a href="login.html">Login</a>
						<a href="register.html">Sign In</a>-->
					<a href="#" lang="EN" onclick="return changeLanguage(this);"
						class="<?php if ($olabasket_lang == "EN") {
							echo "olabasket_lang";
						} ?>">English</a>
					<a href="#" lang="IN" onclick="return changeLanguage(this);"
						class="<?php if ($olabasket_lang == "IN") {
							echo "olabasket_lang";
						} ?>">Indonesian</a>
					<a href="#" lang="AR" onclick="return changeLanguage(this);"
						class="<?php if ($olabasket_lang == "AR") {
							echo "olabasket_lang";
						} ?>">Arabic</a>
				</div>
			</div>
		</div>
	</div>
	<div class="or-header-main-menu">
		<div class="container">
			<div class="or-header-main-menu-content d-flex justify-content-between align-items-center">
				<div class="site-logo">
					<a href="index.php"><img src="assets/img/logo.png" style="width: 240px;" alt=""></a>
				</div>
				<div class="or-header-main-navigation-btn d-flex">
					<nav class="main-navigation-area clearfix ul-li">
						<ul class="menu-navigation">
							<li>
								<a href="index.php">
									<?= $labelData['LBL_MENU_HOME']; ?>
								</a>
							</li>
							<li>
								<a href="about_us.php">
									<?= $labelData['LBL_MENU_ABOUT_US']; ?>
								</a>
							</li>
							<li>
								<a href="csr.php">
									<?= $labelData['LBL_MENU_CSR']; ?>
								</a>
							</li>
							<li class="dropdown">
								<a href="#">
									<?= $labelData['LBL_MENU_PRODUCT']; ?>
								</a>
								<ul class="dropdown-menu clearfix">
									<?php
									$fetchCategoryData = array();
									$fetchCategoryData = $db->rawQuery("SELECT CM.* FROM " . CATEGORY . " CM WHERE CM.is_deleted = '0' AND CM.is_active = '1' ORDER BY CM.category_index IS NULL,CM.category_index ASC");
									if (count($fetchCategoryData) > 0) {
										for ($i = 0; $i < count($fetchCategoryData); $i++) {
											$category_id = $fetchCategoryData[$i]['category_id'];
											$category_name = $fetchCategoryData[$i]['category_name'];
											$category_slug = $fetchCategoryData[$i]['category_slug'];
											$category_image = ADMIN_PANEL . $fetchCategoryData[$i]['category_image'];
											$category_remark = $fetchCategoryData[$i]['category_remark'];
											$category_index = $fetchCategoryData[$i]['category_index'];
											$is_active = $fetchCategoryData[$i]['is_active'];
											$is_deleted = $fetchCategoryData[$i]['is_deleted'];
											?>
											<li><a href="products/<?= $category_slug; ?>"><?= $category_name; ?> </a></li>
											<?php
										}
									}
									?>
								</ul>
							</li>
							<li>
								<a href="event.php">
									<?= $labelData['LBL_MENU_EVENT']; ?>
								</a>
							</li>
							<li>
								<a href="contact_us.php">
									<?= $labelData['LBL_MENU_CONTACT']; ?>
								</a>
							</li>
							<li>
								<form method="post" action="products.php">
									<div class="form-group">
										<input type="search" name="search"
											value="<?php if (!empty($_REQUEST['search'])) {
												echo $_REQUEST['search'];
											} else {
												echo '';
											} ?>"
											placeholder="<?= $labelData['LBL_SEARCH_PRODUCT']; ?>" required=""
											style="width: 150px;">
										<button type="submit" style="color: white;background-color: #004ed4;"><i
												class="fa fa-search"></i></button>
									</div>
								</form>
							</li>

							<!--								<li>
																	<?php if (basename($_SERVER['PHP_SELF']) == 'product_details.php' || basename($_SERVER['PHP_SELF']) == 'products.php') {
																	//Hide
																} else { ?>
  <a href="#" id="google_translate_element"></a>

<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script type="text/javascript">
function googleTranslateElementInit() {
  //new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages : 'en,id', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <?php
																}
																?>
								</li>-->
						</ul>
					</nav>
					<div class="or-header-right-btn">
						<!--							<button><i class="fal fa-heart"></i></button>-->
						<!--							<button class="or-canvas-cart-trigger"><i class="fal fa-shopping-cart"></i></button>-->
						<!--							<button class="search-box-outer"><i class="fas fa-search"></i></button>-->
					</div>
				</div>
			</div>
			<div class="mobile_menu position-relative">
				<div class="mobile_menu_button open_mobile_menu">
					<i class="fal fa-bars"></i>
				</div>
				<div class="mobile_menu_wrap">
					<div class="mobile_menu_overlay open_mobile_menu"></div>
					<div class="mobile_menu_content">
						<div class="mobile_menu_close open_mobile_menu">
							<i class="fal fa-times"></i>
						</div>
						<div class="m-brand-logo" style="width: 200px;">
							<a href="index.php"><img src="assets/img/logo.png" alt=""></a>
						</div>
						<!--							<div class="mobile-search-wrapper position-relative">
								<form action="#">
									<input type="text" placeholder="Search Here...">
									<button><i class="fas fa-search"></i></button>
								</form>
							</div>-->
						<nav class="mobile-main-navigation  clearfix ul-li">
							<ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
								<li>
									<a href="index.php">
										<?= $labelData['LBL_MENU_HOME']; ?>
									</a>
								</li>
								<li>
									<a href="about_us.php">
										<?= $labelData['LBL_MENU_ABOUT_US']; ?>
									</a>
								</li>
								<li>
									<a href="team.php">
										<?= $labelData['LBL_MENU_TEAM']; ?>
									</a>
								</li>
								<li>
									<a href="#">
										<?= $labelData['LBL_MENU_CSR']; ?>
									</a>
								</li>
								<li class="dropdown">
									<a target="_blank" href="#">
										<?= $labelData['LBL_PRODUCT_CATALOGUE']; ?>
									</a>
									<ul class="dropdown-menu clearfix">
										<?php
										$fetchCategoryData = array();
										$fetchCategoryData = $db->rawQuery("SELECT CM.* FROM " . CATEGORY . " CM WHERE CM.is_deleted = '0' AND CM.is_active = '1' ORDER BY CM.category_index IS NULL,CM.category_index ASC");
										if (count($fetchCategoryData) > 0) {
											for ($i = 0; $i < count($fetchCategoryData); $i++) {
												$category_id = $fetchCategoryData[$i]['category_id'];
												$category_name = $fetchCategoryData[$i]['category_name'];
												$category_slug = $fetchCategoryData[$i]['category_slug'];
												$category_image = ADMIN_PANEL . $fetchCategoryData[$i]['category_image'];
												$category_remark = $fetchCategoryData[$i]['category_remark'];
												$category_index = $fetchCategoryData[$i]['category_index'];
												$is_active = $fetchCategoryData[$i]['is_active'];
												$is_deleted = $fetchCategoryData[$i]['is_deleted'];
												?>
												<li><a href="products/<?= $category_slug; ?>"><?= $category_name; ?> </a></li>
												<?php
											}
										}
										?>
									</ul>
								</li>
								<li>
									<a href="event.php">
										<?= $labelData['LBL_MENU_EVENT']; ?>
									</a>
								</li>
								<li>
									<a href="contact_us.php">
										<?= $labelData['LBL_MENU_CONTACT']; ?>
									</a>
								</li>
								<li class="dropdown">
									<a href="#">Language</a>
									<ul class="dropdown-menu clearfix">
										<li><a href="#" lang="EN" onclick="return changeLanguage(this);">English</a>
										</li>
										<li><a href="#" lang="IN" onclick="return changeLanguage(this);">Indonesian</a>
										</li>
										<li><a href="#" lang="AR" onclick="return changeLanguage(this);">Arabic</a></li>
									</ul>
								</li>
								<li style="padding-top: 33px;">
									<form method="post" action="products.php">
										<div class="form-group">
											<input type="search" name="search"
												value="<?php if (!empty($_REQUEST['search'])) {
													echo $_REQUEST['search'];
												} else {
													echo '';
												} ?>"
												placeholder="<?= $labelData['LBL_SEARCH_PRODUCT']; ?>" required=""
												style="width: 150px;">
											<button type="submit" style="color: white;background-color: #004ed4;"><i
													class="fa fa-search"></i></button>
										</div>
									</form>
								</li>

								<!--									<li class="dropdown">
										<a target="_blank" href="%21.html#">Shop</a>
										<ul class="dropdown-menu clearfix">
											<li><a target="_blank" href="shop.html">Shop Page </a></li>
											<li><a target="_blank" href="shop-single.html">Shop Details</a></li>
											<li><a target="_blank" href="cart.html">Cart Page</a></li>
											<li><a target="_blank" href="checkout.html">Checkout Page</a></li>
										</ul>
									</li>-->
							</ul>
						</nav>
					</div>
				</div>
				<!-- /Mobile-Menu -->
			</div>
		</div>
	</div>
</header>
<!--	<div class="search-popup">
		<button class="close-search style-two"><span class="fal fa-times"></span></button>
		<button class="close-search"><span class="fa fa-arrow-up"></span></button>
				<form method="post" action="products.php">
			<div class="form-group">
							<input type="search" name="search" value="<?php if (!empty($_REQUEST['search'])) {
								echo $_REQUEST['search'];
							} else {
								echo '';
							} ?>" placeholder="<?= $labelData['LBL_SEARCH_PRODUCT']; ?>" required="">
				<button type="submit"><i class="fa fa-search"></i></button>
			</div>
		</form>
	</div>-->
<!--	<div class="or-ofcanvas-cart-wrapper">
		<div class="or-ofcanvas-cart-content">
			<div class="title-area d-flex justify-content-between align-items-center">
				<div class="cart-title">
					<span><?= $labelData['LBL_CART']; ?></span>
				</div>
				<div class="cart-close">
					<button class="or-canvas-cart-trigger"><i class="fal fa-times"></i></button>
				</div>
			</div>
			<div class="or-ofcart-product-wrapper">
				<div class="or-ofcart-product-item d-flex align-items-center position-relative">
					<div class="pro-remove position-absolute"><i class="fal fa-times"></i></div>
					<div class="or-ofcart-product-img">
						<img src="assets/img/product/pro1.jpg" alt="">
					</div>
					<div class="or-ofcart-product-text headline">
						<h3><a href="#">Organic Juice</a></h3>
						<span>1 x $4.00</span>
					</div>
				</div>
				<div class="or-ofcart-product-item d-flex align-items-center position-relative">
					<div class="pro-remove position-absolute"><i class="fal fa-times"></i></div>
					<div class="or-ofcart-product-img">
						<img src="assets/img/product/pro2.jpg" alt="">
					</div>
					<div class="or-ofcart-product-text headline">
						<h3><a href="#">Fresh Orange</a></h3>
						<span>1 x $4.00</span>
					</div>
				</div>
				<div class="or-ofcart-product-item d-flex align-items-center position-relative">
					<div class="pro-remove position-absolute"><i class="fal fa-times"></i></div>
					<div class="or-ofcart-product-img">
						<img src="assets/img/product/pro3.jpg" alt="">
					</div>
					<div class="or-ofcart-product-text headline">
						<h3><a href="#">Organic Onion</a></h3>
						<span>1 x $4.00</span>
					</div>
				</div>
			</div>
			<div class="or-ofcart-total text-center">
				<span>Subtotal: $4.00</span>
				<div class="total-btn">
					<a href="cart.html">View Cart</a>
					<a href="checkout.html">Checkout</a>
				</div>
			</div>
		</div>
	</div>-->
<!-- Start of header section
	============================================= -->