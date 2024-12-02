<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct(){
        parent::__construct();
		
		if(empty($_SESSION["user_login"])){
			redirect("admin/login");
		}
    }
	
	public function index(){
		$data["QUsers"] = $this->db
						->where("user_group_id != ",1)
						->order_by("id","Desc")
						->get("tb_user")
						->result();
						
		$this->template->viewAdmin("users/manage_user",$data);
	}
	
	public function getUser(){
		if($this->response->post("user") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$QUser = $this->db->where("id",$this->response->post("user"))->get("tb_user")->row();
		if(!empty($QUser)){
			$User = array(
					"id"=>$QUser->id,
					"name"=>$QUser->name,
					"email"=>$QUser->email,
					"username"=>$QUser->username,
				);
			$this->response->send(array("result"=>1,"user"=>$User));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Not found data user!","messageCode"=>2));
		}
	}
	
	public function doAddSave(){
		if($this->response->post("add_name") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"name\"","messageCode"=>1));
			return;
		}
		
		if($this->response->post("add_username") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Username\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("add_email") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Email\"","messageCode"=>3));
			return;
		}
		
		if($this->response->post("add_password") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Password\"","messageCode"=>4));
			return;
		}
		
		if($this->response->post("add_passwordre") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Retype Password\"","messageCode"=>5));
			return;
		}
		
		if($this->response->post("add_password") != $this->response->post("add_passwordre")){
			$this->response->send(array("result"=>0,"message"=>"Password and Retype Password is't valid","messageCode"=>6));
			return;
		}
		
		$Data = array(
					"name"=>$this->response->post("add_name"),
					"email"=>$this->response->post("add_email"),
					"username"=>$this->response->post("add_username"),
					"password"=>md5($this->response->post("add_password")),
					"user_group_id"=>2,
					"active"=>1,
					"create_date"=>date("Y-m-d H:i:s"),
					"create_user"=>$_SESSION["user_login"]->email,
				);
		$Save = $this->db->insert("tb_user",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"User has been saved","messageCode"=>7));
		}else{
			$this->response->send(array("result"=>0,"message"=>"New user can't be saved","messageCode"=>8));
		}
	}
	
	public function doEditSave(){
		if($this->response->post("edit_id") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		if($this->response->post("edit_name") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"name\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("edit_username") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Username\"","messageCode"=>3));
			return;
		}
		
		if($this->response->post("edit_email") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Email\"","messageCode"=>4));
			return;
		}
		
		$Data = array(
					"name"=>$this->response->post("edit_name"),
					"email"=>$this->response->post("edit_email"),
					"username"=>$this->response->post("edit_username"),
					"update_date"=>date("Y-m-d H:i:s"),
					"update_user"=>$_SESSION["user_login"]->email,
				);
		$Save = $this->db->where("id",$this->response->post("edit_id"))->update("tb_user",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"User has been saved","messageCode"=>5));
		}else{
			$this->response->send(array("result"=>0,"message"=>"New user can't be saved !","messageCode"=>6));
		}
	}
	
	public function doDelete(){
		if($this->response->post("user") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found user selected !","messageCode"=>1));
			return;
		}
		
		$Delete = $this->db->where("id",$this->response->post("user"))->delete("tb_user");
		if($Delete){
			$this->response->send(array("result"=>1,"message"=>"User has been deleted","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to delete this user !","messageCode"=>3));
		}
	}
	
	public function doActivated(){
		if($this->response->post("user") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found user selected !","messageCode"=>1));
			return;
		}
		
		$Data = array("active"=>"1");
		
		$Save = $this->db->where("id",$this->response->post("user"))->update("tb_user",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"User has been activated","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to activated this user !","messageCode"=>3));
		}
	}
	
	public function doInactivated(){
		if($this->response->post("user") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found user selected !","messageCode"=>1));
			return;
		}
		
		$Data = array("active"=>"2");
		
		$Save = $this->db->where("id",$this->response->post("user"))->update("tb_user",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"User has been in-activated","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to in-activated this user !","messageCode"=>3));
		}
	}
}

