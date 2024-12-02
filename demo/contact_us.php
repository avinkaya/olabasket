<?php
require_once './admin/api/connection.php';
require_once './admin/api/functions.php';

//set seo data
$fetchSeoData = array();
$fetchSeoData = $db->rawQuery("SELECT * FROM ".SEO." WHERE is_deleted = '0' AND is_active = '1' AND page_id = '4'");
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
				<div class="page-title headline"><h1><?= $labelData['LBL_CONTACT_US_TITLE']; ?></h1></div>
				<div class="or-breadcrumbs-items ul-li">
					<ul>
                                            <li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
						<li><?= $labelData['LBL_MENU_CONTACT']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of contact info section
	============================================= -->
	<section id="or-contact-info" class="or-contact-info-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-md-6">
                                    <a href="https://goo.gl/maps/hokZJ1EHHBJ24adF9" target="_blank">
					<div class="or-contact-innerbox headline or-contact-innerbox-layout1">
						<div class="item--inner bg-image">
							<div class="item--icon icon-psb">
								<i aria-hidden="true" class="flaticon-map"></i>
							</div>
							<h4 class="item--title"> <?= $labelData['LBL_ADDRESS']; ?>:</h4>
                                                        <div class="item--description">
                                                            
                                                                                Jl. Raya Solo- Sragen KM 9.5 Palur<br/> 
                                                                                Solo - 57731 , Indonesia
                                                                                
                                                        </div>
						</div>
					</div>
                                    </a>
				</div>
				<div class="col-lg-4 col-md-6">
                                    <a href="https://wa.me/62816672904" target="_blank">
					<div class="or-contact-innerbox headline or-contact-innerbox-layout1">
						<div class="item--inner bg-image">
							<div class="item--icon icon-psb">
								<i aria-hidden="true" class="flaticon-phone-call"></i>
							</div>
							<h4 class="item--title"> <?= $labelData['LBL_PHONE_NUMBER']; ?>:</h4>
							<div class="item--description">
                                                            <br/>
                                                             + 62 816672904
                                                             <br/>
							</div>
						</div>
					</div>
                                    </a>
				</div>
				<div class="col-lg-4 col-md-6">
                                    <a href="mailto:info@olabasket.com">
					<div class="or-contact-innerbox headline or-contact-innerbox-layout1">
						<div class="item--inner bg-image">
							<div class="item--icon icon-psb">
								<i aria-hidden="true" class="flaticon-email"></i>
							</div>
							<h4 class="item--title"> <?= $labelData['LBL_MAIL_ADDRESS']; ?>:</h4>
                                                        <div class="item--description">
                                                            <br/>
                                                            info@olabasket.com
                                                            <br/>
                                                        </div>
						</div>
					</div>
                                    </a>
				</div>
			</div>
		</div>
	</section>
<!-- End of contact info section
	============================================= -->

<!-- Start of contact Form section
	============================================= -->
	<section id="or-contact-form" class="or-contact-form-section">
		<div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.2971491550074!2d110.8935207!3d-7.542537300000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a17b47dc2f173%3A0x269477beedabb6f7!2sPT.%20AVIN%20KAYA%20INTERNASIONAL%20(%20MyAvin)!5e0!3m2!1sen!2sin!4v1666020336256!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
								<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15821.189653260504!2d110.8937048!3d-7.5425084!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a175a2220ba19%3A0xa046b80ca9a0a03c!2sPT%20Olabasket%20Bumi%20Indonesia!5e0!3m2!1sen!2sin!4v1677811331058!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
                        <div class="col-sm-6">
                            <div class="or-contact-form-wrapper">
                            <div class="or-section-title-3 text-center pera-content headline-2">
				<h2><?= $labelData['LBL_CONTACT_US_FORM_TITLE']; ?></h2>
<!--				<h2>Let's <span>Contact</span> With Us</h2>
				<p>Feel free to contact with us any time.</p>-->
			    </div>
				<div class="or-contact-form-content">
                                    <form action="#" id="contactForm" method="post">
                                            <input type="hidden" name="case" value="submitContactUsInquiry" />
						<div class="row">
							<div class="col-md-6">
								<div class="or-contact-input">
									<label><?= $labelData['LBL_FORM_NAME']; ?>*</label>
                                                                        <input type="text" name="name" id="name" placeholder="<?= $labelData['LBL_FORM_NAME']; ?>" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="or-contact-input">
									<label><?= $labelData['LBL_FORM_MAIL']; ?>*</label>
                                                                        <input type="email" name="email_id" id="email_id" placeholder="<?= $labelData['LBL_FORM_MAIL']; ?>" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="or-contact-input">
									<label><?= $labelData['LBL_FORM_NUMBER']; ?>*</label>
                                                                        <input type="text" name="mobile" id="mobile" placeholder="<?= $labelData['LBL_FORM_NUMBER']; ?>" required="">
								</div>
							</div>
							<div class="col-md-6">
								<div class="or-contact-input">
									<label><?= $labelData['LBL_FORM_SUBJECT']; ?>*</label>
                                                                        <input type="text" name="subject" id="subject" placeholder="<?= $labelData['LBL_FORM_SUBJECT']; ?>" required="">
								</div>
							</div>
							<div class="col-md-12">
								<div class="or-contact-input">
									<label><?= $labelData['LBL_FORM_MESSAGE']; ?>*</label>
                                                                        <textarea name="message" id="message" placeholder="<?= $labelData['LBL_FORM_MESSAGE']; ?>" required=""></textarea>
								</div>
							</div>
						</div>
						<div class="or-contact-btn text-center">
							<button type="submit"><?= $labelData['LBL_FORM_SUBMIT_BTN']; ?></button>
						</div>
					</form>
				</div>
			</div>
                        </div>
                    </div>
		</div>
	</section>
<!-- End of contact Form section
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
        $("#contactForm").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            $.ajax({
                type: "POST",
                url: "<?= API_URL; ?>",
                data: form.serialize(), // serializes the form's elements.
                success: function(data){
                    var status = data.status;
                    var msg = data.msg;
                    if(status == "true"){
                        alert(msg);
                        window.location.reload();
                    }else{
                        alert(msg);
                    }
                }
            });
        });    
        </script>
</body>
</html>		