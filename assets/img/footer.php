<!-- Modal -->
<div id="videoModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
        <div class="modal-body" id="videoModalUrl">
        
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Start of Footer section
	============================================= -->
	<footer id="or-footer-1" class="or-footer-section-1" style="background-image: linear-gradient(180deg, #004ED4, #003898);">
		<div class="or-footer-newslatter-1">
			<div class="container">
<!--                                    <span class="or-footer-newslatter-img"><img src="assets/img/newsletter.png" alt=""></span>-->
<!--					<div class="or-footer-newslatter-text-form">
						<h3>Subscribe to our Newsletter:</h3>
						<div class="or-footer-newslatter-form position-relative">
							<form action="#">
								<input type="text" placeholder="type your mail address...">
							</form>
							<button>Subscribe <i class="far fa-long-arrow-right"></i></button>
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<div class="or-footer-widget-wrapper-1">
			<div class="container">
				<div class="row">
<!--					<div class="col-lg-3 col-md-6">	
						<div class="or-footer-widget headline pera-content ul-li-block">
							<div class="or-logo-widget">
                                                            <a href="#"><img src="assets/img/logo.png" width="177px" alt=""></a>
								<p>Olabasket is a part of Avin group with an experience of over 26 years having diversified activities such as manufacturing , Trading , Sourcing , Exports and Imports of various items as per our clients requirements.</p>
								<div class="footer-social">	
									<a href="#" tabindex="0"><i class="fab fa-facebook-f"></i></a>
									<a href="#" tabindex="0"><i class="fab fa-twitter"></i></a>
									<a href="#" tabindex="0"><i class="fab fa-dribbble"></i></a>
									<a href="#" tabindex="0"><i class="fab fa-behance"></i></a>
								</div>
							</div>
						</div>
					</div>-->
					<div class="col-lg-3 col-md-6">	
						<div class="or-footer-widget  headline pera-content ul-li-block">
							<div class="or-menu-widget">
								<h2 class="widget-title"><?= $labelData['LBL_LINKS']; ?></h2>
								<ul>
									<li><a href="index.php"><?= $labelData['LBL_MENU_HOME']; ?></a></li>
                                                                        <li><a href="about_us.php"><?= $labelData['LBL_MENU_ABOUT_US']; ?></a></li>
                                                                        <li><a href="team.php"><?= $labelData['LBL_MENU_TEAM']; ?></a></li>
                                                                        <li><a href="csr.php"><?= $labelData['LBL_MENU_CSR']; ?></a></li>
                                                                        <li><a href="contact_us.php"><?= $labelData['LBL_MENU_CONTACT']; ?></a></li>
                                                                        <li><a href="products.php"><?= $labelData['LBL_MENU_PRODUCT']; ?></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">	
						<div class="or-footer-widget headline pera-content ul-li-block">
							<div class="or-contact-widget">
								<h2 class="widget-title"><?= $labelData['LBL_OFFICIAL_INFO']; ?>:</h2>
								<ul>
									<li><i class="fas fa-map-marker-alt"></i> 
                                                                            <span>
                                                                                OLABASKET ,<br/> 
                                                                                Jl. Raya Solo- Sragen KM 9.5 Palur<br/> 
                                                                                Solo - 57731 , Indonesia
                                                                            </span>
                                                                        </li>
                                                                        <span class="title">For export inquiries:</span>
                                    <li><i class="fas"><img src="assets/img/whatsapp3.png" style="max-height:20%;"/></i>
                                                                            <a href="https://wa.me/62816672904" target="_blank">
                                                                            <span>+ 62 81 6672904  </span> 
                                                                            </a>
                                                                            </li>                                    

									<li><i class="fas fa-phone-alt"></i> 
                                                                            <a href="https://wa.me/62816672904" target="_blank">
                                                                            <span> + 62 81 6672904  </span> 
                                                                            </a>
                                                                            </li>
									<li><i class="fas fa-phone-alt"></i> <span> + 62 271 821102  </span> </li>
									<li><i class="fas fa-envelope"></i> 
                                                                            <a href="mailto:info@olabasket.com">
                                                                                <span> info@olabasket.com  </span> 
                                                                            </a>
                                                                            </li>
								</ul>
								<span class="title"><?= $labelData['LBL_WORKING_HOUR']; ?>: </span>
								<ul>
                                                                    <li>
                                                                    Mon - Fri : 8AM - 5PM,<br/>
                                                                    Saturday : 8AM - 4PM,<br/>
                                                                    Sunday &nbsp;&nbsp;: <?= $labelData['LBL_CLOSED']; ?>
                                                                    </li>
                                                                </ul>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">	
						<div class="or-footer-widget headline pera-content ul-li-block">
							<div class="or-gallery-widget">
								<h2 class="widget-title"><?= $labelData['LBL_GALLERY']; ?></h2>
								<ul class="zoom-gallery">
                                                                    <?php
                                                                    $fetchGalleryData = array();
$fetchGalleryData = $db->rawQuery("SELECT GM.* FROM ".GALLERY." GM WHERE GM.is_deleted = '0' AND GM.is_active = '1' ORDER BY GM.gallery_index IS NULL,GM.gallery_index ASC");
if(count($fetchGalleryData) > 0){
    for($i=0;$i<count($fetchGalleryData);$i++){
        $gallery_id  = $fetchGalleryData[$i]['gallery_id'];
        $gallery_title = $fetchGalleryData[$i]['gallery_title'];
        $gallery_index = $fetchGalleryData[$i]['gallery_index'];
        $gallery_image = ADMIN_PANEL.$fetchGalleryData[$i]['gallery_image'];
        $is_active = $fetchTeamData[$i]['is_active'];
        $is_deleted = $fetchTeamData[$i]['is_deleted'];
        ?>
                                                                    <li><a href="<?= $gallery_image; ?>" data-source="<?= $gallery_image; ?>"><img src="<?= $gallery_image; ?>" class="<?php if(!isMobile()){ echo 'footer_gallery'; } ?>" alt="<?= $gallery_title; ?>"></a></li>
                                                                        <?php
    }
}
?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	</footer>
<!-- End of Footer section
	============================================= -->
<style>
#fullsize {
    position: absolute;
}
#fullsize.hidden {
    display: none;
}
#fullsize img{
    top: 15%;
    left: 10%;
    width: 500px;
    height: 500px;
    position: fixed;
    background: #fff;
}
</style>
<div id="fullsize">
</div>
<script src="assets/js/jquery.min.js"></script>
<script>
var $tooltip = $('#fullsize');

$('.footer_gallery').on('mouseenter', function() {
    var img = this,
        $img = $(img),
        offset = $img.offset();

    $tooltip
    .css({
        'top': offset.top,
        'left': offset.left
    })
    .append($img.clone())
    .removeClass('hidden');
});

$('.footer_gallery').on('mouseleave', function() {
    $tooltip.empty().addClass('hidden');
});
</script>
<!--Start of Tawk.to Script-->
<!--<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6322960554f06e12d894c896/1gcvhk27g';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/63612fb9b0d6371309ccb43b/1ggpq4rs1';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!--End of Tawk.to Script-->
<!-- GetButton.io widget -->
<!--<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+62816672904", // WhatsApp number
            call_to_action: "Chat With Us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = 'https:', host = "getbutton.io", url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>-->
<!-- /GetButton.io widget -->
<script>
function showVideo(ele){
    var product_video_url = $(ele).attr("product_video_url");
    if(product_video_url != ''){
        window.open(product_video_url, '_blank', 'width=400, height=400').focus();
    }
}
function popupWindow(url, windowName, win, w, h) {
    const y = win.top.outerHeight / 2 + win.top.screenY - ( h / 2);
    const x = win.top.outerWidth / 2 + win.top.screenX - ( w / 2);
    return win.open(url, windowName, `toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=${w}, height=${h}, top=${y}, left=${x}`);
}
function changeLanguage(ele){
    var lang = $(ele).attr("lang");
    document.cookie = "olabasket_lang = " + lang;
    window.location.reload();
}
/*
$(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    });
$('body').bind('copy paste',function(e) {
    e.preventDefault(); return false; 
});
*/
</script>