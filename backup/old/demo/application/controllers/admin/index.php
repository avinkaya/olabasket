<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	function __construct(){
        parent::__construct();
		
		if(empty($_SESSION["user_login"])){
			redirect("admin/login");
		}
    }
	
	public function index(){
		$this->template->viewAdmin("index");
	}
}

