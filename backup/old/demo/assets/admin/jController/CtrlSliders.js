function CtrlSliders(){
	this.init = init;
	this.setSlide = setSlide;
	
	var notif = $("#notifAdd");
	var form = $hs("formAdd");
	var addImage = $hs("add_image");
	var btnAddImage = $hs("btn_add_image");
	var btnAddUpload = $hs("btn_add_upload");
	var btnDelete = $hs("btnDeleteOk");
	
	var slide;
	
	function init(){
		initEventListener();
	}
	
	function initEventListener(){
		btnAddImage.onclick = function(){
			addImage.src = base_url+'assets/image/img_default_photo.jpg';
		};
		
		addImage.onclick = function(){
			form.image.click();
		};
		
		form.image.onchange = function(){
			var URL = window.URL || window.webkitURL;
			addImage.src = URL.createObjectURL(form.image.files[0]);
		};
		
		btnAddUpload.onclick = function(){
			doUpload();
		};
		
		btnDelete.onclick = function(){
			doDelete();
		};
	}
	
	function setSlide(e){
		slide = e;
	}
	
	function doUpload(){
		var formData = new FormData(form);
		
		$.ajax({
			type:'POST',
			url: base_url+"admin/sliders/doImageUpload",
			data: formData,
			cache:false,
            contentType: false,
            processData: false,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.reload();
				}else{
					notif.html(response.message);
					notif.slideDown("slow");
					notif.delay(3000).slideUp("slow");
				}
			}
		});
	}
	
	function doDelete(){
		$.ajax({
			type:'POST',
			url: base_url+"admin/sliders/doImageDelete",
			data: "slide="+slide,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.reload();
				}else{
					notif.html(response.message);
					notif.slideDown("slow");
					notif.delay(3000).slideUp("slow");
				}
			}
		});
	}
}