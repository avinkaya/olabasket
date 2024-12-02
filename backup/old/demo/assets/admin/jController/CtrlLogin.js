function CtrlLogin(){
	this.init = init;
	
	var form = $("#formLogin");
	var btnLogin = $hs("btnLogin");
	
	function init(){
		initEventListener();
	}
	
	function initEventListener(){
		btnLogin.onclick = function(){
			doLogin();
		};
	}
	
	function doLogin(){
		$.ajax({
			type:'POST',
			url: base_url+"admin/login/doLogin",
			data: form.serialize(),
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					top.location.href = base_url+"admin";
				}else{
					alert(response.message);
				}
			}
		});
	}
}