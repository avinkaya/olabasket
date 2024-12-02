function CtrlUsersManage(){
	this.init = init;
	this.edit = edit;
	this.setUser = setUser;
	
	var notif = $("#notifManage");
	var notifEdit = $("#notifEdit");
	var formEdit = $hs("formEdit");
	var btnDeleteOk = $hs("btnDeleteOk");
	var btnActiveOk = $hs("btnActiveOk");
	var btnInactiveOk = $hs("btnInactiveOk");
	
	var user;
	
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
	
	function setUser(e){
		user = e;
	}
	
	function edit(e){
		$.ajax({
			type:'POST',
			url: base_url+"admin/users/getUser",
			data: "user="+e,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					formEdit.edit_id.value = response.user.id;
					formEdit.edit_name.value = response.user.name;
					formEdit.edit_email.value = response.user.email;
					formEdit.edit_username.value = response.user.username;
				}else{
					notifEdit.html(response.message);
					notifEdit.slideDown("slow");
					notifEdit.delay(3000).slideUp("slow");
				}
			}
		});
	}
	
	function doDelete(){
		if(user == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/users/doDelete",
			data: "user="+user,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/users";
				}else{
					alert(response.message);
				}
			}
		});
	}
	
	function doActivated(){
		if(user == null){
			alert('Tidak ada user yang dipilih');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/users/doActivated",
			data: "user="+user,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/users";
				}else{
					alert(response.message);
				}
			}
		});
	}
	
	function doInactivated(){
		if(user == null){
			alert('Not found data selected !');
			return;
		}
			
		$.ajax({
			type:'POST',
			url: base_url+"admin/users/doInactivated",
			data: "user="+user,
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin/users";
				}else{
					alert(response.message);
				}
			}
		});
	}
}

function CtrlUsersAdd(){
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
			url: base_url+"admin/users/doAddSave",
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

function CtrlUsersEdit(){
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
			url: base_url+"admin/users/doEditSave",
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