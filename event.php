<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '9'");
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
<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/header_all.webp" style="padding-top: 70px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				<div class="page-title headline"><h1><?= $labelData['LBL_EVENT_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                            <li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_EVENT']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->


<section id="or-feature" class="or-feature-section">
<!-- Start of Blog section
	============================================= -->
	<section id="or-blog" class="or-blog-section">
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
$fetchEventData = $db->rawQuery("SELECT EM.* FROM ".EVENT." EM WHERE EM.is_deleted = '0' AND EM.is_active = '1' ORDER BY EM.event_id DESC");
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
			</div>
		</div>
	</section>
<!-- End of Blog section
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