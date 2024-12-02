<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

$category_name = $category_image = $category_remark = "";
$fetchProductData = array();
if(isset($_REQUEST['token'])){
	$category_slug = $_REQUEST['token'];
        $fetchData = $db->rawQuery("SELECT CM.* FROM ".CATEGORY." CM WHERE CM.category_slug = '".$category_slug."'");
        if(count($fetchData) > 0){
            $category_id  = $fetchData['0']['category_id'];
            $category_name  = $fetchData['0']['category_name'];
            $category_image  = ADMIN_PANEL.$fetchData['0']['category_image'];
            $category_remark  = $fetchData['0']['category_remark'];
	    }
    //$category_id = base64_decode($_REQUEST['token']);
	if(!empty($category_id)){
        $fetchProductData = $db->rawQuery("SELECT PM.*"
        . ",(SELECT category_name FROM ".CATEGORY." WHERE category_id = PM.category_id) AS category_name "
        . "FROM ".PRODUCT." PM WHERE PM.is_deleted = '0' AND PM.is_active = '1' AND PM.category_id = '".$category_id."' ORDER BY PM.product_index IS NULL,PM.product_index ASC");
	}
}elseif(!empty($_REQUEST['search'])){
    $search = $_REQUEST['search'];
    $fetchProductData = $db->rawQuery("SELECT PM.*"
        . ",(SELECT category_name FROM ".CATEGORY." WHERE category_id = PM.category_id) AS category_name "
        . "FROM ".PRODUCT." PM WHERE PM.is_deleted = '0' AND PM.is_active = '1' AND PM.product_name LIKE '%".$search."%' ORDER BY PM.product_index IS NULL,PM.product_index ASC");
}else{
    $fetchProductData = $db->rawQuery("SELECT PM.*"
        . ",(SELECT category_name FROM ".CATEGORY." WHERE category_id = PM.category_id) AS category_name "
        . "FROM ".PRODUCT." PM WHERE PM.is_deleted = '0' AND PM.is_active = '1' ORDER BY PM.product_index IS NULL,PM.product_index ASC");
}

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '7'");
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
	<title><?= str_replace("{#CATEGORY_NAME#}",$category_name,$meta_title); ?></title>
	<meta name="description" content="<?= str_replace("{#CATEGORY_REMARK#}",$category_remark,$meta_description); ?>">
	<meta name="keywords" content="<?= $meta_keywords; ?>">
	<meta name="author" content="Ola Basket">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
	<!-- Mobile Specific Meta -->

	<meta itemprop="name" content="<?= str_replace("{#CATEGORY_NAME#}",$category_name,$meta_title); ?>">
    <meta itemprop="description" content="<?= str_replace("{#CATEGORY_REMARK#}",$category_remark,$meta_description); ?>">
    <meta itemprop="url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta itemprop="image" content="<?= $category_image; ?>">

	<meta property="og:title" content="<?= str_replace("{#CATEGORY_NAME#}",$category_name,$meta_title); ?>"/>
    <meta property="og:type" content="Import Export"/>
    <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <meta property="og:image" content="<?= $category_image; ?>"/>
    <meta property="og:site_name" content="Ola Basket"/>
    <meta property="fb:admins" content="Ola Basket"/>
    <meta property="og:description"
          content="<?= str_replace("{#CATEGORY_REMARK#}",$category_remark,$meta_description); ?>"/>


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
				<div class="page-title headline"><h1><?= $labelData['LBL_PRODUCTS_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                            <li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_PRODUCT']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of Shop product section
	============================================= -->
	<section id="or-shop-product" class="or-shop-product-section">
		<div class="container">
<!--			<div class="or-section-title headline pera-content text-center middle-align">
				<span class="sub-title">Products</span>
				<h2>All of our products are
				organic & fresh.</h2>
			</div>-->
			<div class="or-product-shop-content">
				<div class="container">
					<div class="row">
                                            <?php
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
						<div class="col-lg-3 col-md-6">
							<div class="or-product-innerbox-item type-1 text-center position-relative">
<!--								<div class="e-commerce-btn">
									<a href="#"><i class="fal fa-shopping-cart"></i></a>
									<a href="#"><i class="fal fa-heart"></i></a>
									<a href="#"><i class="fal fa-eye"></i></a>
								</div>-->
								<div class="or-product-inner-img">
									<img src="<?= $product_image; ?>" alt="<?= $product_name; ?>">
								</div>
								<div class="or-product-inner-text headline">
									<h3><a href="#" tabindex="0"><?= $product_name; ?></a></h3>
                                                                        <span class="price"><?= $product_code; ?></span>
<!--									<span class="price">$10.00-$20.00</span>
									<div class="or-product-rate ul-li">
										<ul>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
											<li><i class="fas fa-star"></i></li>
										</ul>
									</div>-->
                                                                        <?php if(!empty($product_video_url)){ ?>
                                                                        <div class="shop-details-btn">
                                                                            <a href="#" product_video_url="<?= $product_video_url; ?>" onclick="return popupWindow('<?= $product_video_url; ?>','<?= $product_name; ?>',window,500,500);" style="background-color: red;">
                                                                                <?= $labelData['LBL_WATCH_VIDEO']; ?>
                                                                            </a>
							                </div>
                                                                        <?php } ?>
								</div>
								<div class="or-product-btn text-center">
<!--									<a class="d-flex justify-content-center align-items-center" href="#" tabindex="0">Add To Cart</a>-->
									
<!--<a class="d-flex justify-content-center align-items-center" href="product_details.php?token=<?= base64_encode($product_id); ?>" tabindex="0">-->
<a class="d-flex justify-content-center align-items-center" href="product_details/<?= $product_slug; ?>" tabindex="0">
    <i class="fal fa-eye"></i> &nbsp; <?= $labelData['LBL_VIEW']; ?>
</a>
								</div>
							</div>
						</div>
                                            <?php
    }
                                            }else{
                                                ?>
                                            <div class="or-section-title headline pera-content text-center middle-align">
				<span class="sub-title"><?= $labelData['LBL_MENU_PRODUCT']; ?></span>
				<h2><?= $labelData['LBL_NO_PRODUCT_FOUND']; ?></h2>
			</div>
                                            <?php
                                            }
                                            ?>
                                        </div>
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