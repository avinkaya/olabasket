function CtrlContact(){
	this.init = init;
	
	var form = $("#formMessage");
	var formMessage = $hs("formMessage");
	var lblNotif = $("#lblContactNotif");
	var btnSend = $hs("btnSend");
	
	function init(){
		initEventListener();
	}
	
	function initEventListener(){
		btnSend.onclick = function(){
			doSendMessage();
		};
	}
	
	function doSendMessage(){
		if(formMessage.txtName.value == ""){
			lblNotif.html("Please insert your name !");
			lblNotif.attr("style","color:red;");
			return;
		}
		
		if(formMessage.txtEmail.value == ""){
			lblNotif.html("Please insert your email !");
			lblNotif.attr("style","color:red;");
			return;
		}
		
		if(formMessage.txtMessage.value == ""){
			lblNotif.html("Please insert your message !");
			lblNotif.attr("style","color:red;");
			return;
		}
		
		$.ajax({
			type:'POST',
			url: "http://ismpl.com/contact/doSendMessage",
			data: form.serialize(),
			success:function(result){
				var response = JSON.parse(result);
				if(response.result == 1){
					lblNotif.html("Your message has been send!");
					lblNotif.attr("style","color:green;");
					formMessage.reset();
				}else{
					lblNotif.html(response.message);
					lblNotif.attr("style","color:red;");
					formMessage.reset();
				}
			}
		});
	}
}