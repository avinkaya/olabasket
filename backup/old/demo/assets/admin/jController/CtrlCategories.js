function CtrlCategoriesManage(){
	this.init = init;
	this.edit = edit;
	this.setCategory = setCategory;
	
	var notif = $("#notifManage");
	var notifEdit = $("#notifEdit");
	var formEdit = $hs("formEdit");
	var btnDeleteOk = $hs("btnDeleteOk");
	var btnActiveOk = $hs("btnActiveOk");
	var btnInactiveOk = $hs("btnInactiveOk");
	
	var category;
	
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
	
	function setCategory(e){
		category = e;
	}
	
	function edit(e){
		$.ajax({
			type:'POST',
			url: base_url+"admin/categories/getCategory",
			data: "category="+e,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					formEdit.edit_id.value = response.category.id;
					formEdit.edit_name.value = response.category.name;
					formEdit.edit_description.value = response.category.description;
				}else{
					notifEdit.html(response.message);
					notifEdit.slideDown("slow");
					notifEdit.delay(3000).slideUp("slow");
				}
			}
		});
	}
	
	function doDelete(){
		if(category == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/categories/doDelete",
			data: "category="+category,
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
		if(category == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/categories/doActivated",
			data: "category="+category,
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
		if(category == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/categories/doInactivated",
			data: "category="+category,
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

function CtrlCategoriesAdd(){
	this.init = init;
	
	var form = $("#formAdd");
	var notif = $("#notifAdd");
	var btnAddSave = $hs("btnAddSave");
	
	function init(){
		initEventListener();
	}
	
	function initEventListener(){
		btnAddSave.onclick = function(){
			doSave();
		};
	}
	
	function doSave(){
		$.ajax({
			type:'POST',
			url: base_url+"admin/categories/doAddSave",
			data: form.serialize(),
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

function CtrlCategoriesEdit(){
	this.init = init;
	
	var form = $("#formEdit");
	var notif = $("#notifEdit");
	var btnEditSave = $hs("btnEditSave");
	
	function init(){
		initEventListener();
	}
	
	function initEventListener(){
		btnEditSave.onclick = function(){
			doSave();
		};
	}
	
	function doSave(){
		$.ajax({
			type:'POST',
			url: base_url+"admin/categories/doEditSave",
			data: form.serialize(),
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