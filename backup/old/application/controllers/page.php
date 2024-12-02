<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
        parent::__construct();
    }
	
	public function index(){
		$this->template->view("page/profile");
	}
	
	public function profile(){
		$this->template->view("page/profile");
	}
	
	
}

?>
