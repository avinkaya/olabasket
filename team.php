<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '6'");
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
				<div class="page-title headline"><h1><?= $labelData['LBL_TEAM_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                            <li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_TEAM']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of team feed section
	============================================= -->
	<section id="or-team-2" class="or-team-section-2" style="padding-top: 50px;">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">
				<h2><?= $labelData['LBL_OUR_EXPERT_TEAM']; ?></h2>
<!--				<p>We have the skilled and qualified staffs to install the security system protects your place and introduced you new technology.</p>-->
			</div>
			<div class="or-team-feed-content">
				<div class="row">
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
                                            <div class="col-lg-4 col-md-6">
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
	</section>
<!-- End of team feed section
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