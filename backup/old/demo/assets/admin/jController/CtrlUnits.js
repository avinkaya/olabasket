function CtrlUnitsManage(){
	this.init = init;
	this.edit = edit;
	this.setUnit = setUnit;
	
	var notif = $("#notifManage");
	var notifEdit = $("#notifEdit");
	var formEdit = $hs("formEdit");
	var btnDeleteOk = $hs("btnDeleteOk");
	var btnActiveOk = $hs("btnActiveOk");
	var btnInactiveOk = $hs("btnInactiveOk");
	
	var unit;
	
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
	
	function setUnit(e){
		unit = e;
	}
	
	function edit(e){
		$.ajax({
			type:'POST',
			url: base_url+"admin/units/getUnit",
			data: "unit="+e,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					formEdit.edit_id.value = response.unit.id;
					formEdit.edit_name.value = response.unit.name;
					formEdit.edit_description.value = response.unit.description;
				}else{
					notifEdit.html(response.message);
					notifEdit.slideDown("slow");
					notifEdit.delay(3000).slideUp("slow");
				}
			}
		});
	}
	
	function doDelete(){
		if(unit == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/units/doDelete",
			data: "unit="+unit,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/units";
				}else{
					alert(response.message);
				}
			}
		});
	}
	
	function doActivated(){
		if(unit == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/units/doActivated",
			data: "unit="+unit,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/units";
				}else{
					alert(response.message);
				}
			}
		});
	}
	
	function doInactivated(){
		if(unit == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/units/doInactivated",
			data: "unit="+unit,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/units";
				}else{
					alert(response.message);
				}
			}
		});
	}
}

function CtrlUnitsAdd(){
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
			url: base_url+"admin/units/doAddSave",
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

function CtrlUnitsEdit(){
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
			url: base_url+"admin/units/doEditSave",
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