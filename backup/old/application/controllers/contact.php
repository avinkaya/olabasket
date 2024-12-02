<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct(){
        parent::__construct();
    }
	
	public function index(){
		$this->template->view("page/contact");
	}
	
	public function doSendMessage(){
		if($this->response->post("txtName") == ""){
			$this->response->send(array("result"=>0,"message"=>"Please insert your name !"));
			return;
		}
		
		if($this->response->post("txtEmail") == ""){
			$this->response->send(array("result"=>0,"message"=>"Please insert your email !"));
			return;
		}
		
		if($this->response->post("txtMessage") == ""){
			$this->response->send(array("result"=>0,"message"=>"Please insert your message !"));
			return;
		}
		
		
		$this->template->send_email("neeraj@ismpl.com", "New message from ".$this->response->post("txtEmail"), $this->response->post("txtMessage"), $this->response->post("txtEmail"), $this->response->post("txtName"));
		$this->template->send_email("sales@ismpl.com", "ISMP: New message from ".$this->response->post("txtEmail"), $this->response->post("txtMessage"), $this->response->post("txtEmail"), $this->response->post("txtName"));
		$this->template->send_email("neeraj@kavinkayu.com", "ISMP: New message from ".$this->response->post("txtEmail"), $this->response->post("txtMessage"), $this->response->post("txtEmail"), $this->response->post("txtName"));
		$this->template->send_email("hsbn89@yahoo.co.id", "ISMP: New message from ".$this->response->post("txtEmail"), $this->response->post("txtMessage"), $this->response->post("txtEmail"), $this->response->post("txtName"));
		$this->template->send_email($this->response->post("txtEmail"), "Thanks for your message", "Thanks for your message. Our representative will contact you shortly.<br><br><i>Message <b>".$this->response->post("txtName")."</b> :<br>".$this->response->post("txtEmail")."<br><br>".$this->response->post("txtMessage")."</i>", null, null);
		
		$this->response->send(array("result"=>1,"message"=>"Your message has been send."));
		
	}
}

?>
