<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
        parent::__construct();
		
    }
	
	public function index(){
		$this->load->view("admin/login");
	}
	
	public function doLogin(){
		if($this->response->post("username") == ""){
			$this->response->send(array("result"=>0,"message"=>"Username masih kosong","messageCode"=>1));
			return;
		}
		
		if($this->response->post("password") == ""){
			$this->response->send(array("result"=>0,"message"=>"Password masih kosong","messageCode"=>2));
			return;
		}
		
		$QUser = $this->db
			->where("username",$this->response->post("username"))
			->where("password",md5($this->response->post("password")))
			->get("tb_user")
			->row();
		
		if(!empty($QUser)){
			if($QUser->active == 0){
				$this->response->send(array("result"=>0,"message"=>"Akun anda belum diaktifkan!","messageCode"=>3));
			}else if($QUser->active == 2){
				$this->response->send(array("result"=>0,"message"=>"Anda tidak dapat login menggunakan akun ini!","messageCode"=>4));
			}else if($QUser->active == 3){
				$this->response->send(array("result"=>0,"message"=>"Anda tidak dapat login menggunakan akun ini!","messageCode"=>5));
			} else {
				$_SESSION["user_login"] = $QUser;
				$this->response->send(array("result"=>1,"message"=>"Selamat datang \"".$QUser->name."\"","messageCode"=>6));
			}
		}else{
			$this->response->send(array("result"=>0,"message"=>"Akun anda tidak terdaftar, silahkan hubungi administrator anda!","messageCode"=>7));
		}
	}
	
	public function doLogout(){
		$_SESSION["user_login"] = null;
		redirect("admin");
	}
}

