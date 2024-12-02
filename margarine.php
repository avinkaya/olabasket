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
	<title>Margarine - PT. Olabasket bumi Indonesia</title>
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
<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/header_cpo.webp" style="padding-top: 250px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                           
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->
<!-- Start of About us section
	============================================= -->
	<<section id="or-feature" class="or-feature-section/">
		<div class="container">
			<div class="or-section-title-3 text-center pera-content headline-2">


				<h2>
					<?= $labelData['LBL_ABOUT_MARGARINE']; ?>
					</span>
				</h2>
							</div>
			<div class="row">
  <div class="column_about_us" >
  	<div class="content_about">
   <img src="assets/img/margarine.jpg" alt="">
   </div>
  </div>
  <div class="column_about_us" >
      <p align="justify"><?= $labelData['LBL_MARGARINE_PROSES']; ?></p>
      
  	<p><?= $labelData['LBL_MARGARINE']; ?></p>
 </div>
</div>
</div>
	</section>
	<!-- <section id="or-about-1" class="or-about-section-1" style="padding-top: 50px;padding-bottom: 222px;">
		<div class="container">
				<div class="or-about-text-area  d-flex justify-content-end">
					<div class="or-about-img-text-wrapper-1">
                                                <div class="or-section-title-3 pera-content headline-2">
					            <h2><?php //$labelData['LBL_ABOUT_CPO']; ?></h2>
					            <p><?php // $labelData['LBL_ABOUT_CPO']; ?></p>
				                </div>
					</div>
				</div>
			</div>
		</div>
	</section> -->
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