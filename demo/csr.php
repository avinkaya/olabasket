<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '3'");
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
    <meta itemprop="image" content="<?= ADMIN_PANEL.UPLOAD.'olabasket.webp'; ?>">

	<meta property="og:title" content="<?= $meta_title; ?>"/>
    <meta property="og:type" content="Import Export"/>
    <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <meta property="og:image" content="<?= ADMIN_PANEL.UPLOAD.'olabasket.webp'; ?>"/>
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
	<?php
        require_once './header.php';
        ?>

<!-- Start of Breadcrumb section
	============================================= -->
<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/inner_banner.png" style="padding-top: 70px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				<div class="page-title headline"><h1><?= $labelData['LBL_CSR_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                            <li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_CSR']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->
		
	<section id="or-popular-category" class="or-popular-category-section" style="padding-top: 50px;">
		<div class="container">
			<div class="or-popular-category-top-content d-flex justify-content-between align-items-end">
				<div class="or-section-title-3 pera-content headline-2">
					<h2><?= $labelData['LBL_ABOUT_CSR']; ?></h2>
                                        <p>
                                           <?= $labelData['LBL_CSR']; ?> 
                                        </p>
				</div>
				<div class="carousel_nav  clearfix">
					<button type="button" class="or-pop-cat-left_arrow"><i class="far fa-chevron-left"></i></button>
					<button type="button" class="or-pop-cat-right_arrow"><i class="far fa-chevron-right"></i></button>
				</div>
			</div>
			<div class="or-popular-category-slider-area">
				<div class="or-popular-category-slider-wrap">
					<div class="or-popular-cat-slider">
						<div class="organio-inner-item">
							<div class="or-p-cat-innerbox headline-2">
                                                            <a href="https://myavin.com/id/" target="_blank">
                                                                <div class="or-p-cat-img">
                                                                            <img src="assets/img/myavin.png" alt="">
									</div>
									<h3> My Avin</h3>
								</a>
							</div>
						</div>
						<div class="organio-inner-item">
							<div class="or-p-cat-innerbox headline-2">
								<a href="http://myavin.co.id/" target="_blank">
									<div class="or-p-cat-img" style="padding-top: 15px;">
                                                                            <img src="assets/img/myavin_tech.png" alt="">
									</div>
									<h3>  Myavin Technologies</h3>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of Category section
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
	<script src="assets/js/parallax-scroll.js"></script>
	<script src="assets/js/rbtools.min.js"></script>
	<script src="assets/js/rs6.min.js"></script>
	<script src="assets/js/script.js"></script>	
</body>
</html>		