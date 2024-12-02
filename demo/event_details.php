<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';
$fetchEventData = array();
if(isset($_REQUEST['token'])){
    $event_slug = $_REQUEST['token'];
$fetchEventData = $db->rawQuery("SELECT EM.* FROM ".EVENT." EM WHERE EM.is_deleted = '0' AND EM.is_active = '1' AND EM.event_slug = '".$event_slug."'");
if(count($fetchEventData) > 0){
        $event_id  = $fetchEventData['0']['event_id'];
        $event_name = $fetchEventData['0']['event_name'];
        $event_slug = $fetchEventData['0']['event_slug'];
        $event_image = ADMIN_PANEL.$fetchEventData['0']['event_image'];
        $event_description = $fetchEventData['0']['event_description'];
        $event_date = date("M d, Y", strtotime($fetchEventData['0']['event_date']));
        $event_time = date("h:i:s A", strtotime($fetchEventData['0']['event_time']));
        $is_active = $fetchEventData[$i]['is_active'];
        $is_deleted = $fetchEventData[$i]['is_deleted'];
    }else{
        echo "<script>alert('Sorry !!! This Event Is Temporarily Unavailable.');</script>";
        echo "<script>window.location='index.php';</script>";
    }
}else{
    echo "<script>alert('Please Enter Valid Details.');</script>";
    echo "<script>window.location='event.php';</script>";
}

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '10'");
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
	<title><?= str_replace("{#EVENT_NAME#}",$event_name,$meta_title); ?></title>
	<meta name="description" content="<?= str_replace("{#EVENT_DESCRIPTION#}",$event_name,$meta_description); ?>">
	<meta name="keywords" content="<?= $meta_keywords; ?>">
	<meta name="author" content="Ola Basket">

	<meta itemprop="name" content="<?= str_replace("{#EVENT_NAME#}",$event_name,$meta_title); ?>">
    <meta itemprop="description" content="<?= str_replace("{#EVENT_DESCRIPTION#}",$event_name,$meta_description); ?>">
    <meta itemprop="url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta itemprop="image" content="<?= $event_image; ?>">

	<meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@olabasket">
    <meta name="twitter:title" content="<?= str_replace("{#EVENT_NAME#}",$event_name,$meta_title); ?>">
    <meta name="twitter:description" content="<?= str_replace("{#EVENT_DESCRIPTION#}",$event_name,$meta_description); ?>">
    <meta name="twitter:creator" content="@Ola Basket">
    <!-- Twitter summary card with large image must be at least 280x150px -->
    <meta name="twitter:image:src" content="<?= $event_image; ?>">
    

	<meta property="og:title" content="<?= str_replace("{#EVENT_NAME#}",$event_name,$meta_title); ?>"/>
    <meta property="og:type" content="Import Export"/>
    <meta property="og:url" content="<?= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
    <meta property="og:image" content="<?= $event_image; ?>"/>
    <meta property="og:site_name" content="Ola Basket"/>
    <meta property="fb:admins" content="Ola Basket"/>
    <meta property="og:description"
          content="<?= str_replace("{#EVENT_DESCRIPTION#}",$event_name,$meta_description); ?>"/>

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
</head>
<body class="organio-wrapper1">
<?php
        require_once './header.php';
        ?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="assets/img/inner_banner.png" style="padding-top: 70px;">
		<div class="background_overlay"></div>
		<div class="container">
			<div class="or-breadcrumbs-content text-center">
				<div class="page-title headline"><h1>Event Details</h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
						<li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $event_name; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of Blog Details section
	============================================= -->
	<section id="or-blog-details" class="or-blog-details-section">
		<div class="container">
			<div class="or-blog-details-content">
				<div class="row">
					<div class="col-lg-9">
						<div class="or-blog-details-text-inner headline pera-content">
							<div class="blog-details-img position-relative">
								<img src="<?= $event_image; ?>" alt="">
							</div>
							<div class="or-blog-details-item">
								<div class="blog-details-text headline">
									<div class="ord-blog-meta-2  position-relative text-capitalize">
										<a href="#"><i class="far fa-clock"></i> <?= $event_date; ?></a>
										<a href="#"><i class="far fa-user"></i> By admin</a>
										<a href="#"><i class="fas fa-clock"></i> <?= $event_time; ?></a>
									</div>
									<article>
										<?= $event_description; ?>
									</article>
								</div>
								<div class="or-blog-tag-share clearfix">
									<div class="or-blog-tag float-left">
										<span>Slug:</span>
										<a href="#"><?= $event_slug; ?></a>
									</div>
									<!-- <div class="or-blog-share float-right">
										<a class="fb-social" href="#"><i class="fab fa-facebook-f"></i><span>Like Us</span></a> 
										<a class="tw-social" href="#"><i class="fab fa-twitter"></i><span>Like Us</span></a>
										<a class="ln-social" href="#"><i class="fab fa-linkedin-in"></i><span>Like Us</span></a>
										<a  class="in-social "href="#"><i class="fab fa-instagram"></i><span>Like Us</span></a>
									</div> -->
								</div>
							</div>
							<!-- <div class="or-blog-next-prev d-flex justify-content-between">
								<div class="or-blog-next-prev-btn  ">
									<a class="np-text text-uppercase" href="#"><i class="fas fa-angle-double-left"></i> Previous Post</a>
									<div class="or-blog-next-prev-img-text clearfix">
										<div class="or-blog-np-img float-left">
											<img src="assets/img/blog/nbp1.jpg" alt="">
										</div>
										<div class="or-blog-np-text headline">
											<h3><a href="#">Our 6 of the Best Organic Chocolates
											to Buy.</a></h3>
										</div>
									</div>
								</div>
								<div class="or-blog-next-prev-btn np-text-item text-right">
									<a class="np-text  text-uppercase" href="#">Next Post <i class="fas fa-angle-double-right"></i></a>
									<div class="or-blog-next-prev-img-text d-flex clearfix">
										<div class="or-blog-np-text  headline">
											<h3><a href="#">Best guide to shopping for organic
											ingredients.</a></h3>
										</div>
										<div class="or-blog-np-img">
											<img src="assets/img/blog/nbp2.jpg" alt="">
										</div>
									</div>
								</div>
							</div> -->
						</div>
						<!-- <div class="or-blog-comment headline">
							<h3>Comment (2)</h3>
							<div class="or-blog-comment-block-wrapper">
								<div class="or-blog-comment-block">
									<div class="or-blog-comment-img float-left">
										<img src="assets/img/blog/blg-c1.jpg" alt="">
									</div>
									<div class="or-blog-comment-text headline pera-content position-relative">
										<h4><a href="#">Riva Collins</a></h4>
										<span>November 19, 2020 at 11:00 am </span>
										<p>It’s no secret that the digital industry is booming. From exciting startups to need ghor 
											global and brands, companies are reaching out.
										</p>
										<a class="prd-reply-btn text-center text-uppercase" href="#">Reply <i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
								<div class="or-blog-comment-block">
									<div class="or-blog-comment-img float-left">
										<img src="assets/img/blog/blg-c2.jpg" alt="">
									</div>
									<div class="or-blog-comment-text headline pera-content position-relative">
										<h4><a href="#">Oliva Jonson</a></h4>
										<span>November 19, 2020 at 11:00 am </span>
										<p>It’s no secret that the digital industry is booming. From exciting startups to need ghor 
											global and brands, companies are reaching out.
										</p>
										<a class="prd-reply-btn text-center text-uppercase" href="#">Reply <i class="fas fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							<h3>Post A Comment</h3>
							<div class="prd-blog-comment-form">
								<form action="#" method="post">
									<div class="prd-comment-form-input">
										<label>Your email address will not be published *</label>
										<div class="prd-comment-input-wrap d-flex">
											<input type="text" placeholder="Name">
											<input type="email" placeholder="Mail">
											<input type="text" placeholder="Mobile">
										</div>
										<span><input type="checkbox"> <label>Save my details in this browser for the next time I comment.</label></span>
										<textarea placeholder="Your Comment here..."></textarea>
										<button type="submit">Post Comment</button>
									</div>
								</form>
							</div>
						</div> -->
					</div>
					<div class="col-lg-3">
						<div class="or-side-bar top-sticky-sidebar">
							<div class="or-side-bar-widget">
								<!-- <div class="or-widget-wrap">
									<div class="or-search-widget position-relative">
										<form action="#">
											<input type="text" placeholder="Search...  ">
											<button><i class="far fa-search"></i></button>
										</form>
									</div>
								</div> -->
								<!-- <div class="or-widget-wrap headline ul-li-block">
									<div class="or-cat-widget position-relative">
										<h3 class="widget-title">Categories</h3>
										<ul>
											<li><a href="blog.html">Envato </a><span>3</span></li>
											<li><a href="blog.html">Themeforest </a> <span>2</span></li>
											<li><a href="blog.html">Graphicriver </a><span>8</span></li>
										</ul>
									</div>
								</div> -->
								<div class="or-widget-wrap headline ul-li-block">
									<div class="or-rec-widget position-relative">
										<h3 class="widget-title">Recent News</h3>
										<?php
                                                                    $fetchRecentEventData = array();
$fetchRecentEventData = $db->rawQuery("SELECT EM.* FROM ".EVENT." EM WHERE EM.is_deleted = '0' AND EM.is_active = '1' ORDER BY EM.event_id DESC LIMIT 0,3");
if(count($fetchRecentEventData) > 0){
    for($i=0;$i<count($fetchRecentEventData);$i++){
        $event_id  = $fetchRecentEventData[$i]['event_id'];
        $event_name = $fetchRecentEventData[$i]['event_name'];
        $event_slug = $fetchRecentEventData[$i]['event_slug'];
        $event_image = ADMIN_PANEL.$fetchRecentEventData[$i]['event_image'];
        $event_description = $fetchRecentEventData[$i]['event_description'];
        $event_date = date("M d, Y", strtotime($fetchRecentEventData[$i]['event_date']));
        $event_time = date("h:i:s A", strtotime($fetchRecentEventData[$i]['event_time']));
        $is_active = $fetchRecentEventData[$i]['is_active'];
        $is_deleted = $fetchRecentEventData[$i]['is_deleted'];
        ?>
										<div class="or-recent-blog-img-text clearfix">
											<div class="or-recent-blog-img float-left">
												<img src="<?= $event_image; ?>" width="80px" height="80px" alt="">
											</div>
											<div class="or-recent-blog-text headline">
												<h3><a href="event_details/<?= $event_slug; ?>">
											<?= substr(strtoupper($event_name), 0, 27); ?>...		
											</a></h3>
												<span><i class="far fa-calendar-alt"></i> <?= $event_date; ?></span>
											</div>
										</div>
<?php
	}
}
?>
									</div>
								</div>
								<!-- <div class="or-widget-wrap headline ul-li-block">
									<div class="or-cat-widget position-relative">
										<h3 class="widget-title">Archives</h3>
										<ul>
											<li><a href="blog.html">November 2019 </a><span>3</span></li>
											<li><a href="blog.html">February 2020 </a> <span>2</span></li>
											<li><a href="blog.html">September 2019 </a><span>8</span></li>
										</ul>
									</div>
								</div> -->
								<!-- <div class="or-widget-wrap headline ul-li">
									<div class="or-gallery-widget position-relative">
										<h3 class="widget-title">Gallery</h3>
										<ul class="zoom-gallery">
											<li><a href="assets/img/gallery/gl1.jpg" data-source="assets/img/gallery/gl1.jpg"><img src="assets/img/gallery/gl1.jpg" alt=""></a></li>
											<li><a href="assets/img/gallery/gl2.jpg" data-source="assets/img/gallery/gl2.jpg"><img src="assets/img/gallery/gl2.jpg" alt=""></a></li>
											<li><a href="assets/img/gallery/gl3.jpg" data-source="assets/img/gallery/gl3.jpg"><img src="assets/img/gallery/gl3.jpg" alt=""></a></li>
											<li><a href="assets/img/gallery/gl4.jpg" data-source="assets/img/gallery/gl4.jpg"><img src="assets/img/gallery/gl4.jpg" alt=""></a></li>
											<li><a href="assets/img/gallery/gl5.jpg" data-source="assets/img/gallery/gl4.jpg"><img src="assets/img/gallery/gl5.jpg" alt=""></a></li>
											<li><a href="assets/img/gallery/gl6.jpg" data-source="assets/img/gallery/gl4.jpg"><img src="assets/img/gallery/gl6.jpg" alt=""></a></li>
										</ul>
									</div>
								</div> -->
								<!-- <div class="or-widget-wrap headline ul-li">
									<div class="or-tag-widget position-relative">
										<h3 class="widget-title">Tag</h3>
										<ul>
											<li><a href="blog.html">Map</a></li>
											<li><a href="blog.html">Cloud</a></li>
											<li><a href="blog.html">Builder</a></li>
											<li><a href="blog.html">Tower</a></li>
											<li><a href="blog.html">Truck</a></li>
										</ul>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of Blog Details section
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