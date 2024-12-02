<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	function __construct(){
        parent::__construct();
		
		if(empty($_SESSION["user_login"])){
			redirect("admin/login");
		}
    }
	
	public function index(){
		$data["QCategories"] = $this->db
						->where("mc.category_id",0)
						->order_by("mc.id","Asc")
						->get("ms_category mc")
						->result();
						
		$this->template->viewAdmin("masters/manage_categories",$data);
	}
	
	public function getCategory(){
		if($this->response->post("category") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found selected data !","messageCode"=>1));
			return;
		}
		
		$QCategory = $this->db->where("id",$this->response->post("category"))->get("ms_category")->row();
		if(!empty($QCategory)){
			$Category = array(
					"id"=>$QCategory->id,
					"name"=>$QCategory->name,
					"description"=>$QCategory->description,
				);
			$this->response->send(array("result"=>1,"category"=>$Category));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Not found data !","messageCode"=>2));
		}
	}
	
	public function doAddSave(){
		if($this->response->post("add_name") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"name\"","messageCode"=>1));
			return;
		}
		
		if($this->response->post("add_description") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Description\"","messageCode"=>2));
			return;
		}
		
		$Data = array(
					"category_id"=>0,
					"name"=>$this->response->post("add_name"),
					"description"=>$this->response->post("add_description"),
					"active"=>1,
					"create_date"=>date("Y-m-d H:i:s"),
					"create_user"=>$_SESSION["user_login"]->email,
				);
		$Save = $this->db->insert("ms_category",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"Data has been saved","messageCode"=>7));
		}else{
			$this->response->send(array("result"=>0,"message"=>"New data can't be saved","messageCode"=>8));
		}
	}
	
	public function doEditSave(){
		if($this->response->post("edit_id") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected","messageCode"=>1));
			return;
		}
		
		if($this->response->post("edit_name") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"name\"","messageCode"=>2));
			return;
		}
		
		if($this->response->post("edit_description") == ""){
			$this->response->send(array("result"=>0,"message"=>"Enter field \"Description\"","messageCode"=>3));
			return;
		}
		
		$Data = array(
					"name"=>$this->response->post("edit_name"),
					"description"=>$this->response->post("edit_description"),
					"update_date"=>date("Y-m-d H:i:s"),
					"update_user"=>$_SESSION["user_login"]->email,
				);
				
		$Save = $this->db
				->where("id",$this->response->post("edit_id"))
				->update("ms_category",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"Data has been saved","messageCode"=>5));
		}else{
			$this->response->send(array("result"=>0,"message"=>"New data can't be saved !","messageCode"=>6));
		}
	}
	
	public function doDelete(){
		if($this->response->post("category") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$Delete = $this->db
				->where("id",$this->response->post("category"))
				->delete("ms_category");
		if($Delete){
			$this->response->send(array("result"=>1,"message"=>"Data has been deleted","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to delete this data !","messageCode"=>3));
		}
	}
	
	public function doActivated(){
		if($this->response->post("category") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$Data = array("active"=>"1");
		
		$Save = $this->db
				->where("id",$this->response->post("category"))
				->update("ms_category",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"Data has been activated","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to activated this data !","messageCode"=>3));
		}
	}
	
	public function doInactivated(){
		if($this->response->post("category") == ""){
			$this->response->send(array("result"=>0,"message"=>"Not found data selected !","messageCode"=>1));
			return;
		}
		
		$Data = array("active"=>"2");
		
		$Save = $this->db
				->where("id",$this->response->post("category"))
				->update("ms_category",$Data);
		
		if($Save){
			$this->response->send(array("result"=>1,"message"=>"Data has been in-activated","messageCode"=>2));
		}else{
			$this->response->send(array("result"=>0,"message"=>"Can't to in-activated this data !","messageCode"=>3));
		}
	}
}

