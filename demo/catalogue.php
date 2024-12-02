<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '5'");
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
	<?php
        require_once './header.php';
        ?>

<!-- Start of Breadcrumb section
	============================================= -->
<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/inner_banner.png" style="padding-top: 70px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				<div class="page-title headline"><h1><?= $labelData['LBL_CATALOGUE_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                            <li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_CATALOGUE']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
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