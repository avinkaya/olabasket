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
	<title>Derivative - PT. Olabasket Bumi Indonesia</title>
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
	<link rel="stylesheet" href="assets/css/rs6.cs3">
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
<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/header_cpo.webp" style="padding-top: 300px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				<div class="page-title headline"> </div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                           
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
				<h2><?= $labelData['LBL_DERIVATIVE']; ?> <span><?= $labelData['LBL_CATEGORY']; ?></span></h2>
							
			</div>
			<div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="assets/img/soapnoodle.jpg" style="width: 150px;" alt="<?= $category_name; ?>">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>

								                            <a href="soapnoodle.php">
                                                            <img src="assets/img/soapnoodle.jpg" style="width: 150px;" alt="<?= $category_name; ?>">
							                                </a>
							</div>
							<div class="or-feature-text">
<!--								<h3></h3>-->
								<b><p>SOAP NOODLES</p></b>
                                                                <a href="soapnoodle.php">
                                                                    <img src="assets/img/icon/arrow2.png" alt="">&nbsp; <?= $labelData['LBL_BROWSE']; ?>
                                                                </a>

							</div>
						</div>
					</div>
                                    
				</div>
			</div>
		</div>

		<div class="or-feature-content position-relative">
			<div class="row justify-content-center">
				
				
					<div class="col-lg-2 col-md-4">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
								                            <a href="margarine.php">
                                                            <img src="assets/img/margarine.jpg" style="width: 150px;" alt="<?= $category_name; ?>">
                                                            </a>
							</div>
							<div class="or-feature-text">
<!--								<h3></h3>-->
								<b><p>MARGARINE</p></b>
                                                                <a href="margarine.php">
                                                                    <img src="assets/img/icon/arrow2.png" alt="">&nbsp; <?= $labelData['LBL_BROWSE']; ?>
                                                                </a>
                         </div>
						</div>
					</div>
                                    
				</div>
			</div>
		</div>

		<div class="or-feature-content position-relative">
			<div class="row justify-content-center">
				
				
					<div class="col-lg-2 col-md-4">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
								                            <a href="glycerine.php">
                                                            <img src="assets/img/glycerine.jpg" style="width: 150px;" alt="<?= $category_name; ?>">
                                                            </a>
							</div>
							<div class="or-feature-text">
<!--								<h3></h3>-->
								<b><p>GLYCERINE</p></b>
                                                                <a href="glycerine.php">
                                                                    <img src="assets/img/icon/arrow2.png" alt="">&nbsp; <?= $labelData['LBL_BROWSE']; ?>
                                                                </a>
                         </div>
						</div>
					</div>
                                    
				</div>
			</div>
		</div>

		<div class="or-feature-content position-relative">
			<div class="row justify-content-center">
				
				
					<div class="col-lg-2 col-md-4">
						<div class="or-feature-innerbox text-center headline-2 pera-content">
							<div class="or-feature-img">
								                            <a href="soap.php">
                                                            <img src="assets/img/soap2.jpg" style="width: 250px;" alt="<?= $category_name; ?>">
                                                            </a>
							</div>
							<div class="or-feature-text">
<!--								<h3></h3>-->
								<b><p>SOAP</p></b>
								<h2><b><p>COMING SOON </p></b></h2>
                                                                <a href="soap.php">
                                                                    <img src="assets/img/icon/arrow2.png" alt="">&nbsp; <?= $labelData['LBL_BROWSE']; ?>
                                                                </a>
                         </div>
						</div>
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
	<script>
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
function mischandler(){
return false;
}
function mousehandler(e){
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
if((eventbutton==2)||(eventbutton==3)) return false;
}
document.oncontextmenu = mischandler;
document.onmousedown = mousehandler;
document.onmouseup = mousehandler;
</script>
</body>
</html>		