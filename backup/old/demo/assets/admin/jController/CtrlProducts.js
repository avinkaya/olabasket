function CtrlProductsManage(){
	this.init = init;
	this.setProduct = setProduct;
	
	var notif = $("#notifManage");
	var notifEdit = $("#notifEdit");
	var formEdit = $hs("formEdit");
	var btnDeleteOk = $hs("btnDeleteOk");
	var btnActiveOk = $hs("btnActiveOk");
	var btnInactiveOk = $hs("btnInactiveOk");
	
	var product;
	
	function init(){
		initEventListener();
	}
	
	function initEventListener(){
		btnDeleteOk.onclick = function(){
			doDelete();
		}
		
		btnActiveOk.onclick = function(){
			doActivated();
		}
		
		btnInactiveOk.onclick = function(){
			doInactivated();
		}
	}
	
	function setProduct(e){
		product = e;
	}
	
	function doDelete(){
		if(product == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/products/doDelete",
			data: "product="+product,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.reload();
				}else{
					alert(response.message);
				}
			}
		});
	}
	
	function doActivated(){
		if(product == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/products/doActivated",
			data: "product="+product,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.reload();
				}else{
					alert(response.message);
				}
			}
		});
	}
	
	function doInactivated(){
		if(product == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/products/doInactivated",
			data: "product="+product,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.reload();
				}else{
					alert(response.message);
				}
			}
		});
	}
}

function CtrlProductsAdd(){
	this.init = init;
	this.setAttributes = setAttributes;
	
	var form = $("#formAdd");
	var notif = $("#notifAdd");
	var divAttribute = $("#divAttribute");
	var aAddAttribute = $hs("aAddAttribute");
	var btnAddSave = $hs("btnAddSave");
	
	var attributes= 0;
	
	function init(){
		initEventListener();
		
		doCreateAttribute();
	}
	
	function initEventListener(){
		btnAddSave.onclick = function(){
			doSave();
		};
		
		aAddAttribute.onclick = function(){
			doCreateAttribute();
		};
	}
	
	function setAttributes(e){
		attributes = e;
	}
	
	function doSave(){
		$.ajax({
			type:'POST',
			url: base_url+"admin/products/doAddSave",
			data: form.serialize(),
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/products/image";
				}else{
					notif.html(response.message);
					notif.slideDown("slow");
					notif.delay(3000).slideUp("slow");
				}
			}
		});
	}
	
	function doCreateAttribute(){
		attributes++;
		
		var div = document.createElement('div');
		div.setAttribute("style","display:inline-block;margin-bottom:5px;");
		div.innerHTML = "<input type='text' class='form-control' id='add_attr"+attributes+"_name' name='add_attr"+attributes+"_name' placeholder='Label' style='width:200px; float:left;margin-right:10px;'><input type='text' class='form-control' id='add_attr"+attributes+"_value' name='add_attr"+attributes+"_value' placeholder='Enter attribute value' style='width:300px; float:left;'>";
		
		divAttribute.append(div);
		$hs("add_attrs").value = attributes;
	}
}

function CtrlProductsEdit(){
	this.init = init;
	this.setAttributes = setAttributes;
	
	var form = $("#formEdit");
	var notif = $("#notifEdit");
	var divAttribute = $("#divAttribute");
	var aEditAttribute = $hs("aEditAttribute");
	var btnEditSave = $hs("btnEditSave");
	
	var attributes= 0;
	
	function init(){
		initEventListener();
		
		doCreateAttribute();
	}
	
	function initEventListener(){
		btnEditSave.onclick = function(){
			doSave();
		};
		
		aEditAttribute.onclick = function(){
			doCreateAttribute();
		};
	}
	
	function setAttributes(e){
		attributes = e;
		$hs("edit_attrs").value = attributes;
	}
	
	function doSave(){
		$.ajax({
			type:'POST',
			url: base_url+"admin/products/doEditSave",
			data: form.serialize(),
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/products/image";
				}else{
					notif.html(response.message);
					notif.slideDown("slow");
					notif.delay(3000).slideUp("slow");
				}
			}
		});
	}
	
	function doCreateAttribute(){
		attributes++;
		
		var div = document.createElement('div');
		div.setAttribute("style","display:inline-block;margin-bottom:5px;");
		div.innerHTML = "<input type='hidden' class='form-control' id='edit_attr"+attributes+"_id' name='edit_attr"+attributes+"_id'><input type='text' class='form-control' id='edit_attr"+attributes+"_name' name='edit_attr"+attributes+"_name' placeholder='Label' style='width:200px; float:left;margin-right:10px;'><input type='text' class='form-control' id='edit_attr"+attributes+"_value' name='edit_attr"+attributes+"_value' placeholder='Enter attribute value' style='width:300px; float:left;'>";
		
		divAttribute.append(div);
		$hs("edit_attrs").value = attributes;
	}
}

function CtrlProductsImage(){
	this.init = init;
	this.setImage = setImage;
	
	var notif = $("#notifAdd");
	var form = $hs("formAdd");
	var addImage = $hs("add_image");
	var btnAddImage = $hs("btn_add_image");
	var btnAddUpload = $hs("btn_add_upload");
	var btnDelete = $hs("btnDeleteOk");
	
	var image;
	
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
	
	function setImage(e){
		image = e;
	}
	
	function doUpload(){
		var formData = new FormData(form);
		
		$.ajax({
			type:'POST',
			url: base_url+"admin/products/doImageUpload",
			data: formData,
			cache:false,
            contentType: false,
            processData: false,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/products/image";
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
			url: base_url+"admin/products/doImageDelete",
			data: "image="+image,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/products/image";
				}else{
					notif.html(response.message);
					notif.slideDown("slow");
					notif.delay(3000).slideUp("slow");
				}
			}
		});
	}
}